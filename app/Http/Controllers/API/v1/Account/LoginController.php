<?php

namespace ArbaFilm\Http\Controllers\API\v1\Account;

use ArbaFilm\Repositories\v1\Account\Logics\AuthUserLogic;
use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;

class LoginController extends Controller
{
    use IssueToken;

    public function login(Request $request)
    {
        return AuthUserLogic::login($request);
    }

    public function success()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return AuthUserLogic::success($checkLogin['user']);
    }

    public function getDataLogin()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return AuthUserLogic::getDataLogin($checkLogin['user']);
    }

    public function logout()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return AuthUserLogic::logout($checkLogin['user']);
    }

    public function updateAccount(Request $request)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return AuthUserLogic::updateAccount($request, $checkLogin['user']);
    }
}
