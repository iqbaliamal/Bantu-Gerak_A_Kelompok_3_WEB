<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name'      => 'Admin',
            'email'     => 'admin@bantugerak.com',
            'role'     => 'admin',
            'password'  => Hash::make('adminadmin'),
        ]);
        DB::table('users')->insert([
            'name'      => 'User Demo',
            'email'     => 'user@demo.com',
            'role'     => 'user',
            'password'  => Hash::make('useruser'),
        ]);
    }
}
