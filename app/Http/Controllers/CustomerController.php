<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Project;
use DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function showAddCustomer()
    {
        $projects=Project::all();
        //dd($projects);
        return view('customer.add_customer',compact('projects'));
    }

    public function allCustomer()
    {
        $customers = Customer::all();
        return view('customer.all_customer', compact('customers'));
    }

    public function customerData(){
        //$customers = Customer::all();
        $customers = DB::select("SELECT customers.*,
        projects.id AS project_id, (projects.name) AS project_name
         FROM customers
         LEFT JOIN projects ON customers.project_name = projects.id");
        //dd($data);
        $data_table_render= DataTables::of($customers)
            ->addColumn('DT_RowIndex',function ($row){
                return '<input type="checkbox" name="customer_ids[]" value="'.$row->id.'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=route('editCustomer',$row->id);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="deleteCustomer('.$row->id.')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }


    public function storeCustomer(Request $request)
    {
   // dd($request->all());
        $this->validate($request,[
            'project_name' => 'required',
            'application_date' => 'required',
            'address' => 'required',
            'no_of_land_share' => 'required',
            'total_price' => 'required',
            'booking_payment' => 'required',
            'registration_cost' => 'required',
            'checque_no' => 'required',
            'total_amount' => 'required',
            'branch' => 'required',
            'made_of_payment' => 'required',
            'name' => 'required',
            'date' => 'required',
            'phone' => 'required',
            'office' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'emergency_phone' => 'required',
            'full_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'spouse_name' => 'required',
            'date_of_birth' => 'required',
            'religion' => 'required',
            'nationality' => 'required',
            'occupation' => 'required',
            'nid_no' => 'required',
            'etin_no' => 'required',
            'passport_no' => 'required',
            'mailing_address' => 'required',
            'road_villege' => 'required',
            'parmenat_address' => 'required',
            'area_thana' => 'required',
            'district' => 'required',
            'post_code' => 'required',
            'nominee' => 'required',
            'relation' => 'required',
            'owner_id_no' => 'required',
            'land_share' => 'required',
            'no_of_installment' => 'required',
            'installment_amount' => 'required',
            'money_recipt_no' => 'required',
        ]);

        $customers = new Customer;
        $customers->project_name = $request->project_name;
        $customers->application_date = $request->application_date;
        $customers->application_id = $request->application_id;
        $customers->address = $request->address;
        $customers->no_of_land_share = $request->no_of_land_share;
        $customers->total_price = $request->total_price;
        $customers->booking_payment = $request->booking_payment;
        $customers->registration_cost = $request->registration_cost;
        $customers->checque_no = $request->checque_no;
        $customers->total_amount = $request->total_amount;
        $customers->branch = $request->branch;
        $customers->made_of_payment = $request->made_of_payment;
        $customers->name = $request->name;
        $customers->date = $request->date;
        $customers->phone = $request->phone;
        $customers->office = $request->office;
        $customers->mobile = $request->mobile;
        $customers->email = $request->email;
        $customers->emergency_phone = $request->emergency_phone;
        $customers->full_name = $request->full_name;
        $customers->father_name = $request->father_name;
        $customers->mother_name = $request->mother_name;
        $customers->spouse_name = $request->spouse_name;
        $customers->date_of_birth = $request->date_of_birth;
        $customers->religion = $request->religion;
        $customers->nationality = $request->nationality;
        $customers->occupation = $request->occupation;
        $customers->nid_no = $request->nid_no;
        $customers->etin_no = $request->etin_no;
        $customers->passport_no = $request->passport_no;
        $customers->mailing_address = $request->mailing_address;
        $customers->road_villege = $request->road_villege;
        $customers->parmenat_address = $request->parmenat_address;
        $customers->area_thana = $request->area_thana;
        $customers->district = $request->district;
        $customers->post_code = $request->post_code;
        $customers->nominee = $request->post_code;
        $customers->relation = $request->relation;
        $customers->owner_id_no = $request->owner_id_no;
        $customers->land_share = $request->land_share;
        $customers->no_of_installment = $request->no_of_installment;
        $customers->installment_amount = $request->installment_amount;
        $customers->money_recipt_no = $request->money_recipt_no;
        // file upload
        if ($request->hasFile('image')){
            $photo = $request->file('image');
            $filename = time().".".$photo->getClientOriginalExtension();
            $destination_path = public_path('uploads/customer');
            $photo->move($destination_path,$filename);
            $customers->image = $filename;
        }
        //dd($customers);
        $customers->save(); 
        return redirect()->back()->with('success','Customer Added Successfully!');
    }

    public function editCustomer($id)
    {
        $projects=Project::all();
        $customer = Customer::find($id);
         return view('customer.edit_customer',compact('customer','projects'));
    }

    public function updateCustomer(Request $request, $id)
    {
        // $this->validate($request,[
        //     'name' => 'required',
        //     'father_spouse' => 'required',
        //     'address' => 'required',
        //     'phone' => 'required',
        //     'email' => 'required',
        //     'nid' => 'required',
        //     'permanent_address' => 'required',
        // ]);

        $customers = Customer::find($id);
        $customers->project_name = $request->project_name;
        $customers->application_date = $request->application_date;
        $customers->application_id = $request->application_id;
        $customers->address = $request->address;
        $customers->no_of_land_share = $request->no_of_land_share;
        $customers->total_price = $request->total_price;
        $customers->booking_payment = $request->booking_payment;
        $customers->registration_cost = $request->registration_cost;
        $customers->checque_no = $request->checque_no;
        $customers->total_amount = $request->total_amount;
        $customers->branch = $request->branch;
        $customers->made_of_payment = $request->made_of_payment;
        $customers->name = $request->name;
        $customers->date = $request->date;
        $customers->phone = $request->phone;
        $customers->office = $request->office;
        $customers->mobile = $request->mobile;
        $customers->email = $request->email;
        $customers->emergency_phone = $request->emergency_phone;
        $customers->full_name = $request->full_name;
        $customers->father_name = $request->father_name;
        $customers->mother_name = $request->mother_name;
        $customers->spouse_name = $request->spouse_name;
        $customers->date_of_birth = $request->date_of_birth;
        $customers->religion = $request->religion;
        $customers->nationality = $request->nationality;
        $customers->occupation = $request->occupation;
        $customers->nid_no = $request->nid_no;
        $customers->etin_no = $request->etin_no;
        $customers->passport_no = $request->passport_no;
        $customers->mailing_address = $request->mailing_address;
        $customers->road_villege = $request->road_villege;
        $customers->parmenat_address = $request->parmenat_address;
        $customers->area_thana = $request->area_thana;
        $customers->district = $request->district;
        $customers->post_code = $request->post_code;
        $customers->nominee = $request->post_code;
        $customers->relation = $request->relation;
        $customers->owner_id_no = $request->owner_id_no;
        $customers->land_share = $request->land_share;
        $customers->no_of_installment = $request->no_of_installment;
        $customers->installment_amount = $request->installment_amount;
        $customers->money_recipt_no = $request->money_recipt_no;

        if ($image = $request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = time().".".$extension;
            $path = public_path('uploads/customer');
            $image->move($path, $imageName);

            if(file_exists('uploads/customer/'.$customers->image) AND !empty($customers->image)){
                unlink('uploads/customer/'.$customers->image);
            }
            $customers->image = $imageName;
            // dd('ok');
        }
        else{
            $customers->image = $customers->image;
        }
        $customers->save(); 
        return redirect()->route('allCustomer')->with('success','Customer Updated Successfully!');
    }
    public function deleteCustomer($id)
    {
        $customer = Customer::find($id);
        if ($customer){
            $customer->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }
}
