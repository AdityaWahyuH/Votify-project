<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - VOTIFY</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root{
            --navy-950:#0b1220;
            --navy-900:#0f172a;
            --navy-800:#111c33;
            --gold:#fbbf24;     /* gold */
            --gold-2:#f59e0b;   /* deeper gold */
            --text:#e5e7eb;
            --muted:#94a3b8;
            --card:#0b1220cc;
            --border:rgba(148,163,184,.18);
        }

        body{
            font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            background:
                radial-gradient(900px 500px at 85% 20%, rgba(250,204,21,.14), transparent 60%),
                radial-gradient(900px 500px at 10% 10%, rgba(59,130,246,.10), transparent 55%),
                linear-gradient(180deg, var(--navy-950), var(--navy-900));
            color: var(--text);
            min-height: 100vh;
        }

        /* Navbar modern */
        .navbar{
            background: rgba(15,23,42,.55);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border);
        }
        .brand{
            font-family: Poppins, sans-serif;
            letter-spacing: .3px;
            font-weight: 700;
        }
        .nav-link{
            color: rgba(229,231,235,.85) !important;
            font-weight: 600;
        }
        .nav-link:hover{ color: var(--gold) !important; }
        .nav-link.active{ color: var(--gold) !important; }

        .btn-gold{
            background: linear-gradient(180deg, var(--gold), var(--gold-2));
            color: #0b1220;
            border: none;
            font-weight: 800;
            box-shadow: 0 12px 24px rgba(251,191,36,.18);
        }
        .btn-gold:hover{ filter: brightness(1.03); transform: translateY(-1px); }

        /* Hero */
        .hero{
            padding: 64px 0 26px;
        }
        .badge-soft{
            display: inline-flex;
            gap: 8px;
            align-items: center;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(251,191,36,.12);
            border: 1px solid rgba(251,191,36,.25);
            color: var(--gold);
            font-weight: 800;
            letter-spacing: .2px;
        }
        .hero-title{
            font-family: Poppins, sans-serif;
            font-weight: 800;
            font-size: clamp(28px, 3.2vw, 44px);
            margin: 14px 0 10px;
        }
        .hero-sub{
            color: rgba(229,231,235,.75);
            max-width: 720px;
            line-height: 1.7;
        }

        /* FAQ Card container */
        .faq-wrap{
            margin-top: 22px;
            border: 1px solid var(--border);
            background: rgba(15,23,42,.35);
            backdrop-filter: blur(10px);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 22px 70px rgba(0,0,0,.35);
        }

        /* Accordion modern */
        .accordion-item{
            background: transparent;
            border: none;
            border-top: 1px solid var(--border);
        }
        .accordion-item:first-child{ border-top: none; }

        .accordion-button{
            background: transparent;
            color: rgba(229,231,235,.92);
            padding: 18px 18px;
            font-weight: 700;
            box-shadow: none;
        }
        .accordion-button:focus{
            box-shadow: none;
            border-color: transparent;
        }
        .accordion-button:not(.collapsed){
            background: rgba(251,191,36,.06);
            color: #fff;
        }

        .accordion-button::after{
            filter: invert(1) opacity(.8);
        }

        .accordion-body{
            color: rgba(229,231,235,.78);
            line-height: 1.75;
            padding: 0 18px 18px;
        }

        .q-icon{
            width: 34px;
            height: 34px;
            border-radius: 10px;
            display: inline-grid;
            place-items: center;
            margin-right: 10px;
            background: rgba(251,191,36,.12);
            border: 1px solid rgba(251,191,36,.22);
            color: var(--gold);
        }

        /* search */
        .search{
            position: relative;
        }
        .search input{
            background: rgba(2,6,23,.45);
            border: 1px solid var(--border);
            color: rgba(229,231,235,.92);
            padding: 12px 44px 12px 14px;
            border-radius: 14px;
        }
        .search input:focus{
            outline: none;
            box-shadow: 0 0 0 .2rem rgba(251,191,36,.15);
            border-color: rgba(251,191,36,.35);
        }
        .search i{
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(229,231,235,.55);
        }

        /* smooth entrance */
        .fade-up{
            opacity: 0;
            transform: translateY(10px);
            transition: .5s ease;
        }
        .fade-up.show{
            opacity: 1;
            transform: translateY(0);
        }

        footer{
            border-top: 1px solid var(--border);
            color: rgba(229,231,235,.6);
            padding: 22px 0;
            margin-top: 46px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 brand text-white" href="{{ route('home') }}">
            <img src="{{ asset('images/Logo-Votify.jpg') }}" alt="VOTIFY" width="38" height="38" class="rounded-circle border border-2" style="border-color: rgba(255,255,255,.25)!important;">
            <span>VOTIFY</span>
        </a>

        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('calon.public') }}">Kandidat</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('faq') }}">FAQ</a></li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-gold rounded-pill px-4 py-2" href="{{ route('voting.index') }}">VOTE SEKARANG</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container hero fade-up">
    <div class="d-flex flex-column align-items-start">
        <span class="badge-soft"><i class="bi bi-info-circle"></i> PUSAT BANTUAN</span>
        <h1 class="hero-title">Frequently Asked Questions</h1>
        <p class="hero-sub">
            Bingung cara voting, aturan pemilihan, atau kendala login? Santai—jawabannya ada di sini.
        </p>
    </div>

    <div class="row g-3 align-items-center mt-3">
        <div class="col-lg-7">
            <div class="search">
                <input id="faqSearch" type="text" class="form-control" placeholder="Cari pertanyaan… (contoh: voting, ubah pilihan, hasil)">
                <i class="bi bi-search"></i>
            </div>
        </div>
        <div class="col-lg-5 text-lg-end">
            <a class="btn btn-outline-light rounded-pill px-4 py-2" href="{{ route('calon.public') }}">
                <i class="bi bi-person-vcard me-2"></i>Lihat Kandidat
            </a>
        </div>
    </div>

    <div class="faq-wrap mt-4">
        <div class="p-4 pb-2">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <div class="fw-bold" style="font-family:Poppins,sans-serif;">Pertanyaan Populer</div>
                    <div class="text-muted" style="color: rgba(229,231,235,.55)!important;">Klik untuk melihat jawaban.</div>
                </div>
                <div class="small" style="color: rgba(229,231,235,.55);">
                    <i class="bi bi-shield-check me-1"></i> Aman & transparan
                </div>
            </div>
        </div>

        <div class="accordion" id="faqAccordion">
            @forelse($faq as $index => $item)
                <div class="accordion-item faq-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $item->id }}">
                            <span class="q-icon"><i class="bi bi-question-lg"></i></span>
                            <span class="faq-question">{{ $item->pertanyaan }}</span>
                        </button>
                    </h2>
                    <div id="collapse{{ $item->id }}"
                         class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                         data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            {{ $item->jawaban }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-5 text-center">
                    <div class="mb-2" style="font-size: 46px;">🧐</div>
                    <div class="fw-bold mb-1">FAQ masih kosong</div>
                    <div style="color: rgba(229,231,235,.65);">Isi dulu datanya dari Seeder atau Admin.</div>
                </div>
            @endforelse
        </div>
    </div>

    <div class="mt-4 d-flex flex-wrap gap-2 fade-up" id="helpBox">
        <a class="btn btn-gold rounded-pill px-4 py-2" href="{{ route('voting.index') }}">
            <i class="bi bi-check2-circle me-2"></i>Mulai Voting
        </a>
        <a class="btn btn-outline-light rounded-pill px-4 py-2" href="{{ route('home') }}">
            <i class="bi bi-house-door me-2"></i>Kembali Beranda
        </a>
    </div>
</div>

<footer class="text-center">
    <div class="container">
        <div class="small">&copy; 2025 VOTIFY - Telkom University Surabaya</div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // animasi masuk halus
    window.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.fade-up').forEach((el, i) => {
            setTimeout(() => el.classList.add('show'), 80 + (i * 80));
        });
    });

    // fitur search FAQ sederhana (client-side)
    const input = document.getElementById('faqSearch');
    if (input) {
        input.addEventListener('input', () => {
            const q = input.value.toLowerCase().trim();
            document.querySelectorAll('.faq-item').forEach(item => {
                const text = item.querySelector('.faq-question')?.innerText.toLowerCase() || '';
                item.style.display = text.includes(q) ? '' : 'none';
            });
        });
    }
</script>
</body>
</html>
