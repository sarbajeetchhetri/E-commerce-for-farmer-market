<?php

namespace App\Http\Controllers;

use App\User;
use App\country;
use App\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $menu_active=1;
        return view('backEnd.admin.index',compact('menu_active'));
    }
    public function settings(){
        $menu_active=0;
        return view('backEnd.admin.setting',compact('menu_active'));
    }
    public function countryindex(){
        $menu_active=2;
        return view('backEnd.admin.country_index',compact('menu_active'));
    }

    public function feedbackpage(){
        $menu_active=3;
        return view('backEnd.admin.createfeedbacks',compact('menu_active'));
    }

    public function verifies(){
        $menu_active=4;
        $farmers=User::all()->where('email_verified_at','')->where('usertype','2');
        return view('backEnd.admin.verify',compact('menu_active','farmers'));
    
}

    public function chkPassword(Request $request){
        $data=$request->all();
        $current_password=$data['pwd_current'];
        $email_login=Auth::user()->email;
        $check_pwd=User::where(['email'=>$email_login])->first();
        if(Hash::check($current_password,$check_pwd->password)){
            echo "true"; die();
        }else {
            echo "false"; die();
        }
    }
    public function updatAdminPwd(Request $request){
        $data=$request->all();
        $current_password=$data['pwd_current'];
        $email_login=Auth::user()->email;
        $check_password=User::where(['email'=>$email_login])->first();
        if(Hash::check($current_password,$check_password->password)){
            $password=bcrypt($data['pwd_new']);
            User::where('email',$email_login)->update(['password'=>$password]);
            return redirect('/admin/settings')->with('message','Password Update Successfully');
        }else{
            return redirect('/admin/settings')->with('message','InCorrect Current Password');
        }
    }

public function updateverification($id){
        DB::table('users')->where('id',$id)->update(['email_verified_at'=>1]);
        return back()->with('message','Verified successfully!');

    }
public function addcountry(Request $request)
    {
        $this->validate($request,[
            'country_code'=>'required|unique:countries,country_code',
            'country_name'=>'required|unique:countries,country_name',
        ]);
        $data=$request->all();
        country::create($data);
        return redirect()->route('countryhome')->with('message','Country Added Successfully!');
    }

public function addfeedbacks(Request $request)
    {
        $this->validate($request,[
            'feedbacks'=>'required',
        ]);
        $data=$request->all();
        $data['uid']=auth::user()->id;
        $data['email']=auth::user()->email;
        Feedback::create($data);
        return redirect()->route('feedbackpage')->with('message','Feedback Sent Successfully!');
    }

public function Listfeedback(){
        $menu_active=3;
        $lists=Feedback::all()->where('uid',auth::user()->id);
        return view('backEnd.admin.feedbacklist',compact('menu_active','lists'));
    }

public function replyindex(){
        $menu_active=3;
        $replies=Feedback::all()->where('to_user','admin')->where('reply','');
        return view('backEnd.admin.index_reply',compact('menu_active','replies'));
    }
public function replyform($id){
        $menu_active=3;
        $replyid=Feedback::findOrFail($id);
        return view('backEnd.admin.replyform',compact('menu_active','replyid'));
    }

    public function updatereply(Request $request, $id){
        $this->validate($request,[
            'reply'=>'required',
        ]);
        $input_data=$request->all();
        $id1=$request['id'];
        DB::table('feedbacks')->where('id',$id1)->update(['reply'=>$input_data['reply']]);
        return redirect()->route('replyindex')->with('message','Feedback Replied Successfully!');

    }

    /*public function login(Request $request){
        if($request->isMethod('post')){
            $data=$request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
                echo 'success'; die();
            }else{
                return redirect('admin')->with('message','Account is Incorrect!');
            }
        }else{
            return view('backEnd.login');
        }
    }*/
}
