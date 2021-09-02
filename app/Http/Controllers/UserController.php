<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function totalUser(){
        $totalUser=User::count();
        return response()->json($totalUser);
    }

    //User profile method
    public function profile(){
        return view('profile.profile');
    }

    public function updateProfile(Request $request){
        $this->validate($request,[
            'name'=>'required|min:6',
            'email'=>'required|email|unique:users,email,'.Auth::id(),
        ]);
          $users=User::find(Auth::id());
          $users->name=$request->name;
          $users->email=$request->email;
          $users->save();
          //Session::flash('success','Successfully Profile Updated');
          return redirect()->back()->with('success','Successfully Profile Updated!');
    }

    //Update password
    public function updatePassword(Request $request){
        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required||min:6|confirmed',
            // 'password_confirmation'=>'required|same:new_password',

        ]);
        $hashedPassword=Auth::user()->password;
        if(Hash::check($request->old_password,$hashedPassword)){
                if(! Hash::check($request['password'],$hashedPassword)){
                $users = User::find(Auth::guard('web')->user()->id);
                $users->password = Hash::make($request->password);
                $users->save();
                Session::flash('success','You Have Successfully Changed The Password');
                Auth::logout();
                return redirect()->route('login');
               }else{
                Session::flash('error','New Password Cannot Be The Same As Old Pass');
                return redirect()->back();
               }
        }else{
            Session::flash('error','Old Password Does Not Matched');
            return redirect()->back();
        }
    }

    public function create(){
        $data['sip_buddi'] = DB::select("SELECT * FROM sip_buddies");
        return view('system_user.new',$data);
    }

    public function store(Request $request){
      $this->validate($request,[
          'name'=>'required',
          'email'=>'required|email|unique:users,email',
          'password'=>'required',
          'role'=>'required',
          'sip_buddi'=>'required'
      ]);
        //Store the data into the database
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->status=1;
        $user->role=$request->role;
        $user->sip_buddi=$request->sip_buddi;
        $user->save();
        return redirect()->back()->with('success', 'User role added successfully');
    }

    public function index() {
        return view('system_user.all_user_list');
    }

    public function allUserDataTable(){
    	$users=User::orderBy('id','DESC')
            ->whereNotIn('role',['admin'])
            ->get();
        //dd($users);
        $data_table_render= DataTables::of($users)
            ->addColumn('DT_RowIndex',function ($row){
                //return '<input type="checkbox" id="qst_id_'.$row["id"].'">';
            })
            //add edit and delte option
                ->addColumn('action',function ($row){
                    $edit_url=url('edit/system/user/'.$row['id']);
                return '<a href="'.$edit_url.'" class="btn btn-info btn-xs"><i class="far fa-edit"></i></a>'."&nbsp&nbsp;".
                     '<button onClick="deleteUser('.$row['id'].')" class="btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
            })
            ->rawColumns(['DT_RowIndex','action'])
            ->addIndexColumn()
            ->make(true);
        return $data_table_render;   
    }

    public function edit($id){
        $user=User::find($id);
        if ($user) {
            $data2['sip_buddi'] = DB::select("SELECT * FROM sip_buddies");
        }
        return view('system_user.edit_system_user',$data2)->with('user',$user);
    }

    public function update(Request $request, $id){
        // $this->validate($request,[
        //     'name'=>'required',
        //     'email'=>'required|email|unique:users,email',
        //     'role'=>'required',
        //     'sip_buddi'=>'required'
        // ]);
        //Store the data into the database
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
//        $user->active=1;
        $user->role=$request->role;
        $user->sip_buddi=$request->sip_buddi;
        $user->save();
        return redirect()->back()->with('success', 'User data Updated Successfully');
    }

    public function deleteUser(Request $request){
        $user=User::findOrFail($request->id);
        //dd($user);
        if ($user){
            $user->delete();
            return response()->json('success',201);
        }else{
            return response()->json('error',422);
        }
    }

    function getCallData(Request $request){
        $agent = isset($request->agent)? $request->agent: '-1';
        $query = "SELECT source as phone FROM callrecords where destination like '".$agent."%' and status='new' order by id desc limit 1";
        $result = DB::select($query);

        if(count($result)>0) {
            echo json_encode($result);
        }
        else {
            echo 'NA-NA';
        }  
    }

    function updateCall(Request $request){
        $agent = isset($request->agent)? $request->agent: '-1';
        $query2  = "UPDATE callrecords SET status='done' where destination like '".$agent."%' ";
        $result2 = DB::select($query2);
    }
}
