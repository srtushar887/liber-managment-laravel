<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function custom_login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect(route('admin.dashboard'));
        }elseif (Auth::guard('multivendorstore')->attempt(['store_email'=>$request->email,'password'=>$request->password],$request->remember)) {
            return redirect(route('multivendorstore.dashboard'));
        }elseif (Auth::guard('provider')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
            return redirect(route('provider.dashboard'));
        }elseif (Auth::guard('restaurant')->attempt(['restaurant_email'=>$request->email,'password'=>$request->password],$request->remember)) {
            return redirect(route('restaurant.dashboard'));
        }
        else{
            return redirect()->back();
        }
    }
}
