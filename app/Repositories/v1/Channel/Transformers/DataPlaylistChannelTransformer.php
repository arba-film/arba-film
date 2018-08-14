<?php

namespace ArbaFilm\Repositories\v1\Channel\Transformers;

use ArbaFilm\Repositories\v1\Video\Models\Playlist;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use League\Fractal\TransformerAbstract;

class DataPlaylistChannelTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Playlist $playlist)
    {
        return [
            'id' => $playlist->id,
            'name' => $playlist->name,
            'channel' => [
                'id' => $playlist->channel_id,
                'name' => !is_null($playlist->channel) ? $playlist->channel->channel_name : null
            ],
            'video' => $this->handelCountVideo($playlist->channel_id)
        ];
    }

    private function handelCountVideo($channelId)
    {
        $video = [
            'count' => Video::where('channel_id', $channelId)->count(),
            'photoCover' => Video::where('channel_id', $channelId)->first(['photo_cover'])
        ];

        return $video;
    }

}
