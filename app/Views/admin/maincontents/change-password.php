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
                        <h5>Form Validation</h5>

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
                                        <label class="form-label">Old Password</label>
                                        <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password" required="required">
                                        <span class="badge badge-success" id="old-pass-success"></span>
                                        <span class="badge badge-danger" id="old-pass-error"></span>
                                    </div>
                                </div>                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required="required">
                                        <span class="badge badge-danger" id="new-pass-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required="required">
                                        <span class="badge badge-danger" id="confirm-pass-error"></span>
                                        <span class="badge badge-success" id="confirm-pass-success"></span>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#new_password').on('blur', function() {
                var new_password = $('#new_password').val();
                if(new_password=='') {
                    $('#new-pass-error').text('Enter new password');
                    $('#new-pass-error').delay(5000).fadeOut();
                }
            })

            $('#confirm_password').on('blur', function() {
                var new_password = $('#new_password').val();
                var confirm_password = $('#confirm_password').val();                
                if(confirm_password=='') {
                    $('#confirm-pass-error').text('Enter confirm password');
                    $('#confirm-pass-error').delay(5000).fadeOut();
                } else {
                    if(new_password!=confirm_password) {
                        $('#confirm-pass-error').text('New & confirm password does not matched');
                        $('#confirm-pass-error').delay(5000).fadeOut();
                        $('#new_password').val('');
                        $('#confirm_password').val('');
                    } else {
                        $('#confirm-pass-success').text('New & confirm password matched');
                        $('#confirm-pass-success').delay(5000).fadeOut();
                    }
                }
            })

            $('#old_password').on('blur', function() {
                var old_password = $('#old_password').val();
                $.post({
                    url:'<?php echo base_url();?>/admin/user/check_old_password',
                    dataType: 'JSON',
                    data: { old_password:old_password }
                })
                .done(function(rply) {
                    if(rply.status==1) {
                        $('#old-pass-success').text(rply.return_msg);
                        $('#old-pass-success').delay(5000).fadeOut();
                    } else {
                        $('#old-pass-error').text(rply.return_msg);
                        $('#old-pass-error').delay(5000).fadeOut();
                        $('#old_password').val('');
                    }
                })
                .fail(function(rply, txtsts) {
                    //
                });
            });
        });
    </script>