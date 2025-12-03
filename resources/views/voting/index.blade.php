<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pemilih - VOTIFY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }
        .login-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            overflow: hidden;
        }
        .card-header {
            background: #0f172a;
            color: white;
            padding: 30px;
            border: none;
            text-align: center;
        }
        .form-control {
            padding: 12px 15px;
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            background-color: #f8fafc;
        }
        .form-control:focus {
            border-color: #0f172a;
            box-shadow: none;
        }
        .btn-verify {
            background-color: #0f172a;
            color: white;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-verify:hover {
            background-color: #1e293b;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card login-card">
                    <div class="card-header">
                        <h3 class="mb-1 fw-bold">VOTIFY</h3>
                        <p class="mb-0 opacity-75 small">Sistem E-Voting Pemira</p>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="text-center mb-4 fw-bold text-dark">Verifikasi DPT</h5>
                        
                        @if(session('error'))
                            <div class="alert alert-danger py-2 small">
                                <i class="bi bi-exclamation-circle me-1"></i> {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('voting.verify') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label small text-muted fw-bold">NOMOR INDUK MAHASISWA</label>
                                <div class="input-group">
                                    <span class="input-group-text border-0 bg-white text-muted"><i class="bi bi-card-heading"></i></span>
                                    <input type="text" class="form-control border-start-0 ps-0" name="nim" placeholder="Contoh: 1204230001" required autofocus>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small text-muted fw-bold">NAMA LENGKAP</label>
                                <div class="input-group">
                                    <span class="input-group-text border-0 bg-white text-muted"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control border-start-0 ps-0" name="nama" placeholder="Sesuai KTM" required>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-verify">
                                    MASUK BILIK SUARA
                                </button>
                            </div>
                            <div class="text-center mt-3">
                                <a href="/" class="text-decoration-none small text-muted">Kembali ke Beranda</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
