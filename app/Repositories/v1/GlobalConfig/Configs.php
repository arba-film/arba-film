<?php

namespace ArbaFilm\Repositories\v1\GlobalConfig;

class Configs
{

    /*
     |-------------------------------------------------------------------------
     | Types Configurations
     |--------------------------------------------------------------------------
   */

    public static $ACCESS_STATUS = [
        'NON_ACTIVE' => 0,
        'ACTIVE' => 1
    ];

    public static $ACCESS_TOKEN_REVOKE = [
        'GIVEN' => 0,
        'REVOKE' => 1
    ];


    /*
      |-------------------------------------------------------------------------
      | Paths Configurations
      |--------------------------------------------------------------------------
    */

    public static $IMAGE_PATH = [
        'PROFILE_CHANNEL' => 'img/channel/profile/',
        'COVER_CHANNEL' => 'img/channel/cover/',
        'GALLERY_IMAGE' => 'img/gallery/',
        'COVER_MUSIC' => 'img/music/',
        'PROFILE_VIDEO' => 'img/video/profile/',
        'COVER_VIDEO' => 'img/video/cover/'
    ];

    public static $VIDEO_PATH = [
        'SERIES' => 'vdo/series/',
        'ONLY' => 'vdo/only/',
    ];

}