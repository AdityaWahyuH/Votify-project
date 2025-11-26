<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTIFY - E-Voting Pemira DPM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">VOTIFY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('calon.public') }}">Profil Calon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning text-dark" href="{{ route('voting.index') }}">Voting Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Hero Section -->
        <div class="jumbotron bg-light p-5 rounded">
            <h1 class="display-4">Selamat Datang di VOTIFY</h1>
            <p class="lead">Platform E-Voting Pemira DPM untuk Mendukung Transparansi dan Partisipasi Demokrasi di Lingkungan Kampus</p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg" href="{{ route('voting.index') }}" role="button">Mulai Voting</a>
        </div>

        <!-- Timeline Pemira -->
        <div class="mt-5">
            <h2 class="mb-4">Timeline Pemira</h2>
            <div class="row">
                @forelse($jadwal as $item)
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->tahap }}</h5>
                            <p class="card-text">
                                <strong>Mulai:</strong> {{ date('d F Y', strtotime($item->tanggal_mulai)) }}<br>
                                <strong>Selesai:</strong> {{ date('d F Y', strtotime($item->tanggal_akhir)) }}
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-muted">Belum ada jadwal tersedia.</p>
                @endforelse
            </div>
        </div>

        <!-- Preview Calon -->
        <div class="mt-5 mb-5">
            <h2 class="mb-4">Calon DPM & BEM</h2>
            <div class="row">
                @forelse($calon as $c)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        @if($c->foto)
                        <img src="{{ asset('storage/'.$c->foto) }}" class="card-img-top" alt="{{ $c->nama }}">
                        @else
                        <img src="https://via.placeholder.com/300x200?text=No+Photo" class="card-img-top" alt="No Photo">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $c->nama }}</h5>
                            <p class="card-text"><span class="badge bg-primary">{{ $c->posisi }}</span></p>
                            <a href="{{ route('calon.public') }}" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-muted">Belum ada calon tersedia.</p>
                @endforelse
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('calon.public') }}" class="btn btn-primary">Lihat Semua Calon</a>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2025 VOTIFY - Telkom University Surabaya</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>