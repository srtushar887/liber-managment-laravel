@extends('layouts.admin')
@section('admin')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Profile</h5>
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
                    <h5>Profile</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">Profile Image</label>
                                        <br>
                                        @if (!empty(Auth::user()->profile_image))
                                            <img class="img-radius" src="{{asset(Auth::user()->profile_image)}}" alt="User-Profile-Image" style="height: 100px;width: 100px;">
                                        @else
                                            <img class="img-radius" src="https://ih1.redbubble.net/image.1046392292.3346/st,small,845x845-pad,1000x1000,f8f8f8.jpg" alt="User-Profile-Image" style="height: 100px;width: 100px;">
                                        @endif
                                        <input type="file" name="profile_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>
                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>
                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
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
