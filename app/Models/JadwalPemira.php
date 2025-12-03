<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPemira extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pemira'; // Tentukan nama tabel secara eksplisit

    protected $fillable = [
        'tahap',
        'tanggal_mulai',
        'tanggal_akhir'
    ];
}
