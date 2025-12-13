<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Calon - VOTIFY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8fafc; font-family: 'Poppins', sans-serif; }
        .navbar { background-color: #0f172a !important; }
        .section-title { border-left: 5px solid #eab308; padding-left: 15px; margin-bottom: 30px; color: #0f172a; font-weight: 700; }
        .card-calon { border: none; border-radius: 15px; overflow: hidden; transition: 0.3s; height: 100%; background: white; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        .card-calon:hover { transform: translateY(-5px); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); }
        .badge-posisi { position: absolute; top: 15px; right: 15px; padding: 8px 15px; border-radius: 30px; font-weight: 600; z-index: 10; }
        .img-wrapper { height: 250px; overflow: hidden; position: relative; background: #e2e8f0; }
        .img-calon { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
        .card-calon:hover .img-calon { transform: scale(1.05); }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-5 sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('images/Logo-Votify.jpg') }}" alt="Logo" width="40" class="rounded-circle border border-white me-2">
                <span class="fw-bold">VOTIFY</span>
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="/">Beranda</a>
                <a class="nav-link active" href="#">Kandidat</a>
                <a class="btn btn-warning text-dark fw-bold ms-3 px-4 rounded-pill" href="{{ route('voting.index') }}">Vote Sekarang</a>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Daftar Kandidat Pemira 2025</h2>
            <p class="text-muted">Kenali visi dan misi calon pemimpinmu sebelum menentukan pilihan.</p>
        </div>

        <!-- Section DPM -->
        <h3 class="section-title">Calon DPM (Dewan Perwakilan Mahasiswa)</h3>
        <div class="row g-4 mb-5">
            @forelse($calon_dpm as $calon)
            <div class="col-md-6 col-lg-4">
                <div class="card card-calon">
                    <span class="badge bg-warning text-dark badge-posisi">No. Urut {{ $loop->iteration }}</span>
                    <div class="img-wrapper">
                        @if($calon->foto)
                            <img src="{{ asset('storage/'.$calon->foto) }}" class="img-calon" alt="{{ $calon->nama }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center h-100 text-secondary">
                                <i class="bi bi-person-bounding-box display-1"></i>
                            </div>
                        @endif
                    </div>
                    <div class="card-body p-4">
                        <h4 class="card-title fw-bold mb-3">{{ $calon->nama }}</h4>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold text-primary mb-1"><i class="bi bi-lightbulb me-2"></i>Visi</h6>
                            <p class="text-muted small">{{ $calon->visi }}</p>
                        </div>

                        <div>
                            <h6 class="fw-bold text-primary mb-1"><i class="bi bi-list-check me-2"></i>Misi Utama</h6>
                            <p class="text-muted small mb-0" style="white-space: pre-line;">{{ Str::limit($calon->misi, 150) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-secondary text-center py-4">
                    Belum ada data calon DPM.
                </div>
            </div>
            @endforelse
        </div>

        <!-- Section BEM -->
        <h3 class="section-title mt-5">Calon BEM (Badan Eksekutif Mahasiswa)</h3>
        <div class="row g-4 mb-5">
            @forelse($calon_bem as $calon)
            <div class="col-md-6 col-lg-4">
                <div class="card card-calon">
                    <span class="badge bg-primary badge-posisi">No. Urut {{ $loop->iteration }}</span>
                    <div class="img-wrapper">
                        @if($calon->foto)
                            <img src="{{ asset('storage/'.$calon->foto) }}" class="img-calon" alt="{{ $calon->nama }}">
                        @else
                            <div class="d-flex align-items-center justify-content-center h-100 text-secondary">
                                <i class="bi bi-person-bounding-box display-1"></i>
                            </div>
                        @endif
                    </div>
                    <div class="card-body p-4">
                        <h4 class="card-title fw-bold mb-3">{{ $calon->nama }}</h4>
                        
                        <div class="mb-3">
                            <h6 class="fw-bold text-primary mb-1"><i class="bi bi-lightbulb me-2"></i>Visi</h6>
                            <p class="text-muted small">{{ $calon->visi }}</p>
                        </div>

                        <div>
                            <h6 class="fw-bold text-primary mb-1"><i class="bi bi-list-check me-2"></i>Misi Utama</h6>
                            <p class="text-muted small mb-0" style="white-space: pre-line;">{{ Str::limit($calon->misi, 150) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-secondary text-center py-4">
                    Belum ada data calon BEM.
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
