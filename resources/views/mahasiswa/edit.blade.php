<!doctype html>
<html>
<head><meta charset="utf-8"><title>Edit Mahasiswa</title></head>
<body>
<h2>Edit Mahasiswa ({{ $mhs->npm }})</h2>

@if ($errors->any())
  <ul style="color:red">
    @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
  </ul>
@endif

<form method="POST" action="{{ route('mahasiswa.update', $mhs->npm) }}">
  @csrf
  @method('PUT')
  <div>Nama: <input name="nama" value="{{ $mhs->nama }}" maxlength="100"></div>
  <div>Prodi: <input name="prodi" value="{{ $mhs->prodi }}" maxlength="50"></div>
  <div>Angkatan: <input name="angkatan" type="number" value="{{ $mhs->angkatan }}"></div>
  <button type="submit">Update</button>
</form>

<p><a href="{{ route('mahasiswa.index') }}">Kembali</a></p>
</body>
</html>
