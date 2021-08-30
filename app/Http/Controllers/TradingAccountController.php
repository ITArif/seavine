<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Voucher;
use Illuminate\Support\Facades\DB;


class TradingAccountController extends Controller
{
    public function index(){
        $projects = Project::all();
        // $projects = Project::all();

        // $data = DB::table('vouchers as v')
        //            ->select('v.*','vd.id as vd_id','vd.lname_id', 'vd.amount', 'l.name as ledger_name','p.name','p.id as p_id')
        //            ->addSelect('lt.name as lt_name','lg.id as lg_id')
        //            ->join('voucher_details as vd','v.id','=','vd.voucher_id')
        //            ->join('lnames as l','l.id','=','vd.lname_id')
        //            ->join('projects as p','p.id','=','v.project_id')
        //            ->join('ltypes as lt','lt.id','=','l.ltype_id')
        //            ->join('lgroups as lg','lg.id','=','l.lgroup_id')
        //            ->where('p.id','=',15)
        //            ->get();
                // dd($data);
        //dd($data);
        return view('report.trading_account',compact('projects'));
        // return view('print_report.print_trading_account');
    }

    public function printTradingAccounts(Request $request){
        $project_id = $request->project_name;
        $from_date = date('Y-m-d 00:00:00', strtotime($request->from_date));
        $to_date = date('Y-m-d 00:00:00', strtotime($request->to_date));

        $data['from_dat'] = $from_date = date('Y-m-d ', strtotime($request->from_date));
        $data['to_dat'] = $to_date = date('Y-m-d', strtotime($request->to_date));

        $data['projectDetails']=DB::select('select * from projects where id='.$project_id);
        //dd($from_date);


        $data['income'] = DB::select("select t.id, t.l_name, sum(t.amount) as amount 
            from(
            SELECT l.id, l.name as l_name, vd.amount FROM `lnames` AS l
                            JOIN `ltypes` AS lt ON lt.id = l.ltype_id
                            JOIN `voucher_details` AS vd ON vd.lname_id = l.id
                            JOIN `vouchers` AS v ON v.id = vd.voucher_id
                            WHERE (v.voucher_date BETWEEN '".$from_date."' AND '".$to_date."') AND l.lgroup_id = 1 AND l.ltype_id = 1 AND v.project_id = ".$project_id.") as t
                            group by t.id");

        $data['expen'] = DB::select("select t.id, t.l_name, sum(t.amount) as amount
                            from(
                            SELECT l.id, l.name as l_name, vd.amount FROM `lnames` AS l 
                            JOIN `ltypes` AS lt ON lt.id = l.ltype_id 
                            JOIN `voucher_details` AS vd ON vd.lname_id = l.id 
                            JOIN `vouchers` AS v ON v.id = vd.voucher_id 
                            WHERE (v.voucher_date BETWEEN '".$from_date."' AND '".$to_date."') 
                            AND l.lgroup_id = 1 
                            AND l.ltype_id = 3 AND v.project_id = ".$project_id.") as t
                            group by t.id");
        // dd($data);

        // $sql = "SELECT l.name as l_name, vd.amount FROM `lnames` AS l
        //                     JOIN `ltypes` AS lt ON lt.id = l.ltype_id
        //                     JOIN `voucher_details` AS vd ON vd.lname_id = l.id
        //                     JOIN `vouchers` AS v ON v.id = vd.voucher_id
        //                     WHERE (v.voucher_date BETWEEN '".$from_date."' AND '".$to_date."') AND l.lgroup_id = 1 AND l.ltype_id = 3 AND v.project_id = ".$project_id;

        // return $sql;
        return view('print_report.print_trading_accounts',$data);
    }
}