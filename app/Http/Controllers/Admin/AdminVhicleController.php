<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\vehile_list;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminVhicleController extends Controller
{
    public function vechile_list()
    {
        $all_vechiles = vehile_list::orderBy('id','desc')->paginate(15);
        return view('admin.vhicle.taxiLists',compact('all_vechiles'));
    }

    public function vechile_create(Request $request)
    {
        $new_vechile = new vehile_list();
        if($request->hasFile('vehicle_image')){
            $image = $request->file('vehicle_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('vehicle_image');
            $directory = 'assets/admin/images/vehicle/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_vechile->vehicle_image = $imgUrl;
        }

        if($request->hasFile('vehicle_file')){
            $image = $request->file('vehicle_file');
            $name=uniqid().time().'.'.$image->getClientOriginalName();
            $uploadPath='assets/admin/images/vehicle/';
            $image->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name;
            $new_vechile->vehicle_file = $imageUrl;
        }

        $new_vechile->vehicle_type = $request->vehicle_type;
        $new_vechile->vehicle_name = $request->vehicle_name;
        $new_vechile->save();

        return back()->with('success','Vehicle Successfully Created');


    }

    public function vechile_update(Request $request)
    {
        $ch_update = vehile_list::where('id',$request->vehicle_edit_id)->first();
        if($request->hasFile('vehicle_image')){
            @unlink($ch_update->vehicle_image);
            $image = $request->file('vehicle_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('vehicle_image');
            $directory = 'assets/admin/images/vehicle/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $ch_update->vehicle_image = $imgUrl;
        }

        if($request->hasFile('vehicle_file')){
            @unlink($ch_update->vehicle_file);
            $image = $request->file('vehicle_file');
            $name=uniqid().time().'.'.$image->getClientOriginalName();
            $uploadPath='assets/admin/images/vehicle/';
            $image->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name;
            $ch_update->vehicle_file = $imageUrl;
        }

        $ch_update->vehicle_type = $request->vehicle_type;
        $ch_update->vehicle_name = $request->vehicle_name;
        $ch_update->save();

        return back()->with('success','Vehicle Successfully Updated');
    }

    public function vechile_delete(Request $request)
    {
        $del_vh = vehile_list::where('id',$request->vehicle_delete_id)->first();
        @unlink($del_vh->vehicle_image);
        @unlink($del_vh->vehicle_file);
        $del_vh->delete();
        return back()->with('success','Vehicle Successfully Deleted');
    }


    public function vechile_assign()
    {
        $all_vechiles = vehile_list::orderBy('id','desc')->paginate(15);
        return view('admin.vhicle.assignVehicle',compact('all_vechiles'));
    }




}
