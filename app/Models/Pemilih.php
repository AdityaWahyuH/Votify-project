<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilih extends Model
{
    use HasFactory;

    
    protected $table = 'pemilih';

    protected $fillable = [
        'nim',
        'nama',
        'sudah_memilih'
    ];
    
    protected $casts = [
        'sudah_memilih' => 'boolean'
    ];
}
