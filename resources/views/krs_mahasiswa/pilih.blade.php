<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilih KRS</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f6f7fb; }
        .card { border: 0; border-radius: 16px; }
        .shadow-soft { box-shadow: 0 10px 25px rgba(16,24,40,.08); }
        .page-title { font-weight: 800; }
        .table thead th { background: #0d6efd; color: #fff; }
        .badge-soft { background: rgba(13,110,253,.12); color: #0d6efd; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">SIAK KRS</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link active" href="{{ url('/pilih-krs') }}">Pilih KRS</a>
            <a class="nav-link" href="{{ url('/hasil-krs') }}">Hasil KRS</a>
        </div>
    </div>
</nav>

<main class="container py-4">

    <div class="mb-3">
        <h3 class="page-title">Pilih KRS (Mahasiswa)</h3>
        <div class="text-muted">Silakan pilih mata kuliah yang ingin diambil.</div>
    </div>

    <!-- Info Mahasiswa -->
    <div class="card shadow-soft mb-4">
        <div class="card-body row">
            <div class="col-md-4"><b>NPM</b> : {{ $mahasiswa->npm }}</div>
            <div class="col-md-4"><b>Nama</b> : {{ $mahasiswa->nama }}</div>
            <div class="col-md-4"><b>Tahun Akademik</b> : 2026/2027</div>
        </div>
    </div>

    <form action="{{ route('krs.store') }}" method="POST">
        @csrf

        <div class="card shadow-soft">
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width:70px">Pilih</th>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Ruang</th>
                            <th>Kode MK</th>
                            <th>Dosen</th>
                            <th>Mata Kuliah</th>
                            <th class="text-center">SKS</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($penawaran as $row)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox"
                                       name="penawaran_id[]"
                                       value="{{ $row->id }}"
                                       class="form-check-input">
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge badge-soft">{{ $row->hari }}</span></td>
                            <td>{{ $row->jam }}</td>
                            <td>{{ $row->ruang_kelas }}</td>
                            <td class="fw-semibold">{{ $row->kode_mk }}</td>
                            <td>{{ $row->nama_dosen }}</td>
                            <td>{{ $row->nama_mk }}</td>
                            <td class="text-center">{{ $row->sks }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary px-4">
                    Simpan KRS
                </button>
            </div>
        </div>
    </form>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
