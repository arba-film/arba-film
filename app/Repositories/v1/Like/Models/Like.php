<?php

namespace ArbaFilm\Repositories\v1\Like\Models;

use ArbaFilm\Repositories\v1\Account\Models\User;
use ArbaFilm\Repositories\v1\Comment\Models\Comment;
use ArbaFilm\Repositories\v1\Components\Models\GroupLike;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function video()
    {
        return $this->belongsTo(Video::class, 'video_id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    public function groupLike()
    {
        return $this->belongsTo(GroupLike::class, 'group_like_id');
    }
}
