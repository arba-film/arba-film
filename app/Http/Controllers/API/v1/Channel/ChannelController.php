<?php

namespace ArbaFilm\Http\Controllers\API\v1\Channel;

use ArbaFilm\Repositories\v1\Channel\Logics\ChannelLogic;
use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;

class ChannelController extends Controller
{
    use IssueToken;

    public function addChannel(Request $request)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return ChannelLogic::addChannel($request, $checkLogin['user']);
    }

    public function listChannel()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return ChannelLogic::listChannel($checkLogin['user']);
    }

    public function vdChannel($id)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return ChannelLogic::vdChannel($id);
    }

    public function updateChannel(Request $request)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return ChannelLogic::updateChannel($request);
    }

    public function deleteChannel(Request $request)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return ChannelLogic::deleteChannel($request);
    }
}
