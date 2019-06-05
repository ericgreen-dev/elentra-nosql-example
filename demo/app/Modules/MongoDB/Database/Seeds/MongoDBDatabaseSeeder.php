<?php

namespace App\Modules\MongoDB\Database\Seeds;

use Illuminate\Database\Seeder;


class MongoDBDatabaseSeeder extends Seeder {

    /**
     * Seed the module's database.
     *
     * @return void
     */
    public function run() {
        $this->call(DocumentSeeder::class);
    }

}
