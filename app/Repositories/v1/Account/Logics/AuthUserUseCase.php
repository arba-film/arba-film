<?php

namespace ArbaFilm\Repositories\v1\Account\Logics;

use Illuminate\Http\Request;

abstract class AuthUserUseCase
{

    public static function login(Request $request)
    {
        return (new static)->handleLogin($request);
    }

    abstract public function handleLogin($request);

    public static function success($user)
    {
        return (new static)->handleSuccess($user);
    }

    abstract public function handleSuccess($user);

    public static function getDataLogin($user)
    {
        return (new static)->handleGetDataLogin($user);
    }

    abstract public function handleGetDataLogin($user);

    public static function logout($user)
    {
        return (new static)->handleLogout($user);
    }

    abstract public function handleLogout($user);

    public static function updateAccount(Request $request, $user)
    {
        return (new static)->handleUpdateAccount($request, $user);
    }

    abstract public function handleUpdateAccount($request, $user);

}