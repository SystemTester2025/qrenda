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
      toggle.classList.toggle('open');
      navLinks.classList.toggle('open');
      toggle.setAttribute('aria-expanded', navLinks.classList.contains('open'));
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
     ─────────────────────────────────────── */
  var revealElements = document.querySelectorAll('.reveal');
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

})();
