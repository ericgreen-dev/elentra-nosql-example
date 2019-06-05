<?php

namespace App\Modules\MongoDB\Database\Seeds;

use App\Modules\MongoDB\Models\Document;
use Illuminate\Database\Seeder;


class DocumentSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(Document::class, 10)->create();
    }

}
