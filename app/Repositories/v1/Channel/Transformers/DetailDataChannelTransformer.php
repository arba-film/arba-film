<?php

namespace ArbaFilm\Repositories\v1\Channel\Transformers;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use League\Fractal\TransformerAbstract;

class DetailDataChannelTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Channel $channel)
    {
        return [
            'id' => $channel->user->id,
            'name' => $channel->user->name,
            'fullName' => $channel->user->full_name,
            'email' => $channel->user->email,
            'channel' => [
                'id' => $channel->id,
                'name' => $channel->channel_name,
                'description' => $channel->channel_description
            ],
            'address' => $channel->address,
            'country' => [
                'id' => $channel->country_id,
                'name' => !is_null($channel->country) ? $channel->country->name : ''
            ],
            'city' => $channel->city,
            'phoneNo' => $channel->phone_no,
            'photoProfile' => $channel->photo_profile,
            'photoCover' => $channel->photo_cover,
            'statusActive' => $channel->status_active
        ];
    }
}
