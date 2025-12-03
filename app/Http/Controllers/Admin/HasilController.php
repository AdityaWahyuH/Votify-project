<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calon;
use App\Models\Suara;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        $hasil = Calon::withCount('suara')->get();
        $total_suara = Suara::count();
        
        return view('admin.hasil', compact('hasil', 'total_suara'));
    }
}
