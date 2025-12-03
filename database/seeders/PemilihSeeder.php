<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pemilih;

class PemilihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Pemilih 1
        Pemilih::create([
            'nim' => '1204230001', // Ganti NIM sesuai aslinya jika perlu
            'nama' => 'Muhammad Rizky Ardian',
            'sudah_memilih' => false
        ]);

        // Data Pemilih 2
        Pemilih::create([
            'nim' => '1204230002', // Ganti NIM sesuai aslinya jika perlu
            'nama' => 'Mohammad Fikri Isfahani',
            'sudah_memilih' => false
        ]);
    }
}
