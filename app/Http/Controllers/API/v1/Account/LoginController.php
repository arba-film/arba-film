<?php

namespace ArbaFilm\Http\Controllers\API\v1\Account;

use ArbaFilm\Repositories\v1\Account\Logics\AuthUserLogic;
use ArbaFilm\Repositories\v1\GlobalConfig\CheckLoginTraits\Account;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;

class LoginController extends Controller
{
    use Account;

    public function login(Request $request)
    {
        return AuthUserLogic::login($request);
    }

    public function success()
    {
        return $this->checkLogin(request(), 'success');
    }

    public function getDataLogin()
    {
        return $this->checkLogin(request(), 'getDataLogin');
    }

    public function logout()
    {
        return $this->checkLogin(request(), 'logout');
    }
}
