<?php if (captcha_is_disabled()): ?>
<script>
// Preserve form callbacks without requesting a Google CAPTCHA on localhost.
(function () {
    var activeForm = null;
    var widgets = [];
    function runCallback(button) {
        var callback = button && window[button.getAttribute('data-callback')];
        if (typeof callback === 'function') callback('localhost');
    }
    document.addEventListener('click', function (event) {
        var button = event.target.closest('.g-recaptcha[data-callback]');
        if (!button || button.disabled) return;
        event.preventDefault();
        activeForm = button.form;
        runCallback(button);
    }, true);
    document.addEventListener('submit', function (event) {
        activeForm = event.target;
    }, true);
    window.grecaptcha = {
        ready: function (callback) { callback(); },
        render: function (container, options) {
            widgets.push(options);
            return widgets.length - 1;
        },
        reset: function () {},
        execute: function (widgetId) {
            if (typeof widgetId === 'number' && widgets[widgetId]) {
                widgets[widgetId].callback('localhost');
                return Promise.resolve('localhost');
            }
            runCallback(activeForm && activeForm.querySelector('.g-recaptcha[data-callback]'));
            return Promise.resolve('localhost');
        }
    };
})();
</script>
<?php else: ?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<?php endif; ?>
