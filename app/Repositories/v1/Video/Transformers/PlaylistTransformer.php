<?php

namespace ArbaFilm\Repositories\v1\Video\Transformers;

use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\Video\Models\Playlist;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use League\Fractal\TransformerAbstract;

class PlaylistTransformer extends TransformerAbstract
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
            'photoCover' => $this->handlePhotoCover($playlist->channel)
        ];
    }

    private function handlePhotoCover($channel)
    {
        $videoCover = Video::where('channel_id', $channel->id)->first()->photo_cover;

        if ($videoCover) {
            $photoPath = Configs::$IMAGE_PATH['COVER_VIDEO'] . $videoCover;
            return public_path($photoPath);
        } else {
            return array();
        }
    }

}
