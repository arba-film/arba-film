<?php

namespace ArbaFilm\Http\Controllers\API\v1\Channel;

use ArbaFilm\Repositories\v1\GlobalConfig\CheckLoginTraits\Channel;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;

class ChannelController extends Controller
{
    use Channel;

    public function addChannel(Request $request)
    {
        return $this->checkLogin($request, 'addChannel');
    }

    public function listChannel()
    {
        return $this->checkLogin(request(), 'listChannel');
    }

    public function vdChannel($id)
    {
        return $this->checkLogin(request(), 'vdChannel', $id);
    }

    public function updateChannel(Request $request)
    {
        return $this->checkLogin($request, 'updateChannel');
    }

    public function deleteChannel(Request $request)
    {
        return $this->checkLogin($request, 'deleteChannel');
    }
}
