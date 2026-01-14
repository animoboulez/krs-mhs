<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KRS</title>
</head>
<body>
    <h1>KRS Mahasiswa</h1>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<p>
    NPM: <b>{{ $mahasiswa->npm }}</b><br>
    Nama: <b>{{ $mahasiswa->nama }}</b>
</p>

<a href="{{ route('krs.mahasiswa.pilih', ['npm' => $mahasiswa->npm]) }}">Kembali pilih KRS</a>

<br><br>

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
        </tr>
    </thead>
    <tbody>
    @forelse($diambil as $i => $p)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $p->hari }}</td>
            <td>{{ $p->jam }}</td>
            <td>{{ $p->ruang }}</td>
            <td>{{ $p->kode_mk }}</td>
            <td>{{ $p->mata_kuliah }}</td>
            <td>{{ $p->sks }}</td>
        </tr>
    @empty
        <tr><td colspan="7">Belum ada KRS yang diambil.</td></tr>
    @endforelse
    </tbody>
</table>

</body>
</html>