<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bilik Suara Digital - VOTIFY</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root{
            --navy-950:#0b1220;
            --navy-900:#0f172a;
            --gold:#fbbf24;
            --gold2:#f59e0b;
            --border: rgba(15,23,42,.12);
        }

        body{
            background:#f1f5f9;
            font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        }

        /* Topbar */
        .topbar{
            background: linear-gradient(180deg, var(--navy-900), #0b1730);
            color:#fff;
            border-bottom: 1px solid rgba(255,255,255,.08);
        }
        .brand{
            font-family: Poppins, sans-serif;
            font-weight: 900;
            letter-spacing: .2px;
        }
        .wrap{
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Title */
        .page-title{
            font-family:Poppins,sans-serif;
            font-weight: 900;
            color:#0f172a;
        }
        .sub{
            color:#64748b;
        }

        /* Candidate Card */
        .candidate-card{
            background:#fff;
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow:hidden;
            transition:.2s ease;
            height:100%;
            position:relative;
            cursor:pointer;
        }
        .candidate-card:hover{
            transform: translateY(-3px);
            box-shadow: 0 18px 40px rgba(2,6,23,.12);
        }

        .photo{
            height: 240px;
            background:#e2e8f0;
            overflow:hidden;
        }
        .photo img{
            width:100%;
            height:100%;
            object-fit: cover;
            display:block;
        }

        .badge-pos{
            position:absolute;
            top:14px;
            left:14px;
            background: rgba(251,191,36,.95);
            color:#0b1220;
            font-weight: 900;
            border-radius: 999px;
            padding: 6px 12px;
            font-size: 12px;
        }

        .meta{ padding: 16px; }
        .name{
            font-family:Poppins,sans-serif;
            font-weight: 900;
            font-size: 18px;
            line-height: 1.25;
            color:#0f172a;
            margin: 2px 0 6px;
        }
        .tag{
            font-size: 12px;
            font-weight: 900;
            color: #f59e0b;
        }

        /* Selected style */
        .candidate-card.selected{
            outline: 3px solid rgba(245,158,11,.70);
            box-shadow: 0 0 0 6px rgba(245,158,11,.15);
        }
        .pick{
            position:absolute;
            top:12px;
            right:12px;
            width: 36px;
            height: 36px;
            border-radius: 999px;
            background: rgba(15,23,42,.92);
            color:#fff;
            display:grid;
            place-items:center;
            opacity:0;
            transform: scale(.9);
            transition:.18s ease;
        }
        .candidate-card.selected .pick{
            opacity:1;
            transform: scale(1);
        }

        /* Action bar */
        .actionbar{
            position: sticky;
            bottom: 0;
            background: rgba(255,255,255,.88);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(15,23,42,.12);
            padding: 12px 0;
        }
        .btn-send{
            background: linear-gradient(180deg, #0f172a, #0b1730);
            color:#fff;
            font-weight: 900;
            border:none;
            padding: 12px 18px;
            border-radius: 14px;
            min-width: 260px;
        }
        .btn-send:hover{ filter: brightness(1.05); }

        .hint{
            color:#64748b;
            font-size: 13px;
        }
    </style>
</head>

<body>
@php
    use Illuminate\Support\Str;

    // Normalisasi path foto agar selalu benar (public/images, images/, storage/, url)
    function fotoUrl($foto) {
        if (!$foto) return null;

        if (Str::startsWith($foto, ['http://','https://'])) return $foto;
        if (Str::startsWith($foto, 'images/')) return asset($foto);
        if (Str::startsWith($foto, 'storage/')) return asset($foto);

        // default: nama file saja -> ambil dari public/images/
        return asset('images/'.$foto);
    }
@endphp

{{-- Topbar --}}
<div class="topbar py-3">
    <div class="wrap px-3 d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-box-seam-fill" style="color: var(--gold);"></i>
            <div class="brand">BILIK SUARA</div>
        </div>

        <div class="d-flex align-items-center gap-2">
            <span class="badge rounded-pill text-bg-dark">
                <i class="bi bi-person-circle me-1"></i>
                {{ session('nama_pemilih', 'Pemilih') }}
            </span>
        </div>
    </div>
</div>

<main class="wrap px-3 py-5">
    <div class="text-center mb-4">
        <h1 class="page-title mb-2">Tentukan Pilihan Anda</h1>
        <div class="sub">Pilih kandidat terbaik (DPM dan BEM) untuk memimpin periode mendatang.</div>
    </div>

    <form method="POST" action="{{ route('voting.submit') }}">
        @csrf

        {{-- DPM --}}
        <div class="mb-4">
            <h4 class="fw-bold" style="font-family:Poppins,sans-serif;">Calon DPM</h4>
            <div class="row g-4 mt-1">
                @forelse($calon_dpm as $calon)
                    <div class="col-md-6 col-lg-4">
                        <label class="w-100">
                            <input type="radio" name="calon_dpm_id" value="{{ $calon->id }}" class="d-none candidate-input">

                            <div class="candidate-card candidate-ui">
                                <div class="badge-pos">DPM</div>
                                <div class="pick"><i class="bi bi-check2"></i></div>

                                <div class="photo">
                                    @php $url = fotoUrl($calon->foto); @endphp

                                    @if($url)
                                        <img src="{{ $url }}"
                                             alt="{{ $calon->nama }}"
                                             onerror="this.onerror=null;this.src='{{ asset('images/Logo Votify.png') }}';">
                                    @else
                                        <div class="h-100 d-flex align-items-center justify-content-center text-secondary">
                                            Tidak ada foto
                                        </div>
                                    @endif
                                </div>

                                <div class="meta">
                                    <div class="name">{{ $calon->nama }}</div>
                                    <div class="tag"><i class="bi bi-star-fill me-1"></i>Kandidat Resmi</div>
                                    <hr class="my-2">
                                    <div class="text-secondary" style="font-size:13px;line-height:1.6;">
                                        <b>Visi:</b> {{ Str::limit($calon->visi, 90) }}
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                @empty
                    <div class="col-12 text-center text-secondary">Belum ada calon DPM.</div>
                @endforelse
            </div>
        </div>

        {{-- BEM --}}
        <div class="mb-4">
            <h4 class="fw-bold" style="font-family:Poppins,sans-serif;">Calon BEM</h4>
            <div class="row g-4 mt-1">
                @forelse($calon_bem as $calon)
                    <div class="col-md-6 col-lg-4">
                        <label class="w-100">
                            <input type="radio" name="calon_bem_id" value="{{ $calon->id }}" class="d-none candidate-input">

                            <div class="candidate-card candidate-ui">
                                <div class="badge-pos">BEM</div>
                                <div class="pick"><i class="bi bi-check2"></i></div>

                                <div class="photo">
                                    @php $url = fotoUrl($calon->foto); @endphp

                                    @if($url)
                                        <img src="{{ $url }}"
                                             alt="{{ $calon->nama }}"
                                             onerror="this.onerror=null;this.src='{{ asset('images/Logo Votify.png') }}';">
                                    @else
                                        <div class="h-100 d-flex align-items-center justify-content-center text-secondary">
                                            Tidak ada foto
                                        </div>
                                    @endif
                                </div>

                                <div class="meta">
                                    <div class="name">{{ $calon->nama }}</div>
                                    <div class="tag"><i class="bi bi-star-fill me-1"></i>Kandidat Resmi</div>
                                    <hr class="my-2">
                                    <div class="text-secondary" style="font-size:13px;line-height:1.6;">
                                        <b>Visi:</b> {{ Str::limit($calon->visi, 90) }}
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                @empty
                    <div class="col-12 text-center text-secondary">Belum ada calon BEM.</div>
                @endforelse
            </div>
        </div>

        {{-- Action bar --}}
        <div class="actionbar">
            <div class="wrap px-3 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                <div class="hint">
                    <i class="bi bi-info-circle me-2"></i>
                    Pastikan pilih <b>1 DPM</b> dan <b>1 BEM</b> sebelum kirim.
                </div>

                <button type="submit" class="btn-send">
                    <i class="bi bi-send me-2"></i>KIRIM SUARA
                </button>
            </div>
        </div>
    </form>
</main>

<script>
    // efek selected untuk radio
    const inputs = document.querySelectorAll('.candidate-input');
    inputs.forEach((inp) => {
        inp.addEventListener('change', () => {
            const group = inp.getAttribute('name');

            document.querySelectorAll(`input[name="${group}"]`).forEach((i) => {
                const card = i.closest('label')?.querySelector('.candidate-ui');
                if (card) card.classList.remove('selected');
            });

            const card = inp.closest('label')?.querySelector('.candidate-ui');
            if (card) card.classList.add('selected');
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
