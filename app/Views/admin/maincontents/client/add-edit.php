<?php
if ($row) {
    $client_type           = $row->client_type;
    $client_name           = $row->client_name;
    $client_logo           = $row->client_logo;
} else {
    $client_type           = set_value('client_type', '');
    $client_name           = set_value('client_name', '');
    $client_logo           = set_value('client_logo', '');
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
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="partner_type">Client Type</label>
                                    <select class="js-example-basic-single form-control" id="partner_type" name="client_type">
                                        <option value="" selected="selected">Select Client Type</option>
                                        <option value="CORPORATES"<?php if ($client_type == 'CORPORATES') { ?> selected="selected"<?php } ?>>CORPORATES</option>
                                        <option value="INDIVIDUALS"<?php if ($client_type == 'INDIVIDUALS') { ?> selected="selected"<?php } ?>>INDIVIDUALS</option>
                                    </select>
                                </div>
                            </div> -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="partner_name">Client Name</label>
                                    <input type="text" class="form-control" name="client_name" id="partner_name" placeholder="Client Name" value="<?php echo $client_name; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="partner_logo">Client Logo</label>
                                    <div class="input-group mb-2">
                                        <?php if ($client_logo != '') { ?>
                                            <img src="<?php echo base_url(); ?>/uploads/client/<?php echo $client_logo; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;" />
                                        <?php } ?>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Client Logo</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="client_logo" name="client_logo" accept="image/jpeg,image/gif,image/png">
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