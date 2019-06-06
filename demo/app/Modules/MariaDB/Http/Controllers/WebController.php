<?php

namespace App\Modules\MariaDB\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


class WebController extends Controller {

    /**
     *
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Get the example index page
     *
     * @return Response
     */
    public function index() {
        return view('mariadb::example');
    }

}
