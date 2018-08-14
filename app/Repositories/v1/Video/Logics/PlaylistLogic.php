<?php

namespace ArbaFilm\Repositories\v1\Video\Logics;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\GlobalConfig\GlobalUtils;
use ArbaFilm\Repositories\v1\Video\Models\Playlist;
use ArbaFilm\Repositories\v1\Video\Transformers\PlaylistTransformer;

class PlaylistLogic extends PlaylistUseCase
{
    use GlobalUtils;

    public function handleListPlaylist($user)
    {
        $channel = Channel::where('user_id', $user->id)
            ->where('status_active', Configs::$ACCESS_STATUS['ACTIVE'])
            ->first();

        if ($channel) {

            $playlist = Playlist::where('channel_id', $channel->id)->get();

            if ($playlist) {

                $response['isFailed'] = false;
                $response['message'] = 'Get playlist success';
                $response['result'] = fractal($playlist, new PlaylistTransformer());

                return response()->json($response, 200);
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

    public function handleAddPlaylist($request, $user)
    {
        $playlist = Playlist::create([
            'channel_id' => $request->channelId,
            'name' => $request->name
        ]);

        if ($playlist) {

            $response['isFailed'] = false;
            $response['message'] = 'Add playlist success';
            $response['result'] = fractal($playlist, new PlaylistTransformer());

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = false;
            $response['message'] = 'Add playlist failed';

            return response()->json($response, 200);
        }
    }

    public function handleUpdatePlaylist($request)
    {
        $playlist = Playlist::find($request->id);

        if ($playlist) {

            $playlist->update(['name' => $request->name]);

            $response['isFailed'] = false;
            $response['message'] = 'Update playlist success';
            $response['result'] = fractal($playlist, new PlaylistTransformer());

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Playlist not found';

            return response()->json($response, 200);
        }
    }

    public function handleDeletePlaylist($request)
    {
        $playlist = Playlist::find($request->id);

        if ($playlist) {

            $playlist->delete();

            $response['isFailed'] = false;
            $response['message'] = 'Update playlist success';
            $response['result'] = fractal($playlist, new PlaylistTransformer());

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Playlist not found';

            return response()->json($response, 200);
        }
    }
}