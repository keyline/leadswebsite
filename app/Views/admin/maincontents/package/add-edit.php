<?php
if ($row) {
    $category_id                = $row->category_id;
    $package_name               = $row->package_name;
    $feature_image              = $row->feature_image;
    $day_night                  = $row->day_night;
    $person                     = $row->person;
    $package_price              = $row->package_price;
    $description_heading        = $row->description_heading;
    $description2_heading       = $row->description2_heading;
    $description_points         = json_decode($row->description_points);
    $description2_points        = json_decode($row->description2_points);
    $additional_images          = json_decode($row->additional_images);
    $additional_images_titles   = json_decode($row->additional_images_titles);
    $banner_image               = $row->banner_image;
    $country_name               = $row->country_name;
    $show_on_fronend            = $row->show_on_frontend;
    $show_on_promos             = $row->show_on_promos;
} else {
    $category_id                = set_value('category_id', '');
    $package_name               = set_value('package_name', '');
    $feature_image              = set_value('feature_image', '');
    $day_night                  = set_value('day_night', '');
    $person                     = set_value('person', '');
    $package_price              = set_value('package_price', '');
    $description_heading        = set_value('description_heading', '');
    $description2_heading       = set_value('description2_heading', '');
    $description_points         = set_value('description_points', []);
    $description2_points        = set_value('description2_points', []);
    $additional_images          = set_value('additional_images', []);
    $additional_images_titles   = set_value('additional_images_titles', []);
    $banner_image               = set_value('banner_image', '');
    $country_name               = set_value('country_name', '');
    $show_on_fronend            = 0;
    $show_on_promos             = 0;
}
?>
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
                    <?php if ($session->getFlashdata('success_message')) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> <?php echo $session->getFlashdata('success_message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php } ?>
                    <?php if ($session->getFlashdata('error_message')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo $session->getFlashdata('error_message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <form id="validation-form123" action="" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="show_on_fronend" <?= $show_on_fronend == 1 ? 'checked' : '' ?> type="checkbox" value="<?= $show_on_fronend ?>" id="show_home">
                                    <label class="form-check-label" for="show_home">
                                        Show on home page
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="show_on_promos" <?= $show_on_promos == 1 ? 'checked' : '' ?> type="checkbox" value="<?= $show_on_promos ?>" id="show_promos">
                                    <label class="form-check-label" for="show_promos">
                                        Show on promos page
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="package_category">Package Category Name</label>
                                    <select name="category_id" class="form-control" id="category_id" required>
                                        <option value="" selected>Select Category</option>
                                        <?php if ($category) {
                                            foreach ($category as $categoryRow) { ?>
                                                <option value="<?= $categoryRow->id ?>" <?= $categoryRow->id == $category_id ? 'selected' : '' ?>>
                                                    <?= $categoryRow->name ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="package_name">Package Name</label>
                                    <input type="text" class="form-control" name="package_name" id="package_name" placeholder="Package Name" value="<?php echo $package_name; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="day_night">Location</label>
                                    <input type="text" class="form-control" name="country_name" id="country_name" placeholder="Country Name" value="<?php echo $country_name; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="image">Feature Image</label>
                                    <div class="input-group mb-2">
                                        <?php if ($feature_image != '') { ?>
                                            <img src="<?php echo base_url(); ?>/uploads/package/<?php echo $feature_image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;" />
                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>/uploads/package/no-image.jpg" class="img-responsive img-thumbnail" style="height:100px; width:100px;" />
                                        <?php } ?>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Feature Image <small>(1583 x 319)</small></span>
                                            <input type="file" class="form-control" id="feature_image" name="feature_image" <?php if ($action == 'Add') { ?>required<?php } ?>>
                                        </div>
                                        <div class="custom-file">
                                        
                                            <p class="text-info mt-2">* Only JPG, JPEG, ICO, SVG, PNG, WEBP files are allowed</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="image">Banner Image</label>
                                    <div class="input-group mb-2">
                                        <?php if ($banner_image != '') { ?>
                                            <img src="<?php echo base_url(); ?>/uploads/package/<?php echo $banner_image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;" />
                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>/uploads/package/no-image.jpg" class="img-responsive img-thumbnail" style="height:100px; width:100px;" />
                                        <?php } ?>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Banner Image <small>(1583 x 319)</small></span>
                                            <input type="file" class="form-control" id="banner_image" name="banner_image" <?php if ($action == 'Add') { ?><?php } ?>>
                                        </div>
                                        <div class="custom-file">
                                            <p class="text-info mt-2">* Only JPG, JPEG, ICO, SVG, PNG, WEBP files are allowed</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="day_night">Day Night</label>
                                    <input type="text" class="form-control" name="day_night" id="day_night" placeholder="Day/Night" value="<?php echo $day_night; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="day_night">Person</label>
                                    <input type="text" class="form-control" name="person" id="person" placeholder="Person" value="<?php echo $person; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="package_price">Package Price</label>
                                    <input type="text" class="form-control" name="package_price" id="package_price" placeholder="Package Price" value="<?php echo $package_price; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" style="border:1px solid #f26522; padding:10px; border-radius: 5px">
                                    <div class="row mb-3">
                                        <div class="col-md-3 col-lg-3">
                                            <label>Description Heading</label>
                                            <input type="text" name="description_heading" class="form-control" value="<?= $description_heading ?>">
                                        </div>
                                        <div class="col-md-9 col-lg-9">
                                            <div class="field_wrapper101">
                                                <?php if (!empty($description_points)) {
                                                    for ($i = 0; $i < count($description_points); $i++) { ?>
                                                        <div class="row mb-3">
                                                            <div class="col-md-10 col-lg-10">
                                                                <label>Description Points</label>
                                                                <input type="text" name="description_points[]" class="form-control" value="<?= $description_points[$i] ?>">
                                                            </div>
                                                            <div class="col-md-2 col-lg-2">
                                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm remove_button101" style="margin-top: 25px;"><i class="fa fa-minus-circle"></i></a>
                                                            </div>
                                                        </div>
                                                <?php }
                                                } ?>
                                                <div class="row mb-3">
                                                    <div class="col-md-10 col-lg-10">
                                                        <label>Description Points</label>
                                                        <input type="text" name="description_points[]" class="form-control">
                                                    </div>
                                                    <div class="col-md-2 col-lg-2">
                                                        <a href="javascript:void(0);" class="btn btn-success btn-sm add_button101" style="margin-top: 25px;"><i class="fa fa-plus-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" style="border:1px solid #f26522; padding:10px; border-radius: 5px">
                                    <div class="row mb-3">
                                        <div class="col-md-3 col-lg-3">
                                            <label>Description 2 Heading</label>
                                            <input type="text" name="description2_heading" class="form-control" value="<?= $description2_heading ?>">
                                        </div>
                                        <div class="col-md-9 col-lg-9">
                                            <div class="field_wrapper102">
                                                <?php if (!empty($description2_points)) {
                                                    for ($i = 0; $i < count($description2_points); $i++) { ?>
                                                        <div class="row mb-3">
                                                            <div class="col-md-10 col-lg-10">
                                                                <label>Description Points</label>
                                                                <input type="text" name="description2_points[]" class="form-control" value="<?= $description2_points[$i] ?>">
                                                            </div>
                                                            <div class="col-md-2 col-lg-2">
                                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm remove_button102" style="margin-top: 25px;"><i class="fa fa-minus-circle"></i></a>
                                                            </div>
                                                        </div>
                                                <?php }
                                                } ?>
                                                <div class="row mb-3">
                                                    <div class="col-md-10 col-lg-10">
                                                        <label>Description Points</label>
                                                        <input type="text" name="description2_points[]" class="form-control">
                                                    </div>
                                                    <div class="col-md-2 col-lg-2">
                                                        <a href="javascript:void(0);" class="btn btn-success btn-sm add_button102" style="margin-top: 25px;"><i class="fa fa-plus-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- cross section images -->
                                    <div class="row mb-3">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="field_wrapper" style="border:1px solid #f26522; padding:10px; border-radius: 5px">

                                                <?php if (!empty($additional_images)) {
                                                    for ($k = 0; $k < count($additional_images); $k++) { ?>
                                                        <div style="border:1px solid #f26522; padding:10px; border-radius: 5px" class="mb-3">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <input type="text" name="additional_images_titles[]" required class="form-control additional_title" value="<?= $additional_images_titles[$k] ?>" />
                                                                </div>

                                                                <div class="col-md-5">
                                                                    <input type="file" name="existing_images[<?= $additional_images[$k] ?>]" class="form-control" />
                                                                    <!-- <input type="file" name="test" class="form-control" /> -->
                                                                    <input type="hidden" name="old_additional_images_titles[]" value="<?= $additional_images[$k] ?>" />
                                                                    <?php if ($feature_image != '') { ?>
                                                                        <img src="<?= base_url() . '/uploads/package/'  . $additional_images[$k] ?>" class="img-thumbnail" alt="<?= $additional_images_titles[$k] ?>" style="width: 75px; height: 75px; margin-top: 10px;">
                                                                    <?php } else { ?>
                                                                        <img src="<?php echo base_url(); ?>/uploads/package/no-image.jpg" alt="" class="img-thumbnail" style="width: 75px; height: 75px; margin-top: 10px;">
                                                                    <?php } ?>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <a href="javascript:void(0);" class="remove_button btn btn-danger btn-sm" title="Remove field">
                                                                        <i class="fa fa-minus-circle"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php }
                                                } ?>



                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label for="typical_application" class="col-form-label">Additional Images </label>
                                                        <input type="text" name="additional_images_titles[]" class="form-control" />
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label for="typical_application" class="col-form-label">Add Images <small>(1583 x 319)</small></label>
                                                        <input type="file" class="form-control" id="additional_images" name="additional_images[]">
                                                        <p class="text-info mt-2">* Only JPG, JPEG, ICO, SVG, PNG, WEBP files are allowed</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:void(0);" class="add_button btn btn-success btn-sm" title="Add field" style="margin-top: 38px;">
                                                            <i class="fa fa-plus-circle"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- cross section images -->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var maxField = 100; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="row mb-3">\
                      <div class="col-md-5">\
                      <label for="typical_application" class="col-form-label">Additional Images</label>\
                        <input type="text" required name="additional_images_titles[]" class="form-control additional_title"/>\
                      </div>\
                      <div class="col-md-5">\
                      <label for="typical_application" class="col-form-label">Add Images</label>\
                        <input type="file" name="additional_images[]" class="form-control"/>\
                      </div>\
                      <div class="col-md-2">\
                        <a href="javascript:void(0);" class="remove_button btn btn-danger btn-sm" title="Remove field"  style="margin-top: 38px;"><i class="fa fa-minus-circle"></i></a>\
                      </div>\
                    </div>'; //New input field html
        var x = 1; //Initial field counter is 1

        // Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increase field counter
                $(wrapper).append(fieldHTML); //Add field html
            } else {
                alert('A maximum of ' + maxField + ' fields are allowed to be added. ');
            }
        });

        // Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent('div').parent('div').parent('div').remove(); //Remove field html
            x--; //Decrease field counter
        });
    });
