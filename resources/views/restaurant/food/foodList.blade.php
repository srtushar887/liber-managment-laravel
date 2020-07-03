@extends('layouts.restaurant')
@section('restaurant')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Category Managemnt</h5>
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
                    <h5>Category List</h5>
                    <button class="btn btn-primary fa-pull-right btn-sm" data-toggle="modal" data-target="#restaurantcreatecategory">Create New Category</button>
                </div>

                <div class="card-body ">
                    <div class="table-responsive">




                        <table class="table table-striped" id="users">
                            <thead>
                            <tr>
                                <th>Food Item Image</th>
                                <th>Food Item Name</th>
                                <th>Food Item Category</th>
                                <th>Food Item Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($food_items as $item)
                                <tr>
                                    <td>
                                        @if (!empty($item->food_item_image))
                                            <img class="img-radius" src="{{asset($item->food_item_image)}}" alt="User-Profile-Image" style="height: 50px;width: 50px;">
                                        @else
                                            <img class="img-radius" src="https://www.chanchao.com.tw/images/default.jpg" alt="User-Profile-Image" style="height: 50px;width: 50px;">
                                        @endif
                                    </td>
                                    <td>{{$item->category->category_name}}</td>
                                    <td>{{$item->food_item_name}}</td>
                                    <td>{{$item->food_item_price}}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fooditemedit{{$item->id}}"><i class="fa fa-edit"></i> </button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#fooditemdelete{{$item->id}}"><i class="fa fa-trash"></i> </button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="fooditemdelete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('restaurant.food.delete')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are you sute to delete this category ?
                                                        <input type="hidden" class="form-control" name="food_item_delete_id" value="{{$item->id}}">
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


                                <div class="modal fade" id="fooditemedit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('restaurant.food.update')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Category Type</label>
                                                        <select class="form-control" name="food_item_category_id">
                                                            <option value="0">select any</option>
                                                            @foreach($sub_cats as $cats)
                                                                <option value="{{$cats->id}}" {{$item->food_item_category_id == $cats->id ? 'selected' : ''}}>{{$cats->category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Item Name</label>
                                                        <input type="text" class="form-control" name="food_item_name" value="{{$item->food_item_name}}" required placeholder="Enter Category Name">
                                                        <input type="hidden" class="form-control" name="food_item_id" value="{{$item->id}}" required placeholder="Enter Category Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Item price</label>
                                                        <input type="text" class="form-control" name="food_item_price" value="{{$item->food_item_price}}" required placeholder="Enter Category Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Item Image</label>
                                                        <br>
                                                        @if (!empty($item->food_item_image))
                                                            <img class="img-radius" src="{{asset($item->food_item_image)}}" alt="User-Profile-Image" style="height: 100px;width: 100px;">
                                                        @else
                                                            <img class="img-radius" src="https://www.chanchao.com.tw/images/default.jpg" alt="User-Profile-Image" style="height: 100px;width: 100px;">
                                                        @endif
                                                        <input type="file" class="form-control" name="food_item_image" required placeholder="Enter Category Image">
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
                        {{$food_items->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ form-element ] end -->
    </div>




    <div class="modal fade" id="restaurantcreatecategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('restaurant.food.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Category Type</label>
                            <select class="form-control" name="food_item_category_id">
                                <option value="0">select any</option>
                                @foreach($sub_cats as $cats)
                                    <option value="{{$cats->id}}">{{$cats->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Item Name</label>
                            <input type="text" class="form-control" name="food_item_name" required placeholder="Enter Category Name">
                        </div>
                        <div class="form-group">
                            <label>Item price</label>
                            <input type="text" class="form-control" name="food_item_price" required placeholder="Enter Category Name">
                        </div>
                        <div class="form-group">
                            <label>Item Image</label>
                            <input type="file" class="form-control" name="food_item_image" required placeholder="Enter Category Image">
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
