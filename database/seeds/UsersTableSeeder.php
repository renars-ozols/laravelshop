<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'name' => 'admin',
        	'password' => bcrypt('secret'),
            'email' => 'admin@shop.test',
            'email_verified_at' => now(),
        	'admin' => 1
        ]);

        App\User::create([
        	'name' => 'user',
        	'password' => bcrypt('secret'),
            'email' => 'user@shop.test',
            'email_verified_at' => now()
        ]);
    }
}
