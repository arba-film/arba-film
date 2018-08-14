<?php

namespace ArbaFilm\Repositories\v1\Video\Jobs;

use ArbaFilm\Repositories\v1\GlobalConfig\GlobalUtils;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UploadVideoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use GlobalUtils;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, $pathFile, $fileName)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    }
}
