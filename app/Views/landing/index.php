<?php
$asset = base_url('landing');
$icons = [
    'arrow' => '<path d="M5 12h14m-6-6 6 6-6 6"/>',
    'phone' => '<path d="m8 3 3 5-3 3a15 15 0 0 0 5 5l3-3 5 3c0 4-2 6-5 5C9 19 5 15 3 8 2 5 4 3 8 3Z"/>',
    'check' => '<path d="m5 12 4 4L19 6"/>',
    'chimney' => '<path d="M9 3h6v6l5 5v3H4v-3l5-5V3Zm-5 11h16M7 21h10"/>',
    'drop' => '<path d="M12 2s-7 8-7 13a7 7 0 0 0 14 0c0-5-7-13-7-13Z"/><path d="M8 15a4 4 0 0 0 4 4"/>',
    'cooktop' => '<rect x="3" y="5" width="18" height="15" rx="2"/><circle cx="8" cy="11" r="2"/><circle cx="16" cy="11" r="2"/><path d="M7 17h2m6 0h2M7 2v3m10-3v3"/>',
    'heater' => '<rect x="6" y="2" width="12" height="18" rx="3"/><circle cx="12" cy="8" r="2"/><path d="M9 15h6m-6 5v2m6-2v2"/>',
    'home' => '<path d="m3 10 9-7 9 7v11h-7v-8h-4v8H3Z"/>',
    'star' => '<path d="m12 2 3 6 7 1-5 5 1 7-6-3-6 3 1-7-5-5 7-1Z"/>',
    'shield' => '<path d="m12 2 8 4v6c0 5-8 10-8 10S4 17 4 12V6Z"/><path d="m8 11 3 3 5-5"/>',
    'factory' => '<path d="M3 21V10l6 3V7l6 3V3h5l1 18H3Zm3-4h2m4 0h2m3 0h2"/>',
    'briefcase' => '<rect x="3" y="7" width="18" height="14" rx="2"/><path d="M8 7V3h8v4M3 12l9 3 9-3m-9 0v5"/>',
    'growth' => '<path d="m3 17 6-6 4 4 8-10m-6 0h6v6"/>',
    'support' => '<path d="M4 14v-3a8 8 0 0 1 16 0v3M4 12H2v7h4v-7H4Zm16 0h2v7h-4v-7h2Zm0 7c0 3-4 3-8 3"/>',
    'pin' => '<path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
];
$icon = static function ($name) use ($icons) { return '<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $icons[$name] . '</svg>'; };
$products = [
    ['chimney', 'Kitchen Chimneys', 'Explore a range of kitchen ventilation solutions, including advanced technology-driven chimney models.'],
    ['drop', 'Water Purifiers', 'Explore home water purification solutions from an experienced Indian manufacturer.'],
    ['cooktop', 'Cooktops & Hob Tops', 'Modern cooking appliance options for contemporary kitchens.'],
    ['heater', 'Water Heaters', 'Hot water solutions for everyday household requirements.'],
    ['home', 'Modular Kitchens', 'Explore modular kitchen solutions for your customers.'],
];
$benefits = [
    ['star', '24+ Years of Industry Experience', 'A business built on more than two decades of experience in Kitchen Chimneys and Water Purification.'],
    ['shield', 'ISI-Marked Kitchen Chimneys & Water Purifiers', 'Both key product categories carry ISI Mark certification.'],
    ['briefcase', 'GeM Registered Company', 'Registered on the Government e-Marketplace for institutional and government procurement opportunities.'],
    ['factory', 'Make in India Manufacturing', 'Kitchen Chimneys and Water Purifiers manufactured in India with a focus on technology and product development.'],
    ['home', 'Diverse Product Portfolio', 'Multiple home and kitchen appliance categories under one brand.'],
    ['support', 'Marketing & Business Support', 'Product catalogues, promotional creatives, sales materials and business support for partners.'],
    ['growth', 'Growing Market Opportunity', 'Opportunities for dealers and distributors across multiple territories.'],
];
$glance = [
    ['star', '24+ YEARS OF EXPERIENCE', 'Established in 2002, with more than two decades of experience in the home appliance and water purification industry.'],
    ['shield', 'ISI-MARKED PRODUCTS', 'Our Kitchen Chimneys and Water Purifiers carry ISI Mark certification, reflecting our focus on applicable quality and safety standards in these product categories.'],
    ['briefcase', 'GeM REGISTERED', 'LEADSS is registered on the Government e-Marketplace (GeM), strengthening our presence in the institutional and government procurement ecosystem.'],
    ['factory', 'MAKE IN INDIA', 'We manufacture Kitchen Chimneys and Water Purifiers in India, following the Make in India approach with a focus on technology, product development and manufacturing capabilities.'],
    ['pin', 'ESTABLISHED INDIAN BRAND', 'With 24+ years of experience, LEADSS has been building its presence across multiple markets, particularly across Eastern and Northeastern India.'],
];
$partnershipBenefits = [
    ['home', 'Diverse Product Portfolio', 'Explore multiple product categories under the LEADSS brand.'],
    ['star', 'Experienced Brand', 'Benefit from 24+ years of category experience.'],
    ['shield', 'ISI-Marked Key Categories', 'Kitchen Chimneys and Water Purifiers with ISI Mark certification.'],
    ['factory', 'Make in India Products', 'Indian manufacturing capability in key product categories.'],
    ['briefcase', 'GeM Registered', 'Registered on Government e-Marketplace.'],
    ['support', 'Marketing Support', 'Product catalogues, promotional creatives and sales materials.'],
    ['arrow', 'Partner Onboarding', 'Understand the application process, commercial terms and next steps.'],
];
$faqs = [
    ['Which businesses can enquire?', 'Dealers, retailers, wholesalers, distributors and entrepreneurs can submit an enquiry.'],
    ['Can I enquire for my city?', 'Yes. Share your city or district to discuss territory availability.'],
    ['What product categories are available?', 'Kitchen Chimneys, Water Purifiers, Cooktops & Hob Tops, Water Heaters and Modular Kitchens.'],
    ['Are LEADSS products ISI marked?', 'Yes. LEADSS Kitchen Chimneys and Water Purifiers carry ISI Mark certification.'],
    ['Is LEADSS a GeM-registered company?', 'Yes. LEADSS is registered on the Government e-Marketplace (GeM).'],
    ['Are LEADSS products manufactured in India?', 'LEADSS manufactures Kitchen Chimneys and Water Purifiers in India, following a Make in India approach.'],
    ['How much experience does LEADSS have?', 'LEADSS was established in 2002 and has 24+ years of experience in the relevant product categories.'],
    ['How do I learn about commercial terms?', 'Submit your enquiry to discuss product range, investment, margins, territory availability and other commercial terms with the team.'],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dealership & Distributorship Opportunities | LEADSS</title>
    <meta name="description" content="Grow your business with LEADSS. Explore dealership and distributorship opportunities in kitchen chimneys, water purifiers and home appliances. Established in 2002.">
    <link rel="icon" type="image/svg+xml" href="<?= $asset ?>/images/favicon.svg">
    <link rel="stylesheet" href="<?= $asset ?>/css/landing.css">
    <script src="<?= $asset ?>/js/landing.js" defer></script>
</head>
<body>
<a class="skip-link" href="#main">Skip to content</a>
<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="#" aria-label="LEADSS partner programme home"><img src="<?= $asset ?>/images/leadss-logo.png" width="257" height="70" alt="LEADSS"><span>DEALER & DISTRIBUTOR PARTNER PROGRAMME</span></a>
        <div class="header-actions"><a class="helpline" href="tel:+919593679111"><span>Partnership helpline</span><strong>95936 79111</strong></a><a class="button button-small" href="#enquire">Enquire now <?= $icon('arrow') ?></a></div>
    </div>
</header>
<main id="main">
    <section class="hero" aria-labelledby="hero-title">
        <div class="container hero-grid">
            <div class="hero-copy">
                <p class="eyebrow"><span class="status-dot"></span> LEADSS B2B LEAD GENERATION LANDING PAGE</p>
                <h1 id="hero-title">Your Next Business Opportunity <em>Starts Here</em></h1>
                <p class="hero-intro">Expand your business with <strong>LEADSS</strong> — a trusted Indian manufacturer of Kitchen Chimneys and Water Purifiers. Explore dealership and distributorship opportunities across your city.</p>
                <p class="hero-detail">With 24+ years of industry experience, LEADSS combines Indian manufacturing, certified product categories, technology and business support to create long-term opportunities for dealers and distributors.</p>
                <ul class="hero-checks"><li><?= $icon('check') ?> ISI-Marked Kitchen Chimneys & Water Purifiers</li><li><?= $icon('check') ?> Diverse Product Portfolio</li><li><?= $icon('check') ?> Marketing & Business Support</li></ul>
                <div class="hero-stats"><div><strong>24<span>+</span></strong><span>Years of experience</span></div><div><strong>2002</strong><span>Year established</span></div><div><strong>5</strong><span>Product categories</span></div><div><strong>GeM</strong><span>Registered company</span></div></div>
                <a class="review-badge" href="https://www.google.com/maps?cid=6650625559860561719" target="_blank" rel="noopener noreferrer" aria-label="View LEADSS on Google Maps"><span class="google-letter">G</span><span><span class="review-stars" aria-label="5 stars">★★★★★</span><span><strong>4.7/5</strong> on Google <span class="review-link">View profile ↗</span></span></span></a>
            </div>
            <aside class="enquiry-card" id="enquire" aria-labelledby="form-title">
                <div class="card-topline"><span class="eyebrow">Interested in selling LEADSS products?</span><span class="form-mark"><?= $icon('growth') ?></span></div>
                <h2 id="form-title">Let’s Discuss Your Business Goals</h2>
                <p>Share a few details. Our team can contact you to discuss the available dealership and distributorship opportunities.</p>
                <?php if ($success): ?><div class="form-notice success" role="status" tabindex="-1"><?= $icon('check') ?><span><?= esc($success) ?></span></div><?php endif; ?>
                <?php if ($errors || $formError): ?><div class="form-notice error" role="alert" tabindex="-1"><strong>Please check your enquiry.</strong><ul><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?><?php if ($formError): ?><li>Your form has expired. Please submit it again.</li><?php endif; ?></ul></div><?php endif; ?>
                <form action="<?= site_url('landing/submit') ?>" method="post" id="partnership-form">
                    <?= csrf_field() ?>
                    <div class="honey" aria-hidden="true"><label for="website">Website</label><input id="website" name="website" tabindex="-1" autocomplete="off"></div>
                    <div class="field"><label for="full_name">Full Name <span>*</span></label><input id="full_name" name="full_name" autocomplete="name" placeholder="Your full name" required minlength="2" maxlength="100" value="<?= esc($old['full_name'] ?? '', 'attr') ?>" <?= isset($errors['full_name']) ? 'aria-invalid="true"' : '' ?>></div>
                    <div class="field"><label for="mobile">Mobile Number <span>*</span></label><div class="phone-input"><span>+91</span><input type="tel" id="mobile" name="mobile" autocomplete="tel-national" inputmode="numeric" pattern="[6-9][0-9]{9}" title="Enter a 10-digit Indian mobile number" required maxlength="10" placeholder="10-digit mobile number" value="<?= esc($old['mobile'] ?? '', 'attr') ?>" <?= isset($errors['mobile']) ? 'aria-invalid="true"' : '' ?>></div></div>
                    <div class="field"><label for="city">City / District <span>*</span></label><input id="city" name="city" autocomplete="address-level2" placeholder="Where would you like to partner?" required minlength="2" maxlength="100" value="<?= esc($old['city'] ?? '', 'attr') ?>" <?= isset($errors['city']) ? 'aria-invalid="true"' : '' ?>></div>
                    <div class="field"><label for="business_type">Business Type <span>*</span></label><select id="business_type" name="business_type" required><option value="">Select your current business</option><?php foreach ($businessTypes as $type): ?><option value="<?= esc($type, 'attr') ?>" <?= ($old['business_type'] ?? '') === $type ? 'selected' : '' ?>><?= esc($type) ?></option><?php endforeach; ?></select></div>
                    <div class="field"><label for="interested_in">Interested In <span>*</span></label><select id="interested_in" name="interested_in" required><option value="">Select a partnership opportunity</option><?php foreach ($interests as $interest): ?><option value="<?= esc($interest, 'attr') ?>" <?= ($old['interested_in'] ?? '') === $interest ? 'selected' : '' ?>><?= esc($interest) ?></option><?php endforeach; ?></select></div>
                    <button class="button submit-button" type="submit">Discuss partnership opportunities <?= $icon('arrow') ?></button>
                    <p class="form-privacy">By submitting, you agree to be contacted by LEADSS / Leads Overseas Pvt. Ltd. about this enquiry. Your details are used to respond to your partnership request.</p>
                </form>
                <a class="form-phone" href="tel:+919593679111"><?= $icon('phone') ?> Call: <strong>95936 79111</strong></a>
            </aside>
        </div>
    </section>
    <section class="products section" id="products" aria-labelledby="products-title">
        <div class="container"><div class="section-heading"><div><h2 id="products-title">Explore Our Product Categories</h2></div><a class="text-link" href="#enquire">Interested in selling LEADSS products? <?= $icon('arrow') ?></a></div>
            <div class="product-grid"><?php foreach ($products as [$symbol, $name, $description]): ?><article class="product-card"><div class="product-icon"><?= $icon($symbol) ?></div><h3><?= esc($name) ?></h3><p><?= esc($description) ?></p><a href="#enquire" aria-label="Enquire about <?= esc($name, 'attr') ?>"><?= $icon('arrow') ?></a></article><?php endforeach; ?></div>
        </div>
    </section>
    <section class="about section section-light" id="about" aria-labelledby="about-title"><div class="container about-grid">
        <div><h2 id="about-title">About LEADSS</h2><div class="established"><span>EST.</span> 2002 <span>MAKE IN INDIA</span></div></div>
        <div class="about-copy"><p class="lead">LEADSS is the home appliance brand of Leads Overseas Pvt. Ltd., established in 2002.</p><p>With over 24 years of experience in the Kitchen Chimney and Water Purification categories, LEADSS manufactures and markets a growing range of home and kitchen appliances.</p><p>Our key product categories include:</p><ul class="hero-checks"><?php foreach ($products as [$symbol, $name]): ?><li><?= $icon('check') ?><?= esc($name) ?></li><?php endforeach; ?></ul><p>LEADSS follows a Make in India approach, with a strong focus on product development, manufacturing, technology and quality.</p></div>
    </div></section>
    <section class="section" aria-labelledby="glance-title"><div class="container">
        <h2 id="glance-title">LEADSS at a Glance</h2>
        <div class="benefits-grid"><?php foreach ($glance as [$symbol, $name, $description]): ?><article class="benefit"><?= $icon($symbol) ?><h3><?= esc($name) ?></h3><p><?= esc($description) ?></p></article><?php endforeach; ?>
            <article class="benefit"><?= $icon('star') ?><h3>4.7/5 GOOGLE RATING</h3><a class="review-badge" href="https://www.google.com/maps?cid=6650625559860561719" target="_blank" rel="noopener noreferrer" aria-label="View LEADSS on Google Maps"><span class="google-letter">G</span><span><span class="review-stars" aria-label="Google rating: 4.7 out of 5">★★★★★</span><span><strong>4.7/5</strong> on Google <span class="review-link">View profile ↗</span></span></span></a></article>
        </div>
    </div></section>
    <section class="section benefits" id="benefits" aria-labelledby="benefits-title"><div class="container">
        <div class="section-heading"><div><h2 id="benefits-title">Why Partner with LEADSS?</h2></div><p class="heading-description">Whether you are an established appliance dealer, wholesaler, retailer, distributor or entrepreneur, LEADSS offers the opportunity to build a business with an experienced Indian brand.</p></div>
        <h3>Why LEADSS?</h3>
        <div class="benefits-grid"><?php foreach ($benefits as [$symbol, $name, $description]): ?><article class="benefit"><?= $icon($symbol) ?><h3><?= esc($name) ?></h3><p><?= esc($description) ?></p></article><?php endforeach; ?></div>
    </div></section>
    <section class="quality section" aria-labelledby="quality-title"><div class="container quality-grid"><div><h2 id="quality-title">Our Manufacturing & Quality Commitment</h2><p>LEADSS combines Indian manufacturing, product development and more than 24 years of category experience to deliver products designed for the evolving needs of Indian consumers.</p><p>Our Kitchen Chimneys and Water Purifiers carry ISI Mark certification, while the company is also GeM registered.</p><p>Our manufacturing philosophy is aligned with the Make in India vision — developing and manufacturing products in India while continuously investing in technology, quality and innovation.</p></div><div class="quality-seals"><div><?= $icon('shield') ?><span><strong>ISI-Marked Products.</strong><small>Kitchen Chimneys & Water Purifiers</small></span></div><div><?= $icon('briefcase') ?><span><strong>GeM Registered.</strong><small>Government e-Marketplace</small></span></div><div><?= $icon('factory') ?><span><strong>Make in India Manufacturing.</strong><small>Indian manufacturing capability in key product categories.</small></span></div></div></div></section>
    <section class="section" aria-labelledby="partnership-benefits-title"><div class="container"><h2 id="partnership-benefits-title">Partnership Benefits</h2><div class="benefits-grid"><?php foreach ($partnershipBenefits as [$symbol, $name, $description]): ?><article class="benefit"><?= $icon($symbol) ?><h3><?= esc($name) ?>:</h3><p><?= esc($description) ?></p></article><?php endforeach; ?></div></div></section>
    <section class="section eligibility" aria-labelledby="eligibility-title"><div class="container eligibility-grid"><div><h2 id="eligibility-title">Who Can Apply?</h2><a class="text-link" href="#enquire">Interested in selling LEADSS products? <?= $icon('arrow') ?></a></div><ul class="eligibility-list"><?php foreach (['Existing home appliance dealers', 'Electronics and hardware retailers', 'Wholesalers and distributors', 'Kitchen and interior businesses', 'Entrepreneurs planning to enter the appliance market'] as $applicant): ?><li><?= $icon('check') ?><?= esc($applicant) ?><?= $icon('arrow') ?></li><?php endforeach; ?></ul></div></section>
    <section class="section section-light process" aria-labelledby="process-title"><div class="container"><h2 id="process-title">How the Partnership Process Works</h2><div class="steps"><?php foreach ([['Submit Your Enquiry', 'Share your contact details, business type and location.'], ['Discuss the Opportunity', 'The LEADSS team reviews your enquiry and discusses your requirements.'], ['Review Commercial Terms', 'Discuss product range, investment, margins and territory availability.'], ['Start Your Partnership', 'Complete the agreed process and plan your business launch with LEADSS.']] as $i => [$title, $description]): ?><article class="step"><span class="step-number">0<?= $i + 1 ?></span><h3><?= esc($title) ?></h3><p><?= esc($description) ?></p></article><?php endforeach; ?></div></div></section>
    <section class="section faq" aria-labelledby="faq-title"><div class="container faq-grid"><div><h2 id="faq-title">Frequently Asked Questions</h2><a class="text-link" href="tel:+919593679111"><?= $icon('phone') ?> Call: 95936 79111</a></div><div class="faq-list"><?php foreach ($faqs as [$question, $answer]): ?><details><summary><?= esc($question) ?><span aria-hidden="true">+</span></summary><p><?= esc($answer) ?></p></details><?php endforeach; ?></div></div></section>
    <section class="closing" aria-labelledby="closing-title"><div class="container closing-inner"><div><h2 id="closing-title">Let’s Grow Together with LEADSS</h2><p>24+ Years of Experience.<br>ISI-Marked Products.<br>GeM Registered.<br>Make in India Manufacturing.</p></div><div class="closing-action"><p>Interested in selling LEADSS products?</p><a class="button" href="#enquire">Enquire today <?= $icon('arrow') ?></a><span>Enquire today to discuss Dealership & Distributorship opportunities in your area. Enquiry -95936 79111</span></div></div></section>
</main>
<footer class="site-footer"><div class="container footer-inner"><div><strong>LEADSS</strong><p>A brand of Leads Overseas Pvt. Ltd. · Established 2002</p></div><a href="tel:+919593679111"><?= $icon('phone') ?> 95936 79111</a><span>© <?= date('Y') ?> LEADSS. All rights reserved.</span></div></footer>
<div class="mobile-actions"><a href="tel:+919593679111"><?= $icon('phone') ?> Call us</a><a href="#enquire">Enquire now <?= $icon('arrow') ?></a></div>
</body>
</html>
