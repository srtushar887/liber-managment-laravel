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
                        <h5 class="m-b-10">Manage Provider</h5>
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
                    <h5>Provider List</h5>
                </div>
                <div class="card-body ">
                    <div class="table-responsive">




                        <table class="table table-striped" id="users">
                            <thead>
                            <tr>
                                <th>Provider Full Name</th>
                                <th>Provider Email</th>
                                <th>Provider Phone No.</th>
                                <th>Provider DOB</th>
                                <th>Provider Gender</th>
                                <th>Provider Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_providers as $user)
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
                                    <td>{{$user->address}}</td>
                                    <td>
                                        <a href="{{route('admin.provider.edit',$user->id)}}">

                                            <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> </button>
                                        </a>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#admindeleteprovider{{$user->id}}"><i class="fa fa-trash"></i> </button>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adminproviderchangepass{{$user->id}}"><i class="fa fa-key"></i> </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="adminproviderchangepass{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.provider.chnage.password.save')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input type="password" class="form-control" name="npass" required>
                                                        <input type="hidden" name="provider_password_id" value="{{$user->id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input type="password" class="form-control" name="cpass" required>
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

                                <div class="modal fade" id="admindeleteprovider{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Provider</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('admin.provider.delete')}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    are your sure to delete this provider ?
                                                    <input type="hidden" name="provider_delete_id" value="{{$user->id}}">
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
                        {{$all_providers->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ form-element ] end -->
    </div>

@stop
@section('js')

@stop
