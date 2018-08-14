<?php

namespace ArbaFilm\Repositories\v1\Subscription\Logics;

use Illuminate\Http\Request;

abstract class SubscriptionUseCase
{
    public static function listVideo($user)
    {
        return (new static)->handleListVideo($user);
    }

    abstract public function handleListVideo($user);

    public static function addSubscribe(Request $request, $user)
    {
        return (new static)->handleAddSubscribe($request, $user);
    }

    abstract public function handleAddSubscribe($request, $user);

    public static function unSubscribe(Request $request)
    {
        return (new static)->handleUnSubscribe($request);
    }

    abstract public function handleUnSubscribe($request);
}