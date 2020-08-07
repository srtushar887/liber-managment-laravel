<?php

namespace App\Http\Controllers\API\Ecommerce;

use App\Http\Controllers\Controller;
use App\Multivendor_store_account;
use App\multivendore_store_product;
use App\multivendorstore_sub_category;
use Illuminate\Http\Request;

class UserEcommerceController extends Controller
{
    //@get all multivendor store name
    public function ecommerce_store_get()
    {
        $all_store = Multivendor_store_account::where('status',1)->orderBy('id','desc')->get();
        $count_store = Multivendor_store_account::where('status',1)->count();

        if (count($all_store) > 0) {

            return response()->json([
                'status' => 'success',
                'message' => 'All Active Ecommerce Store',
                'total_store' => $count_store,
                'store_name' => $all_store,
            ]);
        }else {
            return response()->json([
                'status' => 'success',
                'message' => 'Sorry ! No store available',
                'total_store' => $count_store,
            ]);
        }




    }

    //@get store category using store id
    public function ecommerce_store_category($id)
    {
        $store_sub_category = multivendorstore_sub_category::where('store_id',$id)->get();
        $total_store_sub_category = multivendorstore_sub_category::where('store_id',$id)->count();

        if (count($store_sub_category) > 0){
            return response()->json([
                'status' => 'success',
                'message' => 'get category for individual store ',
                'total_category' => $total_store_sub_category,
                'category' =>   $store_sub_category,
            ]);
        }else{
            return response()->json([
                'status' => 'success',
                'message' => 'Sorry ! No category available ',
            ]);
        }

    }

    //@get store product using sub category id
    public function ecommerce_store_product($id)
    {
        $store_product = multivendore_store_product::where('product_category',$id)
            ->where('product_status',1)
            ->get();

        $total_store_product = multivendore_store_product::where('product_category',$id)
            ->where('product_status',1)
            ->count();

        if (count($store_product) > 0){
            return response()->json([
                'status' => 'success',
                'message' => 'get product for individual category ',
                'total_product' => $total_store_product,
                'product' =>   $store_product,
            ]);
        }else{
            return response()->json([
                'status' => 'success',
                'message' => 'Sorry ! no product available',
            ]);
        }
    }
}
