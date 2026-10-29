<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Undangan Pernikahan Digital {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }} - Leafy Botanical Luxury Edition" />
    <title>The Wedding of {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }} - Leafy Botanical</title>
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

    <!-- Google Fonts: Playfair Display (Luxury Editorial), Plus Jakarta Sans (Modern Sans), Caveat (Signature Touch), Great Vibes (Premium Script) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Great+Vibes&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        [x-cloak] { display: none !important; }

        .font-display {
            font-family: 'Playfair Display', Georgia, serif;
        }
        .font-signature {
            font-family: 'Caveat', cursive;
        }
        .font-script {
            font-family: 'Great Vibes', cursive;
        }
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: #1E2520;
        }

        /* Arch photo frame */
        .arch-frame {
            border-radius: 9999px 9999px 1.5rem 1.5rem;
        }

        /* ============================================================
           LUXURY BOTANICAL & GOLD KEYFRAME ANIMATIONS
           ============================================================ */
        @keyframes goldShimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        .animate-shimmer {
            background: linear-gradient(90deg, #C5A880 0%, #F5E5C9 30%, #E2C799 50%, #F5E5C9 70%, #C5A880 100%);
            background-size: 200% 100%;
            animation: goldShimmer 3.5s linear infinite;
        }

        @keyframes pulseGlow {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(197, 168, 128, 0.6);
            }
            50% {
                transform: scale(1.02);
                box-shadow: 0 0 25px 6px rgba(197, 168, 128, 0.4);
            }
        }
        .animate-pulse-glow {
            animation: pulseGlow 3s ease-in-out infinite;
        }

        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-8px) rotate(3deg); }
        }
        .animate-float {
            animation: floatSlow 4s ease-in-out infinite;
        }

        @keyframes floatReverse {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(8px) rotate(-3deg); }
        }
        .animate-float-reverse {
            animation: floatReverse 4.5s ease-in-out infinite;
        }

        /* Petal Rain Particle System — Multiple Botanical Petals */
        @keyframes petalFall1 {
            0%   { transform: translate3d(0, -20px, 0) rotate(0deg) scale(0.8); opacity: 0; }
            10%  { opacity: 0.7; }
            90%  { opacity: 0.5; }
            100% { transform: translate3d(40px, 700px, 0) rotate(420deg) scale(0.4); opacity: 0; }
        }
        @keyframes petalFall2 {
            0%   { transform: translate3d(0, -20px, 0) rotate(-30deg) scale(0.9); opacity: 0; }
            12%  { opacity: 0.65; }
            88%  { opacity: 0.45; }
            100% { transform: translate3d(-35px, 680px, 0) rotate(-300deg) scale(0.35); opacity: 0; }
        }
        @keyframes petalFall3 {
            0%   { transform: translate3d(0, -15px, 0) rotate(15deg) scale(0.7); opacity: 0; }
            15%  { opacity: 0.6; }
            85%  { opacity: 0.4; }
            100% { transform: translate3d(55px, 720px, 0) rotate(540deg) scale(0.3); opacity: 0; }
        }
        @keyframes petalSway {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(12px); }
            75% { transform: translateX(-12px); }
        }
        .petal-1 { animation: petalFall1 16s linear infinite; }
        .petal-2 { animation: petalFall2 20s linear infinite 3s; }
        .petal-3 { animation: petalFall3 18s linear infinite 7s; }
        .petal-4 { animation: petalFall1 22s linear infinite 10s; }
        .petal-5 { animation: petalFall2 15s linear infinite 5s; }

        /* Soundwave Equalizer Bars */
        @keyframes soundwave1 {
            0%, 100% { height: 4px; }
            50% { height: 16px; }
        }
        @keyframes soundwave2 {
            0%, 100% { height: 14px; }
            50% { height: 6px; }
        }
        @keyframes soundwave3 {
            0%, 100% { height: 8px; }
            50% { height: 18px; }
        }
        .bar-1 { animation: soundwave1 1s ease-in-out infinite; }
        .bar-2 { animation: soundwave2 0.8s ease-in-out infinite 0.2s; }
        .bar-3 { animation: soundwave3 1.1s ease-in-out infinite 0.4s; }

        /* Metallic Gold Foil Text — Animated Gradient Sweep */
        .gold-foil-text {
            background: linear-gradient(135deg, #F2EBD9 0%, #E8C88A 20%, #C5A880 40%, #F5E5C9 60%, #E8C88A 80%, #F2EBD9 100%);
            background-size: 250% 100%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: goldTextSweep 4s ease-in-out infinite;
        }
        @keyframes goldTextSweep {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Rotating Botanical Mandala Ornament */
        @keyframes rotateMandala {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .rotate-mandala {
            animation: rotateMandala 45s linear infinite;
        }
        .rotate-mandala-reverse {
            animation: rotateMandala 60s linear infinite reverse;
        }

        /* Gold Border Pulse Glow on Cards */
        @keyframes borderGoldPulse {
            0%, 100% { border-color: rgba(197, 168, 128, 0.3); box-shadow: 0 0 0 0 rgba(197, 168, 128, 0); }
            50% { border-color: rgba(197, 168, 128, 0.7); box-shadow: 0 0 18px 2px rgba(197, 168, 128, 0.15); }
        }
        .border-gold-pulse {
            animation: borderGoldPulse 3.5s ease-in-out infinite;
        }

        /* Typewriter Cursor Blink */
        @keyframes cursorBlink {
            0%, 50% { border-color: #C5A880; }
            51%, 100% { border-color: transparent; }
        }
        .typewriter-cursor {
            border-right: 2px solid #C5A880;
            animation: cursorBlink 1s step-end infinite;
        }

        /* Signature Stroke Draw Animation */
        @keyframes signatureDraw {
            0% { stroke-dashoffset: 600; opacity: 0.3; }
            20% { opacity: 1; }
            100% { stroke-dashoffset: 0; opacity: 1; }
        }

        /* Staggered Cascade for Countdown Boxes */
        .cascade-1 { transition-delay: 0ms; }
        .cascade-2 { transition-delay: 120ms; }
        .cascade-3 { transition-delay: 240ms; }
        .cascade-4 { transition-delay: 360ms; }

        /* 3D Tilt Card Effect */
        .tilt-card {
            transform-style: preserve-3d;
            transition: transform 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .tilt-card:hover {
            transform: perspective(800px) rotateY(-3deg) rotateX(3deg) scale(1.03);
        }

        /* Glassmorphism Section Divider */
        .glass-divider {
            background: linear-gradient(135deg, rgba(197, 168, 128, 0.08) 0%, rgba(242, 235, 217, 0.12) 50%, rgba(197, 168, 128, 0.08) 100%);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        /* Lightbox Modal */
        .lightbox-overlay {
            background: rgba(30, 37, 32, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Shimmer Skeleton Loading for Gallery */
        @keyframes shimmerLoad {
            0% { background-position: -468px 0; }
            100% { background-position: 468px 0; }
        }

        /* Interactive Hover Lift */
        .hover-lift {
            transition: transform 0.35s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.35s ease;
        }
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(197, 168, 128, 0.2);
        }

        /* ============================================================
           SCROLL-DRIVEN REVEAL ANIMATIONS (Optimized for Inner Container)
           ============================================================ */
        .scroll-reveal {
            opacity: 0;
            will-change: opacity, transform;
            transition-property: opacity, transform;
            transition-duration: 0.9s;
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal-zoom {
            transform: scale(0.65);
        }
        .reveal-zoom.revealed {
            opacity: 1 !important;
            transform: scale(1) !important;
        }

        .reveal-left {
            transform: translateX(-45px);
        }
        .reveal-left.revealed {
            opacity: 1 !important;
            transform: translateX(0) !important;
        }

        .reveal-right {
            transform: translateX(45px);
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

        .reveal-down {
            transform: translateY(-30px);
        }
        .reveal-down.revealed {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        .reveal-flip {
            transform: perspective(900px) rotateX(25deg) translateY(25px);
        }
        .reveal-flip.revealed {
            opacity: 1 !important;
            transform: perspective(900px) rotateX(0deg) translateY(0) !important;
        }

        .reveal-rotate {
            transform: rotate(-8deg) scale(0.85);
        }
        .reveal-rotate.revealed {
            opacity: 1 !important;
            transform: rotate(0deg) scale(1) !important;
        }

        .delay-75  { transition-delay: 75ms; }
        .delay-100 { transition-delay: 100ms; }
        .delay-150 { transition-delay: 150ms; }
        .delay-200 { transition-delay: 200ms; }
        .delay-250 { transition-delay: 250ms; }
        .delay-300 { transition-delay: 300ms; }
        .delay-400 { transition-delay: 400ms; }
        .delay-500 { transition-delay: 500ms; }
        .delay-600 { transition-delay: 600ms; }
        .delay-700 { transition-delay: 700ms; }

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
            background: rgba(52, 61, 53, 0.05);
        }
        #invitation-content::-webkit-scrollbar-thumb {
            background: rgba(197, 168, 128, 0.6);
            border-radius: 9999px;
        }
    </style>
</head>
<body class="bg-[#1E2520] text-[#343D35] antialiased min-h-screen">

    {{-- ============================================================
         DESKTOP LEFT SIDE: Editorial Magazine Cover (Fixed 7/12)
         ============================================================ --}}
    <aside class="hidden lg:flex lg:w-7/12 fixed inset-y-0 left-0 overflow-hidden flex-col justify-between p-12 xl:p-16 text-[#F2EBD9]">
        {{-- Full-height prewedding photo with #242A25/75 dark emerald overlay --}}
        <div class="absolute inset-0">
            <img
                src="{{ $invitation->cover_image ?? 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=1600&q=80' }}"
                alt="Foto Prewedding {{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}"
                class="w-full h-full object-cover object-center filter contrast-[1.05]"
            />
            <div class="absolute inset-0 bg-[#242A25]/75 backdrop-blur-[1px]"></div>
        </div>

        {{-- Botanical Ornaments & Floating Leaf Accents --}}
        <div class="absolute inset-0 pointer-events-none overflow-hidden opacity-25">
            <svg class="absolute -top-12 -left-12 w-88 h-88 text-[#C5A880] animate-float" viewBox="0 0 300 300" fill="currentColor">
                <circle cx="150" cy="150" r="140" stroke="currentColor" stroke-width="1.5" fill="none" />
                <path d="M150 30 Q170 90 150 150 Q130 90 150 30Z" opacity="0.6"/>
                <path d="M30 150 Q90 170 150 150 Q90 130 30 150Z" opacity="0.6"/>
                <path d="M150 270 Q170 210 150 150 Q130 210 150 270Z" opacity="0.6"/>
                <path d="M270 150 Q210 170 150 150 Q210 130 270 150Z" opacity="0.6"/>
            </svg>
            <svg class="absolute -bottom-16 -right-16 w-96 h-96 text-[#C5A880] animate-float-reverse" viewBox="0 0 200 200" fill="none">
                <path d="M100 0 C100 0 160 40 200 100 C160 160 100 200 100 200 C100 200 40 160 0 100 C40 40 100 0 100 0Z" stroke="currentColor" stroke-width="1"/>
                <path d="M100 30 C100 30 145 60 170 100 C145 140 100 170 100 170 C100 170 55 140 30 100 C55 60 100 30 100 30Z" stroke="currentColor" stroke-width="0.8" opacity="0.7"/>
            </svg>
        </div>

        {{-- Top Badge --}}
        <div class="relative z-10">
            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full border border-[#C5A880]/50 bg-[#1E2520]/70 backdrop-blur-md text-[#C5A880] text-xs uppercase tracking-[0.25em] font-semibold shadow-lg">
                <span class="w-2 h-2 rounded-full bg-[#C5A880] animate-pulse"></span>
                <span>The Luxury Botanical Wedding (Rp 149.000)</span>
            </div>
        </div>

        {{-- Editorial Typography Center --}}
        <div class="relative z-10 max-w-xl my-auto py-8">
            <p class="font-display italic text-[#C5A880] text-2xl mb-3 tracking-wide flex items-center gap-2">
                <span>The Wedding of</span>
                <span class="h-px w-12 bg-[#C5A880]/60"></span>
            </p>
            <h1 class="font-display text-5xl xl:text-7xl font-bold text-[#F2EBD9] leading-tight mb-6">
                <span class="gold-foil-text">{{ $invitation->groom_nickname }}</span>
                <span class="text-[#C5A880] font-display italic font-light mx-2">&amp;</span>
                <span class="gold-foil-text">{{ $invitation->bride_nickname }}</span>
            </h1>

            {{-- Gold Divider with Diamond Flower --}}
            <div class="flex items-center gap-4 my-6 max-w-sm">
                <div class="h-px flex-1 bg-gradient-to-r from-transparent via-[#C5A880] to-transparent"></div>
                <span class="text-[#C5A880] text-base">✦ 🌿 ✦</span>
                <div class="h-px flex-1 bg-gradient-to-r from-transparent via-[#C5A880] to-transparent"></div>
            </div>

            <p class="text-[#F2EBD9] text-xl font-medium tracking-wide mb-1">
                {{ $invitation->event_date->translatedFormat('l, d F Y') }}
            </p>
            <p class="text-[#F2EBD9]/75 text-sm mb-8 flex items-center gap-2">
                <svg class="w-4 h-4 text-[#C5A880]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>{{ $invitation->venue_name }} &bull; {{ $invitation->venue_address }}</span>
            </p>

            <blockquote class="border-l-2 border-[#C5A880] pl-5 text-[#F2EBD9]/85 text-sm italic leading-relaxed max-w-md bg-[#1E2520]/40 p-4 rounded-r-2xl shadow-sm">
                "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya..."
                <footer class="text-xs text-[#C5A880] mt-2 font-normal not-italic tracking-wider font-sans">— QS. Ar-Rum: 21</footer>
            </blockquote>
        </div>

        {{-- Bottom Footer --}}
        <div class="relative z-10 flex items-center justify-between text-xs text-[#F2EBD9]/70 tracking-wider">
            <a href="https://wa.me/6285749739342?text={{ urlencode('Halo Admin GA Digital, saya sedang melihat demo tema Leafy Botanical (Rp 149.000) dan tertarik untuk memesan tema ini. Boleh minta info pemesanannya kak?') }}"
               target="_blank" rel="noopener noreferrer"
               class="hover:text-[#C5A880] transition-colors flex items-center gap-1.5 font-semibold text-[#C5A880]">
                <span>Pesan Tema Ini via WhatsApp &rarr;</span>
            </a>
            <div class="flex items-center gap-2 text-[#C5A880] font-medium">
                <span>Buka undangan di layar samping</span>
                <span class="animate-bounce">&rarr;</span>
            </div>
        </div>
    </aside>

    {{-- ============================================================
         RIGHT SIDE VIEWPORT: Mobile Smartphone Container
         ============================================================ --}}
    <main class="w-full lg:w-5/12 lg:ml-auto min-h-screen flex justify-center items-center py-0 lg:py-6">

        {{-- Mobile Container (Phone frame with Gold Trim) --}}
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
                activeTabGift: 'bca',
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

                    // Trigger celebratory gold botanical confetti
                    if (typeof confetti === 'function') {
                        confetti({
                            particleCount: 65,
                            spread: 75,
                            origin: { y: 0.7 },
                            colors: ['#C5A880', '#D4AF37', '#343D35', '#F2EBD9', '#E8C88A']
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
                openLightbox(imgSrc) {
                    this.lightboxImage = imgSrc;
                },
                closeLightbox() {
                    this.lightboxImage = null;
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
                        
                        // Trigger celebratory confetti on wish submit
                        if (typeof confetti === 'function') {
                            confetti({
                                particleCount: 70,
                                spread: 80,
                                origin: { y: 0.6 },
                                colors: ['#C5A880', '#D4AF37', '#343D35', '#FAF6EC', '#E8C88A']
                            });
                        }

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
            class="w-full max-w-md h-screen lg:h-[94vh] bg-[#F2EBD9] text-[#343D35] relative shadow-2xl lg:rounded-3xl border border-[#C5A880]/30 overflow-hidden"
        >
            {{-- Background Audio Element: Arctic Monkeys - I Wanna Be Yours with local fallback --}}
            <audio id="weddingAudio" loop preload="none">
                <source src="{{ $invitation->audio_url ?: asset('audio/i-wanna-be-yours.mp3') }}" type="audio/mpeg">
                <source src="{{ asset('audio/i-wanna-be-yours.mp3') }}" type="audio/mpeg">
            </audio>

            {{-- ========================================================
                 COVER OVERLAY PEMBUKA (absolute inset-0 z-50)
                 ======================================================== --}}
            <div
                id="cover-overlay"
                class="absolute inset-0 z-50 flex flex-col justify-between p-8 bg-gradient-to-b from-[#242A25] via-[#2E362F] to-[#1C221D] text-[#F2EBD9] transition-transform duration-1000 ease-in-out"
                :class="{ '-translate-y-full pointer-events-none': isOpen }"
            >
                {{-- Background overlay image with dark emerald tint --}}
                <div class="absolute inset-0 pointer-events-none overflow-hidden">
                    <img
                        src="{{ $invitation->cover_image ?? 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=80' }}"
                        alt="Background Cover"
                        class="w-full h-full object-cover opacity-25 scale-105 filter blur-[1px]"
                    />
                    <div class="absolute inset-0 bg-gradient-to-b from-[#242A25]/90 via-[#2E362F]/95 to-[#1C221D]"></div>
                </div>

                {{-- Botanical Corner Illustrations --}}
                <div class="absolute top-0 right-0 w-36 h-36 opacity-20 pointer-events-none animate-float">
                    <svg viewBox="0 0 100 100" fill="none" class="w-full h-full text-[#C5A880]">
                        <circle cx="50" cy="50" r="45" stroke="currentColor" stroke-width="0.8"/>
                        <path d="M50 5 Q60 35 50 50 Q40 35 50 5Z" fill="currentColor"/>
                        <path d="M5 50 Q35 60 50 50 Q35 40 5 50Z" fill="currentColor"/>
                    </svg>
                </div>

                {{-- Top Label with Wax Seal Badge --}}
                <div class="relative z-10 text-center pt-2">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full border border-[#C5A880]/40 bg-[#1C221D]/60 backdrop-blur-sm text-[#C5A880] text-[10px] uppercase tracking-[0.35em] font-bold">
                        <span>Walimatul 'Urs</span>
                    </div>
                </div>

                {{-- Center Content: Arch Photo, Title, Names, Date --}}
                <div class="relative z-10 text-center my-auto py-2">
                    {{-- Arch Photo Frame with Gold Border & Glowing Pulse --}}
                    <div class="arch-frame w-28 h-36 mx-auto border-2 border-[#C5A880] p-1 bg-[#1C221D] overflow-hidden shadow-2xl mb-4 animate-pulse-glow">
                        <img
                            src="{{ $invitation->cover_image ?? 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=600&q=80' }}"
                            alt="{{ $invitation->groom_nickname }} & {{ $invitation->bride_nickname }}"
                            class="w-full h-full object-cover arch-frame"
                        />
                    </div>

                    <p class="text-[#C5A880] text-[11px] uppercase tracking-[0.3em] font-medium mb-1">
                        THE WEDDING OF
                    </p>
                    <h1 class="font-display text-3xl sm:text-4xl font-bold text-[#F2EBD9] leading-tight">
                        <span class="gold-foil-text">{{ $invitation->groom_nickname }}</span>
                        <span class="text-[#C5A880] font-display italic text-2xl font-light mx-1">&amp;</span>
                        <span class="gold-foil-text">{{ $invitation->bride_nickname }}</span>
                    </h1>

                    <div class="flex items-center justify-center gap-3 my-3">
                        <div class="h-px w-10 bg-gradient-to-r from-transparent to-[#C5A880]"></div>
                        <span class="text-[#C5A880] text-xs">✦ 🌿 ✦</span>
                        <div class="h-px w-10 bg-gradient-to-l from-transparent to-[#C5A880]"></div>
                    </div>

                    <p class="text-xs text-[#F2EBD9]/85 font-medium tracking-wider">
                        {{ $invitation->event_date->translatedFormat('d F Y') }}
                    </p>
                </div>

                {{-- Bottom: Dynamic Guest Card & Open Button --}}
                <div class="relative z-10">
                    <div class="bg-[#FAF6EC]/95 backdrop-blur-md rounded-2xl p-4 mb-4 shadow-xl border border-[#C5A880]/50 text-center">
                        <p class="text-[11px] uppercase tracking-wider text-[#343D35]/70 font-semibold">Kepada Yth. Bapak/Ibu/Saudara/i:</p>
                        <div class="font-bold text-lg text-[#343D35] mt-1">{{ request('to', $guestName ?: 'Tamu Undangan') }}</div>
                        <p class="text-[10px] text-[#343D35]/50 italic mt-1">Tanpa mengurangi rasa hormat, kami mengundang Anda untuk hadir</p>
                    </div>

                    {{-- Shimmering Button "Buka Undangan" --}}
                    <button
                        id="btn-buka-undangan"
                        type="button"
                        @click="openInvitation()"
                        class="w-full animate-shimmer text-[#242A25] font-bold py-3.5 px-6 rounded-full shadow-xl flex items-center justify-center gap-2.5 hover:scale-[1.02] active:scale-[0.98] transition-transform duration-300 cursor-pointer"
                    >
                        <svg class="w-5 h-5 text-[#242A25]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="tracking-wider uppercase text-xs">Buka Undangan</span>
                    </button>

                    <p class="text-[10px] text-center text-[#F2EBD9]/50 mt-3 tracking-wider">
                        Alunan musik otomatis diputar saat undangan dibuka 🎵
                    </p>
                </div>
            </div>

            {{-- ========================================================
                 FLOATING MUSIC CONTROLLER (Gold Vinyl + Equalizer Visualizer)
                 ======================================================== --}}
            <button
                type="button"
                x-show="isOpen"
                x-transition:enter="transition ease-out duration-500 delay-300"
                x-transition:enter-start="opacity-0 scale-75"
                x-transition:enter-end="opacity-100 scale-100"
                @click="toggleAudio()"
                class="absolute bottom-20 right-4 bg-[#242A25] text-[#F2EBD9] shadow-2xl p-3 rounded-full z-40 border-2 border-[#C5A880] flex items-center gap-2 hover:scale-105 active:scale-95 transition-transform cursor-pointer"
                title="Putar / Jeda Musik"
                aria-label="Toggle Musik"
            >
                {{-- Rotating Disc Icon --}}
                <div class="w-6 h-6 rounded-full border border-[#C5A880]/60 flex items-center justify-center" :class="{ 'animate-spin': isPlaying }" style="animation-duration: 4s;">
                    <div class="w-2.5 h-2.5 rounded-full bg-[#C5A880]"></div>
                </div>

                {{-- Mini Soundwave Equalizer Bars --}}
                <div class="flex items-end gap-1 h-4 px-1" x-show="isPlaying">
                    <span class="w-1 bg-[#C5A880] rounded-full bar-1"></span>
                    <span class="w-1 bg-[#C5A880] rounded-full bar-2"></span>
                    <span class="w-1 bg-[#C5A880] rounded-full bar-3"></span>
                </div>
            </button>

            {{-- ========================================================
                 FLOATING QUICK NAVIGATION DOCK (Glassmorphism Gold)
                 ======================================================== --}}
            <nav class="absolute bottom-3 left-4 right-4 z-40 bg-[#242A25]/90 backdrop-blur-md border border-[#C5A880]/40 rounded-full px-3 py-2 shadow-2xl flex items-center justify-around text-[#F2EBD9]">
                <a href="#hero-section" class="flex flex-col items-center text-[10px] text-[#F2EBD9]/70 hover:text-[#C5A880] transition-colors py-1">
                    <svg class="w-4 h-4 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Home</span>
                </a>
                <a href="#mempelai-section" class="flex flex-col items-center text-[10px] text-[#F2EBD9]/70 hover:text-[#C5A880] transition-colors py-1">
                    <svg class="w-4 h-4 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    <span>Mempelai</span>
                </a>
                <a href="#acara-section" class="flex flex-col items-center text-[10px] text-[#F2EBD9]/70 hover:text-[#C5A880] transition-colors py-1">
                    <svg class="w-4 h-4 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Acara</span>
                </a>
                <a href="#story-section" class="flex flex-col items-center text-[10px] text-[#F2EBD9]/70 hover:text-[#C5A880] transition-colors py-1">
                    <svg class="w-4 h-4 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    <span>Story</span>
                </a>
                <a href="#galeri-section" class="flex flex-col items-center text-[10px] text-[#F2EBD9]/70 hover:text-[#C5A880] transition-colors py-1">
                    <svg class="w-4 h-4 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Galeri</span>
                </a>
                <a href="#gift-section" class="flex flex-col items-center text-[10px] text-[#F2EBD9]/70 hover:text-[#C5A880] transition-colors py-1">
                    <svg class="w-4 h-4 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                    <span>Hadiah</span>
                </a>
                <a href="#rsvp-section" class="flex flex-col items-center text-[10px] text-[#F2EBD9]/70 hover:text-[#C5A880] transition-colors py-1">
                    <svg class="w-4 h-4 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                    <span>Ucapan</span>
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
                {{-- Multi-Petal Rain Particle System inside Mobile Container --}}
                <div class="pointer-events-none absolute inset-0 overflow-hidden z-20">
                    <svg class="petal-1 absolute top-0 left-8 w-5 h-5 text-[#C5A880]/35" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C8 6 6 11 7 16C8 20 12 22 12 22C12 22 16 20 17 16C18 11 16 6 12 2Z"/>
                    </svg>
                    <svg class="petal-2 absolute top-0 right-10 w-6 h-6 text-[#343D35]/20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17 8C8 10 5 16 5 21C10 21 16 18 18 9C19 4 19 3 19 3C19 3 18 3 17 8Z"/>
                    </svg>
                    <svg class="petal-3 absolute top-0 left-1/2 w-4 h-4 text-[#D4AF37]/30" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C8 6 6 11 7 16C8 20 12 22 12 22C12 22 16 20 17 16C18 11 16 6 12 2Z"/>
                    </svg>
                    <svg class="petal-4 absolute top-0 left-1/4 w-5 h-5 text-[#C5A880]/25" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17 8C8 10 5 16 5 21C10 21 16 18 18 9C19 4 19 3 19 3C19 3 18 3 17 8Z"/>
                    </svg>
                    <svg class="petal-5 absolute top-0 right-1/4 w-6 h-6 text-[#465247]/20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C8 6 6 11 7 16C8 20 12 22 12 22C12 22 16 20 17 16C18 11 16 6 12 2Z"/>
                    </svg>
                </div>

                <div class="space-y-12">
                    {{-- ── SECTION 1: HERO INSIDE CONTAINER ─────────────────── --}}
                    <section id="hero-section" class="pt-16 pb-12 px-6 text-center relative overflow-hidden bg-gradient-to-b from-[#FAF6EC] via-[#F2EBD9] to-[#F2EBD9]">
                        {{-- Rotating Botanical Mandala Background Watermark --}}
                        <div class="absolute -top-16 -right-16 w-64 h-64 pointer-events-none opacity-10 rotate-mandala">
                            <svg viewBox="0 0 200 200" fill="currentColor" class="text-[#343D35] w-full h-full">
                                <circle cx="100" cy="100" r="90" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                <path d="M100 10 Q120 70 100 100 Q80 70 100 10Z"/>
                                <path d="M100 190 Q120 130 100 100 Q80 130 100 190Z"/>
                                <path d="M10 100 Q70 120 100 100 Q70 80 10 100Z"/>
                                <path d="M190 100 Q130 120 100 100 Q130 80 190 100Z"/>
                                <circle cx="100" cy="100" r="50" stroke="currentColor" stroke-width="1" fill="none"/>
                            </svg>
                        </div>

                        {{-- Top Badge with Gold Pill & Pulse --}}
                        <div class="scroll-reveal reveal-zoom">
                            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#343D35] text-[#F2EBD9] text-[10px] font-bold tracking-[0.28em] uppercase shadow-md border border-[#C5A880]/30">
                                <span class="w-2 h-2 rounded-full bg-[#C5A880] animate-pulse"></span>
                                The Wedding Celebration
                            </span>
                        </div>

                        {{-- Hero Image in Gold Arch Frame with Floating and Pulse Glow --}}
                        <div class="my-6 scroll-reveal reveal-zoom delay-100">
                            <div class="arch-frame w-48 h-64 mx-auto border-4 border-[#FAF6EC] shadow-2xl overflow-hidden relative bg-[#E6DEC8] animate-float animate-pulse-glow">
                                <img
                                    src="{{ $invitation->cover_image ?? 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=80' }}"
                                    alt="Foto Pasangan"
                                    class="w-full h-full object-cover object-center arch-frame"
                                />
                                <div class="absolute inset-0 bg-gradient-to-t from-[#242A25]/60 via-transparent to-transparent"></div>
                                {{-- Mini floating botanical badge at bottom of photo --}}
                                <div class="absolute bottom-3 inset-x-0 text-center">
                                    <span class="font-script text-2xl text-[#F5E5C9] drop-shadow-md">Forever &amp; Always</span>
                                </div>
                            </div>
                        </div>

                        {{-- Names & Date with Gold Foil sweep --}}
                        <div class="scroll-reveal reveal-up delay-150">
                            <p class="font-script text-2xl text-[#C5A880] mb-0.5">Walimatul 'Urs</p>
                            <h2 class="font-display text-3xl sm:text-4xl font-bold text-[#343D35] leading-tight">
                                <span class="gold-foil-text">{{ $invitation->groom_nickname }}</span>
                                <span class="text-[#C5A880] font-display italic font-light mx-1">&amp;</span>
                                <span class="gold-foil-text">{{ $invitation->bride_nickname }}</span>
                            </h2>
                            <div class="flex items-center justify-center gap-2 mt-2">
                                <span class="h-px w-8 bg-[#C5A880]/60"></span>
                                <p class="text-xs uppercase tracking-[0.25em] text-[#C5A880] font-semibold">
                                    {{ $invitation->event_date->translatedFormat('l, d F Y') }}
                                </p>
                                <span class="h-px w-8 bg-[#C5A880]/60"></span>
                            </div>
                        </div>

                        {{-- Bismillah Calligraphy --}}
                        <div class="mt-8 scroll-reveal reveal-zoom delay-200">
                            <p class="font-display text-2xl text-[#343D35] mb-2 leading-relaxed">بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ</p>
                            <p class="text-[11px] uppercase tracking-widest text-[#343D35]/60 font-semibold mb-3">Assalamu'alaikum Warahmatullahi Wabarakatuh</p>
                            <p class="text-xs text-[#343D35]/80 leading-relaxed max-w-xs mx-auto">
                                Dengan memohon rahmat dan ridho Allah Subhanahu Wa Ta'ala, kami bermaksud menyelenggarakan syukuran pernikahan putra-putri kami:
                            </p>
                        </div>

                        {{-- Kartu QS. Ar-Rum: 21 (Zoom In) with Gold Pulse Border --}}
                        <div class="mt-6 bg-[#FAF6EC] border border-[#C5A880]/40 rounded-3xl p-6 text-center shadow-md scroll-reveal reveal-zoom delay-250 border-gold-pulse relative overflow-hidden">
                            <div class="absolute -top-6 -left-6 w-16 h-16 opacity-10 pointer-events-none">
                                <svg viewBox="0 0 100 100" fill="currentColor" class="text-[#C5A880]"><circle cx="50" cy="50" r="45"/></svg>
                            </div>
                            <p class="text-[10px] uppercase tracking-widest text-[#C5A880] font-bold mb-2">✦ QS. Ar-Rum: 21 ✦</p>
                            <p class="font-display text-xs italic text-[#343D35] leading-relaxed mb-3">
                                "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang..."
                            </p>
                            <span class="text-[10px] text-[#C5A880] font-semibold tracking-wider font-sans">&mdash; Maha Benar Allah dengan Segala Firman-Nya</span>
                        </div>
                    </section>

                    {{-- ── SECTION 2: PROFIL MEMPELAI (GROOM & BRIDE) ────────── --}}
                    <section id="mempelai-section" class="py-12 px-6 relative">
                        {{-- Rotating Botanical Mandala Watermark --}}
                        <div class="absolute -bottom-10 -left-16 w-56 h-56 pointer-events-none opacity-10 rotate-mandala-reverse">
                            <svg viewBox="0 0 200 200" fill="currentColor" class="text-[#C5A880] w-full h-full">
                                <circle cx="100" cy="100" r="90" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                <path d="M100 10 Q120 70 100 100 Q80 70 100 10Z"/>
                                <path d="M100 190 Q120 130 100 100 Q80 130 100 190Z"/>
                            </svg>
                        </div>

                        <div class="text-center mb-8 scroll-reveal reveal-up">
                            <span class="text-[#C5A880] text-xs uppercase tracking-widest font-semibold">Mempelai</span>
                            <h2 class="font-display text-2xl font-bold text-[#343D35] mt-1">Kedua Mempelai</h2>
                            <p class="font-script text-xl text-[#C5A880] mt-0.5">The Happy Couple</p>
                        </div>

                        {{-- Mempelai Pria: 3D Tilt Card + Gold Pulse + Meluncur dari KIRI --}}
                        <div class="bg-[#FAF6EC] rounded-3xl p-6 text-center border border-[#C5A880]/30 shadow-md mb-6 scroll-reveal reveal-left group hover:shadow-2xl transition-all duration-300 tilt-card border-gold-pulse relative overflow-hidden">
                            <div class="absolute top-3 right-3">
                                <span class="text-[10px] font-bold text-[#C5A880] bg-[#343D35] px-2.5 py-0.5 rounded-full shadow-sm">Groom</span>
                            </div>

                            <div class="arch-frame w-40 h-52 mx-auto border-2 border-[#C5A880] p-1 bg-[#E6DEC8] overflow-hidden mb-4 shadow-md scroll-reveal reveal-zoom delay-150">
                                <img
                                    src="{{ $invitation->cover_image ?? 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=400&q=80' }}"
                                    alt="{{ $invitation->groom_fullname }}"
                                    class="w-full h-full object-cover object-top arch-frame transition-transform duration-700 group-hover:scale-108"
                                />
                            </div>
                            <span class="px-3 py-0.5 rounded-full bg-[#343D35] text-[#F2EBD9] text-[10px] uppercase tracking-widest font-semibold inline-block mb-1.5">Mempelai Pria</span>
                            <h3 class="font-display font-bold text-xl text-[#343D35] mb-1">{{ $invitation->groom_fullname }}</h3>
                            <p class="font-script text-2xl text-[#C5A880] mb-2">{{ $invitation->groom_nickname }}</p>
                            <p class="text-xs text-[#343D35]/70 leading-relaxed max-w-xs mx-auto mb-3">{{ $invitation->groom_parents }}</p>
                            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs text-[#C5A880] font-semibold hover:underline bg-[#343D35]/5 px-3 py-1 rounded-full">
                                <span>@zian.pratama</span>
                                <span>&rarr;</span>
                            </a>
                        </div>

                        {{-- Animated Ampersand Divider with Revolving Leaves Ring --}}
                        <div class="flex items-center justify-center gap-4 my-6 scroll-reveal reveal-zoom delay-100">
                            <div class="h-px w-16 bg-[#C5A880]/50"></div>
                            <div class="w-12 h-12 rounded-full bg-[#343D35] text-[#C5A880] border-2 border-[#C5A880] flex items-center justify-center font-display text-2xl italic shadow-md animate-pulse">
                                &amp;
                            </div>
                            <div class="h-px w-16 bg-[#C5A880]/50"></div>
                        </div>

                        {{-- Mempelai Wanita: 3D Tilt Card + Gold Pulse + Meluncur dari KANAN --}}
                        <div class="bg-[#FAF6EC] rounded-3xl p-6 text-center border border-[#C5A880]/30 shadow-md scroll-reveal reveal-right group hover:shadow-2xl transition-all duration-300 tilt-card border-gold-pulse relative overflow-hidden">
                            <div class="absolute top-3 right-3">
                                <span class="text-[10px] font-bold text-[#C5A880] bg-[#343D35] px-2.5 py-0.5 rounded-full shadow-sm">Bride</span>
                            </div>

                            <div class="arch-frame w-40 h-52 mx-auto border-2 border-[#C5A880] p-1 bg-[#E6DEC8] overflow-hidden mb-4 shadow-md scroll-reveal reveal-zoom delay-150">
                                <img
                                    src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?auto=format&fit=crop&w=400&q=80"
                                    alt="{{ $invitation->bride_fullname }}"
                                    class="w-full h-full object-cover object-top arch-frame transition-transform duration-700 group-hover:scale-108"
                                />
                            </div>
                            <span class="px-3 py-0.5 rounded-full bg-[#343D35] text-[#F2EBD9] text-[10px] uppercase tracking-widest font-semibold inline-block mb-1.5">Mempelai Wanita</span>
                            <h3 class="font-display font-bold text-xl text-[#343D35] mb-1">{{ $invitation->bride_fullname }}</h3>
                            <p class="font-script text-2xl text-[#C5A880] mb-2">{{ $invitation->bride_nickname }}</p>
                            <p class="text-xs text-[#343D35]/70 leading-relaxed max-w-xs mx-auto mb-3">{{ $invitation->bride_parents }}</p>
                            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs text-[#C5A880] font-semibold hover:underline bg-[#343D35]/5 px-3 py-1 rounded-full">
                                <span>@sahri.ramadhani</span>
                                        {{-- ── SECTION 3: COUNTDOWN TIMER ───────────────────────── --}}
                    <section class="py-12 px-6 text-center relative">
                        <div class="bg-gradient-to-br from-[#343D35] via-[#2A332B] to-[#1E2520] text-[#F2EBD9] rounded-3xl p-6 border border-[#C5A880]/40 shadow-2xl scroll-reveal reveal-zoom relative overflow-hidden border-gold-pulse">
                            {{-- Rotating Botanical Watermark --}}
                            <div class="absolute -right-10 -bottom-10 w-40 h-40 opacity-15 pointer-events-none rotate-mandala">
                                <svg viewBox="0 0 100 100" fill="currentColor" class="text-[#C5A880]">
                                    <circle cx="50" cy="50" r="45" stroke="currentColor" stroke-width="1.5" fill="none"/>
                                    <path d="M50 10 Q58 35 50 50 Q42 35 50 10Z"/>
                                    <path d="M50 90 Q58 65 50 50 Q42 65 50 90Z"/>
                                    <path d="M10 50 Q35 58 50 50 Q35 42 10 50Z"/>
                                    <path d="M90 50 Q65 58 50 50 Q65 42 90 50Z"/>
                                </svg>
                            </div>

                            <span class="text-[#C5A880] text-xs uppercase tracking-widest font-semibold">Menghitung Hari Bahagia</span>
                            <h2 class="font-display text-2xl font-bold mt-1 mb-6 text-[#F2EBD9]">
                                {{ $invitation->event_date->translatedFormat('d F Y') }}
                            </h2>

                            {{-- 4 Kotak Countdown: Staggered Cascade with Glowing Trim --}}
                            <div class="grid grid-cols-4 gap-2.5 max-w-xs mx-auto mb-6">
                                <div class="bg-[#1C221D]/90 backdrop-blur-sm text-[#F2EBD9] rounded-2xl py-3 px-1 border border-[#C5A880]/40 shadow-lg flex flex-col items-center hover-lift cascade-1">
                                    <span class="font-display font-bold text-2xl sm:text-3xl block text-[#F2EBD9]" x-text="countdown.days">00</span>
                                    <span class="text-[#C5A880] text-[9px] uppercase tracking-widest block mt-1 font-bold">Hari</span>
                                </div>
                                <div class="bg-[#1C221D]/90 backdrop-blur-sm text-[#F2EBD9] rounded-2xl py-3 px-1 border border-[#C5A880]/40 shadow-lg flex flex-col items-center hover-lift cascade-2">
                                    <span class="font-display font-bold text-2xl sm:text-3xl block text-[#F2EBD9]" x-text="countdown.hours">00</span>
                                    <span class="text-[#C5A880] text-[9px] uppercase tracking-widest block mt-1 font-bold">Jam</span>
                                </div>
                                <div class="bg-[#1C221D]/90 backdrop-blur-sm text-[#F2EBD9] rounded-2xl py-3 px-1 border border-[#C5A880]/40 shadow-lg flex flex-col items-center hover-lift cascade-3">
                                    <span class="font-display font-bold text-2xl sm:text-3xl block text-[#F2EBD9]" x-text="countdown.minutes">00</span>
                                    <span class="text-[#C5A880] text-[9px] uppercase tracking-widest block mt-1 font-bold">Menit</span>
                                </div>
                                <div class="bg-[#1C221D]/90 backdrop-blur-sm text-[#F2EBD9] rounded-2xl py-3 px-1 border border-[#C5A880]/50 shadow-lg flex flex-col items-center hover-lift cascade-4">
                                    <span class="font-display font-bold text-2xl sm:text-3xl block text-[#C5A880] animate-pulse" x-text="countdown.seconds">00</span>
                                    <span class="text-[#C5A880] text-[9px] uppercase tracking-widest block mt-1 font-bold">Detik</span>
                                </div>
                            </div>

                            {{-- Google Calendar CTA Button with Gold Shimmer --}}
                            <a
                                href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{ urlencode('Pernikahan Zian & Sahri') }}&dates={{ $invitation->event_date->format('Ymd\THis\Z') }}/{{ $invitation->event_date->addHours(6)->format('Ymd\THis\Z') }}&details={{ urlencode('Pernikahan Zian & Sahri di Grand Ballroom Hotel Mulia Senayan Jakarta') }}&location={{ urlencode($invitation->venue_address) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-[#C5A880] hover:bg-[#b0936d] text-[#242A25] text-xs font-bold tracking-wider transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 active:scale-95"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>Simpan ke Google Calendar</span>
                            </a>
                        </div>
                    </section>

                    {{-- ── SECTION 4: AGENDA ACARA (AKAD & RESEPSI) ──────────── --}}
                    <section id="acara-section" class="py-12 px-6">
                        <div class="text-center mb-8 scroll-reveal reveal-up">
                            <span class="text-[#C5A880] text-xs uppercase tracking-widest font-semibold">Rangkaian Acara</span>
                            <h2 class="font-display text-2xl font-bold text-[#343D35] mt-1">Agenda Acara</h2>
                            <p class="font-script text-xl text-[#C5A880] mt-0.5">Wedding Ceremonies</p>
                        </div>

                        {{-- Akad Nikah Card: 3D Tilt + Meluncur dari KIRI --}}
                        <div class="bg-gradient-to-br from-[#343D35] to-[#242A25] text-[#F2EBD9] rounded-3xl p-6 mb-5 shadow-xl border border-[#C5A880]/40 relative overflow-hidden scroll-reveal reveal-left tilt-card hover-lift border-gold-pulse">
                            <div class="absolute top-0 right-0 w-28 h-28 bg-[#C5A880]/10 rounded-bl-full pointer-events-none"></div>

                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-11 h-11 rounded-2xl bg-[#C5A880]/20 flex items-center justify-center flex-shrink-0 text-[#C5A880] border border-[#C5A880]/30 shadow-inner">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[#C5A880] text-[10px] uppercase tracking-widest font-semibold">Ijab Kabul</p>
                                        <h3 class="font-display font-bold text-xl text-[#F2EBD9]">Akad Nikah</h3>
                                    </div>
                                </div>
                                <span class="text-[10px] font-bold text-[#242A25] bg-[#C5A880] px-3 py-1 rounded-full shadow-sm">Sesi 1</span>
                            </div>

                            <div class="space-y-3 text-sm">
                                <div class="flex items-center gap-3 text-[#F2EBD9]/90 bg-[#1C221D]/50 p-2.5 rounded-xl border border-[#C5A880]/20">
                                    <svg class="w-4 h-4 text-[#C5A880] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="font-semibold">{{ $invitation->akad_time }}</span>
                                </div>
                                <div class="flex items-center gap-3 text-[#F2EBD9]/90 bg-[#1C221D]/50 p-2.5 rounded-xl border border-[#C5A880]/20">
                                    <svg class="w-4 h-4 text-[#C5A880] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>{{ $invitation->event_date->translatedFormat('l, d F Y') }}</span>
                                </div>
                                <div class="flex items-start gap-3 text-[#F2EBD9]/85 bg-[#1C221D]/50 p-2.5 rounded-xl border border-[#C5A880]/20">
                                    <svg class="w-4 h-4 text-[#C5A880] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>{{ $invitation->venue_name }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Glassmorphism Divider between Akad & Resepsi --}}
                        <div class="flex items-center justify-center gap-3 my-4">
                            <span class="h-px flex-1 bg-gradient-to-r from-transparent via-[#C5A880]/40 to-transparent"></span>
                            <span class="text-xs text-[#C5A880]">✦ 🌿 ✦</span>
                            <span class="h-px flex-1 bg-gradient-to-r from-transparent via-[#C5A880]/40 to-transparent"></span>
                        </div>

                        {{-- Resepsi Card: 3D Tilt + Meluncur dari KANAN --}}
                        <div class="bg-gradient-to-br from-[#343D35] to-[#242A25] text-[#F2EBD9] rounded-3xl p-6 mb-6 shadow-xl border border-[#C5A880]/40 relative overflow-hidden scroll-reveal reveal-right tilt-card hover-lift border-gold-pulse">
                            <div class="absolute top-0 right-0 w-28 h-28 bg-[#C5A880]/10 rounded-bl-full pointer-events-none"></div>

                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-11 h-11 rounded-2xl bg-[#C5A880]/20 flex items-center justify-center flex-shrink-0 text-[#C5A880] border border-[#C5A880]/30 shadow-inner">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-[#C5A880] text-[10px] uppercase tracking-widest font-semibold">Walimatul Ursy</p>
                                        <h3 class="font-display font-bold text-xl text-[#F2EBD9]">Resepsi Pernikahan</h3>
                                    </div>
                                </div>
                                <span class="text-[10px] font-bold text-[#242A25] bg-[#C5A880] px-3 py-1 rounded-full shadow-sm">Sesi 2</span>
                            </div>

                            <div class="space-y-3 text-sm mb-2">
                                <div class="flex items-center gap-3 text-[#F2EBD9]/90 bg-[#1C221D]/50 p-2.5 rounded-xl border border-[#C5A880]/20">
                                    <svg class="w-4 h-4 text-[#C5A880] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="font-semibold">{{ $invitation->resepsi_time }}</span>
                                </div>
                                <div class="flex items-center gap-3 text-[#F2EBD9]/90 bg-[#1C221D]/50 p-2.5 rounded-xl border border-[#C5A880]/20">
                                    <svg class="w-4 h-4 text-[#C5A880] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>{{ $invitation->event_date->translatedFormat('l, d F Y') }}</span>
                                </div>
                                <div class="flex items-start gap-3 text-[#F2EBD9]/85 bg-[#1C221D]/50 p-2.5 rounded-xl border border-[#C5A880]/20">
                                    <svg class="w-4 h-4 text-[#C5A880] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>{{ $invitation->venue_address }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Link Google Maps: Zoom In --}}
                        <div class="text-center scroll-reveal reveal-zoom delay-150">
                            <a
                                href="{{ $invitation->map_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center justify-center gap-2 bg-[#343D35] text-[#F2EBD9] px-7 py-3.5 rounded-full text-sm font-semibold hover:bg-[#465247] shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 active:scale-95 border border-[#C5A880]/30"
                            >
                                <svg class="w-4 h-4 text-[#C5A880]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>Buka Navigasi Google Maps</span>
                            </a>
                        </div>
                    </section>

                    {{-- ── SECTION 5: LOVE STORY TIMELINE (OUR JOURNEY) ───────── --}}
                    <section id="story-section" class="py-12 px-6">
                        <div class="text-center mb-8 scroll-reveal reveal-up">
                            <span class="text-[#C5A880] text-xs uppercase tracking-widest font-semibold">Perjalanan Cinta</span>
                            <h2 class="font-display text-2xl font-bold text-[#343D35] mt-1">Kisah Kami</h2>
                            <p class="font-script text-xl text-[#C5A880] mt-0.5">How Love Found Us</p>
                            <p class="text-xs text-[#343D35]/70 mt-2 max-w-xs mx-auto">
                                Setiap detik perjalanan adalah takdir indah yang menuntun kami menuju pelaminan.
                            </p>
                        </div>

                        {{-- Vertical Animated Timeline with Glowing Nodes --}}
                        <div class="relative border-l-2 border-[#C5A880]/60 ml-4 space-y-6">
                            {{-- Milestone 1 --}}
                            <div class="relative pl-6 scroll-reveal reveal-left">
                                <div class="absolute -left-3 top-1.5 w-6 h-6 rounded-full bg-[#343D35] border-2 border-[#C5A880] flex items-center justify-center text-xs text-[#C5A880] shadow-md ring-4 ring-[#C5A880]/20">
                                    ✦
                                </div>
                                <div class="bg-[#FAF6EC] p-5 rounded-2xl border border-[#C5A880]/40 shadow-sm tilt-card hover-lift">
                                    <span class="text-[10px] uppercase tracking-wider font-bold text-[#C5A880] bg-[#343D35] px-2.5 py-0.5 rounded-full inline-block mb-1.5">Tahun 2020</span>
                                    <h4 class="font-display font-bold text-base text-[#343D35] mt-0.5">Pertemuan Pertama</h4>
                                    <p class="text-xs text-[#343D35]/75 leading-relaxed mt-1">
                                        Berawal dari sebuah proyek kolaborasi di Jakarta, benih-benih kebaikan dan kecocokan mulai tumbuh di antara kami berdua.
                                    </p>
                                </div>
                            </div>

                            {{-- Milestone 2 --}}
                            <div class="relative pl-6 scroll-reveal reveal-right delay-100">
                                <div class="absolute -left-3 top-1.5 w-6 h-6 rounded-full bg-[#C5A880] border-2 border-[#343D35] flex items-center justify-center text-xs text-[#343D35] shadow-md ring-4 ring-[#C5A880]/30 animate-pulse">
                                    ♥
                                </div>
                                <div class="bg-[#FAF6EC] p-5 rounded-2xl border border-[#C5A880]/40 shadow-sm tilt-card hover-lift">
                                    <span class="text-[10px] uppercase tracking-wider font-bold text-[#C5A880] bg-[#343D35] px-2.5 py-0.5 rounded-full inline-block mb-1.5">Tahun 2023</span>
                                    <h4 class="font-display font-bold text-base text-[#343D35] mt-0.5">Janji &amp; Komitmen</h4>
                                    <p class="text-xs text-[#343D35]/75 leading-relaxed mt-1">
                                        Setelah saling mengenal dan memahami, kami memutuskan untuk melangkah ke jenjang yang lebih serius dengan restu kedua orang tua.
                                    </p>
                                </div>
                            </div>

                            {{-- Milestone 3 --}}
                            <div class="relative pl-6 scroll-reveal reveal-left delay-200">
                                <div class="absolute -left-3 top-1.5 w-6 h-6 rounded-full bg-[#343D35] border-2 border-[#C5A880] flex items-center justify-center text-xs text-[#C5A880] shadow-md ring-4 ring-[#C5A880]/20">
                                    💍
                                </div>
                                <div class="bg-[#FAF6EC] p-5 rounded-2xl border border-[#C5A880]/40 shadow-sm tilt-card hover-lift">
                                    <span class="text-[10px] uppercase tracking-wider font-bold text-[#C5A880] bg-[#343D35] px-2.5 py-0.5 rounded-full inline-block mb-1.5">Tahun 2026</span>
                                    <h4 class="font-display font-bold text-base text-[#343D35] mt-0.5">Menuju Hari Bahagia</h4>
                                    <p class="text-xs text-[#343D35]/75 leading-relaxed mt-1">
                                        Hari ini, kami menyatukan dua hati dan keluarga dalam ikatan suci pernikahan sehidup sesurga.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- ── SECTION 6: GALERI MOMEN BAHAGIA (PHOTO GALLERY WITH LIGHTBOX) ── --}}
                    <section id="galeri-section" class="py-12 px-6">
                        <div class="text-center mb-8 scroll-reveal reveal-up">
                            <span class="text-[#C5A880] text-xs uppercase tracking-widest font-semibold">Dokumentasi</span>
                            <h2 class="font-display text-2xl font-bold text-[#343D35] mt-1">Galeri Momen Bahagia</h2>
                            <p class="font-script text-xl text-[#C5A880] mt-0.5">Sweet Memories</p>
                            <p class="text-xs text-[#343D35]/70 mt-2 max-w-xs mx-auto leading-relaxed">
                                Rekaman jejak cinta dan kebersamaan kami menuju hari bahagia. <span class="text-[#C5A880] font-semibold block mt-0.5">(Klik foto untuk memperbesar 🔍)</span>
                            </p>
                        </div>

                        {{-- 1. Hero Photo: Membesar dari Kecil ke Besar (Zoom In) + Lightbox Trigger --}}
                        <div
                            class="mb-4 scroll-reveal reveal-zoom group overflow-hidden rounded-3xl border border-[#C5A880]/40 shadow-lg bg-[#FAF6EC] p-2 cursor-pointer hover-lift border-gold-pulse"
                            @click="openLightbox('https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=90')"
                        >
                            <div class="w-full h-60 overflow-hidden rounded-2xl relative">
                                <img
                                    src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=80"
                                    alt="Foto Prewedding Romantis 1"
                                    class="w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-108"
                                    loading="lazy"
                                />
                                <div class="absolute inset-0 bg-gradient-to-t from-[#343D35]/75 via-transparent to-transparent"></div>
                                <span class="absolute bottom-3 left-4 right-4 text-center text-xs font-display italic text-[#F2EBD9] tracking-wider drop-shadow-sm">
                                    "Dua hati yang saling terpaut dalam janji suci cinta"
                                </span>
                                {{-- Mini zoom badge --}}
                                <div class="absolute top-3 right-3 bg-[#1C221D]/80 backdrop-blur-sm text-[#C5A880] p-1.5 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                </div>
                            </div>
                        </div>

                        {{-- 2. Dua Foto Berdampingan: Teks/Foto dari KIRI & KANAN + Lightbox Trigger --}}
                        <div class="grid grid-cols-2 gap-3 mb-4">
                            <div
                                class="scroll-reveal reveal-left delay-100 group overflow-hidden rounded-2xl border border-[#C5A880]/30 shadow-md bg-[#FAF6EC] p-1.5 cursor-pointer hover-lift"
                                @click="openLightbox('https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=1200&q=90')"
                            >
                                <div class="w-full h-44 overflow-hidden rounded-xl relative">
                                    <img
                                        src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=600&q=80"
                                        alt="Foto Prewedding Romantis 2"
                                        class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-108"
                                        loading="lazy"
                                    />
                                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <span class="text-[10px] text-white bg-black/60 px-2 py-1 rounded-full font-semibold">🔍 Zoom</span>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="scroll-reveal reveal-right delay-150 group overflow-hidden rounded-2xl border border-[#C5A880]/30 shadow-md bg-[#FAF6EC] p-1.5 cursor-pointer hover-lift"
                                @click="openLightbox('https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1200&q=90')"
                            >
                                <div class="w-full h-44 overflow-hidden rounded-xl relative">
                                    <img
                                        src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=600&q=80"
                                        alt="Foto Prewedding Romantis 3"
                                        class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-108"
                                        loading="lazy"
                                    />
                                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <span class="text-[10px] text-white bg-black/60 px-2 py-1 rounded-full font-semibold">🔍 Zoom</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 3. Dua Foto Bawah: Membesar dari Kecil ke Besar (Zoom In) Berurutan + Lightbox Trigger --}}
                        <div class="grid grid-cols-2 gap-3">
                            <div
                                class="scroll-reveal reveal-zoom delay-200 group overflow-hidden rounded-2xl border border-[#C5A880]/30 shadow-md bg-[#FAF6EC] p-1.5 cursor-pointer hover-lift"
                                @click="openLightbox('https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=1200&q=90')"
                            >
                                <div class="w-full h-36 overflow-hidden rounded-xl relative">
                                    <img
                                        src="https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=600&q=80"
                                        alt="Foto Prewedding Romantis 4"
                                        class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-108"
                                        loading="lazy"
                                    />
                                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <span class="text-[10px] text-white bg-black/60 px-2 py-1 rounded-full font-semibold">🔍 Zoom</span>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="scroll-reveal reveal-zoom delay-300 group overflow-hidden rounded-2xl border border-[#C5A880]/30 shadow-md bg-[#FAF6EC] p-1.5 cursor-pointer hover-lift"
                                @click="openLightbox('https://images.unsplash.com/photo-1532712938310-34cb3982ef74?auto=format&fit=crop&w=1200&q=90')"
                            >
                                <div class="w-full h-36 overflow-hidden rounded-xl relative">
                                    <img
                                        src="https://images.unsplash.com/photo-1532712938310-34cb3982ef74?auto=format&fit=crop&w=600&q=80"
                                        alt="Foto Prewedding Romantis 5"
                                        class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-108"
                                        loading="lazy"
                                    />
                                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <span class="text-[10px] text-white bg-black/60 px-2 py-1 rounded-full font-semibold">🔍 Zoom</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- ── SECTION 7: AMPLOP DIGITAL (GIFT) ─────────────────── --}}
                    <section id="gift-section" class="py-12 px-6">
                        <div class="text-center mb-8 scroll-reveal reveal-up">
                            <span class="text-[#C5A880] text-xs uppercase tracking-widest font-semibold">Tanda Kasih</span>
                            <h2 class="font-display text-2xl font-bold text-[#343D35] mt-1">Amplop Digital</h2>
                            <p class="font-script text-xl text-[#C5A880] mt-0.5">Wedding Gift</p>
                            <p class="text-xs text-[#343D35]/70 mt-2 max-w-xs mx-auto leading-relaxed">
                                Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Bagi yang ingin memberi tanda kasih secara digital, dapat melalui rekening berikut:
                            </p>
                        </div>

                        @if($invitation->bank_account_number)
                        {{-- Kartu Bank 3D Tilt / Metallic Gold Texture / VIP Luxury --}}
                        <div class="bg-gradient-to-br from-[#242A25] via-[#2F3730] to-[#1C221D] text-[#F2EBD9] rounded-3xl p-6 shadow-2xl border border-[#C5A880]/50 relative overflow-hidden mb-5 scroll-reveal reveal-flip tilt-card hover-lift border-gold-pulse">
                            {{-- Gold Foil Ribbon Effect --}}
                            <div class="absolute -right-12 -top-12 w-28 h-28 bg-[#C5A880]/15 rounded-full pointer-events-none"></div>

                            {{-- Chip Bank, Contactless Icon, & Bank Logo --}}
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-11 h-8 rounded-md bg-gradient-to-tr from-amber-300 via-amber-400 to-amber-200 border border-amber-100 shadow-md flex items-center justify-center p-0.5">
                                        <div class="w-full h-full border border-amber-900/30 rounded-xs flex items-center justify-center">
                                            <div class="w-3 h-2 border-t border-b border-amber-900/40"></div>
                                        </div>
                                    </div>
                                    {{-- Contactless Waves SVG --}}
                                    <svg class="w-5 h-5 text-[#C5A880]/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/>
                                    </svg>
                                </div>
                                <span class="text-[#C5A880] text-sm font-extrabold uppercase tracking-widest font-mono bg-[#1C221D]/80 px-3 py-1 rounded-lg border border-[#C5A880]/30 shadow-inner">
                                    {{ $invitation->bank_name ?? 'BCA' }}
                                </span>
                            </div>

                            <p class="text-[10px] text-[#F2EBD9]/60 uppercase tracking-widest mb-1 font-semibold">Nomor Rekening</p>
                            <p class="font-mono text-2xl font-bold tracking-widest text-[#F2EBD9] mb-5">
                                {{ $invitation->bank_account_number }}
                            </p>

                            <div class="flex items-end justify-between pt-3 border-t border-[#C5A880]/30">
                                <div>
                                    <p class="text-[10px] text-[#F2EBD9]/60 uppercase tracking-widest font-semibold">Atas Nama</p>
                                    <p class="font-semibold text-sm text-[#F2EBD9] tracking-wide">{{ $invitation->bank_account_holder }}</p>
                                </div>

                                <button
                                    type="button"
                                    @click="navigator.clipboard.writeText('{{ $invitation->bank_account_number }}').then(() => { copied = true; setTimeout(() => copied = false, 2500); })"
                                    class="bg-[#C5A880] hover:bg-[#b0936d] text-[#242A25] py-2 px-4 rounded-xl text-xs font-bold inline-flex items-center gap-1.5 transition-all shadow-md active:scale-95 cursor-pointer"
                                >
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                    <span x-text="copied ? 'Tersalin! ✓' : 'Salin'">Salin</span>
                                </button>
                            </div>

                            {{-- Toast Feedback Salin --}}
                            <div
                                x-show="copied"
                                x-cloak
                                x-transition
                                class="absolute inset-0 bg-[#242A25]/95 flex items-center justify-center text-center p-4"
                            >
                                <div class="text-[#F2EBD9]">
                                    <svg class="w-8 h-8 text-emerald-400 mx-auto mb-1 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <p class="text-xs font-bold">Nomor rekening BCA berhasil disalin!</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- Kirim Kado Fisik Card with Copy Address --}}
                        <div class="bg-[#FAF6EC] border border-[#C5A880]/30 rounded-3xl p-5 shadow-sm scroll-reveal reveal-up tilt-card hover-lift" x-data="{ copiedAddress: false }">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-2xl bg-[#343D35] text-[#C5A880] flex items-center justify-center shrink-0 shadow-md">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-xs text-[#343D35] uppercase tracking-wide">Kirim Kado Fisik</p>
                                    <p class="text-xs text-[#343D35]/75 mt-1 leading-relaxed">
                                        {{ $invitation->venue_name }}, {{ $invitation->venue_address }} (u.p Zian &amp; Sahri)
                                    </p>
                                    <button
                                        type="button"
                                        @click="navigator.clipboard.writeText('{{ $invitation->venue_name }}, {{ $invitation->venue_address }} (u.p Zian & Sahri)').then(() => { copiedAddress = true; setTimeout(() => copiedAddress = false, 2500); })"
                                        class="mt-2.5 inline-flex items-center gap-1.5 text-[11px] font-bold text-[#C5A880] hover:text-[#b0936d] cursor-pointer"
                                    >
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                        </svg>
                                        <span x-text="copiedAddress ? 'Alamat Tersalin! ✓' : 'Salin Alamat Lengkap'">Salin Alamat Lengkap</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- ── SECTION 8: RSVP & UCAPAN DOA (AJAX ZERO-RELOAD) ───── --}}
                    <section id="rsvp-section" class="py-12 px-6">
                        <div class="text-center mb-8 scroll-reveal reveal-up">
                            <span class="text-[#C5A880] text-xs uppercase tracking-widest font-semibold">RSVP &amp; Doa</span>
                            <h2 class="font-display text-2xl font-bold text-[#343D35] mt-1">Konfirmasi &amp; Ucapan</h2>
                            <p class="text-xs text-[#343D35]/70 mt-2">Sampaikan konfirmasi kehadiran dan doa restu terbaik Anda ✨</p>
                        </div>

                        {{-- Flash Success Feedback (AJAX or Session) --}}
                        <div
                            x-show="wishSuccess"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="mb-5 p-4 rounded-2xl bg-emerald-100 border border-emerald-300 text-emerald-900 text-xs font-medium flex items-center justify-between shadow-sm"
                            x-cloak
                        >
                            <span x-text="'✓ ' + (wishSuccessMessage || 'Terima kasih atas ucapan dan doa restunya!')"></span>
                        </div>

                        {{-- Validation / AJAX Error Alert --}}
                        <div
                            x-show="wishError"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="mb-5 p-4 rounded-2xl bg-rose-100 border border-rose-300 text-rose-900 text-xs shadow-sm"
                            x-cloak
                        >
                            <p class="font-bold mb-1">Perhatian:</p>
                            <p x-text="wishError"></p>
                        </div>

                        {{-- Form Input Ucapan --}}
                        <form
                            id="wishForm"
                            method="POST"
                            action="{{ route('demo.wish', $invitation->slug) }}"
                            @submit.prevent="submitWish($event)"
                            class="bg-[#FAF6EC] rounded-3xl p-6 border border-[#C5A880]/30 shadow-sm mb-8 scroll-reveal reveal-up"
                        >
                            @csrf
                            <input type="text" name="website_hp" value="" class="hidden" tabindex="-1" autocomplete="off" style="display:none;" />
                            <div class="mb-4">
                                <label for="guest_name" class="block text-xs font-bold uppercase tracking-wider text-[#343D35]/70 mb-1.5">Nama Lengkap</label>
                                <input
                                    id="guest_name"
                                    name="guest_name"
                                    type="text"
                                    x-model="formData.guest_name"
                                    placeholder="Masukkan nama Anda..."
                                    required
                                    class="w-full rounded-2xl border border-[#343D35]/20 bg-white px-4 py-3 text-xs text-[#343D35] placeholder-[#343D35]/35 focus:outline-none focus:border-[#C5A880] focus:ring-2 focus:ring-[#C5A880]/30 transition-all"
                                />
                            </div>

                            <div class="mb-4">
                                <label class="block text-xs font-bold uppercase tracking-wider text-[#343D35]/70 mb-1.5">Konfirmasi Kehadiran</label>
                                <div class="grid grid-cols-3 gap-2">
                                    <label class="cursor-pointer">
                                        <input
                                            type="radio"
                                            name="attendance"
                                            value="hadir"
                                            x-model="formData.attendance"
                                            class="peer sr-only"
                                            required
                                        />
                                        <span class="block text-center py-2.5 px-2 text-xs font-semibold rounded-2xl border border-[#343D35]/20 bg-white text-[#343D35]/70 peer-checked:bg-[#343D35] peer-checked:text-[#F2EBD9] peer-checked:border-[#343D35] transition-colors shadow-2xs">
                                            Hadir
                                        </span>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input
                                            type="radio"
                                            name="attendance"
                                            value="ragu"
                                            x-model="formData.attendance"
                                            class="peer sr-only"
                                            required
                                        />
                                        <span class="block text-center py-2.5 px-2 text-xs font-semibold rounded-2xl border border-[#343D35]/20 bg-white text-[#343D35]/70 peer-checked:bg-[#343D35] peer-checked:text-[#F2EBD9] peer-checked:border-[#343D35] transition-colors shadow-2xs">
                                            Ragu-ragu
                                        </span>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input
                                            type="radio"
                                            name="attendance"
                                            value="tidak_hadir"
                                            x-model="formData.attendance"
                                            class="peer sr-only"
                                            required
                                        />
                                        <span class="block text-center py-2.5 px-2 text-xs font-semibold rounded-2xl border border-[#343D35]/20 bg-white text-[#343D35]/70 peer-checked:bg-[#343D35] peer-checked:text-[#F2EBD9] peer-checked:border-[#343D35] transition-colors shadow-2xs">
                                            Tidak Hadir
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="message" class="block text-xs font-bold uppercase tracking-wider text-[#343D35]/70 mb-1.5">Ucapan &amp; Doa Restu</label>
                                <textarea
                                    id="message"
                                    name="message"
                                    rows="3"
                                    x-model="formData.message"
                                    placeholder="Tuliskan doa restu untuk kedua mempelai..."
                                    required
                                    class="w-full rounded-2xl border border-[#343D35]/20 bg-white px-4 py-3 text-xs text-[#343D35] placeholder-[#343D35]/35 focus:outline-none focus:border-[#C5A880] focus:ring-2 focus:ring-[#C5A880]/30 resize-none transition-all"
                                ></textarea>
                            </div>

                            <button
                                type="submit"
                                :disabled="isSubmitting"
                                class="w-full bg-[#343D35] text-[#F2EBD9] py-3.5 rounded-2xl text-xs font-bold tracking-wider uppercase hover:bg-[#465247] shadow-md transition-all active:scale-[0.98] cursor-pointer flex items-center justify-center gap-2 disabled:opacity-75"
                            >
                                <svg x-show="isSubmitting" class="animate-spin w-4 h-4 text-[#F2EBD9]" fill="none" viewBox="0 0 24 24" x-cloak>
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span x-text="isSubmitting ? 'Mengirim ucapan...' : 'Kirim Ucapan & Konfirmasi'">Kirim Ucapan &amp; Konfirmasi</span>
                            </button>
                        </form>

                        {{-- Live Wish List Dynamic Container --}}
                        <div class="scroll-reveal reveal-up delay-150">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-display font-bold text-sm text-[#343D35]">
                                    Ucapan Doa Terkini
                                </h3>
                                <span class="text-[11px] font-semibold text-[#C5A880] bg-[#FAF6EC] px-3 py-1 rounded-full border border-[#C5A880]/30">
                                    <span x-text="wishesList.length"></span> Doa Diterima
                                </span>
                            </div>

                            <div class="space-y-3 max-h-80 overflow-y-auto pr-1" id="wishes-container">
                                <template x-for="wish in wishesList" :key="wish.id">
                                    <div class="bg-[#FAF6EC] rounded-2xl p-4 border border-[#C5A880]/30 shadow-sm transition-all duration-300">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center gap-2">
                                                <div class="w-7 h-7 rounded-full bg-[#343D35] text-[#C5A880] flex items-center justify-center text-xs font-bold" x-text="wish.guest_name ? wish.guest_name.charAt(0).toUpperCase() : '?'"></div>
                                                <span class="font-bold text-xs text-[#343D35]" x-text="wish.guest_name"></span>
                                            </div>
                                            <template x-if="wish.attendance === 'hadir'">
                                                <span class="text-[9px] font-bold px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800">✓ Hadir</span>
                                            </template>
                                            <template x-if="wish.attendance === 'tidak_hadir'">
                                                <span class="text-[9px] font-bold px-2.5 py-0.5 rounded-full bg-rose-100 text-rose-700">✗ Tidak Hadir</span>
                                            </template>
                                            <template x-if="wish.attendance !== 'hadir' && wish.attendance !== 'tidak_hadir'">
                                                <span class="text-[9px] font-bold px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800">~ Ragu-ragu</span>
                                            </template>
                                        </div>
                                        <p class="text-xs text-[#343D35]/80 italic leading-relaxed" x-text="'&ldquo;' + wish.message + '&rdquo;'"></p>
                                        <p class="text-[9px] text-[#343D35]/40 mt-1.5" x-text="wish.time_ago"></p>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </section>

                    {{-- ── SECTION 9: FOOTER & SIGNATURE ─────────────────────── --}}
                    <footer class="py-12 px-6 text-center bg-gradient-to-b from-[#242A25] to-[#181D19] text-[#F2EBD9] scroll-reveal reveal-up relative overflow-hidden">
                        {{-- Rotating Mandala Watermark in Footer --}}
                        <div class="absolute -top-12 -right-12 w-48 h-48 opacity-10 pointer-events-none rotate-mandala">
                            <svg viewBox="0 0 100 100" fill="currentColor" class="text-[#C5A880]"><circle cx="50" cy="50" r="45"/></svg>
                        </div>

                        {{-- Elegant Wax Seal Icon --}}
                        <div class="w-12 h-12 mx-auto rounded-full bg-[#1C221D] border-2 border-[#C5A880] flex items-center justify-center text-lg text-[#C5A880] shadow-xl mb-4 animate-pulse-glow">
                            🌿
                        </div>

                        <p class="font-script text-3xl sm:text-4xl text-[#C5A880] mb-1">
                            Terima Kasih
                        </p>
                        <p class="font-display text-2xl font-bold text-[#F2EBD9] mb-3">
                            {{ $invitation->groom_nickname }} &amp; {{ $invitation->bride_nickname }}
                        </p>
                        <p class="text-xs text-[#F2EBD9]/70 leading-relaxed max-w-xs mx-auto mb-6">
                            Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu.
                        </p>

                        <div class="bg-[#1C221D]/80 backdrop-blur-sm rounded-2xl p-4 mb-6 text-xs text-[#F2EBD9]/75 space-y-1 border border-[#C5A880]/30 shadow-inner">
                            <p class="text-[#C5A880] font-bold uppercase tracking-wider text-[10px] mb-2">Turut Mengundang - Keluarga Besar</p>
                            <p>Kel. <span class="font-semibold text-[#F2EBD9]">{{ $invitation->groom_parents }}</span></p>
                            <p class="text-[#C5A880] font-script text-lg">&amp;</p>
                            <p>Kel. <span class="font-semibold text-[#F2EBD9]">{{ $invitation->bride_parents }}</span></p>
                        </div>

                        {{-- Digital Signature in Gold Script --}}
                        <div class="my-5">
                            <p class="font-script text-4xl text-[#C5A880] tracking-wide">
                                {{ $invitation->groom_nickname }} &amp; {{ $invitation->bride_nickname }}
                            </p>
                        </div>

                        {{-- Order This Theme Button via WhatsApp --}}
                        <div class="my-6">
                            <a href="https://wa.me/6285749739342?text={{ urlencode('Halo Admin GA Digital, saya sedang melihat demo tema Leafy Botanical (Rp 149.000) dan tertarik untuk memesan undangan digital seperti ini. Mohon info pemesanannya ya!') }}"
                               target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center justify-center gap-2.5 px-7 py-3.5 rounded-full bg-gradient-to-r from-[#C5A880] via-[#E2C799] to-[#C5A880] hover:from-[#b0936d] hover:to-[#b0936d] text-[#242A25] font-extrabold text-xs shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 active:scale-95 border border-amber-200/50">
                                <svg class="w-4 h-4 text-[#242A25]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                                </svg>
                                <span class="tracking-wide">Pesan Undangan Seperti Ini</span>
                            </a>
                        </div>

                        <p class="text-[10px] text-[#F2EBD9]/40 tracking-wider">
                            Created with love by
                            <a href="/" class="text-[#C5A880] hover:underline font-semibold">GA DIGITAL</a>
                            — Luxury Botanical Series
                        </p>
                    </footer>
                </div>
            </div>
            {{-- / Konten Utama Undangan --}}

            {{-- ========================================================
                 FULLSCREEN PHOTO LIGHTBOX MODAL (Interactive Luxury Zoom)
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
                class="absolute inset-0 z-50 flex items-center justify-center p-4 lightbox-overlay"
            >
                <div class="relative max-w-sm w-full bg-[#1C221D] rounded-3xl p-3 border border-[#C5A880]/60 shadow-2xl">
                    <button
                        type="button"
                        @click="closeLightbox()"
                        class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-[#C5A880] text-[#1C221D] flex items-center justify-center font-bold text-sm shadow-lg hover:scale-110 active:scale-95 transition-transform cursor-pointer"
                        title="Tutup"
                    >
                        ✕
                    </button>
                    <div class="overflow-hidden rounded-2xl border border-[#C5A880]/30 max-h-[75vh]">
                        <img
                            :src="lightboxImage"
                            alt="Zoom Foto Galeri"
                            class="w-full h-auto object-contain max-h-[72vh] rounded-2xl"
                        />
                    </div>
                    <div class="text-center pt-2">
                        <p class="font-script text-xl text-[#C5A880]">The Wedding of Zian &amp; Sahri</p>
                        <p class="text-[10px] text-[#F2EBD9]/60">Klik di luar atau tombol ✕ untuk menutup</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- / Mobile Container --}}
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
