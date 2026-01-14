<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mahasiswa</title>
</head>
<body>
    <h1>Pengambilan KRS (Mahasiswa)</h1>

   <p>
    NPM: <b>{{ $mahasiswa->npm }}</b><br>
    Nama: <b>{{ $mahasiswa->nama }}</b>
</p>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('krs.mahasiswa.simpan') }}">
    @csrf
    <input type="hidden" name="npm" value="{{ $mahasiswa->npm }}">

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
                    <input type="checkbox" name="penawaran_ids[]"
                        value="{{ $p->id }}"
                        {{ in_array($p->id, $selectedIds) ? 'checked' : '' }}>
                </td>
                <td>{{ $i+1 }}</td>
                <td>{{ $p->hari }}</td>
                <td>{{ $p->jam }}</td>
                <td>{{ $p->ruang }}</td>
                <td>{{ $p->kode_mk }}</td>
                <td>{{ $p->dosen }}</td>
                <td>{{ $p->mata_kuliah }}</td>
                <td>{{ $p->sks }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <br>
    <button type="submit">Simpan KRS</button>
</form>
</body>
</html>