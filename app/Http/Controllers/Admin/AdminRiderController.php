<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rider;
use Illuminate\Http\Request;

class AdminRiderController extends Controller
{
    public function rider_management()
    {
        $riders = Rider::orderBy('id','desc')->paginate(15);
        return view('admin.rider.riderList',compact('riders'));
    }

    public function rider_status_change(Request $request)
    {
        $rider = Rider::where('id',$request->rider_status_id)->first();
        $rider->status = $request->status;
        $rider->save();
        return back()->with('success','Rider Account Status Successfully Changed');

    }

}
