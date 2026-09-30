<?= $this->section('style') ?>
<style>
    .thank-you-section { padding: 80px 20px; background: #f7f7f7; }
    .thank-you-card { max-width: 720px; margin: auto; padding: 60px 30px; background: #fff; border-radius: 16px; border-top: 5px solid #ff6300; box-shadow: 0 12px 40px rgba(0,0,0,.06); text-align: center; }
    .thank-you-icon { display: inline-flex; align-items: center; justify-content: center; width: 80px; height: 80px; margin-bottom: 24px; border-radius: 50%; background: #fff0e6; color: #ff6300; font-size: 40px; }
    .thank-you-card h1 { color: #222; font-size: clamp(32px, 5vw, 48px); margin-bottom: 16px; }
    .thank-you-card p { color: #555; font-size: 18px; line-height: 1.7; }
    .thank-you-home { display: inline-block; margin-top: 24px; padding: 14px 32px; border-radius: 6px; background: #ff6300; color: #fff; font-weight: 600; text-decoration: none; }
    .thank-you-home:hover, .thank-you-home:focus { background: #222; color: #fff; }
    @media (max-width: 575px) { .thank-you-section { padding: 40px 15px; } .thank-you-card { padding: 40px 20px; } }
</style>
<?= $this->endSection() ?>

<main class="thank-you-section">
    <div class="thank-you-card">
        <span class="thank-you-icon" aria-hidden="true">&#10003;</span>
        <h1>Thank you!</h1>
        <p>Your submission has been received successfully.<br>Our team will review your details and get in touch with you.</p>
        <a class="thank-you-home" href="<?= base_url() ?>">Back to Home</a>
    </div>
</main>
