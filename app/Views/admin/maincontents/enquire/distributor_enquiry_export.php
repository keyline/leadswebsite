<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Enquiry_Report-" . date('ymd') . ".xls");
?>
<table border="1" cellpadding="5" cellspacing="3" style="border-collapse: collapse; width: 1000px;" align="center">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Business Name</th>
            <th>Email & Number</th>
            <th>City</th>
            <th>Product Category</th>            
            <th>massage </th>
            <th>Enquire Date</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rows) {
            $i = 1;
            foreach ($rows as $row) {
        ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><small><?= $row->name ?></small></td>
                    <td><small><?= $row->business_name ?></small></td>
                    <td><small><?= $row->email; ?> <br> <?= $row->phone; ?></small> </td>
                    <td><small><?= $row->city ?></small></td>
                    <td><small><?= $row->product_interest ?></small></td>                    
                    <td> <small><?= $row->comment; ?></small> </td>
                    <td><small><?= date('d-m-y', strtotime($row->created_at));  ?></small></td>
                </tr>
        <?php }
        } ?>
    </tbody>
</table>