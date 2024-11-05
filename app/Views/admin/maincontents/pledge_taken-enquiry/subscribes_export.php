<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Subscribe_Report-" . date('ymd') . ".xls");
?>
<table border="1" cellpadding="5" cellspacing="3" style="border-collapse: collapse; width: 1000px;" align="center">
    <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Subscribe Date</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($rows) {
            $i = 1;
            foreach ($rows as $row) {
        ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td> <small><?= $row->email; ?> </td>
                    <td><small><?= date('jS M Y', strtotime($row->created_at));  ?></small></td>
                </tr>
        <?php }
        } ?>
    </tbody>
</table>