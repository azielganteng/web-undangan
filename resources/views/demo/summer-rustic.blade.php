<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Undangan Pernikahan Digital {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }} - Summer Rustic Bohemian Edition" />
    <title>The Wedding of {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }} - Summer Rustic</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    {{-- Open Graph / WhatsApp Preview --}}
    <meta property="og:type" content="article" />
    <meta property="og:title" content="The Wedding of {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}" />
    <meta property="og:description" content="{{ $guestName ? 'Kepada Yth. ' . $guestName . ', kami mengundang Anda untuk hadir di momen bahagia pernikahan kami.' : 'Kami mengundang Anda untuk hadir dan memberikan doa restu di momen bahagia pernikahan kami.' }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ $invitation->cover_image }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts: Playfair Display (Serif Elegance), Plus Jakarta Sans (Modern Sans), Caveat (Handwritten Polaroid) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        [x-cloak] { display: none !important; }

        .font-display {
            font-family: 'Playfair Display', Georgia, serif;
        }
        .font-handwriting {
            font-family: 'Caveat', cursive;
        }
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: #2E221B;
        }

        /* Polaroid Aesthetic Styling */
        .polaroid-card {
            background: #FFFFFF;
            padding: 12px 12px 20px 12px;
            box-shadow: 0 10px 25px -5px rgba(61, 46, 36, 0.15), 0 8px 10px -6px rgba(61, 46, 36, 0.1);
            border: 1px solid #EADBCE;
            transition: all 0.3s ease;
        }
        .polaroid-card:hover {
            transform: scale(1.02) rotate(0deg) !important;
            box-shadow: 0 20px 30px -10px rgba(168, 88, 56, 0.25);
        }

        /* Postcard Stamp Visual */
        .vintage-stamp {
            border: 2px dashed #A85838;
            position: relative;
        }

        /* Vinyl Spin Keyframe */
        @keyframes vinyl-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .spinning-vinyl {
            animation: vinyl-spin 4s linear infinite;
        }

        /* ============================================================
           SCROLL-DRIVEN REVEAL ANIMATIONS (Optimized for Inner Container)
           ============================================================ */
        .scroll-reveal {
            opacity: 0;
            will-change: opacity, transform;
            transition-property: opacity, transform;
            transition-duration: 0.85s;
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal-zoom {
            transform: scale(0.75);
        }
        .reveal-zoom.revealed {
            opacity: 1 !important;
            transform: scale(1) !important;
        }
        .reveal-left {
            transform: translateX(-40px);
        }
        .reveal-left.revealed {
            opacity: 1 !important;
            transform: translateX(0) !important;
        }
        .reveal-right {
            transform: translateX(40px);
        }
        .reveal-right.revealed {
            opacity: 1 !important;
            transform: translateX(0) !important;
        }
        .reveal-up {
            transform: translateY(35px);
        }
        .reveal-up.revealed {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        .delay-100 { transition-delay: 100ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }
        .delay-400 { transition-delay: 400ms; }

        @media (prefers-reduced-motion: reduce) {
            .scroll-reveal {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }

        /* Custom scrollbar for mobile container */
        #invitation-content::-webkit-scrollbar {
            width: 4px;
        }
        #invitation-content::-webkit-scrollbar-track {
            background: rgba(61, 46, 36, 0.05);
        }
        #invitation-content::-webkit-scrollbar-thumb {
            background: rgba(168, 88, 56, 0.4);
            border-radius: 9999px;
        }
    </style>
