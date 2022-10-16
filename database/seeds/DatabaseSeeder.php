<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
         $this->call([
             UserSeeder::class
         ]);
//        DB::table('users')->insert([
//            'role' => 'Admin',
//            'image' => 'no-image.png',
//            'name' => 'Paulo',
//            'email' => 'paulo@gmail.com',
//            'password' => Hash::make('password'),
//        ]);
    }
}
