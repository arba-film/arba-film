<?php

namespace ArbaFilm\Repositories\v1\GlobalConfig;

use Faker\Provider\Uuid;

trait GlobalUtils
{

    public function generateUUID()
    {
        return Uuid::uuid();
    }

}