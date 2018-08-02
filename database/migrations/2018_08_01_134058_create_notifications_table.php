<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->char('user_id', 36);
            $table->char('friend_id', 36)->nullable();
            $table->char('channel_id', 36)->nullable();
            $table->char('subscribe_id', 36)->nullable();
            $table->tinyInteger('group_notification_id');
            $table->string('title', 100);
            $table->text('message');
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
        Schema::dropIfExists('notifications');
    }
}
