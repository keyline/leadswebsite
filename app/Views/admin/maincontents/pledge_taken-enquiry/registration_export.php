<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Registration_Report-" . date('ymd') . ".xls");
?>
<table border="1" cellpadding="5" cellspacing="3" style="border-collapse: collapse; width: 1000px;" align="center">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Number</th>
            <th>Address</th>
            <th>Product</th>
            <th>Model Number</th>
            <th>Serial Number</th>
            <th>Purchase Date</th>
            <th>Purchase Place</th>
            <th>Invoice Number </th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rows) {
            $i = 1;
            foreach ($rows as $row) {

        ?>
                <tr>

                    <td><?= $i++; ?></td>
                    <td><small><?= $row->full_name ?></small></td>
                    <td> <small><?= $row->email_address; ?></small> </td>
                    <td> <small><?= $row->phone_number; ?></small> </td>

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

                    <td><small><?= date('d-m-y  -  h:m a', strtotime($row->added_on));  ?></small></td>


                </tr>
        <?php }
        } ?>
    </tbody>
</table>