'use strict';

const form = document.getElementById('partnership-form');
if (form) {
    form.addEventListener('submit', () => {
        const button = form.querySelector('button[type="submit"]');
        button.disabled = true;
        button.textContent = 'Sending your enquiry…';
    });
}

// Restore the submit button after browser back/forward navigation.
window.addEventListener('pageshow', () => {
    const button = form?.querySelector('button[type="submit"]');
    if (button?.disabled) {
        button.disabled = false;
        button.textContent = 'Discuss partnership opportunities →';
    }
});

document.querySelector('.form-notice')?.focus({ preventScroll: true });
