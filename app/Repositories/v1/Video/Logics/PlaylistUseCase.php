<?php

namespace ArbaFilm\Repositories\v1\Video\Logics;

use Illuminate\Http\Request;

abstract class PlaylistUseCase
{
    public static function listPlaylist($user)
    {
        return (new static)->handleListPlaylist($user);
    }

    abstract public function handleListPlaylist($user);

    public static function addPlaylist(Request $request, $user)
    {
        return (new static)->handleAddPlaylist($request, $user);
    }

    abstract public function handleAddPlaylist($request, $user);

    public static function updatePlaylist(Request $request)
    {
        return (new static)->handleUpdatePlaylist($request);
    }

    abstract public function handleUpdatePlaylist($request);

    public static function deletePlaylist(Request $request)
    {
        return (new static)->handleDeletePlaylist($request);
    }

    abstract public function handleDeletePlaylist($request);
}