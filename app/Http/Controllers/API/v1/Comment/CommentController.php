<?php

namespace ArbaFilm\Http\Controllers\API\v1\Comment;

use ArbaFilm\Repositories\v1\Comment\Models\Comment;
use ArbaFilm\Repositories\v1\GlobalConfig\IssueToken;
use ArbaFilm\Repositories\v1\Video\Transformers\CommentTransformer;
use Illuminate\Http\Request;
use ArbaFilm\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    use IssueToken;

    public function addComment(Request $request)
    {
        $checkLogin = $this->checkLogin();

        if (!$checkLogin['isLogin']) {
            return response()->json($checkLogin);
        }

        $validator = Validator::make($request->all(), [
            'comment' => 'required',
            'videoId' => 'required'
        ]);

        if ($validator->fails()) {

            $response['isFailed'] = true;
            $response['message'] = 'Your request is empty';

            return response($response, 200);
        }

        $user = $checkLogin['user'];

        $comment = Comment::create([
            'user_id' => $user->id,
            'video_id' => $request->videoId,
            'comment' => $request->comment,
            'parent_comment_id' => !is_null($request->parentId) ? $request->parentId : 0,
            'date' => Carbon::now()->format('d/m/Y'),
            'time' => Carbon::now()->format('H:i')
        ]);

        if ($comment) {

            $response['isFailed'] = false;
            $response['message'] = 'Comment is saved';
            $response['result'] = fractal($comment, new CommentTransformer());

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Save comment failed';

            return response($response, 200);
        }
    }
}
