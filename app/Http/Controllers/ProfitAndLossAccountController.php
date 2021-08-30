<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Voucher;
use Illuminate\Support\Facades\DB;


class ProfitAndLossAccountController extends Controller
{
    public function index(){
        $projects = Project::all();
       // return view('report.profit_loss_account',compact('projects'));
       return view('report.profit_loss_account',compact('projects'));
   }


   public function printProfitLossAccount(Request $request){
    $project_id = $request->project_name;
    $from_date = date('Y-m-d 00:00:00', strtotime($request->from_date));
    $to_date = date('Y-m-d 00:00:00', strtotime($request->to_date));

    $data['from_dat'] = $from_date = date('Y-m-d ', strtotime($request->from_date));
    $data['to_dat'] = $to_date = date('Y-m-d', strtotime($request->to_date));

    // dd($from_date);
    $data['projectDetails']=DB::select('select * from projects where id='.$project_id);

    $data['income'] = DB::select("select t.id, t.l_name, sum(t.amount) as amount 
            from(
            SELECT l.id, l.name as l_name, vd.amount FROM `lnames` AS l
                            JOIN `ltypes` AS lt ON lt.id = l.ltype_id
                            JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                            JOIN `vouchers` AS v ON v.id = vd.voucher_id
                            WHERE (v.voucher_date BETWEEN '".$from_date."' AND '".$to_date."') AND l.lgroup_id = 1 AND l.ltype_id = 1 AND v.project_id = ".$project_id.") as t
                            group by t.id");

    $data['total_income'] = 0;
    foreach($data['income'] as $val) {
        ($val->l_name == "Sales Commission" ? $data['total_income'] -= $val->amount : $data['total_income'] += $val->amount);
    }
    
    $data['expen'] = DB::select("select t.id, t.l_name, sum(t.amount) as total_expen
        from(
        SELECT l.id, vd.amount, l.name as l_name FROM `lnames` AS l
                            JOIN `ltypes` AS lt ON lt.id = l.ltype_id
                            JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                            JOIN `vouchers` AS v ON v.id = vd.voucher_id
                            WHERE (v.voucher_date  BETWEEN  '".$from_date."' AND '".$to_date."') AND l.lgroup_id = 1 AND l.ltype_id = 3 AND v.project_id = ".$project_id.") as t
                            group by t.id");

    $data['total_expen'] = 0;
    foreach($data['expen'] as $val_amount) {
       $data['total_expen'] += $val_amount->total_expen;
    }
                            // dd($data['total_income']);

    
    $data['profite_head'] = DB::select("select t.id, t.l_name, sum(t.amount) as amount
        from(
        SELECT l.id, vd.amount, l.name as l_name FROM `lnames` AS l
                                JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                                JOIN `vouchers` AS v ON v.id = vd.voucher_id
                                WHERE (v.voucher_date BETWEEN '".$from_date."' AND '".$to_date."') AND l.lgroup_id = 2 AND v.project_id = ".$project_id.") as t
                            group by t.id");

            //  dd($data['profite_head']);

    $data['adjustment'] = DB::select("select * from adjustments as ad where ad.type = 2 and ad.project_id = ".$project_id);
    // dd($data);
    
    return view('print_report.print_profit_loss',$data);

   }
}

