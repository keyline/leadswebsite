<?php
if($row) {
    $position                 = $row->position;
    $qualification            = $row->qualification;
    $experience               = $row->experience;
    $location                 = $row->location;
    $job_role                 = $row->job_role;
    $ctc                      = $row->ctc;
    $expiry_date              = $row->expiry_date;
} else {
    $position                 = set_value('position', '');
    $qualification            = set_value('qualification', '');
    $experience               = set_value('experience', '');
    $location                 = set_value('location', '');
    $job_role                 = set_value('job_role', '');
    $ctc                      = set_value('ctc', '');
    $expiry_date              = set_value('expiry_date', '');
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
                    <?php if($session->getFlashdata('success_message')) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?php echo $session->getFlashdata('success_message');?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <?php } ?>
                    <?php if($session->getFlashdata('error_message')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo $session->getFlashdata('error_message');?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <form id="validation-form123" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">Position</label>
                                    <input type="text" class="form-control" name="position" id="position" placeholder="Position" value="<?php echo $position; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address">Qualification</label>
                                    <textarea class="form-control" name="qualification" id="qualification" placeholder="Qualification" required="required"><?php echo $qualification; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="subject">Experience</label>
                                    <textarea class="form-control" name="experience" id="experience" placeholder="Experience" required="required"><?php echo $experience; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="msg">Location</label>
                                    <input type="text" class="form-control" name="location" id="location" placeholder="Location" required="required" value="<?php echo $location; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="msg">Job Role</label>
                                    <textarea  class="form-control ckeditor" name="job_role" id="job_role" placeholder="Job Role" required="required"><?php echo $job_role; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="msg">CTC</label>
                                    <input type="text" class="form-control" name="ctc" id="ctc" placeholder="CTC" required="required" value="<?php echo $ctc; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="msg">Expiry Date</label>
                                    <input type="date" class="form-control" name="expiry_date" id="expiry_date" placeholder="Expiry Date" required="required" value="<?php echo $expiry_date; ?>">
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