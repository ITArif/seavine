<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use Yajra\DataTables\Facades\DataTables;

class VendorController extends Controller
{
    public function showAddVendor()
    {
        return view('vendor.add_vendor');
    }

    public function allVendor()
    {
        $vendors = Vendor::all();
        return view('vendor.all_vendor', compact('vendors'));
    }

    public function vendorData(){
        $vendors = Vendor::all();
        $data_table_render= DataTables::of($vendors)
            ->addColumn('DT_RowIndex',function ($row){
                return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=url('vendor/edit-vendor/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="deleteVendor('.$row['id'].')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    public function storeVendor(Request $request)
    {
// dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'website' => 'required',
            'description' => 'required',
        ]);

        $employees = new Vendor;
        $employees->name = $request->name;
        $employees->company_name = $request->company_name;
        $employees->address = $request->address;
        $employees->phone = $request->phone;
        $employees->email = $request->email;
        $employees->website = $request->website;
        $employees->description = $request->description;
        $employees->save(); 

        return redirect()->back()->with('success','Vendor Added Successfully!');
    }

    public function editVendor($id)
    {
        $vendor = Vendor::find($id);
         return view('vendor.edit_vendor',compact('vendor'));
    }

    public function updateVendor(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'website' => 'required',
            'description' => 'required',
        ]);

        $employees = Vendor::find($id);
        $employees->name = $request->name;
        $employees->company_name = $request->company_name;
        $employees->address = $request->address;
        $employees->phone = $request->phone;
        $employees->email = $request->email;
        $employees->website = $request->website;
        $employees->description = $request->description;
        $employees->save(); 

        return redirect()->route('allVendor')->with('success','Vendor Updated Successfully!');
    }
    public function deleteVendor($id)
    {
        $vendor = Vendor::find($id);
        if($vendor){
            $vendor->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }
}
