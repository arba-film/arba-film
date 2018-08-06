<?php

namespace ArbaFilm\Repositories\v1\Video\Models;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\Components\Models\GroupVideo;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $guarded = [''];

    public $incrementing = false;

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function playlist()
    {
        return $this->belongsTo(Playlist::class, 'playlist_id');
    }

    public function groupVideo()
    {
        return $this->belongsTo(GroupVideo::class, 'group_video_id');
    }
}
