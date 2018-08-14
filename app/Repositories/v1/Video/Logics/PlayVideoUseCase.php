<?php

namespace ArbaFilm\Repositories\v1\Video\Logics;

use Illuminate\Http\Request;

abstract class PlayVideoUseCase
{
    public static function playVideo(Request $request)
    {
        return (new static)->handlePlayVideo($request);
    }

    abstract public function handlePlayVideo($request);
}