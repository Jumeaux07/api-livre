<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'nom' => 'Zouzoua',
            'prenoms' => 'Essis Cedric',
            'email' => 'cedriczouzoua@gmail.com',
            'phone' => '0103772742',
            'password' => Hash::make('12345678X'),
            'adresse' => 'Abidjan-Yopougon',
            'photo' => 'https://res.cloudinary.com/drbq47gxt/image/upload/v1666828721/ls5xjhwzgyzql585xveo.png',
            'status' => 1, //0 = "déactivé" 1 = "activé" 2 = "en attente"
            'score' => 5000,
            'remember_token' => Str::random(10)
        ]);
    }
}
