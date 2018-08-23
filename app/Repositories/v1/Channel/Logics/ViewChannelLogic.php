<?php

namespace ArbaFilm\Repositories\v1\Channel\Logics;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\Channel\Transformers\DataPlaylistChannelTransformer;
use ArbaFilm\Repositories\v1\Channel\Transformers\DetailDataChannelTransformer;
use ArbaFilm\Repositories\v1\Channel\Transformers\SubscriptionTransformer;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\GlobalConfig\GlobalUtils;
use ArbaFilm\Repositories\v1\Subscription\Models\Subscription;
use ArbaFilm\Repositories\v1\Video\Models\Playlist;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use ArbaFilm\Repositories\v1\Video\Transformers\VideoTransformer;

class ViewChannelLogic extends ViewChannelUseCase
{
    use GlobalUtils;

    public function handleDashboard($user)
    {
        $channel = Channel::where('user_id', $user->id)
            ->where('status_active', Configs::$ACCESS_STATUS['ACTIVE'])
            ->first();

        if ($channel) {

            $subscription = Subscription::where('user_id', $user->id)
                ->where('is_subscribe', Configs::$IS_SUBSCRIBE['TRUE'])
                ->paginate(10);

            $video = Video::where('channel_id', $channel->id)
                ->orderBy('count_watching', 'DESC')
                ->paginate(10);

            $response['isFailed'] = false;
            $response['message'] = 'Success get data';
            $response['result'] = [
                'channel' => fractal($channel, new DetailDataChannelTransformer()),
                'video' => fractal($video, new VideoTransformer()),
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

    public function handleListVideo($user)
    {
        $channel = Channel::where('user_id', $user->id)
            ->where('status_active', Configs::$ACCESS_STATUS['ACTIVE'])
            ->first();

        if ($channel) {

            $video = Video::where('channel_id', $channel->id)->paginate(40);

            if ($video) {

                $response['isFailed'] = false;
                $response['message'] = 'Success get data video';
                $response['result'] = fractal($video, new VideoTransformer());

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

    public function handlePlaylist($user)
    {
        $channel = Channel::where('user_id', $user->id)
            ->where('status_active', Configs::$ACCESS_STATUS['ACTIVE'])
            ->first();

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

    public function handleSubscription($user)
    {
        $subscription = Subscription::where('user_id', $user->id)
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
    }

    public function handleAbout($user)
    {
        $channel = Channel::where('user_id', $user->id)
            ->where('status_active', Configs::$ACCESS_STATUS['ACTIVE'])
            ->first();

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