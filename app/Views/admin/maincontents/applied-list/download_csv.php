<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Applied_list_Enquiry_Report-".date('ymd').".xls");
?>
 <table border="1" cellpadding="5" cellspacing="3" style="border-collapse: collapse; width: 1000px;" align="center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Current Position</th>
                                    <th>Applied Position</th>
                                    <th>Prefered Location1</th>
                                    <th>Prefered Location2</th>
                                    <th>Prefered Job Location</th>
                                    <th>Engage MSK</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Qualification</th>
                                    <th>Year of passout</th>
                                    <th>University</th>
                                    <th>Total Experience</th>
                                    <th>Resume</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($rows) { $i=1; foreach($rows as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->current_position; ?></td>
                                    <td><?php echo $row->applied_position; ?></td>
                                    <td><?php echo $row->prefered_location1; ?></td>
                                    <td><?php echo $row->prefered_location2; ?></td>
                                    <td><?php echo $row->prefered_job_location; ?></td>
                                    <td><?php echo $row->engage_msk; ?></td>
                                    <td><?php echo $row->name; ?></td>
                                    <td><?php echo $row->gender; ?></td>
                                    <td><?php echo $row->dob; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo $row->mobile; ?></td>
                                    <td><?php echo $row->address; ?></td>
                                    <td><?php echo $row->qualification; ?></td>
                                    <td><?php echo $row->yop; ?></td>
                                    <td><?php echo $row->university; ?></td>
                                    <td><?php echo $row->total_experience; ?></td>
                                    <td>
                                    <?php if($row->resume!='') { ?>
                                        <a href="<?=base_url('/uploads/accreditations/'. $row->resume)?>" target="_blank" class="img-responsive img-thumbnail" style="height:70px; width:70px;" >Click to view Resume
                                    <?php } ?></a>
                                </td>
                                </tr>                                    
                                <?php } } ?>
                            </tbody>
                        </table>