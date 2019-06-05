<?php

namespace App\Modules\MariaDB\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\MariaDB\Libraries\Support\Facades\User;
use App\Modules\MariaDB\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class DataController extends Controller {

    /**
     * Get all of a user's data. This will fetch the values for all keys in the current User's data.
     *
     * @param Request $request
     *
     * @throws
     * @return Response
     */
    public function index(Request $request) : Response {
        return response(User::getDataAttribute());
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
        $data = User::getDataAttribute($key);

        if (!$data) {
            return response(null, 404);
        }
        return response($data);
    }

    /**
     * Write user data to a single key. This will perform an overwrite of any existing values for that key and return
     * the new value for that key.
     *
     * @param Request $request
     * @param string  $key
     *
     * @throws
     * @return Response
     */
    public function save(Request $request, $key) : Response {
        $data = Data::firstOrCreate([
            'user_id' => $request->user()->id
        ], ['data' => []]);

        $raw  = $request->getContent();
        $json = json_decode($raw);

        $data->forceFill([Data::path($key) => $json ?? $raw]);

        if (!$data->save()) {
            abort(500, __('Error writing data'));
        }
        return response(User::getDataAttribute($key));
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
        $data = User::getDataAttribute($key);

        if (!$data) {
            return response(null, 404);
        }
        if (!User::dropDataAttribute($key)) {
            abort(500, __('Error deleting key'));
        }
        return response($data);
    }

}
