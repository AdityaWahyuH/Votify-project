<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - VOTIFY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">VOTIFY</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('calon.public') }}">Profil Calon</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('faq') }}">FAQ</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Frequently Asked Questions (FAQ)</h1>
        
        <div class="accordion" id="faqAccordion">
            @forelse($faq as $index => $item)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $item->id }}">
                        {{ $item->pertanyaan }}
                    </button>
                </h2>
                <div id="collapse{{ $item->id }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {{ $item->jawaban }}
                    </div>
                </div>
            </div>
            @empty
            <p class="text-muted">Belum ada FAQ tersedia.</p>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
