<?php

namespace ArbaFilm\Http\Controllers\API\v1\Subscription;

use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use ArbaFilm\Repositories\v1\Subscription\Logics\SubscriptionLogic;
use ArbaFilm\Repositories\v1\Subscription\Models\Subscription;
use ArbaFilm\Repositories\v1\Subscription\Transformers\VideoTransformer;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    use IssueToken;

    public function listVideo()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin);
        }

        return SubscriptionLogic::listVideo($checkLogin['user']);
    }

    public function addSubscribe(Request $request)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin);
        }

        return SubscriptionLogic::addSubscribe($request, $checkLogin['user']);
    }

    public function unSubscribe(Request $request)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin);
        }

        return SubscriptionLogic::unSubscribe($request);
    }

}
