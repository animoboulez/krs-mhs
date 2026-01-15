<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KRS Admin</title>

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
        <a class="navbar-brand fw-bold" href="/">SIAK KRS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/penawaran-krs') }}">KRS Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/pilih-krs') }}">Pilih KRS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/hasil-krs') }}">Hasil KRS</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container py-4">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <div>
            <h3 class="page-title mb-0">KRS Admin</h3>
            <div class="text-muted">Kelola penawaran mata kuliah yang akan dipilih mahasiswa.</div>
        </div>
        <a href="{{ route('penawaran-krs.create') }}" class="btn btn-primary">
            Tambah Matakuliah
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

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
                            <th>Dosen</th>
                            <th>Mata Kuliah</th>
                            <th style="width:80px" class="text-center">SKS</th>
                            <th style="width:160px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($data as $row)
                        <tr>
                            <td class="fw-semibold">{{ $loop->iteration }}</td>
                            <td><span class="badge badge-soft">{{ $row->hari }}</span></td>
                            <td>{{ $row->jam }}</td>
                            <td>{{ $row->ruang_kelas }}</td>
                            <td class="fw-semibold">{{ $row->kode_mk }}</td>
                            <td>{{ $row->nama_dosen }}</td>
                            <td>{{ $row->nama_mk }}</td>
                            <td class="text-center">{{ $row->sks }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('penawaran-krs.edit', $row->id) }}" class="btn btn-sm btn-outline-primary">
                                        Edit
                                    </a>

                                    <form action="{{ route('penawaran-krs.destroy', $row->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                Belum ada data. Klik <b>Tambah Matakuliah</b> untuk menambahkan.
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
