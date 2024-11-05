<?php
if($row) {
    $title          = $row->title;
    $title2          = $row->title2;
    $banner_image   = $row->banner_image;
    $description    = $row->description;
    $description2    = $row->description2;
} else {
    $title          = set_value('title', '');
    $title2          = set_value('title2', '');
    $banner_image   = set_value('banner_image', '');
    $description    = set_value('description', '');
    $description2    = set_value('description2', '');
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
                            <h5 class="m-b-10"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>/manage_image" target="_blank">Upload Images</a></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/user"><i class="feather icon-home"></i></a></li>
                            <!-- <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>">Manage <?php echo $moduleDetail['module']; ?></a></li> -->
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Page Title 1</label>
                                        <textarea class="form-control" name="title" id="title" placeholder="Title" required="required" rows="5"><?php echo $title; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Page Description 1</label>
                                        <textarea class="form-control ckeditor" name="description" id="description" placeholder="Description" required="required"><?php echo $description; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="title2">Page Title 2</label>
                                        <textarea class="form-control" name="title2" id="title2" placeholder="Title" required="required" rows="5"><?php echo $title2; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Page Description 2</label>
                                        <textarea class="form-control ckeditor" name="description2" id="description2" placeholder="Description" required="required"><?php echo $description2; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="services_image">Service Image</label>
                                        <div class="row">
                                            <?php if($banner_image!='') { ?>
                                            <div class="col-md-3">
                                                <img src="<?php echo base_url();?>/uploads/testing-services/<?php echo $banner_image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:300px;"  />
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Banner Image</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="banner_image" name="banner_image" <?php if($action == 'Add'){?>required<?php }?>>
                                                <label class="custom-file-label" for="banner_image">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>

                            <div class="field_wrapper">
                                <?php
                                $stringent_system = json_decode($row->stringent_system);
                                if(!empty($stringent_system)){ for($k=0;$k<count($stringent_system);$k++){
                                ?>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Strigent System</label>
                                            <textarea class="form-control" type="text" name="stringent_system[]" placeholder="Strigent System"><?=$stringent_system[$k]?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="javascript:void(0);" class="remove_button btn btn-danger" style="margin-top: 29px;"><i class="fa fa-minus-circle"></i></a>
                                    </div>
                                </div>
                                <?php } }?>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Strigent System</label>
                                            <textarea class="form-control" type="text" name="stringent_system[]" placeholder="Strigent System"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="javascript:void(0);" class="add_button btn btn-success" style="margin-top: 29px;"><i class="fa fa-plus-circle"></i></a>
                                    </div>
                                </div>                                    
                            </div>
                            <div class="field_wrapper2">
                                <?php
                                $color_code = json_decode($row->color_code);
                                $steps_to_quality = json_decode($row->steps_to_quality);
                                if(!empty($steps_to_quality)){ for($k=0;$k<count($steps_to_quality);$k++){
                                ?>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label" for="color_code">Color Code</label>
                                        <input class="form-control" type="text" name="color_code[]" value="<?=$color_code[$k]?>" placeholder="Color Code">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label" for="steps_to_quality">Steps to Quality</label>
                                        <textarea class="form-control" type="text" name="steps_to_quality[]" placeholder="Steps to Quality"><?=$steps_to_quality[$k]?></textarea>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="javascript:void(0);" class="remove_button2 btn btn-danger" style="margin-top: 29px;"><i class="fa fa-minus-circle"></i></a>
                                    </div>
                                </div>
                                <?php } }?>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label" for="color_code">Color Code</label>
                                        <input class="form-control" type="text" name="color_code[]" value="" placeholder="Color Code">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label" for="steps_to_quality">Steps to Quality</label>
                                        <textarea class="form-control" type="text" name="steps_to_quality[]" placeholder="Steps to Quality"></textarea>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="javascript:void(0);" class="add_button2 btn btn-success" style="margin-top: 29px;"><i class="fa fa-plus-circle"></i></a>
                                    </div>
                                </div>                                
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 20;
        var addButton = $('.add_button'); 
        var wrapper = $('.field_wrapper');        
        var fieldHTML = '<div class="row">\
                            <div class="col-md-10">\
                                <div class="form-group">\
                                    <textarea class="form-control" type="text" name="stringent_system[]" placeholder="Strigent System"></textarea>\
                                </div>\
                            </div>\
                            <div class="col-md-2">\
                                <a href="javascript:void(0);" class="remove_button btn btn-danger"><i class="fa fa-minus-circle"></i></a>\
                            </div>\
                        </div>';
        var x = 1;
        $(addButton).click(function(){
            if(x < maxField){ 
                x++; 
                $(wrapper).append(fieldHTML);
            }
        });
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField    = 20;
        var addButton   = $('.add_button2'); 
        var wrapper     = $('.field_wrapper2');
        var fieldHTML   = '<div class="row mt-3">\
                                <div class="col-md-5">\
                                    <input class="form-control" type="text" name="color_code[]" value="" placeholder="Color Code">\
                                </div>\
                                <div class="col-md-5">\
                                    <textarea class="form-control" type="text" name="steps_to_quality[]" placeholder="Steps to Quality"></textarea>\
                                </div>\
                                <div class="col-md-2">\
                                    <a href="javascript:void(0);" class="remove_button2 btn btn-danger"><i class="fa fa-minus-circle"></i></a>\
                                </div>\
                            </div>';
        var x = 1;
        $(addButton).click(function(){
            if(x < maxField){ 
                x++; 
                $(wrapper).append(fieldHTML);
            }
        });
        $(wrapper).on('click', '.remove_button2', function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        });
    });
</script>