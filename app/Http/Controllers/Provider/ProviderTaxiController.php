<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\taxi;
use App\taxi_sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderTaxiController extends Controller
{
    public function taxi_lists()
    {
        $all_taxi = taxi::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(20);
        return view('provider.taxi.taxiLists',compact('all_taxi'));
    }

    public function taxi_create(Request $request)
    {
        $taxi_cats = taxi_sub_category::where('provider_id',Auth::user()->id)->get();
        return view('provider.taxi.createTaxi',compact('taxi_cats'));
    }


    public function taxi_save(Request $request)
    {
        $new_taxi = new taxi();

        if ($request->hasFile('taxi_file')){
            $image=$request->file('taxi_file');
            $name=Auth::user()->id.uniqid().time().$image->getClientOriginalName();
            $uploadPath='assets/admin/taxifile/';
            $image->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name;
            $new_taxi->taxi_file = $imageUrl;
        }

        $new_taxi->user_id = Auth::user()->id;
        $new_taxi->taxi_name = $request->taxi_name;
        $new_taxi->taxi_category = $request->taxi_category;
        $new_taxi->taxi_no = $request->taxi_no;
        $new_taxi->taxi_status = $request->taxi_status;
        $new_taxi->save();

        return back()->with('success','Taxi Successfully Created');




    }


}
