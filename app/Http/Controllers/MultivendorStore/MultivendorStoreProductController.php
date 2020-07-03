<?php

namespace App\Http\Controllers\MultivendorStore;

use App\Http\Controllers\Controller;
use App\multivendore_store_product;
use App\multivendorstore_sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class MultivendorStoreProductController extends Controller
{
    public function products_list()
    {
        $all_products = multivendore_store_product::where('store_id',Auth::user()->id)
            ->with('subcats')
            ->paginate(15);
        return view('multivendorstore.products.products',compact('all_products'));
    }

    public function products_create()
    {
        $sub_cats = multivendorstore_sub_category::where('store_id',Auth::user()->id)->get();
        return view('multivendorstore.products.productCreate',compact('sub_cats'));
    }

    public function products_save(Request $request)
    {
        $new_product = new multivendore_store_product();
        if($request->hasFile('product_main_image')){
            $image = $request->file('product_main_image');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('product_main_image');
            $directory = 'assets/admin/images/multivendoreproduct/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_product->product_main_image = $imgUrl;
        }

        if($request->hasFile('product_image_one')){
            $image = $request->file('product_image_one');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('product_image_one');
            $directory = 'assets/admin/images/multivendoreproduct/';
            $imgUrl2  = $directory.$imageName;
            Image::make($image)->save($imgUrl2);
            $new_product->product_image_one = $imgUrl2;
        }

        if($request->hasFile('product_image_two')){
            $image = $request->file('product_image_two');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('product_image_two');
            $directory = 'assets/admin/images/multivendoreproduct/';
            $imgUrl3  = $directory.$imageName;
            Image::make($image)->save($imgUrl3);
            $new_product->product_image_two = $imgUrl3;
        }

        if($request->hasFile('product_image_three')){
            $image = $request->file('product_main_image');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('product_image_three');
            $directory = 'assets/admin/images/multivendoreproduct/';
            $imgUrl4  = $directory.$imageName;
            Image::make($image)->save($imgUrl4);
            $new_product->product_image_three = $imgUrl4;
        }

        if($request->hasFile('product_image_four')){
            $image = $request->file('product_image_four');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('product_image_four');
            $directory = 'assets/admin/images/multivendoreproduct/';
            $imgUrl5  = $directory.$imageName;
            Image::make($image)->save($imgUrl5);
            $new_product->product_image_four = $imgUrl5;
        }
        if($request->hasFile('product_image_five')){
            $image = $request->file('product_image_five');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('product_image_five');
            $directory = 'assets/admin/images/multivendoreproduct/';
            $imgUrl6  = $directory.$imageName;
            Image::make($image)->save($imgUrl6);
            $new_product->product_image_five = $imgUrl6;
        }

        $new_product->store_id = Auth::user()->id;
        $new_product->product_name = $request->product_name;
        $new_product->product_category = $request->product_category;
        $new_product->product_old_price = $request->product_old_price;
        $new_product->product_new_price = $request->product_new_price;
        $new_product->product_sort_des = $request->product_sort_des;
        $new_product->product_long_des = $request->product_long_des;
        $new_product->product_status = $request->product_status;
        $new_product->save();

        return back()->with('success','Product Successfully Created');


    }

    public function products_edit($id)
    {
        $sub_cats = multivendorstore_sub_category::where('store_id',Auth::user()->id)->get();
        $product = multivendore_store_product::where('id',$id)->first();
        return view('multivendorstore.products.productEdit',compact('sub_cats','product'));
    }


    public function products_update(Request $request)
    {
        $product_update = multivendore_store_product::where('id',$request->product_id)->first();
        if($request->hasFile('product_main_image')){
            @unlink($product_update->product_main_image);
            $image = $request->file('product_main_image');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('product_main_image');
            $directory = 'assets/admin/images/multivendoreproduct/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product_update->product_main_image = $imgUrl;
        }

        if($request->hasFile('product_image_one')){
            @unlink($product_update->product_image_one);
            $image = $request->file('product_image_one');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('product_image_one');
            $directory = 'assets/admin/images/multivendoreproduct/';
            $imgUrl2  = $directory.$imageName;
            Image::make($image)->save($imgUrl2);
            $product_update->product_image_one = $imgUrl2;
        }

        if($request->hasFile('product_image_two')){
            @unlink($product_update->product_image_two);
            $image = $request->file('product_image_two');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('product_image_two');
            $directory = 'assets/admin/images/multivendoreproduct/';
            $imgUrl3  = $directory.$imageName;
            Image::make($image)->save($imgUrl3);
            $product_update->product_image_two = $imgUrl3;
        }

        if($request->hasFile('product_image_three')){
            @unlink($product_update->product_image_three);
            $image = $request->file('product_main_image');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('product_image_three');
            $directory = 'assets/admin/images/multivendoreproduct/';
            $imgUrl4  = $directory.$imageName;
            Image::make($image)->save($imgUrl4);
            $product_update->product_image_three = $imgUrl4;
        }

        if($request->hasFile('product_image_four')){
            @unlink($product_update->product_image_four);
            $image = $request->file('product_image_four');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('product_image_four');
            $directory = 'assets/admin/images/multivendoreproduct/';
            $imgUrl5  = $directory.$imageName;
            Image::make($image)->save($imgUrl5);
            $product_update->product_image_four = $imgUrl5;
        }
        if($request->hasFile('product_image_five')){
            @unlink($product_update->product_image_five);
            $image = $request->file('product_image_five');
            $imageName = Auth::user()->id.uniqid().time().'.'.$image->getClientOriginalName('product_image_five');
            $directory = 'assets/admin/images/multivendoreproduct/';
            $imgUrl6  = $directory.$imageName;
            Image::make($image)->save($imgUrl6);
            $product_update->product_image_five = $imgUrl6;
        }

        $product_update->product_name = $request->product_name;
        $product_update->product_category = $request->product_category;
        $product_update->product_old_price = $request->product_old_price;
        $product_update->product_new_price = $request->product_new_price;
        $product_update->product_sort_des = $request->product_sort_des;
        $product_update->product_long_des = $request->product_long_des;
        $product_update->product_status = $request->product_status;
        $product_update->save();

        return back()->with('success','Product Successfully Updated');
    }

    public function products_delete(Request $request)
    {
        $del_pro = multivendore_store_product::where('id',$request->multivendorestore_product_delete_id)->first();
        @unlink($del_pro->product_main_image);
        @unlink($del_pro->product_image_one);
        @unlink($del_pro->product_image_two);
        @unlink($del_pro->product_image_three);
        @unlink($del_pro->product_image_four);
        @unlink($del_pro->product_image_five);

        $del_pro->delete();
        return back()->with('success','Product Successfully Deleted');

    }

}
