<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Voucher;
use App\Bank;
use Illuminate\Support\Facades\DB;

class DailyIncomeSummarySheetController extends Controller
{
    public function dailyIncome(){
        $projects = Project::all();
        return view('report.daily_income_summary',compact('projects'));
    }

    public function printDailyIncome(Request $request){
        $project_id=$request->project_name;
        $from_date = date('Y-m-d 00:00:00', strtotime($request->from_date));
        $to_date = date('Y-m-d 00:00:00', strtotime($request->to_date));

        $data['from_dat'] = $from_date = date('Y-m-d ', strtotime($request->from_date));
        $data['to_dat'] = $to_date = date('Y-m-d', strtotime($request->to_date));
        $data['projectDetails']=DB::select('select * from projects where id='.$project_id);

        $data['income'] = DB::select("select t.id, t.l_name, t.bank_name, t.v_no, sum(t.amount) as amount
            from(
            SELECT  l.id, l.name as l_name,bk.name as bank_name,v.voucher_number as v_no, vd.amount FROM `lnames` AS l
            JOIN `ltypes` AS lt ON lt.id = l.ltype_id
            JOIN `voucher_details` AS vd ON vd.lname_id = l.id
            JOIN `vouchers` AS v ON v.id = vd.voucher_id
            JOIN `banks` AS bk ON bk.id = v.bank_id
            WHERE (v.voucher_date BETWEEN '".$from_date."' AND '".$to_date."') AND l.ltype_id = 1 AND v.project_id = ".$project_id.") as t
        group by t.id");

        return view('print_report.print_income_summary_sheet',$data);
    }
}
