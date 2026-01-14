<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pilih KRS</title>
</head>
<body>
    <h1>Pilih KRS (Mahasiswa)</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <p><b>NPM:</b> {{ $mahasiswa?->npm }}</p>
    <p><b>Nama:</b> {{ $mahasiswa?->nama }}</p>

    <form method="POST" action="{{ route('krs.simpan') }}">
        @csrf

        <input type="hidden" name="npm" value="{{ $mahasiswa?->npm }}">

        <label>Tahun Ajaran (opsional):</label>
        <input type="text" name="tahun_ajaran" placeholder="2025/2026" value="{{ old('tahun_ajaran') }}">
        <br><br>

        @error('penawaran') <p style="color:red">{{ $message }}</p> @enderror

        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Pilih</th>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Ruang</th>
                    <th>Kode MK</th>
                    <th>Dosen</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($penawaran as $i => $p)
                <tr>
                    <td>
                        <input type="checkbox" name="penawaran[]" value="{{ $p->id }}">
                    </td>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $p->hari }}</td>
                    <td>{{ $p->jam }}</td>
                    <td>{{ $p->ruang_kelas }}</td>
                    <td>{{ $p->kode_mk }}</td>
                    <td>{{ $p->nama_dosen }}</td>
                    <td>{{ $p->nama_mk }}</td>
                    <td>{{ $p->sks }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <button type="submit">Simpan KRS</button>
    </form>

    <p><a href="{{ route('krs.hasil') }}">Lihat KRS Saya</a></p>
</body>
</html>