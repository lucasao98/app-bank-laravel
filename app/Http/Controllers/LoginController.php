<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request){
        $email = $request->input('email');
        $pass = $request->input('pass');

        $user = User::where('email', $email)->first();

        if(!empty($user)) {
            if(Hash::check($pass, $user->password)) {
                $request->session()->put('fullname', $user->name);
                $request->session()->put('email', $user->email);
                $request->session()->put('role', $user->password);

                return redirect('/dashboard');
            }
        }

        return redirect('/');
    }

    public function logout(Request $request) {
        $request->session()->flush();

        return redirect("/");
    }
}
