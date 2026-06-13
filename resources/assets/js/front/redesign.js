(function () {
  'use strict';

  /* ───────────────────────────────────────
     Nav: scroll effect
     ─────────────────────────────────────── */
  const nav = document.querySelector('.nav');
  if (nav) {
    const onScroll = function () {
      nav.classList.toggle('nav-scrolled', window.scrollY > 60);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* ───────────────────────────────────────
     Nav: mobile toggle
     ─────────────────────────────────────── */
  const toggle = document.querySelector('.nav-toggle');
  const navLinks = document.querySelector('.nav-links');
  if (toggle && navLinks) {
    toggle.addEventListener('click', function () {
      const isOpen = navLinks.classList.toggle('open');
      toggle.classList.toggle('open');
      toggle.setAttribute('aria-expanded', isOpen);
    });

    function closeMobileNav() {
      toggle.classList.remove('open');
      navLinks.classList.remove('open');
      toggle.setAttribute('aria-expanded', 'false');
    }

    navLinks.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', closeMobileNav);
    });

    document.addEventListener('click', function (e) {
      if (navLinks.classList.contains('open') && !nav.contains(e.target)) {
        closeMobileNav();
      }
    });
  }

  /* ───────────────────────────────────────
     Scroll reveal via IntersectionObserver
     Watches .q-reveal and .q-reveal-group
     ─────────────────────────────────────── */
  function initReveal() {
    var revealElements = document.querySelectorAll('.q-reveal');
    if (revealElements.length) {
      var observer = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add('visible');
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
      );
      revealElements.forEach(function (el) {
        observer.observe(el);
      });
    }

    // Grid containers — add .is-revealed when they enter viewport
    var gridSelectors = [
      '.q-pricing-grid',
      '.q-services-grid',
      '.q-testimonials-grid',
    ];
    gridSelectors.forEach(function (sel) {
      var grid = document.querySelector(sel);
      if (!grid) return;
      var gridObserver = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add('is-revealed');
              gridObserver.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.08, rootMargin: '0px 0px -40px 0px' }
      );
      gridObserver.observe(grid);
    });
  }

  // Run after a short delay to ensure CSS animations are ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initReveal);
  } else {
    initReveal();
  }

  /* ───────────────────────────────────────
     Smooth scroll for anchor links
     ─────────────────────────────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      var target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        var offset = 80;
        var top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  /* ───────────────────────────────────────
     Scroll progress bar
     ─────────────────────────────────────── */
  var progressBar = document.createElement('div');
  progressBar.className = 'q-scroll-progress';
  progressBar.setAttribute('aria-hidden', 'true');
  document.body.appendChild(progressBar);

  var updateProgress = function () {
    var scrollTop = window.scrollY;
    var docHeight = document.documentElement.scrollHeight - window.innerHeight;
    var progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
    progressBar.style.width = progress + '%';
  };
  window.addEventListener('scroll', updateProgress, { passive: true });
  updateProgress();

  /* ───────────────────────────────────────
     Back-to-top button
     ─────────────────────────────────────── */
  var backToTop = document.createElement('button');
  backToTop.className = 'q-back-to-top';
  backToTop.setAttribute('aria-label', 'Back to top');
  backToTop.innerHTML =
    '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>';
  document.body.appendChild(backToTop);

  backToTop.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  var toggleBackToTop = function () {
    backToTop.classList.toggle('visible', window.scrollY > 400);
  };
  window.addEventListener('scroll', toggleBackToTop, { passive: true });
  toggleBackToTop();
})();
