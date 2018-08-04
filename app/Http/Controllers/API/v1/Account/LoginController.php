<?php

namespace ArbaFilm\Http\Controllers\API\v1\Account;

use ArbaFilm\Repositories\v1\Account\Logics\AuthUserLogic;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return AuthUserLogic::login($request);
    }

    public function success()
    {
        return AuthUserLogic::success();
    }

    public function logout()
    {
        return AuthUserLogic::logout();
    }
}
