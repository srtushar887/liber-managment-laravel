<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\multivendor_food_item;
use App\multivendor_restaurent;
use App\Resturant_account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminRestaurantController extends Controller
{
    public function food_item()
    {
        $food_items = multivendor_food_item::orderBy('id','desc')->paginate(15);
        return view('admin.multivendor.foodItem',compact('food_items'));
    }

    public function food_item_save(Request $request)
    {
        $new_food_item = new multivendor_food_item();
        if($request->hasFile('food_item_image')){
            $image = $request->file('food_item_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('food_item_image');
            $directory = 'assets/admin/images/fooditem/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_food_item->food_item_image = $imgUrl;
        }

        $new_food_item->food_item_name = $request->food_item_name;
        $new_food_item->save();
        return back()->with('success','Food Item Created');


    }

    public function food_item_update(Request $request)
    {
        $update_food_item = multivendor_food_item::where('id',$request->food_item_edit_id)->first();
        if($request->hasFile('food_item_image')){
            @unlink($update_food_item->food_item_image);
            $image = $request->file('food_item_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('food_item_image');
            $directory = 'assets/admin/images/fooditem/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_food_item->food_item_image = $imgUrl;
        }

        $update_food_item->food_item_name = $request->food_item_name;
        $update_food_item->save();
        return back()->with('success','Food Item Updated');
    }

    public function food_item_delete(Request $request)
    {
        $delete_food_item = multivendor_food_item::where('id',$request->food_item_delete_id)->first();
        @unlink($delete_food_item->food_item_image);
        $delete_food_item->delete();
        return back()->with('success','Food Item Deleted');
    }

    public function create_restaurant(Request $request)
    {
        return view('admin.restaurant.createRestaurant');
    }

    public function restaurant_save(Request $request)
    {
        $new_res = new Resturant_account();
        $new_res->restaurant_name = $request->restaurant_name;
        $new_res->restaurant_email = $request->restaurant_email;
        $new_res->restaurant_address = $request->restaurant_address;
        $new_res->restaurant_phone_number = $request->restaurant_phone_number;
        $new_res->restaurant_phone_number = $request->restaurant_phone_number;
        $new_res->password = Hash::make($request->password);
        $new_res->show_pass = $request->password;
        $new_res->save();

        return back()->with('success','Restaurant Successfully Created');

    }

    public function restaurant_manage()
    {
        $restaurants = Resturant_account::orderBy('id','desc')->paginate(15);
        return view('admin.restaurant.manageRestaurant',compact('restaurants'));
    }

    public function restaurant_edit($id)
    {
        $restaurant = Resturant_account::where('id',$id)->first();
        return view('admin.restaurant.editRestaurant',compact('restaurant'));
    }

    public function restaurant_update(Request $request)
    {
        $update_restaurant = Resturant_account::where('id',$request->restaurant_edit_id)->first();
        $update_restaurant->restaurant_name = $request->restaurant_name;
        $update_restaurant->restaurant_email = $request->restaurant_email;
        $update_restaurant->restaurant_address = $request->restaurant_address;
        $update_restaurant->restaurant_phone_number = $request->restaurant_phone_number;
        $update_restaurant->restaurant_phone_number = $request->restaurant_phone_number;
        $update_restaurant->password = Hash::make($request->password);
        $update_restaurant->show_pass = $request->password;
        $update_restaurant->save();

        return back()->with('success','Restaurant Successfully Updated');
    }

    public function restaurant_delete(Request $request)
    {
        $delete_restaurant = Resturant_account::where('id',$request->restaurant_delete_id)->first();
        $delete_restaurant->delete();
        return back()->with('success','Restaurant Successfully Deleted');
    }


    public function restaurant_orders()
    {
        return view('admin.restaurant.restaurantOrders');
    }


}
