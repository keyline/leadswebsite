<section class="home_testimonial_section">
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
                                                        <img src="<?= base_url('uploads/') ?>/testimonials/<?=$tesMoRow->image?>" alt="" class="img-fluid testimonial-img">
                                                        <p><?= $tesMoRow->comments ?></p>
                                                        <h5><?= $tesMoRow->name ?></h5>
                                                        <p><?= $tesMoRow->designation ?>, <?= $tesMoRow->place_name ?>.</p>
                                                    </div>
                                                </div>
                                            <?php } elseif ($tesMoRow->type == 2) { ?>
                                                <div class="swiper-slide">
                                                    <div class="testiminial-info ps-4">
                                                        <img src="<?= base_url('uploads/') ?>/testimonials/<?=$tesMoRow->image?>" alt="" class="img-fluid testimonial-img">
                                                        <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?=$tesMoRow->video_url?>?si=xyqH8VeqKopfdb3e" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                        <h5><?= $tesMoRow->name ?></h5>
                                                        <p><?= $tesMoRow->designation ?>, <?= $tesMoRow->place_name ?>.</p>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                    <?php }
                                    } ?>


                                    <!-- <div class="swiper-slide">
                                        <div class="testiminial-info ps-4">
                                            <img src="<?= base_url('public/') ?>/assets/img/testimonial1.webp" alt="" class="img-fluid testimonial-img">
                                            <p>We feel completely reliable and safe working with the company,<br>
                                                since it gives us assurance of long term relation with its dealers and distributors.</p>
                                            <h5>Mithun Ghosh</h5>
                                            <p>Distributor, Guwahati, Assam.</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testiminial-info ps-4">
                                            <img src="<?= base_url('public/') ?>/assets/img/testimonial1.webp" alt="" class="img-fluid testimonial-img">
                                            <p>We feel completely reliable and safe working with the company,<br>
                                                since it gives us assurance of long term relation with its dealers and distributors.</p>
                                            <h5>Mithun Ghosh</h5>
                                            <p>Distributor, Guwahati, Assam.</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testiminial-info ps-4">
                                            <img src="<?= base_url('public/') ?>/assets/img/testimonial1.webp" alt="" class="img-fluid testimonial-img">
                                            <p>We feel completely reliable and safe working with the company,<br>
                                                since it gives us assurance of long term relation with its dealers and distributors.</p>
                                            <h5>Mithun Ghosh</h5>
                                            <p>Distributor, Guwahati, Assam.</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testiminial-info ps-4">
                                            <img src="<?= base_url('public/') ?>/assets/img/testimonial1.webp" alt="" class="img-fluid testimonial-img">
                                            <iframe width="100%" height="300" src="https://www.youtube.com/embed/Vw7FQ4FaRKc?si=xyqH8VeqKopfdb3e" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                            <h5>Mithun Ghosh</h5>
                                            <p>Distributor, Guwahati, Assam.</p>
                                        </div>
                                    </div> -->
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
</section>