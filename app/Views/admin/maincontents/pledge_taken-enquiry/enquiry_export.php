<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Booking_Enquiry_Report-" . date('ymd') . ".xls");
?>
<table border="1" cellpadding="5" cellspacing="3" style="border-collapse: collapse; width: 1000px;" align="center">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Number</th>
            <th>Destination & Pax</th>
            <th>Month</th>
            <th>Vacation Type</th>
            <th>Package Name</th>
            <th>Enquire Date</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rows) {
            $i = 1;
            foreach ($rows as $row) {
                $date = \DateTime::createFromFormat('!m', $row->month);
                $monthName = $date->format('F');
        ?>
                <tr>

                    <td><?= $i++; ?></td>
                    <td><small><?= $row->first_name ?> <?= $row->last_name; ?></small></td>
                    <td> <small><?= $row->email; ?> </td>
                    <td> <?= $row->phone; ?></small> </td>
                    <td> <small><?= $row->destination; ?> (<?= $row->pax ?> Pax)</small> </td>
                    <td><small><?= $monthName ?></small></td>
                    <td><small><?= HOLIDAY_TYPES[$row->vacation_type] ?></small></td>
                    <td><small><?= $row->pkg_name ?></small></td>
                    <td><small><?= date('jS M Y', strtotime($row->created_at));  ?></small></td>


                </tr>
        <?php }
        } ?>
    </tbody>
</table>