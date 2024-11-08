<?php
if($row) {
    $product_category                      = $row->product_category;  
    $key_feature_title                     = $row->key_feature_title;    
    $key_feature_icon                      = $row->key_feature_icon;
    $key_feature_description               = $row->key_feature_description;
} else {
    $product_category                      = set_value('product_category', '');
    $key_feature_title                     = set_value('key_feature_title', '');    
    $key_feature_icon                      = set_value('key_feature_icon', '');
    $key_feature_description               = set_value('key_feature_description', '');
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
                                    <label class="form-label" for="product_category">Product category</label>
                                    <select class="js-example-basic-single form-control" id="product_category" name="product_category">
                                        <option value="" selected="selected">Select Product Category</option>
                                         <?php                                          
                                         if($productCats){ $i=1; foreach ($productCats as $row) {?>
                                        <option value="<?=$row->id; ?>"<?php if($product_category==$row->id) { ?> selected="selected"<?php } ?>><?=$row->name;?></option>
                                        <?php }} ?>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="key_feature_title">Key Feature Title</label>
                                    <input type="text" class="form-control" name="key_feature_title" id="key_feature_title" placeholder="Key Feature Title" value="<?php echo $key_feature_title; ?>" required="required">
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="key_feature_description">Key Feature Description</label>
                                    <textarea class="form-control" id="key_feature_description" name="key_feature_description" rows="4" cols="50"><?=$key_feature_description?></textarea>                                    
                                </div>                                                                   
                            </div>                                                                             
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="services_image">Key Feature Icon</label>                                    
                                    <div class="row">
                                        <?php if($key_feature_icon!='') { ?>
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url();?>/uploads/key_feature/<?php echo $key_feature_icon; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                        </div>
                                        <?php } ?>                                        
                                    </div>
                                    

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Key Feature Icon</span>
                                        </div>
                                        <div class="custom-file">
                                        <!-- <input type="file" name="image" class="form-control" id="profile_image"> -->
                                            <input type="file" class="form-control" id="key_feature_icon" name="key_feature_icon" <?php if($action == 'Add'){?>required<?php }?>>
                                            <!-- <label class="custom-file-label" for="key_feature_icon">Choose file</label> -->
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