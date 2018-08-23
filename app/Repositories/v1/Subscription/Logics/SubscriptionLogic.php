<?php

namespace ArbaFilm\Repositories\v1\Subscription\Logics;

use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\GlobalConfig\GlobalUtils;
use ArbaFilm\Repositories\v1\Subscription\Models\Subscription;
use ArbaFilm\Repositories\v1\Subscription\Transformers\SubscriptionTransformer;
use ArbaFilm\Repositories\v1\Subscription\Transformers\VideoTransformer;
use ArbaFilm\Repositories\v1\Video\Models\Video;

class SubscriptionLogic extends SubscriptionUseCase
{
    use GlobalUtils;

    public function handleListVideo($user)
    {
        $subscribe = Subscription::where('user_id', $user->id)
            ->where('is_subscribe', Configs::$IS_SUBSCRIBE['TRUE'])
            ->get();

        if ($subscribe) {

            if (count($subscribe) > 0) {

                $result = array();

                foreach ($subscribe as $channel) {
                    $result[] = [
                        'channel' => [
                            'id' => $channel->channel_id,
                            'name' => !is_null($channel->channel) ? $channel->channel->channel_name : null
                        ],
                        'video' => $this->handleDataVideo($channel->channel_id)
                    ];
                }

                $response['isFailed'] = false;
                $response['message'] = 'Success get data subscribe';
                $response['result'] = $result;

                return response()->json($response, 200);
            } else {

                $response['isFailed'] = true;
                $response['message'] = 'Does not exist subscribe';

                return response()->json($response, 200);
            }
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Get data subscribe is failed';

            return response()->json($response, 200);
        }
    }

    private function handleDataVideo($channelId)
    {
        $video = Video::where('channel_id', $channelId)
            ->orderBy('date_upload', 'DESC')
            ->orderBy('time_upload', 'DESC')
            ->paginate(20);

        if ($video) {
            $result = fractal($video, new VideoTransformer());
        } else {
            $result = array();
        }

        return $result;
    }

    public function handleAddSubscribe($request, $user)
    {
        $subscribe = Subscription::create([
            'id' => $this->generateUUID(),
            'user_id' => $user->id,
            'channel_id' => $request->channelId,
            'type_notification_id' => Configs::$TYPE_NOTIFICATION['NOT_ACTIVE'],
            'is_subscribe' => Configs::$IS_SUBSCRIBE['TRUE']
        ]);

        if ($subscribe) {

            $response['isFailed'] = false;
            $response['message'] = 'You has been subscribe';
            $response['result'] = fractal($subscribe, new SubscriptionTransformer());

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Subscribe failed';

            return response()->json($response, 200);
        }
    }

    public function handleUnSubscribe($request)
    {
        $subscribe = Subscription::find($request->id);

        if ($subscribe) {

            $subscribe->update(['is_subscribe' => Configs::$IS_SUBSCRIBE['FALSE']]);

            $response['isFailed'] = false;
            $response['message'] = 'Unsubscribe success';

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Subscribe not found';

            return response()->json($response, 200);
        }
    }
}