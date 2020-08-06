<?php

namespace App\Http\Controllers\Admin;

use App\delivery_boy;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDeliveryBoyController extends Controller
{
    public function create_delivery_boy()
    {
        return view('admin.deliveryboy.createDeliveryBoy');
    }

    public function save_delivery_boy(Request $request)
    {
        $new_delivery_boy = new delivery_boy();
        $new_delivery_boy->name = $request->name;
        $new_delivery_boy->email = $request->email;
        $new_delivery_boy->phone_number = $request->phone_number;
        $new_delivery_boy->dob = $request->dob;
        $new_delivery_boy->gender = $request->gender;
        $new_delivery_boy->password = Hash::make($request->password);
        $new_delivery_boy->show_password = $request->password;
        $new_delivery_boy->address = $request->address;
        $new_delivery_boy->save();
        return back()->with('success','Delivery Boy Successfully Created');


    }


    public function manage_delivery_boy()
    {
        $delivery_boys = delivery_boy::orderBy('id','desc')->paginate(20);
        return view('admin.deliveryboy.manageDeliveryBoy',compact('delivery_boys'));
    }

    public function edit_delivery_boy($id)
    {
        $users = delivery_boy::where('id',$id)->first();
        return view('admin.deliveryboy.editDeliveryBoy',compact('users'));
    }

    public function update_delivery_boy(Request $request)
    {
        $update_delivery_boy = delivery_boy::where('id',$request->deliveryboy_edit_id)->first();
        $update_delivery_boy->name = $request->name;
        $update_delivery_boy->email = $request->email;
        $update_delivery_boy->phone_number = $request->phone_number;
        $update_delivery_boy->dob = $request->dob;
        $update_delivery_boy->gender = $request->gender;
        $update_delivery_boy->password = Hash::make($request->password);
        $update_delivery_boy->show_password = $request->password;
        $update_delivery_boy->address = $request->address;
        $update_delivery_boy->save();
        return back()->with('success','Delivery Boy Successfully Updated');
    }

    public function delete_delivery_boy(Request $request)
    {
        $delete_delivery_boy = delivery_boy::where('id',$request->deliveryboy_delete_id)->first();
        $delete_delivery_boy->delete();
        return back()->with('success','Delivery Boy Successfully Deleted');
    }

    public function change_password_delivery_boy(Request $request)
    {
        $npass = $request->npass;
        $cpass = $request->cpass;

        if ($npass != $cpass){
            return back()->with('alert','Password Not Match');
        }else{
            $user = delivery_boy::where('id',$request->deliveryboy_password_id)->first();
            $user->password = Hash::make($npass);
            $user->show_password = $npass;
            $user->save();

            return back()->with('success','Password Successfully Changed');

        }
    }






}
