<?= $this->section('style') ?>
<style>
    svg {
        width: 70px;
        height: 70px;
        margin: 20px;
        display: inline-block;
    }
</style>
<?= $this->endSection() ?>



<!-- inner page banner start -->

<section class="inner_banner inner_floting_box_banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="inner_floting_box">
                    <div class="about_more_box">
                        <div class="mission_tabs">
                            <h4>Blog</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- inner page banner end -->
<!-- mission section start -->
<section class="contact_section">
    <div class="container">
        <div class="row justify-content-center" id="view_content">

            <?php if (count($recentBlog)):
                foreach ($recentBlog as $blog):
            ?>
                    <div class="col-md-4">
                        <div class="blog_list_item">
                            <a href="<?= base_url('blog-details/' . $blog->slug); ?>">
                                <div class="blogitem_img">
                                    <img src="<?= base_url('uploads/') ?>/blogs/<?= $blog->image ?>" alt="Professional Career Counseling: Advancing in Your Career" style="height: 300px;">
                                </div>
                                <div class="blogitem_detials">
                                    <ul class="blogitem_cat">
                                        <li><?= $blog->category_name ?></li>
                                    </ul>
                                    <p class="u-text-p8 u-mb-sm u-mt-md u-text-gray-700">
                                        <span class="ps-2"><?= (new DateTime($blog->created_at))->format('M j, Y') ?></span> | <span class="ps-2"><?= $blog->post_by ?></span> | <span class="pe-2"><?= (new DateTime($blog->created_at))->format('h.m A') ?></span>
                                    </p>
                                    <h3><?= $blog->title ?></h3>
                                    <p class="shortdes"><?= truncateText($blog->description); ?></p>
                                    <a href="<?php echo base_url('blog-details/' . $blog->slug); ?>">Read More</a>
                                </div>
                            </a>
                        </div>
                    </div>
            <?php endforeach;
            endif; ?>

            <!-- <div class="col-md-4">
                <div class="blog_list_item">
                    <a href="#">
                        <div class="blogitem_img">
                            <img src="<?= base_url('public/') ?>/assets/img/blog_img.jpg" alt="Professional Career Counseling: Advancing in Your Career" style="height: 300px;">
                        </div>
                        <div class="blogitem_detials">
                            <ul class="blogitem_cat">
                                <li>Career Counselling</li>
                            </ul>
                            <p class="u-text-p8 u-mb-sm u-mt-md u-text-gray-700">
                                <span class="ps-2">Oct 21, 2024</span> | <span class="ps-2">Admin</span> | <span class="pe-2">05:05 PM</span>
                            </p>
                            <h3>Professional Career Counseling: Advancing in Your Career</h3>
                            <p class="shortdes">Professional career counseling plays a crucial role in advancing careers by offering guidance in skill development, decision-making, and personal growth...</p>
                            <a href="#">Read More</a>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog_list_item">
                    <a href="#">
                        <div class="blogitem_img">
                            <img src="<?= base_url('public/') ?>/assets/img/blog_img.jpg" alt="Professional Career Counseling: Advancing in Your Career" style="height: 300px;">
                        </div>
                        <div class="blogitem_detials">
                            <ul class="blogitem_cat">
                                <li>Career Counselling</li>
                            </ul>
                            <p class="u-text-p8 u-mb-sm u-mt-md u-text-gray-700">
                                <span class="ps-2">Oct 21, 2024</span> | <span class="ps-2">Admin</span> | <span class="pe-2">05:05 PM</span>
                            </p>
                            <h3>Professional Career Counseling: Advancing in Your Career</h3>
                            <p class="shortdes">Professional career counseling plays a crucial role in advancing careers by offering guidance in skill development, decision-making, and personal growth...</p>
                            <a href="#">Read More</a>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog_list_item">
                    <a href="#">
                        <div class="blogitem_img">
                            <img src="<?= base_url('public/') ?>/assets/img/blog_img.jpg" alt="Professional Career Counseling: Advancing in Your Career" style="height: 300px;">
                        </div>
                        <div class="blogitem_detials">
                            <ul class="blogitem_cat">
                                <li>Career Counselling</li>
                            </ul>
                            <p class="u-text-p8 u-mb-sm u-mt-md u-text-gray-700">
                                <span class="ps-2">Oct 21, 2024</span> | <span class="ps-2">Admin</span> | <span class="pe-2">05:05 PM</span>
                            </p>
                            <h3>Professional Career Counseling: Advancing in Your Career</h3>
                            <p class="shortdes">Professional career counseling plays a crucial role in advancing careers by offering guidance in skill development, decision-making, and personal growth...</p>
                            <a href="#">Read More</a>
                        </div>
                    </a>
                </div>
            </div> -->
        </div>
        <button id="load_more_btn" style="float: right;background-color:#ed1c24;border: tomato;" class="btn btn-primary">Load More</button>
        <div id="loading" style="display: none;text-align: center;">

            <svg version="1.1" id="L5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <circle fill="#ed1c24" stroke="none" cx="6" cy="50" r="6">
                    <animateTransform
                        attributeName="transform"
                        dur="1s"
                        type="translate"
                        values="0 15 ; 0 -15; 0 15"
                        repeatCount="indefinite"
                        begin="0.1" />
                </circle>
                <circle fill="#ed1c24" stroke="none" cx="30" cy="50" r="6">
                    <animateTransform
                        attributeName="transform"
                        dur="1s"
                        type="translate"
                        values="0 10 ; 0 -10; 0 10"
                        repeatCount="indefinite"
                        begin="0.2" />
                </circle>
                <circle fill="#ed1c24" stroke="none" cx="54" cy="50" r="6">
                    <animateTransform
                        attributeName="transform"
                        dur="1s"
                        type="translate"
                        values="0 5 ; 0 -5; 0 5"
                        repeatCount="indefinite"
                        begin="0.3" />
                </circle>
            </svg>

            <!-- <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#ed1c24" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform
                        attributeName="transform"
                        attributeType="XML"
                        type="rotate"
                        dur="1s"
                        from="0 50 50"
                        to="360 50 50"
                        repeatCount="indefinite" />
                </path>
            </svg> -->

        </div>

    </div>
