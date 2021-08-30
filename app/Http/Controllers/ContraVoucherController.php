<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Contra;
use App\Project;
use App\Voucher;
use App\Initial;
use App\VoucherDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContraVoucherController extends Controller
{
    public function index()
    {
        $contra_vouchers = DB::table('contras as c')
        ->join('projects as p', 'c.project_id', '=', 'p.id')
        ->join('banks as b', 'c.bank_id', '=', 'b.id')
        ->select('c.*', 'p.name as project_name', 'b.name as bank_name')
        ->get();

        return view('contra_voucher.view_contra_voucher',compact('contra_vouchers'));
    }

    public function create()
    {
        $data['banks'] = Bank::all();
        $data['projects'] = Project::all();
        return view('contra_voucher.create_contra_voucher',$data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'project_name' => 'required',
            'bank_id_dr' => 'required',
            'bank_id_cr' => 'required',
            'voucher_no' => 'required',
            'voucher_date' => 'required',
            'amount' => 'required',
            'perticulers' => 'required',
        ]);

        $initial_balance = DB::table('initials')
              ->select(DB::raw('sum(initials.cash_in_hand) as CashInHand'))
              ->where('initials.project_id',18)
              ->first();

            $cr_limit = DB::table('voucher_details')
              ->select(DB::raw('sum(voucher_details.amount) as projectWise_amount'))
              ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
              ->where('vouchers.project_id',18)
              ->where('vouchers.bank_id',$request->bank_id_dr)
               ->where('voucher_type', 'CR')
              ->first();

              $dr_limit = DB::table('voucher_details')
              ->select(DB::raw('sum(voucher_details.amount) as projectWise_amount'))
              ->join('vouchers', 'voucher_details.voucher_id', '=', 'vouchers.id')
              ->where('vouchers.project_id',18)
              ->where('vouchers.bank_id',$request->bank_id_dr)
               ->where('voucher_type', 'DR')
              ->first();

              //dd($dr_limit);
              // $pr_amount = $dr_limit->projectWise_amount == null ? 0: $dr_limit->projectWise_amount;
              $pr_amount=$cr_limit->projectWise_amount + $initial_balance->CashInHand - $dr_limit->projectWise_amount;
              if ($request->bank_id_dr == 11) {
                  if($pr_amount < $request->amount) {
                return redirect()->back()->with('error', 'Insufficiant Deposite amount!');
                }
              }else{
                if($pr_amount < $request->amount) {
                return redirect()->back()->with('error', 'Insufficiant Withdraw amount!');
                }
              }
              

        $contras = new Contra;
        $contras->project_id = $request->project_name;
        $contras->bank_id = $request->bank_id_dr;
        // $contras->bank_id_cr = $request->bank_id_cr;
        $contras->check_no = $request->check_no;
        $contras->voucher_no = $request->voucher_no;
        $contras->voucher_date = $request->voucher_date;
        $contras->amount = $request->amount;
        $contras->amount_type =  $request->bank_id_dr ? 'DR' : '';
        $contras->perticulers = $request->perticulers;
        $contras->save();

        $contras = new Contra;
        $contras->project_id = $request->project_name;
        // $contras->bank_id_dr = $request->bank_id_dr;
        $contras->bank_id = $request->bank_id_cr;
        $contras->check_no = $request->check_no;
        $contras->voucher_no = $request->voucher_no;
        $contras->voucher_date = $request->voucher_date;
        $contras->amount = $request->amount;
        $contras->amount_type =  $request->bank_id_cr ? 'CR' : '';
        $contras->perticulers = $request->perticulers;
        $contras->save();


        if ($request->bank_id_dr==11) {
            $voucher = new Voucher;
            //dd($voucher);
            $voucher->project_id = 18;
            $voucher->bank_id = 11;
            $voucher->perticulers = $request->perticulers;
            $voucher->voucher_date = $request->voucher_date;
            $voucher->voucher_number = $request->voucher_no;
            $voucher->voucher_type = 'DR';
            $voucher->save();

            $voucher_detail = new VoucherDetail;
            $voucher_detail->voucher_id = $voucher->id;
            $voucher_detail->lname_id = 55;
            $voucher_detail->amount = $request->amount;
            // $voucher_detail->journal_type = $request->lname_id_dr[$i] ? 'DR' : '';
            $voucher_detail->save();
            
           $voucher = new Voucher;
            //dd($voucher);
            $voucher->project_id = 18;
            $voucher->bank_id = $request->bank_id_cr;
            $voucher->perticulers = $request->perticulers;
            $voucher->cheque_no=$request->check_no;
            $voucher->voucher_date = $request->voucher_date;
            $voucher->voucher_number = $request->voucher_no;
            $voucher->voucher_type = 'CR';
            $voucher->save();

            $voucher_detail = new VoucherDetail;
            $voucher_detail->voucher_id = $voucher->id;
            $voucher_detail->lname_id = 56;
            $voucher_detail->amount = $request->amount;
            // $voucher_detail->journal_type = $request->lname_id_dr[$i] ? 'DR' : '';
            $voucher_detail->save();
        }else{
            $voucher = new Voucher;
            //dd($voucher);
            $voucher->project_id = 18;
            $voucher->bank_id = $request->bank_id_dr;
            $voucher->perticulers = $request->perticulers;
            $voucher->cheque_no=$request->check_no;
            $voucher->voucher_date = $request->voucher_date;
            $voucher->voucher_number = $request->voucher_no;
            $voucher->voucher_type = 'DR';
            $voucher->save();


            $voucher_detail = new VoucherDetail;
            $voucher_detail->voucher_id = $voucher->id;
            $voucher_detail->lname_id = 56;
            $voucher_detail->amount = $request->amount;
            // $voucher_detail->journal_type = $request->lname_id_dr[$i] ? 'DR' : '';
            $voucher_detail->save();
            
           $voucher = new Voucher;
            //dd($voucher);
            $voucher->project_id = 18;
            $voucher->bank_id = 11;
            $voucher->perticulers = $request->perticulers;
            $voucher->voucher_date = $request->voucher_date;
            $voucher->voucher_number = $request->voucher_no;
            $voucher->voucher_type = 'CR';
            $voucher->save();

            $voucher_detail = new VoucherDetail;
            $voucher_detail->voucher_id = $voucher->id;
            $voucher_detail->lname_id = 55;
            $voucher_detail->amount = $request->amount;
            // $voucher_detail->journal_type = $request->lname_id_dr[$i] ? 'DR' : '';
            $voucher_detail->save();
        }

        return redirect()->back()->with('success','Contra Voucher added successfully!');
    }

    public function edit($id)
    {
        $data['contra'] = Contra::find($id);
        $data['banks'] = Bank::all();
        $data['projects'] = Project::all();
         return view('contra_voucher.edit_contra_voucher', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'project_name' => 'required',
            'bank_id_dr' => 'required',
            'bank_id_cr' => 'required',
            'voucher_no' => 'required',
            'voucher_date' => 'required',
            'amount' => 'required',
            'perticulers' => 'required',
        ]);

        $contras = Contra::find($id);
        $contras->project_id = $request->project_name;
        $contras->bank_id_dr = $request->bank_id_dr;
        $contras->bank_id_cr = $request->bank_id_cr;
        $contras->check_no = $request->check_no;
        $contras->voucher_no = $request->voucher_no;
        $contras->voucher_date = $request->voucher_date;
        $contras->amount = $request->amount;
        $contras->perticulers = $request->perticulers;
        $contras->save();

        return redirect()->route('allContraVoucher')->with('success','Contra Voucher updated successfully!');
    }


    public function delete($id)
    {
        $contra = Contra::find($id);
        if($contra){
            $contra->delete();
            return redirect()->back()->with('success','Contra Voucher deleted successfully!');
        }else{
            return redirect()->back()->with('danger','Contra Voucher do not deleted!');
        }
    }
}
