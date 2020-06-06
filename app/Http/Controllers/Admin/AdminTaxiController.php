<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\taxi_category;
use Illuminate\Http\Request;

class AdminTaxiController extends Controller
{
    public function taxi_category()
    {
        $tax_cats = taxi_category::orderBy('id','desc')->paginate(15);
        return view('admin.taxi.taxiCategory',compact('tax_cats'));
    }

    public function taxi_category_save(Request $request)
    {
        $new_cat = new taxi_category();
        $new_cat->category_name = $request->category_name;
        $new_cat->save();

        return back()->with('success','Taxi Category Successfully Created');
    }

    public function taxi_category_update(Request $request)
    {
        $cate_update = taxi_category::where('id',$request->tax_category_edit_id)->first();
        $cate_update->category_name = $request->category_name;
        $cate_update->save();

        return back()->with('success','Taxi Category Successfully Updated');
    }

    public function taxi_category_delete(Request $request)
    {
        $cat_delete = taxi_category::where('id',$request->tax_category_delete_id)->first();
        $cat_delete->delete();
        return back()->with('success','Taxi Category Successfully Deleted');
    }



}
