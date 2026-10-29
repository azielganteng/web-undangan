<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Undangan Pernikahan Digital {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }} - Modern Minimalist Edition" />
    <title>The Wedding of {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }} - Modern Minimalist</title>
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

    <!-- Canvas Confetti CDN for Celebration Micro-Animations -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.4/dist/confetti.browser.min.js"></script>

    <!-- Google Fonts: Cormorant Garamond (Editorial Serif), Plus Jakarta Sans (Modern Sans), Caveat (Signature) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600;700&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        [x-cloak] { display: none !important; }

        .font-serif-editorial {
            font-family: 'Cormorant Garamond', Georgia, serif;
        }
        .font-signature {
            font-family: 'Caveat', cursive;
        }
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: #0F1012;
        }

        /* Minimalist Thin Line Frame */
        .minimal-frame {
            border: 1px solid rgba(24, 24, 27, 0.12);
        }

        /* Vinyl Spin Keyframe */
        @keyframes vinylSpin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .spinning-disc {
            animation: vinylSpin 5s linear infinite;
        }

        /* Soundwave Equalizer Bars */
        @keyframes waveBar1 { 0%, 100% { height: 4px; } 50% { height: 14px; } }
        @keyframes waveBar2 { 0%, 100% { height: 12px; } 50% { height: 5px; } }
        @keyframes waveBar3 { 0%, 100% { height: 7px; } 50% { height: 16px; } }
        .bar-min-1 { animation: waveBar1 1s ease-in-out infinite; }
        .bar-min-2 { animation: waveBar2 0.8s ease-in-out infinite 0.2s; }
        .bar-min-3 { animation: waveBar3 1.1s ease-in-out infinite 0.4s; }

        /* Minimalist Shimmer Sweep */
        @keyframes subtleShimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        .minimal-shimmer {
            background: linear-gradient(90deg, #18181B 0%, #3F3F46 50%, #18181B 100%);
            background-size: 200% 100%;
            animation: subtleShimmer 4s ease-in-out infinite;
        }

        /* Lightbox Modal Overlay */
        .lightbox-backdrop {
            background: rgba(15, 16, 18, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* ============================================================
           SCROLL-DRIVEN REVEAL ANIMATIONS (Optimized for Inner Container)
           ============================================================ */
        .scroll-reveal {
            opacity: 0;
            will-change: opacity, transform;
            transition-property: opacity, transform;
            transition-duration: 0.8s;
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal-zoom {
            transform: scale(0.85);
        }
        .reveal-zoom.revealed {
            opacity: 1 !important;
            transform: scale(1) !important;
        }
        .reveal-left {
            transform: translateX(-35px);
        }
        .reveal-left.revealed {
            opacity: 1 !important;
            transform: translateX(0) !important;
        }
        .reveal-right {
            transform: translateX(35px);
        }
        .reveal-right.revealed {
            opacity: 1 !important;
            transform: translateX(0) !important;
        }
        .reveal-up {
            transform: translateY(30px);
        }
        .reveal-up.revealed {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        .delay-100 { transition-delay: 100ms; }
        .delay-150 { transition-delay: 150ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-300 { transition-delay: 300ms; }

        @media (prefers-reduced-motion: reduce) {
            .scroll-reveal {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }

        /* Custom scrollbar for mobile container */
        #invitation-content::-webkit-scrollbar {
            width: 3px;
        }
        #invitation-content::-webkit-scrollbar-track {
            background: #F4F4F5;
        }
        #invitation-content::-webkit-scrollbar-thumb {
            background: #A1A1AA;
            border-radius: 9999px;
        }
    </style>
</head>
<body class="bg-[#0F1012] text-[#18181B] antialiased min-h-screen">

    {{-- ============================================================
         DESKTOP LEFT SIDE: Editorial Magazine Cover (Fixed 7/12)
         ============================================================ --}}
    <aside class="hidden lg:flex lg:w-7/12 fixed inset-y-0 left-0 overflow-hidden flex-col justify-between p-12 xl:p-16 text-[#FAFAFA]">
        {{-- Full-height prewedding photo with dark noir editorial overlay --}}
        <div class="absolute inset-0">
            <img
                src="{{ $invitation->cover_image ?? 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=1600&q=80' }}"
                alt="Foto Prewedding {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}"
                class="w-full h-full object-cover object-center filter grayscale contrast-[1.1]"
            />
            <div class="absolute inset-0 bg-[#0F1012]/80 backdrop-blur-[1px]"></div>
        </div>

        {{-- Minimalist Fine-line Grid Accents --}}
        <div class="absolute inset-0 pointer-events-none opacity-15">
            <div class="absolute top-12 left-12 right-12 bottom-12 border border-white/30"></div>
            <div class="absolute top-1/2 left-0 right-0 h-px bg-white/20"></div>
            <div class="absolute left-1/2 top-0 bottom-0 w-px bg-white/20"></div>
        </div>

        {{-- Top Badge --}}
        <div class="relative z-10 flex items-center justify-between">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full border border-white/20 bg-black/40 backdrop-blur-md text-white/80 text-[10px] uppercase tracking-[0.3em] font-semibold">
                <span class="w-1.5 h-1.5 rounded-full bg-[#C5A880]"></span>
                <span>Modern Minimalist Series (Rp 99.000)</span>
            </div>
            <span class="text-xs tracking-[0.25em] text-white/50 uppercase font-mono">Vol. 03</span>
        </div>

        {{-- Editorial Typography Center --}}
        <div class="relative z-10 max-w-xl my-auto py-8">
            <p class="font-serif-editorial italic text-[#C5A880] text-2xl xl:text-3xl mb-2 tracking-wide">
                The Wedding Celebration of
            </p>
            <h1 class="font-serif-editorial text-6xl xl:text-8xl font-normal text-white leading-[1.05] mb-6 tracking-tight">
                <span>{{ $invitation->groom_nickname }}</span>
                <span class="font-serif-editorial italic text-[#C5A880] text-5xl xl:text-7xl font-light mx-2">&amp;</span>
                <br>
                <span>{{ $invitation->bride_nickname }}</span>
            </h1>

            <div class="flex items-center gap-4 my-6 max-w-sm">
                <div class="h-px flex-1 bg-white/30"></div>
                <span class="text-[#C5A880] text-xs uppercase tracking-[0.3em] font-mono">EST. 2026</span>
                <div class="h-px flex-1 bg-white/30"></div>
            </div>

            <p class="text-white text-lg font-light tracking-widest uppercase mb-1">
                {{ $invitation->event_date->translatedFormat('l, d F Y') }}
            </p>
            <p class="text-white/70 text-xs mb-8 flex items-center gap-2 font-mono tracking-wider">
                <svg class="w-4 h-4 text-[#C5A880]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>{{ $invitation->venue_name }} &bull; Jakarta</span>
            </p>

            <blockquote class="border-l border-[#C5A880] pl-5 text-white/80 text-sm font-serif-editorial italic leading-relaxed max-w-md">
                "And of His signs is that He created for you from yourselves mates that you may find tranquility in them; and He placed between you affection and mercy."
                <footer class="text-[11px] text-[#C5A880] mt-2 font-sans not-italic tracking-wider uppercase">— Ar-Rum: 21</footer>
            </blockquote>
        </div>

        {{-- Bottom Footer --}}
        <div class="relative z-10 flex items-center justify-between text-xs text-white/60 tracking-wider">
            <a href="https://wa.me/6285749739342?text={{ urlencode('Halo Admin GA Digital, saya sedang melihat demo tema Modern Minimalist (Rp 99.000) dan tertarik untuk memesan tema ini. Boleh minta info pemesanannya kak?') }}"
               target="_blank" rel="noopener noreferrer"
               class="hover:text-white transition-colors flex items-center gap-1.5 font-semibold text-[#C5A880]">
                <span>Pesan Tema Minimalist via WhatsApp &rarr;</span>
            </a>
            <div class="flex items-center gap-2 text-white/70 font-mono text-[11px]">
                <span>Scroll layar di samping</span>
                <span class="animate-pulse">&rarr;</span>
            </div>
        </div>
    </aside>

    {{-- ============================================================
         RIGHT SIDE VIEWPORT: Mobile Smartphone Container
         ============================================================ --}}
    <main class="w-full lg:w-5/12 lg:ml-auto min-h-screen flex justify-center items-center py-0 lg:py-6">

        {{-- Mobile Container (Phone frame with Clean Minimalist Border) --}}
        <div
            x-data="{
                isOpen: {{ (session('success') || (isset($errors) && $errors->any())) ? 'true' : 'false' }},
                isPlaying: false,
                copied: false,
                isSubmitting: false,
                wishSuccess: {{ session('success') ? 'true' : 'false' }},
                wishSuccessMessage: '{{ session('success') ?? '' }}',
                wishError: '',
                lightboxImage: null,
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
                    @if(session('success') || (isset($errors) && $errors->any()))
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

                    // Clean monochromatic celebration confetti
                    if (typeof confetti === 'function') {
                        confetti({
                            particleCount: 50,
                            spread: 60,
                            origin: { y: 0.7 },
                            colors: ['#18181B', '#C5A880', '#FFFFFF', '#71717A']
                        });
                    }

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
                openLightbox(src) {
                    this.lightboxImage = src;
                },
                closeLightbox() {
                    this.lightboxImage = null;
                },
                submitWish(e) {
                    if (!this.formData.guest_name.trim() || !this.formData.message.trim()) {
                        this.wishError = 'Silakan isi nama dan doa restu Anda.';
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

                        const rsvp = document.getElementById('rsvp-section');
                        if (rsvp) {
                            rsvp.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }

                        setTimeout(() => {
                            this.wishSuccess = false;
                        }, 5000);
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
            class="w-full max-w-md h-screen lg:h-[94vh] bg-[#FAFAFA] text-[#18181B] relative shadow-2xl lg:rounded-3xl border border-zinc-300 overflow-hidden"
        >
            {{-- Background Audio Element: Acoustic Memories with local fallback --}}
            <audio id="weddingAudio" loop preload="none">
                <source src="{{ $invitation->audio_url ?: 'https://www.bensound.com/bensound-music/bensound-memories.mp3' }}" type="audio/mpeg">
                <source src="{{ asset('audio/acoustic-breeze.mp3') }}" type="audio/mpeg">
            </audio>

            {{-- ========================================================
                 COVER OVERLAY PEMBUKA (absolute inset-0 z-50)
                 ======================================================== --}}
            <div
                id="cover-overlay"
                class="absolute inset-0 z-50 flex flex-col justify-between p-8 bg-[#0F1012] text-[#FAFAFA] transition-transform duration-1000 ease-in-out"
                :class="{ '-translate-y-full pointer-events-none': isOpen }"
            >
                {{-- Background overlay image with dark tint --}}
                <div class="absolute inset-0 pointer-events-none overflow-hidden">
                    <img
                        src="{{ $invitation->cover_image ?? 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=800&q=80' }}"
                        alt="Background Cover"
                        class="w-full h-full object-cover opacity-20 filter grayscale"
                    />
                    <div class="absolute inset-0 bg-gradient-to-b from-[#0F1012]/95 via-[#0F1012]/80 to-[#0F1012]"></div>
                </div>

                {{-- Fine Geometric Frame Inside Cover --}}
                <div class="absolute inset-4 pointer-events-none border border-white/10 rounded-2xl"></div>

                {{-- Top Label --}}
                <div class="relative z-10 text-center pt-2">
                    <p class="text-[10px] tracking-[0.35em] text-[#C5A880] uppercase font-mono font-semibold">
                        The Wedding Invitation
                    </p>
                </div>

                {{-- Center Content: Clean Portrait & Names --}}
                <div class="relative z-10 text-center my-auto py-2">
                    <div class="w-32 h-44 mx-auto p-1 border border-white/25 bg-black/40 overflow-hidden shadow-2xl mb-5 rounded-xl">
                        <img
                            src="{{ $invitation->cover_image ?? 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=600&q=80' }}"
                            alt="{{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}"
                            class="w-full h-full object-cover filter contrast-[1.05] rounded-lg"
                        />
                    </div>

                    <p class="text-[11px] text-white/60 uppercase tracking-[0.3em] font-light mb-1">
                        We Joyfully Invite You
                    </p>
                    <h1 class="font-serif-editorial text-4xl sm:text-5xl font-normal text-white tracking-wide">
                        {{ $invitation->groom_nickname }}
                        <span class="italic text-[#C5A880] text-3xl font-light mx-1">&amp;</span>
                        {{ $invitation->bride_nickname }}
                    </h1>

                    <div class="flex items-center justify-center gap-3 my-3">
                        <div class="h-px w-10 bg-white/30"></div>
                        <span class="text-[#C5A880] text-xs">✦</span>
                        <div class="h-px w-10 bg-white/30"></div>
                    </div>

                    <p class="text-xs text-white/80 font-mono tracking-widest uppercase">
                        {{ $invitation->event_date->translatedFormat('d F Y') }}
                    </p>
                </div>

                {{-- Bottom: Dynamic Guest Card & Open Button --}}
                <div class="relative z-10">
                    <div class="bg-white/95 text-[#18181B] backdrop-blur-md rounded-2xl p-4 mb-4 shadow-xl border border-zinc-200 text-center">
                        <p class="text-[10px] uppercase tracking-wider text-zinc-500 font-semibold font-mono">Kepada Yth. Tamu Terhormat:</p>
                        <div class="font-bold text-lg text-[#18181B] mt-1">{{ request('to', $guestName ?: 'Tamu Undangan') }}</div>
                        <p class="text-[10px] text-zinc-400 italic mt-0.5">Merupakan suatu kehormatan atas kehadiran Anda</p>
                    </div>

                    {{-- Button "Buka Undangan" --}}
                    <button
                        id="btn-buka-undangan"
                        type="button"
                        @click="openInvitation()"
                        class="w-full minimal-shimmer text-white font-medium py-3.5 px-6 rounded-full shadow-xl flex items-center justify-center gap-2 hover:scale-[1.02] active:scale-[0.98] transition-transform duration-300 cursor-pointer border border-white/20"
                    >
                        <svg class="w-4 h-4 text-[#C5A880]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="tracking-[0.2em] uppercase text-xs font-semibold">Buka Undangan</span>
                    </button>

                    <p class="text-[10px] text-center text-white/40 mt-3 tracking-wider font-mono">
                        Music by Bensound &bull; Memories 🎵
                    </p>
                </div>
            </div>

            {{-- ========================================================
                 FLOATING MUSIC CONTROLLER (Minimalist Monochrome Vinyl)
                 ======================================================== --}}
            <button
                type="button"
                x-show="isOpen"
                x-transition:enter="transition ease-out duration-500 delay-300"
                x-transition:enter-start="opacity-0 scale-75"
                x-transition:enter-end="opacity-100 scale-100"
                @click="toggleAudio()"
                class="absolute bottom-20 right-4 bg-[#18181B] text-white shadow-2xl p-3 rounded-full z-40 border border-zinc-700 flex items-center gap-2 hover:scale-105 active:scale-95 transition-transform cursor-pointer"
                title="Play / Pause Audio"
                aria-label="Toggle Musik"
            >
                <div class="w-6 h-6 rounded-full border border-zinc-500 flex items-center justify-center" :class="{ 'spinning-disc': isPlaying }">
                    <div class="w-2 h-2 rounded-full bg-[#C5A880]"></div>
                </div>

                <div class="flex items-end gap-1 h-3.5 px-1" x-show="isPlaying">
                    <span class="w-0.5 bg-[#C5A880] rounded-full bar-min-1"></span>
                    <span class="w-0.5 bg-[#C5A880] rounded-full bar-min-2"></span>
                    <span class="w-0.5 bg-[#C5A880] rounded-full bar-min-3"></span>
                </div>
            </button>

            {{-- ========================================================
                 FLOATING QUICK NAVIGATION DOCK (Minimalist Glass)
                 ======================================================== --}}
            <nav class="absolute bottom-3 left-4 right-4 z-40 bg-[#18181B]/95 backdrop-blur-md border border-zinc-700/60 rounded-full px-3 py-2 shadow-2xl flex items-center justify-around text-white">
                <a href="#hero-section" class="flex flex-col items-center text-[9px] text-zinc-400 hover:text-white transition-colors py-1 font-mono uppercase tracking-wider">
                    <span>Home</span>
                </a>
                <a href="#mempelai-section" class="flex flex-col items-center text-[9px] text-zinc-400 hover:text-white transition-colors py-1 font-mono uppercase tracking-wider">
                    <span>Couple</span>
                </a>
                <a href="#acara-section" class="flex flex-col items-center text-[9px] text-zinc-400 hover:text-white transition-colors py-1 font-mono uppercase tracking-wider">
                    <span>Event</span>
                </a>
                <a href="#story-section" class="flex flex-col items-center text-[9px] text-zinc-400 hover:text-white transition-colors py-1 font-mono uppercase tracking-wider">
                    <span>Story</span>
                </a>
                <a href="#galeri-section" class="flex flex-col items-center text-[9px] text-zinc-400 hover:text-white transition-colors py-1 font-mono uppercase tracking-wider">
                    <span>Gallery</span>
                </a>
                <a href="#gift-section" class="flex flex-col items-center text-[9px] text-zinc-400 hover:text-white transition-colors py-1 font-mono uppercase tracking-wider">
                    <span>Gift</span>
                </a>
                <a href="#rsvp-section" class="flex flex-col items-center text-[9px] text-zinc-400 hover:text-white transition-colors py-1 font-mono uppercase tracking-wider">
                    <span>RSVP</span>
                </a>
            </nav>

            {{-- ========================================================
                 KONTEN UTAMA UNDANGAN (Scrollable inside Phone)
                 ======================================================== --}}
            <div
                id="invitation-content"
                class="relative z-10 w-full h-full scroll-smooth pb-24 touch-pan-y"
                :class="{ 'overflow-hidden': !isOpen, 'overflow-y-auto': isOpen }"
                style="-webkit-overflow-scrolling: touch; overscroll-behavior-y: contain;"
            >
                <div class="space-y-12">
                    {{-- ── SECTION 1: HERO INSIDE CONTAINER ─────────────────── --}}
                    <section id="hero-section" class="pt-14 pb-10 px-6 text-center relative overflow-hidden bg-white">
                        <div class="scroll-reveal reveal-zoom">
                            <span class="inline-block px-3 py-1 rounded-full bg-zinc-100 text-zinc-600 text-[10px] font-mono tracking-[0.25em] uppercase border border-zinc-200">
                                The Wedding Of
                            </span>
                        </div>

                        {{-- Hero Image in Clean Minimalist Frame --}}
                        <div class="my-6 scroll-reveal reveal-zoom delay-100">
                            <div class="w-48 h-64 mx-auto border border-zinc-200 p-2 bg-[#FAFAFA] shadow-md rounded-2xl relative">
                                <img
                                    src="{{ $invitation->cover_image ?? 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=800&q=80' }}"
                                    alt="Foto Pasangan"
                                    class="w-full h-full object-cover object-center rounded-xl"
                                />
                            </div>
                        </div>

                        {{-- Names & Date --}}
                        <div class="scroll-reveal reveal-up delay-150">
                            <h2 class="font-serif-editorial text-4xl sm:text-5xl font-normal text-[#18181B] tracking-tight">
                                {{ $invitation->groom_nickname }}
                                <span class="italic text-[#C5A880] text-3xl font-light mx-1">&amp;</span>
                                {{ $invitation->bride_nickname }}
                            </h2>
                            <p class="text-xs font-mono uppercase tracking-[0.25em] text-zinc-500 mt-2">
                                {{ $invitation->event_date->translatedFormat('l, d F Y') }}
                            </p>
                        </div>

                        {{-- Bismillah & Salam --}}
                        <div class="mt-8 scroll-reveal reveal-zoom delay-200">
                            <p class="font-serif-editorial text-2xl text-[#18181B] mb-2">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</p>
                            <p class="text-[11px] uppercase tracking-widest text-zinc-500 font-semibold mb-3">Assalamu'alaikum Warahmatullahi Wabarakatuh</p>
                            <p class="text-xs text-zinc-600 leading-relaxed max-w-xs mx-auto">
                                Dengan memohon rahmat dan ridho Allah Subhanahu Wa Ta'ala, kami bermaksud mengumumkan pernikahan putra-putri kami:
                            </p>
                        </div>

                        {{-- Kartu QS. Ar-Rum: 21 (Clean Quote) --}}
                        <div class="mt-6 bg-[#FAFAFA] border border-zinc-200 rounded-2xl p-6 text-center shadow-xs scroll-reveal reveal-zoom delay-200">
                            <p class="text-[10px] uppercase tracking-[0.25em] text-[#C5A880] font-mono font-semibold mb-2">QS. Ar-Rum: 21</p>
                            <p class="font-serif-editorial text-sm italic text-zinc-700 leading-relaxed mb-3">
                                "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang..."
                            </p>
                            <span class="text-[10px] text-zinc-400 font-mono tracking-wider">— Maha Benar Allah dengan Segala Firman-Nya</span>
                        </div>
                    </section>

                    {{-- ── SECTION 2: PROFIL KEDUA MEMPELAI ─────────────────── --}}
                    <section id="mempelai-section" class="py-10 px-6">
                        <div class="text-center mb-8 scroll-reveal reveal-up">
                            <span class="text-xs font-mono uppercase tracking-[0.25em] text-[#C5A880]">The Couple</span>
                            <h2 class="font-serif-editorial text-3xl font-normal text-[#18181B] mt-1">Kedua Mempelai</h2>
                        </div>

                        {{-- Mempelai Pria --}}
                        <div class="bg-white rounded-2xl p-6 text-center border border-zinc-200 shadow-xs mb-6 scroll-reveal reveal-left">
                            <div class="w-36 h-48 mx-auto border border-zinc-200 p-1.5 bg-[#FAFAFA] overflow-hidden mb-4 rounded-xl shadow-xs">
                                <img
                                    src="{{ $invitation->cover_image ?? 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=400&q=80' }}"
                                    alt="{{ $invitation->groom_fullname }}"
                                    class="w-full h-full object-cover object-top rounded-lg"
                                />
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full bg-zinc-100 text-zinc-600 text-[9px] font-mono uppercase tracking-widest inline-block mb-1.5 border border-zinc-200">The Groom</span>
                            <h3 class="font-serif-editorial font-normal text-2xl text-[#18181B] mb-1">{{ $invitation->groom_fullname }}</h3>
                            <p class="text-xs text-zinc-500 leading-relaxed max-w-xs mx-auto mb-3">{{ $invitation->groom_parents }}</p>
                            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs text-[#C5A880] font-mono hover:underline">
                                <span>@adit.kurniawan</span>
                                <span>&rarr;</span>
                            </a>
                        </div>

                        {{-- Minimalist Divider --}}
                        <div class="flex items-center justify-center gap-4 my-6 scroll-reveal reveal-zoom">
                            <div class="h-px w-16 bg-zinc-200"></div>
                            <span class="font-serif-editorial italic text-2xl text-[#C5A880]">&amp;</span>
                            <div class="h-px w-16 bg-zinc-200"></div>
                        </div>

                        {{-- Mempelai Wanita --}}
                        <div class="bg-white rounded-2xl p-6 text-center border border-zinc-200 shadow-xs scroll-reveal reveal-right">
                            <div class="w-36 h-48 mx-auto border border-zinc-200 p-1.5 bg-[#FAFAFA] overflow-hidden mb-4 rounded-xl shadow-xs">
                                <img
                                    src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=400&q=80"
                                    alt="{{ $invitation->bride_fullname }}"
                                    class="w-full h-full object-cover object-top rounded-lg"
                                />
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full bg-zinc-100 text-zinc-600 text-[9px] font-mono uppercase tracking-widest inline-block mb-1.5 border border-zinc-200">The Bride</span>
                            <h3 class="font-serif-editorial font-normal text-2xl text-[#18181B] mb-1">{{ $invitation->bride_fullname }}</h3>
                            <p class="text-xs text-zinc-500 leading-relaxed max-w-xs mx-auto mb-3">{{ $invitation->bride_parents }}</p>
                            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs text-[#C5A880] font-mono hover:underline">
                                <span>@nadia.salsabila</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </section>

                    {{-- ── SECTION 3: COUNTDOWN TIMER ───────────────────────── --}}
                    <section class="py-10 px-6 text-center">
                        <div class="bg-[#18181B] text-[#FAFAFA] rounded-3xl p-6 border border-zinc-800 shadow-xl scroll-reveal reveal-zoom">
                            <span class="text-[#C5A880] text-xs font-mono uppercase tracking-[0.25em]">Save The Date</span>
                            <h2 class="font-serif-editorial text-2xl font-normal mt-1 mb-6 text-white">
                                {{ $invitation->event_date->translatedFormat('d F Y') }}
                            </h2>

                            {{-- 4 Minimalist Countdown Boxes --}}
                            <div class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto mb-6">
                                <div class="bg-zinc-900 border border-zinc-800 rounded-xl py-3 px-1 flex flex-col items-center">
                                    <span class="font-mono text-2xl sm:text-3xl font-light text-white" x-text="countdown.days">00</span>
                                    <span class="text-zinc-400 text-[9px] font-mono uppercase tracking-wider block mt-1">Days</span>
                                </div>
                                <div class="bg-zinc-900 border border-zinc-800 rounded-xl py-3 px-1 flex flex-col items-center">
                                    <span class="font-mono text-2xl sm:text-3xl font-light text-white" x-text="countdown.hours">00</span>
                                    <span class="text-zinc-400 text-[9px] font-mono uppercase tracking-wider block mt-1">Hours</span>
                                </div>
                                <div class="bg-zinc-900 border border-zinc-800 rounded-xl py-3 px-1 flex flex-col items-center">
                                    <span class="font-mono text-2xl sm:text-3xl font-light text-white" x-text="countdown.minutes">00</span>
                                    <span class="text-zinc-400 text-[9px] font-mono uppercase tracking-wider block mt-1">Mins</span>
                                </div>
                                <div class="bg-zinc-900 border border-zinc-800 rounded-xl py-3 px-1 flex flex-col items-center">
                                    <span class="font-mono text-2xl sm:text-3xl font-light text-[#C5A880]" x-text="countdown.seconds">00</span>
                                    <span class="text-zinc-400 text-[9px] font-mono uppercase tracking-wider block mt-1">Secs</span>
                                </div>
                            </div>

                            {{-- Google Calendar CTA Button --}}
                            <a
                                href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode('Pernikahan Adit & Nadia') }}&dates={{ $invitation->event_date->format('Ymd\THis\Z') }}/{{ $invitation->event_date->addHours(5)->format('Ymd\THis\Z') }}&details={{ urlencode('Pernikahan Adit & Nadia di The Glass House Jakarta') }}&location={{ urlencode($invitation->venue_address) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white text-[#18181B] text-xs font-semibold tracking-wider transition-colors hover:bg-zinc-200 shadow-md font-mono"
                            >
                                <svg class="w-4 h-4 text-[#18181B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>Simpan ke Kalender</span>
                            </a>
                        </div>
                    </section>

                    {{-- ── SECTION 4: AGENDA ACARA (AKAD & RESEPSI) ──────────── --}}
                    <section id="acara-section" class="py-10 px-6">
                        <div class="text-center mb-8 scroll-reveal reveal-up">
                            <span class="text-xs font-mono uppercase tracking-[0.25em] text-[#C5A880]">Schedule</span>
                            <h2 class="font-serif-editorial text-3xl font-normal text-[#18181B] mt-1">Rangkaian Acara</h2>
                        </div>

                        {{-- Akad Nikah Card --}}
                        <div class="bg-white rounded-2xl p-6 mb-5 border border-zinc-200 shadow-xs scroll-reveal reveal-left">
                            <div class="flex items-center justify-between mb-4 border-b border-zinc-100 pb-3">
                                <div>
                                    <span class="text-[#C5A880] text-[10px] font-mono uppercase tracking-widest font-semibold">Bagian I</span>
                                    <h3 class="font-serif-editorial text-2xl font-normal text-[#18181B]">Akad Nikah</h3>
                                </div>
                                <span class="text-[10px] font-mono text-zinc-500 bg-zinc-100 px-2.5 py-1 rounded-full">Sakral</span>
                            </div>

                            <div class="space-y-2.5 text-xs text-zinc-600 font-mono">
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4 text-[#C5A880]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>{{ $invitation->akad_time }}</span>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4 text-[#C5A880]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>{{ $invitation->event_date->translatedFormat('l, d F Y') }}</span>
                                </div>
                                <div class="flex items-start gap-2.5 font-sans text-xs">
                                    <svg class="w-4 h-4 text-[#C5A880] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>{{ $invitation->venue_name }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Resepsi Pernikahan Card --}}
                        <div class="bg-white rounded-2xl p-6 mb-6 border border-zinc-200 shadow-xs scroll-reveal reveal-right">
                            <div class="flex items-center justify-between mb-4 border-b border-zinc-100 pb-3">
                                <div>
                                    <span class="text-[#C5A880] text-[10px] font-mono uppercase tracking-widest font-semibold">Bagian II</span>
                                    <h3 class="font-serif-editorial text-2xl font-normal text-[#18181B]">Resepsi Pernikahan</h3>
                                </div>
                                <span class="text-[10px] font-mono text-zinc-500 bg-zinc-100 px-2.5 py-1 rounded-full">Perayaan</span>
                            </div>

                            <div class="space-y-2.5 text-xs text-zinc-600 font-mono">
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4 text-[#C5A880]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>{{ $invitation->resepsi_time }}</span>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4 text-[#C5A880]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>{{ $invitation->event_date->translatedFormat('l, d F Y') }}</span>
                                </div>
                                <div class="flex items-start gap-2.5 font-sans text-xs">
                                    <svg class="w-4 h-4 text-[#C5A880] mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>{{ $invitation->venue_address }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Google Maps --}}
                        <div class="text-center scroll-reveal reveal-zoom delay-150">
                            <a
                                href="{{ $invitation->map_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center justify-center gap-2 bg-[#18181B] text-white px-6 py-3 rounded-full text-xs font-mono font-medium hover:bg-zinc-800 transition-all shadow-md hover:scale-105 active:scale-95"
                            >
                                <svg class="w-4 h-4 text-[#C5A880]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>Petunjuk Lokasi Google Maps</span>
                            </a>
                        </div>
                    </section>

                    {{-- ── SECTION 5: KISAH KAMI (MINIMALIST TIMELINE) ───────── --}}
                    <section id="story-section" class="py-10 px-6">
                        <div class="text-center mb-8 scroll-reveal reveal-up">
                            <span class="text-xs font-mono uppercase tracking-[0.25em] text-[#C5A880]">Our Journey</span>
                            <h2 class="font-serif-editorial text-3xl font-normal text-[#18181B] mt-1">Perjalanan Cinta</h2>
                        </div>

                        <div class="relative border-l border-zinc-300 ml-4 space-y-6">
                            {{-- Milestone 1 --}}
                            <div class="relative pl-6 scroll-reveal reveal-left">
                                <div class="absolute -left-1.5 top-1.5 w-3 h-3 rounded-full bg-[#18181B] border-2 border-[#C5A880]"></div>
                                <div class="bg-white p-4 rounded-xl border border-zinc-200 shadow-2xs">
                                    <span class="text-[10px] font-mono uppercase tracking-wider text-[#C5A880] font-semibold">Oktober 2021</span>
                                    <h4 class="font-serif-editorial font-normal text-lg text-[#18181B] mt-0.5">Pertemuan Pertama</h4>
                                    <p class="text-xs text-zinc-500 leading-relaxed mt-1">
                                        Sebuah perkenalan sederhana di ruang kerja arsitektur yang perlahan menumbuhkan rasa saling mengagumi dan memahami.
                                    </p>
                                </div>
                            </div>

                            {{-- Milestone 2 --}}
                            <div class="relative pl-6 scroll-reveal reveal-right delay-100">
                                <div class="absolute -left-1.5 top-1.5 w-3 h-3 rounded-full bg-[#C5A880] border-2 border-[#18181B]"></div>
                                <div class="bg-white p-4 rounded-xl border border-zinc-200 shadow-2xs">
                                    <span class="text-[10px] font-mono uppercase tracking-wider text-[#C5A880] font-semibold">Desember 2024</span>
                                    <h4 class="font-serif-editorial font-normal text-lg text-[#18181B] mt-0.5">Komitmen &amp; Lamaran</h4>
                                    <p class="text-xs text-zinc-500 leading-relaxed mt-1">
                                        Di hadapan keluarga besar, kami mengikrarkan janji untuk melangkah bersama menuju ikatan suci pernikahan.
                                    </p>
                                </div>
                            </div>

                            {{-- Milestone 3 --}}
                            <div class="relative pl-6 scroll-reveal reveal-left delay-200">
                                <div class="absolute -left-1.5 top-1.5 w-3 h-3 rounded-full bg-[#18181B] border-2 border-[#C5A880]"></div>
                                <div class="bg-white p-4 rounded-xl border border-zinc-200 shadow-2xs">
                                    <span class="text-[10px] font-mono uppercase tracking-wider text-[#C5A880] font-semibold">November 2026</span>
                                    <h4 class="font-serif-editorial font-normal text-lg text-[#18181B] mt-0.5">Awal Babak Baru</h4>
                                    <p class="text-xs text-zinc-500 leading-relaxed mt-1">
                                        Dengan restu kedua orang tua, kami memulai lembaran baru sebagai pasangan suami istri sehidup se-surga.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- ── SECTION 6: GALERI FOTO (WITH LIGHTBOX) ────────────── --}}
                    <section id="galeri-section" class="py-10 px-6">
                        <div class="text-center mb-8 scroll-reveal reveal-up">
                            <span class="text-xs font-mono uppercase tracking-[0.25em] text-[#C5A880]">Portfolio</span>
                            <h2 class="font-serif-editorial text-3xl font-normal text-[#18181B] mt-1">Galeri Kenangan</h2>
                            <p class="text-[11px] text-zinc-400 font-mono mt-1">(Sentuh foto untuk memperbesar 🔍)</p>
                        </div>

                        {{-- Foto Utama --}}
                        <div
                            class="mb-3 scroll-reveal reveal-zoom group overflow-hidden rounded-2xl border border-zinc-200 bg-white p-1 cursor-pointer hover:shadow-md transition-shadow"
                            @click="openLightbox('https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=1200&q=90')"
                        >
                            <div class="w-full h-56 overflow-hidden rounded-xl relative">
                                <img
                                    src="https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=800&q=80"
                                    alt="Foto Prewedding 1"
                                    class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy"
                                />
                                <div class="absolute bottom-2 left-2 bg-black/60 backdrop-blur-xs text-white text-[9px] font-mono px-2 py-0.5 rounded">
                                    01 // The Glass House
                                </div>
                            </div>
                        </div>

                        {{-- 2 Foto Grid --}}
                        <div class="grid grid-cols-2 gap-3 mb-3">
                            <div
                                class="scroll-reveal reveal-left delay-100 group overflow-hidden rounded-2xl border border-zinc-200 bg-white p-1 cursor-pointer hover:shadow-md transition-shadow"
                                @click="openLightbox('https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1200&q=90')"
                            >
                                <div class="w-full h-40 overflow-hidden rounded-xl relative">
                                    <img
                                        src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=600&q=80"
                                        alt="Foto Prewedding 2"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy"
                                    />
                                    <div class="absolute bottom-2 left-2 bg-black/60 backdrop-blur-xs text-white text-[9px] font-mono px-2 py-0.5 rounded">
                                        02 // Moments
                                    </div>
                                </div>
                            </div>
                            <div
                                class="scroll-reveal reveal-right delay-150 group overflow-hidden rounded-2xl border border-zinc-200 bg-white p-1 cursor-pointer hover:shadow-md transition-shadow"
                                @click="openLightbox('https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=90')"
                            >
                                <div class="w-full h-40 overflow-hidden rounded-xl relative">
                                    <img
                                        src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=600&q=80"
                                        alt="Foto Prewedding 3"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy"
                                    />
                                    <div class="absolute bottom-2 left-2 bg-black/60 backdrop-blur-xs text-white text-[9px] font-mono px-2 py-0.5 rounded">
                                        03 // Serenity
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 2 Foto Bawah --}}
                        <div class="grid grid-cols-2 gap-3">
                            <div
                                class="scroll-reveal reveal-zoom delay-200 group overflow-hidden rounded-2xl border border-zinc-200 bg-white p-1 cursor-pointer hover:shadow-md transition-shadow"
                                @click="openLightbox('https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=1200&q=90')"
                            >
                                <div class="w-full h-36 overflow-hidden rounded-xl relative">
                                    <img
                                        src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=600&q=80"
                                        alt="Foto Prewedding 4"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy"
                                    />
                                </div>
                            </div>
                            <div
                                class="scroll-reveal reveal-zoom delay-300 group overflow-hidden rounded-2xl border border-zinc-200 bg-white p-1 cursor-pointer hover:shadow-md transition-shadow"
                                @click="openLightbox('https://images.unsplash.com/photo-1532712938310-34cb3982ef74?auto=format&fit=crop&w=1200&q=90')"
                            >
                                <div class="w-full h-36 overflow-hidden rounded-xl relative">
                                    <img
                                        src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?auto=format&fit=crop&w=600&q=80"
                                        alt="Foto Prewedding 5"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy"
                                    />
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- ── SECTION 7: AMPLOP DIGITAL (GIFT) ─────────────────── --}}
                    <section id="gift-section" class="py-10 px-6">
                        <div class="text-center mb-8 scroll-reveal reveal-up">
                            <span class="text-xs font-mono uppercase tracking-[0.25em] text-[#C5A880]">Wedding Gift</span>
                            <h2 class="font-serif-editorial text-3xl font-normal text-[#18181B] mt-1">Amplop Digital</h2>
                            <p class="text-xs text-zinc-500 mt-2 max-w-xs mx-auto leading-relaxed">
                                Kehadiran dan doa restu Anda adalah anugerah terbesar bagi kami. Bagi yang ingin mengirimkan tanda kasih:
                            </p>
                        </div>

                        @if($invitation->bank_account_number)
                        {{-- Minimalist Noir Bank Card --}}
                        <div class="bg-[#18181B] text-white rounded-3xl p-6 shadow-xl border border-zinc-800 relative overflow-hidden mb-5 scroll-reveal reveal-zoom">
                            <div class="flex items-center justify-between mb-6">
                                <span class="text-[#C5A880] text-sm font-mono uppercase tracking-widest font-bold">
                                    {{ $invitation->bank_name ?? 'BCA' }}
                                </span>
                                <div class="w-10 h-7 rounded bg-zinc-800 border border-zinc-700 flex items-center justify-center text-xs text-[#C5A880] font-mono">
                                    CHIP
                                </div>
                            </div>

                            <p class="text-[10px] text-zinc-400 uppercase tracking-widest font-mono mb-1">Nomor Rekening</p>
                            <p class="font-mono text-2xl font-light tracking-widest text-white mb-4">
                                {{ $invitation->bank_account_number }}
                            </p>

                            <div class="flex items-end justify-between pt-3 border-t border-zinc-800">
                                <div>
                                    <p class="text-[10px] text-zinc-400 uppercase tracking-widest font-mono">Atas Nama</p>
                                    <p class="font-medium text-xs text-white">{{ $invitation->bank_account_holder }}</p>
                                </div>

                                <button
                                    type="button"
                                    @click="navigator.clipboard.writeText('{{ $invitation->bank_account_number }}').then(() => { copied = true; setTimeout(() => copied = false, 2500); })"
                                    class="bg-white hover:bg-zinc-200 text-[#18181B] py-2 px-4 rounded-xl text-xs font-mono font-medium transition-colors cursor-pointer"
                                >
                                    <span x-text="copied ? 'Tersalin! ✓' : 'Salin'">Salin</span>
                                </button>
                            </div>

                            {{-- Toast Feedback Salin --}}
                            <div
                                x-show="copied"
                                x-cloak
                                x-transition
                                class="absolute inset-0 bg-black/95 flex items-center justify-center text-center p-4"
                            >
                                <div class="text-white font-mono text-xs">
                                    <span class="text-emerald-400 text-lg block mb-1">✓</span>
                                    <span>Nomor rekening berhasil disalin!</span>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- Kirim Kado Fisik Card --}}
                        <div class="bg-white border border-zinc-200 rounded-2xl p-5 shadow-xs scroll-reveal reveal-up" x-data="{ copiedAddr: false }">
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded-lg bg-zinc-100 text-[#18181B] flex items-center justify-center shrink-0 border border-zinc-200">
                                    📦
                                </div>
                                <div class="flex-1">
                                    <p class="font-mono text-xs font-semibold text-[#18181B] uppercase tracking-wider">Kado Fisik</p>
                                    <p class="text-xs text-zinc-500 mt-1 leading-relaxed">
                                        {{ $invitation->venue_name }}, {{ $invitation->venue_address }} (u.p Adit &amp; Nadia)
                                    </p>
                                    <button
                                        type="button"
                                        @click="navigator.clipboard.writeText('{{ $invitation->venue_name }}, {{ $invitation->venue_address }} (u.p Adit & Nadia)').then(() => { copiedAddr = true; setTimeout(() => copiedAddr = false, 2500); })"
                                        class="mt-2 text-[11px] font-mono text-[#C5A880] hover:underline"
                                    >
                                        <span x-text="copiedAddr ? 'Alamat Tersalin! ✓' : 'Salin Alamat Lengkap'">Salin Alamat Lengkap</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- ── SECTION 8: RSVP & BUKU UCAPAN (AJAX) ──────────────── --}}
                    <section id="rsvp-section" class="py-10 px-6">
                        <div class="text-center mb-8 scroll-reveal reveal-up">
                            <span class="text-xs font-mono uppercase tracking-[0.25em] text-[#C5A880]">Guest Book</span>
                            <h2 class="font-serif-editorial text-3xl font-normal text-[#18181B] mt-1">Konfirmasi &amp; Ucapan</h2>
                            <p class="text-xs text-zinc-500 mt-1">Berikan doa restu dan konfirmasi kehadiran Anda</p>
                        </div>

                        {{-- Alert Success --}}
                        <div
                            x-show="wishSuccess"
                            x-cloak
                            x-transition
                            class="mb-4 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-mono"
                        >
                            <span x-text="'✓ ' + (wishSuccessMessage || 'Terima kasih atas doa restunya!')"></span>
                        </div>

                        {{-- Alert Error --}}
                        <div
                            x-show="wishError"
                            x-cloak
                            x-transition
                            class="mb-4 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-mono"
                        >
                            <p class="font-bold mb-0.5">Perhatian:</p>
                            <p x-text="wishError"></p>
                        </div>

                        {{-- Form Input --}}
                        <form
                            id="wishForm"
                            method="POST"
                            action="{{ route('demo.wish', $invitation->slug) }}"
                            @submit.prevent="submitWish($event)"
                            class="bg-white rounded-2xl p-6 border border-zinc-200 shadow-xs mb-8 scroll-reveal reveal-up"
                        >
                            @csrf
                            <input type="text" name="website_hp" value="" class="hidden" tabindex="-1" autocomplete="off" style="display:none;" />
                            <div class="mb-4">
                                <label for="guest_name" class="block text-[11px] font-mono font-medium uppercase tracking-wider text-zinc-600 mb-1.5">Nama Anda</label>
                                <input
                                    id="guest_name"
                                    name="guest_name"
                                    type="text"
                                    x-model="formData.guest_name"
                                    placeholder="Masukkan nama Anda..."
                                    required
                                    class="w-full rounded-xl border border-zinc-200 bg-[#FAFAFA] px-4 py-2.5 text-xs text-[#18181B] placeholder-zinc-400 focus:outline-none focus:border-zinc-800 focus:bg-white transition-all font-mono"
                                />
                            </div>

                            <div class="mb-4">
                                <label class="block text-[11px] font-mono font-medium uppercase tracking-wider text-zinc-600 mb-1.5">Konfirmasi Kehadiran</label>
                                <div class="grid grid-cols-3 gap-2">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="attendance" value="hadir" x-model="formData.attendance" class="peer sr-only" required />
                                        <span class="block text-center py-2 px-1 text-xs font-mono rounded-xl border border-zinc-200 bg-[#FAFAFA] text-zinc-600 peer-checked:bg-[#18181B] peer-checked:text-white peer-checked:border-[#18181B] transition-colors">
                                            Hadir
                                        </span>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="attendance" value="ragu" x-model="formData.attendance" class="peer sr-only" required />
                                        <span class="block text-center py-2 px-1 text-xs font-mono rounded-xl border border-zinc-200 bg-[#FAFAFA] text-zinc-600 peer-checked:bg-[#18181B] peer-checked:text-white peer-checked:border-[#18181B] transition-colors">
                                            Ragu
                                        </span>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="attendance" value="tidak_hadir" x-model="formData.attendance" class="peer sr-only" required />
                                        <span class="block text-center py-2 px-1 text-xs font-mono rounded-xl border border-zinc-200 bg-[#FAFAFA] text-zinc-600 peer-checked:bg-[#18181B] peer-checked:text-white peer-checked:border-[#18181B] transition-colors">
                                            Absen
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="message" class="block text-[11px] font-mono font-medium uppercase tracking-wider text-zinc-600 mb-1.5">Doa &amp; Harapan</label>
                                <textarea
                                    id="message"
                                    name="message"
                                    rows="3"
                                    x-model="formData.message"
                                    placeholder="Tuliskan ucapan dan doa restu..."
                                    required
                                    class="w-full rounded-xl border border-zinc-200 bg-[#FAFAFA] px-4 py-2.5 text-xs text-[#18181B] placeholder-zinc-400 focus:outline-none focus:border-zinc-800 focus:bg-white resize-none transition-all"
                                ></textarea>
                            </div>

                            <button
                                type="submit"
                                :disabled="isSubmitting"
                                class="w-full bg-[#18181B] text-white py-3 rounded-xl text-xs font-mono font-medium tracking-wider uppercase hover:bg-zinc-800 transition-all cursor-pointer flex items-center justify-center gap-2 disabled:opacity-75"
                            >
                                <svg x-show="isSubmitting" class="animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" x-cloak>
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span x-text="isSubmitting ? 'Mengirim...' : 'Kirim Ucapan & Konfirmasi'">Kirim Ucapan &amp; Konfirmasi</span>
                            </button>
                        </form>

                        {{-- List of Wishes --}}
                        <div class="scroll-reveal reveal-up delay-100">
                            <div class="flex items-center justify-between mb-3 border-b border-zinc-200 pb-2">
                                <h3 class="font-mono text-xs uppercase tracking-wider text-[#18181B] font-semibold">
                                    Ucapan Terkini
                                </h3>
                                <span class="text-[11px] font-mono text-zinc-500">
                                    <span x-text="wishesList.length"></span> Doa Masuk
                                </span>
                            </div>

                            <div class="space-y-3 max-h-72 overflow-y-auto pr-1">
                                <template x-for="wish in wishesList" :key="wish.id">
                                    <div class="bg-white rounded-xl p-4 border border-zinc-200 shadow-2xs">
                                        <div class="flex items-center justify-between mb-1.5">
                                            <span class="font-mono font-semibold text-xs text-[#18181B]" x-text="wish.guest_name"></span>
                                            <template x-if="wish.attendance === 'hadir'">
                                                <span class="text-[9px] font-mono px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">Hadir</span>
                                            </template>
                                            <template x-if="wish.attendance === 'tidak_hadir'">
                                                <span class="text-[9px] font-mono px-2 py-0.5 rounded-full bg-zinc-100 text-zinc-600 border border-zinc-200">Tidak Hadir</span>
                                            </template>
                                            <template x-if="wish.attendance !== 'hadir' && wish.attendance !== 'tidak_hadir'">
                                                <span class="text-[9px] font-mono px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 border border-amber-200">Ragu</span>
                                            </template>
                                        </div>
                                        <p class="text-xs text-zinc-600 leading-relaxed" x-text="wish.message"></p>
                                        <p class="text-[9px] font-mono text-zinc-400 mt-1.5" x-text="wish.time_ago"></p>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </section>

                    {{-- ── SECTION 9: FOOTER & SIGNATURE ─────────────────────── --}}
                    <footer class="py-12 px-6 text-center bg-[#18181B] text-[#FAFAFA] scroll-reveal reveal-up">
                        <p class="font-serif-editorial text-3xl text-white mb-2">
                            {{ $invitation->groom_nickname }} &amp; {{ $invitation->bride_nickname }}
                        </p>
                        <p class="text-xs text-zinc-400 leading-relaxed max-w-xs mx-auto mb-6">
                            Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu.
                        </p>

                        <div class="bg-zinc-900 rounded-xl p-4 mb-6 text-xs text-zinc-400 space-y-1 border border-zinc-800">
                            <p class="text-[#C5A880] font-mono uppercase tracking-widest text-[9px] mb-1 font-semibold">Turut Mengundang</p>
                            <p>Kel. <span class="text-white">{{ $invitation->groom_parents }}</span></p>
                            <p class="text-[#C5A880] font-serif-editorial italic">&amp;</p>
                            <p>Kel. <span class="text-white">{{ $invitation->bride_parents }}</span></p>
                        </div>

                        {{-- Digital Signature --}}
                        <div class="my-4">
                            <p class="font-signature text-3xl text-[#C5A880]">
                                {{ $invitation->groom_nickname }} &amp; {{ $invitation->bride_nickname }}
                            </p>
                        </div>

                        {{-- Order This Theme Button via WhatsApp --}}
                        <div class="my-6">
                            <a href="https://wa.me/6285749739342?text={{ urlencode('Halo Admin GA Digital, saya sedang melihat demo tema Modern Minimalist (Rp 99.000) dan tertarik untuk memesan undangan digital seperti ini. Boleh minta info pemesanannya ya!') }}"
                               target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-full bg-white text-[#18181B] font-mono font-semibold text-xs shadow-lg hover:bg-zinc-200 transition-all hover:scale-105 active:scale-95">
                                <svg class="w-4 h-4 text-[#18181B]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                                </svg>
                                <span>Pesan Tema Minimalist (Rp 99.000)</span>
                            </a>
                        </div>

                        <p class="text-[10px] text-zinc-500 font-mono tracking-wider">
                            Created with pride by
                            <a href="/" class="text-white hover:underline font-semibold">GA DIGITAL</a>
                            &bull; Modern Minimalist Series
                        </p>
                    </footer>
                </div>
            </div>

            {{-- ========================================================
                 FULLSCREEN PHOTO LIGHTBOX MODAL
                 ======================================================== --}}
            <div
                x-show="lightboxImage"
                x-cloak
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                @click.self="closeLightbox()"
                @keydown.escape.window="closeLightbox()"
                class="absolute inset-0 z-50 flex items-center justify-center p-4 lightbox-backdrop"
            >
                <div class="relative max-w-sm w-full bg-[#18181B] rounded-2xl p-3 border border-zinc-700 shadow-2xl">
                    <button
                        type="button"
                        @click="closeLightbox()"
                        class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-white text-[#18181B] flex items-center justify-center font-bold text-xs shadow-lg hover:scale-110 active:scale-95 transition-transform cursor-pointer font-mono"
                        title="Close"
                    >
                        ✕
                    </button>
                    <div class="overflow-hidden rounded-xl border border-zinc-800 max-h-[75vh]">
                        <img
                            :src="lightboxImage"
                            alt="Photo Preview"
                            class="w-full h-auto object-contain max-h-[72vh] rounded-xl"
                        />
                    </div>
                    <div class="text-center pt-2">
                        <p class="font-serif-editorial text-lg text-white">The Wedding of Adit &amp; Nadia</p>
                        <p class="text-[10px] text-zinc-400 font-mono">Sentuh di luar atau tombol ✕ untuk menutup</p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    {{-- ============================================================
         SCROLL-REVEAL ENGINE & INTERACTIVE SCRIPTS
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
                    rootMargin: '0px 0px -30px 0px',
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
                        if (r.top <= cRect.bottom - 20 && r.bottom >= cRect.top) {
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
