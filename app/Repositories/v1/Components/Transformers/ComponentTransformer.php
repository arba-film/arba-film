<?php

namespace ArbaFilm\Repositories\v1\Components\Transformers;

use League\Fractal\TransformerAbstract;

class ComponentTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($component)
    {
        return [
            'id' => $component->id,
            'name' => $component->name
        ];
    }

}
