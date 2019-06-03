<?php

namespace App\Modules\MariaDB\Http\Controllers;

use App\Modules\MariaDB\Models\User\Data;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller {

    /**
     * Get users
     *
     * @param Request $request
     *
     * @throws
     * @return Response
     */
    public function index(Request $request) : Response {
        $users = User::query();

        if ($request->has('data_key')) {
            $users->whereIn('id', Data::query()
                ->select('user_id')
                ->where(Data::path($request->get('data_key')), '=', $request->get('data_value'))
                ->pluck('user_id'));
        }
        return response($users->get());
    }

}
