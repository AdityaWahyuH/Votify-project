<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Ditutup - VOTIFY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">VOTIFY</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="card border-warning shadow-sm">
                    <div class="card-body py-5">
                        <div class="mb-4 text-warning">
                            <i class="bi bi-lock-fill" style="font-size: 4rem;"></i>
                        </div>
                        
                        <h2 class="card-title mb-3">Voting Sedang Ditutup</h2>
                        
                        <p class="card-text lead text-muted">
                            Mohon maaf, sesi pemilihan saat ini sedang tidak aktif.
                            <br>
                            Silakan hubungi panitia Pemira untuk informasi jadwal pembukaan voting.
                        </p>
                        
                        <hr class="my-4">
                        
                        <a href="/" class="btn btn-primary">
                            <i class="bi bi-house-door-fill"></i> Kembali ke Beranda
                        </a>
                        <a href="{{ route('calon.public') }}" class="btn btn-outline-primary ms-2">
                            Lihat Profil Calon
                        </a>
                    </div>
                    <div class="card-footer text-muted">
                        Panitia Pemira DPM & BEM
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
