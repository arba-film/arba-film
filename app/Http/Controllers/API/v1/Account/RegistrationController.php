<?php

namespace ArbaFilm\Http\Controllers\API\v1\Account;

use ArbaFilm\Repositories\v1\Account\Models\User;
use ArbaFilm\Repositories\v1\GlobalConfig\GlobalUtils;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    use GlobalUtils;

    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'fullName' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {

            $response['isFailed'] = true;
            $response['message'] = 'Data register can\'t empty';

            return response()->json($response, 200);
        }

        $user = User::create([
            'id' => $this->generateUUID(),
            'name' => $request->name,
            'full_name' => $request->fullName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => str_random(10)
        ]);

        if ($user) {

            $response['isFailed'] = false;
            $response['message'] = 'Registration successfully';

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Registration failed';

            return response()->json($response, 200);
        }
    }
}
