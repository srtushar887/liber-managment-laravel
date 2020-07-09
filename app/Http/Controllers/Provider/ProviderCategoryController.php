<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\taxi_category;
use App\taxi_sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProviderCategoryController extends Controller
{
    public function category()
    {
        $taxi_cats = taxi_category::all();
        $sub_taxi_cats = taxi_sub_category::where('provider_id',Auth::user()->id)
            ->orderBy('id','desc')
            ->with('maincat')
            ->paginate();
        return view('provider.category.category',compact('taxi_cats','sub_taxi_cats'));
    }

    public function category_save(Request $request)
    {
        $new_cat = new taxi_sub_category();
        if($request->hasFile('category_image')){
            $image = $request->file('category_image');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/taxicatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_cat->category_image = $imgUrl;
        }

        $new_cat->provider_id = Auth::user()->id;
        $new_cat->main_category_id = $request->main_category_id;
        $new_cat->category_name = $request->category_name;
        $new_cat->save();

        return back()->with('success','Taxi Category Successfully Created');


    }


    public function category_update(Request $request)
    {
        $update_cat = taxi_sub_category::where('id',$request->taxi_edit_category)->first();
        if($request->hasFile('category_image')){
            @unlink($update_cat->category_image);
            $image = $request->file('category_image');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/taxicatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_cat->category_image = $imgUrl;
        }

        $update_cat->main_category_id = $request->main_category_id;
        $update_cat->category_name = $request->category_name;
        $update_cat->save();

        return back()->with('success','Taxi Category Successfully Updated');
    }


    public function category_delete(Request $request)
    {
        $del_cat = taxi_sub_category::where('id',$request->taxi_category_delete_id)->first();
        @unlink($del_cat->category_image);
        $del_cat->delete();
        return back()->with('success','Taxi Category Successfully Deleted');


    }



}
