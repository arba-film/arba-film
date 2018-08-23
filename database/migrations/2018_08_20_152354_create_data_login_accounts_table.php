<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataLoginAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_login_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('user_id', 36);
            $table->char('user_ip', 15);
            $table->char('date', 20);
            $table->char('time', 10);
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
        Schema::dropIfExists('data_login_accounts');
    }
}
