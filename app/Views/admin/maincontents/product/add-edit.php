<?php
if($row) {
    $product_category                      = $row->product_category;  
    $product_title                     = $row->product_title;  
    $air_flow               = $row->air_flow;
    $product_icon                      = $row->product_icon;
    $product_image                     = $row->product_image;
} else {
    $product_category                      = set_value('product_category', '');
    $product_title                     = set_value('product_title', '');
    $air_flow               = set_value('air_flow', '');
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
                                    <label class="form-label" for="product_title">Product Title</label>
                                    <input type="text" class="form-control" name="product_title" id="product_title" placeholder="Product Title" value="<?php echo $product_title; ?>" required="required">
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="product_description">Product Specifications</label>                                    
                                        <div class="form-group">
                                            <label class="form-label" for="air_flow">Air Flow</label>
                                            <input type="text" class="form-control" name="air_flow" id="air_flow" placeholder="Product Title" value="<?php echo $air_flow; ?>">
                                        </div>                                   
                                        <div class="form-group">
                                            <label class="form-label" for="air_flow">Generation</label>
                                            <input type="text" class="form-control" name="air_flow" id="air_flow" placeholder="Product Title" value="<?php echo $air_flow; ?>">
                                        </div>                                    
                                        <div class="form-group">
                                            <label class="form-label" for="air_flow">Motor Power</label>
                                            <input type="text" class="form-control" name="air_flow" id="air_flow" placeholder="Product Title" value="<?php echo $air_flow; ?>">
                                        </div>                                    
                                        <div class="form-group">
                                            <label class="form-label" for="air_flow">Speed</label>
                                            <input type="text" class="form-control" name="air_flow" id="air_flow" placeholder="Product Title" value="<?php echo $air_flow; ?>">
                                        </div>                                    
                                        <div class="form-group">
                                            <label class="form-label" for="air_flow">Lamp</label>
                                            <input type="text" class="form-control" name="air_flow" id="air_flow" placeholder="Product Title" value="<?php echo $air_flow; ?>">
                                        </div>                                   
                                        <div class="form-group">
                                            <label class="form-label" for="air_flow">Noise Level</label>
                                            <input type="text" class="form-control" name="air_flow" id="air_flow" placeholder="Product Title" value="<?php echo $air_flow; ?>">
                                        </div>                                         
                                        <div class="form-group">
                                            <label class="form-label" for="air_flow">Cabinet Hood</label>
                                            <input type="text" class="form-control" name="air_flow" id="air_flow" placeholder="Product Title" value="<?php echo $air_flow; ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label class="form-label" for="air_flow">Dimension</label>
                                            <input type="text" class="form-control" name="air_flow" id="air_flow" placeholder="Product Title" value="<?php echo $air_flow; ?>">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_warrenty" class="form-label">is_warrenty</label>
                                    <input type="radio" id="is_warrenty_yes" name="is_warrenty" value="1" <?= set_value('is_warrenty', $is_warrenty ?? '') == 1 ? 'checked' : '' ?>>
                                    <label for="is_warrenty_yes">Yes</label>
                                    <input type="radio" id="is_warrenty_no" name="is_warrenty" value="0" <?= set_value('is_warrenty', $is_warrenty ?? '') == 0 ? 'checked' : '' ?>>
                                    <label for="is_warrenty_no">No</label>
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