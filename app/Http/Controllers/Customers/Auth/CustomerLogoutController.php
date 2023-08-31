<?php

namespace App\Http\Controllers\Customers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerLogoutController extends Controller
{
    public function store(){
        Auth::guard('customer')->logout();
        return redirect()->route('CustomerLogin.index');
    }
}
