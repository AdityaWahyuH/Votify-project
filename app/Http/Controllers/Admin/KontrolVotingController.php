<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontrolVoting;
use Illuminate\Http\Request;

class KontrolVotingController extends Controller
{
    public function buka()
    {
        $kontrol = KontrolVoting::first();
        $kontrol->update(['status_voting' => true]);
        
        return back()->with('success', 'Voting telah dibuka');
    }

    public function tutup()
    {
        $kontrol = KontrolVoting::first();
        $kontrol->update(['status_voting' => false]);
        
        return back()->with('success', 'Voting telah ditutup');
    }
}
