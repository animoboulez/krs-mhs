<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hasil KRS</title>
</head>
<body>
    <h1>Hasil KRS (Mahasiswa)</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <p><b>NPM:</b> {{ $mahasiswa?->npm }}</p>
    <p><b>Nama:</b> {{ $mahasiswa?->nama }}</p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Ruang</th>
                <th>Kode MK</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Tahun Ajaran</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $i => $row)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $row->hari }}</td>
                <td>{{ $row->jam }}</td>
                <td>{{ $row->ruang_kelas }}</td>
                <td>{{ $row->kode_mk }}</td>
                <td>{{ $row->nama_mk }}</td>
                <td>{{ $row->sks }}</td>
                <td>{{ $row->tahun_ajaran }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8">Belum ada KRS yang dipilih.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <p><a href="{{ route('krs.pilih') }}">Kembali Pilih KRS</a></p>
</body>
</html>