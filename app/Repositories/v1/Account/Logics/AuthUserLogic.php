<?php

namespace ArbaFilm\Repositories\v1\Account\Logics;

use ArbaFilm\Repositories\v1\Account\Models\User;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client;

class AuthUserLogic extends AuthUserUseCase
{
    use IssueToken;

    private $client;

    public function __construct()
    {
        $this->client = Client::find(2);
    }

    public function handleLogin($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {

            $response['isFailed'] = true;
            $response['message'] = 'Email or password should not empty';

            return response()->json($response, 200);
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {

            if ($user->access_status == Configs::$ACCESS_STATUS['ACTIVE']) {

                return $this->createToken($request, 'password');
            } else {

                $response['isFailed'] = true;
                $response['message'] = 'Your account has been deactivated';

                return response()->json($response, 200);
            }
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Your account not found';

            return response()->json($response, 200);
        }
    }

    public function handleSuccess()
    {
        $user = Auth::guard('api')->user();

        if ($user) {

            $response['isFailed'] = false;
            $response['message'] = 'Login successfully';
            $response['result'] = $user;

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'You are not logged in';

            return response()->json($response, 200);
        }
    }

    public function handleLogout()
    {
        $user = Auth::guard('api')->user();

        if ($user) {

            $accessToke = $user->token();

            if ($accessToke) {

                DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToke->id)
                    ->update(['revoked' => Configs::$ACCESS_TOKEN_REVOKE['REVOKE']]);

                $accessToke->revoke();

                $response = array();
                $response['isFailed'] = false;
                $response['message'] = 'Logout successfully';

                return response()->json($response, 200);
            } else {

                $response['isFailed'] = true;
                $response['message'] = 'Access token is failed';

                return response()->json($response, 200);
            }
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Logout failed';

            return response()->json($response, 200);
        }
    }
}