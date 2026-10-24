(function () {
    'use strict';

    var form = document.getElementById('page-editor-form');
    if (!form) {
        return;
    }

    var frame = form.querySelector('[data-editor-frame]');
    var fields = form.querySelector('[data-editor-fields]');
    var loading = form.querySelector('[data-editor-loading]');
    var status = form.querySelector('[data-editor-status]');
    var dot = form.querySelector('[data-editor-dot]');
    var saveButtons = form.querySelectorAll('[data-editor-save]');
    var reloadButtons = form.querySelectorAll('[data-editor-reload]');
    var currentDoc = null;
    var doc = null;
    var ready = false;

    function setStatus(message, state) {
        if (status) {
            status.textContent = message;
        }

        if (dot) {
            dot.className = 'editor-status-dot';
            if (state) {
                dot.classList.add('is-' + state);
            }
        }
    }

    function setReady(isReady) {
        ready = isReady;
        saveButtons.forEach(function (button) {
            button.disabled = !isReady;
        });
    }

    function markDirty() {
        if (dot) {
            dot.className = 'editor-status-dot is-dirty';
        }

        if (status) {
            status.textContent = 'You have unsaved changes.';
        }
    }

    function clearFields() {
        fields.innerHTML = '';
    }

    function editorStyle() {
        return [
            '.ve-preview [data-edit-key] { outline: 2px dashed #2563eb; outline-offset: 3px; border-radius: 3px; }',
            '.ve-preview [data-edit-key]:hover { outline-color: #1d4ed8; }',
            '.ve-preview .ve-field { font: inherit; color: inherit; letter-spacing: inherit; line-height: 1.35; background: #f8fbff; border: 1px solid #2563eb; border-radius: 3px; padding: 0.1em 0.3em; box-sizing: border-box; width: 100%; max-width: 100%; }',
            '.ve-preview .ve-field--inline { width: auto; min-width: 4rem; }',
            '.ve-preview textarea.ve-field { resize: vertical; min-height: 3.4em; overflow: hidden; }',
            '.ve-preview .ve-field:focus { outline: 2px solid #93c5fd; outline-offset: 1px; background: #ffffff; }',
            '.ve-preview img[data-edit-image] { outline: 4px dashed #2563eb; outline-offset: -4px; cursor: pointer; }',
            '.ve-preview img[data-edit-image]:hover { outline-color: #1d4ed8; }',
            '.ve-preview .reveal { opacity: 1 !important; transform: none !important; }',
            '.ve-preview html { scroll-behavior: auto; }'
        ].join('\n');
    }

    function injectStyles(doc) {
        if (doc.getElementById('ve-editor-style')) {
            return;
        }

        var style = doc.createElement('style');
        style.id = 've-editor-style';
        style.textContent = editorStyle();
        (doc.head || doc.documentElement).appendChild(style);
    }

    function createHiddenField(name, value) {
        var input = doc.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        fields.appendChild(input);
        return input;
    }

    function resizeTextarea(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = (textarea.scrollHeight + 2) + 'px';
    }

    function setupTextEditors() {
        var seen = {};

        doc.querySelectorAll('[data-edit-key]').forEach(function (element) {
            var key = element.getAttribute('data-edit-key');
            if (!key || seen[key]) {
                return;
            }
            seen[key] = true;

            var value = (element.textContent || '').replace(/\s+/g, ' ').trim();
            var isTextarea = element.getAttribute('data-edit-type') === 'textarea' || /^H[1-6]$/.test(element.tagName);
            var field = doc.createElement(isTextarea ? 'textarea' : 'input');
            var hidden = createHiddenField('page_fields[' + key + ']', value);

            if (!isTextarea) {
                field.type = 'text';
            }

            field.className = 've-field' + (element.tagName.toLowerCase() === 'span' ? ' ve-field--inline' : '');
            field.value = value;
            field.setAttribute('aria-label', key);
            field.spellcheck = true;

            if (!isTextarea) {
                field.size = Math.min(Math.max(value.length + 2, 8), 70);
            }

            field.addEventListener('input', function () {
                hidden.value = field.value;
                if (isTextarea) {
                    resizeTextarea(field);
                }
                markDirty();
            });

            field.addEventListener('blur', function () {
                field.value = field.value.trim();
                hidden.value = field.value;
            });

            element.classList.add('ve-editable');
            element.innerHTML = '';
            element.appendChild(field);

            if (isTextarea) {
                resizeTextarea(field);
            }
        });
    }

    function setupImageEditors() {
        doc.querySelectorAll('[data-edit-image]').forEach(function (image) {
            var key = image.getAttribute('data-edit-image');
            if (!key) {
                return;
            }

            image.title = 'Click to replace this image';

            var upload = doc.createElement('input');
            upload.type = 'file';
            upload.name = 'page_images[' + key + ']';
            upload.accept = 'image/jpeg,image/png,image/webp';
            upload.hidden = true;
            fields.appendChild(upload);

            image.addEventListener('click', function (event) {
                event.preventDefault();
                event.stopPropagation();
                upload.click();
            });

            upload.addEventListener('change', function () {
                var file = upload.files && upload.files[0];
                if (!file) {
                    return;
                }

                if (file.size > 4 * 1024 * 1024) {
                    window.alert('Please choose an image smaller than 4MB.');
                    upload.value = '';
                    return;
                }

                if (image.dataset.previewUrl) {
                    URL.revokeObjectURL(image.dataset.previewUrl);
                }

                var url = URL.createObjectURL(file);
                image.dataset.previewUrl = url;
                image.src = url;
                setStatus('New image selected: ' + file.name + '. Save to publish it.', 'dirty');
            });
        });
    }

    function bindPreview(doc) {
        doc.addEventListener('click', function (event) {
            var link = event.target.closest('a, button');
            if (link) {
                event.preventDefault();
                var field = event.target.closest('.ve-field');
                if (field) {
                    field.focus();
                }
            }
        }, true);

        doc.addEventListener('submit', function (event) {
            event.preventDefault();
        }, true);
    }

    function setupPreview() {
        var incoming = frame.contentDocument;
        if (!incoming || !incoming.body || incoming.readyState === 'loading') {
            return;
        }

        if (incoming === currentDoc) {
            return;
        }

        currentDoc = incoming;
        doc = incoming;
        clearFields();
        injectStyles(doc);
        doc.body.classList.add('ve-preview');
        bindPreview(doc);
        setupTextEditors();
        setupImageEditors();

        if (loading) {
            loading.hidden = true;
        }

        setReady(true);
        setStatus('Click any blue outline to edit. Click an image to replace it.', 'ready');
    }

    if (frame) {
        frame.addEventListener('load', function () {
            if (loading) {
                loading.hidden = false;
            }
            setupPreview();
        });

        if (frame.contentDocument && frame.contentDocument.readyState === 'complete') {
            setupPreview();
        }
    }

    reloadButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            if (!frame || !frame.contentWindow) {
                return;
            }

            setReady(false);
            clearFields();
            currentDoc = null;
            if (loading) {
                loading.hidden = false;
            }
            setStatus('Reloading page preview\u2026', 'loading');
            frame.contentWindow.location.reload();
        });
    });

    form.addEventListener('submit', function (event) {
        if (!ready) {
            event.preventDefault();
            window.alert('The page preview is still loading. Please wait a moment and try again.');
            return;
        }

        setReady(false);
        setStatus('Saving your changes\u2026', 'saving');
        saveButtons.forEach(function (button) {
            button.textContent = 'Saving\u2026';
        });
    });
})();
