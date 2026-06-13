(function() {
    const cards = document.querySelectorAll('.q-floating-card');
    if (cards.length) {
        let current = 0;
        const show = (idx) => {
            cards.forEach((c, i) => {
                c.classList.toggle('visible', i === idx);
            });
        };
        show(0);
        setInterval(() => {
            current = (current + 1) % cards.length;
            show(current);
        }, 5000);
    }
})();

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

        const cx = cw * 0.18;
        const cy = ch / 2;
        const maxR = Math.min(cw, ch) * 0.60;

        angle += 0.008;

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
        const wrap = document.querySelector('.q-login-wrap');
        const rect = wrap.getBoundingClientRect();
        w = rect.width;
        h = rect.height;
        dpr = Math.min(window.devicePixelRatio || 1, 2);
        canvas.width = w * dpr;
        canvas.height = h * dpr;
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    }

    window.addEventListener('resize', resize);
    resize();
    requestAnimationFrame(draw);
})();
