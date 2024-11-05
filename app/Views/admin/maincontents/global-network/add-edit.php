<?php
if($row) {
    $country_id             = $row->country_id;
    $title                  = $row->title;
    $banner_image           = $row->banner_image;
    $short_description      = $row->short_description;
    $description            = $row->description;
}else{
    $country_id             = set_value('country_id', '');
    $title                  = set_value('title', '');
    $banner_image           = set_value('banner_image', '');
    $short_description      = set_value('short_description', '');
    $description            = set_value('description', '');
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
                                        <label class="form-label" for="country_id">Country</label>
                                        <select class="js-example-basic-single form-control" id="country_id" name="country_id" required="required">
                                            <option value="" selected="selected">Select Country</option>
                                             <?php
                                             if($countries){ $i=1; foreach ($countries as $row) {?>
                                            <option value="<?=$row->id; ?>"<?php if($country_id==$row->id) { ?> selected="selected"<?php } ?>><?=$row->name;?></option>
                                            <?php  }} ?>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <textarea class="form-control" name="title" id="title" placeholder="Title" required="required" rows="5"><?php echo $title; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="services_image">Banner Image</label>
                                        <div class="row">
                                            <?php if($banner_image!='') { ?>
                                            <div class="col-md-3">
                                                <img src="<?php echo base_url();?>/uploads/global-network/<?php echo $banner_image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:300px;"  />
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="short_description">Short Description</label>
                                        <textarea class="form-control" name="short_description" id="short_description" placeholder="Short Description" required="required" rows="5"><?php echo $short_description; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea class="form-control ckeditor" name="description" id="description" placeholder="Description" required="required"><?php echo $description; ?></textarea>
                                    </div>
                                </div>
                            </div>                            
                            <div class="field_wrapper">
                                <?php if($globalContacts){ foreach($globalContacts as $globalContact){?>
                                    <div class="row mb-3" style="border:1px solid #000; padding: 10px;">
                                        <div class="col-md-2">
                                            <textarea class="form-control" name="contact_title[]" placeholder="Contact Title" rows="5"><?=$globalContact->contact_title?></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <textarea class="form-control ckeditor" name="contact_description[]" placeholder="Contact Description" rows="5"><?=$globalContact->contact_description?></textarea>
                                        </div>
                                        <div class="col-md-3">
                                            <textarea class="form-control" name="contact_map[]" placeholder="Contact Map" rows="5"><?=$globalContact->contact_map?></textarea>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-control" name="is_ho[]">
                                                <option value="" selected>Head Office</option>
                                                <option value="1"<?php if($globalContact->is_ho == 1) { ?> selected="selected"<?php } ?>>YES</option>
                                                <option value="0"<?php if($globalContact->is_ho == 0) { ?> selected="selected"<?php } ?>>NO</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-minus-circle fa-2x text-danger"></i></a>
                                        </div>                                    
                                    </div>
                                <?php } }?>
                                <div class="row mb-3" style="border:1px solid #000; padding: 10px;">
                                    <div class="col-md-2">
                                        <textarea class="form-control" name="contact_title[]" placeholder="Contact Title" rows="5"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <textarea class="form-control ckeditor" name="contact_description[]" placeholder="Contact Description" rows="5"></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <textarea class="form-control" name="contact_map[]" placeholder="Contact Map" rows="5"></textarea>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" name="is_ho[]">
                                            <option value="" selected>Head Office</option>
                                            <option value="1">YES</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-plus-circle fa-2x text-success"></i></a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="row mb-3" style="border:1px solid #000; padding: 10px;">\
                            <div class="col-md-2">\
                                <textarea class="form-control" name="contact_title[]" placeholder="Contact Title" rows="5"></textarea>\
                            </div>\
                            <div class="col-md-4">\
                                <textarea class="form-control ckeditor" name="contact_description[]" placeholder="Contact Description" rows="5"></textarea>\
                            </div>\
                            <div class="col-md-3">\
                                <textarea class="form-control" name="contact_map[]" placeholder="Contact Map" rows="5"></textarea>\
                            </div>\
                            <div class="col-md-2">\
                                <select class="form-control" name="is_ho[]">\
                                    <option value="" selected>Head Office</option>\
                                    <option value="1">YES</option>\
                                    <option value="0">NO</option>\
                                </select>\
                            </div>\
                            <div class="col-md-1">\
                                <a href="javascript:void(0);" class="remove_button" title="Add field"><i class="fa fa-minus-circle fa-2x text-danger"></i></a>\
                            </div>\
                        </div>'; //New input field html
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>