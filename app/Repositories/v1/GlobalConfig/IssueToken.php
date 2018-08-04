<?php

namespace ArbaFilm\Repositories\v1\GlobalConfig;

use Illuminate\Http\Request;
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

        $proxy = Request::create('oauth/token','POST');

        return Route::dispatch($proxy);

    }
}