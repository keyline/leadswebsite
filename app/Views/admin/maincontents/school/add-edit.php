<?php
if($row)
{
    $school_prefix = $row->school_prefix;
    $schoool_code = $row->schoool_code;
    $schoool_name = $row->schoool_name;
    $school_phone = $row->school_phone;
    $hoi_mobile_no = $row->hoi_mobile_no;
    $hoi_whatsapp = $row->hoi_whatsapp;
    $hoi_designation = $row->hoi_designation;
    $hoi_signature = $row->hoi_signature;
    $email = $row->email;
    $password = $row->password;
    $school_logo = $row->school_logo;
    $postal_address = $row->postal_address;
    $block_muni_corp_type = $row->block_muni_corp_type;
    $block_muni_corp_name = $row->block_muni_corp_name;
    $village = $row->village;
    $city = $row->city;
    $country = $row->country;
    $state = $row->state;
    $pincode = $row->pincode;
    $establish_year = $row->establish_year;
    $school_category = $row->school_category;
    $medium = $row->medium;
    $building_status = $row->building_status;
    $drinking_water = $row->drinking_water;
    $electricity = $row->electricity;
    $short_url = $row->short_url;

    // $theme_background_color = $row->theme_background_color;
    // $sidebar_font_color = $row->sidebar_font_color;
    // $name_font_color = $row->name_font_color;
    // $address_font_color = $row->address_font_color;
    // $phone_font_color = $row->phone_font_color;
    // $establish_font_color = $row->establish_font_color;
    // $idcard_session_font_color = $row->idcard_session_font_color;
    // $staff_idcard_background_color = $row->staff_idcard_background_color;
    // $student_idcard_background_color = $row->student_idcard_background_color;
    // $icon_color = $row->icon_color;
}
else
{
    $school_prefix = '';
    $schoool_code = '';
    $schoool_name = '';
    $school_phone = '';
    $hoi_mobile_no = '';
    $hoi_whatsapp = '';
    $hoi_designation = '';
    $hoi_signature = '';
    $email = '';
    $password = '';
    $school_logo = '';
    $postal_address = '';
    $block_muni_corp_type = '';
    $block_muni_corp_name = '';
    $village = '';
    $city = '';
    $country = '';
    $state = '';
    $pincode = '';
    $establish_year = '';
    $school_category = '';
    $medium = '';
    $building_status = '';
    $drinking_water = '';
    $electricity = '';
    $short_url = '';

    // $theme_background_color = '';
    // $sidebar_font_color = '';
    // $name_font_color = '';
    // $address_font_color = '';
    // $phone_font_color = '';
    // $establish_font_color = '';
    // $idcard_session_font_color = '';
    // $staff_idcard_background_color = '';
    // $student_idcard_background_color = '';
    // $icon_color = '';
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
                                    <label class="form-label" for="school_prefix">School Prefix</label>
                                    <input type="text" class="form-control" id="school_prefix" name="school_prefix" required="required" value="<?php echo $school_prefix; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="schoool_code">School Registration No (Govt. provided)</label>
                                    <input type="text" class="form-control" name="schoool_code" id="schoool_code" required="required" value="<?php echo $schoool_code; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="schoool_name">School Name</label>
                                    <input type="text" class="form-control" name="schoool_name" id="schoool_name" required="required" value="<?php echo $schoool_name; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="school_phone">School Phone</label>
                                    <input type="text" class="form-control" name="school_phone" id="school_phone" required="required" value="<?php echo $school_phone; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="hoi_mobile_no">HOI Mobile No</label>
                                    <input type="text" class="form-control" name="hoi_mobile_no" id="hoi_mobile_no" required="required" value="<?php echo $hoi_mobile_no; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="hoi_whatsapp">HOI Whatsapp No</label>
                                    <input type="text" class="form-control" name="hoi_whatsapp" id="hoi_whatsapp" required="required" value="<?php echo $hoi_whatsapp; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="hoi_designation">HOI Designation</label>
                                    <input type="text" class="form-control" name="hoi_designation" id="hoi_designation" required="required" value="<?php echo $hoi_designation; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" required="required" value="<?php echo $email; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="password">Password
                                        <i class="fa fa-eye fa-2x" id="password_hide"></i>
                                        <i class="fa fa-eye-slash fa-2x" id="password_show" style="display: none;"></i>
                                    </label>
                                    <input type="password" class="form-control" name="password" id="password" required="required" value="<?php echo $password; ?>" minlength="6">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="postal_address">Postal Address</label>
                                    <textarea class="form-control" name="postal_address" id="postal_address" required="required"><?php echo $postal_address; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="block_muni_corp_type">Address Type</label>
                                    <select class="js-example-basic-single form-control" id="block_muni_corp_type" name="block_muni_corp_type">
                                        <option value="" selected="selected">Select Address Type</option>
                                        <option value="Block"<?php if($block_muni_corp_type=='Block') { ?> selected="selected"<?php } ?>>Block</option>
                                        <option value="Municipal"<?php if($block_muni_corp_type=='Municipal') { ?> selected="selected"<?php } ?>>Municipal</option>
                                        <option value="Corporation"<?php if($block_muni_corp_type=='Corporation') { ?> selected="selected"<?php } ?>>Corporation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="block_muni_corp_name">Address Type Name</label>
                                    <input type="text" class="form-control" name="block_muni_corp_name" id="block_muni_corp_name" required="required" value="<?php echo $block_muni_corp_name; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="village">Village</label>
                                    <input type="text" class="form-control" name="village" id="village" required="required" value="<?php echo $village; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="country">Country</label>
                                    <select class="js-example-basic-single form-control" id="country" name="country">
                                        <option value="" selected="selected">Select District</option>
                                        <?php                                            
                                        $countries = $moduleDetail['model']->find_data(['name' => 'sms_countries'], 'array', ['published' => 1]);
                                        if($countries) { foreach($countries as $row) { ?>
                                        <option value="<?php echo $row->name; ?>"<?php if($row->name==$country) { ?> selected="selected"<?php } ?>><?php echo $row->name; ?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="state">State</label>
                                    <select class="js-example-basic-single form-control" id="state" name="state">
                                        <option value="" selected="selected">Select State</option>
                                        <?php 
                                        $states = $moduleDetail['model']->find_data(['name' => 'sms_states'], 'array', ['published' => 1]);
                                        if($states) { foreach($states as $row) { ?>
                                        <option value="<?php echo $row->name; ?>"<?php if($row->name==$state) { ?> selected="selected"<?php } ?>><?php echo $row->name; ?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="city">City</label>
                                    <select class="js-example-basic-single form-control" id="city" name="city">
                                        <option value="" selected="selected">Select City</option>
                                        
                                    </select>
                                </div>
                            </div>                            
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="pincode">Pincode</label>
                                    <input type="text" class="form-control" name="pincode" id="pincode" required="required" value="<?php echo $pincode; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="establish_year">Establish Year</label>
                                    <select class="js-example-basic-single form-control" id="establish_year" name="establish_year">
                                        <option value="" selected="selected">Select Establish Year</option>
                                        <?php for($i=1800;$i<date('Y');$i++) { ?>
                                        <option value="<?php echo $i; ?>"<?php if($establish_year==$i) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="school_category">School Category</label>
                                    <select class="js-example-basic-single form-control" id="school_category" name="school_category">
                                        <option value="" selected="selected">Select School Category</option>
                                        <option value="A"<?php if($school_category=='A') { ?> selected="selected"<?php } ?>>A</option>
                                        <option value="B"<?php if($school_category=='B') { ?> selected="selected"<?php } ?>>B</option>
                                        <option value="C"<?php if($school_category=='C') { ?> selected="selected"<?php } ?>>C</option>
                                        <option value="D"<?php if($school_category=='D') { ?> selected="selected"<?php } ?>>D</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="medium">Medium</label>
                                    <select class="js-example-basic-single form-control" id="medium" name="medium">
                                        <option value="" selected="selected">Select Medium</option>
                                        <option value="Bengali"<?php if($medium=='Bengali') { ?> selected="selected"<?php } ?>>Bengali</option>
                                        <option value="Hindi"<?php if($medium=='Hindi') { ?> selected="selected"<?php } ?>>Hindi</option>
                                        <option value="English"<?php if($medium=='English') { ?> selected="selected"<?php } ?>>English</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="building_status">Building Status</label>
                                    <select class="js-example-basic-single form-control" id="building_status" name="building_status">
                                        <option value="" selected="selected">Select Building Status</option>
                                        <option value="Premium"<?php if($building_status=='Premium') { ?> selected="selected"<?php } ?>>Premium</option>
                                        <option value="Good"<?php if($building_status=='Good') { ?> selected="selected"<?php } ?>>Good</option>
                                        <option value="Average"<?php if($building_status=='Average') { ?> selected="selected"<?php } ?>>Average</option>
                                        <option value="Poor"<?php if($building_status=='Poor') { ?> selected="selected"<?php } ?>>Poor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="drinking_water">Drinking Water</label>
                                    <select class="js-example-basic-single form-control" id="drinking_water" name="drinking_water">
                                        <option value="" selected="selected">Select Drinking Water</option>
                                        <option value="1"<?php if($drinking_water==1) { ?> selected="selected"<?php } ?>>YES</option>
                                        <option value="0"<?php if($drinking_water==0) { ?> selected="selected"<?php } ?>>NO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="electricity">Electricity</label>
                                    <select class="js-example-basic-single form-control" id="electricity" name="electricity">
                                        <option value="" selected="selected">Select Electricity</option>
                                        <option value="1"<?php if($electricity==1) { ?> selected="selected"<?php } ?>>YES</option>
                                        <option value="0"<?php if($electricity==0) { ?> selected="selected"<?php } ?>>NO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="short_url">Short Url</label>
                                    <input type="text" class="form-control" name="short_url" id="short_url" required="required" value="<?php echo $short_url; ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="school_logo">School Logo</label>

                                    <div class="input-group mb-2">
                                      <?php if($school_logo!='') { ?>
                                      <img src="<?php echo base_url();?>uploads/school/<?php echo $school_logo; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                      <?php } ?>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">School Logo</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="school_logo" name="school_logo">
                                            <label class="custom-file-label" for="school_logo">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="hoi_signature">HOI Signature</label>

                                    <div class="input-group mb-2">
                                      <?php if($hoi_signature!='') { ?>
                                      <img src="<?php echo base_url();?>uploads/school/<?php echo $hoi_signature; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                      <?php } ?>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">HOI Signature</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="hoi_signature" name="hoi_signature">
                                            <label class="custom-file-label" for="hoi_signature">Choose file</label>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#password_hide').on('click', function() {
            $('#password_hide').hide();
            $('#password_show').show();
            $('#password').attr('type', 'text'); 
        })
        $('#password_show').on('click', function() {
            $('#password_show').hide();
            $('#password_hide').show();
            $('#password').attr('type', 'password'); 
        })
    });
</script>