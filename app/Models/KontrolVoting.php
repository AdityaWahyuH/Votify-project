<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontrolVoting extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk menentukan nama tabel yang benar
    protected $table = 'kontrol_voting'; 

    protected $fillable = [
        'status_voting'
    ];

    protected $casts = [
        'status_voting' => 'boolean'
    ];
}
