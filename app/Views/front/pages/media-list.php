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
                            <h4><?= $page_header ?></h4>
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
            <!-- video media-->

            <?php if (count($mediaList)):
                foreach ($mediaList as $media):
                    $isVideo = $media->type == 2;

                    $isYoutube = $isVideo && $media->video_type == 0;

                    if ($isVideo) {
                        // video 
                        if ($isYoutube) {

                            // youtube media 
            ?>
                            <div class="col-md-4">
                                <div class="media_innerbox">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $media->youtube_link ?>?si=XQgxWtkBtl2yaL3e" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                </div>
                            </div>
                        <?php } else {

                            // upload media 
                        ?>
                            <div class="col-md-4">
                                <div class="media_innerbox">
                                    <video class="img-responsive img-thumbnail html_video" width="560" height="315" controls autoplay loop>
                                        <source src="<?php echo base_url('uploads/'); ?>/media/<?= $media->file ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        // image 
                        ?>
                        <div class="col-6 col-md-4">
                            <div class="media_innerbox">
                            <a href="<?= base_url('uploads/') ?>/media/<?= $media->file ?>" class="thumbnail" title="">
                                <img src="<?= base_url('uploads/') ?>/media/<?= $media->file ?>" alt="" class="img-fluid">
                            </a>
                        </div>
                        </div>
                    <?php } ?>

            <?php

                endforeach;
            endif; ?>


        </div>
        <br>
        <!-- <button id="load_more_btn" style="float: right;background-color:#ed1c24;border: tomato;" class="btn btn-primary">Load More</button> -->
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


<!-- our clients start -->
<?= $clientbox ?>
<!--our clients  end -->

<!-- feature icon section start -->
<?= $feature ?>
<!-- feature icon section end -->


<!-- home enquiry start -->
<?= $enquiry ?>
<!-- home enquiry end -->

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {


        $(function() {

            $('.thumbnail').viewbox();
            $('.thumbnail-2').viewbox({
                fullscreenButton: true
            });

            (function() {
                var vb = $('.popup-link').viewbox();
                $('.popup-open-button').click(function() {
                    vb.trigger('viewbox.open');
                });
                $('.close-button').click(function() {
                    vb.trigger('viewbox.close');
                });
            })();

        });
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

    });
</script>
<?= $this->endSection() ?>