<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultivendorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:multivendorstore',['except'=>['logout']]);
    }


    public function showLoginform()
    {
        return view('auth.multivendorLogin');
    }



    //this is login function for admin which is given email and password to get data form database
    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if(Auth::guard('multivendorstore')->attempt(['store_email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect(route('multivendorstore.dashboard'));
        }else{
            return redirect()->back();
        }



    }

    public function logout()
    {
        Auth::guard('multivendorstore')->logout();
        return redirect(route('multivendorstore.login'));
    }


}
