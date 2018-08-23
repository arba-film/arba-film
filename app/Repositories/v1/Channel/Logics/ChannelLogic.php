<?php

namespace ArbaFilm\Repositories\v1\Channel\Logics;

use ArbaFilm\Repositories\v1\Account\Transformers\DataChannelTransformer;
use ArbaFilm\Repositories\v1\Channel\Models\Channel;
use ArbaFilm\Repositories\v1\Channel\Transformers\DetailDataChannelTransformer;
use ArbaFilm\Repositories\v1\Channel\Transformers\ListDataChannelTransformer;
use ArbaFilm\Repositories\v1\GlobalConfig\Configs;
use ArbaFilm\Repositories\v1\GlobalConfig\GlobalUtils;
use ArbaFilm\Repositories\v1\Video\Models\Video;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ChannelLogic extends ChannelUseCase
{
    use GlobalUtils;

    public function handleAddChannel($request, $user)
    {
        $validator = Validator::make($request->all(), [
            'channelName' => 'required',
            'channelDescription' => 'required',
            'photoProfile' => 'required',
            'photoCover' => 'required'
        ]);

        if ($validator->fails()) {

            $response['isFailed'] = true;
            $response['message'] = 'There is empty data';

            return response()->json($response, 200);
        }

        $checkChannel = $this->handleCheckChannel($user);

        if ($checkChannel == 0) {
            $request->request->add(['statusActive' => Configs::$ACCESS_STATUS['ACTIVE']]);
        }

        $newProfileName = '';
        $newCoverName = '';

        /** Handle image upload */
        if ($request->hasFile('photoProfile') && $request->file('photoProfile')->isValid()) {

            /** Save new image */
            $newProfileName = $this->getPhotoName($request->photoProfile, str_random(10));
            $destinationProfilePath = Configs::$IMAGE_PATH['PROFILE_CHANNEL'];
            $moveProfileImage = $request->photoProfile->move($destinationProfilePath, $newProfileName);

            if (!$moveProfileImage) {

                $response['isFailed'] = true;
                $response['message'] = 'Failed to save cover image';

                return response()->json($response, 200);
            }
        }

        /** Handle image upload */
        if ($request->hasFile('photoCover') && $request->file('photoCover')->isValid()) {

            /** Save new image */
            $newCoverName = $this->getPhotoName($request->photoCover, str_random(10));
            $destinationCoverPath = Configs::$IMAGE_PATH['COVER_CHANNEL'];
            $moveCoverImage = $request->photoCover->move($destinationCoverPath, $newCoverName);

            if (!$moveCoverImage) {

                $response['isFailed'] = true;
                $response['message'] = 'Failed to save cover image';

                return response()->json($response, 200);
            }
        }

        $channel = Channel::create([
            'id' => $this->generateUUID(),
            'user_id' => $user->id,
            'channel_name' => $request->channelName,
            'channel_description' => $request->channelDescription,
            'address' => $request->address,
            'country_id' => $request->countryId,
            'city' => $request->city,
            'phone_no' => $request->phoneNo,
            'photo_profile' => $newProfileName,
            'photo_cover' => $newCoverName,
            'status_active' => isset($request->statusActive) ? $request->statusActive : 0,
        ]);

        if ($channel) {

            $response['isFailed'] = false;
            $response['message'] = 'Add channel success';
            $response['result'] = fractal($channel, new DataChannelTransformer());

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Add channel failed';

            return response()->json($response, 200);
        }
    }

    private function handleCheckChannel($user)
    {
        $channel = Channel::where('user_id', $user->id)
            ->where('status_active', Configs::$ACCESS_STATUS['ACTIVE'])
            ->count();

        return $channel;
    }

    public function handleListChannel($user)
    {
        $channel = Channel::where('user_id', $user->id)->get();

        if ($channel) {

            $response['isFailed'] = false;
            $response['message'] = 'Get data channel success';
            $response['result'] = fractal($channel, new ListDataChannelTransformer());

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Can\'t get data channel';

            return response()->json($response, 200);
        }
    }

    public function handleVDetailChannel($id)
    {
        $channel = Channel::find($id);

        if ($channel) {

            $response['isFailed'] = false;
            $response['message'] = 'Success get data';
            $response['result'] = fractal($channel, new DetailDataChannelTransformer());

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Channel not found';

            return response()->json($response, 200);
        }
    }

    public function handleUpdateChannel($request)
    {

        $channel = Channel::find($request->id);

        if ($channel) {

            /** Handle image upload */
            if ($request->hasFile('photoProfile') && $request->file('photoProfile')->isValid()) {

                /** Save new image */
                $newProfileName = $this->getPhotoName($request->photoProfile, str_random(10));
                $destinationProfilePath = Configs::$IMAGE_PATH['PROFILE_CHANNEL'];
                $moveProfileImage = $request->photoProfile->move($destinationProfilePath, $newProfileName);

                if ($moveProfileImage) {

                    File::delete(app_path($channel->photo_profile));
                    Channel::find($request->id)->update(['photo_profile' => $newProfileName]);
                } else {

                    $response['isFailed'] = true;
                    $response['message'] = 'Failed to update photo cover';

                    return response()->json($response, 200);
                }
            }

            /** Handle image upload */
            if ($request->hasFile('photoCover') && $request->file('photoCover')->isValid()) {

                /** Save new image */
                $newCoverName = $this->getPhotoName($request->photoCover, str_random(10));
                $destinationCoverPath = Configs::$IMAGE_PATH['COVER_CHANNEL'];
                $moveCoverImage = $request->photoCover->move($destinationCoverPath, $newCoverName);

                if ($moveCoverImage) {

                    File::delete(app_path($channel->photo_cover));
                    Channel::find($request->id)->update(['photo_cover' => $newCoverName]);
                } else {

                    $response['isFailed'] = true;
                    $response['message'] = 'Failed to update photo cover';

                    return response()->json($response, 200);
                }
            }

            $dataUpdateChannel = [
                'channel_name' => $request->channelName,
                'channel_description' => $request->channelDescription,
                'address' => $request->address,
                'country_id' => $request->countryId,
                'city' => $request->city,
                'phone_no' => $request->phoneNo,
            ];

            if ($channel->update($dataUpdateChannel)) {

                $response['isFailed'] = false;
                $response['message'] = 'Update data success';
                $response['result'] = $channel;

                return response()->json($response, 200);
            } else {

                $response['isFailed'] = true;
                $response['message'] = 'Update channel failed';

                return response()->json($response, 200);
            }
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Channel not found';

            return response()->json($response, 200);
        }

    }

    public function handleDeleteChannel($request)
    {
        $channel = Channel::find($request->id);

        if ($channel) {

            $channel->delete();

            $response['isFailed'] = false;
            $response['message'] = 'Delete channel success';

            return response()->json($response, 200);
        } else {

            $response['isFailed'] = true;
            $response['message'] = 'Channel does not exist';

            return response()->json($response, 200);
        }
    }

}