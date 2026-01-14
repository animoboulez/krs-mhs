<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top:10px">
        <thead>
            <tr>
                <th>NIM</th><th>Nama</th><th>Prodi</th><th>Angkatan</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->npm }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->prodi }}</td>
                <td>{{ $row->angkatan }}</td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $row->npm) }}">Edit</a>

                    <form action="{{ route('mahasiswa.destroy', $row->npm) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>