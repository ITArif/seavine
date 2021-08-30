<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ltype;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class LtypeController extends Controller
{
    public function showAddLedger()
    {
        $ltypes = Ltype::all();
        // dd($ltypes);
        return view('ltype.view',compact('ltypes'));
    }

    public function create()
    {
        return view('ltype.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'code' => 'required'
        ]);

        $ltype = new Ltype;
        $ltype->name = $request->name;
        $ltype->code = $request->code;
        $ltype->save(); 

        return redirect()->back()->with('success','Ledger Type Added Successfully!');
    }

    public function ladgerInfoData(){
        $ladgerinfo = Ltype::all();
        $data_table_render= DataTables::of($ladgerinfo)
            ->addColumn('DT_RowIndex',function ($row){
                return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=url('ledgertype/edit/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="destroy('.$row['id'].')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    public function editladger($id)
    {
        $ltype = Ltype::find($id);
        return view('ltype.edit',compact('ltype'));
    }

    public function update(Request $request)
    {
        $ltype = Ltype::findOrFail($request->id);
        $this->validate($request,[
            'name' => 'required',
            'code' => 'required'
        ]);

        $ltype->update($request->all());

        return redirect()->route('showAddLadger')->with('success','Ledger Type Updated Successfully!');
    }

    public function destroy(Request $request)
    {
        $ledgerType = Ltype::findOrFail($request->id);
        if($ledgerType){
            $ledgerType->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }

    public function totalLadgerType(){
        $totalLedgerType=Ltype::count();
        return response()->json($totalLedgerType);
    }
}
