<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Item;
use App\Vendor;
use App\Order;
use DB;

class OrderController extends Controller
{
    public function showAddOrder()
    {
        $data['projects'] = Project::all();
        $data['vendors'] = Vendor::all();
        $data['item_names'] = Item::all();

        return view('order.add_order',$data);
    }

    public function allOrder()
    {
        return view('order.all_order');
    }

    public function totalOrder(){
        $totalOrder=Order::count();
        return response()->json($totalOrder);
    }
}
