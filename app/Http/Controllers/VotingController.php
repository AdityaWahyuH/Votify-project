<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemilih;
use App\Models\Calon;
use App\Models\Suara;
use App\Models\KontrolVoting;

class VotingController extends Controller
{
    public function index()
    {
        $kontrol = KontrolVoting::first();
        // Cek apakah voting ditutup (status false atau data tidak ada)
        if (!$kontrol || !$kontrol->status_voting) {
            return view('voting.closed');
        }
        return view('voting.index');
    }

    public function verify(Request $request)
    {
        $pemilih = Pemilih::where('nim', $request->nim)
                          ->where('nama', $request->nama)
                          ->first();
        
        if (!$pemilih) {
            return back()->with('error', 'NIM atau Nama tidak terdaftar');
        }
        
        if ($pemilih->sudah_memilih) {
            return back()->with('error', 'Anda sudah melakukan voting');
        }
        
        $calon_dpm = Calon::where('posisi', 'DPM')->get();
        $calon_bem = Calon::where('posisi', 'BEM')->get();
        
        return view('voting.ballot', compact('pemilih', 'calon_dpm', 'calon_bem'));
    }

    public function submit(Request $request)
    {
        $pemilih = Pemilih::where('nim', $request->nim)->first();
        
        if (!$pemilih || $pemilih->sudah_memilih) {
            return redirect()->route('voting.index')->with('error', 'Sudah voting atau data tidak valid');
        }
        
        // Simpan suara Calon DPM
        if ($request->has('id_calon_dpm')) {
            Suara::create([
                'nim_pemilih' => $request->nim,
                'id_calon' => $request->id_calon_dpm,
                'waktu_pilih' => now()
            ]);
        }

        // Simpan suara Calon BEM
        if ($request->has('id_calon_bem')) {
            Suara::create([
                'nim_pemilih' => $request->nim,
                'id_calon' => $request->id_calon_bem,
                'waktu_pilih' => now()
            ]);
        }
        
        // Update status pemilih menjadi sudah memilih
        $pemilih->update(['sudah_memilih' => true]);
        
        return redirect()->route('home')->with('success', 'Terima kasih telah menggunakan hak suara Anda!');
    }
}
