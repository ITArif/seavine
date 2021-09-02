<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CallerType;
use DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class CallerTypeController extends Controller
{
    public function index_caller(){
        return view('caller_type.all_caller');
    }

     public function allCallDataTable(){
        $callerTypes = CallerType::all();
        $data_table_render= DataTables::of($callerTypes)
            ->addColumn('DT_RowIndex',function ($row){
                //return '<input type="checkbox" name="customer_ids[]" value="'.$row->id.'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=route('edit.caller',$row->id);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="deleteCaller('.$row->id.')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    public function create(){
        return view('caller_type.create_callertype');
    }

    public function store(Request $request){
        $this->validate($request,[
            'caller' => 'required'
        ]);

        $callers = new CallerType;
        $callers->caller = $request->caller;
        $callers->save(); 
        return redirect()->back()->with('success','Caller Data Added Successfully!');
    }

    public function edit($id){
        $callers = CallerType::find($id);
         return view('caller_type.edit_caller',compact('callers'));
    }

     public function update(Request $request, $id)
    {
        $this->validate($request,[
            'caller' => 'required',
        ]);

        $callers = CallerType::find($id);
        $callers->caller = $request->caller;
        $callers->save(); 
        return redirect()->route('allCaller')->with('success','Caller Data Updated Successfully!');
    }

    public function deleteCaller($id)
    {
        $callers = CallerType::find($id);
        if ($callers){
            $callers->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }
}
