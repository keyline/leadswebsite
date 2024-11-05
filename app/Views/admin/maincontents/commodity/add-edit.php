<?php
if($row) {
    $name                       = $row->name;
    $commodity_icon             = $row->commodity_icon;
} else {
    $name                       = set_value('name', '');
    $commodity_icon             = set_value('commodity_icon', '');
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
                        <li class="breadcrumb-item"><a href="#"><?php echo $page_header; ?></a></li>
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
                                    <label class="form-label" for="name">Commodity Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Commodity Name" value="<?php echo $name; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">Commodity Icon</label>
                                    <div class="input-group mb-2">
                                      <?php if($commodity_icon!='') { ?>
                                      <img src="<?php echo base_url();?>/uploads/commodity/<?php echo $commodity_icon; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                      <?php } ?>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Commodity Icon</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="commodity_icon" name="commodity_icon">
                                            <label class="custom-file-label" for="commodity_icon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- repeater fields -->
                        <div class="field_wrapper">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <span style="font-weight: bold; text-align: center;">Title</span>
                                </div>
                                <div class="col-md-4">
                                    <span style="font-weight: bold; text-align: center;">Short Description</span>
                                </div>
                                <div class="col-md-4">
                                    <span style="font-weight: bold; text-align: center;">Image</span>
                                </div>
                                <div class="col-md-1">
                                    <span style="font-weight: bold; text-align: center;">Action</span>
                                </div>                                
                            </div>
                            <?php if($commodity_details) { foreach($commodity_details as $commodity_detail){?>
                                <div class="row" style="border: 1px solid #97292330; padding: 15px; margin-bottom: 10px;">
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="title[]" placeholder="Title" value="<?=$commodity_detail->title?>" />
                                    </div>
                                    <div class="col-md-4">
                                        <textarea class="form-control" name="short_description[]" placeholder="Short Description" rows="5"><?=$commodity_detail->short_description?></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <?php if($commodity_detail->post_image!='') { ?>
                                            <img src="<?php echo base_url();?>/uploads/commodity/<?php echo $commodity_detail->post_image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                        <?php } ?>
                                        <input type="file" class="form-control" name="post_image[]">
                                    </div>
                                    <div class="col-md-1">
                                        <a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle fa-2x text-danger"></i></a>
                                    </div>
                                </div>
                            <?php } }?>
                            <div class="row" style="border: 1px solid #97292330; padding: 15px; margin-bottom: 10px;">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="title[]" placeholder="Title" />
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control" name="short_description[]" placeholder="Short Description" rows="5"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="post_image[]">
                                </div>
                                <div class="col-md-1">
                                    <a href="javascript:void(0);" class="add_button"><i class="fa fa-plus-circle fa-2x text-success"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- repeater fields -->

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
        var fieldHTML = '<div class="row" style="border: 1px solid #97292330; padding: 15px; margin-bottom: 10px;">\
                            <div class="col-md-3">\
                                <input type="text" class="form-control" name="title[]" placeholder="Title" />\
                            </div>\
                            <div class="col-md-4">\
                                <textarea class="form-control" name="short_description[]" placeholder="Short Description" rows="5"></textarea>\
                            </div>\
                            <div class="col-md-4">\
                                <input type="file" class="form-control" name="post_image[]">\
                            </div>\
                            <div class="col-md-1">\
                                <a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle fa-2x text-danger"></i></a>\
                            </div>\
                        </div>';
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