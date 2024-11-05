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
                        <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/image_add/<?=$project->id?>" class="btn btn-success">Add <?php echo $moduleDetail['module']; ?> Gallery Image</a>
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
                                    <th>Image</th>
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
                                    <td>                                        
                                        <?php if($row->image_file!='') { ?>
                                          <img src="<?=base_url('/uploads/gallery/'.$row->image_file)?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                        <?php } ?>
                                    </td>
                                    <td><?=$row->rank?></td>
                                    <td>
                                        <?php $primary_key = $moduleDetail['primary_key']; ?>
                                        <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/image_edit/<?php echo $row->project_id; ?>/<?php echo $row->id; ?>" class="btn  btn-icon btn-primary" title="Edit"><i class="feather icon-edit"></i></a>
                                        
                                        <button type="button" class="btn btn-danger" onclick="sweet_multiple('<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/image_delete/<?php echo $row->project_id; ?>/<?php echo $row->id; ?>');"><i class="feather icon-trash"></i></button>

                                        <?php if($row->published) { ?>
                                            <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/image_deactive/<?php echo $row->project_id; ?>/<?php echo $row->id; ?>" class="btn  btn-icon btn-success" title="Active"><i class="feather icon-check-circle"></i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/image_active/<?php echo $row->project_id; ?>/<?php echo $row->id; ?>" class="btn  btn-icon btn-warning" title="Deactive"><i class="feather icon-slash"></i></a>
                                        <?php } ?>
                                        <br><br>
                                        <!-- ?php if($row->is_home_page) { ?>
                                            <a href="?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/image_hide_from_home_page/<?php echo $row->project_id; ?>/<?php echo $row->id; ?>" class="btn  btn-icon btn-success" title="Active"><i class="feather icon-check-circle"></i> Show On Home Page</a>
                                        ?php } else { ?>
                                            <a href="?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/image_show_from_home_page/<?php echo $row->project_id; ?>/<?php echo $row->id; ?>" class="btn  btn-icon btn-danger" title="Deactive"><i class="feather icon-slash"></i> Hide From Home Page</a>
                                        ?php } ?> -->
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