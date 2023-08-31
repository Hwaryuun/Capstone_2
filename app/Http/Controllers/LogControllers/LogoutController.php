<?php

namespace App\Http\Controllers\LogControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(){
        auth()->logout();
        return redirect()->route('Login.index');
    }
}
