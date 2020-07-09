@extends('layouts.admin')
@section('css')

    {{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">--}}
@endsection
@section('admin')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Vehicle Managemnt</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">





        <!-- [ form-element ] start -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5>Vehicle List</h5>
                    <button class="btn btn-primary fa-pull-right btn-sm" data-toggle="modal" data-target="#createvcahile">Create New Vehicle</button>
                </div>

                <div class="card-body ">
                    <div class="table-responsive">




                        <table class="table table-striped" id="users">
                            <thead>
                            <tr>
                                <th>Vehicle Type</th>
                                <th>VehicleVehicle Name</th>
                                <th>Vehicle image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_vechiles as $cat)
                                <tr>
                                    <td>
                                        @if ($cat->vehicle_type == 1)
                                            Taxi
                                        @elseif($cat->vehicle_type == 2)
                                            Truck
                                        @elseif($cat->vehicle_type == 3)
                                            Machinery
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>{{$cat->vehicle_name}}</td>
                                    <td>
                                        @if (!empty($cat->vehicle_image))
                                            <img class="img-radius" src="{{asset($cat->vehicle_image)}}" alt="User-Profile-Image" style="height: 50px;width: 50px;">
                                        @else
                                            <img class="img-radius" src="https://www.chanchao.com.tw/images/default.jpg" alt="User-Profile-Image" style="height: 50px;width: 50px;">
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#admineditvehicleedit{{$cat->id}}"><i class="fa fa-edit"></i> </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#admineditvehicledelete{{$cat->id}}"><i class="fa fa-trash"></i> </button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="admineditvehicledelete{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.vechile.delete')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are you sute to delete this category ?
                                                        <input type="hidden" class="form-control" name="vehicle_delete_id" value="{{$cat->id}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="admineditvehicleedit{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.vechile.update')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Vehicle Type</label>
                                                        <select class="form-control" name="vehicle_type">
                                                            <option value="0">select any</option>
                                                            <option value="1" {{$cat->vehicle_type == 1 ? 'selected' : ''}}>Taxi</option>
                                                            <option value="2" {{$cat->vehicle_type == 2 ? 'selected' : ''}}>Truck</option>
                                                            <option value="3" {{$cat->vehicle_type == 3 ? 'selected' : ''}}>Machinery</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Vehicle Name</label>
                                                        <input type="text" class="form-control" name="vehicle_name" value="{{$cat->vehicle_name}}" placeholder="Enter Category Name">
                                                        <input type="hidden" class="form-control" name="vehicle_edit_id" value="{{$cat->id}}" placeholder="Enter Category Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Vehicle Image</label>
                                                        <br>
                                                        @if (!empty($cat->vehicle_image))
                                                            <img class="img-radius" src="{{asset($cat->vehicle_image)}}" alt="User-Profile-Image" style="height: 100px;width: 100px;">
                                                        @else
                                                            <img class="img-radius" src="https://www.chanchao.com.tw/images/default.jpg" alt="User-Profile-Image" style="height: 100px;width: 100px;">
                                                        @endif
                                                        <input type="file" class="form-control" name="vehicle_image" placeholder="Enter Category Image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Vehicle Papers</label>
                                                        <input type="file" class="form-control" name="vehicle_file" >
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                        {{$all_vechiles->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ form-element ] end -->
    </div>




    <div class="modal fade" id="createvcahile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.vechile.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Vehicle Type</label>
                            <select class="form-control" name="vehicle_type">
                                <option value="0">select any</option>
                                <option value="1">Taxi</option>
                                <option value="2">Truck</option>
                                <option value="3">Machinery</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Vehicle Name</label>
                            <input type="text" class="form-control" name="vehicle_name" required >
                        </div>
                        <div class="form-group">
                            <label>Vehicle Image</label>
                            <input type="file" class="form-control" name="vehicle_image" required >
                        </div>
                        <div class="form-group">
                            <label>Vehicle Papers</label>
                            <input type="file" class="form-control" name="vehicle_file" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@stop
@section('js')

@stop
