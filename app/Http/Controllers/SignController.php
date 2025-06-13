<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignController extends Controller
{
    public function signup() {
        return view('signup');
    }

    public function store(Request $request){
        $fullname = $request->input('fullname');
        $password = $request->input('pass');
        $email = $request->input('email');

        User::create([
            'name' => $fullname,
            'password' => Hash::make($password),
            'email' => $email,
            'role' => 1
        ]);

        return redirect('/');
    }


}
