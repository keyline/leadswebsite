<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Enquiry_Report-" . date('ymd') . ".xls");
?>
<table border="1" cellpadding="5" cellspacing="3" style="border-collapse: collapse; width: 1000px;" align="center">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email & Number</th>
            <?php /* if ($isAMC) { ?>
                <th>Product</th>
            <?php } */ ?>
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
                    <td> <small><?= $row->email; ?> <br> <?= $row->phone; ?></small> </td>
                    <?php /* if ($isAMC) { ?>
                        <td> <small><?= $row->product_name; ?></small> </td>
                    <?php } */?>
                    <td> <small><?= $row->comment; ?></small> </td>
                    <td><small><?= date('d-m-y', strtotime($row->created_at));  ?></small></td>


                </tr>
        <?php }
        } ?>
    </tbody>
</table>