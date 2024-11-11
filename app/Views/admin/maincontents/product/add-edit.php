<?php
if($row) {
    $product_category                  = $row->product_category;  
    $product_title                     = $row->product_title;  
    $air_flow                          = $row->air_flow;
    $generation                        = $row->generation;
    $motor_power                       = $row->motor_power;
    $speed                             = $row->speed;
    $lamp                              = $row->lamp;
    $noise_level                       = $row->noise_level;
    $cabinet_hood                      = $row->cabinet_hood;
    $dimension                         = $row->dimension;
    $warrenty_section                  = json_decode($row->warrenty_section);
    $key_feature_id                    = json_decode($row->key_feature);   
    $product_image                     = $row->product_image;
    $is_new                            = $row->is_new;
    // $others_image                      = $row->image_file;
} else {
    $product_category                  = set_value('product_category', '');
    $product_title                     = set_value('product_title', '');
    $air_flow                          = set_value('air_flow', '');
    $generation                        = set_value('generation', '');
    $motor_power                       = set_value('motor_power', '');
    $speed                             = set_value('speed', '');
    $lamp                              = set_value('lamp', '');
    $cabinet_hood                      = set_value('cabinet_hood', '');
    $noise_level                       = set_value('noise_level', '');
    $dimension                         = set_value('dimension', '');    
    $product_image                     = set_value('product_image', '');
    $others_image = '';
    $key_feature_id = [];
    $warrenty_section = [];
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="product_description">Product Specifications</label>                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="air_flow">Air Flow</label>
                                                <input type="text" class="form-control" name="air_flow" id="air_flow" placeholder="Product Title" value="<?php echo $air_flow; ?>">
                                            </div>                                   
                                        </div>  
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="generation">Generation</label>
                                                <input type="text" class="form-control" name="generation" id="generation" placeholder="Product Title" value="<?php echo $generation; ?>">
                                            </div> 
                                        </div>   
                                    </div>   
                                    <div class="row">  
                                        <div class="col-md-6">                                                             
                                            <div class="form-group">
                                                <label class="form-label" for="motor_power">Motor Power</label>
                                                <input type="text" class="form-control" name="motor_power" id="motor_power" placeholder="Product Title" value="<?php echo $motor_power; ?>">
                                            </div>
                                        </div>     
                                        <div class="col-md-6">                                 
                                            <div class="form-group">
                                                <label class="form-label" for="speed">Speed</label>
                                                <input type="text" class="form-control" name="speed" id="speed" placeholder="Product Title" value="<?php echo $speed; ?>">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">                                   
                                            <div class="form-group">
                                                <label class="form-label" for="lamp">Lamp</label>
                                                <input type="text" class="form-control" name="lamp" id="lamp" placeholder="Product Title" value="<?php echo $lamp; ?>">
                                            </div> 
                                        </div>
                                        <div class="col-md-6">                                  
                                            <div class="form-group">
                                                <label class="form-label" for="noise_level">Noise Level</label>
                                                <input type="text" class="form-control" name="noise_level" id="noise_level" placeholder="Product Title" value="<?php echo $noise_level; ?>">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">                                        
                                            <div class="form-group">
                                                <label class="form-label" for="cabinet_hood">Cabinet Hood</label>
                                                <input type="text" class="form-control" name="cabinet_hood" id="cabinet_hood" placeholder="Product Title" value="<?php echo $cabinet_hood; ?>">
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="dimension">Dimension</label>
                                                <input type="text" class="form-control" name="dimension" id="dimension" placeholder="Product Title" value="<?php echo $dimension; ?>">
                                            </div>  
                                        </div>
                                    </div> 
                                </div>                                                                   
                            </div>                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="warrenty" class="form-label">Warrenty Section</label><br>
                                    <input type="checkbox" id="warrenty" name="warrenty_section[]" value="warrenty" <?= !empty($warrenty_section) && in_array('warrenty', $warrenty_section) ? 'checked' : '' ?>>
                                    <label for="warrenty">Warrenty</label>
                                    <input type="checkbox" id="motion_sensor" name="warrenty_section[]" value="motion_sensor" <?= !empty($warrenty_section) && in_array('motion_sensor', $warrenty_section) ? 'checked' : '' ?>>
                                    <label for="motion_sensor">Motion Sensor</label>
                                    <input type="checkbox" id="isa_technology" name="warrenty_section[]" value="isa_technology" <?= !empty($warrenty_section) && in_array('isa_technology', $warrenty_section) ? 'checked' : '' ?>>
                                    <label for="isa_technology">ISA Technology</label>
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
                                            <input type="file" class="form-control" id="product_image" name="product_image" <?php if($action == 'Add'){?>required<?php }?>>
                                            <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG, WEBP files are allowed</small><br>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Key Feature" class="form-label">Key Feature</label><br>
                                    <?php                                          
                                         if($key_feature){ $i=1; foreach ($key_feature as $row) {
                                            $checked = in_array($row->id, $key_feature_id) ? 'checked' : ''; ?>
                                         <input type="checkbox" id="key_feature" name="key_feature[]" value="<?=$row->id; ?>" <?=$checked; ?>> <?=$row->key_feature_title;?>
                                    <?php }} ?>                                        
                                </div>
                            </div>        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="others_image">Others Image</label>                                    
                                    <div class="row">
                                        <?php if($others_image!='') { foreach($others_image as $image) {?>
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url();?>/uploads/product/<?php echo $image->image_file; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                            <p class="mt-2">
                                                    <a href="<?php echo base_url(); ?>/admin/manage_product/edit_image/<?php echo $image->image_id; ?>" class="btn btn-primary btn-sm" title="Edit Image"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="<?php echo base_url(); ?>/admin/manage_product/delete_image/<?php echo $image->image_id; ?>" class="btn btn-danger btn-sm" title="Delete Image" onclick="return confirm('Do You Want To Delete This Image');"><i class="fa fa-trash"></i> Delete</a>
                                            </p>
                                        </div>
                                        <?php } }?>                                                                                                                                                      
                                    </div>
                                    

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Others Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="others_image[]" class="form-control" id="others_image" multiple>
                                            <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG, WEBP files are allowed</small><br>                                            
                                        </div>
                                        <div class="image-preview" id="imagePreview"></div> 
                                    </div>
                                </div>                                
                            </div> 
                            <div class="col-md-6">
                            <label for="is_new" class="col-md-2 col-lg-2 col-form-label">Is New</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="radio" id="is_new_yes" name="is_new" value="1" <?= set_value('is_new', $is_new ?? '') == '1' ? 'checked' : '' ?>>
                                <label for="is_new_yes">Yes</label>
                                <input type="radio" id="is_new_no" name="is_new" value="0" <?= set_value('is_new', $is_new ?? '') == '0' ? 'checked' : '' ?>>
                                <label for="is_new_no">No</label>
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
<script>
    document.getElementById('others_image').addEventListener('change', function(event) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.innerHTML = ''; // Clear previous previews
        const files = event.target.files;
        
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            
            if (file && file.type.match('image.*')) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    imagePreview.appendChild(img);
                };
                
                reader.readAsDataURL(file);
            }
        }
    });
</script>