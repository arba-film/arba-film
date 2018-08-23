<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->uuid('id');
            $table->char('user_id', 36);
            $table->string('channel_name', 130);
            $table->text('channel_description');
            $table->string('address', 255)->nullable();
            $table->tinyInteger('country_id')->nullable();
            $table->string('city', 100)->nullable();
            $table->bigInteger('phone_no')->nullable();
            $table->string('photo_profile', 150);
            $table->string('photo_cover', 150);
            $table->tinyInteger('status_active')->default(0);
            $table->bigInteger('count_upload')->nullable();
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channels');
    }
}
