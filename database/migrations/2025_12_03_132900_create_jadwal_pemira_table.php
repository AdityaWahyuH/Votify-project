<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_pemira', function (Blueprint $table) {
            $table->id();
            $table->string('tahap');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->timestamps();
        });
    }

    /**
     * Drop the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pemira');
    }
};