</head>
<body class="bg-[#2E221B] text-[#3D2E24] antialiased min-h-screen">

    {{-- ============================================================
         DESKTOP LEFT SIDE: Editorial Magazine Cover (Fixed 7/12)
         ============================================================ --}}
    <aside class="hidden lg:flex lg:w-7/12 fixed inset-y-0 left-0 overflow-hidden flex-col justify-between p-12 xl:p-16 text-[#FBF7F0]">
        {{-- Full-height prewedding photo with #3D2E24/75 warm rustic overlay --}}
        <div class="absolute inset-0">
            <img
                src="{{ $invitation->cover_image ?? 'https://images.unsplash.com/photo-1537633552985-df8429e8048b?auto=format&fit=crop&w=1600&q=80' }}"
                alt="Foto Prewedding {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}"
                class="w-full h-full object-cover object-center"
            />
            <div class="absolute inset-0 bg-[#3D2E24]/75 backdrop-blur-[1px]"></div>
        </div>

        {{-- Bohemian & Pampas Floral Ornaments --}}
        <div class="absolute inset-0 pointer-events-none overflow-hidden opacity-25">
            {{-- Top Left Sunburst / Botanical Arc --}}
            <svg class="absolute -top-12 -left-12 w-88 h-88 text-[#A85838]" viewBox="0 0 300 300" fill="currentColor">
                <circle cx="150" cy="150" r="140" stroke="currentColor" stroke-width="1.5" fill="none" />
                <path d="M150 20 Q175 85 150 150 Q125 85 150 20Z" opacity="0.6"/>
                <path d="M20 150 Q85 175 150 150 Q85 125 20 150Z" opacity="0.6"/>
                <path d="M150 280 Q175 215 150 150 Q125 215 150 280Z" opacity="0.6"/>
                <path d="M280 150 Q215 175 150 150 Q215 125 280 150Z" opacity="0.6"/>
            </svg>
            {{-- Bottom Right Pampas Grass Silhouettes --}}
            <svg class="absolute -bottom-16 -right-16 w-96 h-96 text-[#A85838]" viewBox="0 0 200 200" fill="none" stroke="currentColor" stroke-width="1">
                <path d="M100 200 C100 130 140 70 190 20" />
                <path d="M100 200 C80 140 60 90 20 50" />
                <path d="M100 200 C110 120 150 80 170 40" stroke-dasharray="2,3" />
                <path d="M100 200 C95 110 90 60 100 10" />
            </svg>
        </div>

        {{-- Top Badge --}}
        <div class="relative z-10">
            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full border border-[#A85838]/60 bg-[#2E221B]/60 backdrop-blur-sm text-[#FBF7F0] text-xs uppercase tracking-[0.25em] font-semibold">
                <span class="w-2 h-2 rounded-full bg-[#A85838] animate-pulse"></span>
                <span>The Bohemian Rustic Wedding</span>
            </div>
        </div>

        {{-- Editorial Typography Center --}}
        <div class="relative z-10 max-w-xl my-auto py-8">
            <p class="font-display italic text-[#A85838] text-2xl mb-3 tracking-wide">
                The Wedding Celebration of
            </p>
            <h1 class="font-display text-5xl xl:text-7xl font-bold text-[#FBF7F0] leading-none mb-6">
                {{ $invitation->groom_nickname }}
                <span class="text-[#A85838] font-display italic font-light">&amp;</span>
                {{ $invitation->bride_nickname }}
            </h1>

            {{-- Terracotta Divider --}}
            <div class="flex items-center gap-4 my-6 max-w-sm">
                <div class="h-px flex-1 bg-[#A85838]/60"></div>
                <span class="text-[#A85838] text-base">✦ 🌾 ✦</span>
                <div class="h-px flex-1 bg-[#A85838]/60"></div>
            </div>

            <p class="text-[#FBF7F0] text-xl font-medium tracking-wide mb-1">
                {{ $invitation->event_date->translatedFormat('l, d F Y') }}
            </p>
            <p class="text-[#FBF7F0]/75 text-sm mb-8 flex items-center gap-2">
                <svg class="w-4 h-4 text-[#A85838]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>{{ $invitation->venue_name }} &bull; {{ $invitation->venue_address }}</span>
            </p>

            <blockquote class="border-l-2 border-[#A85838] pl-5 text-[#FBF7F0]/85 text-sm italic leading-relaxed max-w-md bg-[#2E221B]/30 p-3 rounded-r-xl">
                "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya..."
                <footer class="text-xs text-[#A85838] mt-2 font-normal not-italic tracking-wider font-sans">— QS. Ar-Rum: 21</footer>
            </blockquote>
        </div>

        {{-- Bottom Footer --}}
        <div class="relative z-10 flex items-center justify-between text-xs text-[#FBF7F0]/70 tracking-wider">
            <a href="https://wa.me/6285749739342?text={{ urlencode('Halo Admin GA Digital, saya sedang melihat demo tema Summer Rustic (Rp 129.000) dan tertarik untuk memesan tema ini. Boleh minta info pemesanannya kak?') }}"
               target="_blank" rel="noopener noreferrer"
               class="hover:text-[#A85838] transition-colors flex items-center gap-1.5 font-semibold text-[#A85838]">
                <span>Pesan Tema Ini via WhatsApp &rarr;</span>
            </a>
            <div class="flex items-center gap-2 text-[#A85838] font-medium">
                <span>Buka undangan di layar smartphone</span>
                <span>&rarr;</span>
            </div>
        </div>
    </aside>

    {{-- ============================================================
         RIGHT SIDE VIEWPORT: Mobile Smartphone Container
         ============================================================ --}}
    <main class="w-full lg:w-5/12 lg:ml-auto min-h-screen flex justify-center items-center py-0 lg:py-6">

        {{-- Mobile Container (Phone frame) --}}
        <div
            x-data="{
                isOpen: {{ (session('success') || $errors->any()) ? 'true' : 'false' }},
                isPlaying: false,
                copied: false,
                copiedAddress: false,
                isSubmitting: false,
                wishSuccess: {{ session('success') ? 'true' : 'false' }},
                wishSuccessMessage: '{{ session('success') ?? '' }}',
                wishError: '',
                formData: {
                    guest_name: '',
                    attendance: 'hadir',
                    message: ''
                },
                wishesList: {{ \Illuminate\Support\Js::from($wishesList ?? []) }},
                countdown: {
                    days: '00',
                    hours: '00',
                    minutes: '00',
                    seconds: '00'
                },
                targetDate: new Date('{{ $invitation->event_date->format('Y-m-d H:i:s') }}').getTime(),
                init() {
                    this.startCountdown();
                    @if(session('success') || $errors->any())
                        this.isOpen = true;
                        const cover = document.getElementById('cover-overlay');
                        if (cover) cover.style.display = 'none';
                        const content = document.getElementById('invitation-content');
                        if (content) {
                            content.classList.remove('overflow-hidden');
                            content.classList.add('overflow-y-auto');
                            setTimeout(() => {
                                const rsvp = document.getElementById('rsvp-section');
                                if (rsvp) rsvp.scrollIntoView({ behavior: 'smooth' });
                            }, 350);
                        }
                    @endif
                },
                startCountdown() {
                    const update = () => {
                        const now = new Date().getTime();
                        const diff = this.targetDate - now;
                        if (diff <= 0) {
                            this.countdown = { days: '00', hours: '00', minutes: '00', seconds: '00' };
                            return;
                        }
                        const d = Math.floor(diff / (1000 * 60 * 60 * 24));
                        const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                        const s = Math.floor((diff % (1000 * 60)) / 1000);
                        this.countdown.days = String(d).padStart(2, '0');
                        this.countdown.hours = String(h).padStart(2, '0');
                        this.countdown.minutes = String(m).padStart(2, '0');
                        this.countdown.seconds = String(s).padStart(2, '0');
                    };
                    update();
                    setInterval(update, 1000);
                },
                openInvitation() {
                    this.isOpen = true;
                    const audio = document.getElementById('weddingAudio');
                    if (audio) {
                        const p = audio.play();
                        if (p !== undefined) {
                            p.then(() => { this.isPlaying = true; }).catch(() => {});
                        }
                    }
                    setTimeout(() => {
                        if (typeof initScrollAnimations === 'function') {
                            initScrollAnimations();
                        }
                    }, 350);
                    setTimeout(() => {
                        const cover = document.getElementById('cover-overlay');
                        if (cover) cover.style.display = 'none';
                    }, 1050);
                },
                toggleAudio() {
                    const audio = document.getElementById('weddingAudio');
                    if (!audio) return;
                    if (this.isPlaying) {
                        audio.pause();
                        this.isPlaying = false;
                    } else {
                        audio.play().then(() => { this.isPlaying = true; }).catch(() => {});
                    }
                },
                copyAccountNumber(text) {
                    navigator.clipboard.writeText(text).then(() => {
                        this.copied = true;
                        setTimeout(() => { this.copied = false; }, 3000);
                    });
                },
                copyAddress(text) {
                    navigator.clipboard.writeText(text).then(() => {
                        this.copiedAddress = true;
                        setTimeout(() => { this.copiedAddress = false; }, 3000);
                    });
                },
                submitWish(e) {
                    if (!this.formData.guest_name.trim() || !this.formData.message.trim()) {
                        this.wishError = 'Silakan masukkan nama dan doa restu Anda.';
                        return;
                    }

                    this.isSubmitting = true;
                    this.wishError = '';
                    this.wishSuccess = false;

                    const form = e.target;
                    const data = new FormData(form);

                    fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: data
                    })
                    .then(res => {
                        if (!res.ok) {
                            return res.json().then(errData => { throw errData; });
                        }
                        return res.json();
                    })
                    .then(json => {
                        this.isSubmitting = false;
                        this.wishSuccess = true;
                        this.wishSuccessMessage = json.message || 'Terima kasih atas ucapan dan doa restunya!';
                        
                        if (json.wish) {
                            this.wishesList.unshift({
                                id: json.wish.id,
                                guest_name: json.wish.guest_name,
                                attendance: json.wish.attendance,
                                message: json.wish.message,
                                time_ago: json.wish.created_at_human || 'Baru saja'
                            });
                        }

                        this.formData.guest_name = '';
                        this.formData.message = '';
                        this.formData.attendance = 'hadir';

                        // Smoothly keep RSVP section in view
                        const rsvp = document.getElementById('rsvp-section');
                        if (rsvp) {
                            rsvp.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }

                        setTimeout(() => {
                            this.wishSuccess = false;
                        }, 6000);
                    })
                    .catch(err => {
                        this.isSubmitting = false;
                        if (err && err.errors) {
                            const firstKey = Object.keys(err.errors)[0];
                            this.wishError = err.errors[firstKey][0];
                        } else if (err && err.message) {
                            this.wishError = err.message;
                        } else {
                            this.wishError = 'Terjadi kendala saat mengirim ucapan. Silakan coba lagi.';
                        }
                    });
                }
            }"
            class="w-full max-w-md h-screen lg:h-[94vh] bg-[#FBF7F0] text-[#3D2E24] relative shadow-2xl lg:rounded-3xl overflow-hidden"
        >
            {{-- Background Audio Element: Acoustic Breeze with local fallback --}}
            <audio
                id="weddingAudio"
                loop
                preload="auto"
                src="{{ $invitation->audio_url ?: asset('audio/acoustic-breeze.mp3') }}"
                onerror="if(this.src !== '{{ asset('audio/acoustic-breeze.mp3') }}') { this.src='{{ asset('audio/acoustic-breeze.mp3') }}'; this.play().catch(()=>{}); }"
            ></audio>

            {{-- ========================================================
                 COVER OVERLAY PEMBUKA (absolute inset-0 z-50)
                 ======================================================== --}}
            <div
                id="cover-overlay"
                class="absolute inset-0 z-50 flex flex-col justify-between p-8 bg-[#3D2E24] text-[#FBF7F0] transition-transform duration-1000 ease-in-out"
                :class="{ '-translate-y-full pointer-events-none': isOpen }"
            >
                {{-- Decorative Pampas & Warm Terracotta Background Arc --}}
                <div class="absolute inset-0 pointer-events-none overflow-hidden opacity-20">
                    <svg class="absolute -top-16 -right-16 w-64 h-64 text-[#A85838]" viewBox="0 0 200 200" fill="currentColor">
                        <circle cx="100" cy="100" r="80" stroke="currentColor" stroke-width="2" fill="none" />
                        <path d="M100 10 Q120 60 100 100 Q80 60 100 10Z" />
                        <path d="M10 100 Q60 120 100 100 Q60 80 10 100Z" />
                        <path d="M100 190 Q120 140 100 100 Q80 140 100 190Z" />
                        <path d="M190 100 Q140 120 100 100 Q140 80 190 100Z" />
                    </svg>
                    <svg class="absolute -bottom-16 -left-16 w-64 h-64 text-[#A85838]" viewBox="0 0 200 200" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M0 200 C50 140 100 90 180 50" />
                        <path d="M0 200 C30 130 60 80 120 20" />
                    </svg>
                </div>

                {{-- Header Cover --}}
                <div class="relative z-10 text-center pt-4">
                    <span class="inline-block text-[11px] uppercase tracking-[0.3em] font-medium text-[#A85838] mb-1">
                        Walimatul 'Urs
                    </span>
                    <p class="font-display italic text-xs tracking-wider text-[#FBF7F0]/70">
                        The Wedding Celebration
                    </p>
                </div>

                {{-- Center Cover Info --}}
                <div class="relative z-10 text-center my-auto py-4">
                    {{-- Rustic Wreath Floral Icon --}}
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full border border-[#A85838]/60 flex items-center justify-center text-[#A85838] shadow-inner bg-[#F5EDE3]/10">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </div>

                    {{-- Nama Pasangan --}}
                    <h2 class="font-display text-4xl sm:text-5xl font-bold tracking-tight text-[#FBF7F0] mb-2 leading-tight">
                        {{ $invitation->groom_nickname }}
                        <span class="block text-2xl sm:text-3xl font-display italic font-light text-[#A85838] my-1">&amp;</span>
                        {{ $invitation->bride_nickname }}
                    </h2>

                    {{-- Tanggal Acara --}}
                    <p class="text-sm font-medium tracking-widest uppercase text-[#FBF7F0]/90 mt-4">
                        {{ $invitation->event_date->translatedFormat('d F Y') }}
                    </p>
                    <p class="text-xs text-[#A85838] tracking-wider mt-0.5">
                        Yogyakarta, Indonesia
                    </p>

                    {{-- Kotak Nama Tamu Dinamis --}}
                    <div class="mt-8 mx-auto max-w-xs bg-[#F5EDE3]/10 border border-[#A85838]/40 rounded-2xl p-4 backdrop-blur-md shadow-lg">
                        <p class="text-[11px] text-[#FBF7F0]/70 uppercase tracking-widest mb-1.5 font-medium">
                            Kepada Yth. Bapak/Ibu/Saudara/i:
                        </p>
                        <p class="font-display text-lg font-bold text-[#FBF7F0] tracking-wide break-words">
                            {{ request('to', $guestName ?: 'Tamu Undangan') }}
                        </p>
                        <p class="text-[10px] text-[#FBF7F0]/50 italic mt-1.5">
                            *Mohon maaf apabila ada kesalahan penulisan nama/gelar
                        </p>
                    </div>
                </div>

                {{-- Footer Cover: Tombol Buka Undangan --}}
                <div class="relative z-10 text-center pb-2">
                    <button
                        id="btn-buka-undangan"
                        type="button"
                        @click="openInvitation()"
                        class="w-full bg-[#A85838] hover:bg-[#8F472C] text-white font-semibold py-3.5 px-6 rounded-full shadow-lg shadow-[#A85838]/40 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-2.5 group"
                    >
                        <svg class="w-5 h-5 text-amber-200 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="tracking-wider text-sm uppercase">Buka Undangan</span>
                    </button>
                    <p class="text-[10px] text-[#FBF7F0]/40 mt-3 tracking-wider">
                        Putar audio otomatis saat undangan dibuka
                    </p>
                </div>
            </div>

            {{-- ========================================================
                 FLOATING MUSIC CONTROLLER (Vintage Vinyl Record Style)
                 ======================================================== --}}
            <button
                type="button"
                id="music-toggle-btn"
                @click="toggleAudio()"
                class="absolute bottom-20 right-4 z-40 w-12 h-12 rounded-full bg-[#3D2E24] text-[#FBF7F0] border-2 border-[#A85838] shadow-xl flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-95 group"
                :class="{ 'spinning-vinyl': isPlaying }"
                title="Toggle Musik"
            >
                {{-- Vinyl Grooves Visual --}}
                <div class="w-10 h-10 rounded-full border border-[#A85838]/40 flex items-center justify-center bg-[#2E221B]">
                    <div class="w-5 h-5 rounded-full bg-[#A85838] flex items-center justify-center text-[10px]">
                        <span x-show="isPlaying">&#9835;</span>
                        <span x-show="!isPlaying">&#10074;&#10074;</span>
                    </div>
                </div>
            </button>

            {{-- ========================================================
                 FLOATING QUICK NAVIGATION DOCK (Glassmorphism Terracotta)
                 ======================================================== --}}
            <nav class="absolute bottom-3 left-4 right-4 z-40 bg-[#3D2E24]/90 backdrop-blur-md border border-[#A85838]/40 rounded-full px-3 py-2 shadow-2xl flex items-center justify-around text-[#FBF7F0]">
                <a href="#hero-section" class="flex flex-col items-center text-[10px] text-[#FBF7F0]/70 hover:text-[#A85838] transition-colors py-1">
                    <svg class="w-4 h-4 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Home</span>
                </a>
                <a href="#mempelai-section" class="flex flex-col items-center text-[10px] text-[#FBF7F0]/70 hover:text-[#A85838] transition-colors py-1">
                    <svg class="w-4 h-4 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    <span>Mempelai</span>
                </a>
                <a href="#acara-section" class="flex flex-col items-center text-[10px] text-[#FBF7F0]/70 hover:text-[#A85838] transition-colors py-1">
                    <svg class="w-4 h-4 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Acara</span>
                </a>
                <a href="#gift-section" class="flex flex-col items-center text-[10px] text-[#FBF7F0]/70 hover:text-[#A85838] transition-colors py-1">
                    <svg class="w-4 h-4 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                    <span>Hadiah</span>
                </a>
                <a href="#rsvp-section" class="flex flex-col items-center text-[10px] text-[#FBF7F0]/70 hover:text-[#A85838] transition-colors py-1">
                    <svg class="w-4 h-4 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                    <span>Ucapan</span>
                </a>
            </nav>

            {{-- ========================================================
                 MAIN INVITATION CONTENT (Scrollable when open)
                 ======================================================== --}}
            <div
                id="invitation-content"
                class="h-full relative select-text pb-20"
                :class="isOpen ? 'overflow-y-auto' : 'overflow-hidden'"
            >
                {{-- 1. HERO SECTION --}}
                <section id="hero-section" class="relative min-h-[580px] flex flex-col justify-between items-center text-center p-6 pt-12 overflow-hidden bg-gradient-to-b from-[#F5EDE3] via-[#FBF7F0] to-[#FBF7F0]">
                    {{-- Decorative dried leaf background subtle overlay --}}
                    <div class="absolute -top-12 -right-12 w-48 h-48 rounded-full bg-[#A85838]/10 blur-2xl pointer-events-none"></div>

                    {{-- Top Tag --}}
                    <div class="relative z-10 scroll-reveal reveal-up">
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-[#3D2E24] text-[#FBF7F0] text-[10px] font-bold tracking-[0.2em] uppercase shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#A85838]"></span>
                            The Wedding Celebration
                        </span>
                    </div>

                    {{-- Center Hero Image with Arch Frame --}}
                    <div class="relative z-10 my-4 scroll-reveal reveal-zoom">
                        <div class="w-56 h-72 sm:w-60 sm:h-80 mx-auto rounded-t-full rounded-b-2xl overflow-hidden shadow-xl border-4 border-[#FFFFFF] relative bg-[#EADBCE]">
                            <img
                                src="{{ $invitation->cover_image ?? 'https://images.unsplash.com/photo-1537633552985-df8429e8048b?auto=format&fit=crop&w=800&q=80' }}"
                                alt="Prewedding {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}"
                                class="w-full h-full object-cover object-center"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#3D2E24]/40 via-transparent to-transparent"></div>
                        </div>
                    </div>

                    {{-- Hero Couple Names --}}
                    <div class="relative z-10 scroll-reveal reveal-up delay-100">
                        <h1 class="font-display text-3xl sm:text-4xl font-bold text-[#3D2E24] tracking-tight">
                            {{ $invitation->groom_nickname }}
                            <span class="text-[#A85838] font-display italic font-light">&amp;</span>
                            {{ $invitation->bride_nickname }}
                        </h1>
                        <p class="text-xs uppercase tracking-[0.25em] text-[#A85838] font-semibold mt-2">
                            {{ $invitation->event_date->translatedFormat('l, d F Y') }}
                        </p>
                    </div>

                    {{-- Scroll Down Indicator --}}
                    <div class="relative z-10 mt-6 scroll-reveal reveal-up delay-200">
                        <span class="text-[11px] text-[#3D2E24]/60 tracking-wider block mb-1">Scroll ke bawah</span>
                        <div class="w-5 h-8 mx-auto border-2 border-[#A85838]/60 rounded-full flex justify-center pt-1">
                            <div class="w-1 h-2 bg-[#A85838] rounded-full animate-bounce"></div>
                        </div>
                    </div>
                </section>

                {{-- 2. SECTION VINTAGE POSTCARD & BISMILLAH --}}
                <section class="px-6 py-10">
                    <div class="bg-[#F5EDE3] border border-[#EADBCE] rounded-3xl p-6 sm:p-7 shadow-sm text-center relative overflow-hidden scroll-reveal reveal-up">
                        {{-- Postcard Airmail Border Accent on top --}}
                        <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-[#A85838] via-[#EADBCE] to-[#3D2E24]"></div>

                        {{-- Arabic Bismillah --}}
                        <div class="my-3">
                            <p class="font-display text-2xl text-[#3D2E24] tracking-wider leading-relaxed">
                                بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ
                            </p>
                        </div>

                        {{-- Vintage Postal Stamp Mockup --}}
                        <div class="inline-block my-4 px-3 py-1.5 vintage-stamp bg-white/80 rounded-md">
                            <span class="text-[10px] font-bold text-[#A85838] tracking-widest uppercase">
                                ✦ 12.12.2026 • YOGYAKARTA ✦
                            </span>
                        </div>

                        <p class="text-xs text-[#3D2E24]/80 leading-relaxed max-w-sm mx-auto mb-5 font-normal">
                            Assalamu’alaikum Warahmatullahi Wabarakatuh.
                            Dengan memohon rahmat dan ridho Allah Subhanahu Wa Ta’ala, kami bermaksud menyelenggarakan syukuran pernikahan putra-putri kami:
                        </p>

                        {{-- Quote Ar-Rum 21 --}}
                        <div class="pt-4 border-t border-[#EADBCE] text-left">
                            <p class="font-display italic text-xs text-[#3D2E24]/90 leading-relaxed text-center">
                                "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang."
                            </p>
                            <p class="text-[11px] font-semibold text-[#A85838] text-center mt-2">
                                — QS. Ar-Rum Ayat 21
                            </p>
                        </div>
                    </div>
                </section>

                {{-- 3. SECTION MEMPELAI (POLAROID AESTHETIC CARDS) --}}
                <section id="mempelai-section" class="px-6 py-10 bg-gradient-to-b from-transparent via-[#F5EDE3]/50 to-transparent">
                    <div class="text-center mb-8 scroll-reveal reveal-up">
                        <span class="text-[10px] font-bold tracking-[0.25em] uppercase text-[#A85838] block mb-1">
                            Kedua Mempelai
                        </span>
                        <h2 class="font-display text-2xl sm:text-3xl font-bold text-[#3D2E24]">
                            Mempelai Pria &amp; Wanita
                        </h2>
                    </div>

                    {{-- Polaroid Card: Mempelai Pria (Dimas) --}}
                    <div class="mb-8 scroll-reveal reveal-left">
                        <div class="polaroid-card max-w-xs mx-auto rotate-[-2deg]">
                            {{-- Square Photo --}}
                            <div class="aspect-square w-full overflow-hidden rounded-lg bg-[#EADBCE] mb-3">
                                <img
                                    src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80"
                                    alt="Foto {{ $invitation->groom_nickname }}"
                                    class="w-full h-full object-cover object-top filter contrast-[1.03] sepia-[0.1]"
                                />
                            </div>
                            {{-- Handwritten Caption --}}
                            <div class="text-center pt-1">
                                <h3 class="font-display font-bold text-xl text-[#3D2E24]">
                                    {{ $invitation->groom_fullname }}
                                </h3>
                                <p class="font-handwriting text-lg text-[#A85838] font-semibold leading-tight my-1">
                                    {{ $invitation->groom_parents }}
                                </p>
                                <div class="inline-flex items-center gap-1.5 mt-2 px-3 py-1 rounded-full bg-[#F5EDE3] text-[11px] font-medium text-[#3D2E24]">
                                    <span>@dimas.pratama</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bohemian Divider Ampersand --}}
                    <div class="flex items-center justify-center my-6 scroll-reveal reveal-zoom">
                        <div class="w-12 h-12 rounded-full bg-[#A85838] text-[#FBF7F0] flex items-center justify-center font-display italic text-2xl shadow-md border-2 border-white">
                            &amp;
                        </div>
                    </div>

                    {{-- Polaroid Card: Mempelai Wanita (Amanda) --}}
                    <div class="scroll-reveal reveal-right">
                        <div class="polaroid-card max-w-xs mx-auto rotate-[2deg]">
                            {{-- Square Photo --}}
                            <div class="aspect-square w-full overflow-hidden rounded-lg bg-[#EADBCE] mb-3">
                                <img
                                    src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80"
                                    alt="Foto {{ $invitation->bride_nickname }}"
                                    class="w-full h-full object-cover object-top filter contrast-[1.03] sepia-[0.1]"
                                />
                            </div>
                            {{-- Handwritten Caption --}}
                            <div class="text-center pt-1">
                                <h3 class="font-display font-bold text-xl text-[#3D2E24]">
                                    {{ $invitation->bride_fullname }}
                                </h3>
                                <p class="font-handwriting text-lg text-[#A85838] font-semibold leading-tight my-1">
                                    {{ $invitation->bride_parents }}
                                </p>
                                <div class="inline-flex items-center gap-1.5 mt-2 px-3 py-1 rounded-full bg-[#F5EDE3] text-[11px] font-medium text-[#3D2E24]">
                                    <span>@amanda.putri</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- 4. SECTION COUNTDOWN TIMER --}}
                <section class="px-6 py-10">
                    <div class="bg-[#3D2E24] text-[#FBF7F0] rounded-3xl p-6 sm:p-7 shadow-xl text-center relative overflow-hidden scroll-reveal reveal-up">
                        {{-- Dried Grass Pattern Overlay --}}
                        <div class="absolute -right-8 -bottom-8 w-32 h-32 opacity-15 pointer-events-none">
                            <svg viewBox="0 0 100 100" fill="currentColor">
                                <circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="2" fill="none"/>
                            </svg>
                        </div>

                        <span class="text-[10px] font-bold tracking-[0.25em] uppercase text-[#A85838] block mb-1">
                            Menghitung Hari Bahagia
                        </span>
                        <h2 class="font-display text-2xl font-bold mb-6">
                            Waktu Menuju Acara
                        </h2>

                        {{-- 4 Boxes Countdown --}}
                        <div class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto mb-6">
                            {{-- Hari --}}
                            <div class="bg-[#2B1F17] border border-[#A85838]/50 rounded-2xl p-3 flex flex-col items-center shadow-inner">
                                <span class="font-display text-2xl sm:text-3xl font-bold text-[#FBF7F0]" x-text="countdown.days">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-[#A85838] font-bold mt-1">Hari</span>
                            </div>
                            {{-- Jam --}}
                            <div class="bg-[#2B1F17] border border-[#A85838]/50 rounded-2xl p-3 flex flex-col items-center shadow-inner">
                                <span class="font-display text-2xl sm:text-3xl font-bold text-[#FBF7F0]" x-text="countdown.hours">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-[#A85838] font-bold mt-1">Jam</span>
                            </div>
                            {{-- Menit --}}
                            <div class="bg-[#2B1F17] border border-[#A85838]/50 rounded-2xl p-3 flex flex-col items-center shadow-inner">
                                <span class="font-display text-2xl sm:text-3xl font-bold text-[#FBF7F0]" x-text="countdown.minutes">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-[#A85838] font-bold mt-1">Menit</span>
                            </div>
                            {{-- Detik --}}
                            <div class="bg-[#2B1F17] border border-[#A85838]/50 rounded-2xl p-3 flex flex-col items-center shadow-inner">
                                <span class="font-display text-2xl sm:text-3xl font-bold text-[#A85838]" x-text="countdown.seconds">00</span>
                                <span class="text-[9px] uppercase tracking-wider text-[#A85838] font-bold mt-1">Detik</span>
                            </div>
                        </div>

                        {{-- Add to Google Calendar CTA --}}
                        <a
                            href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode('Pernikahan Dimas & Amanda') }}&dates=20261212T010000Z/20261212T070000Z&details={{ urlencode('Akad & Resepsi Pernikahan Dimas & Amanda di Omah Rustic Garden Yogyakarta') }}&location={{ urlencode('Omah Rustic Garden, Yogyakarta') }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[#A85838] hover:bg-[#8F472C] text-white text-xs font-semibold tracking-wider transition-colors shadow-md"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>Simpan ke Google Calendar</span>
                        </a>
                    </div>
                </section>

                {{-- 5. SECTION AGENDA ACARA (AKAD & RESEPSI) --}}
                <section id="acara-section" class="px-6 py-10">
                    <div class="text-center mb-8 scroll-reveal reveal-up">
                        <span class="text-[10px] font-bold tracking-[0.25em] uppercase text-[#A85838] block mb-1">
                            Rangkaian Acara
                        </span>
                        <h2 class="font-display text-2xl sm:text-3xl font-bold text-[#3D2E24]">
                            Akad Nikah &amp; Resepsi
                        </h2>
                    </div>

                    <div class="space-y-6">
                        {{-- Kartu Akad Nikah --}}
                        <div class="bg-[#F5EDE3] border border-[#EADBCE] rounded-3xl p-6 shadow-sm scroll-reveal reveal-up">
                            <div class="flex items-center justify-between mb-4 pb-3 border-b border-[#EADBCE]">
                                <span class="px-3 py-1 rounded-full bg-[#A85838] text-white text-xs font-bold tracking-wider uppercase">
                                    Akad Nikah
                                </span>
                                <span class="text-xs font-semibold text-[#A85838]">
                                    Sesi Sakral
                                </span>
                            </div>

                            <div class="space-y-3 text-sm text-[#3D2E24]">
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-[#A85838] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <div>
                                        <p class="font-bold text-[#3D2E24]">Sabtu, 12 Desember 2026</p>
                                        <p class="text-xs text-[#3D2E24]/70">Pukul {{ $invitation->akad_time }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-[#A85838] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <div>
                                        <p class="font-bold text-[#3D2E24]">{{ $invitation->venue_name }}</p>
                                        <p class="text-xs text-[#3D2E24]/70 leading-relaxed">{{ $invitation->venue_address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Kartu Resepsi Pernikahan --}}
                        <div class="bg-[#F5EDE3] border border-[#EADBCE] rounded-3xl p-6 shadow-sm scroll-reveal reveal-up delay-100">
                            <div class="flex items-center justify-between mb-4 pb-3 border-b border-[#EADBCE]">
                                <span class="px-3 py-1 rounded-full bg-[#3D2E24] text-[#FBF7F0] text-xs font-bold tracking-wider uppercase">
                                    Resepsi Pernikahan
                                </span>
                                <span class="text-xs font-semibold text-[#A85838]">
                                    Bohemian Garden
                                </span>
                            </div>

                            <div class="space-y-3 text-sm text-[#3D2E24]">
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-[#A85838] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <div>
                                        <p class="font-bold text-[#3D2E24]">Sabtu, 12 Desember 2026</p>
                                        <p class="text-xs text-[#3D2E24]/70">Pukul {{ $invitation->resepsi_time }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-[#A85838] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <div>
                                        <p class="font-bold text-[#3D2E24]">{{ $invitation->venue_name }}</p>
                                        <p class="text-xs text-[#3D2E24]/70 leading-relaxed">{{ $invitation->venue_address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Link Google Maps --}}
                        <div class="text-center pt-2 scroll-reveal reveal-up delay-200">
                            <a
                                href="{{ $invitation->map_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center justify-center gap-2 w-full py-3 px-6 rounded-2xl bg-[#A85838] hover:bg-[#8F472C] text-white font-semibold text-xs tracking-wider transition-all shadow-md group"
                            >
                                <svg class="w-4 h-4 text-amber-200 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                </svg>
                                <span>Buka Petunjuk Arah di Google Maps</span>
                            </a>
                        </div>
                    </div>
                </section>

                {{-- 6. SECTION AMPLOP DIGITAL (WEDDING GIFT) --}}
                <section id="gift-section" class="px-6 py-10">
                    <div class="text-center mb-8 scroll-reveal reveal-up">
                        <span class="text-[10px] font-bold tracking-[0.25em] uppercase text-[#A85838] block mb-1">
                            Tanda Kasih
                        </span>
                        <h2 class="font-display text-2xl sm:text-3xl font-bold text-[#3D2E24]">
                            Amplop Digital &amp; Kado
                        </h2>
                        <p class="text-xs text-[#3D2E24]/70 max-w-xs mx-auto mt-2">
                            Doa restu Anda merupakan karunia terindah bagi kami. Namun jika memberi adalah ungkapan tanda kasih, Anda dapat menyalurkannya melalui:
                        </p>
                    </div>

                    {{-- Bank Card: Mandiri --}}
                    <div class="bg-gradient-to-br from-[#3D2E24] via-[#4D3B30] to-[#2B1F17] text-[#FBF7F0] rounded-3xl p-6 shadow-xl border border-[#A85838]/40 relative overflow-hidden mb-6 scroll-reveal reveal-zoom">
                        {{-- Card Chip & Wave Graphic --}}
                        <div class="flex items-center justify-between mb-6">
                            <div class="w-10 h-7 rounded-md bg-amber-400/80 border border-amber-300 shadow-inner flex items-center justify-center">
                                <div class="w-6 h-4 border border-amber-800/40 rounded-sm"></div>
                            </div>
                            <span class="font-bold text-lg tracking-widest text-[#FBF7F0]">
                                {{ $invitation->bank_name ?? 'MANDIRI' }}
                            </span>
                        </div>

                        {{-- Card Number --}}
                        <div class="mb-4">
                            <p class="text-[10px] text-[#FBF7F0]/60 uppercase tracking-widest mb-1">Nomor Rekening</p>
                            <p class="font-mono text-xl sm:text-2xl font-bold tracking-wider text-[#FBF7F0]">
                                {{ $invitation->bank_account_number ?? '1370012345678' }}
                            </p>
                        </div>

                        {{-- Card Holder & Salin Button --}}
                        <div class="flex items-end justify-between pt-2 border-t border-[#A85838]/40">
                            <div>
                                <p class="text-[10px] text-[#FBF7F0]/60 uppercase tracking-widest">Atas Nama</p>
                                <p class="text-sm font-semibold text-[#FBF7F0] tracking-wide">
                                    {{ $invitation->bank_account_holder ?? 'Dimas Pratama' }}
                                </p>
                            </div>

                            <button
                                type="button"
                                @click="copyAccountNumber('{{ $invitation->bank_account_number ?? '1370012345678' }}')"
                                class="bg-[#A85838] hover:bg-[#8F472C] text-white py-2 px-4 rounded-xl text-xs font-semibold inline-flex items-center gap-1.5 transition-all shadow-md active:scale-95"
                            >
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/>
                                </svg>
                                <span>Salin No. Rekening</span>
                            </button>
                        </div>

                        {{-- Toast Feedback Salin --}}
                        <div
                            x-show="copied"
                            x-cloak
                            x-transition
                            class="absolute inset-0 bg-[#3D2E24]/95 flex items-center justify-center text-center p-4"
                        >
                            <div class="text-[#FBF7F0]">
                                <svg class="w-8 h-8 text-emerald-400 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <p class="text-xs font-bold">Nomor rekening berhasil disalin!</p>
                            </div>
                        </div>
                    </div>

                    {{-- Kirim Kado Fisik Card --}}
                    <div class="bg-[#F5EDE3] border border-[#EADBCE] rounded-3xl p-5 shadow-sm scroll-reveal reveal-up">
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-full bg-[#A85838] text-white flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-xs text-[#3D2E24] uppercase tracking-wide">Kirim Kado Fisik</p>
                                <p class="text-xs text-[#3D2E24]/75 mt-1 leading-relaxed">
                                    {{ $invitation->venue_name }}, {{ $invitation->venue_address }} (u.p Dimas & Amanda)
                                </p>
                                <button
                                    type="button"
                                    @click="copyAddress('{{ $invitation->venue_name }}, {{ $invitation->venue_address }}')"
                                    class="text-[11px] font-semibold text-[#A85838] hover:text-[#8F472C] mt-2 inline-flex items-center gap-1"
                                >
                                    <span x-text="copiedAddress ? 'Alamat Disalin!' : 'Salin Alamat Lengkap &rarr;'"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- 7. SECTION RSVP & BUKU UCAPAN (AJAX ZERO-RELOAD) --}}
                <section id="rsvp-section" class="px-6 py-10">
                    <div class="text-center mb-8 scroll-reveal reveal-up">
                        <span class="text-[10px] font-bold tracking-[0.25em] uppercase text-[#A85838] block mb-1">
                            Buku Tamu &amp; RSVP
                        </span>
                        <h2 class="font-display text-2xl sm:text-3xl font-bold text-[#3D2E24]">
                            Konfirmasi Kehadiran &amp; Doa
                        </h2>
                        <p class="text-xs text-[#3D2E24]/70 max-w-xs mx-auto mt-2">
                            Kehadiran dan doa restu Anda merupakan kebahagiaan terbesar bagi kami.
                        </p>
                    </div>

                    {{-- Form Card --}}
                    <div class="bg-[#F5EDE3] border border-[#EADBCE] rounded-3xl p-6 shadow-sm scroll-reveal reveal-up">
                        {{-- Alert Error --}}
                        <div x-show="wishError" x-cloak class="mb-4 p-3.5 rounded-2xl bg-rose-100 border border-rose-300 text-rose-800 text-xs">
                            <span x-text="wishError"></span>
                        </div>

                        {{-- Alert Success --}}
                        <div x-show="wishSuccess" x-cloak class="mb-4 p-3.5 rounded-2xl bg-emerald-100 border border-emerald-300 text-emerald-800 text-xs flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span x-text="wishSuccessMessage"></span>
                        </div>

                        <form
                            action="{{ route('demo.wish', $invitation->slug) }}"
                            method="POST"
                            @submit.prevent="submitWish($event)"
                            class="space-y-4"
                        >
                            @csrf
                            <input type="text" name="website_hp" value="" class="hidden" tabindex="-1" autocomplete="off" style="display:none;" />

                            {{-- Input Nama Lengkap (Faint Placeholder sesuai request user) --}}
                            <div>
                                <label class="block text-xs font-semibold text-[#3D2E24] mb-1">
                                    Nama Lengkap
                                </label>
                                <input
                                    type="text"
                                    name="guest_name"
                                    x-model="formData.guest_name"
                                    required
                                    placeholder="Masukkan nama Anda..."
                                    class="w-full px-4 py-3 rounded-2xl bg-white border border-[#EADBCE] text-xs text-[#3D2E24] placeholder-[#3D2E24]/35 focus:outline-none focus:ring-2 focus:ring-[#A85838]/50 focus:border-[#A85838] transition-all"
                                />
                            </div>

                            {{-- Konfirmasi Kehadiran --}}
                            <div>
                                <label class="block text-xs font-semibold text-[#3D2E24] mb-1.5">
                                    Konfirmasi Kehadiran
                                </label>
                                <div class="grid grid-cols-3 gap-2">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="attendance" value="hadir" x-model="formData.attendance" class="sr-only">
                                        <div
                                            class="py-2.5 px-2 text-center rounded-2xl border text-xs font-semibold transition-all"
                                            :class="formData.attendance === 'hadir' ? 'bg-[#A85838] text-white border-[#A85838] shadow-sm' : 'bg-white text-[#3D2E24]/70 border-[#EADBCE] hover:bg-[#FBF7F0]'"
                                        >
                                            Hadir
                                        </div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="attendance" value="ragu" x-model="formData.attendance" class="sr-only">
                                        <div
                                            class="py-2.5 px-2 text-center rounded-2xl border text-xs font-semibold transition-all"
                                            :class="formData.attendance === 'ragu' ? 'bg-[#A85838] text-white border-[#A85838] shadow-sm' : 'bg-white text-[#3D2E24]/70 border-[#EADBCE] hover:bg-[#FBF7F0]'"
                                        >
                                            Ragu
                                        </div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="attendance" value="tidak_hadir" x-model="formData.attendance" class="sr-only">
                                        <div
                                            class="py-2.5 px-2 text-center rounded-2xl border text-xs font-semibold transition-all"
                                            :class="formData.attendance === 'tidak_hadir' ? 'bg-[#A85838] text-white border-[#A85838] shadow-sm' : 'bg-white text-[#3D2E24]/70 border-[#EADBCE] hover:bg-[#FBF7F0]'"
                                        >
                                            Tidak Hadir
                                        </div>
                                    </label>
                                </div>
                            </div>

                            {{-- Textarea Ucapan & Doa --}}
                            <div>
                                <label class="block text-xs font-semibold text-[#3D2E24] mb-1">
                                    Ucapan &amp; Doa Restu
                                </label>
                                <textarea
                                    name="message"
                                    x-model="formData.message"
                                    required
                                    rows="3"
                                    placeholder="Tuliskan doa restu untuk kedua mempelai..."
                                    class="w-full px-4 py-3 rounded-2xl bg-white border border-[#EADBCE] text-xs text-[#3D2E24] placeholder-[#3D2E24]/35 focus:outline-none focus:ring-2 focus:ring-[#A85838]/50 focus:border-[#A85838] transition-all"
                                ></textarea>
                            </div>

                            {{-- Tombol Submit --}}
                            <button
                                type="submit"
                                :disabled="isSubmitting"
                                class="w-full py-3.5 px-6 rounded-2xl bg-[#A85838] hover:bg-[#8F472C] text-white text-xs font-bold tracking-wider uppercase transition-all shadow-md flex items-center justify-center gap-2 active:scale-95 disabled:opacity-50"
                            >
                                <span x-show="!isSubmitting">Kirim Ucapan &amp; Konfirmasi</span>
                                <span x-show="isSubmitting" x-cloak class="flex items-center gap-2">
                                    <svg class="animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                    </svg>
                                    <span>Mengirimkan...</span>
                                </span>
                            </button>
                        </form>

                        {{-- Daftar Ucapan Doa Dinamis --}}
                        <div class="mt-8 pt-6 border-t border-[#EADBCE]">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-display font-bold text-sm text-[#3D2E24]">
                                    Ucapan Doa Terkini
                                </h3>
                                <span class="text-[11px] font-semibold text-[#A85838] bg-[#FBF7F0] px-2.5 py-0.5 rounded-full border border-[#EADBCE]">
                                    <span x-text="wishesList.length"></span> Doa
                                </span>
                            </div>

                            <div class="space-y-3 max-h-80 overflow-y-auto pr-1">
                                <template x-for="item in wishesList" :key="item.id">
                                    <div class="p-3.5 rounded-2xl bg-white border border-[#EADBCE] text-xs space-y-1.5 shadow-2xs">
                                        <div class="flex items-center justify-between">
                                            <span class="font-bold text-[#3D2E24]" x-text="item.guest_name"></span>
                                            <span
                                                class="px-2 py-0.5 rounded-full text-[10px] font-semibold uppercase tracking-wider"
                                                :class="{
                                                    'bg-emerald-100 text-emerald-800': item.attendance === 'hadir',
                                                    'bg-amber-100 text-amber-800': item.attendance === 'ragu',
                                                    'bg-stone-200 text-stone-700': item.attendance === 'tidak_hadir'
                                                }"
                                                x-text="item.attendance === 'hadir' ? 'Hadir' : (item.attendance === 'ragu' ? 'Ragu' : 'Tidak Hadir')"
                                            ></span>
                                        </div>
                                        <p class="text-[#3D2E24]/80 leading-relaxed font-normal" x-text="item.message"></p>
                                        <p class="text-[10px] text-[#3D2E24]/40" x-text="item.time_ago"></p>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- 8. SECTION PENUTUP & KELUARGA BESAR --}}
                <section class="px-6 py-12 text-center bg-[#F5EDE3]">
                    <div class="max-w-xs mx-auto scroll-reveal reveal-up">
                        <p class="font-display italic text-sm text-[#A85838] mb-2">
                            Turut Berbahagia
                        </p>
                        <h2 class="font-display text-2xl font-bold text-[#3D2E24] mb-3">
                            Keluarga Besar
                        </h2>
                        <div class="text-xs text-[#3D2E24]/80 space-y-2 mb-6">
                            <p><strong>Kel. Bpk. Suryanto &amp; Ibu Wahyuni</strong><br><span class="text-[11px] text-[#3D2E24]/60">(Keluarga Mempelai Pria)</span></p>
                            <p><strong>Kel. Bpk. Kusuma Wardhana &amp; Ibu Endang Lestari</strong><br><span class="text-[11px] text-[#3D2E24]/60">(Keluarga Mempelai Wanita)</span></p>
                        </div>

                        <p class="text-xs text-[#3D2E24]/70 leading-relaxed italic mb-8">
                            Atas kehadiran dan doa restu Bapak/Ibu/Saudara/i sekalian, kami sekeluarga mengucapkan terima kasih yang sebesar-besarnya.
                        </p>

                        {{-- Tanda Tangan Pasangan --}}
                        <div class="my-4">
                            <p class="font-handwriting text-3xl text-[#A85838] font-bold">
                                Dimas &amp; Amanda
                            </p>
                        </div>

                        {{-- Order This Theme Button via WhatsApp --}}
                        <div class="my-6">
                            <a href="https://wa.me/6285749739342?text={{ urlencode('Halo Admin GA Digital, saya sedang melihat demo tema Summer Rustic (Rp 129.000) dan tertarik untuk memesan undangan digital seperti ini. Mohon info pemesanannya ya!') }}"
                               target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-full bg-[#A85838] hover:bg-[#8F472C] text-white font-bold text-xs shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 active:scale-95">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                                </svg>
                                <span>Pesan Undangan Seperti Ini</span>
                            </a>
                        </div>

                        <div class="pt-6 border-t border-[#EADBCE] text-[10px] text-[#3D2E24]/50 tracking-wider">
                            <p>Design with love &bull; Summer Rustic Theme</p>
                            <p class="mt-1">Powered by <strong>GA DIGITAL</strong></p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    {{-- ============================================================
         SCROLL REVEAL ANIMATION ENGINE FOR INNER CONTAINER
         ============================================================ --}}
    <script>
        function initScrollAnimations() {
            const container = document.getElementById('invitation-content');
            if (!container) return;

            const revealElements = container.querySelectorAll('.scroll-reveal');
            if (!revealElements.length) return;

            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('revealed');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    root: container,
                    rootMargin: '0px 0px -35px 0px',
                    threshold: 0.1
                });

                revealElements.forEach(el => {
                    if (!el.classList.contains('revealed')) {
                        observer.observe(el);
                    }
                });
            }

            const checkVisible = () => {
                const cRect = container.getBoundingClientRect();
                revealElements.forEach(el => {
                    if (!el.classList.contains('revealed')) {
                        const r = el.getBoundingClientRect();
                        if (r.top <= cRect.bottom - 25 && r.bottom >= cRect.top) {
                            el.classList.add('revealed');
                        }
                    }
                });
            };

            container.addEventListener('scroll', checkVisible, { passive: true });
            checkVisible();
        }

        document.addEventListener('DOMContentLoaded', function () {
            initScrollAnimations();

            const btn = document.getElementById('btn-buka-undangan');
            if (btn) {
                btn.addEventListener('click', function () {
                    const cover = document.getElementById('cover-overlay');
                    const content = document.getElementById('invitation-content');
                    const audio = document.getElementById('weddingAudio');

                    if (cover) {
                        cover.classList.add('-translate-y-full', 'pointer-events-none');
                    }
                    if (content) {
                        content.classList.remove('overflow-hidden');
                        content.classList.add('overflow-y-auto');
                    }
                    if (audio) {
                        audio.play().catch(function () {});
                    }
                    setTimeout(function () {
                        initScrollAnimations();
                    }, 400);
                    setTimeout(function () {
                        if (cover) cover.style.display = 'none';
                    }, 1050);
                });
            }

            const mainEl = document.querySelector('main');
            if (mainEl) {
                mainEl.addEventListener('wheel', function (e) {
                    const content = document.getElementById('invitation-content');
                    if (content && e.target !== content && !content.contains(e.target)) {
                        content.scrollTop += e.deltaY;
                    }
                }, { passive: true });
            }
        });
    </script>
</body>
</html>
