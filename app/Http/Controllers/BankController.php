<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function showAddBank()
    {
        return view('bank.view');
    }

    public function create()
    {
        return view('bank.create');
    }

    public function bankInfoData(){
        $bankinfo = Bank::all();
        $data_table_render= DataTables::of($bankinfo)
            ->addColumn('DT_RowIndex',function ($row){
                return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=url('banks/edit-bank/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="destroy('.$row['id'].')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);

        $bank = new Bank;
        $bank->name = $request->name;
        $bank->description = $request->description;
        $bank->account_no = $request->account_no;
        $bank->save(); 

        return redirect()->back()->with('success','Bank/Cash Added Successfully!');
    }

    public function editBank($id)
    {
        $bank = Bank::find($id);
        return view('bank.edit',compact('bank'));
    }

    public function update(Request $request)
    {
        $bank = Bank::findOrFail($request->id);

        $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);

        $bank->update($request->all());

        return redirect()->route('showAddBank')->with('success','Bank/Cash Updated Successfully!');
    }

    public function destroy(Request $request)
    {
        $bank = Bank::findOrFail($request->id);
        if($bank){
            $bank->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }

    public function totalBankOrCash(){
        $totalBankOrCash=Bank::count();
        return response()->json($totalBankOrCash);
    }
}
