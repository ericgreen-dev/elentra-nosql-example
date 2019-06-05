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
        return \App\Modules\MariaDB\Models\User::class;
    }

    /**
     * Get an  attribute from the user's data
     *
     * @param string $attribute
     * @return mixed
     */
    public static function getDataAttribute($attribute = 'data') {
        return self::getFacadeRoot()
            ->data()
            ->select($attribute === 'data' ? 'data' : Data::path($attribute) . ' as ' . $attribute)
            ->pluck($attribute)
            ->first();
    }

    /**
     * Drop an attribute from the user's data
     *
     * @param string $attribute
     * @return mixed
     */
    public static function dropDataAttribute($attribute) : bool {
        $data = self::getFacadeRoot()
            ->data()
            ->first();

        if (!$data) {
            return false;
        }
        return $data->deleteKey($attribute);
    }

}
