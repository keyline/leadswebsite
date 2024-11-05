<?php
if ($row) {
    $name                       = $row->name;
    $place_name                 = $row->place_name;
    $comments                   = $row->comments;
    $image                      = $row->image;
    $designation                = $row->designation;
    $type                       = $row->type;
    $videoUrl                   = !is_null($row->video_url) ? 'https://www.youtube.com/watch?v=' . $row->video_url : '';
} else {
    $name                       = set_value('name', '');
    $place_name                 = set_value('place_name', '');
    $comments                   = set_value('comments', '');
    $image                      = set_value('image', '');
    $designation                = set_value('designation', '');
    $type                       = set_value('type', '');
    $videoUrl                   = set_value('video_url', '');
}
?>
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="blog_category">Type <span class="text-danger">*</span> </label>
                                    <select class="js-example-basic-single form-control" id="type" name="type" required="required">
                                        <option value="" selected="selected">Select</option>
                                        <option value="1" <?= $type == 1 ? 'selected="selected"' : '' ?>>Text</option>
                                        <option value="2" <?= $type == 2 ? 'selected="selected"' : '' ?>>Video</option>
                                    </select>
                                    <?php if (session('errors.type')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.type')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="<?php echo $name; ?>" required="required">
                                    <?php if (session('errors.name')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.name')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="place_name">Place Name</label>
                                    <input type="text" class="form-control" name="place" id="place_name" placeholder="Enter place Name" value="<?php echo $place_name; ?>" required="required">
                                    <?php if (session('errors.place')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.place')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="designation"> Designation </label>
                                    <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter designation Name" value="<?php echo $designation; ?>" required="required">
                                    <?php if (session('errors.designation')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.designation')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- content -->

                            <div class="col-md-12" id="testimonial_content">



                            </div>
                            <?php if (session('errors.designation')): ?>
                                <div class="error text-danger"><?= esc(session('errors.designation')) ?></div>
                            <?php endif; ?>

                            <!-- content -->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="image">Image </label>
                                    <div class="input-group mb-2">
                                        <?php if ($image != '') { ?>
                                            <img src="<?php echo base_url(); ?>/uploads/testimonials/<?php echo $image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;" />
                                        <?php } ?>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Image <small>(140 x 140)</small></span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                    </div>
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
                                <input type="text" class="form-control" name="url" id="url" placeholder="Enter youtube video url" value="<?php echo $videoUrl; ?>" required="required">
                               </div>`;
            } else {
                contentHtml = `<div class="form-group">
                                <label class="form-label" for="comments">Comments</label>
                                <textarea class="form-control" name="comments" id="comments" placeholder="Comments" required="required" rows="10"><?php echo $comments; ?></textarea>
                               </div>`;
            }
            $("#testimonial_content").html(contentHtml);
        }

        // Initial load based on the current type
        let currentType = $('#type').val();
        updateContentHtml(currentType);

        // Update content on type change
        $('#type').on('change', function() {
            updateContentHtml($(this).val());
        });


    })
</script>
<?= $this->endSection() ?>