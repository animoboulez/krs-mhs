<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tambah Mahasiswa</title>
</head>
<body>
<h2>Tambah Mahasiswa</h2>

@if ($errors->any())
  <ul style="color:red">
    @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
  </ul>
@endif

<form method="POST" action="{{ route('mahasiswa.store') }}">
  @csrf
  <div>NPM: <input name="npm" maxlength="15" required></div>
  <div>Nama: <input name="nama" maxlength="100"></div>
  <div>Prodi: <input name="prodi" maxlength="50"></div>
  <div>Angkatan: <input name="angkatan" type="number"></div>
  <button type="submit">Simpan</button>
</form>

<p>
    <a href="{{ route('mahasiswa.index') }}">Kembali</a>
</p>
</body>
</html>