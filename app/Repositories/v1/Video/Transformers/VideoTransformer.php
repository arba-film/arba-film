<?php

namespace ArbaFilm\Repositories\v1\Video\Transformers;

use ArbaFilm\Repositories\v1\GlobalConfig\TimeDifference;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use Illuminate\Support\Carbon;
use League\Fractal\TransformerAbstract;

class VideoTransformer extends TransformerAbstract
{
    use TimeDifference;

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Video $video)
    {
        return [
            'id' => $video->id,
            'channelName' => !is_null($video->channel) ? $video->channel->channel_name : null,
            'title' => $video->title,
            'photoCover' => $video->photo_cover,
            'countWatching' => $video->count_watching,
            'difference' => $this->difference($video->date_upload, $video->time_upload)
        ];
    }

}
