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
    
    // 1. NIM + Nama nggak ketemu
    if (!$pemilih) {
        return back()->with('error', 'NIM atau Nama tidak terdaftar');
    }

    // 2. BLOKIR ADMIN: is_admin = 1
    if ($pemilih->is_admin == 1) {
        return back()->with('error', 'Akun admin tidak diizinkan melakukan voting.');
    }
    
    // 3. Sudah pernah milih
    if ($pemilih->sudah_memilih) {
        return back()->with('error', 'Anda sudah melakukan voting');
    }
    
    // 4. Aman, kirim ke bilik suara
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
        
        // ========================================
        // BAGIAN INI YANG DIUBAH (POIN 3)
        // ========================================
        
        // Hapus session pemilih
        session()->forget(['pemilih_id', 'pemilih_nim', 'nama_pemilih', 'is_admin']);
        
        // Redirect ke halaman sukses (BUKAN ke home atau voting.index)
        return redirect()->route('voting.success');
    }

    public function history()
    {
        $pemilihId = session('pemilih_id');

        // Ambil 1 record terakhir (karena 1x voting). Kalau sistemmu multi-vote, ganti ->latest()->get()
        $suara = Suara::with(['calonDpm', 'calonBem'])
            ->where('pemilih_id', $pemilihId)
            ->latest()
            ->first();

        return view('voting.history', compact('suara'));
    }
}
