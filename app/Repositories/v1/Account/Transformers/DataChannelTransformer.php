<?php

namespace ArbaFilm\Repositories\v1\Account\Transformers;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use League\Fractal\TransformerAbstract;

class DataChannelTransformer extends TransformerAbstract
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
            'country' => !is_null($channel->country) ? $channel->country->name : null,
            'city' => $channel->city,
            'phoneNo' => $channel->phone_no,
            'photoProfile' => $channel->photo_profile,
            'photoCover' => $channel->photo_cover,
        ];
    }
}
