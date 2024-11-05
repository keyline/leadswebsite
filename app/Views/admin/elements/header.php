<header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue">
    <div class="m-header">
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                <a href="#!" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <!-- <img src="<?php echo base_url('admin/'); ?>/assets/images/logo.png" alt="" class="logo">
                    <img src="<?php echo base_url('admin/'); ?>/assets/images/logo-icon.png" alt="" class="logo-thumb"> -->
                    <?php echo $site_setting->site_name; ?>
                </a>
                <a href="#!" class="mob-toggler">
                    <i class="feather icon-more-vertical"></i>
                </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <!-- <a href="#!" class="pop-search"><i class="feather icon-search"></i></a> 
                <div class="search-bar">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search here">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>-->
            </li>
            <li class="nav-item">
                <a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- <li>
                <div class="dropdown">
                    <a href="<?php echo base_url();?>" target="_blank" class="displayChatbox dropdown-toggle"><i class="icon feather icon-mail"></i><span class="badge bg-success"><span class="sr-only"></span></span>Visit Website</a>
                </div>
            </li> -->
            <!-- <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i>
                        <?php if(count($new_notifications)>0) { ?>
                        <span class="badge bg-danger"><span class="sr-only"></span></span>
                        <?php } ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notifications</h6>
                            <div class="float-right">
                                <a href="#!" class="m-r-10">mark as read</a>
                                <a href="#!">clear all</a>
                            </div>
                        </div>
                        <ul class="noti-body">
                            <li class="n-title">
                                <p class="m-b-0">NEW</p>
                            </li>
                            <?php if($new_notifications) { foreach($new_notifications as $new_notification) { ?>
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="<?php echo base_url('material/'); ?>/front/img/no-image.png" alt="User">
                                    <div class="media-body">
                                        <p><strong><?php echo $new_notification->title; ?></strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>
                                            <?php 
                                            $to_time=date_format(date_create($new_notification->created_at), "Y-m-d H:i:s");
                                            echo $common_model->time_difference($to_time); ?>
                                        </span></p>
                                        <p><?php echo $new_notification->short_description; ?></p>
                                    </div>
                                </div>
                            </li>
                            <?php } } ?>                                        
                        </ul>
                        <div class="noti-footer">
                            <a href="<?php echo base_url('admin/'); ?>/manage_notification">show all</a>
                        </div>
                    </div>
                </div>
            </li> -->                        
            <li>
                <div class="dropdown drp-user">
                    <a href="#!" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- <img src="?php echo base_url(); ?>/uploads/<?php echo $site_setting->site_logo; ?>" class="img-radius" alt="?php echo $site_setting->site_name; ?>"> -->
                        <i class="feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <!-- <img src="?php echo base_url(); ?>/uploads/?php echo $site_setting->site_logo; ?>" class="img-radius" alt="?php echo $site_setting->site_name; ?>"> -->
                            <i class="feather icon-settings"></i>
                            <span><?php echo $session->get('username'); ?></span>
                            <a href="<?php echo base_url('admin/user/logout'); ?>" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="<?php echo base_url('admin/user/site_setting'); ?>" class="dropdown-item"><i class="feather icon-user"></i> Profile Setting</a></li>
                            <!-- <li><a href="<?php echo base_url('admin/user/payment_setting'); ?>" class="dropdown-item"><i class="fa fa-rupee-sign"></i> Payment Setting</a></li> -->
                            <li><a href="<?php echo base_url('admin/user/change_password'); ?>" class="dropdown-item"><i class="feather icon-lock"></i> Change Password</a></li>
                            <li><a href="<?php echo base_url('admin/user/email_setting'); ?>" class="dropdown-item"><i class="feather icon-mail"></i> Email Settings</a></li>
                            <li><a href="<?php echo base_url('admin/user/logout'); ?>" class="dropdown-item"><i class="feather icon-log-out"></i> Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
    <!-- [ Header ] end -->
    
    
    