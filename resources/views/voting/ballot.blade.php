<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilik Suara Digital - VOTIFY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root { --primary: #0f172a; --gold: #fbbf24; }
        body { background-color: #f1f5f9; font-family: 'Poppins', sans-serif; }
        
        /* Header */
        .voting-header { background: var(--primary); color: white; padding: 15px 0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        .user-badge { background: rgba(255,255,255,0.1); padding: 5px 15px; border-radius: 50px; font-size: 0.9rem; }

        /* Cards */
        .candidate-card {
            border: none; border-radius: 15px; overflow: hidden;
            background: white; transition: all 0.3s ease;
            position: relative; border: 2px solid transparent;
            height: 100%;
        }
        .candidate-img-wrapper {
            height: 250px; overflow: hidden; position: relative;
            background: #e2e8f0;
        }
        .candidate-img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
        .candidate-card:hover .candidate-img { transform: scale(1.05); }
        
        .card-body { padding: 1.5rem; position: relative; }
        .candidate-role {
            position: absolute; top: -15px; left: 50%; transform: translateX(-50%);
            background: var(--gold); color: #000; font-weight: 700;
            padding: 5px 20px; border-radius: 50px; font-size: 0.8rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        /* Radio Styling */
        .custom-radio { display: none; }
        .custom-radio:checked + .label-wrapper .candidate-card {
            border-color: var(--primary);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: translateY(-5px);
        }
        .custom-radio:checked + .label-wrapper .candidate-card::after {
            content: '\F26E'; font-family: 'bootstrap-icons';
            position: absolute; top: 10px; right: 10px;
            background: var(--primary); color: white;
            width: 30px; height: 30px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
        }
        
        .label-wrapper { cursor: pointer; display: block; height: 100%; }
        
        .btn-submit {
            background: var(--primary); border: none; padding: 15px 30px;
            border-radius: 10px; font-size: 1.1rem; letter-spacing: 0.5px;
            box-shadow: 0 10px 15px -3px rgba(15, 23, 42, 0.3);
        }
        .btn-submit:hover { background: #1e293b; transform: translateY(-2px); }
    </style>
</head>
<body>
    <header class="voting-header sticky-top">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <i class="bi bi-box-seam-fill text-warning fs-4 me-2"></i>
                <span class="fw-bold fs-5">BILIK SUARA</span>
            </div>
            <div class="user-badge">
                <i class="bi bi-person-circle me-2"></i>{{ $pemilih->nama }}
            </div>
        </div>
    </header>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark">Tentukan Pilihan Anda</h2>
            <p class="text-muted">Pilih salah satu kandidat terbaik (DPM atau BEM) untuk memimpin periode mendatang.</p>
        </div>

        <form action="{{ route('voting.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="nim" value="{{ $pemilih->nim }}">

            <div class="row g-4 justify-content-center">
                <!-- Gabungkan kedua array untuk ditampilkan -->
                @php $all_candidates = $calon_dpm->merge($calon_bem); @endphp

                @foreach($all_candidates as $calon)
                <div class="col-md-6 col-lg-4">
                    <input type="radio" name="id_calon" id="c_{{ $calon->id }}" value="{{ $calon->id }}" class="custom-radio" required>
                    
                    <label for="c_{{ $calon->id }}" class="label-wrapper">
                        <div class="candidate-card">
                            <div class="candidate-img-wrapper">
                                @if($calon->foto)
                                    <img src="{{ asset('storage/'.$calon->foto) }}" class="candidate-img" alt="{{ $calon->nama }}">
                                @else
                                    <div class="d-flex align-items-center justify-content-center h-100 bg-light text-secondary">
                                        <i class="bi bi-person-bounding-box display-4"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body text-center mt-3">
                                <span class="candidate-role">{{ $calon->posisi }}</span>
                                <h4 class="fw-bold mb-1">{{ $calon->nama }}</h4>
                                <div class="text-warning mb-3">
                                    <small><i class="bi bi-star-fill"></i> Kandidat Resmi</small>
                                </div>
                                <p class="text-muted small text-start border-top pt-3">
                                    <i class="bi bi-quote text-primary me-1"></i>
                                    {{ Str::limit($calon->visi, 90) }}
                                </p>
                            </div>
                        </div>
                    </label>
                </div>
                @endforeach
            </div>

            <div class="fixed-bottom bg-white border-top p-3 shadow-lg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8 d-none d-md-block">
                            <small class="text-muted"><i class="bi bi-info-circle me-1"></i> Pastikan pilihan Anda sudah benar sebelum menekan tombol kirim.</small>
                        </div>
                        <div class="col-md-4 text-end">
                            <button type="submit" class="btn btn-submit text-white w-100 fw-bold" onclick="return confirm('Apakah Anda yakin dengan pilihan ini? Suara tidak dapat diubah.')">
                                <i class="bi bi-send-check-fill me-2"></i> KIRIM SUARA
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
        <!-- Spacer agar konten tidak tertutup tombol fixed -->
        <div style="height: 100px;"></div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
