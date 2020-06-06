@extends('layouts.admin')
@section('admin')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Update Store</h5>
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
                    <h5>Update Store</h5>
                    <a href="{{route('admin.store.manage')}}">

                        <button class="btn btn-primary btn-sm fa-pull-right" >Go Back</button>
                    </a>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.store.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Store Name</label>
                                        <input type="text" name="store_name" value="{{$store->store_name}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                        <input type="hidden" name="store_edit_id" value="{{$store->id}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Store Email</label>
                                        <input type="email" name="store_email" value="{{$store->store_email}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>
                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">Store Address</label>
                                        <textarea type="text" name="store_address" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >{!! $store->store_address !!}</textarea>
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Store Mobile No.</label>
                                        <input type="text" name="store_phone_number" value="{{$store->store_phone_number}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Latitude </label>
                                        <input type="text" name="lat" value="{{$store->lat}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Longitude</label>
                                        <input type="text" name="lng" value="{{$store->lng}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>


                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Store Account Password</label>
                                        <input type="text" name="password" value="{{$store->show_pass}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
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
