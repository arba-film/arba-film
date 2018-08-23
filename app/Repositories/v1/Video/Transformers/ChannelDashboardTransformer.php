<?php

namespace ArbaFilm\Repositories\v1\Video\Transformers;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\Subscription\Models\Subscription;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use League\Fractal\TransformerAbstract;

class ChannelDashboardTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Channel $channel)
    {
        $isShow = $this->handleShow($channel->id);

        return [
            'id' => $channel->id,
            'name' => $channel->channel_name,
            'photoProfile' => $channel->photo_profile,
            'subscriber' => $this->handleSubscriber($channel->id),
            'isShow' => $isShow,
            'video' => ($isShow) ? $this->handleVideo($channel->id) : null,
        ];
    }

    private function handleShow($channelId)
    {
        $video = Video::where('channel_id', $channelId)->count();

        return ($video >= 10) ? true : false;
    }

    private function handleSubscriber($channelId)
    {
        $subscribe = Subscription::where('channel_id', $channelId)
            ->where('is_subscribe', Configs::$IS_SUBSCRIBE['TRUE'])
            ->count();

        return $subscribe;
    }

    private function handleVideo($channelId)
    {
        $video = Video::where('channel_id', $channelId)
            ->orderBy('count_watching', 'DESC')
            ->orderBy('date_upload', 'DESC')
            ->orderBy('time_upload', 'DESC')
            ->orderByRaw('RAND()')
            ->take(10)
            ->get();

        return fractal($video, new VideoTransformer());
    }

}
