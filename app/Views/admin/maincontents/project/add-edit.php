<?php
if($row) {
    $id                          = $row->id;
    $project_category  = $row->project_category;
    $title          = $row->title;
    $content_date   = $row->content_date;
    $description    = $row->description;
    $image          = $row->image;
    // $image_file     = $row->image_file;
} else {
    $project_category  = set_value('project_category', '');
    $title          = set_value('title', '');
    $content_date   = set_value('content_date', '');
    $description    = set_value('description', '');
    $image          = set_value('image', '');
    // $image_file     = set_value('image_file', '');
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
                            <h5 class="m-b-10"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>/manage_image" target="_blank">Upload Images</a></h5>
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="blog_category">Category</label>
                                        <select class="js-example-basic-single form-control" id="blog_category" name="project_category" required="required">
                                            <option value="" selected="selected">Select Category</option>
                                             <?php
                                             if($projectCats){ $i=1; foreach ($projectCats as $row) {?>
                                            <option value="<?=$row->id; ?>"<?php if($project_category==$row->id) { ?> selected="selected"<?php } ?>><?=$row->name;?></option>
                                            <?php  }} ?>
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <textarea class="form-control" name="title" id="title" placeholder="Title" required="required" rows="5"><?php echo $title; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="content_date">Date</label>
                                        <input type="date" class="form-control" name="content_date" id="content_date" placeholder="Title" value="<?php echo $content_date; ?>" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Main Image</label>
                                        <div class="input-group mb-2">
                                          <?php if($image!='') { ?>
                                          <img src="<?php echo base_url();?>/uploads/projects/<?php echo $image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                          <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/delete_image/<?php echo $id; ?>" title="delete_image"><i class="feather icon-x-square"></i></a>
                                          <?php }else { ?>
                                            <img src="<?=base_url('/uploads/project.png')?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;border-radius: 50%;"  />
                                        <?php }  ?> 
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Image</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="image" name="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea class="form-control ckeditor" name="description" id="description" placeholder="Description" required="required"><?php echo $description; ?></textarea>
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