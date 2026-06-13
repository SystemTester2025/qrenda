/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ./resources/assets/js/front/redesign-auth.js ***!
  \****************************************************/
function _createForOfIteratorHelper(r, e) { var t = "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (!t) { if (Array.isArray(r) || (t = _unsupportedIterableToArray(r)) || e && r && "number" == typeof r.length) { t && (r = t); var _n = 0, F = function F() {}; return { s: F, n: function n() { return _n >= r.length ? { done: !0 } : { done: !1, value: r[_n++] }; }, e: function e(r) { throw r; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var o, a = !0, u = !1; return { s: function s() { t = t.call(r); }, n: function n() { var r = t.next(); return a = r.done, r; }, e: function e(r) { u = !0, o = r; }, f: function f() { try { a || null == t["return"] || t["return"](); } finally { if (u) throw o; } } }; }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
(function () {
  var cards = document.querySelectorAll('.q-floating-card');
  if (cards.length) {
    var current = 0;
    var show = function show(idx) {
      cards.forEach(function (c, i) {
        c.classList.toggle('visible', i === idx);
      });
    };
    show(0);
    setInterval(function () {
      current = (current + 1) % cards.length;
      show(current);
    }, 5000);
  }
})();
(function () {
  var canvas = document.getElementById('login-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d', {
    alpha: true,
    desynchronized: true
  });
  var dpr = Math.min(window.devicePixelRatio || 1, 2);
  var w = 0,
    h = 0;
  var angle = 0;
  var TAU = Math.PI * 2;
  var D = function D(deg) {
    return deg * Math.PI / 180;
  };
  var RINGS = [{
    radius: 0.34,
    speed: 0.9,
    opacity: 0.22,
    jogs: []
  }, {
    radius: 0.46,
    speed: 0.6,
    opacity: 0.32,
    jogs: [{
      start: D(64),
      width: D(30),
      depth: 46
    }, {
      start: D(232),
      width: D(26),
      depth: 40
    }]
  }, {
    radius: 0.58,
    speed: -0.45,
    opacity: 0.4,
    jogs: [{
      start: D(150),
      width: D(34),
      depth: 54
    }, {
      start: D(312),
      width: D(22),
      depth: 38
    }]
  }, {
    radius: 0.70,
    speed: 0.35,
    opacity: 0.28,
    jogs: []
  }, {
    radius: 0.82,
    speed: -0.28,
    opacity: 0.34,
    jogs: [{
      start: D(20),
      width: D(40),
      depth: 60
    }, {
      start: D(196),
      width: D(30),
      depth: 48
    }]
  }, {
    radius: 0.95,
    speed: 0.22,
    opacity: 0.18,
    jogs: []
  }];
  var traceRing = function traceRing(cx, cy, maxR, ring, rot) {
    var baseR = ring.radius * maxR;
    var STEP = D(1.5);
    var first = true;
    var radiusAt = function radiusAt(a) {
      var _iterator = _createForOfIteratorHelper(ring.jogs),
        _step;
      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var jog = _step.value;
          var d = a - jog.start;
          d = (d % TAU + TAU) % TAU;
          if (d < jog.width) return baseR + jog.depth;
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }
      return baseR;
    };
    var point = function point(a, r) {
      var x = cx + Math.cos(a + rot) * r;
      var y = cy + Math.sin(a + rot) * r;
      if (first) {
        ctx.moveTo(x, y);
        first = false;
      } else {
        ctx.lineTo(x, y);
      }
    };
    ctx.beginPath();
    var prevR = radiusAt(0);
    point(0, prevR);
    for (var a = STEP; a <= TAU + 0.0001; a += STEP) {
      var r = radiusAt(a);
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
    var cw = w;
    var ch = h;
    ctx.clearRect(0, 0, cw, ch);
    var cx = cw * 0.18;
    var cy = ch / 2;
    var maxR = Math.min(cw, ch) * 0.60;
    angle += 0.008;
    var glow = ctx.createRadialGradient(cx, cy, 0, cx, cy, maxR * 1.1);
    glow.addColorStop(0, "rgba(124, 58, 237, 0.10)");
    glow.addColorStop(0.6, "rgba(124, 58, 237, 0.03)");
    glow.addColorStop(1, "rgba(0,0,0,0)");
    ctx.fillStyle = glow;
    ctx.beginPath();
    ctx.arc(cx, cy, maxR * 1.1, 0, TAU);
    ctx.fill();
    ctx.lineWidth = 1;
    ctx.lineJoin = "miter";
    var _iterator2 = _createForOfIteratorHelper(RINGS),
      _step2;
    try {
      for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
        var ring = _step2.value;
        traceRing(cx, cy, maxR, ring, angle * ring.speed);
        ctx.strokeStyle = "rgba(255, 255, 255, ".concat(ring.opacity, ")");
        ctx.stroke();
      }
    } catch (err) {
      _iterator2.e(err);
    } finally {
      _iterator2.f();
    }
    requestAnimationFrame(draw);
  }
  function resize() {
    var wrap = document.querySelector('.q-login-wrap');
    var rect = wrap.getBoundingClientRect();
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
/******/ })()
;