<?php

namespace App\Modules\MariaDB\Database\Seeds;

use App\Modules\MariaDB\Models\Data;
use App\User;
use Illuminate\Database\Seeder;


class UserDataSeeder extends Seeder {

    /**
     * Seed randomly generated user data
     *
     * @return void
     */
    public function run() {
        factory(Data::class, 10)->create(); // Generate 10 random users
    }

}
