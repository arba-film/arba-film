<?php

namespace ArbaFilm\Repositories\v1\GlobalConfig;

class Configs
{
    public static $ACCESS_STATUS = [
        'NON_ACTIVE' => 0,
        'ACTIVE' => 1
    ];

    public static $ACCESS_TOKEN_REVOKE = [
        'GIVEN' => 0,
        'REVOKE' => 1
    ];
}