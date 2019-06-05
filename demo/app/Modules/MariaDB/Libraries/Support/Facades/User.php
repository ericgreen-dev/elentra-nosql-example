<?php

namespace App\Modules\MariaDB\Libraries\Support\Facades;

use App\Modules\MariaDB\Models\Data;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Facade;


/**
 * Helper facade for the current logged in user
 *
 * @method static HasOne data()
 */
class User extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() : string {
        return 'maria.auth.user';
    }

}
