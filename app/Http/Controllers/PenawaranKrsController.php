<?php

namespace App\Http\Controllers;

use App\Models\PenawaranKrs;
use Illuminate\Http\Request;

class PenawaranKrsController extends Controller
{
    public function index()
    {
        $data = PenawaranKrs::orderBy('id', 'desc')->get();
        return view('penawaran_krs.index', compact('data'));
    }

    public function create()
    {
        return view('penawaran_krs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hari' => 'required|string|max:20',
            'jam' => 'required|string|max:20',
            'ruang_kelas' => 'required|string|max:50',
            'kode_mk' => 'required|string|max:10',
            'nama_mk' => 'required|string|max:100',
            'nama_dosen' => 'nullable|string|max:100',
            'sks' => 'required|integer|min:1|max:10',
        ]);

        PenawaranKrs::create($validated);

        return redirect()->route('penawaran-krs.index')
            ->with('success', 'Penawaran KRS berhasil ditambahkan.');
    }

    public function edit(PenawaranKrs $penawaran_kr)
    {
        // Laravel otomatis binding: penawaran_kr = 1 record
        return view('penawaran_krs.edit', ['item' => $penawaran_kr]);
    }

    public function update(Request $request, PenawaranKrs $penawaran_kr)
    {
        $validated = $request->validate([
            'hari' => 'required|string|max:20',
            'jam' => 'required|string|max:20',
            'ruang_kelas' => 'required|string|max:50',
            'kode_mk' => 'required|string|max:10',
            'nama_mk' => 'required|string|max:100',
            'nama_dosen' => 'nullable|string|max:100',
            'sks' => 'required|integer|min:1|max:10',
        ]);

        $penawaran_kr->update($validated);

        return redirect()->route('penawaran-krs.index')
            ->with('success', 'Penawaran KRS berhasil diupdate.');
    }

    public function destroy(PenawaranKrs $penawaran_kr)
    {
        $penawaran_kr->delete();

        return redirect()->route('penawaran-krs.index')
            ->with('success', 'Penawaran KRS berhasil dihapus.');
    }
}
