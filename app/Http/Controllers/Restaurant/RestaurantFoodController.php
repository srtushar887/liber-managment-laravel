<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\restaurant_food_item;
use App\restaurant_sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RestaurantFoodController extends Controller
{
    public function food_list()
    {
        $sub_cats = restaurant_sub_category::where('user_id',Auth::user()->id)->get();
        $food_items = restaurant_food_item::where('food_item_user_id',Auth::user()->id)
            ->with('category')
            ->orderBy('id','desc')
            ->paginate(20);
        return view('restaurant.food.foodList',compact('sub_cats','food_items'));
    }

    public function food_item_save(Request $request)
    {

        $new_food_item = new restaurant_food_item();
        if($request->hasFile('food_item_image')){
//            @unlink($up_cat->category_image);
            $image = $request->file('food_item_image');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('food_item_image');
            $directory = 'assets/admin/images/fooditem/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_food_item->food_item_image = $imgUrl;
        }

        $new_food_item->food_item_user_id = Auth::user()->id;
        $new_food_item->food_item_category_id = $request->food_item_category_id;
        $new_food_item->food_item_name = $request->food_item_name;
        $new_food_item->food_item_price = $request->food_item_price;
        $new_food_item->food_item_image = $request->food_item_image;
        $new_food_item->save();
        return back()->with('success','Food Item Successfully Created');


    }

    public function food_item_update(Request $request)
    {

        $food_item_update = restaurant_food_item::where('id',$request->food_item_id)->first();
        if($request->hasFile('food_item_image')){
            @unlink($food_item_update->food_item_image);
            $image = $request->file('food_item_image');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('food_item_image');
            $directory = 'assets/admin/images/fooditem/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $food_item_update->food_item_image = $imgUrl;
        }

        $food_item_update->food_item_user_id = Auth::user()->id;
        $food_item_update->food_item_category_id = $request->food_item_category_id;
        $food_item_update->food_item_name = $request->food_item_name;
        $food_item_update->food_item_price = $request->food_item_price;
        $food_item_update->food_item_image = $request->food_item_image;
        $food_item_update->save();
        return back()->with('success','Food Item Successfully Updated');
    }


    public function food_item_delete(Request $request)
    {
        $del_food_item = restaurant_food_item::where('id',$request->food_item_delete_id)->first();
        @unlink($del_food_item->food_item_image);
        $del_food_item->delete();
        return back()->with('success','Food Item Successfully Deleted');

    }



}
