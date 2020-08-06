@extends('layouts.restaurant')
@section('restaurant')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Monthly Statement</h5>
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
                    <h5>Daily Statement List</h5>
                </div>

                <div class="card-body ">
                    <div class="table-responsive">




                        <table class="table table-striped" id="users">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Abcd</td>
                                <td>1/5/2020</td>
                                <td>$20</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Abcd</td>
                                <td>1/5/2020</td>
                                <td>$20</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Abcd</td>
                                <td>1/5/2020</td>
                                <td>$20</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Abcd</td>
                                <td>1/5/2020</td>
                                <td>$20</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Abcd</td>
                                <td>1/5/2020</td>
                                <td>$20</td>
                                <td>
                                    <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </button>
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
