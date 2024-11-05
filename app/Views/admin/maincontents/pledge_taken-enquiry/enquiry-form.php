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
                    <a target="_blank" href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/download_csv" class="btn btn-success">Downlaod CSV</a>
                </h5>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered wrap">
                                <thead>
                                    <tr>
                                        <th class="admin-select-none" style="width: 168.163px;"><a href="javascript:selectToggle(selete);" id="show"
                                            onclick="checkALL();">Select All</a> |<br><a
                                            href="javascript:selectToggle(unselect);" id="hide"
                                            onclick="unCheckALL();">Deselect All</a>
                                        </th>
                                        <th>#</th>
                                        <th>Name<br>DOB<br>Gender</th>                                         
                                        <th>Email<br>Phone Number</th>
                                        <th>Language</th>
                                        <th>State<br>District<br>Pincode</th>                
                                        <th>Certificate</th> 
                                        <th>Created date</th>                         
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($rows) { $i=1; foreach($rows as $row) { ?>
                                    <tr>
                                        <td>
                                            <input type='checkbox' name='draw[]' value="<?php echo $row->id ?>" id="required-checkbox1" onClick="CheckIfChecked()">
                                        </td>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row->name; ?><br><?php echo $row->dob;?><br><?php echo $row->gender;?></td>                                        
                                        <td><?php echo $row->email; ?><br><?php echo $row->phone; ?></td>
                                        <td><?php echo $row->language;?></td>
                                        <td><?php echo $row->state;?><br><?php echo $row->district;?><br><?php echo $row->pincode;?></td>
                                        <td>
                                        <?php if($row->certificate_url!='') { ?>
                                          <!-- <img src="?=base_url('/uploads/career/'.$row->image)?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  /> -->
                                          <a href="<?= base_url('/uploads/certificate/'.$row->certificate_url) ?>" target="blank" class="fas fa-eye" style='color:green'> View Certificate</a>
                                        <?php } ?>     
                                        </td>
                                        <td><?php echo $row->created_at;?></td> 
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