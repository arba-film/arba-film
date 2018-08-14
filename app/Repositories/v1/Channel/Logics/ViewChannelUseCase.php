<?php

namespace ArbaFilm\Repositories\v1\Channel\Logics;

use Illuminate\Http\Request;

abstract class ViewChannelUseCase
{
    public static function dashboard($user)
    {
        return (new static)->handleDashboard($user);
    }

    abstract public function handleDashboard($user);

    public static function listVideo($user)
    {
        return (new static)->handleListVideo($user);
    }

    abstract public function handleListVideo($user);

    public static function playlist($user)
    {
        return (new static)->handlePlaylist($user);
    }

    abstract public function handlePlaylist($user);

    public static function subscription($user)
    {
        return (new static)->handleSubscription($user);
    }

    abstract public function handleSubscription($user);

    public static function about($user)
    {
        return (new static)->handleAbout($user);
    }

    abstract public function handleAbout($user);

}