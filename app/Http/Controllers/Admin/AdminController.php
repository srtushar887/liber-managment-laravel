<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\all_category;
use App\Driver;
use App\general_setting;
use App\Http\Controllers\Controller;
use App\multivendor_store;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminController extends Controller
{
    public function index()
    {
        $total_user = User::count();
        $total_category = all_category::count();
        $total_taxi_driver = Driver::where('driver_type',1)->count();
        $total_truck_driver = Driver::where('driver_type',2)->count();
        $total_delivery_boy = Driver::where('driver_type',3)->count();
        $total_store = multivendor_store::count();


        $chart_options1 = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options1);


        $chart_options2 = [
            'chart_title' => 'Driver by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Driver',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart2 = new LaravelChart($chart_options2);


        return view('admin.index',compact('total_user','total_category','total_taxi_driver','total_truck_driver','total_delivery_boy','total_store',
        'chart1','chart2'));
    }

    public function general_setting()
    {
        $gen = general_setting::first();
        return view('admin.page.generalSetting',compact('gen'));
    }

    public function general_setting_save(Request $request)
    {
        $gen = general_setting::first();
        if($request->hasFile('logo')){
            @unlink($gen->logo);
            $image = $request->file('logo');
            $imageName = time().'.'.$image->getClientOriginalName('logo');
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->logo = $imgUrl;
        }
        if($request->hasFile('icon')){
            @unlink($gen->icon);
            $image = $request->file('icon');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('icon');
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->icon = $imgUrl;
        }

        $gen->site_name = $request->site_name;
        $gen->site_email = $request->site_email;
        $gen->site_phone = $request->site_phone;
        $gen->site_currency = $request->site_currency;
        $gen->address = $request->address;
        $gen->save();

        return back()->with('success','General Setting Updated');

    }


    public function profile()
    {
        return view('admin.page.profile');
    }

    public function profile_update(Request $request)
    {
        $admin_profile = Admin::where('id',Auth::user()->id)->first();
        if($request->hasFile('profile_image')){
            @unlink($admin_profile->profile_image);
            $image = $request->file('profile_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('profile_image');
            $directory = 'assets/admin/images/admin/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $admin_profile->profile_image = $imgUrl;
        }

        $admin_profile->name = $request->name;
        $admin_profile->email = $request->email;
        $admin_profile->phone = $request->phone;
        $admin_profile->save();

        return back()->with('success','profile Successfully Updated');


    }


    public function change_password()
    {
        return view('admin.page.changePassword');
    }

    public function change_password_update(Request $request)
    {
        $npas = $request->npass;
        $cpas = $request->cpass;

        if ($npas != $cpas)
        {
            return back()->with('alert','Password Not Match');
        }else{
            $admin_pass = Admin::where('id',Auth::user()->id)->first();
            $admin_pass->password = Hash::make($npas);
            $admin_pass->save();
            return back()->with('success','Password Successfully Changed');
        }

    }




}
