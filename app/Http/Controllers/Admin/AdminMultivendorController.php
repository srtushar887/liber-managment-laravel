<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\multivendor_delivery_boy;
use App\multivendor_food_item;
use App\multivendor_restaurent;
use App\multivendor_store;
use App\Multivendor_store_account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminMultivendorController extends Controller
{

    public function store_create()
    {
        return view('admin.store.createStore');
    }

    public function store_save(Request $request)
    {

        $new_store = new Multivendor_store_account();
        $new_store->store_name = $request->store_name;
        $new_store->store_email = $request->store_email;
        $new_store->store_address = $request->store_address;
        $new_store->store_phone_number = $request->store_phone_number;
        $new_store->store_phone_number = $request->store_phone_number;
        $new_store->lat = $request->lat;
        $new_store->lng = $request->longitute_;
        $new_store->password = Hash::make($request->password);
        $new_store->show_pass = $request->password;
        $new_store->save();

        return back()->with('success','Store Successfully Created');

    }

    public function store_manage()
    {
        $stores = Multivendor_store_account::orderBy('id','desc')->paginate(15);
        return view('admin.store.manageStore',compact('stores'));
    }

    public function store_edit($id)
    {
        $store = Multivendor_store_account::where('id',$id)->first();
        return view('admin.store.editStore',compact('store'));
    }

    public function store_update(Request $request)
    {


        $update_store = Multivendor_store_account::where('id',$request->store_edit_id)->first();
        $update_store->store_name = $request->store_name;
        $update_store->store_email = $request->store_email;
        $update_store->store_address = $request->store_address;
        $update_store->store_phone_number = $request->store_phone_number;
        $update_store->store_phone_number = $request->store_phone_number;
        $update_store->lat = $request->lat;
        $update_store->lng = $request->lng;
        $update_store->password = Hash::make($request->password);
        $update_store->show_pass = $request->password;
        $update_store->save();

        return back()->with('success','Store Successfully Updated');
    }


    public function store_delete(Request $request)
    {
        $delete_store = Multivendor_store_account::where('id',$request->store_delete_id)->first();
        $delete_store->delete();
        return back()->with('success','Store Successfully Deleted');
    }


    public function deliver_boy()
    {
        $delivery_boys = multivendor_delivery_boy::orderBy('id','desc')->paginate(15);
        return view('admin.store.deliveryBoy',compact('delivery_boys'));
    }

    public function deliver_boy_save(Request $request)
    {
        $new_del_boy = new multivendor_delivery_boy();
        $new_del_boy->name = $request->name;
        $new_del_boy->email = $request->email;
        $new_del_boy->phone = $request->phone;
        $new_del_boy->password = Hash::make($request->password);
        $new_del_boy->save();

        return back()->with('success','Deliver Boy Successfully Created');

    }

    public function deliver_boy_update(Request $request)
    {
        $del_boy_update = multivendor_delivery_boy::where('id',$request->del_boy_edit_id)->first();
        $del_boy_update->name = $request->name;
        $del_boy_update->email = $request->email;
        $del_boy_update->phone = $request->phone;
        $del_boy_update->save();

        return back()->with('success','Deliver Boy Successfully Updated');
    }

    public function deliver_boy_delete(Request $request)
    {
        $delete_del_boy = multivendor_delivery_boy::where('id',$request->del_boy_delete_id)->first();
        $delete_del_boy->delete();
        return back()->with('success','Deliver Boy Successfully Deleted');
    }


    public function store_orders()
    {
        return view('admin.store.storeOrders');
    }










}
