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
        // ========================================
        // DATA PEMILIH BIASA
        // ========================================

        // Data Pemilih 1
        Pemilih::create([
            'nim' => '1204230001',
            'nama' => 'Rafi Aditya',
            'sudah_memilih' => false,
            'is_admin' => false
        ]);

        // Data Pemilih 2
        Pemilih::create([
            'nim' => '1204230082',
            'nama' => 'Aditya Wahyu Hidayatullah',
            'sudah_memilih' => false,
            'is_admin' => false
        ]);

        // Data Pemilih 3
        Pemilih::create([
            'nim' => '1204230003',
            'nama' => 'Jolian Martin',
            'sudah_memilih' => false,
            'is_admin' => false
        ]);

        // Data Pemilih 4
        Pemilih::create([
            'nim' => '1204230004',
            'nama' => 'Ardyn Nugraha',
            'sudah_memilih' => false,
            'is_admin' => false
        ]);

        // Data Pemilih 5
        Pemilih::create([
            'nim' => '1204230005',
            'nama' => 'Muhammad Fahrezy',
            'sudah_memilih' => false,
            'is_admin' => false
        ]);

        // Data Pemilih 6
        Pemilih::create([
            'nim' => '1204230006',
            'nama' => 'Narendra Darel',
            'sudah_memilih' => false,
            'is_admin' => false
        ]);


        // ========================================
        // DATA ADMIN (tidak bisa voting)
        // ========================================

        Pemilih::create([
            'nim' => '120423000',
            'nama' => 'Admin Panitia',
            'sudah_memilih' => false,
            'is_admin' => true  // ADMIN, tidak bisa voting
        ]);

        Pemilih::create([
            'nim' => '12042300033',
            'nama' => 'Panitia Pemira',
            'sudah_memilih' => false,
            'is_admin' => true  // ADMIN, tidak bisa voting
        ]);
    }
}
