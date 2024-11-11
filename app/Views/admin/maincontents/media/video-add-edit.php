<?php
if ($row) {
    $client_logo           = $row->file;
    $caption               = $row->caption;
    $category              = $row->category_id;
} else {
    $caption               = set_value('caption', '');
    $client_logo           = set_value('client_logo', '');
}
?>


<?= $this->section('style') ?>
<style>
    /* .raw_upload {} */
</style>
<?= $this->endSection() ?>




<div class="pcoded-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10"><?php echo $page_header; ?></h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/user"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>">Manage <?php echo $moduleDetail['module']; ?></a></li>
                        <li class="breadcrumb-item"><a href="#!"><?php echo $page_header; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo $page_header; ?></h5>
                    <?php if ($session->getFlashdata('success_message')) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> <?php echo $session->getFlashdata('success_message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php } ?>
                    <?php if ($session->getFlashdata('error_message')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo $session->getFlashdata('error_message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <form id="validation-form123" action="" method="post" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="videoUpload" name="uploadedVideo">
                                        <label class="custom-control-label" for="videoUpload">Do you want to upload a video file ?</label>
                                    </div>
                                </div>
                            </div>
                            <!-- @@@@@@@@@@@@ -->
                            <!-- <div class="col-md-6 raw_upload d-none">
                                <div class="form-group">
                                    <label class="form-label" for="partner_name">caption</label>
                                    <input type="text" class="form-control" name="caption" id="partner_name" placeholder="" value="<?php echo $caption; ?>" maxlength="255">
                                </div>
                            </div>
                            <div class="col-md-12 raw_upload d-none">
                                <div class="form-group">
                                    <label class="form-label" for="partner_logo">Media file</label>
                                    <div class="input-group mb-2">
                                        <?php if ($client_logo != '') { ?>
                                            <img src="<?php echo base_url(); ?>/uploads/media/<?php echo $client_logo; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;" />
                                        <?php } ?>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">file</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="client_logo" name="client_logo" accept="">
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- @@@@@@@@@@ -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="url">Video Url </label>
                                    <input type="text" class="form-control" name="url" id="url" placeholder="Enter youtube video url" value="" required="required">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn  btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->section('scripts') ?>

<script>
    $(document).ready(function() {

        function updateContentHtml(type) {
            let contentHtml;
            if (type == 2) {
                contentHtml = `<div class="form-group">
                        <label class="form-label" for="url">Video Url </label>
                        <input type="text" class="form-control" name="url" id="url" placeholder="Enter youtube video url" value="" required="required">
                       </div>`;
            } else {
                contentHtml = `<div class="form-group">
                        <label class="form-label" for="comments">Comments</label>
                        <textarea class="form-control" name="comments" id="comments" placeholder="Comments" required="required" rows="10"></textarea>
                       </div>`;
            }
            $("#testimonial_content").html(contentHtml);
        }

        // Initial load based on the current type
        let currentType = $('#type').val();
        updateContentHtml(currentType);

        // Update content on type change
        $('#videoUpload').on('change', function() {
            updateContentHtml($(this).val());
        });


    })
</script>


<?= $this->endSection() ?>