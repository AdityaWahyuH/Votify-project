<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{
    use HasFactory;

    protected $table = 'suara';

    protected $fillable = [
        'nim_pemilih',
        'id_calon',
        'waktu_pilih'
    ];

    // Relasi ke tabel Calon
    public function calon()
    {
        return $this->belongsTo(Calon::class, 'id_calon');
    }
}
