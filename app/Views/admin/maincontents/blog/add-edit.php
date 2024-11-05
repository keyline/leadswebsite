<?php
if ($row) {
    $blog_category  = $row->blog_category;
    $title          = $row->title;
    $content_date   = $row->content_date;
    $description    = $row->description;
    $image          = $row->image;
    $metaDescription = $row->meta_description;
    $metaKeyword    = $row->meta_keyword;
    $metaTitle      = $row->meta_title;
    $shortDescription = $row->short_description;
    $slug           = $row->slug;
    $blogContents   = $blogContents;
} else {
    $blog_category  = set_value('blog_category', '');
    $title          = set_value('title', '');
    $content_date   = set_value('content_date', '');
    $description    = set_value('description', '');
    $image          = set_value('image', '');
    $metaDescription = set_value('meta_description', '');
    $metaKeyword    = set_value('meta_keyword', '');
    $metaTitle      = set_value('meta_title', '');
    $shortDescription = set_value('short_description', '');
    $slug           = set_value('slug', '');
    $blogContents   = [];
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="blog_category">Category <span class="text-danger">*</span> </label>
                                    <select class="js-example-basic-single form-control" id="blog_category" name="blog_category" required="required">
                                        <option value="" selected="selected">Select Category</option>
                                        <?php
                                        if ($blogCats) {
                                            $i = 1;
                                            foreach ($blogCats as $row) { ?>
                                                <option value="<?= $row->id; ?>" <?php if ($blog_category == $row->id) { ?> selected="selected" <?php } ?>><?= $row->name; ?></option>
                                        <?php  }
                                        } ?>
                                    </select>
                                    <?php if (session('errors.blog_category')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.blog_category')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="content_date">Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="content_date" id="content_date" placeholder="" value="<?php echo $content_date; ?>" required="required">
                                    <?php if (session('errors.content_date')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.content_date')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="" required="required" value="<?php echo $title; ?>">
                                    <?php if (session('errors.title')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.title')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="slug">Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="slug" id="slug" placeholder="" required="required" value="<?= $slug ?>">
                                    <?php if (session('errors.slug')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.slug')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="Summary">Summary <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="short_description" id="Summary" placeholder="" required="required" rows="5"><?= $shortDescription ?></textarea>
                                    <?php if (session('errors.short_description')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.short_description')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="description">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control ckeditor" name="description" id="description" placeholder="" required="required"><?php echo $description; ?></textarea>
                                    <?php if (session('errors.description')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.description')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="image">Image <span class="text-danger">*</span></label>
                                    <div class="input-group mb-2">
                                        <?php if ($image != '') { ?>
                                            <img src="<?php echo base_url(); ?>/uploads/blogs/<?php echo $image; ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;" />
                                        <?php } ?>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="image" name="image" <?php if ($action == 'Add') { ?>required<?php } ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="" value="<?= $metaTitle ?>">
                                    <?php if (session('errors.meta_title')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.meta_title')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="meta_Keyword">Meta Keyword</label>
                                    <input type="text" class="form-control" name="meta_keyword" id="meta_Keyword" placeholder="" value="<?= $metaKeyword ?>">
                                    <?php if (session('errors.meta_keyword')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.meta_keyword')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="meta_description">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description" placeholder="" rows="5"><?= $metaDescription ?></textarea>
                                    <?php if (session('errors.meta_description')): ?>
                                        <div class="error text-danger"><?= esc(session('errors.meta_description')) ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>


                        <!-- ___________ Blog Contents ____________ -->
                        <br>
                        <label for="" class="col-md-4 col-lg-3 col-form-label">Blog Contents</label>

                        <!-- Blog Contents -->
                        <div class="field_wrapper1">
                            <?php if (count($blogContents)) {
                                $key = 0;
                                foreach ($blogContents as $content) {
                                    $key++;
                            ?>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="meta_title">Table Of Contents <span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="content[]" placeholder="" required="required" rows="2"><?= $content->table_of_content ?></textarea>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="meta_Keyword">Summary <span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="summary[]" placeholder=""  rows="2"><?= $content->summary ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label class="form-label" for="meta_description">Content <span class="text-danger">*</span>
                                                </label>
                                                <textarea class="form-control ckeditor" name="content_description[]" id="meta_description<?= $key ?>" placeholder="" required="required" rows="5"><?= $content->content ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-1" style="margin-top: 25px;">
                                            <a href="javascript:void(0);" class="remove_button1" title="Remove field"><i class="fa fa-minus-circle fa-2x text-danger"></i></a>
                                        </div>

                                    </div>

                            <?php }
                            } ?>

                            <!-- 1st row -->
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="meta_title">Table Of Contents <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="content[]" placeholder="" required="required" rows="2"></textarea>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="meta_Keyword">Summary <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="summary[]" placeholder=""  rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label class="form-label" for="meta_description">Content <span class="text-danger">*</span>
                                        </label>
                                        <textarea class="form-control ckeditor" name="content_description[]" id="meta_description" placeholder="" required="required" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a href="javascript:void(0);" class="add_button1" title="Add field"><i class="fa fa-plus-circle fa-2x text-success"></i></a>
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


<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button1'); //Add button selector
        var wrapper = $('.field_wrapper1'); //Input field wrapper
        var fieldHTML = `<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="meta_title">Table Of Contents <span class="text-danger">*</span></label>
                                         <textarea class="form-control" name="content[]" placeholder="" required="required" rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="meta_Keyword">Summary <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="summary[]" placeholder=""  rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label class="form-label" for="meta_description">Content <span class="text-danger">*</span>
                                        </label>
                                        <textarea class="form-control ckeditor" name="content_description[]" id="meta_description" placeholder="" required="required" rows="5"></textarea>
                                    </div>
                                </div>
                             

                                <div class="col-md-1" style="margin-top: 25px;">
                                    <a href="javascript:void(0);" class="remove_button1" title="Remove field"><i class="fa fa-minus-circle fa-2x text-danger"></i></a>
                                </div>

                            </div>`; //New input field html 
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
                CKEDITOR.replace('meta_description' + x);
            } else alert(`max ${maxField} blog content can be create`);
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button1', function(e) {
            e.preventDefault();
            $(this).parent('div').parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
<?= $this->endSection() ?>