<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Service_Report-" . date('ymd') . ".xls");
?>
<table border="1" cellpadding="5" cellspacing="3" style="border-collapse: collapse; width: 1000px;" align="center">
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
        <?php if ($rows) {
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
                    <td><small><?= date('d-m-y', strtotime($row->added_on));  ?></small></td>

            <?php }
        } ?>
    </tbody>
</table>