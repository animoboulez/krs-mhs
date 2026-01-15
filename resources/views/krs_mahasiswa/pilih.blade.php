<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilih KRS</title>

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
                <li class="nav-item"><a class="nav-link active" href="{{ url('/pilih-krs') }}">Pilih KRS</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/hasil-krs') }}">Hasil KRS</a></li>
            </ul>
        </div>
    </div>
</nav>

<main class="container py-4">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <div>
            <h3 class="page-title mb-0">Pilih KRS</h3>
            <div class="text-muted">Centang mata kuliah yang ingin kamu ambil, lalu klik <b>Simpan KRS</b>.</div>
        </div>

        <a href="{{ route('krs.hasil') }}" class="btn btn-outline-primary">
            Lihat KRS Saya
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
            <form method="POST" action="{{ route('krs.simpan') }}">
                @csrf

                <input type="hidden" name="npm" value="{{ $mahasiswa?->npm }}">

                @error('penawaran')
                    <div class="alert alert-danger shadow-sm">{{ $message }}</div>
                @enderror

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th style="width:80px" class="text-center">Pilih</th>
                                <th style="width:70px">No</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Ruang</th>
                                <th>Kode MK</th>
                                <th>Dosen</th>
                                <th>Mata Kuliah</th>
                                <th style="width:80px" class="text-center">SKS</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($penawaran as $i => $p)
                            <tr>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" name="penawaran[]" value="{{ $p->id }}">
                                </td>
                                <td class="fw-semibold">{{ $i+1 }}</td>
                                <td><span class="badge badge-soft">{{ $p->hari }}</span></td>
                                <td>{{ $p->jam }}</td>
                                <td>{{ $p->ruang_kelas }}</td>
                                <td class="fw-semibold">{{ $p->kode_mk }}</td>
                                <td>{{ $p->nama_dosen }}</td>
                                <td>{{ $p->nama_mk }}</td>
                                <td class="text-center">{{ $p->sks }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">
                                    Belum ada penawaran KRS dari admin.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex gap-2 mt-3">
                    <button type="submit" class="btn btn-primary">Simpan KRS</button>
                    <a href="{{ url('/penawaran-krs') }}" class="btn btn-outline-secondary">Lihat Penawaran (Admin)</a>
                </div>
            </form>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
