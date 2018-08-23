<?php

namespace ArbaFilm\Repositories\v1\History\Models;

use ArbaFilm\Repositories\v1\Account\Models\User;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use Illuminate\Database\Eloquent\Model;

class HistorySpectacle extends Model
{
    protected $table = 'history_spectacles';
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }
}
