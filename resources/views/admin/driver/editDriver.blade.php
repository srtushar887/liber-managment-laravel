@extends('layouts.admin')
@section('admin')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Update Driver</h5>
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
                    <h5>Update Driver</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.driver.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Driver Full Name</label>
                                        <input type="text" name="name" value="{{$driver->name}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                        <input type="hidden" name="driver_edit_id" value="{{$driver->id}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Driver Email</label>
                                        <input type="email" name="email"  value="{{$driver->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Driver Mobile No.</label>
                                        <input type="text" name="phone_number" value="{{$driver->phone_number}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Driver DOB</label>
                                        <input type="date" name="dob" value="{{$driver->dob}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Driver Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="0">select any</option>
                                            <option value="1" {{$driver->gender == 1 ? 'selected' : ''}}>Male</option>
                                            <option value="2" {{$driver->gender == 1 ? 'selected' : ''}}>Fe-Male</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Driver Type</label>
                                        <select class="form-control" name="driver_type">
                                            <option value="0">select any</option>
                                            <option value="1" {{$driver->driver_type == 1 ? 'selected' : ''}}>Taxi</option>
                                            <option value="2" {{$driver->driver_type == 2 ? 'selected' : ''}}>Truck</option>
                                            <option value="3" {{$driver->driver_type == 3 ? 'selected' : ''}}>Delivery Boy</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">Driving License</label>
                                        <br>
                                        <img src="{{asset($driver->driving_license)}}" style="height: 100px;width: 100px;">
                                        <input type="file" name="driving_license"   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>



                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">Driver Address</label>
                                        <textarea type="text" name="address"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >{!! $driver->address !!}</textarea>
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
