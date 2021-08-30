<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LandBuyBook;
use Yajra\DataTables\Facades\DataTables;

class LandBuyBookController extends Controller
{
    public function showAddLandbuybook()
    {
        return view('land_buy_book.add_land_buy_book');
    }

    public function allLandbuybook()
    {
        $land_buy_books = LandBuyBook::all();
        return view('land_buy_book.all_land_buy_book', compact('land_buy_books'));
    }

    public function landbuybookData(){
        $land_buy_books = LandBuyBook::all();
        $data_table_render= DataTables::of($land_buy_books)
            ->addColumn('DT_RowIndex',function ($row){
                return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=url('landbuybook/edit-landbuybook/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="deleteLandowner('.$row['id'].')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    public function storeLandbuybook(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'file_no' => 'required',
            'donor_name' => 'required',
            'recipient_name' => 'required',
            'documents_no' => 'required',
            'date' => 'required',
            'cs_khatian' => 'required',
            'rs_khatian' => 'required',
            'sa_khatian' => 'required',
            'sa_dag' => 'required',
            'rs_dag' => 'required',
            'amount_of_land' => 'required',
            'rejection_amount' => 'required',
            'hold_no' => 'required'

        ]);
        
        $LandBuyBooks = new LandBuyBook;
        $LandBuyBooks->file_no = $request->file_no;
        $LandBuyBooks->donor_name = $request->donor_name;
        $LandBuyBooks->recipient_name = $request->recipient_name;
        $LandBuyBooks->documents_no = $request->documents_no;
        $LandBuyBooks->date = $request->date;
        $LandBuyBooks->cs_khatian = $request->cs_khatian;
        $LandBuyBooks->rs_khatian = $request->rs_khatian;
        $LandBuyBooks->sa_khatian = $request->sa_khatian;
        $LandBuyBooks->sa_dag = $request->sa_dag;
        $LandBuyBooks->rs_dag = $request->rs_dag;
        $LandBuyBooks->amount_of_land = $request->amount_of_land;
        $LandBuyBooks->rejection_amount = $request->rejection_amount;
        $LandBuyBooks->hold_no = $request->hold_no;
        $LandBuyBooks->save(); 

        return redirect()->back()->with('success','Land buy book added successfully!');
    }

    public function editLandbuybook($id)
    {
        $land_buy_book = LandBuyBook::find($id);
         return view('land_buy_book.edit_land_buy_book', compact('land_buy_book'));
    }

    public function updateLandbuybook(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request,[
            'file_no' => 'required',
            'donor_name' => 'required',
            'recipient_name' => 'required',
            'documents_no' => 'required',
            'date' => 'required',
            'cs_khatian' => 'required',
            'rs_khatian' => 'required',
            'sa_khatian' => 'required',
            'sa_dag' => 'required',
            'rs_dag' => 'required',
            'amount_of_land' => 'required',
            'rejection_amount' => 'required',
            'hold_no' => 'required'
        ]);

        $LandBuyBooks = LandBuyBook::find($id);
        $LandBuyBooks->file_no = $request->file_no;
        $LandBuyBooks->donor_name = $request->donor_name;
        $LandBuyBooks->recipient_name = $request->recipient_name;
        $LandBuyBooks->documents_no = $request->documents_no;
        $LandBuyBooks->date = $request->date;
        $LandBuyBooks->cs_khatian = $request->cs_khatian;
        $LandBuyBooks->rs_khatian = $request->rs_khatian;
        $LandBuyBooks->sa_khatian = $request->sa_khatian;
        $LandBuyBooks->sa_dag = $request->sa_dag;
        $LandBuyBooks->rs_dag = $request->rs_dag;
        $LandBuyBooks->amount_of_land = $request->amount_of_land;
        $LandBuyBooks->rejection_amount = $request->rejection_amount;
        $LandBuyBooks->hold_no = $request->hold_no;
        $LandBuyBooks->save(); 

        return redirect()->route('allLandbuybook')->with('success','Land buy book updated successfully!');
    }
    public function deleteLandbuybook($id)
    {
        $landBuyBook = LandBuyBook::find($id);
        if($landBuyBook){
            $landBuyBook->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }
}
