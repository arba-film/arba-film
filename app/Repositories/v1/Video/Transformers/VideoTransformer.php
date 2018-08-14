<?php

namespace ArbaFilm\Repositories\v1\Video\Transformers;

use ArbaFilm\Repositories\v1\Components\Models\GroupVideo;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
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
            'channel' => [
                'id' => $video->channel_id,
                'name' => !is_null($video->channel) ? $video->channel->channel_name : null
            ],
            'groupVideo' => $this->handleGroupVideo($video->group_video_id),
            'playlist' => [
                'id' => $video->playlist_id,
                'name' => !is_null($video->playlist) ? $video->playlist->name : ''
            ],
            'file' => Configs::$VIDEO_PATH['VIDEO'] . $video->file,
            'title' => $video->title,
            'description' => $video->description,
            'photoCover' => $this->handlePhotoCover($video),
            'data' => $video->date_upload,
            'time' => $video->time_upload
        ];
    }

    private function handleGroupVideo($groupVideoId)
    {
        $groupVideoArray = explode("/", $groupVideoId);

        $result = array();

        foreach ($groupVideoArray as $group) {
            $data = GroupVideo::find($group);

            if ($data) {
                $result[] = [
                    'id' => $data->id,
                    'name' => $data->name
                ];
            }
        }

        return $result;
    }

    private function handlePhotoCover($video)
    {
        $coverPath = Configs::$IMAGE_PATH['COVER_VIDEO'] . $video->photo_cover;

        if (file_exists($coverPath)) {
            return $coverPath;
        } else {
            return null;
        }
    }

}
