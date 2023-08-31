<?php

namespace App\Http\Controllers\Customers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    public function index(){
        return view('Customer.Auth.LoginClient');
   }
   public function store(Request $request){
        $this->validate($request,[
            'email' =>'required|email|exists:customers,email',
            'password' => 'required',
        ]);

        $creds = $request->only('email','password');
        if(Auth::guard('customer')->attempt($request->only('email','password'),$request->remember)){
            return redirect()->route('CustomerDashboard.index')->with('LogSuccess',  'Welcome !!'.' '.auth('customer')->user()->name);
        }else{
            return back()->with('fail', 'Incorrect credentials');
        }
    }
}
