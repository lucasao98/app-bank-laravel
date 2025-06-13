<?php

namespace App\Jobs;

use App\Http\Controllers\OperationsController;
use App\Models\Account;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class TransferJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userEmail;
    protected $bankBranch;
    protected $bankAccount;
    protected $transferValue;
    protected $withdrawalId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userEmail, $bankBranch, $bankAccount, $transferValue, $withdrawalId)
    {
        $this->userEmail = $userEmail;
        $this->bankBranch = $bankBranch;
        $this->bankAccount = $bankAccount;
        $this->transferValue = $transferValue;
        $this->withdrawalId = $withdrawalId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::transaction(function () {
            $user = User::where('email', $this->userEmail)->first();

            $destinationAccount = Account::where('bank_branch', $this->bankBranch)
                ->where('bank_account', $this->bankAccount)
                ->first();

            if ($user && $destinationAccount) {
                $userAccount = $user->account;

                // Atualiza saldos
                $userAccount->removeAmount($this->transferValue);
                $destinationAccount->addAmount($this->transferValue);

                $userAccount->update();
                $destinationAccount->update();

                $withdrawal = Withdrawal::find($this->withdrawalId)->first();
                $withdrawal->status_transaction = "Completed";
                $withdrawal->update();
            }
        });
    }
}
