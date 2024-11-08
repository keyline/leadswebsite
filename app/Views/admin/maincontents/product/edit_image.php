<?php
if($row) {    
    $others_image                      = $row->image_file;
} else {    
    $others_image = '';   
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
                                    <label class="form-label" for="others_image">Others Image</label>                                    
                                    <div class="row">
                                        <?php if($others_image!='') { ?>
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url();?>/uploads/product/<?php echo $others_image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />                                            
                                        </div>
                                        <?php } ?>                                                                                                                                                      
                                    </div>
                                    

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Others Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="others_image" class="form-control" id="others_image">
                                            <small class="text-info">* Only JPG, JPEG, ICO, SVG, PNG, WEBP files are allowed</small><br>                                            
                                        </div>
                                        <div class="image-preview" id="imagePreview"></div> 
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