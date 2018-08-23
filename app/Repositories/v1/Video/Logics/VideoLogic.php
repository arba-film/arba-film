<?php

namespace ArbaFilm\Repositories\v1\Video\Logics;

use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\GlobalConfig\GlobalUtils;
use ArbaFilm\Repositories\v1\Notification\Traits\ProcessNotification;
use ArbaFilm\Repositories\v1\Subscription\Models\Subscription;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use ArbaFilm\Repositories\v1\Video\Transformers\DetailVideoTransformer;
use ArbaFilm\Repositories\v1\Video\Transformers\VideoTransformer;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class VideoLogic extends VideoUseCase
{
    use GlobalUtils;
    use ProcessNotification;

    public function handleAddVideo($request, $user)
    {
        $channel = Channel::where('user_id', $user->id)
            ->where('status_active', Configs::$ACCESS_STATUS['ACTIVE'])
            ->first();

        if ($channel) {

            $validator = Validator::make($request->all(), [
                'videoFile' => 'required',
                'title' => 'required',
            ]);

            if ($validator->fails()) {

                $response['isFailed'] = true;
                $response['message'] = 'File video and title must be filled';

                return response()->json($response, 200);
            }

            $newVideoName = null;
            $newCoverName = null;

            /** Handle video upload */
            if ($request->hasFile('videoFile') && $request->file('videoFile')->isValid()) {

                /** Save new video */
                $newVideoName = $this->getVideoName($request->videoFile, str_random(20));
                $destinationVideoPath = storage_path(Configs::$VIDEO_PATH['VIDEO']);
                $moveVideo = $request->videoFile->move($destinationVideoPath, $newVideoName);

                if (!$moveVideo) {

                    $response['isFailed'] = true;
                    $response['message'] = 'Failed to save your video';

                    return response()->json($response, 200);
                }

            }

            /** Handle image upload */
            if ($request->hasFile('photoCover') && $request->file('photoCover')->isValid()) {

                /** Save new image */
                $newCoverName = $this->getPhotoName($request->photoCover, str_random(10));
                $destinationCoverPath = Configs::$IMAGE_PATH['COVER_VIDEO'];
                $moveCover = $request->photoCover->move($destinationCoverPath, $newCoverName);

                if (!$moveCover) {

                    $response['isFailed'] = true;
                    $response['message'] = 'Failed to save your photo cover';

                    return response()->json($response, 200);
                }
            }

            $video = Video::create([
                'id' => $this->generateUUID(),
                'channel_id' => $channel->id,
                'group_video_id' => $request->groupVideoId,
                'playlist_id' => $request->playlistId,
                'file' => $newVideoName,
                'title' => $request->title,
                'count_watching' => 0,
                'description' => $request->description,
                'photo_cover' => $newCoverName,
                'date_upload' => Carbon::now()->format('d/m/Y'),
                'time_upload' => Carbon::now()->format('H:i'),
            ]);

            if ($video) {

                $channel->update(['count_upload' => ($channel->count_upload + 1)]);

                $dataNotification = [
                    'channelId' => $channel->id,
                    'groupNotification' => Configs::$GROUP_NOTIFICATION['NEW_VIDEO'],
                    'title' => 'New video',
                    'message' => '<b>' . $channel->channel_name . '</b> added a new video. Hurry watch the video'
                ];

                $this->handleNotification($dataNotification);

                $response['isFailed'] = false;
                $response['message'] = 'Success upload video';
                $response['result'] = fractal($video, new DetailVideoTransformer());

                return response()->json($response, 200);
            } else {

                $response['isFailed'] = true;
                $response['message'] = 'Upload video failed';

                return response()->json($response, 200);
            }
//            UploadVideoJob::dispatch($request->file('videoFile')->store('uploads', 'public'),$destinationVideoPath, $newVideoName)->onConnection('database')->onQueue('default');
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Please choose your channel';

            return response()->json($response, 200);
        }
    }

    public function handleListVideo($user)
    {
        $channel = Channel::where('user_id', $user->id)
            ->where('status_active', Configs::$ACCESS_STATUS['ACTIVE'])
            ->first();

        if ($channel) {

            $video = Video::where('channel_id', $channel->id)->get();

            if ($video) {

                $response['isFailed'] = false;
                $response['message'] = 'Success get video';
                $response['result'] = fractal($video, new VideoTransformer());

                return response()->json($response, 200);
            } else {

                $response['isFailed'] = true;
                $response['message'] = 'Get data video failed';

                return response()->json($response, 200);
            }
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Please choose your channel';

            return response()->json($response, 200);
        }
    }

    public function handleDetailVideo($id)
    {
        $video = Video::find($id);

        if ($video) {

            $response['isFailed'] = false;
            $response['message'] = 'Get video successfully';
            $response['result'] = fractal($video, new DetailVideoTransformer());

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Can\'t get data video';

            return response()->json($response, 200);
        }
    }

    public function handleUpdateVideo($request)
    {
        $video = Video::find($request->id);

        if ($video) {

            /** Handle video update */
            if ($request->hasFile('videoFile') && $request->file('videoFile')->isValid()) {

                /** Save video update */
                $destinationVideoPath = Configs::$VIDEO_PATH['VIDEO'];
                $request->videoFile->move($destinationVideoPath, $video->file);

            }

            /** Handle image update */
            if ($request->hasFile('photoCover') && $request->file('photoCover')->isValid()) {

                /** Save update image */
                $namePhotoCover = !is_null($video->photo_cover) ?
                    $video->photo_cover :
                    $this->getPhotoName($request->photoCover, str_random(10));
                $destinationCoverPath = Configs::$IMAGE_PATH['COVER_VIDEO'];
                $request->photoCover->move($destinationCoverPath, $namePhotoCover);

                $video->update(['photo_cover' => $namePhotoCover]);

            }

            $video->update([
                'title' => $request->title,
                'group_video_id' => $request->groupVideoId,
                'playlist_id' => $request->playlistId,
                'description' => $request->description,
            ]);

            $response['isFailed'] = false;
            $response['message'] = 'Success update data';
            $response['result'] = fractal($video, new DetailVideoTransformer());

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Video not found';

            return response()->json($response, 200);
        }
    }

    public function handleDeleteVideo($request)
    {
        $video = Video::find($request->id);

        if ($video) {

            /** Handle image photo cover */
            $photoCoverPath = Configs::$IMAGE_PATH['COVER_VIDEO'] . $video->photo_cover;
            if (file_exists($photoCoverPath)) {

                $deletePhoto = unlink($photoCoverPath);

                if (!$deletePhoto) {

                    $response['isFailed'] = true;
                    $response['message'] = 'Can\'t deleted photo cover your video';

                    return response()->json($response, 200);
                }
            }

            /** Handle image video */
            $videoFilePath = Configs::$VIDEO_PATH['VIDEO'] . $video->file;
            if (file_exists($videoFilePath)) {

                $deleteVideo = unlink($videoFilePath);

                if (!$deleteVideo) {

                    $response['isFailed'] = true;
                    $response['message'] = 'Can\'t deleted your video';

                    return response()->json($response, 200);
                }
            }

            $video->delete();

            $response['isFailed'] = false;
            $response['message'] = 'Delete video success';

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Video does not exist';

            return response()->json($response, 200);
        }
    }
}