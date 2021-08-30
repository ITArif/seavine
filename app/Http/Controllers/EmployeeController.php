<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Yajra\DataTables\Facades\DataTables;


class EmployeeController extends Controller
{
    public function showAddEmployee()
    {
        return view('employee.add_employee');
    }

    public function allEmployee()
    {
        $employees = Employee::all();
        return view('employee.all_employee', compact('employees'));
    }

    public function employeeData(){
        $employees = Employee::all();
        $data_table_render= DataTables::of($employees)
            ->addColumn('DT_RowIndex',function ($row){
                return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=url('employee/edit-employee/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="deleteEmployee('.$row['id'].')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    public function storeEmployee(Request $request)
    {
// dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'position' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'nid' => 'required',
            'department' => 'required',
        ]);

        $employees = new Employee;
        $employees->name = $request->name;
        $employees->position = $request->position;
        $employees->address = $request->address;
        $employees->phone = $request->phone;
        $employees->email = $request->email;
        $employees->nid = $request->nid;
        $employees->department = $request->department;
        $employees->save(); 

        return redirect()->back()->with('success','Employee Added Successfully!');
    }

    public function editEmployee($id)
    {
        $employee = Employee::find($id);
         return view('employee.edit_employee',compact('employee'));
    }

    public function updateEmployee(Request $request, $id)
    {
        // dd($request->all());

        $this->validate($request,[
            'name' => 'required',
            'position' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'nid' => 'required',
            'department' => 'required',
        ]);

        $employees = Employee::find($id);
        $employees->name = $request->name;
        $employees->position = $request->position;
        $employees->address = $request->address;
        $employees->phone = $request->phone;
        $employees->email = $request->email;
        $employees->nid = $request->nid;
        $employees->department = $request->department;
        $employees->save(); 

        return redirect()->route('allEmployee')->with('success','Employee Updated Successfully!');
    }
    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        if($employee){
            $employee->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }
}
