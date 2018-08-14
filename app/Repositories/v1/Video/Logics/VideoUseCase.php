<?php

namespace ArbaFilm\Repositories\v1\Video\Logics;

use Illuminate\Http\Request;

abstract class VideoUseCase
{
    public static function addVideo(Request $request, $user)
    {
        return (new static)->handleAddVideo($request, $user);
    }

    abstract public function handleAddVideo($request, $user);

    public static function listVideo($user)
    {
        return (new static)->handleListVideo($user);
    }

    abstract public function handleListVideo($user);

    public static function detailVideo($id)
    {
        return (new static)->handleDetailVideo($id);
    }

    abstract public function handleDetailVideo($id);

    public static function updateVideo(Request $request)
    {
        return (new static)->handleUpdateVideo($request);
    }

    abstract public function handleUpdateVideo($request);

    public static function deleteVideo(Request $request)
    {
        return (new static)->handleDeleteVideo($request);
    }

    abstract public function handleDeleteVideo($request);

}