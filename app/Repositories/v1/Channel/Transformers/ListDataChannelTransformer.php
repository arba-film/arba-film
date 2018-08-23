<?php

namespace ArbaFilm\Repositories\v1\Channel\Transformers;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use League\Fractal\TransformerAbstract;

class ListDataChannelTransformer extends TransformerAbstract
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
            'email' => $channel->user->email,
            'channel' => [
                'id' => $channel->id,
                'name' => $channel->channel_name,
            ],
            'countryName' => !is_null($channel->country) ? $channel->country->name : '',
            'photoProfile' => $channel->photo_profile
        ];
    }
}
