<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;


class CreateDocumentsCollection extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() : void {
        Schema::connection('mongodb')->create('documents', function (Blueprint $collection) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() : void {
        Schema::connection('mongodb')->drop('documents');
    }

}
