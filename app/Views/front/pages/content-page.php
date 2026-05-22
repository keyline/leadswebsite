<?= $this->section('style') ?>
<style>

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
            <?= $content->description ?>
        </div>
        <br>

    </div>
</section>
<!-- mission section end -->


<!-- our clients start -->
<?php // $clientbox 
?>
<!--our clients  end -->

<!-- feature icon section start -->
<?= $feature ?>
<!-- feature icon section end -->


<!-- home enquiry start -->
<?php // $enquiry 
?>
<!-- home enquiry end -->

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {

    });
</script>
<?= $this->endSection() ?>