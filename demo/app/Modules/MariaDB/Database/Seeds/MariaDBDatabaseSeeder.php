<?php

namespace App\Modules\MariaDB\Database\Seeds;

use Illuminate\Database\Seeder;


class MariaDBDatabaseSeeder extends Seeder {

    /**
     * Seed the module's database.
     *
     * @return void
     */
    public function run() {
        $this->call(UserDataSeeder::class);
    }

}
