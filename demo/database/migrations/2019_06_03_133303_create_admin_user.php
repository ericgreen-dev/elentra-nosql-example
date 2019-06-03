<?php

use App\User;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUser extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  {
        User::create([
            'id'                => 1,
            'name'              => __('System Administrator'),
            'password'          => bcrypt('password'),
            'email'             => 'admin@example.com'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        User::where(['email' => 'admin@example.com'])->delete();
    }

}
