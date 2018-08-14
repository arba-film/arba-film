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
            $table->char('group_video_id', 30)->nullable();
            $table->bigInteger('playlist_id')->nullable();
            $table->string('file', 150);
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->bigInteger('count_watching')->default(0);
            $table->string('photo_cover', 150)->nullable();
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
