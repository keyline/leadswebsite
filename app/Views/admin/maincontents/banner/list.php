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
                    <h5>
                        <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/add" class="btn btn-success">Add <?php echo $moduleDetail['module']; ?></a>
                    </h5>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th class="admin-select-none"><a href="javascript:selectToggle(selete);" id="show"
                                            onclick="checkALL();">Select All</a> | <a
                                            href="javascript:selectToggle(unselect);" id="hide"
                                            onclick="unCheckALL();">Deselect All</a>
                                        </th>
                                        <th>#</th>
                                        <th>First Text</th>
                                        <th>Second Text</th>
                                        <th>Rank</th>
                                        <th>Banner Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($rows) { $i=1; foreach($rows as $row) { ?>
                                    <tr>
                                        <td>
                                            <input type='checkbox' name='draw[]' value="<?php echo $row->id ?>" id="required-checkbox1" onClick="CheckIfChecked()">
                                        </td>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row->small_text; ?></td>
                                        <td><?php echo wordwrap($row->big_text,30,"<br>\n"); ?></td>
                                        <td><?php echo $row->rank; ?></td>
                                        <td>
                                            <?php if($row->banner_image!='') { ?>
                                            <img src="<?=base_url('/uploads/banners/'.$row->banner_image)?>" class="img-responsive img-thumbnail" style="height:100px; width:200px;"  />
                                            <?php } ?>                                        
                                        </td>
                                        <td>
                                            <?php $primary_key = $moduleDetail['primary_key']; ?>
                                            <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/edit/<?php echo $row->$primary_key; ?>" class="btn  btn-icon btn-primary" title="Edit"><i class="feather icon-edit"></i></a>
                                            
                                            <button type="button" class="btn btn-danger" onclick="sweet_multiple('<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/confirm_delete/<?php echo $row->$primary_key; ?>');"><i class="feather icon-trash"></i></button>

                                            <?php if($row->published) { ?>
                                                <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/deactive/<?php echo $row->$primary_key; ?>" class="btn  btn-icon btn-success" title="Active"><i class="feather icon-check-circle"></i></a>
                                            <?php } else { ?>
                                                <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/active/<?php echo $row->$primary_key; ?>" class="btn  btn-icon btn-warning" title="Deactive"><i class="feather icon-slash"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>                                    
                                    <?php } } ?>
                                </tbody>
                                <div id="first_button" style="display:none; " margin-bottom: -6px;>
                                        <p align="left"><button type="submit" class="btn btn-danger" name="save">DELETE</button></p>
                                </div>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>            
    </div>
</div>
<script type="text/javascript">
    function sweet_multiple(url) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = url;
                swal("Poof! Your data has been deleted!", {
                    icon: "success",
                });
            } else {
                swal("Your data is safe!", {
                    icon: "error",
                });
            }
        });
    }
</script>

<script>

function checkALL() {
    var chk_arr = document.getElementsByName("draw[]");
    for (k = 0; k < chk_arr.length; k++) {
        chk_arr[k].checked = true;
    }
    CheckIfChecked();
}

function unCheckALL() {
    var chk_arr = document.getElementsByName("draw[]");
    for (k = 0; k < chk_arr.length; k++) {
        chk_arr[k].checked = false;
    }
    CheckIfChecked();
}


function checkAny() {
    var chk_arr = document.getElementsByName("draw[]");
    for (k = 0; k < chk_arr.length; k++) {
        if (chk_arr[k].checked == true) {
            return true;
        }
    }
    return false;
}

function isCheckAll() {
    var chk_arr = document.getElementsByName("draw[]");
    for (k = 0; k < chk_arr.length; k++) {
        if (chk_arr[k].checked == false) {
            return false;
        }
    }
    return true;
}

function showFirstButton() {
    document.getElementById('first_button').style.display = "block";
}

function hideFirstButton() {
    document.getElementById('first_button').style.display = "none";
}

function CheckIfChecked() {
    checkAny() ? showFirstButton() : hideFirstButton();
    isCheckAll() ? showSecondButton() : hideSecondButton();
}
</script>