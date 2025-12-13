<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTIFY - Pemira Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #0f172a; /* Navy Blue Gelap */
            --accent-color: #eab308;  /* Gold/Kuning */
            --text-muted: #64748b;
        }
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
        h1, h2, h3, h4, h5, .navbar-brand { font-family: 'Poppins', sans-serif; }
        
        /* Navbar */
        .navbar { background-color: var(--primary-color) !important; padding: 0.8rem 0; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
        .navbar-brand { font-weight: 700; letter-spacing: 1px; color: white !important; font-size: 1.3rem; }
        .nav-link { color: rgba(255,255,255,0.8) !important; font-weight: 500; transition: 0.3s; }
        .nav-link:hover, .nav-link.active { color: var(--accent-color) !important; }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: white;
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden;
        }
        .hero-section::after {
            content: ''; position: absolute; bottom: 0; right: 0; width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(234,179,8,0.1) 0%, rgba(0,0,0,0) 70%); border-radius: 50%;
        }
        .btn-vote {
            background-color: var(--accent-color); color: #000; font-weight: 700; padding: 12px 35px;
            border-radius: 50px; border: none; box-shadow: 0 4px 14px 0 rgba(234, 179, 8, 0.39); transition: transform 0.2s;
        }
        .btn-vote:hover { transform: translateY(-2px); background-color: #facc15; color: #000; }

        /* Cards */
        .feature-card {
            background: white; border-radius: 15px; padding: 30px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: 0.3s; border: 1px solid #e2e8f0; height: 100%;
        }
        .feature-card:hover { transform: translateY(-5px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); border-color: var(--accent-color); }
        .icon-box {
            width: 60px; height: 60px; background: #eff6ff; color: var(--primary-color);
            display: flex; align-items: center; justify-content: center; border-radius: 12px; font-size: 1.5rem; margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('images/Logo-Votify.jpg') }}" alt="Logo" width="45" height="45" class="rounded-circle border border-2 border-white me-2">
                <span>VOTIFY</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link active" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('calon.public') }}">Kandidat</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">FAQ</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-vote btn-sm px-4" href="{{ route('voting.index') }}">VOTE SEKARANG</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center text-lg-start">
        <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill">PEMIRA 2025</span>
                    <h1 class="display-4 fw-bold mb-3 lh-sm">Suara Anda,<br>Masa Depan Kampus.</h1>
                    <p class="lead text-white-50 mb-4">
                        Wujudkan demokrasi kampus yang transparan dan jujur. 
                        Gunakan hak pilih Anda untuk menentukan pemimpin DPM dan BEM periode selanjutnya.
                    </p>
                    <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
                        <a href="{{ route('voting.index') }}" class="btn btn-vote">
                            <i class="bi bi-check2-circle me-2"></i>Mulai Memilih
                        </a>
                        <a href="{{ route('calon.public') }}" class="btn btn-outline-light rounded-pill px-4 py-2 fw-bold">
                            Lihat Kandidat
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0 text-center">
                    <!-- Menggunakan Logo Besar di Hero Section juga bagus -->
                    <img src="{{ asset('images/Logo-Votify.jpg') }}" alt="Voting Illustration" class="img-fluid rounded-circle shadow-lg border border-4 border-warning" style="max-width: 350px;">
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon-box"><i class="bi bi-shield-check"></i></div>
                        <h4>Jujur & Adil</h4>
                        <p class="text-muted">Sistem e-voting yang transparan, meminimalisir kecurangan, dan menjamin kerahasiaan suara.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon-box"><i class="bi bi-lightning-charge"></i></div>
                        <h4>Real Time</h4>
                        <p class="text-muted">Perhitungan suara dilakukan secara otomatis dan real-time untuk hasil yang akurat.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="icon-box"><i class="bi bi-people"></i></div>
                        <h4>Demokratis</h4>
                        <p class="text-muted">Menjunjung tinggi asas demokrasi dari mahasiswa, oleh mahasiswa, dan untuk mahasiswa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4 text-center border-top border-secondary">
        <div class="container">
            <p class="mb-0 opacity-75">&copy; 2025 Komisi Pemilihan Umum Mahasiswa - Telkom University Surabaya</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
