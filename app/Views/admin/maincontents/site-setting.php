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
                                        <label class="form-label">Site Name</label>
                                        <input type="text" class="form-control" name="site_name" placeholder="Site Name" value="<?php echo $site_setting->site_name; ?>" required="required">
                                    </div>
                                </div>                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="admin_email" placeholder="Email" value="<?php echo $site_setting->admin_email; ?>" required="required">
                                    </div>
                                </div>                                                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Site Address</label>
                                        <textarea class="form-control" name="site_address" ><?php echo $site_setting->site_address; ?></textarea>
                                    </div>
                                </div>                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Site Whatsapp No</label>
                                        <input type="text" class="form-control" name="whatsapp_no" placeholder="Site Whatsapp No" value="<?php echo $site_setting->whatsapp_no; ?>" >
                                    </div>
                                </div>                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Facebook Link</label>
                                        <input type="text" class="form-control" name="facebook_link" placeholder="Facebook Link" value="<?php echo $site_setting->facebook_link; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Twitter Link</label>
                                        <input type="text" class="form-control" name="twitter_link" placeholder="Twitter Link" value="<?php echo $site_setting->twitter_link; ?>">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Linkedin Link</label>
                                        <input type="text" class="form-control" name="linkedin_link" placeholder="Linkedin Link" value="<?php echo $site_setting->linkedin_link; ?>">
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Instagram Link</label>
                                        <input type="text" class="form-control" name="instagram_link" placeholder="Instagram Link" value="<?php echo $site_setting->instagram_link; ?>">
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Youtube Link</label>
                                        <input type="text" class="form-control" name="youtube_link" placeholder="Youtube Link" value="<?php echo $site_setting->youtube_link; ?>">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">PInterest Link</label>
                                        <input type="text" class="form-control" name="pinterest_link" placeholder="PInterest Link" value="<?php echo $site_setting->pinterest_link; ?>">
                                    </div>
                                </div> -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php if($site_setting->site_logo!='') { ?>
                                            <img src="<?php echo base_url();?>/uploads/<?php echo $site_setting->site_logo; ?>" alt="<?php echo $site_setting->site_name; ?>" style="height: 150px;" class="img-fluid img-thumbnail">
                                            <br><br>
                                        <?php } ?>
                                        <label class="form-label">Site Logo</label>
                                        <div>
                                            <input type="file" class="validation-file" name="site_logo">
                                        </div>
                                        <?php if($session->getFlashdata('msg1')) { ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Error!</strong> <?php echo $session->getFlashdata('msg1');?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        ?php if($site_setting->site_footer_logo!='') { ?>
                                            <img src="?php echo base_url();?>/uploads/?php echo $site_setting->site_footer_logo; ?>" alt="?php echo $site_setting->site_name; ?>" style="height: 150px;" class="img-fluid img-thumbnail">
                                            <br><br>
                                        ?php } ?>
                                        <label class="form-label">Site Footer Logo</label>
                                        <div>
                                            <input type="file" class="validation-file" name="site_footer_logo">
                                        </div>
                                        ?php if($session->getFlashdata('msg3')) { ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Error!</strong> ?php echo $session->getFlashdata('msg3');?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                        ?php } ?>
                                    </div>
                                </div> -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php if($site_setting->site_favicon!='') { ?>
                                            <img src="<?php echo base_url();?>/uploads/<?php echo $site_setting->site_favicon; ?>" alt="<?php echo $site_setting->site_name; ?>" style="height: 150px;" class="img-fluid img-thumbnail">
                                            <br><br>
                                        <?php } ?>
                                        <label class="form-label">Site Favicon</label>
                                        <div>
                                            <input type="file" class="validation-file" name="site_favicon">
                                        </div>
                                        <?php if($session->getFlashdata('msg2')) { ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Error!</strong> <?php echo $session->getFlashdata('msg2');?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn  btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- [ Form Validation ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>