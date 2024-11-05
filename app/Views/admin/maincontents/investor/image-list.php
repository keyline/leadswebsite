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
                    <form method="POST" action="">
                        <input type="hidden" name="mode" value="bulklead">
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Bulk Delete</button>
                    <div class="dt-responsive table-responsive"> <!-- id="simpletable" -->
                        <table class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>#<br>
                                        <input type="checkbox" id="checkAll">
                                    </th>
                                    <th>Investor Title</th>                                                                       
                                    <th>Pdf</th>
                                    <th>Rank</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($rows) { $i=1; foreach($rows as $row) { ?>
                                <tr>
                                    <td>
                                        <?php echo $i++; ?><br>
                                        <input type="checkbox" class="checkItem" name="image_id[]" value="<?php echo $row->id; ?>">
                                    </td>
                                    <td><?php echo $row->title; ?></td>                                                                      
                                    <td>                                        
                                        <?php if($row->pdf!='') { ?>
                                          <!-- <img src="?=base_url('/uploads/projects_process/'.$row->pdf)?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  /> -->
                                          <a href="<?= base_url('/uploads/investor/'.$row->pdf) ?>" target="blank" class="fas fa-eye" style='color:green'> View pdf</a>
                                        <?php } ?>
                                    </td>
                                    <td><?=$row->rank?></td>
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
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>            
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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

    $(document).ready(function(){
        $("#checkAll").click(function () {
            $('.checkItem').not(this).prop('checked', this.checked);
        });
    });
</script>