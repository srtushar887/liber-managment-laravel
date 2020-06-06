<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\truck_category;
use Illuminate\Http\Request;

class AdminTruckController extends Controller
{
    public function truck_category()
    {
        $truck_cats = truck_category::orderBy('id','desc')->paginate(15);
        return view('admin.truck.truckcategory',compact('truck_cats'));
    }

    public function truck_category_save(Request $request)
    {
        $new_cat = new truck_category();
        $new_cat->category_name = $request->category_name;
        $new_cat->save();

        return back()->with('success','Truck Category Successfully Created');

    }

    public function truck_category_update(Request $request)
    {
        $update_cat = truck_category::where('id',$request->truck_category_edit_id)->first();
        $update_cat->category_name = $request->category_name;
        $update_cat->save();

        return back()->with('success','Truck Category Successfully Updated');
    }

    public function truck_category_delete(Request $request)
    {
        $delete_truck_cat = truck_category::where('id',$request->truck_category_delete_id)->first();
        $delete_truck_cat->delete();
        return back()->with('success','Truck Category Successfully Deleted');
    }



}
