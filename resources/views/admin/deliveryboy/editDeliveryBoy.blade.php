@extends('layouts.admin')
@section('admin')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Update User</h5>
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
                    <h5>Update User</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.deliveryboy.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">User Full Name</label>
                                        <input type="text" name="name" value="{{$users->name}}" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                        <input type="hidden" name="deliveryboy_edit_id" value="{{$users->id}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">User Email</label>
                                        <input type="email" name="email" value="{{$users->email}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">User Mobile No.</label>
                                        <input type="text" name="phone_number" value="{{$users->phone_number}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">User DOB</label>
                                        <input type="date" name="dob" value="{{$users->dob}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">User Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="0">select any</option>
                                            <option value="1" {{$users->gender == 1 ? 'selected' : ''}}>Male</option>
                                            <option value="2" {{$users->gender == 2 ? 'selected' : ''}}>Fe-Male</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Account Password</label>
                                        <input type="text" name="password"  value="{{$users->show_password}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">User Address</label>
                                        <textarea type="text" name="address"   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >{!! $users->address !!}</textarea>
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
