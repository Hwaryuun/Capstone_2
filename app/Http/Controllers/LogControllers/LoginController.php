<?php


namespace App\Http\Controllers\LogControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }
    public function index(){
        return view('Admin.Components.Login');
   }
   public function store(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('status','Invalid username or password');
        }
        return redirect()->route('Overview.index')->with('Log','Log in Successfully');
   }

}
