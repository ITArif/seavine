<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\DB;

class TrialBlanceController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('report.trial_balance',compact('projects'));
    }
    public function printTrialBalace(Request $request)
    {
              // $dr = DB::table('');
        $project_id = $request->project_name;
        $from_date = date('Y-m-d 00:00:00', strtotime($request->from_date));
        $to_date = date('Y-m-d 00:00:00', strtotime($request->to_date));

        // dd($from_date);

        $data['projectDetails']=DB::select('select * from projects where id='.$project_id);
         // dd($data['projectDetails']);

        $data['from_dat'] = $from_date = date('Y-m-d ', strtotime($request->from_date));
        $data['to_dat'] = $to_date = date('Y-m-d', strtotime($request->to_date));

        // $data['trial_balance_details'] = DB::table('vouchers as v')
        //            ->select('v.*','vd.id as vd_id','vd.lname_id', 'vd.amount', 'l.name as ledger_name','p.name','p.id as p_id')
        //            ->join('voucher_details as vd','v.id','=','vd.voucher_id')
        //            ->join('lnames as l','l.id','=','vd.lname_id')
        //            ->join('projects as p','p.id','=','v.project_id')
        //            ->where( 'p.id', '=', $project_id)
        //            ->whereBetween('v.voucher_date',[$from_date,$to_date])
        //            ->get();


        // $data['trial_balance_details'] = DB::select("select t.id, t.ledger_name, t.voucher_type, sum(t.amount) as amount
        //     from(
        //     SELECT l.id, vd.amount, l.name as ledger_name, v.voucher_type FROM `lnames` AS l
        //                 JOIN `voucher_details` AS vd ON vd.lname_id = l.id
        //                 JOIN `vouchers` AS v ON v.id = vd.voucher_id
        //                 WHERE (v.voucher_date BETWEEN '".$from_date."' AND '".$to_date."') AND v.project_id = ".$project_id.") as t
        //                     group by t.id");


        $initial_balances = DB::select('select sum(initials.cash_in_hand) as cash_in_hand, sum(initials.cash_at_bank) as cash_at_bank from initials where initials.project_id='.$project_id);


        // CASH IN HAND CALCULATION
        $cr_amount = DB::table('voucher_details')
        ->select(DB::raw('sum(voucher_details.amount) as projectWise__cr_amount'))
        ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
        ->where('vouchers.project_id',$project_id)
        ->where('vouchers.bank_id', 11)
        ->where('vouchers.voucher_type', 'CR')
        ->where('vouchers.voucher_date', '<', $from_date)
        ->first();

        $dr_amount = DB::table('voucher_details')
        ->select(DB::raw('sum(voucher_details.amount) as projectWise__dr_amount'))
        ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
        ->where('vouchers.project_id',$project_id)
        ->where('vouchers.bank_id', 11)
        ->where('vouchers.voucher_type', 'DR')
        ->where('vouchers.voucher_date', '<', $from_date)
        ->first();

        $data['cash_in_hand_amount'] = ($initial_balances[0]->cash_in_hand + $cr_amount->projectWise__cr_amount) - $dr_amount->projectWise__dr_amount;

        // CASH IN BANK CALCULATION
        $cr_bank_amount = DB::table('voucher_details')
        ->select(DB::raw('sum(voucher_details.amount) as projectWise__cr__bank_amount'))
        ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
        ->where('vouchers.project_id',$project_id)
        ->where('vouchers.bank_id', '!=', 11)
        ->where('vouchers.voucher_type', 'CR')
        ->where('vouchers.voucher_date', '<', $from_date)
        ->first();

        $dr_bank_amount = DB::table('voucher_details')
        ->select(DB::raw('sum(voucher_details.amount) as projectWise__dr_bank_amount'))
        ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
        ->where('vouchers.project_id',$project_id)
        ->where('vouchers.bank_id', '!=', 11)
        ->where('vouchers.voucher_type', 'DR')
        ->where('vouchers.voucher_date', '<', $from_date)
        ->first();
      
        $data['cash_in_bank_amount'] = ($initial_balances[0]->cash_at_bank + $cr_bank_amount->projectWise__cr__bank_amount) - $dr_bank_amount->projectWise__dr_bank_amount;
        // dd($data['cash_in_bank_amount']);

        $data['trial_balance_details'] = DB::select("SELECT t.id, t.`ledger_name`, 
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
          SELECT `v`.*, `vd`.`id` AS `vd_id`, `vd`.`lname_id`, `vd`.`amount`, `l`.`name` AS `ledger_name`, `p`.`name`, `p`.`id` AS `p_id` 
          FROM `vouchers` AS `v` 
          INNER JOIN `voucher_details` AS `vd` 
          ON `v`.`id` = `vd`.`voucher_id` 
          INNER JOIN `lnames` AS `l` ON `l`.`id` = `vd`.`lname_id` 
          INNER JOIN `projects` AS `p` ON `p`.`id` = `v`.`project_id` 
          WHERE (`v`.`voucher_date` BETWEEN '".$from_date."' AND '".$to_date."') AND `v`.`project_id` = ' ".$project_id." ') AS t
          GROUP BY t.`ledger_name`");
        

        return view('print_report.print_trial_balance',$data);
    }
}
