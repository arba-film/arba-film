<?php

namespace ArbaFilm\Repositories\v1\History\Transformers;

use ArbaFilm\Repositories\v1\Components\Models\GroupVideo;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\History\Models\HistorySearch;
use League\Fractal\TransformerAbstract;

class HistorySearchTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(HistorySearch $history)
    {
        return [
            'id' => $history->id,
            'search' => $history->search,
            'dateTime' => $history->dateTime
        ];
    }

}
