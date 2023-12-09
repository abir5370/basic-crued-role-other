<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('user.user',[
            'users'=>$user
        ]);
    }

    public function delete(Request $request){
       $user = User::find($request->id);
       $user->delete();
       return back()->withSuccess('deleted!');
        
    }
}

