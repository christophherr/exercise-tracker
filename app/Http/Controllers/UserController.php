<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function add(Request $request)
    {
        if (! $request->has('username')) {
            return;
        }

        $user = User::create([
            'username' => $request->username
        ]);

        return response()->json(['status'=>'success', 'username'=>$user->username, 'user_id'=>$user->id]);
    }

    public function get()
    {
        return User::all();
    }
}
