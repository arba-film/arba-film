<?php

namespace ArbaFilm\Repositories\v1\GlobalConfig;

use ArbaFilm\Repositories\v1\Account\Models\DataLoginAccount;
use ArbaFilm\Repositories\v1\Account\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

trait IssueToken
{
    public function createToken(Request $request, $grantType, $scope = "")
    {

        $params = [
            'grant_type' => $grantType,
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'scope' => $scope
        ];

        $params['username'] = $request->username ?: $request->email;

        $request->request->add($params);

        $proxy = Request::create('oauth/token', 'POST');

        $this->historyLogin($request->email);

        return Route::dispatch($proxy);

    }

    public function checkLogin()
    {
        $user = Auth::guard('api')->user();

        if ($user) {

            $response = [
                'isLogin' => true,
                'message' => 'You has been logged in',
                'user' => $user
            ];

            return $response;
        } else {

            $response = [
                'isLogin' => false,
                'message' => 'You are not logged in',
                'result' => array()
            ];

            return $response;
        }
    }

    private function historyLogin($email)
    {
        $userId = User::where('email', $email)->first()->id;

        if ($userId) {
            DataLoginAccount::create([
                'user_id' => $userId,
                'user_ip' => request()->ip(),
                'date' => Carbon::now()->format('d/m/Y'),
                'time' => Carbon::now()->format('H:i')
            ]);
        }
    }
}