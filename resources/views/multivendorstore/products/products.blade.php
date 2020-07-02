@extends('layouts.multivendorstore')
@section('multivendorstore')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Product Managemnt</h5>
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
                    <a href="{{route('multivendorstore.create.product')}}">

                        <button class="btn btn-primary fa-pull-right btn-sm">Create New Product</button>
                    </a>
                </div>

                <div class="card-body ">
                    <div class="table-responsive">




                        <table class="table table-striped" id="users">
                            <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Product New Price</th>
                                <th>Product Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_products as $pro)
                                <tr>
                                    <td>
                                        @if (!empty($pro->product_main_image))
                                            <img class="img-radius" src="{{asset($pro->product_main_image)}}" alt="User-Profile-Image" style="height: 50px;width: 50px;">
                                        @else
                                            <img class="img-radius" src="https://www.chanchao.com.tw/images/default.jpg" alt="User-Profile-Image" style="height: 50px;width: 50px;">
                                        @endif
                                    </td>
                                    <td>{{$pro->product_name}}</td>
                                    <td>{{$pro->subcats->category_name}}</td>
                                    <td>{{$pro->product_new_price}}</td>
                                    <td>
                                        @if ($pro->product_status == 1)
                                            Active
                                        @else
                                            De-Active
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('multivendorestore.edit.product',$pro->id)}}">

                                            <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> </button>
                                        </a>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#multivendorestoreprodelete{{$pro->id}}"><i class="fa fa-trash"></i> </button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="multivendorestoreprodelete{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('multivendorestore.product.delete')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are you sute to delete this product ?
                                                        <input type="hidden" class="form-control" name="multivendorestore_product_delete_id" value="{{$pro->id}}">
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



                            @endforeach
                            </tbody>
                        </table>
                        {{$all_products->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ form-element ] end -->
    </div>




@stop
@section('js')

@stop
