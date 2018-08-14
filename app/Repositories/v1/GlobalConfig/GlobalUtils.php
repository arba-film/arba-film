<?php

namespace ArbaFilm\Repositories\v1\GlobalConfig;

use Faker\Provider\Uuid;

trait GlobalUtils
{

    public function generateUUID()
    {
        return Uuid::uuid();
    }

    public function getPhotoName($file, $text)
    {
        return str_random(36) . str_shuffle(str_replace(' ', '', $text)) . '.' . $file->extension();
    }

    public function getVideoName($file, $text)
    {
        return str_random(30) . str_shuffle(str_replace(' ', '', $text)) . '.' . $file->extension();
    }

}