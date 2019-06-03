<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // Create the admin user
        User::create([
            'id' => 1,
            'name' => __('System Administrator'),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
        ]);

        // Generate 10 random users
        factory(User::class, 10)->create();
    }

}
