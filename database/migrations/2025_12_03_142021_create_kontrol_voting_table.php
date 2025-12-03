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
        Schema::create('kontrol_voting', function (Blueprint $table) {
            $table->id();
            $table->boolean('status_voting')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Drop the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontrol_voting');
    }
};
