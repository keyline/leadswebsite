<div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10"><?php echo $page_header; ?></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/user"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!"><?php echo $page_header; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Form Validation ] start -->
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
                                        <label class="form-label">Form Email</label>
                                        <input type="text" name="from_email" class="form-control" placeholder="From Email" id="from_email" value="<?= $site_setting->from_email ?>" required="required">
                                        <!-- <input type="text" class="form-control" name="site_name" placeholder="Site Name" value="<?php echo $site_setting->site_name; ?>" > -->
                                    </div>
                                </div>                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">From Name</label>
                                        <input type="text" name="from_name" class="form-control" placeholder="From Name" id="from_name" value="<?= $site_setting->from_name ?>" required="required">
                                        <!-- <input type="text" class="form-control" name="admin_email"  value="<?php echo $site_setting->admin_email; ?>" required="required"> -->
                                    </div>
                                </div>                                                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">SMTP Host</label>
                                        <input type="text" name="smtp_host" class="form-control" placeholder="SMTP Host" id="smtp_host" value="<?= $site_setting->smtp_host ?>" required="required">
                                        <!-- <textarea class="form-control" name="site_address" ><?php echo $site_setting->site_address; ?></textarea> -->
                                    </div>
                                </div>                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">SMTP Username</label>
                                        <input type="text" name="smtp_username" class="form-control" id="smtp_username" placeholder="SMTP Username" value="<?= $site_setting->smtp_username ?>" required="required">
                                        <!-- <input type="text" class="form-control" name="whatsapp_no" placeholder="Site Whatsapp No" value="<?php echo $site_setting->whatsapp_no; ?>" > -->
                                    </div>
                                </div>                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">SMTP Password</label>
                                        <input type="text" name="smtp_password" class="form-control" placeholder="SMTP Password" id="smtp_password" value="<?= $site_setting->smtp_password ?>" required="required">
                                        <!-- <input type="text" class="form-control" name="facebook_link" placeholder="Facebook Link" value="<?php echo $site_setting->facebook_link; ?>"> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">SMTP Port</label>
                                        <input type="text" name="smtp_port" class="form-control" id="smtp_port" placeholder="SMTP Port" value="<?= $site_setting->smtp_port ?>" required="required">
                                        <!-- <input type="text" class="form-control" name="twitter_link" placeholder="Twitter Link" value="<?php echo $site_setting->twitter_link; ?>"> -->
                                    </div>
                                </div>                                                                
                            </div>
                            <button type="submit" class="btn  btn-primary">Submit</button>
                        </form>
                        <br><br>
                        <p><a href="<?=base_url('admin/user/test_email')?>" class="btn btn-success btn-sm">Test Email</a></p>
                    </div>
                </div>
            </div>
            <!-- [ Form Validation ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>