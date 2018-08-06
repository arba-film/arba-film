<?php

namespace ArbaFilm\Repositories\v1\Channel\Transformers;

use ArbaFilm\Repositories\v1\Video\Models\Video;
use League\Fractal\TransformerAbstract;

class DataVideoChannelTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Video $video)
    {
        return [
            'id' => $video->id,
            'channelId' => $video->channel_id,
            'title' => $video->title,
            'description' => $video->description,
            'groupVideo' => [
                'id' => $video->group_video_id,
                'name' => !is_null($video->groupVideo) ? $video->groupVideo->name : ''
            ],
            'playlist' => [
                'id' => $video->playlist_id,
                'name' => !is_null($video->playlist) ? $video->playlist->name : ''
            ],
            'photoCover' => $video->photo_cover,
            'data' => $video->date_upload,
            'time' => $video->time_upload
        ];
    }
}
