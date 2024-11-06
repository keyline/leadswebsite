<div class="navbar-wrapper">
    <div class="navbar-content scroll-div ">
        <ul class="nav pcoded-inner-navbar ">
            <!-- Dashboard -->
            <li class="nav-item"><a href="<?php echo base_url('Dashboard'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a></li>
            <!-- Meta Details -->
            <li class="nav-item"><a href="<?php echo base_url('admin/manage_metadetails'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-hash"></i></span><span class="pcoded-mtext">Meta Details</span></a></li>
            <!-- Clients -->
            <li class="nav-item"><a href="<?php echo base_url('admin/Manage_client'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Client</span></a></li>
            <!-- Enquire List -->
            <li class="nav-item"><a href="<?php echo base_url('admin/manage_enquire'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-help-circle"></i></span><span class="pcoded-mtext">Enquiry</span></a></li>

            <!-- Blog -->
            <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Blogs</span></a>
                <ul class="pcoded-submenu">
                    <li><a href="<?= base_url('admin/manage_blog_category/') ?>">Blogs Category</a></li>
                    <li><a href="<?= base_url('admin/manage_blog') ?>">Blogs</a></li>
                </ul>
            </li>

            <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-package"></i></span><span class="pcoded-mtext">Products</span></a>
                <ul class="pcoded-submenu">
                    <li><a href="<?= base_url('admin/manage_product_category/') ?>">Products Category</a></li>
                    <li><a href="<?= base_url('admin/manage_product') ?>">Products</a></li>
                </ul>
            </li>

            <!-- Testimonial -->
            <li class="nav-item"><a href="<?php echo base_url('admin/manage_testimonial'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Testimonial</span></a></li>



            <!-- <li class="nav-item"><a href="<?php echo base_url('admin/manage_footsteps'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-command"></i></span><span class="pcoded-mtext">Footsteps</span></a></li> -->

            <!--<li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Projects</span></a>
                <ul class="pcoded-submenu">
                    <li><a href="<?= base_url('admin/manage_project_category/') ?>">Projects Category</a></li>
                    <li><a href="<?= base_url('admin/manage_project') ?>">Projects</a></li>
                </ul>
            </li>-->

            <!-- <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-package"></i></span><span class="pcoded-mtext">Packages</span></a>
                <ul class="pcoded-submenu">
                    <li><a href="<?= base_url('admin/Manage_package_category') ?>">Package Categories</a></li>
                    <li><a href="<?= base_url('admin/manage_package/') ?>">Packages</a></li>

                </ul>
            </li> -->

            <!-- <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-help-circle"></i></span><span class="pcoded-mtext">Enquire</span></a>
                <ul class="pcoded-submenu">
                    <li><a href="<?= base_url('admin/manage_enquire/') ?>">Package Enquiry</a></li>
                    <li><a href="<?= base_url('admin/manage_enquire/contactsList') ?>">Contact Enquiry</a></li>
                    <li><a href="<?= base_url('admin/manage_enquire/subscribers') ?>">Subscribers</a></li>
                </ul>
            </li> -->

            <!-- <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Testimonial</span></a>
                <ul class="pcoded-submenu">
                    <li><a href="<?= base_url('admin/manage_testimonial/') ?>">Testimonial List</a></li>
                </ul>
            </li> -->

            <!-- <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layers"></i></span><span class="pcoded-mtext">Accreditation</span></a>
                <ul class="pcoded-submenu">
                    <li><a href="<?= base_url('admin/manage_accreditations/') ?>">Accreditation List</a></li>
                </ul>
            </li> -->


            <!-- <li class="nav-item"><a href="<?php echo base_url('admin/manage_pledge_taken/enquiry_form'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Pledge Taken</span></a></li>             -->

            <!-- <li class="nav-item"><a href="<?php echo base_url('admin/manage_newsletter'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Subscriber List</span></a></li>             -->

            <li class="nav-item pcoded-hasmenu">&nbsp;</li>
        </ul>
    </div>
</div>