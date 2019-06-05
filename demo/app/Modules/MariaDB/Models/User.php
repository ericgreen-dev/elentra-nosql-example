<?php

namespace App\Modules\MariaDB\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;


class User extends \App\User {

    /**
     * Get the data for the user
     *
     * @return HasOne
     */
    public function data() : HasOne {
        return $this->hasOne(Data::class, 'user_id', 'id');
    }

    /**
     * Get an  attribute from the user's data
     *
     * @param string $attribute
     * @return mixed
     */
    public function getDataAttribute($attribute = 'data') {
        return $this->data()
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
    public function dropDataAttribute($attribute) : bool {
        $data = $this->data()->first();

        if (!$data) {
            return false;
        }
        return $data->deleteKey($attribute);
    }

}
