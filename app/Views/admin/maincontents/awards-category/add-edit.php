<?php
if($row) {
    $category_name                      = $row->category_name;   
    $category_icon                      = $row->category_icon;
    $category_images                    = $row->category_images;
} else {
    $category_name                      = set_value('category_name', '');
    $category_icon                      = set_value('category_icon', '');
    $category_images                    = set_value('category_images', '');
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
                                    <label class="form-label" for="category_name">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" value="<?php echo $category_name; ?>" required="required">
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="category_icon">Category Icon</label>
                                    <div class="input-group mb-2">
                                      <?php if($category_icon!='') { ?>
                                      <img src="<?php echo base_url();?>/uploads/awards_category/<?php echo $category_icon; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                      <?php } ?>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Category Icon</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="category_icon" name="category_icon" <?php if($action == 'Add'){?>required<?php }?>>
                                            <label class="custom-file-label" for="category_icon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="category_icon">Category Images</label>                                    
                                    <div class="row">
                                        <?php if($category_icon!='') { ?>
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url();?>/uploads/awards_category/<?php echo $category_images; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                        </div>
                                        <?php } ?>                                        
                                    </div>
                                    

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Category Images</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="category_images" name="category_images" <?php if($action == 'Add'){?>required<?php }?>>
                                            <label class="custom-file-label" for="category_images">Choose file</label>
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