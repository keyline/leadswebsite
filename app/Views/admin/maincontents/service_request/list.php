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
                        <!-- <a target="_blank" href="<?= base_url() . '/admin/manage_enquire/download_csv' ?>" class="btn btn-success">Export</a> -->

                    </h5>
                </div>

                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>address</th>
                                    <th>phone </th>
                                    <th>products</th>
                                    <th>model</th>
                                    <th>serial No</th>
                                    <th>Installation date</th>
                                    <th>Purchase date</th>
                                    <th>Dealer name</th>
                                    <th>Dealer phone</th>
                                    <th>Massage</th>
                                    <th>Interested</th>
                                    <th>Request date</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if ($rows) {
                                    $i = 1;
                                    foreach ($rows as $row) {
                                ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><small><?= $row->name ?></small></td>
                                            <td>
                                                <small><?= $row->address; ?>
                                                    <br> <?= $row->landmark ?? ''; ?>
                                                    <br> <?= $row->district ?? ''; ?>
                                                    <br> <?= $row->state ?? ''; ?>
                                                </small>
                                            </td>
                                            <td> <small><?= $row->phone; ?></small> </td>
                                            <td> <small><?= $row->products; ?></small> </td>
                                            <td><small><?= $row->model_name ?></small></td>
                                            <td><small><?= $row->serial_no ?></small></td>
                                            <td><small><?= date('jS M Y', strtotime($row->installation_date)); ?></small></td>
                                            <td><small><?= date('jS M Y', strtotime($row->purchase_date)); ?> </small></td>
                                            <td><small><?= $row->dealer_name ?? '' ?></small></td>
                                            <td><small><?= $row->dealer_phone ?? '' ?></small></td>
                                            <td><small><?= $row->comments ?? '' ?></small></td>
                                            <td><small><?= $row->interested ?? '' ?></small></td>

                                            <td><small><?= date('jS M Y', strtotime($row->added_on));  ?></small></td>

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