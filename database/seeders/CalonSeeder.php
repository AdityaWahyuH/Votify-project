<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Calon;

class CalonSeeder extends Seeder
{
    public function run(): void
    {
        // Calon DPM
        Calon::create([
            'nama' => 'Ardyn Nugraha',
            'posisi' => 'DPM',
            'visi' => 'Mewujudkan DPM yang aspiratif.',
            'misi' => '1. Mendengar suara mahasiswa. 2. Transparansi anggaran.',
            'program_kerja' => 'Kotak aspirasi online, Sidang terbuka.'
        ]);

        // Calon BEM
        Calon::create([
            'nama' => 'Aditya Wahyu',
            'posisi' => 'BEM',
            'visi' => 'BEM yang kolaboratif dan prestatif.',
            'misi' => '1. Meningkatkan softskill. 2. Membangun relasi eksternal.',
            'program_kerja' => 'Festival Mahasiswa, Latihan Kepemimpinan.'
        ]);
    }
}
