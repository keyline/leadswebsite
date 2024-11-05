<section class="home_blog_section">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="about_info" data-aos="zoom-in-up" data-aos-duration="1000" data-aos-anchor-placement="top-center">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="swiper blogswiper">

                                <div class="swiper-wrapper">
                                    <?php foreach ($blogs as $blog):  ?>
                                        <div class="swiper-slide">
                                            <div class="home-blog-info">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <img src="<?= base_url('uploads/') ?>/blogs/<?= $blog->image ?>" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                                <h4> <?= $blog->title ?> <a href="<?php echo base_url('blog-details/' . $blog->slug); ?>" class="blog-read-more">Read More</a></h4>
                                                <ul class="admin-info-list">
                                                    <li>By <a href="" onclick="event.preventDefault();"> <?= $blog->post_by ?> </a></li>
                                                    <li> <?= (new DateTime($blog->created_at))->format('F jS, Y') ?> </li>
                                                    <li><a href="" onclick="event.preventDefault();"><?= $blog->category_name ?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endforeach;  ?>
                                    <!-- 
                                    <div class="home-blog-info">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <img src="<?= base_url('uploads/') ?>/blogs/<?= $blog->image ?>" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                                <h4>What Are auto clean chimneys - benefits & <br class="d-none d-lg-block"> drawbacks? <a href="#" class="blog-read-more">Read More</a></h4>
                                                <ul class="admin-info-list">
                                                    <li>By <a href="#">leadsadmin</a></li>
                                                    <li> April 8th, 2021</li>
                                                    <li><a href="#">Kitchen Chimney</a></li>
                                                </ul>
                                            </div>
                                    <div class="swiper-slide">
                                            <div class="home-blog-info">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <img src="<?= base_url('public/') ?>/assets/img/blog-img.webp" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                                <h4>What Are auto clean chimneys - benefits & <br class="d-none d-lg-block"> drawbacks? <a href="#" class="blog-read-more">Read More</a></h4>
                                                <ul class="admin-info-list">
                                                    <li>By <a href="#">leadsadmin</a></li>
                                                    <li> April 8th, 2021</li>
                                                    <li><a href="#">Kitchen Chimney</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="swiper-slide">
                                            <div class="home-blog-info">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <img src="<?= base_url('public/') ?>/assets/img/blog-img.webp" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                                <h4>What Are auto clean chimneys - benefits & <br class="d-none d-lg-block"> drawbacks? <a href="#" class="blog-read-more">Read More</a></h4>
                                                <ul class="admin-info-list">
                                                    <li>By <a href="#">leadsadmin</a></li>
                                                    <li> April 8th, 2021</li>
                                                    <li><a href="#">Kitchen Chimney</a></li>
                                                </ul>
                                            </div>
                                        </div> -->
                                </div>

                                <div class="navegiation_position">
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about_more_box">
                        <a href="#">
                            <p>LATEST</p>
                            <h4>Blogs</h4>
                        </a>
                    </div>
                    <div class="view_all_box text-end">
                        <a href="<?= base_url('blog') ?>">View all Blogs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>