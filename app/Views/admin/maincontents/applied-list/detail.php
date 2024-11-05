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
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <tr>
                                <td>CURRENT POSITION</td>
                                <td><?= $row->current_position ?></td>
                            </tr>                                                
                            <tr>
                                <td>APPLIED POSITION</td>
                                <td><?= $row->applied_position ?></td>
                            </tr>
                            <tr>
                                <td>Prefered Location 1</td>
                                <td><?= $row->prefered_location1 ?></td>
                            </tr>
                            <tr>
                                <td>Prefered Location 2</td>
                                <td><?= $row->prefered_location2 ?></td>
                            </tr>
                            <tr>
                                <td>Prefered JOB Location</td>
                                <td><?= $row->prefered_job_location ?></td>
                            </tr>
                            <tr>
                                <td>ENGAGE MSK</td>
                                <td><?= $row->engage_msk ?></td>
                            </tr>
                            <tr>
                                <td>NAME</td>
                                <td><?= $row->name ?></td>
                            </tr>
                            <tr>
                                <td>GENDER</td>
                                <td><?= $row->gender ?></td>
                            </tr>
                            <tr>
                                <td>DATE OF BIRTH</td>
                                <td><?= $row->dob ?></td>
                            </tr>                            
                            <tr>
                                <td>EMAIL</td>
                                <td><?= $row->email ?></td>
                            </tr>
                            <tr>
                                <td>MOBILE</td>
                                <td><?= $row->mobile ?></td>
                            </tr>
                            <tr>
                                <td>ADDRESS</td>
                                <td><?= $row->address ?></td>
                            </tr>
                            <tr>
                                <td>QULIFICATION</td>
                                <td><?= $row->qualification ?></td>
                            </tr>
                            <tr>
                                <td>YEAR OF PASSOUT</td>
                                <td><?= $row->yop ?></td>
                            </tr>
                            <tr>
                                <td>UNIVERSITY</td>
                                <td><?= $row->university ?></td>
                            </tr>
                            <tr>
                                <td>TOTAL EXPERIENCE</td>
                                <td><?= $row->total_experience ?></td>
                            </tr>
                            <tr>
                                <td>RESUME</td>
                                <td>
                                    <?php if($row->resume!='') { ?>
                                        <a href="<?=base_url('/uploads/accreditations/'. $row->resume)?>" target="_blank" ><img src="<?=base_url('/uploads/accreditations/pdf_icon.png/')?>" class="img-responsive img-thumbnail" style="height:70px; width:70px;"  />Click to view Resume
                                    <?php } ?></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>