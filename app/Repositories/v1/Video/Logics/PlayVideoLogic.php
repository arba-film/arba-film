<?php

namespace ArbaFilm\Repositories\v1\Video\Logics;

use ArbaFilm\Repositories\v1\Comment\Models\Comment;
use ArbaFilm\Repositories\v1\GlobalConfig\GlobalUtils;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use ArbaFilm\Repositories\v1\Video\Transformers\CommentTransformer;
use ArbaFilm\Repositories\v1\Video\Transformers\PlayVideoTransformer;
use ArbaFilm\Repositories\v1\Video\Transformers\VideoTransformer;

class PlayVideoLogic extends PlayVideoUseCase
{
    use GlobalUtils;

    public function handlePlayVideo($request)
    {
        $video = Video::find($request->videoId);

        if ($video) {

            $video->update(['count_watching' => ($video->count_watching + 1)]);

            $response['isFailed'] = false;
            $response['message'] = 'Success get video';
            $response['result'] = [
                'video' => [
                    'play' => fractal($video, new PlayVideoTransformer()),
                    'next' => $this->handleNextVideo($video),
                    'list' => $this->handleListVideo($video),
                ],
                'comment' => [
                    'parent' => $this->handleComment($video),
                    'count' => Comment::where('video_id', $video->id)->count()
                ],
            ];

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Video not found';

            return response()->json($response, 200);
        }
    }

    private function handleNextVideo($video)
    {
        if ($video->playlist_id != null) {

            $nextVideo = Video::where('playlist_id', $video->playlist_id)
                ->where('id', '!=', $video->id)
                ->orderByRaw('RAND()')
                ->first();
        } else {

            $groupVideoArray = explode('/', $video->group_video_id);
            $groupVideoId = array_random($groupVideoArray);

            $nextVideo = Video::where('group_video_id', 'LIKE', "%$groupVideoId%")
                ->where('id', '!=', $video->id)
                ->orderByRaw('RAND()')
                ->first();
        }

        return fractal($nextVideo, new VideoTransformer());
    }

    private function handleListVideo($video)
    {
        $groupVideoArray = explode('/', $video->group_video_id);
        $groupVideoId = array_random($groupVideoArray);

        $listVideo = Video::where('group_video_id', 'LIKE', "%$groupVideoId%")
            ->where('id', '!=', $video->id)
            ->orderByRaw('RAND()')
            ->paginate(15);

        if ($listVideo) {
            return fractal($listVideo, new VideoTransformer());
        } else {
            return array();
        }
    }

    private function handleComment($video)
    {
        $comment = Comment::where('video_id', $video->id)
            ->where('parent_comment_id', 0)
            ->orderBy('date', 'DESC')
            ->paginate(40);

        if ($comment) {
            return fractal($comment, new CommentTransformer());
        } else {
            return array();
        }
    }

}