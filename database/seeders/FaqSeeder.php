<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data FAQ 1
        Faq::create([
            'pertanyaan' => 'Bagaimana cara melakukan voting?',
            'jawaban' => 'Silakan login menggunakan NIM dan Nama Lengkap sesuai KTM, lalu pilih kandidat di bilik suara digital.'
        ]);

        // Data FAQ 2
        Faq::create([
            'pertanyaan' => 'Apakah saya bisa mengubah pilihan?',
            'jawaban' => 'Tidak. Pilihan yang sudah dikirim bersifat final dan tidak dapat diubah kembali.'
        ]);

        // Data FAQ 3
        Faq::create([
            'pertanyaan' => 'Kapan hasil voting diumumkan?',
            'jawaban' => 'Hasil perolehan suara dapat dilihat secara Real Count oleh panitia dan akan diumumkan resmi setelah sesi voting ditutup.'
        ]);
    }
}
