<style>
    .position-circle {
    margin-top: 10px;
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 50%;
    background-color: #007bff;
    color: white;
    text-align: center;
    font-weight: bold;
    font-size: 16px;
}
</style>

<?php
if($row) {
    $product_category                  = $row->product_category;  
    $product_title                     = $row->product_title;      
    $content_description                       = json_decode($row->content_description);
    // pr(count($content_description));
    $content_title                       = json_decode($row->content_title);
    $regular_price                     = $row->regular_price;
    $sale_price                        = $row->sale_price;    
    $warrenty_section                  = json_decode($row->warrenty_section);
    $key_feature_id                    = json_decode($row->key_feature);   
    $is_new                            = $row->is_new;
    // $others_image                      = $row->image_file;
} else {
    $product_category                  = set_value('product_category', '');
    $product_title                     = set_value('product_title', '');    
    $regular_price                       = set_value('regular_price', '');
    $sale_price                       = set_value('sale_price', '');
    $others_image = '';
    $key_feature_id = [];
    $warrenty_section = [];
    $content_title = [];
    $content_description = [];
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
                                    <select class="js-example-basic-single form-control" id="product_category" name="product_category" required>
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
                                            <?php 
                                            if(!empty($content_title)){
                                            for($i = 1; $i <= count($content_title); $i++) {?>
                                                <div>
                                                    <div class="specification-row">
                                                        <input type="text" name="content_title[]" value="<?php if(isset($content_title[$i-1]) && $content_title[$i-1] != ''){ echo $content_title[$i-1]; } ?>" class="form-control" placeholder="Specification Title" required>
                                                        <input type="text" name="content_description[]" value="<?php if(isset($content_description[$i-1]) && $content_description[$i-1] != ''){ echo $content_description[$i-1]; } ?>" class="form-control" placeholder="Specification Description" required>
                                                        <!-- <button type="button" class="btn btn-primary add-description-row">+</button> -->
                                                    </div>
                                                </div>  
                                            <?php }} ?>  
                                        <div id="specification-container">
                                            <div class="specification-row">
                                                <input type="text" name="content_title[]" class="form-control" placeholder="Specification Title" required>
                                                <input type="text" name="content_description[]" class="form-control" placeholder="Specification Description" required>
                                                <button type="button" class="btn btn-primary add-description-row">+</button>
                                            </div>
                                        </div>                                                                           
                                </div>                                                                   
                            </div>                                                                                                                                                       
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="others_image">Product Images</label>                                    
                                    <div class="row">
                                        <?php if($others_image!='') { foreach($others_image as $image) {?>
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url();?>/uploads/product/<?php echo $image->image_file; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />                                            
                                            <div class="position-circle">
                                                <?php echo $image->position; ?>
                                            </div>
                                            <p class="mt-2">                                                    
                                                    <a href="<?php echo base_url(); ?>/admin/manage_product/edit_image/<?php echo $image->image_id; ?>" class="btn btn-primary btn-sm" title="Edit Image"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="<?php echo base_url(); ?>/admin/manage_product/delete_image/<?php echo $image->image_id; ?>" class="btn btn-danger btn-sm" title="Delete Image" onclick="return confirm('Do You Want To Delete This Image');"><i class="fa fa-trash"></i> Delete</a>
                                            </p>
                                        </div>
                                        <?php } }?>                                                                                                                                                      
                                    </div>
                                    

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Product Images</span>
                                        </div>
                                        <div id="image-upload-container">
                                            <div class="image-upload-row">
                                                <input type="file" name="others_image[]" class="form-control" >
                                                <input type="number" name="position[]" class="form-control" placeholder="Position" >
                                                <button type="button" class="btn btn-primary add-image-row">+</button>
                                            </div>
                                        </div>                                        
                                        <div class="image-preview" id="imagePreview"></div> 
                                    </div>
                                </div>                                
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Key Feature" class="form-label">Key Feature</label><br>
                                    <?php                                          
                                         if($key_feature){ $i=1; foreach ($key_feature as $row) {
                                            $checked = in_array($row->id, $key_feature_id) ? 'checked' : ''; ?>
                                         <input type="checkbox" id="key_feature" name="key_feature[]" value="<?=$row->id; ?>" <?=$checked; ?> required> <?=$row->key_feature_title;?>
                                    <?php }} ?>                                        
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="warrenty" class="form-label">Warranty Section</label><br>
                                    <input type="checkbox" id="warrenty" name="warrenty_section[]" value="warrenty" <?= !empty($warrenty_section) && in_array('warrenty', $warrenty_section) ? 'checked' : '' ?> required>
                                    <label for="warrenty">Warranty</label>
                                    
                                    <input type="checkbox" id="motion_sensor" name="warrenty_section[]" value="motion_sensor" <?= !empty($warrenty_section) && in_array('motion_sensor', $warrenty_section) ? 'checked' : '' ?>>
                                    <label for="motion_sensor">Motion Sensor</label>
                                    
                                    <input type="checkbox" id="isa_technology" name="warrenty_section[]" value="isa_technology" <?= !empty($warrenty_section) && in_array('isa_technology', $warrenty_section) ? 'checked' : '' ?>>
                                    <label for="isa_technology">ISA Technology</label>
                                    
                                    <p id="warranty_error" style="color: red; display: none;">Please select at least one option.</p>
                                </div>  
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="regular_price">Regular Price</label>
                                    <input type="text" class="form-control" name="regular_price" id="regular_price" placeholder="Regular Price" value="<?php echo $regular_price; ?>" required="required">
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="sale_price">Sale Price</label>
                                    <input type="text" class="form-control" name="sale_price" id="sale_price" placeholder="Sale Price" value="<?php echo $sale_price; ?>">
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
<!-- <script>
    document.querySelector('form').addEventListener('submit', function(event) {
        const checkboxes = document.querySelectorAll('input[name="warrenty_section[]"]');
        const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        
        if (!isChecked) {
            event.preventDefault();  // Stop form submission
            document.getElementById('warranty_error').style.display = 'block';
        } else {
            document.getElementById('warranty_error').style.display = 'none';
        }
    });
</script> -->
<script>
document.querySelector('.add-image-row').addEventListener('click', function () {
    const row = document.createElement('div');
    row.className = 'image-upload-row';
    row.innerHTML = `
        <input type="file" name="others_image[]" class="form-control">
        <input type="number" name="position[]" class="form-control" placeholder="Position">
        <button type="button" class="btn btn-danger remove-image-row">-</button>
    `;
    document.getElementById('image-upload-container').appendChild(row);
});

document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('remove-image-row')) {
        e.target.parentNode.remove();
    }
});

document.querySelector('.add-description-row').addEventListener('click', function () {
    const row = document.createElement('div');
    row.className = 'specification-row';
    row.innerHTML = `
        <input type="text" name="content_title[]" class="form-control" placeholder="Specification Title" required>
        <input type="text" name="content_description[]" class="form-control" placeholder="Specification Description" required>
        <button type="button" class="btn btn-danger remove-specification-row">-</button>
    `;
    document.getElementById('specification-container').appendChild(row);
});

document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('remove-specification-row')) {
        e.target.parentNode.remove();
    }
});
</script>