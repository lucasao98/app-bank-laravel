<?php

namespace App\Observers;

use App\Models\Account;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $controlNumbersBranch = strval(rand(1000, 9999));
        $verificationDigitBranch = strval(rand(0, 9));

        $controlNumbersAccount = strval(rand(10000, 99999));
        $verificationDigitAccount = strval(rand(0, 9));

        Account::create([
            'bank_branch' => $controlNumbersBranch ."-" . $verificationDigitBranch,
            'bank_account' => $controlNumbersAccount."-".$verificationDigitAccount,
            'bank_amount' => 0.0,
            'user_id' => $user->id
        ]);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
