<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('livres')->insert([
            'sku' => 'HG2378',
            'nom' => 'Histoire Application',
            'points' =>300,
            'status' =>true,
            'user_id' => 1
        ]);
    }
}
