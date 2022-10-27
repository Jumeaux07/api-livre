<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DossierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dossiers')->insert([
            'doc1' => 'https://res.cloudinary.com/drbq47gxt/image/upload/v1654163601/qwmmucpm8y2ax3hborka.pdf',
            'user_id' => 1
        ]);
    }
}
