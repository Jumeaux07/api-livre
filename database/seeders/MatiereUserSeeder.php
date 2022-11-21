<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MatiereUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matiere_user')->insert([
            'user_id' => 1,
            'matiere_id' => 1
        ]);
        DB::table('matiere_user')->insert([
            'user_id' => 1,
            'matiere_id' => 2
        ]);
    }
}
