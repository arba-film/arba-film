<?php

namespace ArbaFilm\Repositories\v1\Notification\Models;

use ArbaFilm\Repositories\v1\Account\Models\User;
use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\Components\Models\GroupNotification;
use ArbaFilm\Repositories\v1\Subscription\Models\Subscriber;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function subscribe()
    {
        return $this->belongsTo(Subscriber::class, 'subscribe_id');
    }

    public function groupNotification()
    {
        return $this->belongsTo(GroupNotification::class, 'group_notification_id');
    }
}
