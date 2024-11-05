<?php
if($row) {
    $small_text             = $row->small_text;
    $big_text               = $row->big_text;
    $rank                   = $row->rank;
    $banner_image           = $row->banner_image;
} else {
    $small_text             = set_value('small_text', '');
    $big_text               = set_value('big_text', '');
    $rank                   = set_value('rank', '');
    $banner_image           = set_value('banner_image', '');
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">First Text</label>
                                    <textarea class="form-control" name="small_text" id="small_text" placeholder="First Text" required="required"><?php echo $small_text; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="big_text">Second Text</label>
                                    <textarea class="form-control ckeditor" name="big_text" id="big_text" placeholder="First Text" required="required"><?php echo $big_text; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="rank">Rank</label>
                                    <select class="form-control" name="rank" id="rank" required="required">
                                        <option value="" selected>Select Rank</option>
                                        <?php for($i=1; $i<=10; $i++){?>
                                        <option value="<?=$i?>" <?=(($i == $rank)?'selected':'')?>>Rank <?=$i?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="banner_image">Banner Image</label>
                                    <div class="input-group mb-2">
                                      <?php if($banner_image!='') { ?>
                                      <img src="<?php echo base_url();?>/uploads/banners/<?php echo $banner_image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:200px;"  />
                                      <?php } ?>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Banner Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="banner_image" name="banner_image">
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