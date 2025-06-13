<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_accounts', function (Blueprint $table) {
            $table->id();
            $table->string("bank_branch", 6);
            $table->string("bank_account", 8);
            $table->float("bank_amount");

            $table->unsignedBigInteger("user_id")->nullable(false);

            $table->foreign("user_id")->references("id")->on("users");
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
        Schema::dropIfExists('tbl_accounts');
    }
}
