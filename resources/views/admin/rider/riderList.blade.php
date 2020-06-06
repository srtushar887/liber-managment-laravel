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
                        <h5 class="m-b-10">Rider Management</h5>
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
                    <h5>Rider List</h5>
                </div>
                <div class="card-body ">
                    <div class="table-responsive">




                        <table class="table table-striped" id="users">
                            <thead>
                            <tr>
                                <th>Rider Full Name</th>
                                <th>Rider Email</th>
                                <th>Rider Phone No.</th>
                                <th>Rider DOB</th>
                                <th>Rider Gender</th>
                                <th>Rider Address</th>
                                <th>Rider Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($riders as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->dob}}</td>
                                    <td>
                                        @if ($user->gender == 1)
                                            Male
                                        @else
                                            Female
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->status == 1)
                                            Active
                                        @else
                                            De-Active
                                        @endif
                                    </td>
                                    <td>{{$user->address}}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adminriderstatus{{$user->id}}"><i class="fa fa-key"></i> </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="adminriderstatus{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Rider Status</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.rider.status.change')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Select Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="0">select any</option>
                                                            <option value="1" {{$user->status == 1 ? 'selected' : ''}}>Active</option>
                                                            <option value="2" {{$user->status == 2 ? 'selected' : ''}}>De-Active</option>
                                                        </select>
                                                        <input type="hidden" name="rider_status_id" value="{{$user->id}}">
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

                            @endforeach
                            </tbody>
                        </table>
                        {{$riders->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ form-element ] end -->
    </div>

@stop
@section('js')

@stop
