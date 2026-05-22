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
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Images</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image_file" name="image_file[]" multiple required />
                                <label class="custom-file-label" for="image_file">Choose file</label>
                            </div>
                        </div>
                        <button type="submit" class="btn  btn-primary">Submit</button>
                    </form>

                    <div class="row">
                        <?php if($rows){ foreach($rows as $row){?>
                        <div class="col-md-2 mb-3">
                            <img src="<?=base_url('/uploads/editor_images/'.$row->image_file)?>" class="img-thumbnail" style="width:100px; height: 100px;">
                            <input type="hidden" id="myInput<?=$row->id?>" value="<?=base_url('/uploads/editor_images/'.$row->image_file)?>">
                            <a href="javascript:void(0);" id="copyButton<?=$row->id?>" class="btn btn-info btn-sm" onclick="myFunction(<?=$row->id?>)">Copy Image Link</a>
                        </div>
                        <?php } }?>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>

<script type="text/javascript">    
    function myFunction(param) {      
        /* Get the text field */
        var copyText = document.getElementById("myInput"+param);

        /* Select the text field */
        copyText.select();      

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);
      
        /* Alert the copied text */
        alert("Copied the text: " + copyText.value);
    }
</script>