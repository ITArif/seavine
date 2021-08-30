<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Adjustment;

class AdjustmentController extends Controller
{

    public function index()
    {
        $data['adjustments'] = DB::select("SELECT projects.name AS project_name, lnames.name AS l_name, lgroups.name AS l_group_name, adjustments.* FROM adjustments
            INNER JOIN lnames ON lnames.id = adjustments.lname_id
            INNER JOIN projects ON projects.id = adjustments.project_id
            INNER JOIN lgroups ON lgroups.id = adjustments.type");
        // dd($adjustments);
        return view('adjustment.all_adjustment',$data);
    }

    public function create()
    {
        $data['ledger_groups'] = DB::table('lgroups')->get();
        $data['ledger_names'] = DB::table('lnames')->get();
        $data['projects'] = DB::table('projects')->get();

        return view('adjustment.add_adjusment',$data);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $adjustments = new Adjustment;
        $adjustments->project_id = $request->project_name;
        $adjustments->lname_id = $request->ledger_name;
        $adjustments->type = $request->type;
        $adjustments->amount = $request->amount;
        $adjustments->percentage = $request->percentage;
        $adjustments->particulars = $request->particular;
        $adjustments->save();

        return redirect()->back()->with('success','Adjustment successfully added');

    }
    public function edit($id)
    {
        $data['adjustment'] = Adjustment::find($id);
        $data['ledger_groups'] = DB::table('lgroups')->get();
        $data['ledger_names'] = DB::table('lnames')->get();
        $data['projects'] = DB::table('projects')->get();
        return view('adjustment.edit_adjustment',$data);
    }

    public function update(Request $request, $id)
    {
        $adjustments = Adjustment::find($id);
        $adjustments->project_id = $request->project_name;
        $adjustments->lname_id = $request->ledger_name;
        $adjustments->type = $request->type;
        $adjustments->amount = $request->amount;
        $adjustments->percentage = $request->percentage;
        $adjustments->particulars = $request->particular;
        $adjustments->save();

        return redirect('adjustment/all')->with('success','Adjustment successfully updated!');
    }

    public function delete($id)
    {
        // dd($id);
        $adjustment = Adjustment::find($id);
        if($adjustment){
            $adjustment->delete();
            return redirect()->back()->with('success','Adjustment successfully deleted!');
        }else{
            return redirect()->back()->with('danger','Adjustment do not deleted!');
        }
    }
}
