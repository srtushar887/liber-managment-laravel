<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminDriverController extends Controller
{
    public function create_driver()
    {
        return view('admin.driver.createDriver');
    }

    public function save_driver(Request $request)
    {
        $new_driver = new Driver();
        if($request->hasFile('driving_license')){
            $image = $request->file('driving_license');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('driving_license');
            $directory = 'assets/admin/images/license/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_driver->driving_license = $imgUrl;
        }


        $new_driver->name = $request->name;
        $new_driver->email = $request->email;
        $new_driver->phone_number = $request->phone_number;
        $new_driver->dob = $request->dob;
        $new_driver->gender = $request->gender;
        $new_driver->driver_type = $request->driver_type;
        $new_driver->password = Hash::make($request->password);
        $new_driver->address = $request->address;
        $new_driver->save();
        return back()->with('success','Driver Successfully Created');


    }

    public function manage_driver()
    {
        $drivers = Driver::orderBy('id','desc')->paginate(15);
        return view('admin.driver.manageDriver',compact('drivers'));
    }

    public function edit_driver($id)
    {
        $driver = Driver::where('id',$id)->first();
        return view('admin.driver.editDriver',compact('driver'));
    }

    public function update_driver(Request $request)
    {
        $update_driver = Driver::where('id',$request->driver_edit_id)->first();
        if($request->hasFile('driving_license')){
            @unlink($update_driver->driving_license);
            $image = $request->file('driving_license');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('driving_license');
            $directory = 'assets/admin/images/license/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_driver->driving_license = $imgUrl;
        }


        $update_driver->name = $request->name;
        $update_driver->email = $request->email;
        $update_driver->phone_number = $request->phone_number;
        $update_driver->dob = $request->dob;
        $update_driver->gender = $request->gender;
        $update_driver->driver_type = $request->driver_type;
        $update_driver->address = $request->address;
        $update_driver->save();
        return back()->with('success','Driver Successfully Updated');
    }

    public function delete_driver(Request $request)
    {
        $delete_driver = Driver::where('id',$request->driver_delete_id)->first();
        @unlink($delete_driver->driving_license);
        $delete_driver->delete();
        return back()->with('success','Driver Successfully Deleted');
    }


    public function password_change_driver(Request $request)
    {
        $npas = $request->npass;
        $cpas = $request->cpass;

        if ($npas != $cpas)
        {
            return back()->with('alert','Password Not Match');
        }else{
            $admin_pass = Driver::where('id',$request->driver_password_id)->first();
            $admin_pass->password = Hash::make($npas);
            $admin_pass->save();
            return back()->with('success','Password Successfully Changed');
        }
    }






}
