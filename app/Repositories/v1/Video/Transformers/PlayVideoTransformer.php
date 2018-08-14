<?php

namespace ArbaFilm\Repositories\v1\Video\Transformers;

use ArbaFilm\Repositories\v1\Components\Models\GroupVideo;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\Like\Models\Like;
use ArbaFilm\Repositories\v1\Subscription\Models\Subscription;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use League\Fractal\TransformerAbstract;

class PlayVideoTransformer extends TransformerAbstract
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
            'file' => $this->handleFileVideo($video),
            'title' => $video->title,
            'description' => $video->description,
            'countWatching' => $video->count_watching,
            'countLike' => $this->handleCountLike($video),
            'countDislike' => $this->handleCountDislike($video),
            'countSubscribe' => $this->handleSubscribe($video),
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

    private function handleFileVideo($video)
    {
        $videoPath = storage_path(Configs::$VIDEO_PATH['VIDEO'] . $video->file);

        if (file_exists($videoPath)) {
            return $videoPath;
        } else {
            return null;
        }
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

    private function handleSubscribe($video)
    {
        $subscribe = Subscription::where('channel_id', $video->channel_id)
            ->where('is_subscribe', Configs::$IS_SUBSCRIBE['TRUE'])
            ->count();

        return $subscribe;
    }

    private function handleCountLike($video)
    {
        $like = Like::where('video_id', $video->id)
            ->where('group_like_id', Configs::$GROUP_LIKE['VIDEO'])
            ->where('like_this', Configs::$LIKE_THIS['TRUE'])
            ->count();

        return $like;
    }

    private function handleCountDislike($video)
    {
        $like = Like::where('video_id', $video->id)
            ->where('group_like_id', Configs::$GROUP_LIKE['VIDEO'])
            ->where('like_this', Configs::$LIKE_THIS['FALSE'])
            ->count();

        return $like;
    }

}
