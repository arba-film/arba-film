<?php

namespace ArbaFilm\Repositories\v1\Notification\Traits;

use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\Notification\Events\CustomerNotified;
use ArbaFilm\Repositories\v1\Notification\Models\Notification;
use ArbaFilm\Repositories\v1\Subscription\Models\Subscription;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

trait ProcessNotification
{
    public function handleNotification($data = array())
    {
        if (isset($data['channelId'])) {

            $subscriptions = Subscription::where('channel_id', $data['channelId'])
                ->where('type_notification_id', Configs::$TYPE_NOTIFICATION['ALWAYS'])
                ->where('is_subscribe', Configs::$IS_SUBSCRIBE['TRUE'])
                ->get();

            if (count($subscriptions) > 0) {

                foreach ($subscriptions as $subscription) {

                    $notification = Notification::create([
                        'user_id' => $subscription->user_id,
                        'friend_id' => null,
                        'channel_id' => $data['channelId'],
                        'group_notification_id' => $data['groupNotification'],
                        'title' => $data['title'],
                        'message' => $data['message'],
                        'date' => Carbon::now()->format('d/m/Y'),
                        'time' => Carbon::now()->format('H:i')
                    ]);

                    if ($notification) {
                        broadcast(new CustomerNotified($subscription->user_id, $notification->id));
                    }
                }

            }
        } elseif (isset($data['friendId'])) {
        } else {
            //
        }
    }
}