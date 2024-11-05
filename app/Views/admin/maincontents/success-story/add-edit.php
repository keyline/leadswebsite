<?php
if($row) {
    $name                       = $row->name;
    $description                = $row->description;
    $image                      = $row->image;
    $course_name                = json_decode($row->course_name);
    $rank                       = json_decode($row->rank);
} else {
    $name                       = set_value('name', '');
    $description                = set_value('description', '');
    $image                      = set_value('image', '');
    $course_name                = [];
    $rank                       = [];
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
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Description" required="required" rows="5"><?php echo $description; ?></textarea>
                                </div>
                            </div>                                                   
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="image">Image</label>
                                    <div class="input-group mb-2">
                                      <?php if($image!='') { ?>
                                      <img src="<?php echo base_url();?>/uploads/success_story/<?php echo $image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                      <?php } ?>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field_wrapper mb-3">
                                    <?php if(count($course_name)>0){ for($c=0;$c<count($course_name);$c++){?>
                                       <div class="row mb-3">
                                            <div class="col-md-5">
                                                <label class="form-label" for="name">Course</label>
                                                <select class="form-control" name="course_name[]">
                                                    <option value="" selected>Select Courses</option>
                                                <?php if($courses){ foreach($courses as $course){?>
                                                    <option value="<?=$course->id?>" <?php if($course->id == $course_name[$c]){?>selected<?php }?>><?=$course->course_name?></option>
                                                <?php } }?>
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label" for="name">Rank</label>
                                                <input type="text" class="form-control" name="rank[]" id="rank" placeholder="Name" value="<?=$rank[$c]?>">
                                            </div>
                                            <div class="col-md-2">
                                                <a href="javascript:void(0);" class="remove_button" title="Remove field">
                                                    <i class="fa fa-minus-circle fa-2x text-danger" style="margin-top: 32px;"></i>
                                                </a>
                                            </div>
                                        </div> 
                                    <?php } }?>
                                    <div class="row mb-3">
                                        <div class="col-md-5">
                                            <label class="form-label" for="name">Course</label>
                                            <select class="form-control" name="course_name[]">
                                                <option value="" selected>Select Courses</option>
                                            <?php if($courses){ foreach($courses as $course){?>
                                                <option value="<?=$course->id?>"><?=$course->course_name?></option>
                                            <?php } }?>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label" for="name">Rank</label>
                                            <input type="text" class="form-control" name="rank[]" id="rank" placeholder="Name">
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:void(0);" class="add_button" title="Add field">
                                                <i class="fa fa-plus-circle fa-2x text-success" style="margin-top: 32px;"></i>
                                            </a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="row mb-3">\
                            <div class="col-md-5">\
                                <label class="form-label" for="name">Course</label>\
                                <select class="form-control" name="course_name[]">\
                                    <option value="" selected>Select Courses</option>';
                                <?php if($courses){ foreach($courses as $course){?>
                        fieldHTML += '<option value="<?=$course->id?>"><?=$course->course_name?></option>';
                                <?php } }?>
                    fieldHTML += '</select>\
                            </div>\
                            <div class="col-md-5">\
                                <label class="form-label" for="name">Rank</label>\
                                <input type="text" class="form-control" name="rank[]" id="rank" placeholder="Name">\
                            </div>\
                            <div class="col-md-2">\
                                <a href="javascript:void(0);" class="remove_button" title="Remove field">\
                                    <i class="fa fa-minus-circle fa-2x text-danger" style="margin-top: 32px;"></i>\
                                </a>\
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