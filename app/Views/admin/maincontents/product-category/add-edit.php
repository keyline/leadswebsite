<?php

if ($row) {
    $name                      = $row->name;
    $icon          = $row->icon;
    $banner          = $row->banner;
    $sort          = $row->sort;
} else {
    $name                      = '';
    $icon          = set_value('icon', '');
    $banner          = set_value('banner', '');
    $sort          = set_value('sort', '');
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
                                    <label class="form-label" for="name">Category Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Category Name" value="<?php echo $name; ?>" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="icon">Product Icon <span class="text-danger">*</span></label>
                                    <small class="text-muted d-block mb-2">
                                        Recommended size: <strong>174 × 150 pixels</strong> (SVG, PNG)
                                    </small>
                                    <div class="input-group mb-2">
                                        <?php if ($icon != '') { ?>
                                            <img src="<?php echo base_url(); ?>/uploads/product/<?php echo $icon; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;" />
                                        <?php } ?>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Product Icon</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="icon" name="icon" <?php if ($action == 'Add') { ?>required<?php } ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body py-0">
                            
                                        <label class="form-label fw-bold">
                                            Product Banner Image 
                                            <span class="text-danger">*</span>
                                        </label>
                            
                                        <small class="text-muted d-block mb-2">
                                            Recommended size: <strong>1920 × 488 pixels</strong> (WEBP, JPG)
                                        </small>
                            
                                        <?php if ($banner != '') { ?>
                                            <div class="mb-3 text-center">
                                                <img src="<?php echo base_url(); ?>/uploads/product/<?php echo $banner; ?>" 
                                                     class="img-fluid rounded shadow-sm border" 
                                                     style="max-height:150px;">
                                            </div>
                                        <?php } ?>
                                        
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Product Banner Image</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" 
                                                   class="form-control" 
                                                   id="banner" 
                                                   name="banner"
                                                   accept="image/*"
                                                   <?php if ($action == 'Add') { ?>required<?php } ?>>
                                            </div>
                                        </div>
                            
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="sort">Sort Number</label>
                                    <input type="text" class="form-control" name="sort" id="sort" placeholder="Category sort" value="<?php echo $sort; ?>" required="required">
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