</section>
<!-- mission section end -->

<!-- feature icon section start -->
<?= $feature ?>
<!-- feature icon section end -->

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        // _________________________ load more _________________________
        let page = 1;
        let loading = false;

        function loadMoreContent() {
            if (!loading) {
                loading = true; // Set loading to true
                $('#loading').show(); // Show loading indicator

                page++; // Increment the page number
                $.ajax({
                    url: 'api/load-blogs', // URL to load more content
                    type: 'GET', // HTTP method
                    data: {
                        page: page
                    }, // Pass the page number to the server
                    success: function(response) {

                        if (response.status) {
                            $('#view_content').append(response.html); // Append new content
                        } else {
                            $('#load_more_btn').hide(); // Hide the button if no more content
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error loading blogs:', textStatus, errorThrown);
                    },
                    complete: function() {
                        loading = false; // Reset loading flag
                        $('#loading').hide(); // Hide loading indicator
                    }
                });
            }
        }

        $('#load_more_btn').on('click', loadMoreContent);







        var a = new StickySidebar('#sticky-sidebar-demo', {
            topSpacing: 25,
            containerSelector: '.blogdetails_item',
            innerWrapperSelector: '.sidebar__inner'
        });

        var a = new StickySidebar('#sticky-sidebar-cateogy', {
            topSpacing: 25,
            containerSelector: '.blogdetails_item',
            innerWrapperSelector: '.sidebar__inner'
        });


        $("#blogdetails-recent").owlCarousel({
            loop: true,
            margin: 20,
            dots: false,
            nav: false,
            autoplay: false,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            navText: ["<i class='zmdi zmdi-arrow-left'></i>", "<i class='zmdi zmdi-arrow-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                750: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1200: {
                    items: 4,
                }
            }
        });

    });
</script>
<?= $this->endSection() ?>