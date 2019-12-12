<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Kodig',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'status' => '1',
            ],
            [
                'name' => 'User Kodig',
                'email' => 'user@user.com',
                'password' => bcrypt('password'),
                'status' => '2',
            ],
            [
                'name' => 'User 2 Kodig',
                'email' => 'user2@user.com',
                'password' => bcrypt('password'),
                'status' => '2',
            ]
        ]);
    }
}
