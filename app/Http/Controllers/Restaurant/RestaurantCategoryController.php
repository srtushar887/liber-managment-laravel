<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\multivendorstore_sub_category;
use App\restaurant_category;
use App\restaurant_sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RestaurantCategoryController extends Controller
{
    public function category()
    {
        $res_cats = restaurant_category::all();
        $all_cats = restaurant_sub_category::where('user_id',Auth::user()->id)
            ->with('maincat')
            ->paginate(20);
        return view('restaurant.category.category',compact('res_cats','all_cats'));
    }

    public function category_save(Request $request)
    {
        $new_cat = new restaurant_sub_category();
        if($request->hasFile('category_image')){
//            @unlink($gnl->category_image);
            $image = $request->file('category_image');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/restaurantcatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_cat->category_image = $imgUrl;
        }



        $new_cat->user_id = Auth::user()->id;
        $new_cat->main_category_id = $request->main_category_id;
        $new_cat->category_name = $request->category_name;
        $new_cat->save();

        return back()->with('success','Category Successfully Created');
    }


    public function category_update(Request $request)
    {
        $up_cat = restaurant_sub_category::where('id',$request->restaurant_edit_category)->first();
        if($request->hasFile('category_image')){
            @unlink($up_cat->category_image);
            $image = $request->file('category_image');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/restaurantcatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $up_cat->category_image = $imgUrl;
        }



        $up_cat->main_category_id = $request->main_category_id;
        $up_cat->category_name = $request->category_name;
        $up_cat->save();

        return back()->with('success','Category Successfully Updated');
    }

    public function category_delete(Request $request)
    {
        $del_cat = restaurant_sub_category::where('id',$request->restaurant_category_delete_id)->first();
        @unlink($del_cat->category_image);
        $del_cat->delete();
        return back()->with('success','Category Successfully Deleted');
    }



}
