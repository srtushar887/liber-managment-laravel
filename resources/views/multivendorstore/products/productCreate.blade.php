@extends('layouts.multivendorstore')
@section('multivendorstore')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Create User</h5>
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
                    <h5>Create Product</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('multivendorstore.product.save')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" name="product_name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>
                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Product Category</label>
                                        <select class="form-control" name="product_category">
                                            <option value="0">select any</option>
                                            @foreach($sub_cats as $scats)
                                            <option value="{{$scats->id}}">{{$scats->category_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Product Old Price</label>
                                        <input type="text" name="product_old_price" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Product New Price</label>
                                        <input type="text" name="product_new_price" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>
                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">Product Sort Description</label>
                                        <textarea type="text" name="product_sort_des" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" ></textarea>
                                    </div>
                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">Product Long Description</label>
                                        <textarea type="text" name="product_long_des" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" ></textarea>
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Product Main Image</label>
                                        <input type="file" name="product_main_image" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Product Image One</label>
                                        <input type="file" name="product_image_one"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Product Image Two</label>
                                        <input type="file" name="product_image_two"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Product Image Three</label>
                                        <input type="file" name="product_image_three"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Product Image Four</label>
                                        <input type="file" name="product_image_four"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>
                                    <div class="form-group col-md-6 fill">
                                        <label for="exampleInputEmail1">Product Image Five</label>
                                        <input type="file" name="product_image_five"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="form-group col-md-12 fill">
                                        <label for="exampleInputEmail1">Product Status</label>
                                        <select class="form-control" name="product_status">
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
