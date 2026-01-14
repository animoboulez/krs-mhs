<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenawaranKrs;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;

class KrsMahasiswaController extends Controller
{
    // tampilkan daftar penawaran krs (checkbox)
    public function pilih()
    {
        $penawaran = PenawaranKrs::orderBy('id', 'desc')->get();

        // sementara kita pakai mahasiswa pertama dulu (nanti diganti auth login)
        $mahasiswa = Mahasiswa::first();

        return view('krs_mahasiswa.pilih', compact('penawaran', 'mahasiswa'));
    }

    // simpan pilihan ke tabel pivot krs_mahasiswa
    public function simpan(Request $request)
    {
        $request->validate([
            'npm' => 'required|string|max:15|exists:mahasiswa,npm',
            'penawaran' => 'required|array',
            'penawaran.*' => 'integer|exists:penawaran_krs,id',
            'tahun_ajaran' => 'nullable|string|max:9',
        ]);

        $npm = $request->npm;
        $tahunAjaran = $request->tahun_ajaran;

        // hapus dulu data lama (supaya hasilnya sesuai pilihan terbaru)
        DB::table('krs_mahasiswa')->where('npm', $npm)->delete();

        // insert ulang pilihan
        foreach ($request->penawaran as $penawaranId) {
            DB::table('krs_mahasiswa')->insert([
                'npm' => $npm,
                'penawaran_krs_id' => $penawaranId,
                'tahun_ajaran' => $tahunAjaran,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('krs.hasil')->with('success', 'KRS berhasil disimpan.');
    }

    // tampilkan hasil krs mahasiswa (tanpa kolom dosen)
    public function hasil()
    {
        $mahasiswa = Mahasiswa::first();

        $data = DB::table('krs_mahasiswa as km')
            ->join('penawaran_krs as pk', 'pk.id', '=', 'km.penawaran_krs_id')
            ->select(
                'pk.hari',
                'pk.jam',
                'pk.ruang',
                'pk.kode_mk',
                'pk.matakuliah',
                'pk.sks',
                'km.tahun_ajaran'
            )
            ->where('km.npm', $mahasiswa->npm)
            ->orderBy('pk.hari')
            ->orderBy('pk.jam')
            ->get();

        return view('krs_mahasiswa.hasil', compact('mahasiswa', 'data'));
    }
}