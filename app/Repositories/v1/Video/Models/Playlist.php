<?php

namespace ArbaFilm\Repositories\v1\Video\Models;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlists';
    protected $guarded = [''];

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }
}
