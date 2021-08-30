<?php

namespace App\Http\Controllers;

use App\Lname;
use App\Ltype;
use App\Lgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class LnameController extends Controller
{
    public function showAddLedgerName()
    {
        $lnames = DB::table('lnames')
            ->join('lgroups', 'lnames.lgroup_id', '=', 'lgroups.id')
            ->join('ltypes', 'ltypes.id', '=', 'lnames.ltype_id')
            ->select('lnames.*', 'lgroups.name as lgroup_name', 'ltypes.name as ltype_name')
            ->get();
        //$ladgerName=$lnames;

        // dd($lnames);
        return view('lname.view',compact('lnames'));
    }
    public function create()
    {
        $lgroups = Lgroup::all();
        $ltypes = Ltype::all();
        return view('lname.create', compact('lgroups','ltypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'ltype_id' => 'required',
            'lgroup_id' => 'required',
            'is_debit' => 'required'
        ]);

        //dd($request);

        $lname = new Lname;
        $lname->name = $request->name;
        $lname->is_debit = $request->is_debit;
        $lname->unit = $request->unit;
        $lname->ltype_id = $request->ltype_id;
        $lname->lgroup_id = $request->lgroup_id;
        $lname->save(); 

        return redirect()->back()->with('success','Ledger Group Added Successfully!');
    }

    public function ladgerNameInfoData(){
        //$ladgernameinfo = Lname::all();
        $lnames = DB::table('lnames')
            ->join('lgroups', 'lnames.lgroup_id', '=', 'lgroups.id')
            ->join('ltypes', 'ltypes.id', '=', 'lnames.ltype_id')
            ->select('lnames.*', 'lgroups.name as lgroup_name', 'ltypes.name as ltype_name')
            ->get();
            foreach($lnames as $lname){
                $customData[]=[
                    'id'=>$lname->id,
                    'name'=>$lname->name,
                    'ltype_name'=>$lname->ltype_name,
                    'lgroup_name'=>$lname->lgroup_name,
                    'ltype_name'=>$lname->ltype_name,
                    'unit'=>$lname->unit,
                    'is_debit'=>$lname->is_debit,
                ];
            }
        $data_table_render= DataTables::of($customData)
            ->addColumn('DT_RowIndex',function ($row){
                return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=url('ledgername/edit/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="destroyladgerName('.$row['id'].')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->editColumn('is_debit',function ($row){
                $htmlElement="";
                 if ($row['is_debit']==1){
                     $htmlElement='<button class="btn btn-success btn-xs">DR</button>';
                 }else{
                     $htmlElement='<button class="btn btn-danger btn-xs">CR</button>';
                 }
                 return $htmlElement;
            })
            ->rawColumns(['DT_RowIndex','action','is_debit'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lname  $lname
     * @return \Illuminate\Http\Response
     */
    public function show(Lname $lname)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lname  $lname
     * @return \Illuminate\Http\Response
     */
    public function editladgerName($id)
    {
        $lname = Lname::find($id);
        $lgroups = Lgroup::all();
        $ltypes = Ltype::all();
        
        return view('lname.edit',compact('lname','lgroups','ltypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lname  $lname
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $lname = Lname::findOrFail($request->id);

        $this->validate($request,[
            'name' => 'required',
            'ltype_id' => 'required',
            'lgroup_id' => 'required',
            'is_debit' => 'required'
        ]);

        $lname->update($request->all());

        return redirect()->route('showAddLadgerName')->with('success','Ledger Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lname  $lname
     * @return \Illuminate\Http\Response
     */
    public function destroyladgerName(Request $request)
    {
        $lname = Lname::findOrFail($request->id);
        if($lname){
          $lname->delete();
          return response()->json('success',201);
        }else{
            return response()->json('error',422);
            }
    }

    public function totalLedgerName(){
        $totalLedgerName=Lname::count();
        return response()->json($totalLedgerName);
    }
}
