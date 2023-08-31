<?php

namespace App\Http\Controllers\Customers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMail;
use Illuminate\Support\Facades\Auth;

class CustomerRegisterController extends Controller
{
    // public $uid;
    public function index(){
        return view('Customer.Auth.Register');
   }
   public function store(Request $request){
    $this->validate($request,[
       
        'firstname' => 'required',
        'lastname' => 'required',
        'nmb' => 'required',
        'st' => 'required',
        'brgy' => 'required',
        'city' => 'required',
        'rgn' => 'required',
        'contactnumber' => 'required',
        'birthdate' => 'required',
        'email' => 'required|email|unique:customers,email',
        'password' => 'required',
        'confirm_password' => 'required|same:password',
    ]);
   
    $registerusr = array(
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'address' => $request->nmb.' '.$request->st.' '.$request->brgy.'  '.$request->city.' '.$request->rgn,
        'contactnumber' => $request->contactnumber,
        'birthdate' => $request->birthdate,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    );

    $user = CustomerModel::create($registerusr);   

    Mail::to($request->email)->send(new EmailVerificationMail($user));

    return back()->with('regis',' Registered Successfully, Check Your Gmail For Verification !');
  }

  public function Verify($verification_code){ 

    $users = CustomerModel::where("id", $verification_code)->update(["email_verified_at" => \Carbon\Carbon::now()]);   
    // Auth::login($users);
    return redirect()->Route('CustomerLogin.index')->with('LogSuccess', 'Email Verified Successfully !');
  }
}
