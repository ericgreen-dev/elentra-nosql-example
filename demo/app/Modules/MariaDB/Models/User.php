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

}
