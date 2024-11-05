<?php
if($row) {
    $title                     = $row->title;
    $pdf                     = $row->pdf;
    $rank                           = $row->rank;
} else {
    $title                     = set_value('title', '');
    $pdf                     = set_value('pdf', '');
    $rank                           = set_value('rank', '');
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
                        <!-- <h5 class="m-b-10"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>/manage_image" target="_blank">Upload Images</a></h5> -->
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/user"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>">Manage <?php echo $moduleDetail['module']; ?></a></li>
                        <!-- <li class="breadcrumb-item"><a href="?php echo base_url('admin/'); ?>/?php echo $moduleDetail['controller']; ?>/image_list/?=$project->id?>">Manage ?php echo $moduleDetail['module']; ?> Gallery Image</a></li> -->
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
                                    <label class="form-label" for="title">Investor Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" required="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Pdf Upload</label>
                                        <div class="input-group mb-2">
                                          <?php if($pdf!='') { ?>
                                          <!-- <img src="?php echo base_url();?>/uploads/projects_process?php echo $pdf; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  /> -->
                                          <a href="<?= base_url();?>/uploads/investor/<?php echo $pdf; ?>" target="blank" class="fas fa-eye" style='color:green'> View pdf</a>
                                          <?php } ?>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Pdf Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="pdf" name="pdf" <?php if($action == 'Add'){?>required<?php }?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="rank">Rank</label>
                                    <select class="form-control" name="rank" id="rank" required="required">
                                        <option value="" selected>Select Rank</option>
                                        <?php for($r=1;$r<=100;$r++){?>
                                        <option value="<?=$r?>" <?=(($rank == $r)?'selected':'')?>>Rank <?=$r?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="form-group">
                                    <p class="form-label">Is Show In Home Page</p>
                                    <input type="radio" name="is_home_page" id="is_home_page1" value="1" required="required" ?=(($is_home_page == 1)?'checked':'')?>> <label for="is_home_page1">YES</label>
                                    <input type="radio" name="is_home_page" id="is_home_page2" value="0" required="required" ?=(($is_home_page == 0)?'checked':'')?>> <label for="is_home_page2">NO</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label" for="image_description">Image Description</label>
                                    <textarea class="form-control" name="image_description" id="image_description" placeholder="Image Description">?php echo $image_description; ?></textarea>
                                </div>
                            </div> -->
                            
                        </div>
                        <button type="submit" class="btn  btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // image size & limit validation
        $('#image_file').on('change', function() {            
            if (this.files) {                
                var filesAmount = this.files.length;
                if(filesAmount <= 5){
                    for (i = 0; i < filesAmount; i++) {
                        var imageSize = this.files[i].size / 1024;
                        if(imageSize <= 2000){
                            $('#image-error').hide();
                            return true;
                        } else {
                            $('#image-error').html('Image File Needs To Be Within 2 MB !!!').delay(5000).fadeOut();
                            $('#image_file').val('');
                            return false; 
                        }
                    }
                } else {
                    $('#image-error').html('You Can Upload Upto Five (5) Images At A Time !!!').delay(5000).fadeOut();
                    $('#image_file').val('');
                    return false;
                }                
            }
        });
    });
</script>