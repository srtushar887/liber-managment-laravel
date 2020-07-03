<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Multivendor_store_account;
use App\multivendore_store_product;
use App\multivendorstore_sub_category;
use App\store_category;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function user_logout()
    {

    }


    //@get all multivendor store name
    public function multivendor_store_get()
    {
        $all_store = Multivendor_store_account::where('status',1)->orderBy('id','desc')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'All Active Multivendor Store',
            'store_name' =>   $all_store,
        ]);

    }

    //@get store category using store id
    public function multivendor_store_category($id)
    {
        $store_sub_category = multivendorstore_sub_category::where('store_id',$id)->get();

        if (count($store_sub_category) > 0){
            return response()->json([
                'status' => 'success',
                'message' => 'get category for individual store ',
                'category' =>   $store_sub_category,
            ]);
        }else{
            return response()->json([
                'status' => 'success',
                'message' => 'Sorry ! no category available ',
            ]);
        }

    }

    //@get store product using sub category id
    public function multivendor_store_product($id)
    {
        $store_product = multivendore_store_product::where('product_category',$id)
            ->where('product_status',1)
            ->get();
        if (count($store_product) > 0){
            return response()->json([
                'status' => 'success',
                'message' => 'get product for individual category ',
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
