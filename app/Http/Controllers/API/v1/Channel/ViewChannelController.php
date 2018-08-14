<?php

namespace ArbaFilm\Http\Controllers\API\v1\Channel;

use ArbaFilm\Repositories\v1\Channel\Logics\ViewChannelLogic;
use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;

class ViewChannelController extends Controller
{
    use IssueToken;

    public function dashboard()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return ViewChannelLogic::dashboard($checkLogin['user']);
    }

    public function listVideo()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return ViewChannelLogic::listVideo($checkLogin['user']);
    }

    public function playlist()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return ViewChannelLogic::playlist($checkLogin['user']);
    }

    public function subscription()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return ViewChannelLogic::subscription($checkLogin['user']);
    }

    public function about()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return ViewChannelLogic::about($checkLogin['user']);
    }

}
