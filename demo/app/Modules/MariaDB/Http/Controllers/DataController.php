<?php

namespace App\Modules\MariaDB\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\MariaDB\Models\Data;
use App\Modules\MariaDB\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class DataController extends Controller {

    /**
     * Get all of a user's data. This will fetch the values for all keys in the current User's data.
     *
     * @param Request $request
     * @param User    $user
     *
     * @throws
     * @return Response
     */
    public function index(Request $request, User $user) : Response {
        return response($user->getDataAttribute());
    }

    /**
     * Fetch all of the logged in User's data for a particular key.
     *
     * Eg. GET /api/maria/users/1/some.example.key
     *
     * {
     *      "some": "value"
     * }
     *
     * @param Request $request
     * @param User    $user
     * @param string  $key
     *
     * @throws
     * @return Response
     */
    public function show(Request $request, User $user, $key) : Response {
        $data = $user->getDataAttribute($key);

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
     * @param User    $user
     * @param string  $key
     *
     * @throws
     * @return Response
     */
    public function save(Request $request, User $user, $key) : Response {
        $data = Data::firstOrCreate([
            'user_id' => $user->id
        ], ['data' => []]);

        $raw  = $request->getContent();
        $json = json_decode($raw);

        $data->forceFill([Data::path($key) => $json ?? $raw]);

        if (!$data->save()) {
            abort(500, __('Error writing data'));
        }
        return response($user->getDataAttribute($key));
    }

    /**
     * Delete all data for a single key.
     *
     * @param Request $request
     * @param User    $user
     * @param string  $key
     *
     * @return Response
     */
    public function destroy(Request $request, User $user, $key) : Response {
        $data = $user->getDataAttribute($key);

        if (!$data) {
            return response(null, 404);
        }
        if (!$user->dropDataAttribute($key)) {
            abort(500, __('Error deleting key'));
        }
        return response($data);
    }

}
