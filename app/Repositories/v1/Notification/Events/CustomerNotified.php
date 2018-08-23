<?php

namespace ArbaFilm\Repositories\v1\Notification\Events;

use ArbaFilm\Repositories\v1\Notification\Models\Notification;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CustomerNotified
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;

    public $title;
    public $message;
    public $url;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userId, $notificationId)
    {
        $this->userId = $userId;
        $notification = Notification::find($notificationId);

        if ($notification) {
            $this->title = $notification->title;
            $this->message = $notification->message;
            $this->url = $notification->url;
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('notify.' . $this->userId);
    }
}
