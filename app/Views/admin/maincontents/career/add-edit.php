<?php
if($row) {
    $name                       = $row->name;
    $email                   = $row->email;
    $experience                 = $row->experience;
    $msg                        = $row->msg;
    $career_cv                  = $row->career_cv;
} else {
    $name                       = set_value('name', '');
    $email                   = set_value('email', '');
    $experience                 = set_value('experience', '');
    $msg                        = set_value('mg', '');
    $career_cv                  = set_value('career_cv', '');
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
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="location">Email</label>
                                    <input type="email" class="form-control" name="email" id="designation" placeholder="Email" value="<?php echo $email; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="experience">Experience</label>
                                    <input type="text" class="form-control" name="experience" id="company_name" placeholder="Experience" value="<?php echo $experience; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="msg">Message</label>
                                    <textarea class="form-control" name="msg" id="comments" placeholder="Message" required="required" rows="10"><?php echo $msg; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="career_cv">Upload your CV</label>
                                    <div class="input-group mb-2">
                                      <?php if($career_cv!='') { ?>
                                      <!-- <img src="?php echo base_url();?>/uploads/career/?php echo $career_cv; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  /> -->
                                      <a href="<?= base_url();?>/uploads/career/<?php echo $career_cv; ?>" target="blank" class="fas fa-eye" style='color:green'> View pdf</a>
                                      <?php } ?>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> CV </span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="pdf" name="career_cv">
                                            <label class="custom-file-label" for="career_cv">Choose file</label>
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