(function () {
    'use strict';

    var sidebar = document.querySelector('[data-sidebar]');
    var toggle = document.querySelector('[data-sidebar-toggle]');
    var backdrop = document.querySelector('[data-sidebar-backdrop]');

    function openSidebar() {
        if (!sidebar) return;
        sidebar.classList.add('is-open');
        if (backdrop) backdrop.hidden = false;
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        if (!sidebar) return;
        sidebar.classList.remove('is-open');
        if (backdrop) backdrop.hidden = true;
        document.body.style.overflow = '';
    }

    if (toggle) {
        toggle.addEventListener('click', function () {
            if (sidebar.classList.contains('is-open')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });
    }

    if (backdrop) backdrop.addEventListener('click', closeSidebar);

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') closeSidebar();
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 1024) closeSidebar();
    });

    /* Password visibility */
    document.querySelectorAll('[data-password-toggle]').forEach(function (button) {
        button.addEventListener('click', function () {
            var target = document.getElementById(button.getAttribute('data-password-toggle'));
            if (!target) return;
            var isPassword = target.type === 'password';
            target.type = isPassword ? 'text' : 'password';
            button.textContent = isPassword ? 'Hide' : 'Show';
        });
    });

    /* Image preview */
    document.querySelectorAll('[data-image-input]').forEach(function (input) {
        input.addEventListener('change', function () {
            var preview = document.querySelector('[data-image-preview]');
            if (!preview || !input.files || !input.files[0]) return;
            var image = preview.querySelector('img');
            if (!image) {
                image = document.createElement('img');
                preview.insertBefore(image, preview.firstChild);
            }
            image.src = URL.createObjectURL(input.files[0]);
        });
    });

    /* Delete confirmations */
    document.querySelectorAll('form[data-confirm]').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            var message = form.getAttribute('data-confirm') || 'Are you sure?';
            if (!window.confirm(message)) {
                event.preventDefault();
            }
        });
    });

    /* Auto hide alerts */
    document.querySelectorAll('[data-auto-dismiss]').forEach(function (alert) {
        window.setTimeout(function () {
            alert.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-6px)';
            window.setTimeout(function () {
                alert.remove();
            }, 320);
        }, 6000);
    });
})();
