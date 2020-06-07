@extends('layouts.admin')
@section('admin')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">

        <!-- prject ,team member start -->
        <!-- seo start -->
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{$total_user}}</h3>
                            <h6 class="text-muted m-b-0">Total User</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{$total_category}}</h3>
                            <h6 class="text-muted m-b-0">Total Category</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{$total_taxi_driver}}</h3>
                            <h6 class="text-muted m-b-0">Total Taxi Driver</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{$total_truck_driver}}</h3>
                            <h6 class="text-muted m-b-0">Total Truck Driver</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{$total_delivery_boy}}</h3>
                            <h6 class="text-muted m-b-0">Total Delivery Boy</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{$total_store}}</h3>
                            <h6 class="text-muted m-b-0">Total Store</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6">
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center">{{ $chart1->options['chart_title'] }}</h3>
                    {!! $chart1->renderHtml() !!}

                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center">{{ $chart2->options['chart_title'] }}</h3>
                    {!! $chart2->renderHtml() !!}

                </div>
            </div>
        </div>

        <!-- seo end -->

        <!-- Latest Customers start -->

        <!-- Latest Customers end -->
    </div>
    <!-- [ Main Content ] end -->
@stop

@section('js')
    <!-- Apex Chart -->
    <script src="{{asset('assets/admin/')}}/js/plugins/apexcharts.min.js"></script>


    <!-- custom-chart js -->
    <script src="{{asset('assets/admin/')}}/js/pages/dashboard-main.js"></script>



    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart2->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
    {!! $chart2->renderJs() !!}

@stop
