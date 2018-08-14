<?php

namespace ArbaFilm\Http\Controllers\API\v1\Video;

use ArbaFilm\Repositories\v1\GlobalConfig\CheckLoginTraits\Video;
use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use ArbaFilm\Repositories\v1\Video\Logics\PlaylistLogic;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PlaylistController extends Controller
{
    use IssueToken;

    public function listPlaylist()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return PlaylistLogic::listPlaylist($checkLogin['user']);
    }

    public function addPlaylist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'channelId' => 'required',
            'name' => 'required'
        ]);

        if ($validator->fails()) {

            $response['isFailed'] = true;
            $response['message'] = 'Your request empty';

            return response()->json($response, 200);
        }

        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return PlaylistLogic::addPlaylist($request, $checkLogin['user']);
    }

    public function updatePlaylist(Request $request)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return PlaylistLogic::updatePlaylist($request);
    }

    public function deletePlaylist(Request $request)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']){
            return response()->json($checkLogin);
        }

        return PlaylistLogic::deletePlaylist($request);
    }
}
