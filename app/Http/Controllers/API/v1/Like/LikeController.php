<?php

namespace ArbaFilm\Http\Controllers\API\v1\Like;

use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use ArbaFilm\Repositories\v1\Like\Models\Like;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{
    use IssueToken;

    public function like(Request $request)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin, 200);
        }

        $validator = Validator::make($request->all(), [
            'videoId' => 'required'
        ]);

        if ($validator->fails()) {

            $response['isFailed'] = true;
            $response['message'] = 'Video id request is empty';

            return response()->json($response, 200);
        }

        $user = $checkLogin['user'];

        $like = Like::updateOrCreate(
            [
                'user_id' => $user->id,
                'video_id' => $request->videoId,
                'comment_id' => $this->handleLikeComment($request),
                'group_like_id' => $this->handleGroupLike($request)
            ],
            [
                'like_this' => Configs::$LIKE_THIS['TRUE']
            ]
        );

        if ($like) {

            $response['isFailed'] = false;
            $response['message'] = 'Success this like';
            $response['result'] = $like;

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Can\'t this like';

            return response()->json($response, 200);
        }

    }

    public function dislike(Request $request)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin, 200);
        }

        $validator = Validator::make($request->all(), [
            'videoId' => 'required'
        ]);

        if ($validator->fails()) {

            $response['isFailed'] = true;
            $response['message'] = 'Video id request is empty';

            return response()->json($response, 200);
        }

        $user = $checkLogin['user'];

        $like = Like::updateOrCreate(
            [
                'user_id' => $user->id,
                'video_id' => $request->videoId,
                'comment_id' => $this->handleLikeComment($request),
                'group_like_id' => $this->handleGroupLike($request)
            ],
            [
                'like_this' => Configs::$LIKE_THIS['FALSE']
            ]
        );

        if ($like) {

            $response['isFailed'] = false;
            $response['message'] = 'Success this dislike';
            $response['result'] = $like;

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Can\'t this dislike';

            return response()->json($response, 200);
        }
    }

    private function handleLikeComment($request)
    {
        if (isset($request->commentId) && !is_null($request->commentId)) {
            return $request->commentId;
        } else {
            return null;
        }
    }

    private function handleGroupLike($request)
    {
        if (isset($request->commentId) && !is_null($request->commentId)) {
            return Configs::$GROUP_LIKE['COMMENT'];
        } else {
            return Configs::$GROUP_LIKE['VIDEO'];
        }
    }

}
