<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\PenawaranKrs;
use Illuminate\Http\Request;

class KrsMahasiswaController extends Controller
{
    // tampilkan penawaran (checkbox)
    public function pilih(Request $request)
    {
        // sementara: hardcode npm dulu (nanti diganti dari login)
        $npm = $request->query('npm', '123'); // ganti default sesuai npm yang kamu punya

        $mahasiswa = Mahasiswa::findOrFail($npm);
        $penawaran = PenawaranKrs::orderBy('hari')->orderBy('jam')->get();

        // yg sudah dipilih sebelumnya
        $selectedIds = $mahasiswa->krsAmbil()->pluck('penawaran_krs.id')->toArray();

        return view('krs_mahasiswa.pilih', compact('mahasiswa','penawaran','selectedIds'));
    }

    // simpan pilihan checkbox
    public function simpan(Request $request)
    {
        $validated = $request->validate([
            'npm' => 'required|exists:mahasiswa,npm',
            'penawaran_ids' => 'array',
            'penawaran_ids.*' => 'integer|exists:penawaran_krs,id',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($validated['npm']);
        $ids = $validated['penawaran_ids'] ?? [];

        // replace pilihan (sync)
        $mahasiswa->krsAmbil()->sync($ids);

        return redirect()->route('krs.mahasiswa.hasil', ['npm' => $mahasiswa->npm])
            ->with('success', 'KRS berhasil disimpan.');
    }

    // tampil hasil KRS yg sudah diambil (tanpa dosen sesuai maumu)
    public function hasil(Request $request, $npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);

        $diambil = $mahasiswa->krsAmbil()
            ->orderBy('hari')
            ->orderBy('jam')
            ->get();

        return view('krs_mahasiswa.hasil', compact('mahasiswa','diambil'));
    }
}