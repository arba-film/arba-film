<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->uuid('id');
            $table->char('channel_id', 36);
            $table->char('group_video_id', 30);
            $table->tinyInteger('group_play_video_id');
            $table->string('file', 150);
            $table->string('title', 100);
            $table->text('description');
            $table->bigInteger('count_watching');
            $table->string('photo_cover', 150);
            $table->char('date_upload', 20);
            $table->char('time_upload', 10);
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
        Schema::dropIfExists('videos');
    }
}
