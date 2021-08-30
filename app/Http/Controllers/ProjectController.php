<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function showAddProject()
    {
        return view('project.add_project');
    }

    public function allProject()
    {
        $projects = Project::all();
        return view('project.all_project', compact('projects'));
    }

    public function projectData(){
        $projects = Project::all();
        $data_table_render= DataTables::of($projects)
            ->addColumn('DT_RowIndex',function ($row){
                return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=url('project/edit-project/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="deleteProject('.$row['id'].')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;
    }

    public function storeProject(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'facing' => 'required',
            'building_height' => 'required',
            'land_area' => 'required',
            'launching_date' => 'required',
            'hand_over_date' => 'required',
        ]);
        
        $projects = new Project;
        $projects->name = $request->name;
        $projects->description = $request->description;
        $projects->location = $request->location;
        $projects->facing = $request->facing;
        $projects->building_height = $request->building_height;
        $projects->land_area = $request->land_area;
        $projects->launching_date = $request->launching_date;
        $projects->hand_over_date = $request->hand_over_date;
        $projects->save(); 

        return redirect()->back()->with('success','Project Added Successfully!');
    }

    public function editProject($id)
    {
        $project = Project::find($id);
         return view('project.edit_project', compact('project'));
    }

    public function updateProject(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'facing' => 'required',
            'building_height' => 'required',
            'land_area' => 'required',
            'launching_date' => 'required',
            'hand_over_date' => 'required',
        ]);

        $projects = Project::find($id);
        $projects->name = $request->name;
        $projects->description = $request->description;
        $projects->location = $request->location;
        $projects->facing = $request->facing;
        $projects->building_height = $request->building_height;
        $projects->land_area = $request->land_area;
        $projects->launching_date = $request->launching_date;
        $projects->hand_over_date = $request->hand_over_date;
        $projects->save(); 

        return redirect()->route('allProject')->with('success','Project Updated Successfully!');
    }
    public function deleteProject($id)
    {
        $project = Project::find($id);
        if($project){
            $project->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }

    //total project count method
    public function totalProject(){
        $postsProjects = Project::count();
         return response()->json($postsProjects);
    }
}
