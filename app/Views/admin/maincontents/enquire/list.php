<?php
$isAMC = ($moduleDetail['controller'] == 'manage_amc_enquire');
$isDistributorEnquiry = ($moduleDetail['controller'] == 'manage_distributor_enquire');




// pr($moduleDetail['controller']);
?>
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
                    <h5>
                        <!-- <a href="<?php /* echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; */ ?>/add" class="btn btn-success">Add <?php /* echo $moduleDetail['module']; */ ?></a> -->
                        <a target="_blank" href="<?= base_url() . '/admin/' . $moduleDetail['controller'] . '/download_csv' ?>" class="btn btn-success">Export</a>

                    </h5>
                </div>

                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email & Number</th>
                                    <?php if ($isAMC) { ?>
                                        <th>Product</th>
                                    <?php } ?>
                                    <?php if ($isDistributorEnquiry) { ?>
                                        <th>Product Interest</th>
                                    <?php } ?>
                                    <th>massage </th>
                                    <th>Enquire Date</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if ($rows) {                                    
                                    echo $apikey1 = array_search(2, array_column($productcat, 'id')) ;
                                    // pr($productcat);
                                    echo $productcat[$apikey1]['name'];
                                    $i = 1;
                                    foreach ($rows as $row) {
                                ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><small><?= $row->name ?></small></td>
                                            <td> <small><?= $row->email; ?> <br> <?= $row->phone; ?></small> </td>
                                            <?php if ($isAMC) { ?>
                                                <td> <small><?= $row->product_name; ?></small> </td>
                                            <?php } ?>
                                            <?php if ($isDistributorEnquiry) {
                                                $productcat_id = $row->product_interest;
                                                
                                                 ?>
                                                <td> <small></small> </td>
                                            <?php } ?>
                                            <td> <small><?= $row->comment; ?></small> </td>
                                            <td><small><?= date('jS M Y', strtotime($row->created_at));  ?></small></td>

                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>