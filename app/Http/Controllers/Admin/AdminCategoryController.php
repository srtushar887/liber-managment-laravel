<?php

namespace App\Http\Controllers\Admin;

use App\all_category;
use App\Http\Controllers\Controller;
use App\machinery_category;
use App\restaurant_category;
use App\store_category;
use App\taxi_category;
use App\truck_category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminCategoryController extends Controller
{
    public function taxi_category_management()
    {
        $taxi_cats = taxi_category::orderBy('id','desc')
            ->paginate(15);
        return view('admin.category.taxiCategoryManagement',compact('taxi_cats'));
    }

    public function taxi_category_management_save(Request $request)
    {
        $new_cat = new taxi_category();

        if($request->hasFile('category_image')){
            $image = $request->file('category_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/taxicatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_cat->category_image = $imgUrl;
        }

        $new_cat->category_name = $request->category_name;
        $new_cat->save();
        return back()->with('success','Category Successfully Created');

    }


    public function taxi_category_management_update(Request $request)
    {
        $category_update = taxi_category::where('id',$request->category_edit_id)->first();
        if($request->hasFile('category_image')){
            @unlink($category_update->category_image);
            $image = $request->file('category_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/allcategory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $category_update->category_image = $imgUrl;
        }

        $category_update->category_name = $request->category_name;
        $category_update->save();
        return back()->with('success','Category Successfully Updated');
    }


    public function taxi_category_management_delete(Request $request)
    {
        $delete_category = taxi_category::where('id',$request->category_delete_id)->first();
        @unlink($delete_category->category_image);
        $delete_category->delete();
        return back()->with('success','Category Successfully Deleted');
    }


    public function truck_category_management()
    {
        $truck_cats = truck_category::orderBy('id','desc')
            ->paginate(15);
        return view('admin.category.truckCategoryManagement',compact('truck_cats'));
    }

    public function truck_category_management_save(Request $request)
    {
        $new_truck_cat = new truck_category();

        if($request->hasFile('category_image')){
            $image = $request->file('category_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/truckcatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_truck_cat->category_image = $imgUrl;
        }

        $new_truck_cat->category_name = $request->category_name;
        $new_truck_cat->save();
        return back()->with('success','Truck Category Successfully Created');
    }


    public function truck_category_management_update(Request $request)
    {
        $update_truck_cat = truck_category::where('id',$request->truck_category_edit_id)->first();

        if($request->hasFile('category_image')){
            @unlink($update_truck_cat->category_image);
            $image = $request->file('category_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/truckcatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_truck_cat->category_image = $imgUrl;
        }

        $update_truck_cat->category_name = $request->category_name;
        $update_truck_cat->save();
        return back()->with('success','Truck Category Successfully Updated');
    }


    public function truck_category_management_delete(Request $request)
    {
        $delete_truck_category = truck_category::where('id',$request->truck_category_delete_id)->first();
        @unlink($delete_truck_category->category_image);
        $delete_truck_category->delete();
        return back()->with('success','Truck Category Successfully Deleted');
    }



    public function machinery_category_management()
    {
        $machinery_cats = machinery_category::orderBy('id','desc')
            ->paginate(15);
        return view('admin.category.machineryCategoryManagement',compact('machinery_cats'));
    }


    public function machinery_category_management_save(Request $request)
    {
        $new_machinery_cat = new machinery_category();

        if($request->hasFile('category_image')){
            $image = $request->file('category_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/machinerycatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_machinery_cat->category_image = $imgUrl;
        }

        $new_machinery_cat->category_name = $request->category_name;
        $new_machinery_cat->save();
        return back()->with('success','Machinery Category Successfully Created');
    }


    public function machinery_category_management_update(Request $request)
    {
        $update_machinery_cat = machinery_category::where('id',$request->machinery_category_edit_id)->first();

        if($request->hasFile('category_image')){
            @unlink($update_machinery_cat->category_image);
            $image = $request->file('category_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/machinerycatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_machinery_cat->category_image = $imgUrl;
        }

        $update_machinery_cat->category_name = $request->category_name;
        $update_machinery_cat->save();
        return back()->with('success','Machinery Category Successfully Updated');
    }

    public function machinery_category_management_delete(Request $request)
    {
        $delete_machinery_category = machinery_category::where('id',$request->machinery_category_delete_id)->first();
        @unlink($delete_machinery_category->category_image);
        $delete_machinery_category->delete();
        return back()->with('success','Machinery Category Successfully Deleted');
    }


    public function store_category_management()
    {
        $store_cats = store_category::orderBy('id','desc')
            ->paginate(15);
        return view('admin.category.storeCategoryManagement',compact('store_cats'));
    }


    public function store_category_management_save(Request $request)
    {
        $new_store_cat = new store_category();

        if($request->hasFile('category_image')){
            $image = $request->file('category_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/storecatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_store_cat->category_image = $imgUrl;
        }

        $new_store_cat->category_name = $request->category_name;
        $new_store_cat->save();
        return back()->with('success','Store Category Successfully Created');
    }


    public function store_category_management_update(Request $request)
    {
        $update_store_cat = store_category::where('id',$request->store_category_edit_id)->first();

        if($request->hasFile('category_image')){
            @unlink($update_store_cat->category_image);
            $image = $request->file('category_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/storecatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_store_cat->category_image = $imgUrl;
        }

        $update_store_cat->category_name = $request->category_name;
        $update_store_cat->save();
        return back()->with('success','Store Category Successfully Updated');
    }


    public function store_category_management_delete(Request $request)
    {
        $delete_store_category = store_category::where('id',$request->store_category_delete_id)->first();
        @unlink($delete_store_category->category_image);
        $delete_store_category->delete();
        return back()->with('success','Store Category Successfully Deleted');
    }



    public function restaurant_category_management(Request $request)
    {
        $restaurant_cats = restaurant_category::orderBy('id','desc')
            ->paginate(15);
        return view('admin.category.restaurantCategoryManagement',compact('restaurant_cats'));
    }


    public function restaurant_category_management_save(Request $request)
    {
        $new_restaurant_cat = new restaurant_category();

        if($request->hasFile('category_image')){
            $image = $request->file('category_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/restaurantcatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_restaurant_cat->category_image = $imgUrl;
        }

        $new_restaurant_cat->category_name = $request->category_name;
        $new_restaurant_cat->save();
        return back()->with('success','Restaurant Category Successfully Created');
    }


    public function restaurant_category_management_update(Request $request)
    {
        $update_restaurant_cat = restaurant_category::where('id',$request->restaurant_category_edit_id)->first();

        if($request->hasFile('category_image')){
            @unlink($update_restaurant_cat->category_image);
            $image = $request->file('category_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('category_image');
            $directory = 'assets/admin/images/restaurantcatgory/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $update_restaurant_cat->category_image = $imgUrl;
        }

        $update_restaurant_cat->category_name = $request->category_name;
        $update_restaurant_cat->save();
        return back()->with('success','Restaurant Category Successfully Updated');
    }

    public function restaurant_category_management_delete(Request $request)
    {
        $delete_restaurant_category = restaurant_category::where('id',$request->restaurant_category_delete_id)->first();
        @unlink($delete_restaurant_category->category_image);
        $delete_restaurant_category->delete();
        return back()->with('success','Restaurant Category Successfully Deleted');
    }



















}
