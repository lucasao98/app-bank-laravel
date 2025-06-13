<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        if(!empty($request->session()->get('email'))){
            $email = $request->session()->get('email');

            $user = User::where('email', $email)->first();

            if(!empty($user)){
                return view('dashboard.home', [
                    'user' => $user
                ]);
            }

        }

        return redirect("/");

    }

    public function bank_transfer() {
        return view('dashboard.bank_transfer');
    }

    public function bank_statement() {
        $email_user = session('email');

        $user = User::where('email', $email_user)->first();
        $withdrawals = Withdrawal::where('sender_id', $user->id)->get();

        return view('dashboard.bank_statement', [
            'withdrawals' => $withdrawals
        ]);
    }

    public function bank_deposit() {
        return view('dashboard.bank_deposit');
    }
}
