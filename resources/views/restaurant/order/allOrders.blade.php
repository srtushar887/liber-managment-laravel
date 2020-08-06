@extends('layouts.restaurant')
@section('restaurant')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Order Management</h5>
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
                    <h5>Order List</h5>
                </div>

                <div class="card-body ">
                    <div class="table-responsive">




                        <table class="table table-striped" id="users">
                            <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Order Date</th>
                                <th>Order Amount</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>12345678</td>
                                <td>1/5/2020</td>
                                <td>$20</td>
                                <td>Pending</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>
                            <tr>
                                <td>12345678</td>
                                <td>1/5/2020</td>
                                <td>$20</td>
                                <td>Pending</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>
                            <tr>
                                <td>12345678</td>
                                <td>1/5/2020</td>
                                <td>$20</td>
                                <td>Pending</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>
                            <tr>
                                <td>12345678</td>
                                <td>1/5/2020</td>
                                <td>$20</td>
                                <td>Pending</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>
                            <tr>
                                <td>12345678</td>
                                <td>1/5/2020</td>
                                <td>$20</td>
                                <td>Pending</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>
                            <tr>
                                <td>12345678</td>
                                <td>1/5/2020</td>
                                <td>$20</td>
                                <td>Pending</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        {{--                        {{$all_products->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ form-element ] end -->
    </div>




@stop
@section('js')

@stop
