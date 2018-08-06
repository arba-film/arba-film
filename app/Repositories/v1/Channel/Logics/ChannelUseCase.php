<?php

namespace ArbaFilm\Repositories\v1\Channel\Logics;

use Illuminate\Http\Request;

abstract class ChannelUseCase
{
    public static function addChannel(Request $request, $user)
    {
        return (new static)->handleAddChannel($request, $user);
    }

    abstract public function handleAddChannel($request, $user);

    public static function listChannel($user)
    {
        return (new static)->handleListChannel($user);
    }

    abstract public function handleListChannel($user);

    public static function vdChannel($id)
    {
        return (new static)->handleVDetailChannel($id);
    }

    abstract public function handleVDetailChannel($id);

    public static function updateChannel(Request $request)
    {
        return (new static)->handleUpdateChannel($request);
    }

    abstract public function handleUpdateChannel($request);

    public static function deleteChannel(Request $request)
    {
        return (new static)->handleDeleteChannel($request);
    }

    abstract public function handleDeleteChannel($request);
}