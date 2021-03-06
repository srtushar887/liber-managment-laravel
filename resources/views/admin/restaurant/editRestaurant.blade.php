@extends('layouts.admin')
@section('admin')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Update Restaurant</h5>
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
                    <h5>Update Restaurant</h5>
                    <a href="{{route('admin.restaurant.manage')}}">

                        <button class="btn btn-primary btn-sm fa-pull-right" data-toggle="modal" data-target="#createfooditem">Go Back</button>
                    </a>

                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.restaurant.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Restaurant Name</label>
                                        <input type="text" name="restaurant_name" value="{{$restaurant->restaurant_name}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                        <input type="hidden" name="restaurant_edit_id" value="{{$restaurant->id}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Restaurant Email</label>
                                        <input type="email" name="restaurant_email" value="{{$restaurant->restaurant_email}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>
                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">Restaurant Address</label>
                                        <textarea type="text" name="restaurant_address" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >{!! $restaurant->restaurant_address !!}</textarea>
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Restaurant Mobile No.</label>
                                        <input type="text" name="restaurant_phone_number" value="{{$restaurant->restaurant_phone_number}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>


                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Account Password</label>
                                        <input type="text" name="password" value="{{$restaurant->show_pass}}" required required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
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
