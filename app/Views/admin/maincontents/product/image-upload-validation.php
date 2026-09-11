<script>
(function () {
    const form = document.getElementById('validation-form123');
    const selector = 'input[type="file"][name="others_image[]"], input[type="file"][name="others_image"]';
    const message = 'Each product image must be 200 KB or smaller. Please choose a smaller image.';

    function validateImage(input) {
        const oversized = Array.from(input.files || []).some(file => file.size > 200 * 1024);
        let error = input.nextElementSibling;
        if (!error || !error.classList.contains('product-image-size-error')) {
            error = document.createElement('small');
            error.className = 'product-image-size-error text-danger';
            error.setAttribute('role', 'alert');
            input.insertAdjacentElement('afterend', error);
        }
        error.textContent = oversized ? message : '';
        error.style.display = oversized ? 'block' : 'none';
        input.setCustomValidity(oversized ? message : '');
        input.setAttribute('aria-invalid', oversized ? 'true' : 'false');
        return !oversized;
    }

    form.addEventListener('change', function (event) {
        if (event.target.matches(selector)) validateImage(event.target);
    });
    form.addEventListener('submit', function (event) {
        let valid = true;
        form.querySelectorAll(selector).forEach(function (input) {
            if (!validateImage(input)) valid = false;
        });
        if (!valid) {
            event.preventDefault();
            event.stopImmediatePropagation();
            form.reportValidity();
        }
    }, true);
})();
</script>
