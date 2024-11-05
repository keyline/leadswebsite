<?php
$uriString =  $_SERVER["REQUEST_URI"];
$uriArr = explode('/', $uriString);
?>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<?php
foreach ($metadetails as $key => $meta) :
    if ($uriArr[1] == $meta->url) { ?>
        <title><?= $meta->title; ?></title>
        <meta name="description" content="<?= $meta->description; ?>">
        <meta name="keywords" content="<?= $meta->keyword; ?>">
        <meta property="og:type" content="website">
        <meta property="og:image" content="<?= base_url('uploads/' . $site_setting->site_logo) ?>">
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
        <meta property="og:title" content="<?= $meta->title; ?>">
        <meta property="og:description" content="<?= $meta->description; ?>">
        <meta property="og:url" content="<?= base_url($meta->url) ?>">
<?php }
endforeach;
?>
<!-- Favicon icon -->
<link rel="icon" href="<?php echo base_url(); ?>/uploads/<?php echo $site_setting->site_favicon; ?>" type="image/x-icon">
<!-- Bootstrap CSS -->
<!-- assets/bootstrap/css/bootstrap.min.css -->
<link rel="stylesheet" href="<?= base_url('public/assets/bootstrap/css/') ?>/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/') ?>/menumaker.css">


<!------------GOOGLE FONT------------>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

<!------------ZMDI ICON------------>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!------------OWL------------>
<link rel="stylesheet" href="<?= base_url('public/assets/') ?>/owl/owl3.css">
<link rel="stylesheet" href="<?= base_url('public/assets/') ?>/css/animate.min.css" />
<link href="https://trendytheme.net/demo/69multi/69/assets/css/animate.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css"> -->
<link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/') ?>/easy-responsive-tabs.css " />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/') ?>/style.css">
<link rel="stylesheet" href="<?= base_url('public/assets/css/') ?>/custom.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/css/') ?>/responsive.css">

<!-- <link rel="canonical" href="https://victoriatravels.com<?php echo ($_SERVER['REQUEST_URI']); ?>"> -->

<!-- Google Tag Manager -->
<script async>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-TSJSNPT3');
</script>
<!-- End Google Tag Manager -->