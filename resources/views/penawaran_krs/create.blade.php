<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Matakuliah</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f6f7fb; }
        .card { border: 0; border-radius: 16px; }
        .shadow-soft { box-shadow: 0 10px 25px rgba(16,24,40,.08); }
        .page-title { font-weight: 800; letter-spacing: .2px; }
        .btn { border-radius: 10px; }
        .form-control, .form-select { border-radius: 10px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">SIAKAD KRS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="{{ url('/penawaran-krs') }}">Penawaran KRS</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/pilih-krs') }}">Pilih KRS</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/hasil-krs') }}">Hasil KRS</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container py-4">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <div>
            <h3 class="page-title mb-0">Tambah Matakuliah</h3>
            <div class="text-muted">Isi data penawaran agar bisa dipilih oleh mahasiswa.</div>
        </div>
        <a href="{{ route('penawaran-krs.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger shadow-sm">
            <div class="fw-semibold mb-1">Ada error:</div>
            <ul class="mb-0">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-soft">
        <div class="card-body">
            <form method="POST" action="{{ route('penawaran-krs.store') }}" class="row g-3">
                @csrf

                <div class="col-md-3">
                    <label class="form-label">Hari</label>
                    <select name="hari" class="form-select" required>
                        <option value="" disabled {{ old('hari') ? '' : 'selected' }}>-- pilih --</option>
                        @php $hariList = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']; @endphp
                        @foreach($hariList as $h)
                            <option value="{{ $h }}" {{ old('hari')==$h ? 'selected' : '' }}>{{ $h }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Jam</label>
                    <input type="text" name="jam" value="{{ old('jam') }}" class="form-control" placeholder="08.00" required>
                    <div class="form-text">Format contoh: 08.00</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Ruang Kelas</label>
                    <input type="text" name="ruang_kelas" value="{{ old('ruang_kelas') }}" class="form-control" placeholder="Lab 1" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Kode Mata Kuliah</label>
                    <input type="text" name="kode_mk" value="{{ old('kode_mk') }}" class="form-control" placeholder="IF000" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Mata Kuliah</label>
                    <input type="text" name="nama_mk" value="{{ old('nama_mk') }}" class="form-control" placeholder="Mata Kuliah" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">SKS</label>
                    <input type="number" name="sks" value="{{ old('sks') }}" class="form-control" min="1" max="10" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Dosen</label>
                    <input type="text" name="nama_dosen" value="{{ old('nama_dosen') }}" class="form-control" placeholder="Nama Dosen">
                    <div class="form-text">Opsional</div>
                </div>

                <div class="col-12 d-flex gap-2 mt-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('penawaran-krs.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>