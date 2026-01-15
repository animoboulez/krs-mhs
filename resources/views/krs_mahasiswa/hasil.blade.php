<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KRS Mahasiswa</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f6f7fb; }
        .card { border: 0; border-radius: 16px; }
        .shadow-soft { box-shadow: 0 10px 25px rgba(16,24,40,.08); }
        .page-title { font-weight: 800; letter-spacing: .2px; }
        .table thead th { background: #0d6efd; color: #fff; }
        .table td, .table th { vertical-align: middle; }
        .badge-soft { background: rgba(13,110,253,.12); color: #0d6efd; }
        .btn { border-radius: 10px; }
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
                <li class="nav-item"><a class="nav-link" href="{{ url('/penawaran-krs') }}">Penawaran KRS</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/pilih-krs') }}">Pilih KRS</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ url('/hasil-krs') }}">Hasil KRS</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container py-4">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <div>
            <h3 class="page-title mb-0">KRS Mahasiswa</h3>
            <div class="text-muted">Berikut daftar mata kuliah yang sudah kamu ambil.</div>
        </div>

        <a href="{{ route('krs.pilih') }}" class="btn btn-outline-primary">
            Kembali Pilih KRS
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <div class="card shadow-soft">
                <div class="card-body">
                    <div class="fw-semibold mb-2">Data Mahasiswa</div>
                    <div class="d-flex flex-column gap-1">
                        <div><span class="text-muted">NPM:</span> <b>{{ $mahasiswa?->npm }}</b></div>
                        <div><span class="text-muted">Nama:</span> <b>{{ $mahasiswa?->nama }}</b></div>
                        <div><span class="text-muted">Tahun Akademik:</span> <span class="badge badge-soft">2026/2027</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-soft">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width:70px">No</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Ruang</th>
                            <th>Kode MK</th>
                            <th>Mata Kuliah</th>
                            <th style="width:80px" class="text-center">SKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $i => $row)
                        <tr>
                            <td class="fw-semibold">{{ $i+1 }}</td>
                            <td><span class="badge badge-soft">{{ $row->hari }}</span></td>
                            <td>{{ $row->jam }}</td>
                            <td>{{ $row->ruang_kelas }}</td>
                            <td class="fw-semibold">{{ $row->kode_mk }}</td>
                            <td>{{ $row->nama_mk }}</td>
                            <td class="text-center">{{ $row->sks }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Belum ada KRS yang dipilih.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
