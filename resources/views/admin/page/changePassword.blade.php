@extends('layouts.admin')
@section('admin')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Change Password</h5>
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
                    <h5>Change Password</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.password.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">New Password</label>
                                        <input type="password" name="npass" required  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>
                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Confirm Password</label>
                                        <input type="password" name="cpass" required  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
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
