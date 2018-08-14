<?php

namespace ArbaFilm\Repositories\v1\Subscription\Models;

use ArbaFilm\Repositories\v1\Account\Models\User;
use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\Components\Models\TypeNotification;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    protected $guarded = [''];

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function typeNotification()
    {
        return $this->belongsTo(TypeNotification::class, 'type_notification_id');
    }
}
