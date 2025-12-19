<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Berhasil - VOTIFY</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;900&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root { --navy:#0f172a; --gold:#fbbf24; }
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            font-family: Inter, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card-success {
            background: #fff;
            border-radius: 24px;
            padding: 48px 32px;
            max-width: 520px;
            text-align: center;
            box-shadow: 0 24px 60px rgba(0,0,0,.3);
        }
        .icon-check {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #10b981, #059669);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            animation: pop .4s ease;
        }
        @keyframes pop {
            0% { transform: scale(0); }
            60% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        .title {
            font-family: Poppins, sans-serif;
            font-weight: 900;
            font-size: 32px;
            color: var(--navy);
            margin-bottom: 12px;
        }
        .desc {
            color: #64748b;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 32px;
        }
        .btn-home {
            background: linear-gradient(135deg, var(--navy), #1e293b);
            color: #fff;
            font-weight: 900;
            border: none;
            padding: 14px 32px;
            border-radius: 14px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-home:hover {
            filter: brightness(1.1);
            color: #fff;
        }
    </style>
</head>
<body>

<div class="card-success">
    <div class="icon-check">
        <i class="bi bi-check-lg text-white" style="font-size:48px;"></i>
    </div>

    <h1 class="title">Voting Berhasil!</h1>

    <p class="desc">
        Terima kasih atas partisipasi Anda dalam Pemira DPM & BEM.<br>
        Suara Anda telah <b>tercatat dengan aman</b> dan akan digunakan untuk menentukan pemimpin terbaik.
    </p>

    <a href="{{ route('home') }}" class="btn-home">
        <i class="bi bi-house-door-fill me-2"></i>Kembali ke Beranda
    </a>

    <hr class="my-4">

    <div style="font-size:13px; color:#94a3b8;">
        <i class="bi bi-shield-check me-1"></i>
        Data voting Anda sudah tersimpan dan <b>tidak dapat diubah</b>.
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
