<?php
if($row) {
    $page_banner            = $row->page_banner;
    $title                  = $row->title;
    $description1           = $row->description1;
    $description2           = $row->description2;
    $food_environment       = $row->food_environment;
    $central_laboratory     = $row->central_laboratory;
} else {
    $page_banner            = set_value('page_banner', '');
    $title                  = set_value('title', '');
    $description1           = set_value('description', '');
    $description2           = set_value('description2', '');
    $food_environment       = set_value('env_lab', '');
    $central_laboratory     = set_value('central_lab', '');
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="title">Page Title</label>
                                    <textarea class="form-control" name="title" id="title" placeholder="Title" required="required"><?php echo $title; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="description">Page Description 1</label>
                                    <textarea class="form-control ckeditor" name="description" id="description"  required="required"><?php echo $description1; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="description">Central Laboratory</label>
                                    <textarea class="form-control ckeditor" name="central_lab" id="central_lab" required="required"><?php echo $central_laboratory; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="title2">MSK Food and Environment Laboratory</label>
                                    <textarea class="form-control ckeditor" name="env_lab" id="env_lab" required="required" ><?php echo $food_environment; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="description">Page Description 2</label>
                                    <textarea class="form-control ckeditor" name="description2" id="description2" required="required"><?php echo $description2; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="page_banner">Page Banner Image</label>
                                    <div class="input-group mb-2">
                                      <?php if($page_banner!='') { ?>
                                      <img src="<?php echo base_url();?>/uploads/laboratory/<?php echo $page_banner; ?>" class="img-responsive img-thumbnail" style="height:100px; width:200px;"  />
                                      <?php } ?>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Page Banner Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="page_banner" name="page_banner">
                                            <label class="custom-file-label" for="page_banner">Choose file</label>
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