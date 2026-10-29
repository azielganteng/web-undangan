<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GA DIGITAL – Jasa Pembuatan Undangan Digital Elegan & Modern</title>
    <meta name="description" content="Jasa pembuatan undangan digital website elegan, interaktif, dan mudah dibagikan. Lengkap dengan RSVP online, musik latar, peta lokasi, dan amplop digital." />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    {{-- Open Graph / Social Sharing --}}
    <meta property="og:type" content="website" />
    <meta property="og:title" content="GA DIGITAL – Jasa Pembuatan Undangan Digital Elegan & Modern" />
    <meta property="og:description" content="Jasa pembuatan undangan digital website elegan, interaktif, dan mudah dibagikan. Lengkap dengan RSVP online, musik latar, peta lokasi, dan amplop digital." />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=80" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Alpine.js via CDN --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..800;1,400..800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <style>
        [x-cloak] { display: none !important; }

        body {
            background-color: #F2EBD9;
            font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif;
            color: #343D35;
        }

        .font-display {
            font-family: 'Playfair Display', ui-serif, Georgia, serif;
        }

        /* Glassmorphism navbar */
        .navbar-glass {
            background: rgba(242, 235, 217, 0.85);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(197, 168, 128, 0.25);
        }

        /* Smooth image zoom */
        .catalog-img-container:hover .catalog-thumb {
            transform: scale(1.08);
        }
        .catalog-thumb {
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Hero text gradient */
        .hero-title-accent {
            background: linear-gradient(135deg, #343D35 0%, #4a5c4d 55%, #C5A880 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Card elevation */
        .card-soft {
            background: #FAF6EC;
            border: 1px solid #E6DEC8;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .card-soft:hover {
            border-color: #C5A880;
            transform: translateY(-4px);
            box-shadow: 0 20px 35px -10px rgba(52, 61, 53, 0.08);
        }

        /* Pricing special card */
        .card-special {
            background: linear-gradient(170deg, #FAF6EC 0%, #F2EBD9 100%);
            border: 2px solid #C5A880;
            box-shadow: 0 25px 60px -12px rgba(197, 168, 128, 0.35);
        }

        /* Pulse glow */
        @keyframes pulse-ring {
            0% { transform: scale(0.95); opacity: 0.8; }
            50% { transform: scale(1.15); opacity: 0; }
            100% { transform: scale(0.95); opacity: 0; }
        }
        .pulse-ring-active {
            animation: pulse-ring 2.5s cubic-bezier(0.45, 0, 0.55, 1) infinite;
        }
    </style>
</head>
<body class="antialiased selection:bg-[#C5A880] selection:text-white" x-data="{ mobileMenu: false, activeFilter: 'Semua' }">

    {{-- ==================== TOP ANNOUNCEMENT BANNER ==================== --}}
    <div class="bg-[#343D35] text-[#FAF6EC] text-xs py-2 px-4 text-center font-medium border-b border-[#FAF6EC]/10">
        <div class="max-w-7xl mx-auto flex items-center justify-center gap-2">
            <span class="inline-block px-2 py-0.5 rounded-full bg-[#C5A880] text-[#343D35] text-[10px] font-bold uppercase tracking-wider">Promo Bulan Ini</span>
            <span>Diskon 25% untuk Seluruh Tema Undangan Digital Website &bull; Siap Kirim dalam 24 Jam!</span>
        </div>
    </div>

    {{-- ==================== NAVBAR STICKY (GLASSMORPHISM) ==================== --}}
    <header class="navbar-glass sticky top-0 z-50 transition-all duration-300">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                {{-- Logo Brand --}}
                <a href="{{ route('landing') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-full bg-[#343D35] flex items-center justify-center text-[#F2EBD9] transition-transform duration-300 group-hover:scale-105 shadow-md">
                        <svg class="w-5 h-5 text-[#C5A880]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-display font-bold text-xl tracking-tight text-[#343D35]">GA DIGITAL<span class="text-[#C5A880]">.</span></span>
                    </div>
                </a>

                {{-- Menu Tengah Desktop --}}
                <ul class="hidden md:flex items-center gap-8 text-sm font-medium">
                    <li>
                        <a href="#" class="text-[#343D35] hover:text-[#C5A880] transition-colors">Beranda</a>
                    </li>
                    <li>
                        <a href="#keunggulan" class="text-[#343D35]/75 hover:text-[#343D35] transition-colors">Keunggulan</a>
                    </li>
                    <li>
                        <a href="#katalog" class="text-[#343D35]/75 hover:text-[#343D35] transition-colors">Katalog Tema</a>
                    </li>
                    <li>
                        <a href="#cara-order" class="text-[#343D35]/75 hover:text-[#343D35] transition-colors">Cara Order</a>
                    </li>
                    <li>
                        <a href="#testimoni" class="text-[#343D35]/75 hover:text-[#343D35] transition-colors">Testimoni</a>
                    </li>
                    <li>
                        <a href="#harga" class="text-[#343D35]/75 hover:text-[#343D35] transition-colors">Paket Harga</a>
                    </li>
                </ul>

                {{-- Action CTA Desktop --}}
                <div class="hidden md:flex items-center gap-4">
                    <a href="https://wa.me/6285749739342?text=Halo%20Admin%20GA%20Digital%2C%20saya%20tertarik%20untuk%20konsultasi%20pembuatan%20undangan%20digital."
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 bg-[#343D35] text-[#F2EBD9] px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-[#272e28] hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 text-[#C5A880]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                        </svg>
                        Hubungi Kami
                    </a>
                </div>

                {{-- Mobile Hamburger --}}
                <button @click="mobileMenu = !mobileMenu"
                        type="button"
                        class="md:hidden p-2.5 rounded-xl bg-[#FAF6EC] border border-[#E6DEC8] text-[#343D35] hover:bg-[#E6DEC8] transition-colors"
                        aria-label="Buka navigasi menu">
                    <svg x-show="!mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenu" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Mobile Dropdown Menu --}}
            <div x-show="mobileMenu" x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-3"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-3"
                 class="md:hidden pb-6 pt-2 border-t border-[#E6DEC8]">
                <ul class="flex flex-col gap-2 text-sm font-medium">
                    <li>
                        <a href="#" @click="mobileMenu = false" class="block px-4 py-2.5 rounded-xl hover:bg-[#FAF6EC] text-[#343D35] transition-colors">Beranda</a>
                    </li>
                    <li>
                        <a href="#keunggulan" @click="mobileMenu = false" class="block px-4 py-2.5 rounded-xl hover:bg-[#FAF6EC] text-[#343D35] transition-colors">Keunggulan</a>
                    </li>
                    <li>
                        <a href="#katalog" @click="mobileMenu = false" class="block px-4 py-2.5 rounded-xl hover:bg-[#FAF6EC] text-[#343D35] transition-colors">Katalog Tema</a>
                    </li>
                    <li>
                        <a href="#cara-order" @click="mobileMenu = false" class="block px-4 py-2.5 rounded-xl hover:bg-[#FAF6EC] text-[#343D35] transition-colors">Cara Order</a>
                    </li>
                    <li>
                        <a href="#testimoni" @click="mobileMenu = false" class="block px-4 py-2.5 rounded-xl hover:bg-[#FAF6EC] text-[#343D35] transition-colors">Testimoni</a>
                    </li>
                    <li>
                        <a href="#harga" @click="mobileMenu = false" class="block px-4 py-2.5 rounded-xl hover:bg-[#FAF6EC] text-[#343D35] transition-colors">Paket Harga</a>
                    </li>
                    <li class="pt-2">
                        <a href="https://wa.me/6285749739342?text=Halo%20Admin%20GA%20Digital%2C%20saya%20mau%20konsultasi%20pembuatan%20undangan%20digital."
                           target="_blank" rel="noopener noreferrer"
                           class="flex items-center justify-center gap-2 bg-[#343D35] text-[#F2EBD9] w-full py-3 rounded-full text-sm font-semibold">
                            Konsultasi via WhatsApp
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    {{-- ==================== HERO SECTION (SPLIT 50:50 PRESISI DENGAN PHOTO SLIDER) ==================== --}}
    <section class="relative bg-[#F2EBD9] overflow-hidden min-h-[580px] lg:min-h-[650px] grid grid-cols-1 lg:grid-cols-2 items-stretch">

        {{-- Kolom Kiri: 50% Teks & Aksi --}}
        <div class="flex flex-col justify-center px-6 sm:px-10 lg:pl-16 lg:pr-8 py-12 lg:py-20 z-10 bg-[#F2EBD9]">
            {{-- Badge Atas --}}
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#FAF6EC] border border-[#E6DEC8] shadow-xs mb-6 w-fit">
                <span class="w-2 h-2 rounded-full bg-[#C5A880] animate-pulse"></span>
                <span class="text-xs font-semibold text-[#343D35] tracking-wider uppercase">Solusi Undangan Pernikahan Modern</span>
            </div>

            {{-- Headline Utama --}}
            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl text-[#343D35] font-bold tracking-tight leading-[1.15] mb-6">
                Bagikan Momen Bahagia dengan <span class="italic font-normal">Undangan Digital</span> yang Memukau
            </h1>

            {{-- Deskripsi Ringkas --}}
            <p class="text-base sm:text-lg text-[#343D35]/80 leading-relaxed max-w-xl mb-8 font-normal">
                Ciptakan kesan pertama yang berkelas untuk hari pernikahan Anda. Praktis dibagikan ke ribuan tamu tanpa batas, dilengkapi musik romantis, RSVP real-time, dan navigasi lokasi otomatis.
            </p>

            {{-- Tombol CTA --}}
            <div class="flex flex-wrap items-center gap-4 mb-10">
                <a href="#katalog"
                   class="bg-[#343D35] text-[#F2EBD9] hover:bg-[#465247] px-6 py-3.5 rounded-full font-medium transition shadow-md inline-flex items-center justify-center gap-2">
                    <span>Lihat Katalog Tema</span>
                    <svg class="w-4 h-4 text-[#C5A880]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>

                <a href="https://wa.me/6285749739342?text=Halo%20Admin%20GA%20Digital%2C%20saya%20ingin%20pesan%20undangan%20digital%20website.%20Mohon%20info%20paket%20dan%20persyaratannya%20ya."
                   target="_blank" rel="noopener noreferrer"
                   class="border border-[#343D35] text-[#343D35] hover:bg-[#343D35]/10 px-6 py-3.5 rounded-full font-medium transition inline-flex items-center justify-center gap-2.5">
                    <svg class="w-4 h-4 text-emerald-700" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                    </svg>
                    <span>Pesan via WhatsApp</span>
                </a>
            </div>

            {{-- Stats Counters Ringkas --}}
            <div class="grid grid-cols-3 gap-4 pt-6 border-t border-[#343D35]/15 max-w-lg">
                <div>
                    <span class="block font-display font-bold text-2xl sm:text-3xl text-[#343D35]">1.200+</span>
                    <span class="text-xs text-[#343D35]/70 font-medium">Undangan Dibuat</span>
                </div>
                <div>
                    <span class="block font-display font-bold text-2xl sm:text-3xl text-[#343D35]">24 Jam</span>
                    <span class="text-xs text-[#343D35]/70 font-medium">Proses Cepat</span>
                </div>
                <div>
                    <span class="block font-display font-bold text-2xl sm:text-3xl text-[#343D35] flex items-center gap-1">
                        4.9 <span class="text-amber-500 text-lg">&#9733;</span>
                    </span>
                    <span class="text-xs text-[#343D35]/70 font-medium">Rating Klien</span>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: 50% Photo Slider & Gradient Blend --}}
        <div class="relative w-full h-[450px] lg:h-full min-h-[450px] lg:min-h-[650px] overflow-hidden"
             x-data="{ active: 0, images: [
                 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=80',
                 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1200&q=80',
                 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=1200&q=80',
                 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=1200&q=80',
                 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?auto=format&fit=crop&w=1200&q=80'
             ] }"
             x-init="setInterval(() => { active = (active + 1) % images.length }, 4000)">

            {{-- Slider Images with Crossfade Transition --}}
            <div x-show="active === 0"
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 scale-105"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-1000"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 w-full h-full">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=80"
                     alt="Prewedding Elegan dan Romantis di Alam Terbuka"
                     class="w-full h-full object-cover absolute inset-0"
                     loading="eager"
                     fetchpriority="high" />
            </div>

            <div x-show="active === 1"
                 x-cloak
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 scale-105"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-1000"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 w-full h-full">
                <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1200&q=80"
                     alt="Momen Sakral Pernikahan Pasangan Bahagia"
                     class="w-full h-full object-cover absolute inset-0" />
            </div>

            <div x-show="active === 2"
                 x-cloak
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 scale-105"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-1000"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 w-full h-full">
                <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=1200&q=80"
                     alt="Resepsi Pernikahan dan Busana Pengantin Modern"
                     class="w-full h-full object-cover absolute inset-0" />
            </div>

            <div x-show="active === 3"
                 x-cloak
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 scale-105"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-1000"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 w-full h-full">
                <img src="https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=1200&q=80"
                     alt="Potret Romantis Pasangan Pengantin Minimalis"
                     class="w-full h-full object-cover absolute inset-0" />
            </div>

            <div x-show="active === 4"
                 x-cloak
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 scale-105"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-1000"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 w-full h-full">
                <img src="https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?auto=format&fit=crop&w=1200&q=80"
                     alt="Dekorasi Bunga dan Pelukan Hangat Mempelai"
                     class="w-full h-full object-cover absolute inset-0" />
            </div>

            {{-- Gradasi Seamless Blend --}}
            {{-- Sisi Kiri Foto (Desktop): Melebur Halus ke Kolom Kiri Teks --}}
            <div class="hidden lg:block absolute inset-y-0 left-0 w-1/3 bg-gradient-to-r from-[#F2EBD9] via-[#F2EBD9]/60 to-transparent pointer-events-none z-10"></div>

            {{-- Sisi Atas Foto (Mobile): Melebur Halus Saat Ditumpuk Vertikal --}}
            <div class="lg:hidden absolute inset-x-0 top-0 h-16 bg-gradient-to-b from-[#F2EBD9] to-transparent pointer-events-none z-10"></div>

            {{-- Sisi Bawah Foto: Melebur Halus ke Section Berikutnya --}}
            <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-[#F2EBD9] to-transparent pointer-events-none z-10"></div>

            {{-- Floating Indicator Halus di Sudut Kanan Bawah --}}
            <div class="absolute bottom-6 right-6 z-20 flex items-center gap-3 bg-[#343D35]/60 backdrop-blur-md px-3.5 py-1.5 rounded-full border border-white/20 shadow-lg">
                <span class="text-[11px] font-medium text-[#F2EBD9] tracking-wider uppercase hidden sm:inline">Momen Bahagia</span>
                <div class="flex items-center gap-1.5">
                    <button @click="active = 0"
                            type="button"
                            class="h-1.5 rounded-full transition-all duration-300"
                            :class="active === 0 ? 'w-5 bg-[#C5A880]' : 'w-1.5 bg-white/50 hover:bg-white/80'"
                            aria-label="Slide 1">
                    </button>
                    <button @click="active = 1"
                            type="button"
                            class="h-1.5 rounded-full transition-all duration-300"
                            :class="active === 1 ? 'w-5 bg-[#C5A880]' : 'w-1.5 bg-white/50 hover:bg-white/80'"
                            aria-label="Slide 2">
                    </button>
                    <button @click="active = 2"
                            type="button"
                            class="h-1.5 rounded-full transition-all duration-300"
                            :class="active === 2 ? 'w-5 bg-[#C5A880]' : 'w-1.5 bg-white/50 hover:bg-white/80'"
                            aria-label="Slide 3">
                    </button>
                    <button @click="active = 3"
                            type="button"
                            class="h-1.5 rounded-full transition-all duration-300"
                            :class="active === 3 ? 'w-5 bg-[#C5A880]' : 'w-1.5 bg-white/50 hover:bg-white/80'"
                            aria-label="Slide 4">
                    </button>
                    <button @click="active = 4"
                            type="button"
                            class="h-1.5 rounded-full transition-all duration-300"
                            :class="active === 4 ? 'w-5 bg-[#C5A880]' : 'w-1.5 bg-white/50 hover:bg-white/80'"
                            aria-label="Slide 5">
                    </button>
                </div>
            </div>

        </div>

    </section>

    {{-- ==================== SECTION KEUNGGULAN & FITUR LENGKAP ==================== --}}
    <section id="keunggulan" class="py-20 lg:py-28 bg-[#FAF6EC] border-y border-[#E6DEC8]/60 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section Heading --}}
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block text-xs font-bold uppercase tracking-widest text-[#C5A880] mb-2.5">Fitur &amp; Keunggulan</span>
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-[#343D35] tracking-tight">
                    Segala Kebutuhan Undangan Digital dalam Satu Paket
                </h2>
                <p class="text-[#343D35]/70 text-base sm:text-lg mt-4">
                    Dirancang dengan teliti untuk mempermudah calon pengantin serta memberikan pengalaman terbaik bagi seluruh tamu undangan.
                </p>
            </div>

            {{-- 8 Kartu Fitur (Sesuai byaadigitall.com) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- Feature 1: Custom Nama Tamu --}}
                <div class="card-soft p-6 rounded-2xl">
                    <div class="w-12 h-12 rounded-xl bg-[#F2EBD9] text-[#343D35] flex items-center justify-center text-xl mb-5 border border-[#E6DEC8]">
                        &#9998;
                    </div>
                    <h3 class="font-bold text-lg text-[#343D35] mb-2">Nama Tamu Unlimited</h3>
                    <p class="text-sm text-[#343D35]/70 leading-relaxed">
                        Kirimkan undangan dengan nama tamu personal (custom link `?to=Nama+Tamu`) tanpa batas kuota kirim.
                    </p>
                </div>

                {{-- Feature 2: Musik Latar Autoplay --}}
                <div class="card-soft p-6 rounded-2xl">
                    <div class="w-12 h-12 rounded-xl bg-[#F2EBD9] text-[#343D35] flex items-center justify-center text-xl mb-5 border border-[#E6DEC8]">
                        &#9836;
                    </div>
                    <h3 class="font-bold text-lg text-[#343D35] mb-2">Musik Latar Romantis</h3>
                    <p class="text-sm text-[#343D35]/70 leading-relaxed">
                        Dilengkapi lagu pilihan otomatis berputar saat undangan dibuka dengan kontrol pemutar musik interaktif.
                    </p>
                </div>

                {{-- Feature 3: Hitung Mundur Acara --}}
                <div class="card-soft p-6 rounded-2xl">
                    <div class="w-12 h-12 rounded-xl bg-[#F2EBD9] text-[#343D35] flex items-center justify-center text-xl mb-5 border border-[#E6DEC8]">
                        &#9203;
                    </div>
                    <h3 class="font-bold text-lg text-[#343D35] mb-2">Hitung Mundur Acara</h3>
                    <p class="text-sm text-[#343D35]/70 leading-relaxed">
                        Countdown timer real-time pengingat hari bahagia menuju momen sakral akad nikah dan resepsi.
                    </p>
                </div>

                {{-- Feature 4: Navigasi Peta Lokasi --}}
                <div class="card-soft p-6 rounded-2xl">
                    <div class="w-12 h-12 rounded-xl bg-[#F2EBD9] text-[#343D35] flex items-center justify-center text-xl mb-5 border border-[#E6DEC8]">
                        &#128506;
                    </div>
                    <h3 class="font-bold text-lg text-[#343D35] mb-2">Navigasi Peta Lokasi</h3>
                    <p class="text-sm text-[#343D35]/70 leading-relaxed">
                        Terintegrasi Google Maps satu klik agar tamu undangan dapat dengan mudah menemukan lokasi venue acara.
                    </p>
                </div>

                {{-- Feature 5: Galeri Foto & Video --}}
                <div class="card-soft p-6 rounded-2xl">
                    <div class="w-12 h-12 rounded-xl bg-[#F2EBD9] text-[#343D35] flex items-center justify-center text-xl mb-5 border border-[#E6DEC8]">
                        &#128247;
                    </div>
                    <h3 class="font-bold text-lg text-[#343D35] mb-2">Galeri Foto &amp; Video</h3>
                    <p class="text-sm text-[#343D35]/70 leading-relaxed">
                        Tampilkan momen pre-wedding terindah dalam layout galeri foto estetik serta video cinematic kisah cinta Anda.
                    </p>
                </div>

                {{-- Feature 6: Amplop Digital & Kado --}}
                <div class="card-soft p-6 rounded-2xl">
                    <div class="w-12 h-12 rounded-xl bg-[#F2EBD9] text-[#343D35] flex items-center justify-center text-xl mb-5 border border-[#E6DEC8]">
                        &#127873;
                    </div>
                    <h3 class="font-bold text-lg text-[#343D35] mb-2">Amplop Digital (Bank/Qris)</h3>
                    <p class="text-sm text-[#343D35]/70 leading-relaxed">
                        Fitur kirim kado cashless dan nomor rekening bank dengan tombol praktis salin nomor rekening sekali klik.
                    </p>
                </div>

                {{-- Feature 7: RSVP & Ucapan Doa --}}
                <div class="card-soft p-6 rounded-2xl">
                    <div class="w-12 h-12 rounded-xl bg-[#F2EBD9] text-[#343D35] flex items-center justify-center text-xl mb-5 border border-[#E6DEC8]">
                        &#128172;
                    </div>
                    <h3 class="font-bold text-lg text-[#343D35] mb-2">RSVP &amp; Buku Tamu Real-time</h3>
                    <p class="text-sm text-[#343D35]/70 leading-relaxed">
                        Tamu dapat mengonfirmasi kehadiran serta menuliskan doa dan ucapan selamat secara langsung di halaman undangan.
                    </p>
                </div>

                {{-- Feature 8: Masa Aktif Selamanya --}}
                <div class="card-soft p-6 rounded-2xl">
                    <div class="w-12 h-12 rounded-xl bg-[#F2EBD9] text-[#343D35] flex items-center justify-center text-xl mb-5 border border-[#E6DEC8]">
                        &#8734;
                    </div>
                    <h3 class="font-bold text-lg text-[#343D35] mb-2">Masa Aktif Selamanya</h3>
                    <p class="text-sm text-[#343D35]/70 leading-relaxed">
                        Undangan pernikahan Anda tetap aktif dan tersimpan rapi selamanya sebagai album kenangan digital perjalanan cinta.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- ==================== SECTION KATALOG TEMA ==================== --}}
    <section id="katalog" class="py-20 lg:py-28 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Header Katalog --}}
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="inline-block text-xs font-bold uppercase tracking-widest text-[#C5A880] mb-2.5">Koleksi Desain Pilihan</span>
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-[#343D35] tracking-tight">
                    Katalog Tema Undangan Premium
                </h2>
                <p class="text-[#343D35]/70 text-base sm:text-lg mt-4">
                    Pilih tema yang mewakili karakter dan konsep pernikahan impian Anda. Seluruh desain responsif dan elegan di semua perangkat.
                </p>
            </div>

            {{-- Filter Tabs (Alpine.js) --}}
            <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 mb-14">
                @foreach(['Semua', 'Wedding', 'Engagement', 'Khitan', 'Populer', 'Terbaru'] as $filterTab)
                    <button type="button"
                            @click="activeFilter = '{{ $filterTab }}'"
                            :class="activeFilter === '{{ $filterTab }}' ? 'bg-[#343D35] text-[#FAF6EC] shadow-md border-[#343D35]' : 'bg-[#FAF6EC] text-[#343D35] hover:bg-[#E6DEC8] border-[#E6DEC8]'"
                            class="px-5 py-2 rounded-full text-xs sm:text-sm font-semibold border transition-all duration-200">
                        {{ $filterTab }}
                    </button>
                @endforeach
            </div>

            {{-- Grid Kartu Katalog Tema --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($themes as $theme)
                    @php
                        // Menentukan demo invitation slug spesifik per tema
                        $demoSlug = match ($theme->slug) {
                            'modern-minimalist' => 'modern-minimalist',
                            'summer-rustic' => 'summer-rustic',
                            'leafy-botanical' => 'zian-sahri',
                            'heritage-gold' => 'heritage-gold',
                            default => (optional($theme->invitations->first())->slug ?? 'zian-sahri'),
                        };
                        $waText = urlencode("Halo Admin GA Digital, saya tertarik untuk memesan undangan digital dengan tema '{$theme->name}' (Rp " . number_format($theme->price, 0, ',', '.') . "). Mohon info detail dan langkah pemesanannya ya!");
                        $originalPrice = $theme->price * 1.35; // simulasi harga coret normal
                    @endphp

                    <div class="card-soft rounded-3xl overflow-hidden flex flex-col catalog-img-container group"
                         x-show="activeFilter === 'Semua' || activeFilter === '{{ $theme->category }}' || activeFilter === '{{ $theme->badge }}' || '{{ $theme->name }}'.toLowerCase().includes(activeFilter.toLowerCase())"
                         x-transition>

                        {{-- Thumbnail Container dengan Zoom Effect --}}
                        <div class="relative aspect-[3/4] overflow-hidden bg-[#E6DEC8]">
                            <img src="{{ $theme->thumbnail }}"
                                 alt="Thumbnail Tema {{ $theme->name }}"
                                 class="w-full h-full object-cover catalog-thumb"
                                 loading="lazy" />

                            {{-- Overlay Gradient --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-[#343D35]/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            {{-- Badge Tema (Populer / Terbaru) --}}
                            @if($theme->badge)
                                <div class="absolute top-4 left-4 z-10">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-[#343D35] text-[#FAF6EC] shadow-md border border-[#FAF6EC]/20">
                                        @if($theme->badge === 'Populer')
                                            <span class="text-amber-400">&#9733;</span>
                                        @else
                                            <span class="text-emerald-400">&#10024;</span>
                                        @endif
                                        {{ $theme->badge }}
                                    </span>
                                </div>
                            @endif

                            {{-- Category Pill --}}
                            <div class="absolute top-4 right-4 z-10">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#FAF6EC]/90 text-[#343D35] backdrop-blur-sm border border-[#E6DEC8]">
                                    {{ $theme->category }}
                                </span>
                            </div>

                            {{-- Quick Hover Action Button --}}
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                                <a href="{{ route('demo.show', ['slug' => $demoSlug, 'to' => 'Nama Tamu']) }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="bg-white/95 text-[#343D35] px-4 py-2 rounded-full text-xs font-bold shadow-lg hover:bg-white hover:scale-105 transition-all">
                                    Lihat Demo Lengkap &rarr;
                                </a>
                            </div>
                        </div>

                        {{-- Detail Tema & Tombol Aksi --}}
                        <div class="p-5 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="font-display font-bold text-lg text-[#343D35] group-hover:text-[#C5A880] transition-colors">
                                    {{ $theme->name }}
                                </h3>

                                {{-- Harga Coret + Harga Diskon --}}
                                <div class="flex items-baseline gap-2 mt-1 mb-4">
                                    <span class="text-xs text-[#343D35]/50 line-through">
                                        Rp {{ number_format($originalPrice, 0, ',', '.') }}
                                    </span>
                                    <span class="font-bold text-base sm:text-lg text-[#343D35]">
                                        Rp {{ number_format($theme->price, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>

                            {{-- Dua Tombol Aksi Wajib --}}
                            <div class="grid grid-cols-2 gap-2 pt-2 border-t border-[#E6DEC8]/60">
                                {{-- Tombol 1: Lihat Demo --}}
                                <a href="{{ route('demo.show', ['slug' => $demoSlug, 'to' => 'Nama Tamu']) }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="inline-flex items-center justify-center gap-1.5 py-2.5 px-3 rounded-xl text-xs font-semibold bg-[#FAF6EC] text-[#343D35] border border-[#E6DEC8] hover:bg-[#E6DEC8] transition-colors text-center">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <span>Demo</span>
                                </a>

                                {{-- Tombol 2: Pesan Sekarang via WhatsApp --}}
                                <a href="https://wa.me/6285749739342?text={{ $waText }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="inline-flex items-center justify-center gap-1.5 py-2.5 px-3 rounded-xl text-xs font-semibold bg-[#343D35] text-[#FAF6EC] hover:bg-[#272e28] transition-colors text-center shadow-sm">
                                    <svg class="w-3.5 h-3.5 text-[#C5A880]" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                                    </svg>
                                    <span>Pesan</span>
                                </a>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-4 text-center py-16 bg-[#FAF6EC] rounded-3xl border border-[#E6DEC8]">
                        <p class="text-base text-[#343D35]/70">Belum ada tema yang ditambahkan. Silakan jalankan database seeder.</p>
                    </div>
                @endforelse
            </div>

            {{-- Custom Request Banner --}}
            <div class="mt-16 bg-[#FAF6EC] rounded-3xl p-8 sm:p-10 border border-[#E6DEC8] flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h3 class="font-display font-bold text-2xl text-[#343D35]">Ingin Desain Custom Sesuai Keinginan Anda?</h3>
                    <p class="text-sm text-[#343D35]/75 mt-1.5 max-w-xl">
                        Kami juga melayani pembuatan desain undangan digital eksklusif dari nol sesuai tema dekorasi atau adat pernikahan Anda.
                    </p>
                </div>
                <a href="https://wa.me/6285749739342?text=Halo%20Admin%20GA%20Digital%2C%20saya%20tertarik%20untuk%20pembuatan%20desain%20undangan%20digital%20custom%20sesuai%20konsep%20saya.%20Mohon%20infonya%20ya."
                   target="_blank" rel="noopener noreferrer"
                   class="shrink-0 inline-flex items-center gap-2 bg-[#343D35] text-[#F2EBD9] px-7 py-3.5 rounded-full text-sm font-semibold hover:bg-[#272e28] transition-all">
                    <span>Konsultasi Desain Custom</span>
                    &rarr;
                </a>
            </div>
        </div>
    </section>

    {{-- ==================== SECTION ALUR PEMESANAN (4 LANGKAH MUDAH) ==================== --}}
    <section id="cara-order" class="py-20 lg:py-28 bg-[#FAF6EC] border-y border-[#E6DEC8]/60 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block text-xs font-bold uppercase tracking-widest text-[#C5A880] mb-2.5">Cara Pemesanan</span>
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-[#343D35] tracking-tight">
                    4 Langkah Mudah Memiliki Undangan Digital
                </h2>
                <p class="text-[#343D35]/70 text-base sm:text-lg mt-4">
                    Tanpa proses rumit, undangan Anda langsung siap disebarkan ke keluarga dan sahabat dalam hitungan jam.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 relative">
                {{-- Step 1 --}}
                <div class="bg-[#F2EBD9] p-8 rounded-3xl border border-[#E6DEC8] relative flex flex-col justify-between">
                    <span class="font-display text-5xl font-bold text-[#C5A880]/35 select-none">01</span>
                    <div class="mt-4">
                        <h3 class="font-bold text-lg text-[#343D35] mb-2">Pilih Tema Favorit</h3>
                        <p class="text-sm text-[#343D35]/75 leading-relaxed">
                            Pilih katalog tema yang paling Anda sukai, lalu klik tombol pesan untuk terhubung langsung dengan tim kami.
                        </p>
                    </div>
                </div>

                {{-- Step 2 --}}
                <div class="bg-[#F2EBD9] p-8 rounded-3xl border border-[#E6DEC8] relative flex flex-col justify-between">
                    <span class="font-display text-5xl font-bold text-[#C5A880]/35 select-none">02</span>
                    <div class="mt-4">
                        <h3 class="font-bold text-lg text-[#343D35] mb-2">Kirim Data Mempelai</h3>
                        <p class="text-sm text-[#343D35]/75 leading-relaxed">
                            Isi formulir data acara, nama kedua mempelai, orang tua, waktu, lokasi maps, galeri foto, serta lagu pengiring.
                        </p>
                    </div>
                </div>

                {{-- Step 3 --}}
                <div class="bg-[#F2EBD9] p-8 rounded-3xl border border-[#E6DEC8] relative flex flex-col justify-between">
                    <span class="font-display text-5xl font-bold text-[#C5A880]/35 select-none">03</span>
                    <div class="mt-4">
                        <h3 class="font-bold text-lg text-[#343D35] mb-2">Proses Pembuatan</h3>
                        <p class="text-sm text-[#343D35]/75 leading-relaxed">
                            Tim kami memproses undangan dalam waktu 1x24 jam. Anda dapat melakukan revisi hingga hasil benar-benar sempurna.
                        </p>
                    </div>
                </div>

                {{-- Step 4 --}}
                <div class="bg-[#F2EBD9] p-8 rounded-3xl border border-[#E6DEC8] relative flex flex-col justify-between">
                    <span class="font-display text-5xl font-bold text-[#C5A880]/35 select-none">04</span>
                    <div class="mt-4">
                        <h3 class="font-bold text-lg text-[#343D35] mb-2">Siap Dibagikan!</h3>
                        <p class="text-sm text-[#343D35]/75 leading-relaxed">
                            Undangan digital langsung aktif dengan domain unik dan generator nama tamu otomatis siap disebar via WhatsApp.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== SECTION TESTIMONI KLIEN (REFERENSI BYAADIGITALL) ==================== --}}
    <section id="testimoni" class="py-20 lg:py-28 bg-[#F2EBD9] relative overflow-hidden" x-data="{ showModal: false, rating: 5, previewUrl: null }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            {{-- Header Section --}}
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-6">
                <div>
                    <span class="inline-block text-xs font-bold uppercase tracking-widest text-[#C5A880] mb-2.5">Testimoni</span>
                    <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-[#343D35] tracking-tight">
                        Mereka Yang Telah Berbahagia
                    </h2>
                    <p class="text-[#343D35]/75 text-base sm:text-lg mt-3 max-w-2xl">
                        Cerita tulus dan pengalaman nyata dari para pengantin yang telah mempercayakan undangan digitalnya bersama GA DIGITAL.
                    </p>
                </div>

                <div>
                    <button @click="showModal = true"
                            type="button"
                            class="inline-flex items-center gap-2 bg-[#343D35] text-[#F2EBD9] hover:bg-[#465247] px-6 py-3 rounded-full text-sm font-semibold transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5 cursor-pointer">
                        <svg class="w-4 h-4 text-[#C5A880]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>+ Beri Testimoni</span>
                    </button>
                </div>
            </div>

            {{-- 3 Kartu Bar Statistik Testimoni --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 lg:gap-6 max-w-4xl mx-auto my-8 px-4">
                {{-- Kartu 1 (Undangan Dibuat) --}}
                <div class="bg-[#FAF6EC] border border-[#343D35]/10 rounded-2xl py-6 px-4 text-center shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="font-display font-bold text-2xl lg:text-3xl text-[#343D35]">
                        {{ $totalCreated }}+
                    </div>
                    <div class="text-xs lg:text-sm text-[#343D35]/70 mt-1 font-medium">
                        Undangan Dibuat
                    </div>
                </div>

                {{-- Kartu 2 (Undangan Disebar) --}}
                <div class="bg-[#FAF6EC] border border-[#343D35]/10 rounded-2xl py-6 px-4 text-center shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="font-display font-bold text-2xl lg:text-3xl text-[#343D35]">
                        {{ $totalShared }}+
                    </div>
                    <div class="text-xs lg:text-sm text-[#343D35]/70 mt-1 font-medium">
                        Undangan Disebar
                    </div>
                </div>

                {{-- Kartu 3 (Total Testimoni - Realtime) --}}
                <div class="bg-[#FAF6EC] border border-[#343D35]/10 rounded-2xl py-6 px-4 text-center shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="font-display font-bold text-2xl lg:text-3xl text-[#343D35]">
                        {{ $totalTestimonials }}+
                    </div>
                    <div class="text-xs lg:text-sm text-[#343D35]/70 mt-1 font-medium">
                        Testimoni Bahagia
                    </div>
                </div>
            </div>

            {{-- Flash Notification Success --}}
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition
                     class="mb-8 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-3">
                        <span class="w-8 h-8 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-sm">&#10003;</span>
                        <span class="text-sm font-medium">{{ session('success') }}</span>
                    </div>
                    <button @click="show = false" type="button" class="text-emerald-600 hover:text-emerald-800 text-lg font-bold">&times;</button>
                </div>
            @endif

            {{-- Validation Error Alert --}}
            @if($errors->any())
                <div x-data="{ show: true }" x-show="show" x-transition
                     class="mb-8 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 shadow-sm">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm font-bold">Mohon periksa data formulir:</span>
                        <button @click="show = false" type="button" class="text-rose-600 hover:text-rose-800 font-bold">&times;</button>
                    </div>
                    <ul class="list-disc list-inside text-xs space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Grid Kartu Testimoni (Portrait 4:5 Card - byaadigitall.com layout) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($testimonials as $item)
                    <div class="bg-[#FAF6EC] rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-[#E6DEC8]/80 flex flex-col group">
                        {{-- Bagian Atas: Foto Pasangan (h-64 sm:h-72 object-cover) --}}
                        <div class="relative h-64 sm:h-72 w-full overflow-hidden bg-[#E6DEC8]">
                            <img src="{{ str_starts_with($item->photo_url, 'http') || str_starts_with($item->photo_url, '/') ? $item->photo_url : asset($item->photo_url) }}"
                                 alt="Foto Pengantin {{ $item->couple_name }}"
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                 loading="lazy" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#FAF6EC] via-transparent to-transparent opacity-60"></div>
                        </div>

                        {{-- Bagian Bawah: Informasi Pasangan & Review --}}
                        <div class="p-6 flex-1 flex flex-col justify-between -mt-4 relative z-10 bg-[#FAF6EC]">
                            <div>
                                {{-- Bintang Rating (Warna Emas/Kuning #F59E0B) --}}
                                <div class="flex items-center gap-1 text-[#F59E0B] mb-3">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $item->rating)
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @endif
                                    @endfor
                                    <span class="text-xs font-bold text-[#343D35]/80 ml-1.5">{{ number_format($item->rating, 1) }}</span>
                                </div>

                                {{-- Isi Review / Ulasan --}}
                                <p class="text-sm text-[#343D35]/85 leading-relaxed italic mb-6">
                                    &ldquo;{{ $item->review }}&rdquo;
                                </p>
                            </div>

                            {{-- Info Pasangan & Label Customer --}}
                            <div class="pt-4 border-t border-[#E6DEC8] flex items-center justify-between">
                                <div>
                                    <h4 class="font-display font-bold text-lg text-[#343D35] tracking-tight">
                                        {{ $item->couple_name }}
                                    </h4>
                                    <span class="text-[11px] font-semibold text-[#C5A880] tracking-wider uppercase">
                                        Customer
                                    </span>
                                </div>
                                <div class="text-[11px] text-[#343D35]/50">
                                    {{ $item->created_at ? $item->created_at->diffForHumans() : 'Baru saja' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 bg-[#FAF6EC] rounded-2xl border border-[#E6DEC8]">
                        <p class="text-[#343D35]/70">Belum ada testimoni. Jadilah pasangan pertama yang membagikan momen bahagia Anda!</p>
                    </div>
                @endforelse
            </div>

        </div>

        {{-- ==================== MODAL POP-UP TAMBAH TESTIMONI ==================== --}}
        <div x-show="showModal"
             x-cloak
             @keydown.escape.window="showModal = false"
             class="fixed inset-0 z-50 overflow-y-auto"
             aria-labelledby="modal-title" role="dialog" aria-modal="true">

            {{-- Backdrop --}}
            <div x-show="showModal"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="showModal = false"
                 class="fixed inset-0 bg-black/60 backdrop-blur-xs transition-opacity"></div>

            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div x-show="showModal"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     @click.stop
                     class="relative transform overflow-hidden rounded-3xl bg-[#FAF6EC] text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-[#E6DEC8] p-6 sm:p-8">

                    {{-- Modal Header --}}
                    <div class="flex items-center justify-between pb-4 border-b border-[#E6DEC8]">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-widest text-[#C5A880]">Bagikan Cerita Anda</span>
                            <h3 class="font-display font-bold text-2xl text-[#343D35]" id="modal-title">Beri Testimoni</h3>
                        </div>
                        <button @click="showModal = false"
                                type="button"
                                class="w-8 h-8 rounded-full bg-[#E6DEC8]/60 text-[#343D35] hover:bg-[#E6DEC8] flex items-center justify-center font-bold text-lg transition cursor-pointer">
                            &times;
                        </button>
                    </div>

                    {{-- Modal Form --}}
                    <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-5">
                        @csrf
                        <input type="text" name="website_hp" value="" class="hidden" tabindex="-1" autocomplete="off" style="display:none;" />

                        {{-- Nama Pasangan --}}
                        <div>
                            <label for="couple_name" class="block text-xs font-bold text-[#343D35] uppercase tracking-wider mb-2">
                                Nama Pasangan (Suami &amp; Istri) <span class="text-rose-500">*</span>
                            </label>
                            <input type="text"
                                   id="couple_name"
                                   name="couple_name"
                                   placeholder="Contoh: Dean & Ganti"
                                   required
                                   maxlength="100"
                                   class="w-full px-4 py-3 rounded-xl bg-white border border-[#E6DEC8] text-[#343D35] focus:outline-none focus:ring-2 focus:ring-[#C5A880] text-sm" />
                        </div>

                        {{-- Rating Bintang Interaktif --}}
                        <div>
                            <label class="block text-xs font-bold text-[#343D35] uppercase tracking-wider mb-2">
                                Penilaian / Rating <span class="text-rose-500">*</span>
                            </label>
                            <div class="flex items-center gap-2">
                                <template x-for="star in [1, 2, 3, 4, 5]" :key="star">
                                    <button type="button"
                                            @click="rating = star"
                                            class="p-1 text-2xl transition-transform hover:scale-110 focus:outline-none cursor-pointer"
                                            :class="star <= rating ? 'text-[#F59E0B]' : 'text-gray-300'">
                                        &#9733;
                                    </button>
                                </template>
                                <span class="text-xs font-bold text-[#343D35]/70 ml-2" x-text="rating + ' Bintang'"></span>
                                <input type="hidden" name="rating" :value="rating" />
                            </div>
                        </div>

                        {{-- Upload Foto Pasangan --}}
                        <div>
                            <label for="photo" class="block text-xs font-bold text-[#343D35] uppercase tracking-wider mb-2">
                                Upload Foto Pasangan (Opsional)
                            </label>
                            <input type="file"
                                   id="photo"
                                   name="photo"
                                   accept="image/png,image/jpeg,image/jpg,image/webp"
                                   @change="if ($event.target.files.length) { previewUrl = URL.createObjectURL($event.target.files[0]) }"
                                   class="w-full text-xs text-[#343D35] file:mr-4 file:py-2.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-[#343D35] file:text-[#F2EBD9] hover:file:bg-[#465247] file:cursor-pointer cursor-pointer border border-[#E6DEC8] rounded-xl bg-white p-2" />
                            <span class="block text-[11px] text-[#343D35]/60 mt-1">Maks. 2MB (JPG, PNG, WEBP). Jika kosong, kami gunakan foto pernikahan default estetik.</span>

                            {{-- Preview Image --}}
                            <template x-if="previewUrl">
                                <div class="mt-3 flex items-center gap-3">
                                    <img :src="previewUrl" alt="Preview Foto" class="w-16 h-16 object-cover rounded-xl border border-[#E6DEC8]" />
                                    <span class="text-xs text-[#343D35]/70">Pratinjau foto terpilih</span>
                                </div>
                            </template>
                        </div>

                        {{-- Isi Ulasan --}}
                        <div>
                            <label for="review" class="block text-xs font-bold text-[#343D35] uppercase tracking-wider mb-2">
                                Ulasan / Testimoni <span class="text-rose-500">*</span>
                            </label>
                            <textarea id="review"
                                      name="review"
                                      rows="4"
                                      placeholder="Ceritakan pengalaman Anda membuat undangan digital pernikahan di GA DIGITAL..."
                                      required
                                      maxlength="500"
                                      class="w-full px-4 py-3 rounded-xl bg-white border border-[#E6DEC8] text-[#343D35] focus:outline-none focus:ring-2 focus:ring-[#C5A880] text-sm resize-none"></textarea>
                        </div>

                        {{-- Tombol Submit --}}
                        <div class="pt-2 flex items-center justify-end gap-3">
                            <button @click="showModal = false"
                                    type="button"
                                    class="px-5 py-2.5 rounded-full border border-[#343D35]/30 text-[#343D35] text-sm font-semibold hover:bg-black/5 transition cursor-pointer">
                                Batal
                            </button>
                            <button type="submit"
                                    class="px-6 py-2.5 rounded-full bg-[#343D35] text-[#F2EBD9] hover:bg-[#465247] text-sm font-semibold transition shadow-md cursor-pointer">
                                Kirim Testimoni
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== SECTION PAKET HARGA (PRICING CARDS - DARK THEME) ==================== --}}
    <section id="harga" class="py-20 lg:py-28 bg-[#343D35] text-[#FAF6EC] relative overflow-hidden">
        {{-- Background Accents --}}
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#C5A880]/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-[#C5A880]/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            {{-- Header Pricing --}}
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block text-xs font-bold uppercase tracking-widest text-[#C5A880] mb-2.5">Pilihan Paket Terjangkau</span>
                <h2 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-[#FAF6EC]">
                    Investasi Terbaik untuk Momen Bahagia Anda
                </h2>
                <p class="text-[#FAF6EC]/70 text-base sm:text-lg mt-4">
                    Harga transparan tanpa biaya tersembunyi. Sekali bayar, undangan aktif selamanya dengan revisi sampai puas.
                </p>
            </div>

            {{-- 3 Kartu Paket --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">

                {{-- Paket 1: Hemat --}}
                <div class="bg-[#FAF6EC]/5 backdrop-blur-md rounded-3xl p-8 border border-[#FAF6EC]/15 flex flex-col justify-between hover:border-[#C5A880]/50 transition-all">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-display font-bold text-2xl text-[#FAF6EC]">Paket Hemat</h3>
                            <span class="text-xs bg-[#FAF6EC]/10 text-[#FAF6EC] px-3 py-1 rounded-full">Basic</span>
                        </div>
                        <p class="text-xs text-[#FAF6EC]/65 mb-6">Pilihan praktis untuk acara pernikahan intim atau sederhana.</p>

                        <div class="mb-8">
                            <span class="text-xs text-[#FAF6EC]/50 line-through block">Rp 149.000</span>
                            <div class="flex items-baseline gap-1">
                                <span class="text-sm font-semibold">Rp</span>
                                <span class="font-display text-4xl font-bold text-[#FAF6EC]">99.000</span>
                                <span class="text-xs text-[#FAF6EC]/60">/ acara</span>
                            </div>
                        </div>

                        <ul class="space-y-3.5 text-sm text-[#FAF6EC]/80 mb-8 border-t border-[#FAF6EC]/10 pt-6">
                            <li class="flex items-center gap-3">
                                <span class="text-[#C5A880] font-bold">&#10003;</span>
                                <span>Pilihan 1 Tema Desain</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#C5A880] font-bold">&#10003;</span>
                                <span>Nama Tamu Unlimited</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#C5A880] font-bold">&#10003;</span>
                                <span>Hitung Mundur &amp; Google Maps</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#C5A880] font-bold">&#10003;</span>
                                <span>Buku Tamu &amp; RSVP Online</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#C5A880] font-bold">&#10003;</span>
                                <span>Masa Aktif 3 Bulan</span>
                            </li>
                            <li class="flex items-center gap-3 text-[#FAF6EC]/40">
                                <span>&times;</span>
                                <span class="line-through">Amplop Digital (Bank/Qris)</span>
                            </li>
                        </ul>
                    </div>

                    <a href="https://wa.me/6285749739342?text=Halo%20Admin%20GA%20Digital%2C%20saya%20ingin%20memesan%20Paket%20Hemat%20Undangan%20Digital%20(Rp%2099.000).%20Bagaimana%20langkah%20selanjutnya%20kak%3F"
                       target="_blank" rel="noopener noreferrer"
                       class="w-full block py-3.5 rounded-full text-center text-sm font-semibold bg-[#FAF6EC]/15 hover:bg-[#FAF6EC]/25 text-[#FAF6EC] border border-[#FAF6EC]/20 transition-all">
                        Pilih Paket Hemat
                    </a>
                </div>

                {{-- Paket 2: Spesial (HIGHLIGHT / PALING LARIS) --}}
                <div class="card-special rounded-3xl p-8 sm:p-10 text-[#343D35] flex flex-col justify-between relative transform lg:-translate-y-4">
                    {{-- Badge Paling Laris --}}
                    <div class="absolute -top-3.5 left-1/2 -translate-x-1/2">
                        <span class="bg-[#343D35] text-[#FAF6EC] px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg border border-[#C5A880]">
                            &#9733; Paling Laris
                        </span>
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-display font-bold text-2xl text-[#343D35]">Paket Spesial</h3>
                            <span class="text-xs bg-[#C5A880]/30 text-[#343D35] font-bold px-3 py-1 rounded-full">Rekomendasi</span>
                        </div>
                        <p class="text-xs text-[#343D35]/70 mb-6">Paket lengkap terlengkap yang paling banyak dipilih pasangan pengantin.</p>

                        <div class="mb-8">
                            <span class="text-xs text-[#343D35]/50 line-through block">Rp 220.000</span>
                            <div class="flex items-baseline gap-1">
                                <span class="text-sm font-semibold">Rp</span>
                                <span class="font-display text-4xl sm:text-5xl font-bold text-[#343D35]">149.000</span>
                                <span class="text-xs text-[#343D35]/70 font-semibold">/ acara</span>
                            </div>
                        </div>

                        <ul class="space-y-3.5 text-sm text-[#343D35]/85 mb-8 border-t border-[#E6DEC8] pt-6 font-medium">
                            <li class="flex items-center gap-3">
                                <span class="text-[#343D35] font-bold">&#10003;</span>
                                <span>Bebas Pilih Semua Tema Desain</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#343D35] font-bold">&#10003;</span>
                                <span>Nama Tamu Tanpa Batas</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#343D35] font-bold">&#10003;</span>
                                <span>Musik Romantis Autoplay</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#343D35] font-bold">&#10003;</span>
                                <span>Galeri 10 Foto + Cerita Cinta</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#343D35] font-bold">&#10003;</span>
                                <span>Amplop Digital &amp; Hadiah Bank</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#343D35] font-bold">&#10003;</span>
                                <span>Masa Aktif Selamanya</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#343D35] font-bold">&#10003;</span>
                                <span>Revisi Bebas Sampai Sesuai</span>
                            </li>
                        </ul>
                    </div>

                    <a href="https://wa.me/6285749739342?text=Halo%20Admin%20GA%20Digital%2C%20saya%20ingin%20memesan%20Paket%20Spesial%20Undangan%20Digital%20Paling%20Laris%20(Rp%20149.000).%20Bagaimana%20cara%20order%20dan%20prosesnya%20kak%3F"
                       target="_blank" rel="noopener noreferrer"
                       class="w-full block py-4 rounded-full text-center text-sm font-bold bg-[#343D35] hover:bg-[#272e28] text-[#FAF6EC] shadow-xl hover:shadow-2xl transition-all">
                        Pesan Paket Spesial Sekarang &rarr;
                    </a>
                </div>

                {{-- Paket 3: Eksklusif --}}
                <div class="bg-[#FAF6EC]/5 backdrop-blur-md rounded-3xl p-8 border border-[#FAF6EC]/15 flex flex-col justify-between hover:border-[#C5A880]/50 transition-all">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-display font-bold text-2xl text-[#FAF6EC]">Paket Eksklusif</h3>
                            <span class="text-xs bg-[#C5A880]/20 text-[#C5A880] px-3 py-1 rounded-full">VIP Custom</span>
                        </div>
                        <p class="text-xs text-[#FAF6EC]/65 mb-6">Solusi istimewa dengan custom domain &amp; fitur video cinematic.</p>

                        <div class="mb-8">
                            <span class="text-xs text-[#FAF6EC]/50 line-through block">Rp 350.000</span>
                            <div class="flex items-baseline gap-1">
                                <span class="text-sm font-semibold">Rp</span>
                                <span class="font-display text-4xl font-bold text-[#FAF6EC]">249.000</span>
                                <span class="text-xs text-[#FAF6EC]/60">/ acara</span>
                            </div>
                        </div>

                        <ul class="space-y-3.5 text-sm text-[#FAF6EC]/80 mb-8 border-t border-[#FAF6EC]/10 pt-6">
                            <li class="flex items-center gap-3">
                                <span class="text-[#C5A880] font-bold">&#10003;</span>
                                <span>Semua Fitur Paket Spesial</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#C5A880] font-bold">&#10003;</span>
                                <span>Custom Subdomain Nama Pasangan</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#C5A880] font-bold">&#10003;</span>
                                <span>Galeri Foto &amp; Video Tak Terbatas</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#C5A880] font-bold">&#10003;</span>
                                <span>Integrasi Live Streaming YouTube</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#C5A880] font-bold">&#10003;</span>
                                <span>Prioritas Pengerjaan 6 Jam</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="text-[#C5A880] font-bold">&#10003;</span>
                                <span>Dedicated Admin Pendamping</span>
                            </li>
                        </ul>
                    </div>

                    <a href="https://wa.me/6285749739342?text=Halo%20Admin%20GA%20Digital%2C%20saya%20ingin%20memesan%20Paket%20Eksklusif%20VIP%20Undangan%20Digital%20(Rp%20249.000).%20Mohon%20panduan%20pemesanannya%20kak."
                       target="_blank" rel="noopener noreferrer"
                       class="w-full block py-3.5 rounded-full text-center text-sm font-semibold bg-[#FAF6EC]/15 hover:bg-[#FAF6EC]/25 text-[#FAF6EC] border border-[#FAF6EC]/20 transition-all">
                        Pilih Paket Eksklusif
                    </a>
                </div>

            </div>
        </div>
    </section>



    {{-- ==================== CTA SECTION ==================== --}}
    <section class="py-16 bg-[#FAF6EC] border-t border-[#E6DEC8]/60">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-display text-3xl sm:text-4xl font-bold text-[#343D35]">
                Siap Mewujudkan Undangan Pernikahan Impian Anda?
            </h2>
            <p class="text-base text-[#343D35]/75 mt-3 max-w-xl mx-auto">
                Konsultasikan konsep undangan pernikahan digital Anda sekarang secara gratis bersama tim desainer kami.
            </p>
            <div class="mt-8">
                <a href="https://wa.me/6285749739342?text=Halo%20Admin%20GA%20Digital%2C%20saya%20ingin%20konsultasi%20dan%20membuat%20undangan%20pernikahan%20digital%20sekarang."
                   target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2.5 bg-[#343D35] text-[#F2EBD9] px-9 py-4 rounded-full text-base font-semibold hover:bg-[#272e28] shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all">
                    <span>Chat WhatsApp Kami Sekarang</span>
                    &rarr;
                </a>
            </div>
        </div>
    </section>

    {{-- ==================== FOOTER LENGKAP ==================== --}}
    <footer class="bg-[#343D35] text-[#FAF6EC] pt-16 pb-12 border-t border-[#FAF6EC]/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-[#FAF6EC]/15">

                {{-- Brand Kolom --}}
                <div class="lg:col-span-2">
                    <a href="{{ route('landing') }}" class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 rounded-full bg-[#FAF6EC] flex items-center justify-center text-[#343D35] font-bold">
                            <svg class="w-4 h-4 text-[#C5A880]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <span class="font-display font-bold text-xl text-[#FAF6EC]">GA DIGITAL<span class="text-[#C5A880]">.</span></span>
                    </a>
                    <p class="text-xs sm:text-sm text-[#FAF6EC]/70 leading-relaxed max-w-sm mb-6">
                        Platform jasa pembuatan undangan pernikahan digital website elegan, cepat, dan terpercaya. Membantu calon pengantin membagikan momen sakral dengan penuh kesan.
                    </p>
                    <div class="flex items-center gap-3 text-xs text-[#FAF6EC]/60">
                        <span>&copy; {{ date('Y') }} GA DIGITAL. All rights reserved.</span>
                    </div>
                </div>

                {{-- Navigasi Cepat --}}
                <div>
                    <h4 class="font-semibold text-sm text-[#FAF6EC] uppercase tracking-wider mb-4">Navigasi</h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm text-[#FAF6EC]/70">
                        <li><a href="#" class="hover:text-[#C5A880] transition-colors">Beranda</a></li>
                        <li><a href="#keunggulan" class="hover:text-[#C5A880] transition-colors">Keunggulan</a></li>
                        <li><a href="#katalog" class="hover:text-[#C5A880] transition-colors">Katalog Tema</a></li>
                        <li><a href="#cara-order" class="hover:text-[#C5A880] transition-colors">Cara Order</a></li>
                        <li><a href="#testimoni" class="hover:text-[#C5A880] transition-colors">Testimoni</a></li>
                        <li><a href="#harga" class="hover:text-[#C5A880] transition-colors">Paket Harga</a></li>
                    </ul>
                </div>

                {{-- Demo Unggulan --}}
                <div>
                    <h4 class="font-semibold text-sm text-[#FAF6EC] uppercase tracking-wider mb-4">Demo Pilihan</h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm text-[#FAF6EC]/70">
                        <li>
                            <a href="{{ route('demo.show', ['slug' => 'zian-sahri', 'to' => 'Tamu Terhormat']) }}"
                               target="_blank" class="hover:text-[#C5A880] transition-colors flex items-center gap-1.5">
                                <span>Demo Zian &amp; Sahri</span>
                                <span class="text-[10px] text-[#C5A880]">&#8599;</span>
                            </a>
                        </li>
                        <li><a href="#katalog" class="hover:text-[#C5A880] transition-colors">Tema Botanical</a></li>
                        <li><a href="#katalog" class="hover:text-[#C5A880] transition-colors">Tema Rustic</a></li>
                        <li><a href="#katalog" class="hover:text-[#C5A880] transition-colors">Tema Minimalist</a></li>
                    </ul>
                </div>

                {{-- Kontak & Bantuan --}}
                <div>
                    <h4 class="font-semibold text-sm text-[#FAF6EC] uppercase tracking-wider mb-4">Kontak Kami</h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm text-[#FAF6EC]/70">
                        <li class="flex items-start gap-2">
                            <span class="text-[#C5A880]">&#9679;</span>
                            <a href="https://wa.me/6285749739342?text=Halo%20Admin%20GA%20Digital%2C%20saya%20ingin%20bertanya%20seputar%20pembuatan%20undangan%20digital."
                               target="_blank" rel="noopener noreferrer"
                               class="hover:text-[#C5A880] transition-colors">
                                WhatsApp: +62 857-4973-9342
                            </a>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#C5A880]">&#9679;</span>
                            <span>Email: halo@gadigital.id</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-[#C5A880]">&#9679;</span>
                            <span>Jam Layanan: 08:00 - 22:00 WIB</span>
                        </li>
                    </ul>
                </div>

            </div>

            {{-- Bottom Footer Note --}}
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-[#FAF6EC]/50 gap-4">
                <p>Dibuat dengan sepenuh hati untuk hari bahagia Anda.</p>
                <div class="flex items-center gap-6">
                    <a href="#" class="hover:text-[#FAF6EC] transition-colors">Syarat &amp; Ketentuan</a>
                    <a href="#" class="hover:text-[#FAF6EC] transition-colors">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- ==================== FLOATING WHATSAPP BUTTON ==================== --}}
    <div class="fixed bottom-6 right-6 z-50 flex items-center group">
        {{-- Hover Tooltip --}}
        <div class="hidden sm:block mr-3 px-3.5 py-1.5 rounded-full bg-[#343D35] text-[#FAF6EC] text-xs font-semibold shadow-xl border border-[#FAF6EC]/15 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
            Butuh Bantuan? Chat Kami
        </div>

        {{-- WhatsApp Icon Button with Glow Effect --}}
        <a href="https://wa.me/6285749739342?text=Halo%20Admin%20GA%20Digital%2C%20saya%20mau%20tanya%20seputar%20jasa%20dan%20promo%20pembuatan%20undangan%20digital."
           target="_blank"
           rel="noopener noreferrer"
           class="relative w-14 h-14 bg-emerald-600 hover:bg-emerald-500 text-white rounded-full flex items-center justify-center shadow-2xl transition-all duration-300 hover:scale-110"
           aria-label="Hubungi kami melalui WhatsApp">

            {{-- Radar Pulse Effect --}}
            <span class="absolute inset-0 rounded-full bg-emerald-500 pulse-ring-active pointer-events-none"></span>

            <svg class="w-7 h-7 relative z-10" fill="currentColor" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
            </svg>
        </a>
    </div>

</body>
</html>