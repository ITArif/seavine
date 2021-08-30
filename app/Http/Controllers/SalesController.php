<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Project;
use App\Product;
use App\Employee;
use App\Customer;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;

class SalesController extends Controller
{
    public function showAddSales()
    {
        $data['projects'] = Project::all();
        $data['products'] = Product::all();
        $data['employees'] = Employee::all();
        $data['customers'] = Customer::all();
        return view('sales.add_sales',$data);
    }

    public function allSales()
    {
        // $data['sales'] = Sale::all();

        $data['salesInformations'] = DB::select(
            "SELECT sales.*,
        projects.id AS project_id, (projects.name) AS project_name , 
        (employees.id) AS employee_id, (employees.name) AS employee_name,
         (products.id) AS product_id,
         customers.id AS customer_id, (customers.name) AS customer_name
         FROM sales
         LEFT JOIN employees ON sales.employee_id = employees.id
         LEFT JOIN projects ON sales.project_id = projects.id
         LEFT JOIN products ON sales.product_id = products.id
         LEFT JOIN customers ON sales.customer_id = customers.id"
             );
        //dd($data['salesInformations']);

        return view('sales.all_sales',$data);
    }

    public function salesData(){
        // $data['sales'] = Sale::all();

        $data = DB::select(
            "SELECT sales.*,
        projects.id AS project_id, (projects.name) AS project_name , 
        (employees.id) AS employee_id, (employees.name) AS employee_name,
         (products.id) AS product_id,
         customers.id AS customer_id, (customers.name) AS customer_name
         FROM sales
         LEFT JOIN employees ON sales.employee_id = employees.id
         LEFT JOIN projects ON sales.project_id = projects.id
         LEFT JOIN products ON sales.product_id = products.id
         LEFT JOIN customers ON sales.customer_id = customers.id"
             );
             foreach($data as $dat){
                $customData[]=[
                    'id'=>$dat->id,
                    'customer_name'=>$dat->customer_name,
                    'project_name'=>$dat->project_name,
                    'product_id'=>$dat->product_id,
                    'employee_name'=>$dat->employee_name,
                    'sells_date'=>$dat->sells_date,
                    'description'=>$dat->description,
                ];
            }
        //dd($allData);
        $data_table_render= DataTables::of($customData)
            ->addColumn('DT_RowIndex',function ($row){
                //return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=url('sales/edit-sales/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="deleteSales('.$row['id'].')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    public function storeSales(Request $request)
    {
// dd($request->all());
        $this->validate($request,[
            'customer_name' => 'required',
            'project_name' => 'required',
            'product_name' => 'required',
            'employee_name' => 'required',
            'description' => 'required',
            // 'amount' => 'required',
            // 'amount_paid' => 'required',
            // 'amount_due' => 'required',
            'sales_date' => 'required',
        ]);

        $sales = new Sale;
        $sales->customer_id = $request->customer_name;
        $sales->project_id = $request->project_name;
        $sales->product_id = $request->product_name;
        $sales->employee_id = $request->employee_name;
        $sales->description = $request->description;
        // $sales->amount = $request->amount;
        // $sales->amount_paid = $request->amount_paid;
        // $sales->amount_due = $request->amount_due;
        $sales->status = $request->status;
        $sales->sells_date = $request->sales_date;
        $sales->save(); 

        return redirect()->back()->with('success','Sells Added Successfully!');
    }

    public function editSales($id)
    {        
        $data['projects'] = Project::all();
        $data['products'] = Product::all();
        $data['employees'] = Employee::all();
        $data['customers'] = Customer::all();
        $data['sales'] = Sale::find($id);
         return view('sales.edit_sales',$data);
    }

    public function updateSales(Request $request, $id)
    {
        $this->validate($request,[
            'customer_name' => 'required',
            'project_name' => 'required',
            'product_name' => 'required',
            'employee_name' => 'required',
            'description' => 'required',
            // 'amount' => 'required',
            // 'amount_paid' => 'required',
            // 'amount_due' => 'required',
            'sales_date' => 'required',
        ]);

        $sales = Sale::find($id);
        $sales->customer_id = $request->customer_name;
        $sales->project_id = $request->project_name;
        $sales->product_id = $request->product_name;
        $sales->employee_id = $request->employee_name;
        $sales->description = $request->description;
        // $sales->amount = $request->amount;
        // $sales->amount_paid = $request->amount_paid;
        // $sales->amount_due = $request->amount_due;
        $sales->status = $request->status;
        $sales->sells_date = $request->sales_date;
        $sales->save(); 

        return redirect()->route('allSales')->with('success','Sells Updated Successfully!');
    }
    public function deleteSales($id)
    {
        $sales = Sale::find($id);
        if($sales){
            $sales->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }

    public function totalSells(){
        $totalSells=Sale::count();
        return response()->json($totalSells);
    }
}
