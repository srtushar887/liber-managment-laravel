@extends('layouts.provider')
@section('provider')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Create Taxi</h5>
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
                    <h5>Create Taxi</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('provider.taxi.save')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Taxi Name</label>
                                        <input type="text" name="taxi_name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>
                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Taxi Category</label>
                                        <select class="form-control" name="taxi_category">
                                            <option value="0">select any</option>
                                            @foreach($taxi_cats as $scats)
                                                <option value="{{$scats->id}}">{{$scats->category_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Taxi No.</label>
                                        <input type="text" name="taxi_no" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Taxi Doc File</label>
                                        <input type="file" name="taxi_file" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">Taxi Status</label>
                                        <select class="form-control" name="taxi_status">
                                            <option value="0">select any</option>
                                            <option value="1">Active</option>
                                            <option value="2">De-active</option>
                                        </select>
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
