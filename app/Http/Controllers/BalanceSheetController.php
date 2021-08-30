<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Initial;
use Illuminate\Support\Facades\DB;

class BalanceSheetController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('report.balance_sheet',compact('projects'));
        // return view('print_report.print_balance_sheet');
    }

    public function printBalanceSheet(Request $request)
    {
        $project_id = $request->project_name;
        $from_date = date('Y-m-d 00:00:00', strtotime($request->from_date));
        $to_date = date('Y-m-d 00:00:00', strtotime($request->to_date));

        $data['from_dat'] = $from_date = date('Y-m-d ', strtotime($request->from_date));
        $data['to_dat'] = $to_date = date('Y-m-d', strtotime($request->to_date));

        $data['projectDetails']=DB::select('select * from projects where id='.$project_id);
        //dd($from_date);

        $data['liabilities'] = DB::select("select t.id, t.l_name, sum(t.amount) as amount
            from(
            SELECT l.id, vd.amount, l.name as l_name FROM `lnames` AS l
                        JOIN `ltypes` AS lt ON lt.id = l.ltype_id
                        JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                        JOIN `vouchers` AS v ON v.id = vd.voucher_id
                        WHERE (v.voucher_date BETWEEN '".$from_date."' AND '".$to_date."') AND l.lgroup_id = 3 AND l.ltype_id = 2 AND v.project_id = ".$project_id.") as t
                            group by t.id");


        $data['initial_balances'] = DB::select('select sum(initials.cash_in_hand) as cash_in_hand, sum(initials.cash_at_bank) as cash_at_bank from initials where initials.project_id='.$project_id);

        // dd($data['initial_balances']);

        //START CASH IN HAND CALCULATION
        $cr_dr_amount_from_voucher = DB::select("SELECT
                    SUM(
                    CASE t.voucher_type
                    WHEN 'DR' THEN t.amount
                    ELSE 0
                    END
                    ) AS `DR`,
                    SUM(
                    CASE t.voucher_type
                    WHEN 'CR' THEN t.amount
                    ELSE 0
                    END
                    ) AS `CR`

                    FROM
                    (
                    SELECT `v`.*, `vd`.`id` AS `vd_id`, `vd`.`amount`
                    FROM `vouchers` AS `v` 
                    INNER JOIN `voucher_details` AS `vd` 
                    ON `v`.`id` = `vd`.`voucher_id` 
                    INNER JOIN `projects` AS `p` ON `p`.`id` = `v`.`project_id` 
                    WHERE (`v`.`voucher_date` < '".$from_date."' AND`v`.`bank_id` = 11) AND `v`.`project_id` = ' ".$project_id." ') AS t ");

            $data['total_cash_in_hand'] = $data['initial_balances'][0]->cash_in_hand + ($cr_dr_amount_from_voucher[0]->CR - $cr_dr_amount_from_voucher[0]->DR);
    //END CASH IN HAND CALCULATION


    //START CASH AT BANK CALCULATION
                $cr_dr_amount_from_voucher_cash_at_bank = DB::select("SELECT
                        SUM(
                        CASE t.voucher_type
                        WHEN 'DR' THEN t.amount
                        ELSE 0
                        END
                        ) AS `DR`,
                        SUM(
                        CASE t.voucher_type
                        WHEN 'CR' THEN t.amount
                        ELSE 0
                        END
                        ) AS `CR`

                        FROM
                        (
                        SELECT `v`.*, `vd`.`id` AS `vd_id`, `vd`.`amount`
                        FROM `vouchers` AS `v` 
                        INNER JOIN `voucher_details` AS `vd` 
                        ON `v`.`id` = `vd`.`voucher_id` 
                        INNER JOIN `projects` AS `p` ON `p`.`id` = `v`.`project_id` 
                        WHERE (`v`.`voucher_date` < '".$from_date."' AND`v`.`bank_id` != 11) AND `v`.`project_id` = ' ".$project_id." ') AS t ");

        $data['total_cash_at_bank'] = $data['initial_balances'][0]->cash_at_bank + ($cr_dr_amount_from_voucher_cash_at_bank[0]->CR - $cr_dr_amount_from_voucher_cash_at_bank[0]->DR);
        //END CASH AT BANK CALCULATION



        $data['assets'] = DB::select("select t.id, t.l_name, sum(t.amount) as amount
            from(
            SELECT l.id, vd.amount, l.name as l_name FROM `lnames` AS l
                        JOIN `ltypes` AS lt ON lt.id = l.ltype_id
                        JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                        JOIN `vouchers` AS v ON v.id = vd.voucher_id
                        WHERE (v.voucher_date BETWEEN '".$from_date."' AND '".$to_date."') AND l.lgroup_id = 3 AND l.ltype_id = 4 AND v.project_id =".$project_id.") as t
                            group by t.id");
        // dd($data['assets']);


    $data['adjustments'] = DB::select("SELECT t.id, t.`ledger_name`, t.`total_vd_amount`, t.`amount`
                FROM
                (
                SELECT `ad`.*,  SUM(`vd`.`amount`) AS `total_vd_amount`,  `l`.`name` AS `ledger_name`
                FROM `adjustments` AS `ad`
                INNER JOIN `voucher_details` AS `vd` ON `ad`.`lname_id` = `vd`.`lname_id`
                INNER JOIN `lnames` AS `l` ON `ad`.`lname_id` = `l`.`id` WHERE ad.project_id = ".$project_id."
                GROUP BY ad.lname_id) AS t;");


        // this year net profit calculation
        $data['income'] = DB::select("select t.id, t.l_name, sum(t.amount) as amount
            from(
            SELECT l.id, vd.amount, l.name as l_name FROM `lnames` AS l
                JOIN `ltypes` AS lt ON lt.id = l.ltype_id
                JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                JOIN `vouchers` AS v ON v.id = vd.voucher_id
                WHERE (v.voucher_date BETWEEN '".$from_date."' AND '".$to_date."') AND l.lgroup_id = 1 AND l.ltype_id = 1 AND v.project_id = ".$project_id.") as t
                            group by t.id");

        $data['t_adjustment'] = DB::select("select sum(amount) as total_amount from adjustments as ad where ad.type = 2 and ad.project_id = ".$project_id);

        $data['total_income'] = 0;
                foreach($data['income'] as $val) {
                ($val->l_name == "Sales Commission" ? $data['total_income'] -= $val->amount : $data['total_income'] += $val->amount);
                }

        $expenses = DB::select("select t.id, t.l_name, sum(t.amount) as total_expen
            from(
            SELECT l.id, vd.amount, l.name as l_name FROM `lnames` AS l
                                JOIN `ltypes` AS lt ON lt.id = l.ltype_id
                                JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                                JOIN `vouchers` AS v ON v.id = vd.voucher_id
                                WHERE (v.voucher_date BETWEEN '".$from_date."' AND '".$to_date."') AND l.lgroup_id = 1 AND l.ltype_id = 3 AND v.project_id = ".$project_id.") as t
                            group by t.id");
        
            $total_expense_amount = 0;
            foreach($expenses as $expens){
                $total_expense_amount += $expens->total_expen;
            }


        $profite_head = DB::select("select t.id, t.l_name, sum(t.amount) as profit_amount
            from(
            SELECT l.id, vd.amount, l.name as l_name FROM `lnames` AS l
                                    JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                                    JOIN `vouchers` AS v ON v.id = vd.voucher_id
                                    WHERE (v.voucher_date BETWEEN '".$from_date."' AND '".$to_date."') AND l.lgroup_id = 2 AND v.project_id = ".$project_id.") as t
                            group by t.id");

                            // dd($data);

        $total_profit_head_wise_amount = 0;
        foreach($profite_head as $p_amount){
            $total_profit_head_wise_amount += $p_amount->profit_amount;
        }

                                    // dd($total_profit_head_wise_amount);

        $data['this_year_profit'] =  $data['total_income'] - ( $total_expense_amount + $total_profit_head_wise_amount + $data['t_adjustment'][0]->total_amount);
        // dd($data);

        return view('print_report.print_balance_sheet',$data);
    }
}