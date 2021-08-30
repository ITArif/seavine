<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\Project;
use App\Bank;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $projects = Project::all();
        $banks = Bank::all();
        return view('transaction.transaction',compact('projects','banks'));
    }
    

}
