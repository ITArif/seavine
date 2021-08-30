<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\RequisitionDetails;
use Illuminate\Support\Facades\DB;
class RequisitionDetailsController extends Controller
{
    public function showAddRequisitionDetails()
    {
        $data['items'] = Item::all();
        return view('requisition_details.add_requisition_details',$data);
    }

    public function allRequisitionDetails()
    {
        // $requisitionDetails = RequisitionDetails::all();

        $data['requisitionDetails'] = DB::select(
            "SELECT requisition_details.*,
             items.id AS item_id, (items.item_name) AS item_name
            FROM requisition_details
            LEFT JOIN items ON requisition_details.item_id = items.id");
        return view('requisition_details.all_requisition_details',$data);
    }

    public function storeRequisitionDetails(Request $request)
    {
        $this->validate($request,[
            'item_name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'rate' => 'required',
            'amount' => 'required',
        ]);
        
        $requisitionDetails = new RequisitionDetails;
        $requisitionDetails->item_id = $request->item_name;
        $requisitionDetails->description = $request->description;
        $requisitionDetails->quantity = $request->quantity;
        $requisitionDetails->rate = $request->rate;
        $requisitionDetails->amount = $request->amount;
        $requisitionDetails->save(); 

        return redirect()->back()->with('success','Item Added Successfully!');
    }

    public function editRequisitionDetails($id)
    {
        $data['requisitionDetails'] = RequisitionDetails::find($id);
        $data['items'] = Item::all();
         return view('requisition_details.edit_requisition_details',$data);
    }

    public function updateRequisitionDetails(Request $request, $id)
    {
        $this->validate($request,[
            'item_name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'rate' => 'required',
            'amount' => 'required',
        ]);

        $requisitionDetails = RequisitionDetails::find($id);
        $requisitionDetails->item_id = $request->item_name;
        $requisitionDetails->description = $request->description;
        $requisitionDetails->quantity = $request->quantity;
        $requisitionDetails->rate = $request->rate;
        $requisitionDetails->amount = $request->amount;
        $requisitionDetails->save(); 

        return redirect()->route('allRequisitionDetails')->with('success','Requisition Details Updated Successfully!');
    }
    public function deleteRequisitionDetails($id)
    {
        $requisitionDetails = RequisitionDetails::find($id);
        $requisitionDetails->delete();
        return redirect()->back()->with('danger','Requisition Details Deleted Successfully!');
    }
}
