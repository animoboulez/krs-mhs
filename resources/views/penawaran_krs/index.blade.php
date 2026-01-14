<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Penawaran KRS</title>
</head>
<body>
    <h2>Penawaran KRS (Admin)</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('penawaran-krs.create') }}">+ Tambah Penawaran</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top:10px; width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Ruang</th>
                <th>Kode MK</th>
                <th>Dosen</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($data as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->hari }}</td>
                <td>{{ $row->jam }}</td>
                <td>{{ $row->ruang_kelas }}</td>
                <td>{{ $row->kode_mk }}</td>
                <td>{{ $row->nama_dosen }}</td>
                <td>{{ $row->nama_mk }}</td>
                <td>{{ $row->sks }}</td>
                <td>
                    <a href="{{ route('penawaran-krs.edit', $row->id) }}">Edit</a>

                    <form action="{{ route('penawaran-krs.destroy', $row->id) }}"
                          method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus data ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align:center">Belum ada penawaran KRS</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</body>
</html>