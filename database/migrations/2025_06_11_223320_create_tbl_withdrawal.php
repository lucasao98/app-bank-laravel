<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblWithdrawal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_withdrawal', function (Blueprint $table) {
            $table->id();
            $table->float('amount_transaction')->nullable(false);
            $table->string('status_transaction')->nullable(false);
            $table->unsignedBigInteger("receiver_id")->nullable(false);
            $table->unsignedBigInteger("sender_id")->nullable(false);

            $table->foreign("receiver_id")->references("id")->on("users");
            $table->foreign("sender_id")->references("id")->on("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_withdrawal');
    }
}
