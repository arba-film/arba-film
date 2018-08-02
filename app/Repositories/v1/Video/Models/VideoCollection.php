<?php

namespace ArbaFilm\Repositories\v1\Video\Models;

use ArbaFilm\Repositories\v1\Account\Models\User;
use ArbaFilm\Repositories\v1\Components\Models\TypeCollection;
use Illuminate\Database\Eloquent\Model;

class VideoCollection extends Model
{
    protected $table = 'video_collections';
    protected $guarded = [''];

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }

    public function typeCollection()
    {
        return $this->belongsTo(TypeCollection::class, 'type_collection_id');
    }
}
