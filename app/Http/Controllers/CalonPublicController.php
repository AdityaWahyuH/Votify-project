<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calon;

class CalonPublicController extends Controller
{
    /**
     * Menampilkan daftar calon untuk publik
     */
    public function index()
    {
        $calon_dpm = Calon::where('posisi', 'DPM')->get();
        $calon_bem = Calon::where('posisi', 'BEM')->get();
        
        return view('calon.index', compact('calon_dpm', 'calon_bem'));
    }
}
