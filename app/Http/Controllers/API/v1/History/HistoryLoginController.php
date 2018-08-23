<?php

namespace ArbaFilm\Http\Controllers\API\v1\History;

use ArbaFilm\Repositories\v1\Account\Models\DataLoginAccount;
use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;

class HistoryLoginController extends Controller
{
    use IssueToken;

    public function listHistory()
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin);
        }

        $user = $checkLogin['user'];

        $histories = DataLoginAccount::where('user_id', $user->id)->get();

        if ($histories) {

            $result = array();

            foreach ($histories as $history) {

                $result[] = [
                    'name' => !is_null($history->user) ? $history->user->full_name : null,
                    'email' => !is_null($history->user) ? $history->user->email : null,
                    'ip' => $history->user_ip,
                    'date' => $history->date,
                    'time' => $history->time,
                    'browser' => $_SERVER['HTTP_USER_AGENT']
                ];
            }

            $response['isFailed'] = false;
            $response['message'] = 'Get data history successfully';
            $response['result'] = $result;

            return response($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Get data history failed';

            return response($response, 200);
        }
    }
}
