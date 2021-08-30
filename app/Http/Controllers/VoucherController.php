<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\VoucherDetail;
use App\Project;
use App\Bank;
use App\Lname;
use App\Initial;
use App\Journal;
use App\JournalDetails;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher_details = DB::table('voucher_details')
            ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
            ->join('projects', 'vouchers.project_id', '=', 'projects.id')
            ->join('banks', 'vouchers.bank_id', '=', 'banks.id')
            ->join('lnames', 'voucher_details.lname_id', '=', 'lnames.id')
            ->select('voucher_details.*', 'lnames.name as lname', 'banks.name as bank_name', 'projects.name as project_name', 'vouchers.voucher_date', 'vouchers.perticulers','vouchers.cheque_no')
            ->get();
        //dd($voucher_details);
        return view('voucher.view_credit', compact('voucher_details'));
    }

    public function allcreditvoucherDataTable(){
        $voucher_details = DB::table('voucher_details')
        ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
        ->join('projects', 'vouchers.project_id', '=', 'projects.id')
        ->join('banks', 'vouchers.bank_id', '=', 'banks.id')
        ->join('lnames', 'voucher_details.lname_id', '=', 'lnames.id')
        ->select('voucher_details.*', 'lnames.name as lname', 'banks.name as bank_name', 'projects.name as project_name', 'vouchers.voucher_date', 'vouchers.perticulers','vouchers.cheque_no','vouchers.voucher_number')
        ->where('voucher_type', 'CR')
        ->get();
        //dd($voucher_details);
        foreach($voucher_details as $dat){
            $customData[]=[
                'voucher_id'=>$dat->voucher_id,
                'voucher_date'=>$dat->voucher_date,
                'lname'=>$dat->lname,
                'bank_name'=>$dat->bank_name,
                'cheque_no'=>$dat->cheque_no,
                'amount'=>$dat->amount,
                'project_name'=>$dat->project_name,
                'perticulers'=>$dat->perticulers,
                'voucher_number'=>$dat->voucher_number,

            ];
        }
    //dd($customData);
        $data_table_render= DataTables::of($customData)
            ->addColumn('DT_RowIndex',function ($row){
                //return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    //$edit_url=url('sales/edit-sales/'.$row['id']);
                // return '<a href="#" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                //      '<button onClick="#" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creditvoucher()
    {
        $projects = Project::all();
        $banks = Bank::all();
        $lnames = Lname::all();
        return view('voucher.credit', compact('projects','banks','lnames'));
    }

    public function save_credit(Request $request){
        //dd($request);
        $this->validate($request,[
            'project_id' => 'required',
            'bank_id' => 'required',
            'perticulers' => 'required',
            'voucher_date' => 'required',
            'voucher_no' => 'required',
            'lname_id' => 'required',
            'amount' => 'required',
        ]);

        $ledger_count = sizeof($request->lname_id);
        if($ledger_count > 0){
            $voucher = new Voucher;
            $voucher->project_id = $request->project_id;
            $voucher->bank_id = $request->bank_id;
            $voucher->cheque_no = $request->cheque_no;
            $voucher->perticulers = $request->perticulers;
            $voucher->voucher_type = 'CR';
            $voucher->voucher_date = $request->voucher_date;
            $voucher->voucher_number = $request->voucher_no;
            $voucher->save();

            for($i = 0; $i < $ledger_count; $i++){
                $voucher_detail = new VoucherDetail;
                $voucher_detail->voucher_id = $voucher->id;
                $voucher_detail->lname_id = $request->lname_id[$i];
                $voucher_detail->amount = $request->amount[$i];
                $voucher_detail->save();
            }

            return redirect()->back()->with('success','Credit Voucher Added Successfully!');
        }
        else{
            return redirect()->back()->with('error','Credit Voucher failed to add, must add account head with amount!');
        }
    }



    public function alldebitvoucher()
    {
        $voucher_details = DB::table('voucher_details')
            ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
            ->join('projects', 'vouchers.project_id', '=', 'projects.id')
            ->join('banks', 'vouchers.bank_id', '=', 'banks.id')
            ->join('lnames', 'voucher_details.lname_id', '=', 'lnames.id')
            ->select('voucher_details.*', 'lnames.name as lname', 'banks.name as bank_name', 'projects.name as project_name', 'vouchers.voucher_date', 'vouchers.perticulers','vouchers.cheque_no')
            ->get();
        // dd($voucher_details);
        return view('voucher.view_debit', compact('voucher_details'));
    }

    public function allDebitVoucherDataTable(){
        $voucher_details = DB::table('voucher_details')
            ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
            ->join('projects', 'vouchers.project_id', '=', 'projects.id')
            ->join('banks', 'vouchers.bank_id', '=', 'banks.id')
            ->join('lnames', 'voucher_details.lname_id', '=', 'lnames.id')
            ->select('voucher_details.*', 'lnames.name as lname', 'banks.name as bank_name', 'projects.name as project_name', 'vouchers.voucher_date', 'vouchers.cheque_no','vouchers.perticulers','vouchers.voucher_number')
            ->where('voucher_type', 'DR')
            ->get();
        //dd($voucher_details);

            foreach($voucher_details as $dat){
                $customData[]=[
                    'voucher_id'=>$dat->voucher_id,
                    'voucher_date'=>$dat->voucher_date,
                    'voucher_number'=>$dat->voucher_number,
                    'lname'=>$dat->lname,
                    'bank_name'=>$dat->bank_name,
                    'cheque_no'=>$dat->cheque_no,
                    'amount'=>$dat->amount,
                    'project_name'=>$dat->project_name,
                    'perticulers'=>$dat->perticulers,
    
                ];
            }

            $data_table_render= DataTables::of($customData)
            ->addColumn('DT_RowIndex',function ($row){
                //return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    //$edit_url=url('sales/edit-sales/'.$row['id']);
                // return '<a href="#" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                //      '<button onClick="#" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function debitvoucher()
    {
        $projects = Project::all();
        $banks = Bank::all();
        $lnames = Lname::all();
        return view('voucher.debit', compact('projects','banks','lnames'));
    }

    public function save_debit(Request $request){
        //dd($request);
        $this->validate($request,[
            'project_id' => 'required',
            'bank_id' => 'required',
            'perticulers' => 'required',
            'voucher_date' => 'required',
            'voucher_no' => 'required',
            'lname_id' => 'required',
            'amount' => 'required',
        ]);

        $ledger_count = sizeof($request->lname_id);
        if($ledger_count > 0){
            $voucher = new Voucher;
            $voucher->project_id = $request->project_id;
            $voucher->bank_id = $request->bank_id;
            $voucher->cheque_no = $request->cheque_no;
            $voucher->perticulers = $request->perticulers;
            $voucher->voucher_type = 'DR';
            $voucher->voucher_date = $request->voucher_date;
            $voucher->voucher_number = $request->voucher_no;
            $voucher->save();

            for($i = 0; $i < $ledger_count; $i++){
                $voucher_detail = new VoucherDetail;
                $voucher_detail->voucher_id = $voucher->id;
                $voucher_detail->lname_id = $request->lname_id[$i];
                $voucher_detail->amount = $request->amount[$i];
                $voucher_detail->save();
            }

            return redirect()->back()->with('success','Debit Voucher Added Successfully!');
        }
        else{
            return redirect()->back()->with('error','Debit Voucher failed to add, must add account head with amount!');
        }
    }


    public function journalvoucher()
    {
        $projects = Project::all();
        $lnames = Lname::all();
        $banks = Bank::all();
        return view('voucher.create_journal', compact('projects','lnames','banks'));
    }

    public function alljournalvoucher()
    {
        $journals = DB::table('journal_details as jd')
        ->select('jd.*','j.perticulers','j.journal_date', 'l.name as ledger_name','p.name as project_name','p.id as p_id')
        ->join('lnames as l','l.id','=','jd.lname_id')
        ->join('journals as j','j.id','=','jd.journal_id')
        ->join('projects as p','p.id','=','jd.project_id')
        ->get();
         //dd($journals);
        return view('voucher.view_journal',compact('journals'));
    }

    public function save_journal(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
        'perticulers' => 'required',
        'journal_date' => 'required',
        ]);
        $project_id  = $request->project_id_dr;
        $project_id_credit=$request->project_id_cr;
        //dd($project_id_credit);
        $payment_type = $request->bank;

         if($project_id == $project_id_credit) {
                return redirect()->back()->with('error', 'You cannot send the same project name of Cash in hand amount!');
        }

        if($payment_type == 11) {
            $initial_balance = DB::table('initials')
              ->select(DB::raw('sum(initials.cash_in_hand) as CashInHand'))
              ->where('initials.project_id',$project_id)
              ->first();

            $cr_limit = DB::table('voucher_details')
              ->select(DB::raw('sum(voucher_details.amount) as projectWise_amount'))
              ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
              ->where('vouchers.project_id',$project_id)
              ->where('vouchers.bank_id',$payment_type)
               ->where('voucher_type', 'CR')
              ->first();

              $dr_limit = DB::table('voucher_details')
              ->select(DB::raw('sum(voucher_details.amount) as projectWise_amount'))
              ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
              ->where('vouchers.project_id',$project_id)
              ->where('vouchers.bank_id',$payment_type)
               ->where('voucher_type', 'DR')
              ->first();

              //dd($dr_limit);
              // $pr_amount = $dr_limit->projectWise_amount == null ? 0: $dr_limit->projectWise_amount;
              $pr_amount=$cr_limit->projectWise_amount + $initial_balance->CashInHand - $dr_limit->projectWise_amount;
              if($pr_amount < $request->amount_dr) {
                return redirect()->back()->with('error', 'Insufficiant Cash in hand amount!');
              }

        }else {
            $initial_balance_bank = DB::table('initials')
              ->select(DB::raw('sum(initials.cash_at_bank) as CashAtBank'))
              ->where('initials.project_id',$project_id)
              ->first();

            $dr_limit = DB::table('voucher_details')
              ->select(DB::raw('sum(voucher_details.amount) as projectWise_amount'))
              ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
              ->where('vouchers.project_id',$project_id)
              ->where('vouchers.bank_id',$payment_type)
              ->where('voucher_type', 'DR')
              ->first();

            $cr_limit = DB::table('voucher_details')
              ->select(DB::raw('sum(voucher_details.amount) as projectWise_amount'))
              ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
              ->where('vouchers.project_id',$project_id)
              ->where('vouchers.bank_id',$payment_type)
              ->where('voucher_type', 'CR')
              ->first();
              $pr_amount=$cr_limit->projectWise_amount + $initial_balance_bank->CashAtBank - $dr_limit->projectWise_amount;

              if($pr_amount < $request->amount_dr) {
                return redirect()->back()->with('error', 'Insufficiant cash at bank amount!');
              }

              // if($project_id == $request->$project_id_credit) {
              //   return redirect()->back()->with('error', 'You cannot send the same Cash in bank amount!');
              // }
        }
        
        //dd("hi");
        $ledger_count = sizeof($request->lname_id_dr);
        if ($ledger_count > 0) {
            $journal = new Journal;
            $journal->perticulers = $request->perticulers;
            $journal->journal_date = $request->journal_date;
            $journal->save();

            for ($i = 0; $i < $ledger_count; $i++) {
                $journal_detail = new JournalDetails;
                $journal_detail->journal_id = $journal->id;
                $journal_detail->project_id = $request->project_id_dr;
                $journal_detail->lname_id = $request->lname_id_dr[$i];
                $journal_detail->amount = $request->amount_dr;
                $journal_detail->journal_type = $request->lname_id_dr[$i] ? 'DR' : '';
                $journal_detail->save();

                //JournalDetails
                $journal_detail = new JournalDetails;
                $journal_detail->journal_id = $journal->id;
                $journal_detail->project_id = $request->project_id_cr;
                $journal_detail->lname_id = $request->lname_id_cr[$i];
                $journal_detail->amount = $request->amount_cr;
                $journal_detail->journal_type = $request->lname_id_cr[$i] ? 'CR' : '';
                $journal_detail->save();
    

                //Voucher
                //$bankId= $request->bank_id;
               // dd($bankId);
                // foreach ($bankId as $is_optional => $bId) {
                //     //dd($bId);
                // if($bId > 0){    
                $voucher = new Voucher;
                //dd($voucher);
                $voucher->project_id = $request->project_id_dr;
                $voucher->bank_id = $request->bank;
                $voucher->cheque_no = $request->cheque_no;
                $voucher->perticulers = $request->perticulers;
                $voucher->voucher_date = $request->journal_date;
                $voucher->voucher_number = $request->voucher_no_dr;
                $voucher->voucher_type = $request->lname_id_dr[$i] ? 'DR' : '';
                $voucher->save();
                 
                
                //VoucherDetail
                $voucher_detail = new VoucherDetail;
                $voucher_detail->voucher_id = $voucher->id;
                $voucher_detail->lname_id = $request->lname_id_dr[$i];
                $voucher_detail->amount = $request->amount_dr;
                // $voucher_detail->journal_type = $request->lname_id_dr[$i] ? 'DR' : '';
                $voucher_detail->save();

                $voucher = new Voucher;
                $voucher->project_id = $request->project_id_cr;
                $voucher->bank_id = $request->bank;
                $voucher->cheque_no = $request->cheque_no;
                $voucher->perticulers = $request->perticulers;
                $voucher->voucher_date = $request->journal_date;
                $voucher->voucher_number = $request->voucher_no_cr;
                $voucher->voucher_type = $request->lname_id_cr[$i] ? 'CR' : '';
                $voucher->save();

                
                //VoucherDetail
                $voucher_detail = new VoucherDetail;
                $voucher_detail->voucher_id = $voucher->id;
                $voucher_detail->lname_id = $request->lname_id_cr[$i];
                $voucher_detail->amount = $request->amount_cr;
                // // $voucher_detail->journal_type = $request->lname_id_cr[$i] ? 'CR' : '';
                $voucher_detail->save();
            }
            return redirect()->back()->with('success', 'Journal Added Successfully!');
        } else {
            return redirect()->back()->with('error', 'Journal failed to add, must add account head with amount!');
        }
    }

    //Project wise total amount
    public function projectWiseTotalAmount(){
        // $voucher_details = DB::table('voucher_details')
        //     ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
        //     ->join('projects', 'vouchers.project_id', '=', 'projects.id')
        //     ->select('voucher_details.*', 'projects.name as project_name')
        //     ->where('voucher_type', 'DR')
        //     ->get();
        return view('voucher.project_wise_total_amount');
    }

    public function projectWiseTotalAmountDataTable(){
        // $projectWiseTotalAmount = DB::table('voucher_details')
        //     ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
        //     ->join('projects', 'vouchers.project_id', '=', 'projects.id')
        //     ->select('voucher_details.*', 'projects.name as project_name', 'voucher_details.amount as projectWise_amount')
        //     ->where('voucher_type', 'DR')
        //     ->get();


         // $commissions= DB::table('merchant_historis')
         //      ->join('admins', 'merchant_historis.merchant_id', '=', 'admins.id')
         //       ->select('merchant_historis.*', 'admins.*')
         //      ->select(DB::raw('merchant_id'), DB::raw('sum(merchant_historis.commission) as total'))
         //      ->groupBy(DB::raw('merchant_id') )
         //      ->get();


          $projectWiseTotalAmount= DB::table('voucher_details')
              //->join('admins', 'merchant_historis.merchant_id', '=', 'admins.id')
              ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
              ->join('projects', 'vouchers.project_id', '=', 'projects.id')
              ->select('voucher_details.*', 'projects.*')
              ->addSelect(DB::raw('sum(voucher_details.amount) as projectWise_amount'))
              ->groupBy('projects.id')
              ->get();

            $data_table_render= DataTables::of($projectWiseTotalAmount)
            ->addColumn('DT_RowIndex',function ($row){
                //return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                // ->addColumn('action',function ($row){
                //     //$edit_url=url('sales/edit-sales/'.$row['id']);
                // return '<a href="#" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                //      '<button onClick="#" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            // })
            ->rawColumns(['DT_RowIndex'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render; 
    }

}
