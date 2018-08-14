<?php

namespace ArbaFilm\Http\Controllers\API\v1\Component;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\Components\Transformers\ComponentTransformer;
use ArbaFilm\Repositories\v1\Components\Models\Country;
use ArbaFilm\Repositories\v1\Components\Models\GroupLike;
use ArbaFilm\Repositories\v1\Components\Models\GroupNotification;
use ArbaFilm\Repositories\v1\Components\Models\GroupVideo;
use ArbaFilm\Repositories\v1\Components\Models\TypeCollection;
use ArbaFilm\Repositories\v1\Components\Models\TypeNotification;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use ArbaFilm\Repositories\v1\Video\Models\Playlist;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;

class ComponentController extends Controller
{
    use IssueToken;

    public function getAllCountry()
    {
        $country = Country::all();

        return fractal($country, new ComponentTransformer());
    }

    public function getCountry($id)
    {
        $country = Country::find($id);

        return fractal($country, new ComponentTransformer());
    }

    public function getAllGroupLike()
    {
        $groupLike = GroupLike::all();

        return fractal($groupLike, new ComponentTransformer());
    }

    public function getGroupLike($id)
    {
        $groupLike = GroupLike::find($id);

        return fractal($groupLike, new ComponentTransformer());
    }

    public function getAllGroupNotification()
    {
        $groupNotification = GroupNotification::all();

        return fractal($groupNotification, new  ComponentTransformer());
    }

    public function getGroupNotification($id)
    {
        $groupNotification = GroupNotification::find($id);

        return fractal($groupNotification, new ComponentTransformer());
    }

    public function getAllGroupVideo()
    {
        $groupVideo = GroupVideo::all();

        return fractal($groupVideo, new ComponentTransformer());
    }

    public function getGroupVideo($id)
    {
        $groupVideo = GroupVideo::find($id);

        return fractal($groupVideo, new ComponentTransformer());
    }

    public function getAllTypeCollection()
    {
        $typeCollection = TypeCollection::all();

        return fractal($typeCollection, new ComponentTransformer());
    }

    public function getTypeCollection($id)
    {
        $typeCollection = TypeCollection::find($id);

        return fractal($typeCollection, new ComponentTransformer());
    }

    public function getAllTypeNotification()
    {
        $typeNotification = TypeNotification::all();

        return fractal($typeNotification, new ComponentTransformer());
    }

    public function getTypeNotification($id)
    {
        $typeNotification = TypeNotification::find($id);

        return fractal($typeNotification, new ComponentTransformer());
    }

    public function getPlaylistUser()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin, 200);
        }

        $user = $checkLogin['user'];

        $channel = Channel::where('user_id', $user->id)
            ->where('status_active', Configs::$ACCESS_STATUS['ACTIVE'])
            ->first();

        if ($channel) {

            $playlist = Playlist::where('channel_id', $channel->id)->get();

            if ($playlist) {
                return fractal($playlist, new ComponentTransformer());
            } else {

                $response['isFailed'] = true;
                $response['message'] = 'Get playlist failed';

                return response()->json($response, 200);
            }
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Get channel failed';

            return response()->json($response, 200);
        }
    }
}
