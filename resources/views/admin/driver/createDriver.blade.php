@extends('layouts.admin')
@section('admin')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Create Driver</h5>
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
                    <h5>Create Driver</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.driver.save')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Driver Full Name</label>
                                        <input type="text" name="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Driver Email</label>
                                        <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Driver Mobile No.</label>
                                        <input type="text" name="phone_number" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Driver DOB</label>
                                        <input type="date" name="dob" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Driver Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="0">select any</option>
                                            <option value="1">Male</option>
                                            <option value="2">Fe-Male</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Driver Type</label>
                                        <select class="form-control" name="driver_type">
                                            <option value="0">select any</option>
                                            <option value="1">Taxi</option>
                                            <option value="2">Truck</option>
                                            <option value="3">Delivery Boy</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Driving License</label>
                                        <input type="file" name="driving_license" required required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Account Password</label>
                                        <input type="password" name="password" required required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">Driver Address</label>
                                        <textarea type="text" name="address" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" ></textarea>
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
