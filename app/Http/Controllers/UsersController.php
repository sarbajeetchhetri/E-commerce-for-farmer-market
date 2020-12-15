<?php

namespace App\Http\Controllers;

use App\Profile_model;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Feedback;

class UsersController extends Controller
{
    public function index(){
        $menu_active=7;
        return view('users.login_register',compact('menu_active'));
    }

    public function farmerloginpage(){
        $menu_active=8;
        return view('users.farmerlogin',compact('menu_active'));
    }

    public function register(Request $request){
        $this->validate($request,[
           'name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
        ]);
        $input_data=$request->all();
        $input_data['password']=Hash::make($input_data['password']);
        User::create($input_data);
        return back()->with('message','Registered successfully!');
    }
     public function login(Request $request){
            $data=$request->all();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'usertype'=>'2'])){
                Session::put('farmerSession',$data['email']);
                return redirect('/farmerpanel');
            }
            elseif(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'usertype'=>'3'])){
                Session::put('frontSession',$data['email']);
                return redirect('/viewcart');
            }
            else{
                return back()->with('message','Account is not Valid!');
            }
        }

   /* public function login(Request $request){
        $input_data=$request->all();
        if(Auth::attempt(['email'=>$input_data['email'],'password'=>$input_data['password']])){
            Session::put('frontSession',$input_data['email']);
            return redirect('/viewcart');
        }else{
            return back()->with('message','Account is not Valid!');
        }
    }*/
    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        return redirect('/login_page');
    }
    public function account(){
        $menu_active=9;
        $countries=DB::table('countries')->get();
        $user_login=User::where('id',Auth::id())->first();
        return view('users.account',compact('menu_active','countries','user_login'));
    }
    public function updateprofile(Request $request,$id){
        $this->validate($request,[
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'mobile'=>'required|numeric',
        ]);
        $input_data=$request->all();
        DB::table('users')->where('id',$id)->update(['name'=>$input_data['name'],
            'address'=>$input_data['address'],
            'city'=>$input_data['city'],
            'state'=>$input_data['state'],
            'country'=>$input_data['country'],
            'pincode'=>$input_data['pincode'],
            'mobile'=>$input_data['mobile']]);
        return back()->with('message','Profile Updated successfully!');

    }
    public function updatepassword(Request $request,$id){
        $oldPassword=User::where('id',$id)->first();
        $input_data=$request->all();
        if(Hash::check($input_data['password'],$oldPassword->password)){
            $this->validate($request,[
               'newPassword'=>'required|min:6|max:12|confirmed'
            ]);
            $new_pass=Hash::make($input_data['newPassword']);
            User::where('id',$id)->update(['password'=>$new_pass]);
            return back()->with('message','Password Updated successfully!');
        }else{
            return back()->with('oldpassword','Old Password is Inconrrect!');
        }
    }

    public function feedbackpage(){
        $menu_active=11;
        return view('frontEnd.createfeedback',compact('menu_active'));
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
        return redirect()->route('supplierfeedbackpage')->with('message','Feedback Sent Successfully!');
    }
    public function Listfeedback(){
        $menu_active=12;
        $lists=Feedback::all()->where('uid',auth::user()->id);
        return view('frontEnd.feedbacklist',compact('menu_active','lists'));
    }

    public function replyindex(){
        $menu_active=13;
        $replies=Feedback::all()->where('to_user','supplier')->where('reply','');
        return view('frontEnd.index_reply',compact('menu_active','replies'));
    }
public function replyform($id){
        $menu_active=13;
        $replyid=Feedback::findOrFail($id);
        return view('frontEnd.replyform',compact('menu_active','replyid'));
    }

    public function updatereply(Request $request, $id){
        $this->validate($request,[
            'reply'=>'required',
        ]);
        $input_data=$request->all();
        $id1=$request['id'];
        DB::table('feedbacks')->where('id',$id1)->update(['reply'=>$input_data['reply']]);
        return redirect()->route('supplierreplyindex')->with('message','Feedback Replied Successfully!');

    }


}
