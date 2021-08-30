<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Yajra\DataTables\Facades\DataTables;

class ItemController extends Controller
{
    public function showAddItem()
    {
        return view('item.add_item');
    }

    public function allItem()
    {
        $items = Item::all();
        return view('item.all_item', compact('items'));
    }
   
    public function itemData(){
        $items = Item::all();
        $data_table_render= DataTables::of($items)
            ->addColumn('DT_RowIndex',function ($row){
                return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=url('item/edit-item/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="deleteItem('.$row['id'].')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    public function storeItem(Request $request)
    {
        $this->validate($request,[
            'item_name' => 'required',
            'description' => 'required',
            'unit' => 'required',
        ]);
        
        $items = new Item;
        $items->item_name = $request->item_name;
        $items->description = $request->description;
        $items->unit = $request->unit;
        $items->save(); 

        return redirect()->back()->with('success','Item Added Successfully!');
    }

    public function editItem($id)
    {
        $item = Item::find($id);
         return view('item.edit_item', compact('item'));
    }

    public function updateItem(Request $request, $id)
    {
        // dd($request->all());
        // exit;
        $this->validate($request,[
            'item_name' => 'required',
            'description' => 'required',
            'unit' => 'required',
        ]);

        $items = Item::find($id);
        $items->item_name = $request->item_name;
        $items->description = $request->description;
        $items->unit = $request->unit;
        $items->save(); 

        return redirect()->route('allItem')->with('success','Item Updated Successfully!');
    }
    public function deleteItem($id)
    {
        $item = Item::find($id);
        if($item){
            $item->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }
}
