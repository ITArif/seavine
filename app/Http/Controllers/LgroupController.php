<?php

namespace App\Http\Controllers;

use App\Lgroup;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class LgroupController extends Controller
{

    public function showAddLedgerGroup()
    {
        $lgroups = Lgroup::all();
        // dd($lgroups);
        return view('lgroup.view',compact('lgroups'));
    }

    public function create()
    {
        return view('lgroup.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'code' => 'required'
        ]);

        $lgroup = new Lgroup;
        $lgroup->name = $request->name;
        $lgroup->code = $request->code;
        $lgroup->save(); 

        return redirect()->back()->with('success','Ledger Group Added Successfully!');
    }

    public function ladgerGroupInfoData(){
        $ladgergroupinfo = Lgroup::all();
        $data_table_render= DataTables::of($ladgergroupinfo)
            ->addColumn('DT_RowIndex',function ($row){
                return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=url('ledgergroup/edit/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="destroyladgerGroup('.$row['id'].')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lgroup  $lgroup
     * @return \Illuminate\Http\Response
     */
    public function show(Lgroup $lgroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lgroup  $lgroup
     * @return \Illuminate\Http\Response
     */
    public function editladgerGroup($id)
    {
        $lgroup = Lgroup::find($id);
        return view('lgroup.edit',compact('lgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lgroup  $lgroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $lgroup = Lgroup::findOrFail($request->id);

        $this->validate($request,[
            'name' => 'required',
            'code' => 'required'
        ]);

        $lgroup->update($request->all());

        return redirect()->route('showAddLadgerGroup')->with('success','Ledger Group Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lgroup  $lgroup
     * @return \Illuminate\Http\Response
     */
    public function destroyladgerGroup(Request $request)
    {
        $ledgerGroup = Lgroup::findOrFail($request->id);
        if($ledgerGroup){
            $ledgerGroup->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }

    public function totalLedgerGroup(){
        $totalLedgerGroup=Lgroup::count();
        return response()->json($totalLedgerGroup);
    }
}
