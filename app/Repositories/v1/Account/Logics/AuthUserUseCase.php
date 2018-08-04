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

    public static function success()
    {
        return (new static)->handleSuccess();
    }

    abstract public function handleSuccess();

    public static function logout()
    {
        return (new static)->handleLogout();
    }

    abstract public function handleLogout();

}