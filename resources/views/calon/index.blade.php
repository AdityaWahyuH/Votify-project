<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Calon - VOTIFY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">VOTIFY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('calon.public') }}">Profil Calon</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-warning text-dark ms-2" href="{{ route('voting.index') }}">Voting Sekarang</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <h2 class="text-center mb-4">Daftar Kandidat</h2>

        <!-- Bagian Calon DPM -->
        <div class="mb-5">
            <h3 class="border-bottom pb-2 mb-3 text-primary">Calon DPM</h3>
            <div class="row">
                @forelse($calon_dpm as $calon)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if($calon->foto)
                                    <img src="{{ asset('storage/'.$calon->foto) }}" class="img-fluid rounded-start h-100 object-fit-cover" alt="{{ $calon->nama }}" style="min-height: 200px;">
                                @else
                                    <img src="https://via.placeholder.com/300x400?text=No+Photo" class="img-fluid rounded-start h-100" alt="No Photo">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $calon->nama }}</h5>
                                    <span class="badge bg-info text-dark mb-2">DPM</span>
                                    
                                    <p class="card-text mt-2"><strong>Visi:</strong><br> {{ Str::limit($calon->visi, 100) }}</p>
                                    
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalCalon{{ $calon->id }}">
                                        Lihat Detail Lengkap
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Detail DPM -->
                <div class="modal fade" id="modalCalon{{ $calon->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $calon->nama }} (DPM)</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        @if($calon->foto)
                                            <img src="{{ asset('storage/'.$calon->foto) }}" class="img-fluid rounded" alt="{{ $calon->nama }}">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <h6>Visi</h6>
                                        <p>{{ $calon->visi }}</p>
                                        <h6>Misi</h6>
                                        <p style="white-space: pre-line">{{ $calon->misi }}</p>
                                        <h6>Program Kerja</h6>
                                        <p style="white-space: pre-line">{{ $calon->program_kerja }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-secondary text-center">Belum ada data calon DPM.</div>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Bagian Calon BEM -->
        <div>
            <h3 class="border-bottom pb-2 mb-3 text-success">Calon BEM</h3>
            <div class="row">
                @forelse($calon_bem as $calon)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if($calon->foto)
                                    <img src="{{ asset('storage/'.$calon->foto) }}" class="img-fluid rounded-start h-100 object-fit-cover" alt="{{ $calon->nama }}" style="min-height: 200px;">
                                @else
                                    <img src="https://via.placeholder.com/300x400?text=No+Photo" class="img-fluid rounded-start h-100" alt="No Photo">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $calon->nama }}</h5>
                                    <span class="badge bg-success mb-2">BEM</span>
                                    
                                    <p class="card-text mt-2"><strong>Visi:</strong><br> {{ Str::limit($calon->visi, 100) }}</p>
                                    
                                    <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalCalon{{ $calon->id }}">
                                        Lihat Detail Lengkap
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Detail BEM -->
                <div class="modal fade" id="modalCalon{{ $calon->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $calon->nama }} (BEM)</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        @if($calon->foto)
                                            <img src="{{ asset('storage/'.$calon->foto) }}" class="img-fluid rounded" alt="{{ $calon->nama }}">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <h6>Visi</h6>
                                        <p>{{ $calon->visi }}</p>
                                        <h6>Misi</h6>
                                        <p style="white-space: pre-line">{{ $calon->misi }}</p>
                                        <h6>Program Kerja</h6>
                                        <p style="white-space: pre-line">{{ $calon->program_kerja }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-secondary text-center">Belum ada data calon BEM.</div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2025 VOTIFY - Telkom University Surabaya</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
