<?php

namespace ArbaFilm\Repositories\v1\Subscription\Transformers;

use ArbaFilm\Repositories\v1\Video\Models\Video;
use League\Fractal\TransformerAbstract;

class VideoTransformer extends TransformerAbstract
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
            'title' => $video->title,
            'photoCover' => $video->photo_cover,
            'countView' => $video->count_view,
            'dateUpload' => $video->date_upload,
            'timeUpload' => $video->time_upload,
        ];
    }

}
