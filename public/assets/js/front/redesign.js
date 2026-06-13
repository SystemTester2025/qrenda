(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {

    /* ════════════════════════════════════════
       1. HEADER — scroll glass effect
       ════════════════════════════════════════ */
    var header = document.getElementById('q-header');
    if (header) {
      var onScroll = function () {
        header.classList.toggle('scrolled', window.scrollY > 20);
      };
      onScroll();
      window.addEventListener('scroll', onScroll, { passive: true });
    }

    /* ════════════════════════════════════════
       2. MOBILE MENU — slide-in panel
       ════════════════════════════════════════ */
    var hamburger = document.getElementById('q-hamburger');
    var overlay = document.getElementById('q-mobile-menu');
    var closeBtn = document.getElementById('q-mobile-close');

    function openMenu() {
      if (!overlay || !hamburger) return;
      overlay.classList.add('open');
      overlay.setAttribute('aria-hidden', 'false');
      hamburger.classList.add('open');
      hamburger.setAttribute('aria-expanded', 'true');
      document.body.classList.add('q-menu-open');
    }

    function closeMenu() {
      if (!overlay || !hamburger) return;
      overlay.classList.remove('open');
      overlay.setAttribute('aria-hidden', 'true');
      hamburger.classList.remove('open');
      hamburger.setAttribute('aria-expanded', 'false');
      document.body.classList.remove('q-menu-open');
    }

    if (hamburger) hamburger.addEventListener('click', openMenu);
    if (closeBtn) closeBtn.addEventListener('click', closeMenu);

    if (overlay) {
      /* Click backdrop to close */
      overlay.addEventListener('click', function (e) {
        if (e.target === overlay) closeMenu();
      });
      /* Close on mobile nav link click */
      overlay.querySelectorAll('.q-mobile-nav-link, .q-mobile-btn-primary, .q-mobile-btn-secondary').forEach(function (el) {
        el.addEventListener('click', closeMenu);
      });
    }

    /* ESC key */
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeMenu();
    });

    /* ════════════════════════════════════════
       3. LANGUAGE DROPDOWN
       ════════════════════════════════════════ */
    var langDropdown = document.querySelector('.q-lang-dropdown');
    var langToggle = document.getElementById('q-lang-toggle');

    if (langDropdown && langToggle) {
      langToggle.addEventListener('click', function (e) {
        e.stopPropagation();
        var isOpen = langDropdown.classList.toggle('open');
        langToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      });

      document.addEventListener('click', function (e) {
        if (!langDropdown.contains(e.target)) {
          langDropdown.classList.remove('open');
          langToggle.setAttribute('aria-expanded', 'false');
        }
      });
    }

    /* ════════════════════════════════════════
       4. GLOW BUTTON — mouse-tracking radial
       ════════════════════════════════════════ */
    document.querySelectorAll('.q-btn-nav-primary, .q-btn-primary').forEach(function (btn) {
      var glow = btn.querySelector('.q-btn-glow');
      if (!glow) return;

      btn.addEventListener('mousemove', function (e) {
        var rect = btn.getBoundingClientRect();
        var x = e.clientX - rect.left;
        var y = e.clientY - rect.top;
        glow.style.left = x + 'px';
        glow.style.top = y + 'px';
      });
    });

    /* ════════════════════════════════════════
       5. SCROLL REVEAL — IntersectionObserver
       ════════════════════════════════════════ */
    var reveals = document.querySelectorAll('.q-reveal');
    if (reveals.length && 'IntersectionObserver' in window) {
      var obs = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            obs.unobserve(entry.target);
          }
        });
      }, { threshold: 0.08, rootMargin: '0px 0px -20px 0px' });
      reveals.forEach(function (el) { obs.observe(el); });
    } else {
      reveals.forEach(function (el) { el.classList.add('visible'); });
    }

    /* ════════════════════════════════════════
       6. STAGGERED GRID REVEALS
       ════════════════════════════════════════ */
    var grids = document.querySelectorAll('.q-pricing-grid, .q-services-grid, .q-testimonials-grid');
    if (grids.length && 'IntersectionObserver' in window) {
      var gridObs = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-revealed');
            gridObs.unobserve(entry.target);
          }
        });
      }, { threshold: 0.05, rootMargin: '0px 0px -40px 0px' });
      grids.forEach(function (el) { gridObs.observe(el); });
    } else {
      grids.forEach(function (el) { el.classList.add('is-revealed'); });
    }

    /* ════════════════════════════════════════
       7. SMOOTH SCROLL — hash anchors
       ════════════════════════════════════════ */
    document.querySelectorAll('a[href^="#"]').forEach(function (a) {
      a.addEventListener('click', function (e) {
        var id = this.getAttribute('href');
        if (id && id.length > 1) {
          var t = document.querySelector(id);
          if (t) {
            e.preventDefault();
            var top = t.getBoundingClientRect().top + window.scrollY - 80;
            window.scrollTo({ top: top, behavior: 'smooth' });
          }
        }
      });
    });

  });
})();
