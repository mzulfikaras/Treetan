<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function indexUser(){
        $user = User::all();

        return response()->json($user);
    }

    public function viewUser($id){
        $user = User::find($id);

        return response()->json($user);
    }

    public function createUser(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($user){
            return response()->json([
                'status' => 'success',
                'message' => 'User Data Created Succefully!'
            ]);
        }
    }

    public function editUser($id, Request $request){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        if($user){
            return response()->json([
                'status' => 'success',
                'message' => 'User Data Updated Succefully!'
            ]);
        }
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        if($user){
            return response()->json([
                'status' => 'success',
                'message' => 'User Data Deleted Succefully!'
            ]);
        }
    }
}
