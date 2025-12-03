<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CalonController extends Controller
{
    public function index()
    {
        $calon = Calon::all();
        return view('admin.calon.index', compact('calon'));
    }

    public function create()
    {
        return view('admin.calon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'posisi' => 'required|in:DPM,BEM',
            'visi' => 'required',
            'misi' => 'required',
            'program_kerja' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->only(['nama', 'posisi', 'visi', 'misi', 'program_kerja']);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('calon', 'public');
            $data['foto'] = $path;
        }

        Calon::create($data);

        return redirect()->route('calon.index')->with('success', 'Calon berhasil ditambahkan');
    }

    public function edit($id)
    {
        $calon = Calon::findOrFail($id);
        return view('admin.calon.edit', compact('calon'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'posisi' => 'required|in:DPM,BEM',
            'visi' => 'required',
            'misi' => 'required',
            'program_kerja' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $calon = Calon::findOrFail($id);
        $data = $request->only(['nama', 'posisi', 'visi', 'misi', 'program_kerja']);

        if ($request->hasFile('foto')) {
            if ($calon->foto && Storage::disk('public')->exists($calon->foto)) {
                Storage::disk('public')->delete($calon->foto);
            }
            
            $path = $request->file('foto')->store('calon', 'public');
            $data['foto'] = $path;
        }

        $calon->update($data);

        return redirect()->route('calon.index')->with('success', 'Calon berhasil diupdate');
    }

    public function destroy($id)
    {
        $calon = Calon::findOrFail($id);
        
        if ($calon->foto && Storage::disk('public')->exists($calon->foto)) {
            Storage::disk('public')->delete($calon->foto);
        }
        
        $calon->delete();

        return redirect()->route('calon.index')->with('success', 'Calon berhasil dihapus');
    }
}
