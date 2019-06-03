<?php

namespace App\Modules\MariaDB\Http\Controllers;

use App\Modules\MariaDB\Models\UserData;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;


class UserDataController extends Controller {

    /**
     * Get all of a user's data. This will fetch the values for all keys in the current User's data.
     *
     * @param Request $request
     *
     * @throws
     * @return Response
     */
    public function index(Request $request) : Response {
        return response(UserData::user($request->user())
            ->pluck('data')
            ->first() ?? []);
    }

    /**
     * Fetch all of the logged in User's data for a particular key.
     *
     * Eg. GET /api/maria/user-data/some.example.key
     *
     * {
     *      "some": "value"
     * }
     *
     * @param Request $request
     * @param string  $key
     *
     * @throws
     * @return Response
     */
    public function show(Request $request, $key) : Response {
        $data = UserData::user($request->user())->first();

        if (!$data || !Arr::has($data->data, $key)) {
            return response(null, 404);
        }
        return response(Arr::get($data->data, $key));
    }

    /**
     * Write user data to a single key. This will perform an overwrite of any existing values for that key and return
     * the new value for that key.
     *
     * @param Request  $request
     * @param string   $key
     *
     * @throws
     * @return Response
     */
    public function save(Request $request, $key) : Response {
        $data = UserData::firstOrCreate([
            'user_id' => $request->user()->id
        ], ['data' => []]);

        $data->forceFill([UserData::path($key) => json_decode($request->getContent())]);

        if (!$data->save()) {
            abort(500, __('Error writing key'));
        }
        return response(Arr::get($data->data, $key));
    }

    /**
     * Delete all data for a single key.
     *
     * @param Request $request
     * @param string  $key
     *
     * @return Response
     */
    public function destroy(Request $request, $key) : Response {
        $data = UserData::user($request->user())->first();

        if (!$data || !Arr::has($data->data, $key)) {
            return response(null, 404);
        }
        $value = Arr::get($data->data, $key);

        if (!$data->deleteKey($key)) {
            abort(500, __('Error deleting key'));
        }
        return response($value);
    }

}
