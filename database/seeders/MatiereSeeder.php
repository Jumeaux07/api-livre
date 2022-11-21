<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matieres')->insert([
            'designation' => 'Français',
            'status' => true
        ]);
        DB::table('matieres')->insert([
            'designation' => 'Anglais',
            'status' => true
        ]);
    }
}
