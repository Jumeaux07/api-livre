<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Cédric',
            'email' => 'cedriczouzoua17@gmail.com',
            'password' => Hash::make('12345678X'), // password
            'remember_token' => Str::random(10),
            'created_at' => NOW()
        ]);
    }
}
