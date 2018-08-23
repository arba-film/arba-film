<?php

namespace ArbaFilm\Repositories\v1\History\Transformers;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\Components\Models\GroupVideo;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\GlobalConfig\TimeDifference;
use ArbaFilm\Repositories\v1\History\Models\HistorySpectacle;
use League\Fractal\TransformerAbstract;

class HistorySpectacleTransformer extends TransformerAbstract
{
    use TimeDifference;

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(HistorySpectacle $history)
    {
        return [
            'id' => $history->id,
            'data' => [
                'channel' => [
                    'id' => !is_null($history->video->channel) ? $history->video->channel->id : null,
                    'name' => !is_null($history->video->channel) ? $history->video->channel->channel_name : null
                ],
                'video' => [
                    'id' => !is_null($history->video) ? $history->video->id : null,
                    'title' => !is_null($history->video) ? $history->video->title : null,
                    'photoCover' => !is_null($history->video) ? Configs::$IMAGE_PATH['COVER_VIDEO'] . $history->video->photo_cover : null,
                    'countWatching' => !is_null($history->video) ? $history->video->count_watching : null,
                    'groupVideo' => !is_null($history->video) ? $this->handleGroupVideo($history->video->group_video_id) : null,
                    'difference' => !is_null($history->video) ? $this->difference($history->video->date_upload, $history->video->time_upload) : null
                ]
            ],
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
}
