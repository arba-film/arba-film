<?php

namespace ArbaFilm\Repositories\v1\Video\Models;

use Illuminate\Database\Eloquent\Model;

class GroupPlayVideo extends Model
{
    protected $table = 'group_play_videos';

    public function groupPlayVideo()
    {
        return $this->belongsTo(GroupPlayVideo::class, 'group_play_video_id');
    }
}
