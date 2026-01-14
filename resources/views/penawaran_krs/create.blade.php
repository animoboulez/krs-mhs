<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tambah Penawaran KRS</title>
</head>
<body>
    <h2>Tambah Penawaran KRS</h2>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('penawaran-krs.store') }}">
        @csrf

        <div>
            <label>Hari</label><br>
            <input type="text" name="hari" value="{{ old('hari') }}" placeholder="Senin" required>
        </div>

        <div>
            <label>Jam</label><br>
            <input type="text" name="jam" value="{{ old('jam') }}" placeholder="08.00" required>
        </div>

        <div>
            <label>Ruang Kelas</label><br>
            <input type="text" name="ruang_kelas" value="{{ old('ruang_kelas') }}" placeholder="Lab 1" required>
        </div>

        <div>
            <label>Kode Mata Kuliah</label><br>
            <input type="text" name="kode_mk" value="{{ old('kode_mk') }}" placeholder="IF000" required>
        </div>

        <div>
            <label>Mata Kuliah</label><br>
            <input type="text" name="nama_mk" value="{{ old('nama_mk') }}" placeholder="Mata Kuliah" required>
        </div>

        <div>
            <label>Nama Dosen</label><br>
            <input type="text" name="nama_dosen" value="{{ old('nama_dosen') }}" placeholder="Nama Dosen">
        </div>

        <div>
            <label>SKS</label><br>
            <input type="number" name="sks" value="{{ old('sks') }}" min="1" max="10" required>
        </div>

        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('penawaran-krs.index') }}">Batal</a>
    </form>
</body>
</html>