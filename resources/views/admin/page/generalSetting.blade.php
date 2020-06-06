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
