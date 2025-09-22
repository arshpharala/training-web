@extends('theme.xacademia.layouts.app')

@push('head')
    <style>
        .bg-background-1,
        .banner1 {
            position: relative;
            overflow: hidden;
            background: linear-gradient(to bottom right, #4f46e5, #7c3aed, #d946ef) !important;
        }

        .bg-background-1:before,
        .banner1:before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.15) 1px, transparent 1px);
            background-size: 22px 22px;
            opacity: 0.2;
            z-index: 0;
        }

        /* Gradient color set for random topic borders */
        .gradient-1 {
            background: linear-gradient(to right, #6366f1, #ec4899);
        }

        .gradient-2 {
            background: linear-gradient(to right, #10b981, #06b6d4);
        }

        .gradient-3 {
            background: linear-gradient(to right, #f59e0b, #ec4899);
        }

        .gradient-4 {
            background: linear-gradient(to right, #14b8a6, #6366f1);
        }

        .gradient-5 {
            background: linear-gradient(to right, #8b5cf6, #ec4899);
        }

        .gradient-6 {
            background: linear-gradient(to right, #f43f5e, #facc15);
        }


        .card-body ul li {
            font-size: 0.85rem;
        }

       
    </style>

    <style>
        /* KPI styles */
        #dashboard-wrap {
            height: 18rem;
        }

        #kpiGrid {
            height: 100%;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            grid-template-rows: repeat(2, 1fr);
            gap: .75rem;
        }

        @media (min-width:768px) {
            #kpiGrid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                grid-template-rows: repeat(2, 1fr);
            }
        }

        .kpi-card {
            position: relative;
            background: rgba(255, 255, 255, .9);
            border: 1px solid rgba(15, 23, 42, .08);
            border-radius: 1rem;
            box-shadow: 0 10px 30px -18px rgba(0, 0, 0, .55);
            perspective: 900px;
            overflow: hidden;
        }

        .kpi-card::before {
            content: "";
            position: absolute;
            inset: auto 0 0 0;
            height: 3px;
            background: linear-gradient(90deg, #6366f1, #ec4899);
            opacity: .9;
        }

        .kpi-inner {
            position: absolute;
            inset: 0;
            transform-style: preserve-3d;
            transition: transform .65s cubic-bezier(.2, .7, .2, 1);
        }

        .kpi-card.flipped .kpi-inner {
            transform: rotateY(180deg);
        }

        .kpi-face {
            position: absolute;
            inset: 0;
            backface-visibility: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 1rem;
        }

        .kpi-back {
            transform: rotateY(180deg);
        }

        .kpi-title {
            font-size: .72rem;
            color: #475569;
        }

        .kpi-value {
            font-size: 1.45rem;
            font-weight: 800;
            line-height: 1.1;
            color: #0f172a;
        }

        .kpi-sub {
            font-size: .72rem;
            color: #64748b;
        }

        .kpi-badge {
            position: absolute;
            top: .5rem;
            right: .6rem;
            font-size: .65rem;
            background: rgba(99, 102, 241, .12);
            color: #4338ca;
            border: 1px solid rgba(99, 102, 241, .25);
            padding: .15rem .45rem;
            border-radius: .6rem;
        }
    </style>
@endpush

@section('banner')
    <!-- HERO Section -->
    <section class="sptb-tab py-10 spark-container"
        style="background: linear-gradient(to bottom right, #4f46e5, #7c3aed, #d946ef);">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left Content -->
                    <div class="col-lg-6 col-md-12">
                        <div class="text-white mb-7">
                            <p class="text-uppercase small text-white-50 mb-3 animate__animated animate__fadeInDown">
                                {{ $category->translation->name }}
                            </p>
                            <h1 class="hero-title animate__animated animate__fadeInLeft">
                                {!! $banner['title'] !!}
                            </h1>
                            <p class="mt-3 lead text-white-75 animate__animated animate__fadeInLeft animate__delay-1s">
                                {!! $banner['intro'] !!}
                            </p>
                        </div>

                        <div
                            class="d-flex flex-row align-items-center gap-3 animate__animated animate__fadeInUp animate__delay-2s">
                            <button class="btn btn-custom btn-custom-primary">Explore Learning tracks</button>
                            <button class="btn btn-custom btn-custom-outline">Get notified</button>
                        </div>
                    </div>

                    <!-- Right KPI Dashboard -->
                    <div class="col-lg-6 d-none d-md-block">
                        @if (!empty($banner['notes']))
                            <div class="border p-4 text-white rounded7" style="background-color: rgb(255 255 255 / 0.1);">
                                <div class="d-flex justify-content-between align-items-center pb-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <span>🧑‍💻</span>
                                        <span>{!! $banner['notesHeading'] !!}</span>
                                    </div>
                                    {{-- <div class="text-xs opacity-75">Auto-updating metrics</div> --}}
                                </div>
                                <!-- Terminal viewport -->
                                <div id="tn-viewport"
                                    class="position-relative w-100 bg-black text-white font-monospace small overflow-auto"
                                    style="height: 24rem;">
                                    <!-- Top bar -->
                                    <div
                                        class="position-sticky top-0 zindex-10 d-flex align-items-center gap-2 px-3 py-2 border-bottom border-light bg-black bg-opacity-75 backdrop-blur">
                                        <!-- Dots -->
                                        <div class="d-flex gap-2">
                                            <span class="d-inline-block rounded-circle"
                                                style="width:12px; height:12px; background-color: rgba(239,68,68,.8);"></span>
                                            <span class="d-inline-block rounded-circle"
                                                style="width:12px; height:12px; background-color: rgba(250,204,21,.8);"></span>
                                            <span class="d-inline-block rounded-circle"
                                                style="width:12px; height:12px; background-color: rgba(34,197,94,.8);"></span>
                                        </div>
                                        <span
                                            class="ms-2 text-muted small">xcademia://trainer-notes/{{ $category->slug }}</span>
                                    </div>

                                    <!-- Lines -->
                                    <div id="tn-lines" class="px-4 py-3">
                                        <!-- dynamic lines go here -->
                                    </div>
                                </div>
                                <div class="text-xs text-white-80 mt-2 text-center">Mentor notes in real time</div>
                            </div>
                        @elseif($category->slug === 'business-leadership-and-project-management')
                            <div class="border p-4 text-white rounded7" style="background-color: rgb(255 255 255 / 0.1);">
                                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
                                    <div class="d-flex align-items-center gap-2"><span>📊</span>
                                        <span>Leadership Dashboard • Live</span>
                                    </div>
                                    <div class="text-xs opacity-75">Auto-updating metrics</div>
                                </div>

                                <div class="relative" style="height:18rem">
                                    <div id="dashboard-wrap" class="absolute inset-0">
                                        <div id="kpiGrid" class="h-full"></div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs text-white-80 mt-2 text-center">KPIs flip and update every few seconds</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <canvas class="spark position-absolute top-0 start-0 w-100 h-100 pe-none"></canvas>
    </section>
@endsection

@section('content')
    <!-- TRACKS Section -->
    <section id="tracks" class="sptb bg-white">
        <div class="container">
            <!-- Section Header -->
            <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-5">
                <div>
                    <h2 class="h3 fw-bold mb-1">Learning Tracks → Courses and Certs</h2>
                    <p class="text-muted mb-0">Follow guided tracks mapped to industry certifications</p>
                </div>
            </div>

            <!-- Topics Grid -->
            <div id="grid" class="row g-4">
                @foreach ($category->topics as $topic)
                    @php
                        $gradients = [
                            'gradient-1',
                            'gradient-2',
                            'gradient-3',
                            'gradient-4',
                            'gradient-5',
                            'gradient-6',
                        ];
                        $randGradient = $gradients[array_rand($gradients)];
                    @endphp
                    <div class="col-sm-6 col-lg-4">
                        <article class="card h-100 shadow-sm border-0 tilt">
                            <!-- Random Gradient Bar -->
                            <div class="h-2 {{ $randGradient }}" style="height:.4rem;"></div>

                            <div class="card-body d-flex flex-column">
                                <!-- Topic Title -->
                                <h5 class="mb-1">{{ $topic->translation->name }}</h5>

                                <!-- Short Description -->
                                @if (!empty($topic->translation->short_description))
                                    <p class="text-muted mb-3">
                                        {{ $topic->translation->short_description }}
                                    </p>
                                @endif

                                <!-- Courses -->
                                <ul class="list-unstyled mb-0 flex-grow-1">
                                    @forelse ($topic->courses as $course)
                                        <li>
                                            • <a
                                                href="{{ route('courses.show', ['topic' => $topic->slug, 'course' => $course->slug]) }}">
                                                {{ $course->translation->name }}
                                            </a>
                                        </li>
                                    @empty
                                        <li><em>No courses available</em></li>
                                    @endforelse
                                </ul>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        // Dummy KPI cards
        const grid = document.getElementById('kpiGrid');
        const kpis = [{
                title: 'On-time Delivery',
                value: '92%',
                sub: 'Target: 90%',
                badge: 'Delivery'
            },
            {
                title: 'Project Success Rate',
                value: '88%',
                sub: 'Target: 85%',
                badge: 'Delivery'
            },
            {
                title: 'Team Satisfaction',
                value: '4.4/5',
                sub: 'Target: 4.2/5',
                badge: 'Delivery'
            },
            {
                title: 'Change Adoption',
                value: '80%',
                sub: 'On track • Target 75%',
                badge: 'Delivery'
            },
            {
                title: 'Velocity (pts/sprint)',
                value: '68',
                sub: 'On track • Target 65',
                badge: 'Delivery'
            },
            {
                title: 'Budget Variance',
                value: '-4%',
                sub: 'On track • Target 0%',
                badge: 'Finance'
            },
        ];
        kpis.forEach(k => {
            const wrap = document.createElement('div');
            wrap.className = "kpi-card";
            wrap.innerHTML = `
            <div class="kpi-badge">${k.badge}</div>
            <div class="kpi-inner">
                <div class="kpi-face">
                    <div class="kpi-title">${k.title}</div>
                    <div class="kpi-value">${k.value}</div>
                    <div class="kpi-sub">${k.sub}</div>
                </div>
                <div class="kpi-face kpi-back">
                    <div class="kpi-title">${k.title}</div>
                    <div class="kpi-sub">More insights coming soon...</div>
                </div>
            </div>`;
            grid.appendChild(wrap);
        });

        // Flip animation
        let idx = 0;
        setInterval(() => {
            const cards = document.querySelectorAll('.kpi-card');
            if (cards.length > 0) {
                cards[idx].classList.toggle('flipped');
                idx = (idx + 1) % cards.length;
            }
        }, 2000);
    </script>

    <script>
        // KPI Count-up
        (function() {
            const strip = document.getElementById('kpiStrip');
            if (!strip) return;
            const nums = strip.querySelectorAll('.count');
            if (!nums.length) return;

            const io = new IntersectionObserver(entries => {
                if (!entries[0].isIntersecting) return;
                nums.forEach(el => {
                    const end = parseInt(el.dataset.target, 10) || 0;
                    const start = 0,
                        dur = 1200;
                    const t0 = performance.now();
                    (function tick(t) {
                        const p = Math.min(1, (t - t0) / dur);
                        el.textContent = Math.floor(start + p * (end - start)).toLocaleString();
                        if (p < 1) requestAnimationFrame(tick);
                    })(performance.now());
                });
                io.disconnect();
            }, {
                threshold: .3
            });

            io.observe(strip);
        })();

        // Trainer Notes Terminal Animation
        document.addEventListener('DOMContentLoaded', function() {
            const viewport = document.getElementById('tn-viewport');
            const linesEl = document.getElementById('tn-lines');
            if (!viewport || !linesEl) return;

            const notes = @json($banner['notes'] ?? ''); // from controller
            let displayed = [],
                currentLine = "";
            let lineIndex = 0,
                charIndex = 0;

            const typingMs = 16; // char speed
            const linePause = 240; // pause between lines

            function escapeHtml(s) {
                return s.replace(/[&<>\"']/g, c => ({
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '\"': '&quot;',
                    '\'': '&#39;'
                } [c]));
            }

            function render() {
                linesEl.innerHTML = "";
                displayed.forEach(line => {
                    const div = document.createElement('div');
                    div.innerHTML =
                        `<span class="text-success">$</span> <span>${escapeHtml(line)}</span>`;
                    linesEl.appendChild(div);
                });

                if (currentLine) {
                    const div = document.createElement('div');
                    div.innerHTML =
                        `<span class="text-success">$</span> <span>${escapeHtml(currentLine)}</span><span class="d-inline-block bg-light ms-1" style="width:6px;height:16px;animation:blink 1s step-start infinite;"></span>`;
                    linesEl.appendChild(div);
                }
                viewport.scrollTop = viewport.scrollHeight;
            }

            function typeNextChar() {
                const line = notes[lineIndex] || "";
                if (charIndex < line.length) {
                    currentLine = line.slice(0, ++charIndex);
                    render();
                    setTimeout(typeNextChar, typingMs);
                    return;
                }

                displayed.push(line);
                currentLine = "";
                render();

                setTimeout(() => {
                    lineIndex++;
                    if (lineIndex >= notes.length) {
                        // loop
                        lineIndex = 0;
                        charIndex = 0;
                        displayed = [];
                    } else {
                        charIndex = 0;
                    }
                    setTimeout(typeNextChar, typingMs);
                }, linePause);
            }

            render();
            typeNextChar();
        });

        // Blinking cursor animation
        const style = document.createElement('style');
        style.textContent = `
    @keyframes blink { 50% { opacity: 0; } }
  `;
        document.head.appendChild(style);
    </script>
@endpush
