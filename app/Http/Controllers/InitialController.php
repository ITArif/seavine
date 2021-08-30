<?php

namespace App\Http\Controllers;

use App\Initial;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class InitialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $projects = Project::all();
        return view('initial.create_initial',compact('projects'));
    }

    public function store(Request $request){

        $this->validate($request,[
            'cash_at_bank' => 'required',
            'cash_in_hand' => 'required',
            'total_initial_balance'=> 'required'
        ]);
        // 2. Data insert
        $initial=new Initial();
        $initial->cash_at_bank=$request->cash_at_bank;
        $initial->cash_in_hand=$request->cash_in_hand;
        $initial->total_initial_balance=$request->total_initial_balance;
        $initial->project_id=$request->project_id;
        $initial->save();
        return redirect()->back()->with('success', 'Initial Balance Created successfully');
    }

    public function listData(){

        return view ('initial.initial_list_datatable');
    }

    public function initialData(){
     // $initials=Initial::all();
     // $projects = Project::all();

    $initialsBalance = DB::select("SELECT t.id, t.`project_name`, t.`totalCAB`, t.`totalCIH`, t.`t_i_b`
        FROM
        (
        SELECT `i`.*, `p`.`name` AS `project_name`, SUM(`i`.`cash_at_bank`) AS `totalCAB`, SUM(`i`.`cash_in_hand`) AS `totalCIH`, `i`.`total_initial_balance` AS `t_i_b`
        FROM `initials` AS `i`
        INNER JOIN `projects` AS `p`
        ON `p`.`id` = `i`.`project_id` GROUP BY i.project_id) AS t;");

    $data_table_render= DataTables::of($initialsBalance)
        ->addColumn('DT_RowIndex',function ($row){
            //return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
        })
        //add edit and delte option
            ->addColumn('action',function ($row){
                $edit_url=url('edit/initial/balance/'.$row->id);
            return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                 '<button onClick="deleteInitialBalance('.$row->id.')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['DT_RowIndex','action'])
        ->addIndexColumn()
        ->make(true);
    return $data_table_render;
    
    }

    public function edit($id){
        $data['projects'] = Project::all();
        $data['initials'] = Initial::find($id);
        return view('initial.edit_initial',$data);
    }

    public function updateinitials(Request $request, $id){
        $this->validate($request,[
            'cash_at_bank' => 'required',
            'cash_in_hand' => 'required',
            'total_initial_balance'=> 'required'
        ]);

        $initials = Initial::find($id);
        $initials->cash_at_bank = $request->cash_at_bank;
        $initials->cash_in_hand = $request->cash_in_hand;
        $initials->save(); 
        return redirect()->route('list.data')->with('success','All Initial Balance Updated Successfully!');
    }


    public function deleteInitialBalance($id){
        $initial=Initial::find($id);
        if ($initial){
            $initial->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Initial  $initial
     * @return \Illuminate\Http\Response
     */
    public function show(Initial $initial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Initial  $initial
     * @return \Illuminate\Http\Response
     */
    // public function edit(Initial $initial)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Initial  $initial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Initial $initial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Initial  $initial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Initial $initial)
    {
        //
    }
}
