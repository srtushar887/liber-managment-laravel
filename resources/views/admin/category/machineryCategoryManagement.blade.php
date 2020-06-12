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
                        <h5 class="m-b-10">Machinery Category Management</h5>
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
                    <h5>Machinery Category List</h5>
                    <button class="btn btn-primary fa-pull-right btn-sm" data-toggle="modal" data-target="#createmachinerynewcat">Create New Machinery Category</button>
                </div>

                <div class="card-body ">
                    <div class="table-responsive">
                        <table class="table table-striped" id="users">
                            <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Category image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($machinery_cats as $cat)
                                <tr>
                                    <td>{{$cat->category_name}}</td>
                                    <td>
                                        @if (!empty($cat->category_image))
                                            <img class="img-radius" src="{{asset($cat->category_image)}}" alt="User-Profile-Image" style="height: 50px;width: 50px;">
                                        @else
                                            <img class="img-radius" src="https://www.chanchao.com.tw/images/default.jpg" alt="User-Profile-Image" style="height: 50px;width: 50px;">
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adminmachinerycatedit{{$cat->id}}"><i class="fa fa-edit"></i> </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#adminmachinerycatdelete{{$cat->id}}"><i class="fa fa-trash"></i> </button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="adminmachinerycatdelete{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Machinery Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.machinery.category.delete')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are you sute to delete this category ?
                                                        <input type="hidden" class="form-control" name="machinery_category_delete_id" value="{{$cat->id}}">
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


                                <div class="modal fade" id="adminmachinerycatedit{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Machinery Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.machinery.category.update')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Machinery Category Name</label>
                                                        <input type="text" class="form-control" name="category_name" value="{{$cat->category_name}}" placeholder="Enter Category Name">
                                                        <input type="hidden" class="form-control" name="machinery_category_edit_id" value="{{$cat->id}}" placeholder="Enter Category Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Machinery Image</label>
                                                        <br>
                                                        @if (!empty($cat->category_image))
                                                            <img class="img-radius" src="{{asset($cat->category_image)}}" alt="User-Profile-Image" style="height: 100px;width: 100px;">
                                                        @else
                                                            <img class="img-radius" src="https://www.chanchao.com.tw/images/default.jpg" alt="User-Profile-Image" style="height: 100px;width: 100px;">
                                                        @endif
                                                        <input type="file" class="form-control" name="category_image" placeholder="Enter Category Image">
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
                        {{$machinery_cats->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ form-element ] end -->
    </div>




    <div class="modal fade" id="createmachinerynewcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create New Machinery Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.machinery.category.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Machinery Category Name</label>
                            <input type="text" class="form-control" name="category_name" required placeholder="Enter Category Name">
                        </div>
                        <div class="form-group">
                            <label>Machinery Category Image</label>
                            <input type="file" class="form-control" name="category_image" required placeholder="Enter Category Image">
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
