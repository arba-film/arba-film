<?php

namespace ArbaFilm\Repositories\v1\Account\Models;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\Comment\Models\Comment;
use ArbaFilm\Repositories\v1\Like\Models\Like;
use ArbaFilm\Repositories\v1\Notification\Models\Notification;
use ArbaFilm\Repositories\v1\Subscription\Models\Subscriber;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    public $incrementing = false;

    protected $guarded = [''];

    protected $fillable = [
        'name', 'full_name', 'email', 'password', 'allow_admin_access'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function channel()
    {
        return $this->hasMany(Channel::class, 'user_id');
    }

    public function subscribe()
    {
        return $this->hasMany(Subscriber::class, 'user_id');
    }

    public function notification()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'user_id');
    }
}
