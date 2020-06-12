@extends('layouts.admin')
@section('admin')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">General Settings</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- [ form-element ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>General Settings</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.general.setting.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                               <div class="row">
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">Site Name</label>
                                       <input type="text" name="site_name" value="{{$gen->site_name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">Site Email</label>
                                       <input type="email" name="site_email" value="{{$gen->site_email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">Site Phone Number</label>
                                       <input type="text" name="site_phone" value="{{$gen->site_phone}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">Site Currency</label>
                                       <input type="text" name="site_currency" value="{{$gen->site_currency}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">Copyright Content</label>
                                       <input type="text" name="copyright_content" value="{{$gen->copyright_content}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">Play Store Link</label>
                                       <input type="text" name="play_store_link" value="{{$gen->play_store_link}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">Commission(%)</label>
                                       <input type="text" name="comission" value="{{$gen->comission}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">Tax(%)</label>
                                       <input type="text" name="tax" value="{{$gen->tax}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">Driver Ride Cancel Charge</label>
                                       <input type="text" name="driver_ride_cancel_charge" value="{{$gen->driver_ride_cancel_charge}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">User Ride Cancel Charge in 4 to 3</label>
                                       <input type="text" name="user_ride_cancel_charge_4_3" value="{{$gen->user_ride_cancel_charge_4_3}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">User Ride Cancel Charge in 3 to 2</label>
                                       <input type="text" name="user_ride_cancel_charge_3_2" value="{{$gen->user_ride_cancel_charge_3_2}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">User Ride Cancel Charge in 2 to 0</label>
                                       <input type="text" name="user_ride_cancel_charge_2_0" value="{{$gen->user_ride_cancel_charge_2_0}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">App Store Link</label>
                                       <input type="text" name="app_store_link" value="{{$gen->app_store_link}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">Provider Accept Timeout</label>
                                       <input type="text" name="provider_accept_timeout" value="{{$gen->provider_accept_timeout}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">Provider Search Radius</label>
                                       <input type="text" name="provider_search_radius" value="{{$gen->provider_search_radius}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">SOS Number</label>
                                       <input type="text" name="sos_number" value="{{$gen->sos_number}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">GooGle Map Api Key</label>
                                       <input type="text" name="google_map_api_key" value="{{$gen->google_map_api_key}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">FB App Version</label>
                                       <input type="text" name="fb_app_version" value="{{$gen->fb_app_version}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">FB App ID</label>
                                       <input type="text" name="fb_app_id" value="{{$gen->fb_app_id}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">FB App Secret</label>
                                       <input type="text" name="fb_app_secret" value="{{$gen->fb_app_secret}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">Logo</label>
                                       <br>
                                       <img src="{{asset($gen->logo)}}"  style="height: 100px;width: 100px;">
                                       <input type="file" name="logo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-6 fill">
                                       <label for="exampleInputEmail1">Icon</label>
                                       <br>
                                       <img src="{{asset($gen->icon)}}"  style="height: 100px;width: 100px;">
                                       <input type="file" name="icon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                   </div>
                                   <div class="form-group col-md-12 fill">
                                       <label for="exampleInputEmail1">Site Address</label>
                                       <textarea type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >{!! $gen->address !!}</textarea>
                                   </div>
                               </div>
                                <button type="submit" class="btn  btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!-- [ form-element ] end -->
    </div>

@stop
