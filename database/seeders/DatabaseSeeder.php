<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\DossierSeeder;
use Database\Seeders\MatiereSeeder;
use Database\Seeders\MatiereUserSeeder;

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
            AdminSeeder::class,
            UserSeeder::class,
            MatiereSeeder::class,
            DossierSeeder::class,
            LivreSeeder::class,
            MatiereUserSeeder::class
        ]);
    }
}
