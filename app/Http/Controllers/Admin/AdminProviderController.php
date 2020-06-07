<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Provider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProviderController extends Controller
{
    public function create_provider()
    {
        return view('admin.provider.createprovider');
    }

    public function save_provider(Request $request)
    {
        $new_provider = new Provider();
        $new_provider->name = $request->name;
        $new_provider->email = $request->email;
        $new_provider->phone_number = $request->phone_number;
        $new_provider->dob = $request->dob;
        $new_provider->gender = $request->gender;
        $new_provider->password = Hash::make($request->password);
        $new_provider->address = $request->address;
        $new_provider->save();

        return back()->with('success','Provider Successfully Created');

    }


    public function manage_provider()
    {
        $all_providers = Provider::orderBy('id','desc')->paginate(15);
        return view('admin.provider.manageProvider',compact('all_providers'));
    }

    public function edit_provider($id)
    {
        $users = Provider::where('id',$id)->first();
        return view('admin.provider.editProvider',compact('users'));
    }

    public function update_provider(Request $request)
    {
        $update_provider = Provider::where('id',$request->provider_edit_id)->first();
        $update_provider->name = $request->name;
        $update_provider->email = $request->email;
        $update_provider->phone_number = $request->phone_number;
        $update_provider->dob = $request->dob;
        $update_provider->gender = $request->gender;
        $update_provider->password = Hash::make($request->password);
        $update_provider->address = $request->address;
        $update_provider->save();

        return back()->with('success','Provider Successfully Updated');
    }


    public function delete_provider(Request $request)
    {
        $delete_provider = Provider::where('id',$request->provider_delete_id)->first();
        $delete_provider->delete();
        return back()->with('success','Provider Successfully Deleted');
    }

    public function password_change_provider(Request $request)
    {
        $npass = $request->npass;
        $cpass = $request->cpass;

        if ($npass != $cpass){
            return back()->with('alert','Password Not Match');
        }else{
            $user = Provider::where('id',$request->provider_password_id)->first();
            $user->password = Hash::make($npass);
            $user->save();

            return back()->with('success','Password Successfully Changed');

        }
    }






}
