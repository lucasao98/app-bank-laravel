<?php

namespace App\Http\Controllers;

use App\Jobs\DepositJob;
use App\Jobs\TransferJob;
use App\Models\User;
use App\Models\Account;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class OperationsController extends Controller
{
    public function transfer(Request $request) {
        $email_user = $request->session()->get('email');
        $bank_branch = $request->input('bank_branch');
        $bank_account = $request->input('bank_account');
        $transfer_value = $request->input('transfer_value');

        $user = User::where('email', $email_user)->first();
        $account = Account::where('bank_branch', $bank_branch)->first();

        if(!empty($user) && !empty($account)) {

            $withdrawal = Withdrawal::create([
                'amount_transaction' => $transfer_value,
                'status_transaction' => 'Pending',
                'receiver_id' => $account->id,
                'sender_id' => $user->id
            ]);

            TransferJob::dispatch($email_user, $bank_branch, $bank_account, $transfer_value, $withdrawal);

            return redirect("/dashboard");
        }
    }

    public function deposit(Request $request) {
        $email_user = $request->session()->get('email');
        $bank_branch = $request->input('bank_branch');
        $bank_account = $request->input('bank_account');
        $value_deposit = $request->input('deposit_value');
        $user = User::where('email', $email_user)->first();


        if(empty($bank_account) && empty($bank_branch) && !empty($email_user)) {
            if(!empty($user)){

                $withdrawal = Withdrawal::create([
                    'amount_transaction' => $value_deposit,
                    'status_transaction' => 'Pending',
                    'receiver_id' => $user->id,
                    'sender_id' => $user->id
                ]);

                DepositJob::dispatch($email_user, $value_deposit, $withdrawal);

                return redirect("/dashboard");
            }
        }

        if(!empty($bank_account) && !empty($bank_branch)) {
            $account = Account::where('bank_branch', $bank_branch)->first();

            $withdrawal = Withdrawal::create([
                'amount_transaction' => $value_deposit,
                'status_transaction' => 'Pending',
                'receiver_id' => $account->id,
                'sender_id' => $user->id
            ]);


            if(!empty($account)) {
                DepositJob::dispatch($account->user->email, $value_deposit, $withdrawal);

                return redirect("/dashboard");
            }
        }
    }
}
