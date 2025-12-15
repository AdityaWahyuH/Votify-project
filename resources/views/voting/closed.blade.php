<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Ditutup - VOTIFY</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root{
            --navy-950:#0b1220;
            --navy-900:#0f172a;
            --navy-800:#111c33;
            --gold:#fbbf24;
            --gold-2:#f59e0b;
            --text:#e5e7eb;
            --muted:#94a3b8;
            --border:rgba(148,163,184,.18);
        }

        body{
            font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            background:
                radial-gradient(900px 520px at 85% 15%, rgba(250,204,21,.16), transparent 60%),
                radial-gradient(900px 520px at 10% 12%, rgba(59,130,246,.12), transparent 55%),
                linear-gradient(180deg, var(--navy-950), var(--navy-900));
            color: var(--text);
            min-height: 100vh;
        }

        .navbar{
            background: rgba(15,23,42,.55);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border);
        }
        .brand{
            font-family: Poppins, sans-serif;
            font-weight: 900;
            letter-spacing: .3px;
        }
        .nav-link{
            color: rgba(229,231,235,.85) !important;
            font-weight: 700;
        }
        .nav-link:hover{ color: var(--gold) !important; }

        .btn-gold{
            background: linear-gradient(180deg, var(--gold), var(--gold-2));
            color: #0b1220;
            border: none;
            font-weight: 900;
            box-shadow: 0 14px 26px rgba(251,191,36,.16);
        }
        .btn-gold:hover{ filter: brightness(1.03); transform: translateY(-1px); }

        .btn-ghost{
            border: 1px solid rgba(255,255,255,.25);
            color: rgba(229,231,235,.92);
            font-weight: 800;
            background: rgba(2,6,23,.25);
        }
        .btn-ghost:hover{ border-color: rgba(251,191,36,.45); color: #fff; }

        .shell{
            max-width: 980px;
            margin: 0 auto;
        }

        .cardx{
            border: 1px solid var(--border);
            background: rgba(15,23,42,.42);
            backdrop-filter: blur(12px);
            border-radius: 22px;
            box-shadow: 0 30px 90px rgba(0,0,0,.45);
            overflow: hidden;
        }

        .top-strip{
            height: 6px;
            background: linear-gradient(90deg, rgba(59,130,246,.65), rgba(251,191,36,.9), rgba(244,63,94,.65));
        }

        .lock{
            width: 70px;
            height: 70px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            background: rgba(251,191,36,.12);
            border: 1px solid rgba(251,191,36,.26);
            color: var(--gold);
            margin: 0 auto 14px;
            box-shadow: inset 0 0 0 1px rgba(0,0,0,.08);
        }

        .title{
            font-family: Poppins, sans-serif;
            font-weight: 900;
            letter-spacing: .2px;
        }

        .desc{
            color: rgba(229,231,235,.70);
            line-height: 1.75;
        }

        .info{
            border: 1px solid rgba(148,163,184,.18);
            background: rgba(2,6,23,.25);
            border-radius: 16px;
            padding: 14px 16px;
            color: rgba(229,231,235,.75);
        }

        .footer{
            border-top: 1px solid rgba(148,163,184,.14);
            color: rgba(229,231,235,.55);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 brand text-white" href="{{ route('home') }}">
            <img src="{{ asset('images/Logo Votify.png') }}" alt="VOTIFY" width="38" height="38"
                 class="rounded-circle border border-2" style="border-color: rgba(255,255,255,.25)!important;">
            <span>VOTIFY</span>
        </a>

        <div class="ms-auto d-flex gap-2">
            <a class="btn btn-ghost rounded-pill px-4 py-2" href="{{ route('calon.public') }}">
                <i class="bi bi-person-vcard me-2"></i>Lihat Kandidat
            </a>
            <a class="btn btn-gold rounded-pill px-4 py-2" href="{{ route('home') }}">
                <i class="bi bi-house-door me-2"></i>Beranda
            </a>
        </div>
    </div>
</nav>

<main class="container py-5">
    <div class="shell">
        <div class="cardx">
            <div class="top-strip"></div>

            <div class="p-4 p-md-5 text-center">
                <div class="lock">
                    <i class="bi bi-lock-fill" style="font-size: 30px;"></i>
                </div>

                <h1 class="title mb-2">Voting Sedang Ditutup</h1>
                <p class="desc mb-4">
                    Sesi pemilihan saat ini belum aktif atau sudah ditutup oleh Panitia Pemira.
                    Silakan cek jadwal pembukaan voting atau kembali saat periode voting dimulai.
                </p>

                <div class="row g-3 justify-content-center">
                    <div class="col-12 col-md-10">
                        <div class="info text-start">
                            <div class="d-flex align-items-start gap-3">
                                <div class="mt-1" style="color: rgba(251,191,36,.9);">
                                    <i class="bi bi-info-circle"></i>
                                </div>
                                <div>
                                    <div class="fw-bold" style="font-family:Poppins,sans-serif;">Info</div>
                                    <div class="small">
                                        Jika ingin menampilkan jadwal otomatis di sini, data “Jadwal Pemira” bisa diambil dari tabel jadwal dan ditaruh pada card ini.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex justify-content-center flex-wrap gap-2 mt-2">
                            <a class="btn btn-gold rounded-pill px-4 py-2" href="{{ route('home') }}">
                                <i class="bi bi-house-door me-2"></i>Kembali ke Beranda
                            </a>
                            <a class="btn btn-ghost rounded-pill px-4 py-2" href="{{ route('calon.public') }}">
                                <i class="bi bi-person-vcard me-2"></i>Lihat Profil Calon
                            </a>
                            <a class="btn btn-ghost rounded-pill px-4 py-2" href="{{ route('faq') }}">
                                <i class="bi bi-question-circle me-2"></i>FAQ
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer text-center py-3 small">
                Panitia Pemira DPM & BEM • VOTIFY 2025
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
