<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalPemira;

class JadwalPemiraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JadwalPemira::insert([
            [
                'tahap' => 'Pendaftaran Calon',
                'tanggal_mulai' => '2025-11-01',
                'tanggal_akhir' => '2025-11-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tahap' => 'Masa Kampanye',
                'tanggal_mulai' => '2025-11-11',
                'tanggal_akhir' => '2025-11-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tahap' => 'Pemungutan Suara',
                'tanggal_mulai' => '2025-11-25',
                'tanggal_akhir' => '2025-11-26',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tahap' => 'Pengumuman Hasil',
                'tanggal_mulai' => '2025-11-27',
                'tanggal_akhir' => '2025-11-27',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
