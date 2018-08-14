<?php

namespace ArbaFilm\Http\Controllers\API\v1\Video;

use ArbaFilm\Repositories\v1\GlobalConfig\CheckLoginTraits\Video;
use ArbaFilm\Repositories\v1\GlobalConfig\GlobalUtils;
use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use ArbaFilm\Repositories\v1\Video\Logics\PlayVideoLogic;
use ArbaFilm\Repositories\v1\Video\Logics\VideoLogic;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    use IssueToken;
    use GlobalUtils;

    public function addVideo(Request $request)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin);
        }

        return VideoLogic::addVideo($request, $checkLogin['user']);
    }

    public function listVideo()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin);
        }

        return VideoLogic::listVideo($checkLogin['user']);
    }

    public function detailVideo($id)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin);
        }

        return VideoLogic::detailVideo($id);
    }

    public function updateVideo(Request $request)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin);
        }

        return VideoLogic::updateVideo($request);
    }

    public function deleteVideo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {

            $response['isFailed'] = true;
            $response['message'] = 'Request id empty';

            return response()->json($response, 200);
        }

        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin);
        }

        return VideoLogic::deleteVideo($request);
    }

    public function playVideo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'videoId' => 'required',
        ]);

        if ($validator->fails()) {

            $response['isFailed'] = false;
            $response['message'] = 'video id empty';

            return response()->json($response, 200);
        }

        return PlayVideoLogic::playVideo($request);
    }

}
