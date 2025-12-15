<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Calon;

class CalonSeeder extends Seeder
{
    public function run(): void
    {
        // DPM 1
        Calon::updateOrCreate(
            ['nama' => 'Ardyn Nugraha & Jolian Martin', 'posisi' => 'DPM'],
            [
                'visi' => 'Mewujudkan DPM yang aspiratif, responsif, dan transparan bagi seluruh mahasiswa.',
                'misi' => "1. Mengoptimalkan fungsi pengawasan terhadap BEM.\n2. Membuka kanal aspirasi digital yang mudah diakses.\n3. Meningkatkan transparansi anggaran kemahasiswaan.",
                'program_kerja' => 'Legislative Summit, Kotak Aspirasi Online, Sidang Terbuka Mahasiswa.',
                // PENTING: simpan NAMA FILE SAJA (tanpa "images/")
                'foto' => 'paslon-1.jpg',
            ]
        );

        // DPM 2
        Calon::updateOrCreate(
            ['nama' => 'Rafi Aditya & Joe Petra', 'posisi' => 'DPM'],
            [
                'visi' => 'Membangun parlemen kampus yang modern, inklusif, dan berintegritas tinggi.',
                'misi' => "1. Memperkuat regulasi internal organisasi mahasiswa.\n2. Menjalin sinergi harmonis dengan pihak rektorat.\n3. Mengadakan forum diskusi rutin bulanan.",
                'program_kerja' => 'Klinik Advokasi Mahasiswa, Parlemen Mengajar, Revisi UU KM.',
                'foto' => 'paslon-2.jpg',
            ]
        );

        // BEM 1
        Calon::updateOrCreate(
            ['nama' => 'Abel Chrisnaldi & Mohamad Fikri Isfahani', 'posisi' => 'BEM'],
            [
                'visi' => 'BEM Kolaboratif: Bergerak Bersama Mewujudkan Kampus Prestatif dan Madani.',
                'misi' => "1. Meningkatkan softskill mahasiswa melalui pelatihan profesional.\n2. Membangun kemitraan strategis dengan industri.\n3. Menciptakan iklim kompetisi yang sehat.",
                'program_kerja' => 'Festival Inovasi Mahasiswa, Telkom Career Expo, Pekan Olahraga Kampus.',
                'foto' => 'paslon-3.jpg',
            ]
        );

        // BEM 2
        Calon::updateOrCreate(
            ['nama' => 'Muhammad Rizky Ardian & Narendra Darel', 'posisi' => 'BEM'],
            [
                'visi' => 'Akselerasi Perubahan: Menuju BEM yang Kreatif, Solutif, dan Berdaya Saing Global.',
                'misi' => "1. Digitalisasi layanan administrasi kemahasiswaan.\n2. Pemberdayaan UMKM mahasiswa melalui inkubator bisnis.\n3. Pengabdian masyarakat yang berdampak nyata.",
                'program_kerja' => 'Start-up Incubator, Desa Binaan Digital, Konser Amal Tahunan.',
                'foto' => 'paslon-4.jpg',
            ]
        );
    }
}
