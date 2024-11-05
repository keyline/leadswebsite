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
                        <a target="_blank" href="<?= base_url() . '/admin/manage_enquire/contact_csv' ?>" class="btn btn-success">Export</a>

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
                                    <th>Destination & Pax</th>
                                    <th>Month</th>
                                    <th>Vacation Type</th>
                                    <!-- <th>Package Name</th> -->
                                    <th>Enquire Date</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if ($rows) {
                                    $i = 1;
                                    foreach ($rows as $row) {
                                        $date = \DateTime::createFromFormat('!m', $row->month);
                                        $monthName = $date->format('F');
                                ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><small><?= $row->first_name ?> <?= $row->last_name; ?></small></td>
                                            <td> <small><?= $row->email; ?> <br> <?= $row->phone; ?></small> </td>
                                            <td> <small><?= $row->destination; ?> (<?= $row->pax ?> Pax)</small> </td>
                                            <td><small><?= $monthName ?></small></td>
                                            <td><small><?= HOLIDAY_TYPES[$row->vacation_type] ?></small></td>
                                            <!-- <td><small><?= $row->pkg_name ?></small></td> -->
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