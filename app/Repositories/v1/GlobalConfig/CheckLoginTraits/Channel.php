<?php

namespace ArbaFilm\Repositories\v1\GlobalConfig\CheckLoginTraits;

use ArbaFilm\Repositories\v1\Channel\Logics\ChannelLogic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait Channel
{
    public function checkLogin(Request $request, $forLogic, $parameter = "")
    {
        $user = Auth::guard('api')->user();

        if ($user) {

            if ($forLogic == 'addChannel') {
                $returnLogic = ChannelLogic::addChannel($request, $user);

            } elseif ($forLogic == 'listChannel') {
                $returnLogic = ChannelLogic::listChannel($user);

            } elseif ($forLogic == 'vdChannel') {
                $returnLogic = ChannelLogic::vdChannel($parameter);

            } elseif ($forLogic == 'updateChannel') {
                $returnLogic = ChannelLogic::updateChannel($request);

            } elseif ($forLogic == 'deleteChannel'){
                $returnLogic = ChannelLogic::deleteChannel($request);

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