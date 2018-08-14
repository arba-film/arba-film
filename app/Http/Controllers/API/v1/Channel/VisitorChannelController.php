<?php

namespace ArbaFilm\Http\Controllers\API\v1\Channel;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\Channel\Transformers\DataPlaylistChannelTransformer;
use ArbaFilm\Repositories\v1\Channel\Transformers\DataVideoChannelTransformer;
use ArbaFilm\Repositories\v1\Channel\Transformers\DetailDataChannelTransformer;
use ArbaFilm\Repositories\v1\Channel\Transformers\SubscriptionTransformer;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\Subscription\Models\Subscription;
use ArbaFilm\Repositories\v1\Video\Models\Playlist;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;

class VisitorChannelController extends Controller
{

    public function visitorDashboard($id)
    {
        $channel = Channel::find($id);

        if ($channel) {

            $subscription = Subscription::where('user_id', $channel->user_id)
                ->where('is_subscribe', Configs::$IS_SUBSCRIBE['TRUE'])
                ->paginate(10);

            $video = Video::where('channel_id', $channel->id)
                ->orderBy('count_watching', 'DESC')
                ->paginate(10);

            $response['isFailed'] = false;
            $response['message'] = 'Success get data';
            $response['result'] = [
                'channel' => fractal($channel, new DetailDataChannelTransformer()),
                'video' => fractal($video, new DataVideoChannelTransformer()),
                'subscription' => fractal($subscription, new SubscriptionTransformer()),
                'countSubscriber' => Subscription::where('channel_id', $channel->id)
                    ->where('is_subscribe', Configs::$IS_SUBSCRIBE['TRUE'])
                    ->count()
            ];

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Get data failed';

            return response()->json($response, 200);
        }
    }

    public function visitorListVideo($id)
    {
        $channel = Channel::find($id);

        if ($channel) {

            $video = Video::where('channel_id', $channel->id)->paginate(40);

            if ($video) {

                $response['isFailed'] = false;
                $response['message'] = 'Success get data video';
                $response['result'] = fractal($video, new DataVideoChannelTransformer());

                return response()->json($response, 200);
            } else {

                $response['isFailed'] = true;
                $response['message'] = 'Cannot get video in channel';

                return response()->json($response, 200);
            }
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Channel not found';

            return response()->json($response, 200);
        }
    }

    public function visitorPlaylist($id)
    {
        $channel = Channel::find($id);

        if ($channel) {

            $playlist = Playlist::where('channel_id', $channel->id)->paginate(40);

            if ($playlist) {

                $response['isFailed'] = false;
                $response['message'] = 'Success get playlist';
                $response['result'] = fractal($playlist, new DataPlaylistChannelTransformer());

                return response()->json($response, 200);
            } else {

                $response['isFailed'] = true;
                $response['message'] = 'Can\'t get playlist';

                return response()->json($response, 200);
            }
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Channel not found';

            return response()->json($response, 200);
        }
    }

    public function visitorSubscription($id)
    {
        $channel = Channel::find($id);

        if ($channel) {

            $subscription = Subscription::where('user_id', $channel->user_id)
                ->where('is_subscribe', Configs::$IS_SUBSCRIBE['TRUE'])
                ->get();

            if ($subscription) {

                $response['isFailed'] = false;
                $response['message'] = 'Get subscription success';
                $response['result'] = fractal($subscription, new SubscriptionTransformer());

                return response()->json($response, 200);
            } else {

                $response['isFailed'] = true;
                $response['message'] = 'Get subscription failed';

                return response()->json($response, 200);
            }
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Channel not found';

            return response()->json($response, 200);
        }
    }

    public function visitorAbout($id)
    {
        $channel = Channel::find($id);

        if ($channel) {

            $response['isFailed'] = false;
            $response['message'] = 'Get About success';
            $response['result'] = [
                'id' => $channel->id,
                'name' => $channel->channel_name,
                'description' => $channel->channel_description,
                'address' => $channel->address,
                'phone' => $channel->phone_no
            ];

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Channel not found';

            return response()->json($response, 200);
        }
    }
}
