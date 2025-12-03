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
        Schema::create('calon', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->enum('posisi', ['DPM', 'BEM']);
        $table->text('visi');
        $table->text('misi');
        $table->text('program_kerja');
        $table->string('foto')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon');
    }
};
