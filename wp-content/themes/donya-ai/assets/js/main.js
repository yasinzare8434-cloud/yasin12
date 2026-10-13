(function () {
    'use strict';

    // Theme toggle
    var themeToggle = document.getElementById('theme-toggle');
    var stored = localStorage.getItem('donya-ai-theme');
    if (stored === 'dark') {
        document.documentElement.setAttribute('data-theme', 'dark');
    }
    if (themeToggle) {
        themeToggle.addEventListener('click', function () {
            var current = document.documentElement.getAttribute('data-theme');
            if (current === 'dark') {
                document.documentElement.removeAttribute('data-theme');
                localStorage.setItem('donya-ai-theme', 'light');
            } else {
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('donya-ai-theme', 'dark');
            }
        });
    }

    // Mobile menu toggle
    var menuToggle = document.getElementById('menu-toggle');
    var siteNav = document.getElementById('site-nav');
    if (menuToggle && siteNav) {
        menuToggle.addEventListener('click', function () {
            siteNav.classList.toggle('open');
            menuToggle.classList.toggle('active');
            var expanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !expanded);
        });
    }

    // Close mobile menu on link click
    if (siteNav) {
        siteNav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                siteNav.classList.remove('open');
                if (menuToggle) {
                    menuToggle.classList.remove('active');
                    menuToggle.setAttribute('aria-expanded', 'false');
                }
            });
        });
    }

    // Newsletter form
    document.querySelectorAll('.newsletter-form').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var input = form.querySelector('input[type="email"]');
            var btn = form.querySelector('button[type="submit"]');
            if (input && input.value && btn) {
                btn.textContent = '✓ ثبت شد';
                btn.style.background = '#22c55e';
                input.value = '';
                setTimeout(function () {
                    btn.textContent = 'عضویت';
                    btn.style.background = '';
                }, 3000);
            }
        });
    });
})();
