<!-- <section class="home_testimonial_section">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-10">
                <div class="about_info" data-aos="fade-up" data-aos-duration="500">
                    <div class="row justify-content-end">
                        <div class="col-md-11">
                            <div class="swiper testimonialSwiper">
                                <div class="swiper-wrapper">
                                    <?php if (count($testimonials)) {
                                        foreach ($testimonials as $tesMoRow) {
                                            if ($tesMoRow->type == 1) { ?>
                                                <div class="swiper-slide">
                                                    <div class="testiminial-info ps-4">
                                                        <img src="<?= base_url('uploads/') ?>/testimonials/<?= $tesMoRow->image ?>" alt="" class="img-fluid testimonial-img">
                                                        <p><?= $tesMoRow->comments ?></p>
                                                        <h5><?= $tesMoRow->name ?></h5>
                                                        <p><?= $tesMoRow->designation ?>, <?= $tesMoRow->place_name ?>.</p>
                                                    </div>
                                                </div>
                                            <?php } elseif ($tesMoRow->type == 2) { ?>
                                                <div class="swiper-slide">
                                                    <div class="testiminial-info ps-4">
                                                        <img src="<?= base_url('uploads/') ?>/testimonials/<?= $tesMoRow->image ?>" alt="" class="img-fluid testimonial-img">
                                                        <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?= $tesMoRow->video_url ?>?si=xyqH8VeqKopfdb3e" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                        <h5><?= $tesMoRow->name ?></h5>
                                                        <p><?= $tesMoRow->designation ?>, <?= $tesMoRow->place_name ?>.</p>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                    <?php }
                                    } ?>

                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                    <div class="about_more_box">
                        <a href="#">
                            <h4>Testimonials</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- NEW HTML -->


<!-- <section class="home_testimonial_section">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-10">
                <div class="about_info" data-aos="fade-up" data-aos-duration="500">
                    <div class="row justify-content-end">
                        <div class="col-md-11">
                            <div class="owl-carousel owl-theme owl-videotestmorial">
                                <div class="item">
                                    <div class="testiminial-info ps-4">
                                        <img src="<?= base_url('public/') ?>/assets/img/testimonial1.webp" alt="" class="img-fluid testimonial-img">
                                        <p>We feel completely reliable and safe working with the company,<br>
                                            since it gives us assurance of long term relation with its dealers and distributors.</p>
                                        <h5>Mithun Ghosh</h5>
                                        <p>Distributor, Guwahati, Assam.</p>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="testiminial-info ps-4">
                                        <img src="<?= base_url('public/') ?>/assets/img/testimonial1.webp" alt="" class="img-fluid testimonial-img">
                                        <p>We feel completely reliable and safe working with the company,<br>
                                            since it gives us assurance of long term relation with its dealers and distributors.</p>
                                        <h5>Mithun Ghosh</h5>
                                        <p>Distributor, Guwahati, Assam.</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="flex-video">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/Vw7FQ4FaRKc?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen sandbox="allow-same-origin allow-scripts allow-presentation"></iframe>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="about_more_box">
                        <a href="#">
                            <h4>Testimonials</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->



<section class="home_testimonial_section">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-10">
                <div class="about_info" data-aos="fade-up" data-aos-duration="500">
                    <div class="row justify-content-end">
                        <div class="col-md-11">
                            <div class="owl-carousel owl-theme owl-videotestmorial">
                                <!-- <div class="item">
                                    <div class="testiminial-info ps-4">
                                        <img src="<?= base_url('public/') ?>/assets/img/testimonial1.webp" alt="" class="img-fluid testimonial-img">
                                        <p>We feel completely reliable and safe working with the company,<br>
                                            since it gives us assurance of long term relation with its dealers and distributors.</p>
                                        <h5>Mithun Ghosh</h5>
                                        <p>Distributor, Guwahati, Assam.</p>
                                    </div>
                                </div> -->


                                <?php if (count($testimonials)) {
                                    foreach ($testimonials as $tesMoRow) {
                                        if ($tesMoRow->type == 1) { ?>

                                            <div class="item">
                                                <div class="testiminial-info ps-4">
                                                    <img src="<?= base_url('uploads/') ?>/testimonials/<?= $tesMoRow->image ?>" alt="" class="img-fluid testimonial-img">
                                                    <p><?= $tesMoRow->comments ?></p>
                                                    <h5><?= $tesMoRow->name ?></h5>
                                                    <p><?= $tesMoRow->designation ?>, <?= $tesMoRow->place_name ?>.</p>
                                                </div>
                                            </div>

                                        <?php } elseif ($tesMoRow->type == 2) { ?>
                                            <!-- <div class="swiper-slide">
                                                <div class="testiminial-info ps-4">
                                                    <img src="<?= base_url('uploads/') ?>/testimonials/<?= $tesMoRow->image ?>" alt="" class="img-fluid testimonial-img">
                                                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?= $tesMoRow->video_url ?>?si=xyqH8VeqKopfdb3e" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                    <h5><?= $tesMoRow->name ?></h5>
                                                    <p><?= $tesMoRow->designation ?>, <?= $tesMoRow->place_name ?>.</p>
                                                </div>
                                            </div> -->


                                            <div class="item">
                                                <img src="<?= base_url('uploads/') ?>/testimonials/<?= $tesMoRow->image ?>" alt="" class="img-fluid testimonial-img">
                                                <div class="flex-video">
                                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $tesMoRow->video_url ?>?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen sandbox="allow-same-origin allow-scripts allow-presentation"></iframe>
                                                </div>
                                                <h5><?= $tesMoRow->name ?></h5>
                                                <p><?= $tesMoRow->designation ?>, <?= $tesMoRow->place_name ?>.</p>
                                            </div>



                                        <?php } ?>

                                <?php }
                                } ?>

                            </div>
                        </div>
                    </div>
                    <div class="about_more_box">
                        <a href="#">
                            <h4>Testimonials</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?= $this->section('scripts') ?>


<script>
    $(".owl-videotestmorial").owlCarousel({
        loop: true,
        items: 1,
        margin: 0,
        nav: false,
        dots: true,
        autoHeight: true,
        onTranslate: function(event) {
            var currentSlide, player, command;

            currentSlide = $(".owl-item.active");

            player = currentSlide.find(".flex-video iframe").get(0);

            command = {
                event: "command",
                func: "pauseVideo",
            };

            if (player != undefined) {
                player.contentWindow.postMessage(JSON.stringify(command), "*");
            }
        },
    });
</script>

<?= $this->endSection() ?>