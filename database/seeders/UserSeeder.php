<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Md Admin',
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@gmail.com'),
        ]);
        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Md author',
            'user_name' => 'author',
            'email' => 'author@gmail.com',
            'email' => 'author@gmail.com',
            'password' => bcrypt('authorroot'),
        ]);

    }
}
