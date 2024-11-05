<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Feedback_Enquiry_Report-".date('ymd').".xls");
?>
<table  border="1" cellpadding="5" cellspacing="3" style="border-collapse: collapse; width: 1000px;" align="center">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Organisation</th>
            <th>Country</th>
            <th>City</th>
            <th>Contact Person</th>
            <th>Comment</th>                        
            <th>Special Enquiry</th>
        </tr>
    </thead>
    <tbody>
        <?php if($rows) { $i=1; foreach($rows as $row) { ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row->name; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->phone ?></td>
            <td><?php echo $row->organisation; ?></td>
            <td><?php echo $row->country; ?></td>
            <td><?php echo $row->city; ?></td>
            <td><?php echo $row->contact_person; ?></td>
            <td><?php echo wordwrap($row->comment,40,"<br>\n"); ?></td>
            <td><?php echo wordwrap($row->special_enquiry,40,"<br>\n"); ?></td>                                    
        </tr>                                    
        <?php } } ?>
    </tbody>
</table>