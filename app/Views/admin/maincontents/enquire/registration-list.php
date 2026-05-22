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
                                    <th>Address</th>
                                    <th>Product</th>
                                    <th>Model Number</th>
                                    <th>Serial Number</th>
                                    <th>Purchase Date</th>
                                    <th>Purchase Place</th>
                                    <th>Invoice Number </th>
                                    <th>Invoice</th>
                                    <th>barcode</th>
                                    <th>Time</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if ($rows) {
                                    $i = 1;
                                    foreach ($rows as $row) {
                                        $invoice = $row->purchase_invoice_file ? base_url() . '/uploads/purchase_invoice/' . $row->purchase_invoice_file : '';
                                        $barcode = $row->purchase_invoice_file ? base_url() . '/uploads/barcode_photo/' . $row->barcode_photo_file : '';
                                        $invoice_html = '<a href="' . $invoice . '" target="_blank" rel="invoice">Invoice</a>';
                                        $barcode_html = '<a href="' . $barcode . '" target="_blank" rel="invoice">Barcode</a>';
                                ?>



                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><small><?= $row->full_name ?></small></td>
                                            <td> <small><?= $row->email_address; ?> <br> <?= $row->phone_number; ?></small> </td>

                                            <td> <small>
                                                    <?= $row->street_address ?? ''; ?> <br>
                                                    <?= $row->city ?? ''; ?> <br>
                                                    <?= $row->state ?? ''; ?> <br>
                                                    <?= $row->zip_code ?? ''; ?> <br>
                                                    <?= $row->country ?? ''; ?> <br>
                                                </small> </td>


                                            <td> <small><?= $row->product_name ?? ''; ?></small> </td>
                                            <td> <small><?= $row->model_number ?? ''; ?></small> </td>
                                            <td> <small><?= $row->serial_number ?? ''; ?></small> </td>
                                            <td> <small><?= $row->date_of_purchase ?? date('jS M Y', strtotime($row->date_of_purchase)) ?></small> </td>
                                            <td> <small><?= $row->place_of_purchase ?? ''; ?></small> </td>
                                            <td> <small><?= $row->invoice_number ?? ''; ?></small> </td>
                                            <td> <small><?= $invoice != '' ? $invoice_html : '' ?></small> </td>
                                            <td> <small><?= $barcode != '' ? $barcode_html : '' ?></small> </td>
                                            <td><small><?= date('d-m-y  -  h:m a', strtotime($row->added_on));  ?></small></td>

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