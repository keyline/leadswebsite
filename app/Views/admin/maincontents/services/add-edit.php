<?php
if($row) {
    $product_title                      = $row->product_title;  
    $services_title                     = $row->services_title;  
    $services_description               = $row->services_description;
    $services_image                     = $row->services_image;
} else {
    $product_title                      = set_value('product_title', '');
    $services_title                     = set_value('services_title', '');
    $services_description               = set_value('services_description', '');
    $services_image                     = set_value('services_image', '');
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
                                    <label class="form-label" for="partner_type">Product Name</label>
                                    <select class="js-example-basic-single form-control" id="partner_type" name="product_title">
                                        <option value="" selected="selected">Select Product Name</option>
                                         <?php
                                         if($product){ $i=1; foreach ($product as $row) {?>
                                        <option value="<?=$row->id; ?>"<?php if($product_title==$row->id) { ?> selected="selected"<?php } ?>><?=$row->product_title;?></option>
                                        <?php  }} ?>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="services_title">Services Title</label>
                                    <input type="text" class="form-control" name="services_title" id="services_title" placeholder="Services Title" value="<?php echo $services_title; ?>" required="required">
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="services_description">Services Description</label>
                                    <textarea class="form-control ckeditor" name="services_description" id="services_description" placeholder="Services Description" required="required"><?php echo $services_description; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="services_image">Services Image</label>                                    
                                    <div class="row">
                                        <?php if($services_image!='') { ?>
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url();?>/uploads/services/<?php echo $services_image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                        </div>
                                        <?php } ?>                                        
                                    </div>
                                    

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Services Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="services_image" name="services_image" <?php if($action == 'Add'){?>required<?php }?>>
                                            <label class="custom-file-label" for="services_image">Choose file</label>
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