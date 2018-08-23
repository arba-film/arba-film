<?php

namespace ArbaFilm\Http\Controllers\API\v1\History;

use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use ArbaFilm\Repositories\v1\History\Models\HistorySpectacle;
use ArbaFilm\Repositories\v1\History\Transformers\HistorySpectacleTransformer;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;

class HistorySpectacleController extends Controller
{
    use IssueToken;

    public function listHistory()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin);
        }

        $user = $checkLogin['user'];

        $history = HistorySpectacle::where('user_id', $user->id)->orderBy('dateTime', 'DESC')->get();

        if ($history) {

            $response['isFailed'] = false;
            $response['message'] = 'Success get data history';
            $response['result'] = fractal($history, new HistorySpectacleTransformer());

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Get data history failed';

            return response()->json($response, 200);
        }
    }

    public function deleteSpecific($id)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin);
        }

        $deleteHistory = HistorySpectacle::find($id)->delete();

        if ($deleteHistory) {

            $response['isFailed'] = false;
            $response['message'] = 'Delete history success';

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'History does not exist';

            return response()->json($response, 200);
        }
    }

    public function deleteAllSpectacle()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin);
        }

        $user = $checkLogin['user'];

        $deleteSpectacle = HistorySpectacle::where('user_id', $user->id)->delete();

        if ($deleteSpectacle) {

            $response['isFailed'] = false;
            $response['message'] = 'Delete history success';

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'History does not exist';

            return response()->json($response, 200);
        }
    }
}
