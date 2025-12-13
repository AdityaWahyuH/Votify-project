<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            CalonSeeder::class,
            PemilihSeeder::class,
            JadwalPemiraSeeder::class,
            KontrolVotingSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
