<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ getAppName() }}</title>
    <link rel="icon" href="{{ getFaviconUrl() }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('assets/css/page.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('assets/css/front/redesign.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    @stack('css')
    @yield('css')
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>
<body>
    <div class="q-login-wrap">
        <canvas id="login-canvas"></canvas>
        <div class="q-login-form-side">
            @include('flash::message')
            @yield('content')
        </div>
    </div>

    @routes
    <script src="{{ mix('assets/js/front-third-party.js') }}"></script>
    <script src="{{ asset('messages.js?$mixID') }}"></script>
    <script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
    <script src="{{ mix('assets/js/auth/auth.js') }}"></script>
    @stack('scripts')

    <script>
        let defaultCountryCodeValue = 'in';
        let mobileValidation = "{{ getSuperAdminSettingValue('mobile_validation') }}";
        let utilsScript = "{{ asset('assets/js/inttel/js/utils.min.js') }}"
        $(document).ready(function() {
            $('.alert').delay(5000).slideUp(300)
        })
    </script>
    <script src="{{ mix('assets/js/intl-tel-input/build/intlTelInput.js') }}"></script>

    <script>
    (function() {
        const canvas = document.getElementById('login-canvas');
        if (!canvas) return;
        const ctx = canvas.getContext('2d', { alpha: true, desynchronized: true });
        let dpr = Math.min(window.devicePixelRatio || 1, 2);
        let w = 0, h = 0;
        let angle = 0;

        const TAU = Math.PI * 2;
        const D = (deg) => (deg * Math.PI) / 180;

        const RINGS = [
            { radius: 0.34, speed: 0.9, opacity: 0.22, jogs: [] },
            { radius: 0.46, speed: 0.6, opacity: 0.32, jogs: [
                { start: D(64), width: D(30), depth: 46 },
                { start: D(232), width: D(26), depth: 40 },
            ]},
            { radius: 0.58, speed: -0.45, opacity: 0.4, jogs: [
                { start: D(150), width: D(34), depth: 54 },
                { start: D(312), width: D(22), depth: 38 },
            ]},
            { radius: 0.70, speed: 0.35, opacity: 0.28, jogs: [] },
            { radius: 0.82, speed: -0.28, opacity: 0.34, jogs: [
                { start: D(20), width: D(40), depth: 60 },
                { start: D(196), width: D(30), depth: 48 },
            ]},
            { radius: 0.95, speed: 0.22, opacity: 0.18, jogs: [] },
        ];

        const traceRing = (cx, cy, maxR, ring, rot) => {
            const baseR = ring.radius * maxR;
            const STEP = D(1.5);
            let first = true;

            const radiusAt = (a) => {
                for (const jog of ring.jogs) {
                    let d = a - jog.start;
                    d = ((d % TAU) + TAU) % TAU;
                    if (d < jog.width) return baseR + jog.depth;
                }
                return baseR;
            };

            const point = (a, r) => {
                const x = cx + Math.cos(a + rot) * r;
                const y = cy + Math.sin(a + rot) * r;
                if (first) { ctx.moveTo(x, y); first = false; }
                else { ctx.lineTo(x, y); }
            };

            ctx.beginPath();
            let prevR = radiusAt(0);
            point(0, prevR);
            for (let a = STEP; a <= TAU + 0.0001; a += STEP) {
                const r = radiusAt(a);
                if (r !== prevR) {
                    point(a, prevR);
                    point(a, r);
                    prevR = r;
                } else {
                    point(a, r);
                }
            }
            ctx.closePath();
        };

        function draw() {
            const cw = w;
            const ch = h;
            ctx.clearRect(0, 0, cw, ch);

            const cx = cw / 2;
            const cy = ch / 2;
            const maxR = Math.min(cw, ch) * 0.62;

            angle += 0.008;

            // Subtle purple glow behind rings
            const glow = ctx.createRadialGradient(cx, cy, 0, cx, cy, maxR * 1.1);
            glow.addColorStop(0, "rgba(124, 58, 237, 0.10)");
            glow.addColorStop(0.6, "rgba(124, 58, 237, 0.03)");
            glow.addColorStop(1, "rgba(0,0,0,0)");
            ctx.fillStyle = glow;
            ctx.beginPath();
            ctx.arc(cx, cy, maxR * 1.1, 0, TAU);
            ctx.fill();

            ctx.lineWidth = 1;
            ctx.lineJoin = "miter";

            for (const ring of RINGS) {
                traceRing(cx, cy, maxR, ring, angle * ring.speed);
                ctx.strokeStyle = `rgba(255, 255, 255, ${ring.opacity})`;
                ctx.stroke();
            }

            requestAnimationFrame(draw);
        }

        function resize() {
            w = window.innerWidth;
            h = window.innerHeight;
            dpr = Math.min(window.devicePixelRatio || 1, 2);
            canvas.width = w * dpr;
            canvas.height = h * dpr;
            ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        }

        window.addEventListener('resize', resize);
        resize();
        requestAnimationFrame(draw);
    })();
    </script>
</body>
</html>