</script>
<script>
    $(document).ready(function() {
        var maxField = 100; //Input fields increment limitation
        var addButton = $('.add_button101'); //Add button selector
        var wrapper = $('.field_wrapper101'); //Input field wrapper
        var fieldHTML = '<div class="row mb-3">\
                            <div class="col-md-10 col-lg-10">\
                                <label>Description Points</label>\
                                <input type="text" name="description_points[]" class="form-control">\
                            </div>\
                            <div class="col-md-2 col-lg-2">\
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm remove_button101" style="margin-top: 25px;"><i class="fa fa-minus-circle"></i></a>\
                            </div>\
                        </div>'; //New input field html 
        var x = 1; //Initial field counter is 1

        // Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increase field counter
                $(wrapper).append(fieldHTML); //Add field html
            } else {
                alert('A maximum of ' + maxField + ' fields are allowed to be added. ');
            }
        });

        // Once remove button is clicked
        $(wrapper).on('click', '.remove_button101', function(e) {
            e.preventDefault();
            $(this).parent('div').parent('div').remove(); //Remove field html
            x--; //Decrease field counter
        });
    });
    $(document).ready(function() {
        var maxField = 100; //Input fields increment limitation
        var addButton = $('.add_button102'); //Add button selector
        var wrapper = $('.field_wrapper102'); //Input field wrapper
        var fieldHTML = '<div class="row mb-3">\
                            <div class="col-md-10 col-lg-10">\
                                <label>Description Points</label>\
                                <input type="text" name="description2_points[]" class="form-control">\
                            </div>\
                            <div class="col-md-2 col-lg-2">\
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm remove_button102" style="margin-top: 25px;"><i class="fa fa-minus-circle"></i></a>\
                            </div>\
                        </div>'; //New input field html 
        var x = 1; //Initial field counter is 1

        // Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increase field counter
                $(wrapper).append(fieldHTML); //Add field html
            } else {
                alert('A maximum of ' + maxField + ' fields are allowed to be added. ');
            }
        });

        // Once remove button is clicked
        $(wrapper).on('click', '.remove_button102', function(e) {
            e.preventDefault();
            $(this).parent('div').parent('div').remove(); //Remove field html
            x--; //Decrease field counter
        });

        /********************************* show on homepage  *******************************************/

        let checkbox1 = $('#show_home');
        let checkbox2 = $('#show_promos');
        checkbox1.on('change', function() {
            let value = this.checked ? 1 : 0;
            console.log('Value:', value);
            checkbox1.val(value)
        });

        checkbox2.on('change', function() {
            let value = this.checked ? 1 : 0;
            console.log('Value:', value);
            checkbox2.val(value)
        });

        // ==========================================================

        $("#validation-form123").on('submit', function(event) {
            event.preventDefault();
            const inputs = $(".additional_title");

            let isValid = true;


            for (let i = 0; i < inputs.length; i++) {
                if (!inputs[i].value.trim()) {
                    isValid = false;
                    inputs[i].classList.add('error');
                } else {
                    inputs[i].classList.remove('error');
                }
            }


            if (isValid) {

                this.submit();
            }
        });



    });
</script>