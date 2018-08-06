<?php

namespace ArbaFilm\Repositories\v1\GlobalConfig\CheckLoginTraits;

use ArbaFilm\Repositories\v1\Account\Logics\AuthUserLogic;
use ArbaFilm\Repositories\v1\Channel\Logics\ChannelLogic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait Account
{
    public function checkLogin(Request $request, $forLogic, $parameter = "")
    {
        $user = Auth::guard('api')->user();

        if ($user) {

            if ($forLogic == 'success') {
                $returnLogic = AuthUserLogic::success($user);
            } elseif ($forLogic == 'getDataLogin') {
                $returnLogic = AuthUserLogic::getDataLogin($user);
            } elseif ($forLogic == 'logout') {
                $returnLogic = AuthUserLogic::logout($user);
            } else {
                $returnLogic = false;
            }

            return $returnLogic;
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'You are not logged in';

            return response()->json($response, 200);
        }
    }
}