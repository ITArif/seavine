<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index(){
        $sip_buddi = Auth::user()->sip_buddi;
        $sip = $sip_buddi;
        return view('dashboard')->with(compact('sip'));
    }
}
