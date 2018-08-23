<?php

namespace ArbaFilm\Repositories\v1\Channel\Transformers;

use ArbaFilm\Repositories\v1\Subscription\Models\Subscription;
use League\Fractal\TransformerAbstract;

class SubscriptionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Subscription $subscription)
    {
        return [
            'id' => $subscription->id,
            'channel' => [
                'id' => $subscription->channel_id,
                'name' => !is_null($subscription->channel) ? $subscription->channel->channel_name : null,
                'photoProfile' => !is_null($subscription->channel) ? $subscription->channel->photo_profile : null,
                'statusActive' => !is_null($subscription->channel) ? $subscription->channel->status_active : null
            ]
        ];
    }

}
