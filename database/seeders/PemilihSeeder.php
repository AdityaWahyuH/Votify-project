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
            'nama' => 'Rafi Aditya',
            'sudah_memilih' => false
        ]);

        // Data Pemilih 2
        Pemilih::create([
            'nim' => '1204230082', // Ganti NIM sesuai aslinya jika perlu
            'nama' => 'Aditya Wahyu Hidayatullah',
            'sudah_memilih' => false
        ]);

         // Data Pemilih 3
        Pemilih::create([
            'nim' => '1204230003', // Ganti NIM sesuai aslinya jika perlu
            'nama' => 'Jolian Martin',
            'sudah_memilih' => false
        ]);

        // Data Pemilih 4
        Pemilih::create([
            'nim' => '1204230004', // Ganti NIM sesuai aslinya jika perlu
            'nama' => 'Ardyn Nugraha',
            'sudah_memilih' => false
        ]);

        // Data Pemilih 5
        Pemilih::create([
            'nim' => '1204230005', // Ganti NIM sesuai aslinya jika perlu
            'nama' => 'Muhammad Fahrezy',
            'sudah_memilih' => false
        ]);

        // Data Pemilih 6
        Pemilih::create([
            'nim' => '1204230006', // Ganti NIM sesuai aslinya jika perlu
            'nama' => 'Narendra Darel',
            'sudah_memilih' => false
        ]);
    }
}
