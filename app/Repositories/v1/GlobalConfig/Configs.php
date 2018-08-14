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

    public static $GROUP_LIKE = [
        'COMMENT' => 1,
        'VIDEO' => 2,
    ];

    public static $GROUP_NOTIFICATION = [
        'COMMENT' => 1,
        'NEW_VIDEO' => 2,
        'CHAT' => 3
    ];

    public static $LIKE_THIS = [
        'TRUE' => 1,
        'FALSE' => 0
    ];

    public static $IS_SUBSCRIBE = [
        'FALSE' => 0,
        'TRUE' => 1
    ];

    public static $TYPE_COLLECTION = [
        'FAVORITE' => 1,
        'WATCHING_LATER' => 2
    ];

    public static $TYPE_NOTIFICATION = [
        'ALWAYS' => 1,
        'SOMETIMES' => 2,
        'NOT_ACTIVE' => 3
    ];


    /*
      |-------------------------------------------------------------------------
      | Paths Configurations
      |--------------------------------------------------------------------------
    */

    public static $IMAGE_PATH = [
        'PROFILE_CHANNEL' => 'img/channel/cover/',
        'COVER_CHANNEL' => 'img/channel/cover/',
        'GALLERY_IMAGE' => 'img/gallery/',
        'COVER_MUSIC' => 'img/music/',
        'PROFILE_VIDEO' => 'img/video/cover/',
        'COVER_VIDEO' => 'img/video/cover/'
    ];

    public static $VIDEO_PATH = [
        'VIDEO' => 'app/vdo/',
    ];

}