<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
{
    public function create_user()
    {
        return view('admin.user.createUser');
    }

    public function create_user_save(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->save();

        return back()->with('success','User Account Successfully Created');

    }

    public function manage_users()
    {
        $users = User::orderBy('id','desc')->paginate(15);
        return view('admin.user.manageUser',compact('users'));
    }

    public function manage_users_get()
    {
        $users = User::latest();
        return DataTables::of($users)
            ->addColumn('action', function ($users) {
                return ' <button class="btn btn-success btn-info btn-sm"><i class="fa fa-edit"></i> </button>
                        <button class="btn btn-danger btn-info btn-sm" ><i class="fa fa-trash"></i> </button>';
            })
            ->make(true);
    }

    public function edit_user($id)
    {
        $users = User::where('id',$id)->first();
        return view('admin.user.editUser',compact('users'));
    }

    public function update_user(Request $request)
    {
        $user = User::where('id',$request->user_edit_id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        if ($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->address = $request->address;
        $user->save();

        return back()->with('success','User Account Successfully Updated');
    }

    public function delete_user(Request $request)
    {
        $user_delete = User::where('id',$request->user_delete_id)->first();
        $user_delete->delete();

        return redirect(route('admin.manager.user'))->with('success','User Account Successfully Deleted');

    }

    public function user_change_password_save(Request $request)
    {
        $npass = $request->npass;
        $cpass = $request->cpass;

        if ($npass != $cpass){
            return back()->with('alert','Password Not Match');
        }else{
            $user = User::where('id',$request->user_password_id)->first();
            $user->password = Hash::make($npass);
            $user->save();

            return back()->with('success','Password Successfully Changed');

        }

    }


}
