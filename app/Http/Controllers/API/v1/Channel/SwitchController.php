<?php

namespace ArbaFilm\Http\Controllers\API\v1\Channel;

use ArbaFilm\Repositories\v1\Account\Transformers\DataChannelTransformer;
use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;

class SwitchController extends Controller
{
    use IssueToken;

    public function listChannel()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin, 200);
        }

        $user = $checkLogin['user'];

        $channels = Channel::where('user_id', $user->id)
            ->where('status_active', Configs::$ACCESS_STATUS['NON_ACTIVE'])
            ->get();

        if ($channels) {

            $result = array();

            foreach ($channels as $channel) {
                $result[] = [
                    'id' => $channel->id,
                    'name' => $channel->channel_name,
                    'photoProfile' => $channel->photo_profile
                ];
            }

            $response['isFailed'] = false;
            $response['message'] = 'Get data channel success';
            $response['result'] = $result;

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Get data channel success';

            return response()->json($response, 200);
        }
    }

    public function processSwitch($id)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin, 200);
        }

        $user = $checkLogin['user'];

        $channel = Channel::where('user_id', $user->id)
            ->where('status_active', Configs::$ACCESS_STATUS['ACTIVE'])
            ->first();

        if ($channel) {

            $nonActiveStatus = $channel->update(['status_active' => Configs::$ACCESS_STATUS['NON_ACTIVE']]);

            if ($nonActiveStatus) {

                $channelSwitch = Channel::find($id);

                if ($channelSwitch) {

                    $activeStatus = $channelSwitch->update(['status_active' => Configs::$ACCESS_STATUS['ACTIVE']]);

                    if ($activeStatus) {

                        $response['isFailed'] = false;
                        $response['message'] = 'Switch channel success';
                        $response['result'] = fractal($channelSwitch, new DataChannelTransformer());

                        return response()->json($response, 200);
                    } else {

                        $response['isFailed'] = true;
                        $response['message']  = 'Switch channel failed';

                        return response()->json($response, 200);
                    }
                } else {

                    $response['isFailed'] = true;
                    $response['message']  = 'Get channel for activated failed';

                    return response()->json($response, 200);
                }
            } else {

                $response['isFailed'] = true;
                $response['message']  = 'Non active channel failed';

                return response()->json($response, 200);
            }
        } else {

            $response['isFailed'] = true;
            $response['message']  = 'Does not exist channel that active';

            return response()->json($response, 200);
        }
    }
}
