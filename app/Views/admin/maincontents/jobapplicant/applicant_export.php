<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Applicant_Report-" . date('ymd') . ".xls");
?>
<table border="1" cellpadding="5" cellspacing="3" style="border-collapse: collapse; width: 1000px;" align="center">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>            
            <th>Email</th>
            <th>Number</th>
            <th>Qualification</th>
            <th>Job Name</th>
            <th>CV</th>
            <th>Experience</th>                        
            <th>Apply Date</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rows) {
            $i = 1;
            foreach ($rows as $row) {
        ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><small><?= $row->first_name ?> <?= $row->last_name ?></small></td>
                    <td><small><?= $row->email ?></small></td>
                    <td><small><?= $row->phone; ?></small> </td>
                    <td><small><?= $row->qualification ?></small></td>
                    <td><small><?= $row->job_name?></small></td>
                    <!-- <td><small>?= $row->cv_file ?></small></td> -->
                    <td><a target="_blank" href="<?= base_url('/uploads/applicantCv/') . '/' . $row->cv_file ?>"><?=$row->cv_file?></a></td>
                    <td><small><?= $row->experience ?></small></td>                    
                    <td><small><?= date('d-m-y', strtotime($row->added_on)) ?></small></td>                    
                </tr>
        <?php }
        } ?>
    </tbody>
</table>