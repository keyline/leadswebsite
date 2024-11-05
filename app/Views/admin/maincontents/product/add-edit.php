<?php
if($row) {
    $company_name                      = $row->company_name;  
    $product_title                     = $row->product_title;  
    $product_description               = $row->product_description;
    $product_icon                      = $row->product_icon;
    $product_image                     = $row->product_image;
} else {
    $company_name                      = set_value('company_name', '');
    $product_title                     = set_value('product_title', '');
    $product_description               = set_value('product_description', '');
    $product_icon                      = set_value('product_icon', '');
    $product_image                     = set_value('product_image', '');
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
                                    <label class="form-label" for="partner_type">Company Name</label>
                                    <select class="js-example-basic-single form-control" id="partner_type" name="company_name">
                                        <option value="" selected="selected">Select Company Name</option>
                                         <?php                                          
                                         if($companies){ $i=1; foreach ($companies as $row) {?>
                                        <option value="<?=$row->id; ?>"<?php if($company_name==$row->id) { ?> selected="selected"<?php } ?>><?=$row->name;?></option>
                                        <?php }} ?>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="product_title">Product Title</label>
                                    <input type="text" class="form-control" name="product_title" id="product_title" placeholder="Product Title" value="<?php echo $product_title; ?>" required="required">
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="product_description">Product Description</label>
                                    <textarea class="form-control ckeditor" name="product_description" id="product_description" placeholder="Product Description" col="5" required="required"><?php echo $product_description; ?></textarea>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="product_icon">Product Icon</label>
                                    <div class="input-group mb-2">
                                      <?php if($product_icon!='') { ?>
                                      <img src="<?php echo base_url();?>/uploads/product/<?php echo $product_icon; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                      <?php } ?>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Product Icon</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="product_icon" name="product_icon" <?php if($action == 'Add'){?>required<?php }?>>
                                            <label class="custom-file-label" for="product_icon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="services_image">Product Image</label>                                    
                                    <div class="row">
                                        <?php if($product_image!='') { ?>
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url();?>/uploads/product/<?php echo $product_image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                        </div>
                                        <?php } ?>                                        
                                    </div>
                                    

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Product Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="product_image" name="product_image" <?php if($action == 'Add'){?>required<?php }?>>
                                            <label class="custom-file-label" for="product_image">Choose file</label>
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