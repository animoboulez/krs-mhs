<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::orderBy('npm')->get();
        return view('mahasiswa.index', compact('data'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'npm' => 'required|string|max:15|unique:mahasiswa,npm',
            'nama' => 'nullable|string|max:100',
            'prodi' => 'nullable|string|max:50',
            'angkatan' => 'nullable|integer',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit($npm)
    {
        $mhs = Mahasiswa::findOrFail($npm);
        return view('mahasiswa.edit', compact('mhs'));
    }

    public function update(Request $request, $npm)
    {
        $mhs = Mahasiswa::findOrFail($npm);

        $validated = $request->validate([
            'nama' => 'nullable|string|max:100',
            'prodi' => 'nullable|string|max:50',
            'angkatan' => 'nullable|integer',
        ]);

        $mhs->update($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diupdate.');
    }

    public function destroy($npm)
    {
        Mahasiswa::where('npm', $npm)->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
