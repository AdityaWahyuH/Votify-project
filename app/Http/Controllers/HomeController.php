<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalPemira;
use App\Models\Calon;
use App\Models\Faq;

class HomeController extends Controller
{
    /**
     * Halaman utama/landing page
     */
    public function index()
    {
        $jadwal = JadwalPemira::all();
        $calon = Calon::all();
        
        return view('home', compact('jadwal', 'calon'));
    }

    /**
     * Halaman FAQ
     */
    public function faq()
    {
        $faq = Faq::all();
        
        return view('faq', compact('faq'));
    }
}
