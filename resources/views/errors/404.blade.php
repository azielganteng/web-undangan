<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | GA DIGITAL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..800;1,400..800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #F2EBD9;
            color: #343D35;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }
        .font-display {
            font-family: 'Playfair Display', Georgia, serif;
        }
    </style>
</head>
<body class="h-full flex items-center justify-center p-6">
    <div class="max-w-lg w-full text-center bg-[#FAF6EC] rounded-3xl p-8 sm:p-12 border border-[#E6DEC8] shadow-xl relative overflow-hidden">
        {{-- Decorative Arch Ring --}}
        <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-[#F2EBD9] border-2 border-[#C5A880] flex items-center justify-center text-3xl shadow-inner text-[#C5A880]">
            ✦
        </div>

        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-[#343D35] text-[#FAF6EC] uppercase tracking-wider mb-4">
            Error 404
        </span>

        <h1 class="font-display text-3xl sm:text-4xl font-bold text-[#343D35] mb-3">
            Halaman Tidak Ditemukan
        </h1>

        <p class="text-sm sm:text-base text-[#343D35]/75 leading-relaxed mb-8 max-w-sm mx-auto">
            Mohon maaf, tautan undangan atau halaman yang Anda tuju tidak tersedia, telah kedaluwarsa, atau ada kesalahan penulisan URL.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('landing') }}"
               class="w-full sm:w-auto px-6 py-3 rounded-full text-xs sm:text-sm font-semibold bg-[#343D35] text-[#FAF6EC] hover:bg-[#252c26] transition shadow-md inline-flex items-center justify-center gap-2">
                <span>&larr; Kembali ke Beranda</span>
            </a>

            <a href="https://wa.me/6285749739342?text=Halo%20Admin%20GA%20Digital%2C%20saya%20mengalami%20kendala%20halaman%20tidak%20ditemukan%20(404)."
               target="_blank" rel="noopener noreferrer"
               class="w-full sm:w-auto px-6 py-3 rounded-full text-xs sm:text-sm font-semibold border border-[#343D35]/40 text-[#343D35] hover:bg-[#343D35]/10 transition inline-flex items-center justify-center gap-2">
                <span>Bantuan WhatsApp</span>
            </a>
        </div>
    </div>
</body>
</html>
