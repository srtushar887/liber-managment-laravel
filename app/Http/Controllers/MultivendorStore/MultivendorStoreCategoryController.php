<?php

namespace App\Http\Controllers\MultivendorStore;

use App\Http\Controllers\Controller;
use App\multivendorstore_sub_category;
use App\store_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class MultivendorStoreCategoryController extends Controller
{
    public function category()
    {
        $store_cats = store_category::all();
        $all_cats = multivendorstore_sub_category::orderBy('id','desc')
            ->where('user_id',Auth::user()->id)
            ->with('storecat')
            ->paginate(20);
        return view('multivendorstore.category.category',compact('store_cats','all_cats'));
    }

    public function category_save(Request $request)
    {
        $new_cat = new multivendorstore_sub_category();
        if($request->hasFile('category_image')){
//            @unlink($gnl->category_image);
            $image = $request->file('category_image');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/storecatgory/';
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
        $update_cat = multivendorstore_sub_category::where('id',$request->multivedndore_edit_category)->first();
        if($request->hasFile('category_image')){
            @unlink($update_cat->category_image);
            $image = $request->file('category_image');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/storecatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_cat->category_image = $imgUrl;
        }



        $update_cat->user_id = Auth::user()->id;
        $update_cat->main_category_id = $request->main_category_id;
        $update_cat->category_name = $request->category_name;
        $update_cat->save();

        return back()->with('success','Category Successfully Updated');
    }

    public function category_delete(Request $request)
    {
        $del_cat = multivendorstore_sub_category::where('id',$request->multivendorestore_category_delete_id)->first();
        @unlink($del_cat->category_image);
        $del_cat->delete();
        return back()->with('success','Category Successfully Deleted');

    }

}
