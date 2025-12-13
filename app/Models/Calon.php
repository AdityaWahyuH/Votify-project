<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     *
     * @var string
     */
    protected $table = 'calon';

    /**
     * Kolom yang boleh diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'posisi', // 'DPM' atau 'BEM'
        'visi',
        'misi',
        'program_kerja',
        'foto',
    ];

    /**
     * Relasi ke model Suara.
     * Satu calon bisa memiliki banyak suara.
     */
    public function suara()
    {
        return $this->hasMany(Suara::class, 'id_calon');
    }
}
