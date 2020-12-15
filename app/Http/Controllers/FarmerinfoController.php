<?php

namespace App\Http\Controllers;
use App\User;
use App\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Orders_model;
use App\Products_model;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\DB;

class FarmerinfoController extends Controller
{
	public function indexfarmer(){
        $menu_active=1;
        return view('backEnd.index',compact('menu_active'));
    }

    public function farmerfeedbackpage(){
        $menu_active=7;
        return view('backEnd.farmercreatefeedbacks',compact('menu_active'));
    }

    public function checkorders(){
        $verified=User::findOrFail(auth::user()->id);
        if($verified['image']=='') {
            return redirect()->route('farmer_home')->with('message','Please update Your KYC first!');
        }
        elseif($verified['email_verified_at']==''){
             return redirect()->route('farmer_home')->with('message','Your Kyc is being processed please wait for a while! Thank You !!');
            
        }
        
        else{
        $menu_active=5;
        $checkorders=Orders_model::all()->where('farmer_id',auth::user()->id);
        return view('backEnd.checkorder',compact('menu_active','checkorders'));
    }
    }

    public function settingsfarmer(){
        $menu_active=0;
        return view('backEnd.setting',compact('menu_active'));
    }
    public function chkPasswordfarmer(Request $request){
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
    public function updatefarmerPwd(Request $request){
        $data=$request->all();
        $current_password=$data['pwd_current'];
        $email_login=Auth::user()->email;
        $check_password=User::where(['email'=>$email_login])->first();
        if(Hash::check($current_password,$check_password->password)){
            $password=bcrypt($data['pwd_new']);
            User::where('email',$email_login)->update(['password'=>$password]);
            return redirect('/farmer/settings')->with('message','Password Update Successfully');
        }else{
            return redirect('/farmer/settings')->with('message','InCorrect Current Password');
        }
    
}

public function farmerprofile(){
      $menu_active=6;
        $countries=DB::table('countries')->get();
        $user_login=User::where('id',Auth::id())->first();
        return view('backEnd.KYC',compact('menu_active','countries','user_login'));
    }
    public function updatekyc(Request $request,$id){
        $update_Kyc=User::findOrFail(auth::user()->id);
        $this->validate($request,[
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'pincode'=>'required',
            'mobile'=>'required|numeric',
            'dob'=>'required',
            'gfname'=>'required',
            'faname'=>'required',
            'mname'=>'required',
            'sfund'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:1000',
        ]);
        $input_data=$request->all();
if($update_Kyc['image']==''){
        if($request->file('image')){
                $image=$request->file('image');
                if($image->isValid()){
                    $fileName=time().'-'.str_slug($input_data['mobile'],"-").'.'.$image->getClientOriginalExtension();
                    $image_path=public_path('farmers/citizenship/'.$fileName);
                    //Resize Image
                    Image::make($image)->save($image_path);
                    $input_data['image']=$fileName;
                }
            }
        }else{
            $input_data['image']=$update_Kyc['image'];
        }

        DB::table('users')->where('id',auth::user()->id)->update([
            'address'=>$input_data['address'],
            'city'=>$input_data['city'],
            'state'=>$input_data['state'],
            'country'=>$input_data['country'],
            'pincode'=>$input_data['pincode'],
            'mobile'=>$input_data['mobile'],
            'dob'=>$input_data['dob'],
            'gfname'=>$input_data['gfname'],
            'faname'=>$input_data['faname'],
            'mname'=>$input_data['mname'],
            'sfund'=>$input_data['sfund'],
            'image'=>$input_data['image']
        ]);
        return back()->with('message','KYC Updated successfully!');

    }

public function logout(){
        Auth::logout();
        Session::forget('farmerSession');
        return redirect('/farmer_login');
    }

    public function deleteCitizen($id){
        //Products_model::where(['id'=>$id])->update(['image'=>'']);
        $delete_image=User::findOrFail(auth::user()->id);
        $image=public_path().'/farmers/citizenship/'.$delete_image->image;
        if($delete_image){
            $delete_image->image='';
            $delete_image->save();
            ////// delete image ///
            unlink($image);
        }
        return back();
    }

public function farmeraddfeedbacks(Request $request)
    {
        $this->validate($request,[
            'feedbacks'=>'required',
        ]);
        $data=$request->all();
        $data['uid']=auth::user()->id;
        $data['email']=auth::user()->email;
        Feedback::create($data);
        return redirect()->route('farmerfeedbackpage')->with('message','Feedback Sent Successfully!');
    }

public function farmerListfeedback(){
        $menu_active=7;
        $lists=Feedback::all()->where('uid',auth::user()->id);
        return view('backEnd.farmerfeedbacklist',compact('menu_active','lists'));
    }

public function farmerreplyindex(){
        $menu_active=7;
        $replies=Feedback::all()->where('to_user','farmer')->where('reply','');
        return view('backEnd.farmerindex_reply',compact('menu_active','replies'));
    }
public function farmerreplyform($id){
        $menu_active=7;
        $replyid=Feedback::findOrFail($id);
        return view('backEnd.farmerreplyform',compact('menu_active','replyid'));
    }
    public function farmerupdatereply(Request $request, $id){
        $this->validate($request,[
            'reply'=>'required',
        ]);
        $input_data=$request->all();
        $id1=$request['id'];
        DB::table('feedbacks')->where('id',$id1)->update(['reply'=>$input_data['reply']]);
        return redirect()->route('farmerreplyindex')->with('message','Feedback Replied Successfully!');

    }
}
