<?php

namespace App\Http\Controllers\Admin;

use App\all_category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminCategoryController extends Controller
{
    public function category_management()
    {
        $all_cats = all_category::orderBy('id','desc')->paginate(15);
        return view('admin.category.categoryManagement',compact('all_cats'));
    }

    public function category_management_save(Request $request)
    {
        $new_cat = new all_category();

        if($request->hasFile('category_image')){
            $image = $request->file('category_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/allcategory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_cat->category_image = $imgUrl;
        }

        $new_cat->category_type = $request->category_type;
        $new_cat->category_name = $request->category_name;
        $new_cat->save();
        return back()->with('success','Category Successfully Created');

    }


    public function category_management_update(Request $request)
    {
        $category_update = all_category::where('id',$request->category_edit_id)->first();
        if($request->hasFile('category_image')){
            @unlink($category_update->category_image);
            $image = $request->file('category_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/allcategory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $category_update->category_image = $imgUrl;
        }

        $category_update->category_type = $request->category_type;
        $category_update->category_name = $request->category_name;
        $category_update->save();
        return back()->with('success','Category Successfully Updated');
    }


    public function category_management_delete(Request $request)
    {
        $delete_category = all_category::where('id',$request->category_delete_id)->first();
        @unlink($delete_category->category_image);
        $delete_category->delete();
        return back()->with('success','Category Successfully Deleted');
    }



}
