<?php

namespace ArbaFilm\Http\Controllers\API\v1\Video;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use ArbaFilm\Repositories\v1\Subscription\Models\Subscription;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use ArbaFilm\Repositories\v1\Video\Transformers\ChannelDashboardTransformer;
use ArbaFilm\Http\Controllers\Controller;
use ArbaFilm\Repositories\v1\Video\Transformers\VideoTransformer;

class VisitorController extends Controller
{
    use IssueToken;

    public function listDashboard()
    {
        $channel = Channel::where('count_upload', '>=', 10)
            ->where('status_active', '!=', Configs::$ACCESS_STATUS['ACTIVE'])
            ->orderByRaw('RAND()')
            ->paginate(10);

        if ($channel) {

            $response['isFailed'] = false;
            $response['message'] = 'Get data success';
            $response['result'] = fractal($channel, new ChannelDashboardTransformer());

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = false;
            $response['message'] = 'Get data failed';

            return response()->json($response, 200);
        }
    }

    public function listPopular()
    {
        $video = Video::orderBy('count_watching', 'DESC')
            ->orderByRaw('RAND()')
            ->paginate(20);

        if ($video) {

            $response['isFailed'] = false;
            $response['message'] = 'Select video popular success';
            $response['result'] = fractal($video, new VideoTransformer());

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Select video popular failed';

            return response()->json($response, 200);
        }
    }

    public function listSubscription()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin, 200);
        }

        $user = $checkLogin['user'];

        $subscription = Subscription::where('user_id', $user->id)
            ->where('is_subscribe', Configs::$IS_SUBSCRIBE['TRUE'])
            ->groupBy('channel_id')
            ->get(['channel_id']);

        if ($subscription) {

            $video = Video::whereIn('channel_id', $subscription)
                ->orderBy('date_upload', 'DESC')
                ->orderBy('time_upload', 'DESC')
                ->paginate(20);

            if ($video) {

                $response['isFailed'] = false;
                $response['message'] = 'Get video successfully';
                $response['result'] = fractal($video,  new VideoTransformer());

                return response()->json($response, 200);
            } else {

                $response['isFailed'] = true;
                $response['message'] = 'Get video failed';

                return response()->json($response, 200);
            }
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Get Subscription failed';

            return response()->json($response, 200);
        }
    }

}
