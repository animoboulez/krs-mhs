<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Penawaran KRS</title>
</head>
<body>
    <h2>Edit Penawaran KRS</h2>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('penawaran-krs.update', $item->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Hari</label><br>
            <input type="text" name="hari" value="{{ old('hari', $item->hari) }}" required>
        </div>

        <div>
            <label>Jam</label><br>
            <input type="text" name="jam" value="{{ old('jam', $item->jam) }}" required>
        </div>

        <div>
            <label>Ruang Kelas</label><br>
            <input type="text" name="ruang_kelas" value="{{ old('ruang_kelas', $item->ruang_kelas) }}" required>
        </div>

        <div>
            <label>Kode Mata Kuliah</label><br>
            <input type="text" name="kode_mk" value="{{ old('kode_mk', $item->kode_mk) }}" required>
        </div>

        <div>
            <label>Mata Kuliah</label><br>
            <input type="text" name="nama_mk" value="{{ old('nama_mk', $item->nama_mk) }}" required>
        </div>

        <div>
            <label>Nama Dosen</label><br>
            <input type="text" name="nama_dosen" value="{{ old('nama_dosen', $item->nama_dosen) }}">
        </div>

        <div>
            <label>SKS</label><br>
            <input type="number" name="sks" value="{{ old('sks', $item->sks) }}" min="1" max="10" required>
        </div>

        <br>
        <button type="submit">Update</button>
        <a href="{{ route('penawaran-krs.index') }}">Batal</a>
    </form>
</body>
</html>