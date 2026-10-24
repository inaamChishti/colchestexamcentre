(function () {
    'use strict';

    var header = document.querySelector('[data-header]');
    var navToggle = document.querySelector('[data-nav-toggle]');
    var mobileNav = document.querySelector('[data-mobile-nav]');
    var backdrop = document.querySelector('[data-nav-backdrop]');
    var navClose = document.querySelector('[data-nav-close]');

    function setHeaderState() {
        if (!header) return;
        header.classList.toggle('is-scrolled', window.scrollY > 12);
    }

    setHeaderState();
    window.addEventListener('scroll', setHeaderState, { passive: true });

    function openNav() {
        if (!mobileNav) return;
        mobileNav.classList.add('is-open');
        if (backdrop) {
            backdrop.hidden = false;
            requestAnimationFrame(function () {
                backdrop.classList.add('is-visible');
            });
        }
        if (navToggle) {
            navToggle.classList.add('is-active');
            navToggle.setAttribute('aria-expanded', 'true');
            navToggle.setAttribute('aria-label', 'Close menu');
        }
        document.body.style.overflow = 'hidden';
    }

    function closeNav() {
        if (!mobileNav) return;
        mobileNav.classList.remove('is-open');
        if (backdrop) {
            backdrop.classList.remove('is-visible');
            window.setTimeout(function () {
                backdrop.hidden = true;
            }, 250);
        }
        if (navToggle) {
            navToggle.classList.remove('is-active');
            navToggle.setAttribute('aria-expanded', 'false');
            navToggle.setAttribute('aria-label', 'Open menu');
        }
        document.body.style.overflow = '';
    }

    if (navToggle) {
        navToggle.addEventListener('click', function () {
            if (mobileNav.classList.contains('is-open')) {
                closeNav();
            } else {
                openNav();
            }
        });
    }

    if (navClose) navClose.addEventListener('click', closeNav);
    if (backdrop) backdrop.addEventListener('click', closeNav);

    if (mobileNav) {
        mobileNav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeNav);
        });
    }

    /* Desktop navigation dropdowns */
    var navGroups = document.querySelectorAll('[data-nav-group]');

    function closeNavGroups(except) {
        navGroups.forEach(function (group) {
            if (group === except) return;
            group.classList.remove('is-open');
            var button = group.querySelector('[data-nav-group-toggle]');
            if (button) button.setAttribute('aria-expanded', 'false');
        });
    }

    navGroups.forEach(function (group) {
        var button = group.querySelector('[data-nav-group-toggle]');
        if (!button) return;

        button.addEventListener('click', function (event) {
            event.preventDefault();
            var willOpen = !group.classList.contains('is-open');
            closeNavGroups(group);
            group.classList.toggle('is-open', willOpen);
            button.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
        });
    });

    document.addEventListener('click', function (event) {
        if (!event.target.closest('[data-nav-group]')) closeNavGroups();
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') closeNavGroups();
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') closeNav();
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 1024) closeNav();
    });

    /* Reveal on scroll */
    var revealItems = document.querySelectorAll('.reveal');

    if ('IntersectionObserver' in window && revealItems.length) {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

        revealItems.forEach(function (item) {
            revealObserver.observe(item);
        });
    } else {
        revealItems.forEach(function (item) {
            item.classList.add('is-visible');
        });
    }

    /* Flash messages */
    document.querySelectorAll('[data-flash]').forEach(function (flash) {
        var close = flash.querySelector('[data-flash-close]');

        function dismiss() {
            flash.classList.add('is-hiding');
            window.setTimeout(function () {
                flash.remove();
            }, 320);
        }

        if (close) close.addEventListener('click', dismiss);
        window.setTimeout(dismiss, 7000);
    });

    /* Course filter */
    var filterBar = document.querySelector('[data-filter-bar]');
    var courseGrid = document.querySelector('[data-course-grid]');

    if (filterBar && courseGrid) {
        var chips = filterBar.querySelectorAll('[data-filter]');
        var cards = courseGrid.querySelectorAll('.course-card');
        var emptyMessage = document.querySelector('[data-filter-empty]');

        function applyFilter(filter) {
            var visible = 0;

            cards.forEach(function (card) {
                var match = filter === 'all' || card.getAttribute('data-level') === filter;
                card.hidden = !match;
                if (match) visible++;
            });

            chips.forEach(function (chip) {
                var active = chip.getAttribute('data-filter') === filter;
                chip.classList.toggle('is-active', active);
                chip.setAttribute('aria-pressed', active ? 'true' : 'false');
            });

            if (emptyMessage) {
                emptyMessage.hidden = visible !== 0 || filter === 'all' ? true : false;
            }
        }

        chips.forEach(function (chip) {
            chip.addEventListener('click', function () {
                applyFilter(chip.getAttribute('data-filter'));
            });
        });
    }

    /* Course enquiry prefill */
    var enquiryForm = document.querySelector('[data-enquiry-form]');
    var subjectInput = enquiryForm ? enquiryForm.querySelector('[data-subject-input]') : null;

    function prefillFromQuery() {
        if (!subjectInput) return;
        var params = new URLSearchParams(window.location.search);
        var course = params.get('course');
        if (course && !subjectInput.value) {
            subjectInput.value = course + ' — course enquiry';
        }
    }

    prefillFromQuery();

    document.querySelectorAll('[data-course-enquire]').forEach(function (link) {
        link.addEventListener('click', function (event) {
            if (!subjectInput) return;
            event.preventDefault();
            var title = link.getAttribute('data-course-title') || '';
            subjectInput.value = title + ' — course enquiry';

            var target = document.getElementById('enquire');
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                window.setTimeout(function () {
                    subjectInput.focus({ preventScroll: true });
                }, 520);
            }
        });
    });

    /* Form submit state */
    document.querySelectorAll('form[data-enquiry-form]').forEach(function (form) {
        form.addEventListener('submit', function () {
            var button = form.querySelector('[data-submit]');
            if (!button) return;
            button.disabled = true;
            button.style.opacity = '0.7';
            button.innerHTML = 'Sending…';
        });
    });
})();
