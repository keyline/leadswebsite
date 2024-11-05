<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Newsletter_Report-".date('ymd').".xls");
?>
<table border="1" cellpadding="5" cellspacing="3" style="border-collapse: collapse; width: 1000px;" align="center">
    <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php if($rows) { $i=1; foreach($rows as $row) { ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row->email; ?></td>            
        </tr>                                    
        <?php } } ?>
    </tbody>
</table>