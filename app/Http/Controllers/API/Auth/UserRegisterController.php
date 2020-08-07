<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserRegisterController extends Controller
{
    public function user_register(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'msg' => $validator->errors()
            ]);
        }else{
            $new_user = new User();
            $new_user->name = $request->name;
            $new_user->email = $request->email;
            $new_user->phone_number = $request->phone_number;
            $new_user->dob = $request->dob;
            $new_user->gender = $request->gender;
            $new_user->address = $request->address;
            $new_user->password = Hash::make($request->password);
            $new_user->show_password = $request->password;
            $new_user->save();

            $success['token'] =  $new_user->createToken('liberApp')->accessToken;

            return response()->json([
                'status' => 'success',
                'message' => 'User Account Successfully Register',
                'access_token' =>   $success['token'],
                'token_type' => 'Bearer',
            ]);
        }



    }

    public function user_login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|string|email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'msg' => $validator->errors()
            ]);
        }
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)){
            return response()->json([
               'status' => 'Unauthorised',
                'message' => 'These credentials do not match our records.'
            ],200);
        }else{

            $user = Auth::user();
            $success['token'] =  $user->createToken('liberApp')->accessToken;

            $user_details = User::where('id',Auth::user()->id)->first();

            return response()->json([
                'status' => 'success',
                'message' => 'User Successfully Login',
                'access_token' =>   $success['token'],
                'token_type' => 'Bearer',
                'user_details' => $user_details
            ]);

        }
    }


}
