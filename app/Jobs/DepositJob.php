<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class DepositJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $userEmail;
    protected $depositValue;
    protected $withdrawalId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userEmail, $depositValue, $withdrawalId)
    {
        $this->userEmail = $userEmail;
        $this->depositValue = $depositValue;
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

            if ($user) {
                $userAccount = $user->account;

                // Atualiza saldos
                $userAccount->addAmount($this->depositValue);

                $userAccount->update();

                $withdrawal = Withdrawal::find($this->withdrawalId)->first();
                $withdrawal->status_transaction = "Completed";
                $withdrawal->update();
            }
        });
    }
}
