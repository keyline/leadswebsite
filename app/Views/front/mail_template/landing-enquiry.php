<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"><title>New partnership enquiry</title></head>
<body style="margin:0;padding:24px;background:#f7f3ef;font-family:Arial,sans-serif;color:#252a31">
    <div style="max-width:640px;margin:auto;background:#fff;border-top:4px solid #ff6300;padding:28px">
        <h1 style="font-size:24px;margin-top:0">New partnership enquiry</h1>
        <p>A visitor submitted the LEADSS dealership and distributorship landing form.</p>
        <table style="width:100%;border-collapse:collapse">
            <?php foreach (['full_name' => 'Full name', 'mobile' => 'Mobile number', 'city' => 'City / district', 'business_type' => 'Business type', 'interested_in' => 'Interested in'] as $field => $label): ?>
            <tr>
                <th scope="row" style="padding:12px;text-align:left;border-bottom:1px solid #eee;vertical-align:top"><?= esc($label) ?></th>
                <td style="padding:12px;border-bottom:1px solid #eee"><?= esc($$field) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p style="margin-top:24px"><a style="color:#b84400" href="<?= esc(site_url('admin/landing-page'), 'attr') ?>">View landing page enquiries in the admin panel</a></p>
    </div>
</body>
</html>
