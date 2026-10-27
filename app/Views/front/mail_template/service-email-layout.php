<?php
$customerEmail = !empty($isCustomerConfirmation);
$heading = $customerEmail ? 'Your service request is registered' : 'New service request';
$details = [
    'Customer name' => $name ?? '',
    'Email address' => $email ?? '',
    'Phone number' => $phone ?? '',
    'Address' => $address ?? '',
    'Landmark' => $landmark ?? '',
    'District' => $district ?? '',
    'State' => $state ?? '',
];
$productDetails = [
    'Product' => implode(', ', $products ?? []),
    'Model' => $model_name ?? '',
    'Serial number' => $serial_no ?? '',
];
foreach (['Installation date' => $installation_date ?? '', 'Purchase date' => $purchase_date ?? ''] as $label => $value) {
    $date = \DateTime::createFromFormat('!Y-m-d', $value);
    $productDetails[$label] = $date ? $date->format('d M Y') : $value;
}
$productDetails['Dealer / distributor'] = $dealer_name ?? '';
$productDetails['Dealer phone'] = $dealer_phone ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($heading) ?></title>
</head>
<body style="margin:0;padding:0;background-color:#f1f3f5;color:#243247;font-family:Arial,Helvetica,sans-serif;">
    <div style="display:none;max-height:0;overflow:hidden;mso-hide:all;">Service request registered. Your reference: <?= esc($docket_number ?? '') ?></div>
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f1f3f5;">
        <tr><td align="center" style="padding:32px 12px;">
            <!--[if mso]><table role="presentation" width="640" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:640px;background-color:#ffffff;border:1px solid #e1e5eb;border-collapse:separate;border-radius:12px;">
                <tr><td style="padding:26px 28px;background-color:#172638;border-top:5px solid #ff6300;">
                    <p style="margin:0;color:#ffffff;font-size:24px;font-weight:bold;letter-spacing:1px;">LEADS<span style="color:#ff8538;">INDIA</span></p>
                    <p style="margin:6px 0 0;color:#c6d0dd;font-size:12px;letter-spacing:1px;">AFTER-SALES SERVICE</p>
                </td></tr>
                <tr><td style="padding:30px 28px 20px;">
                    <p style="margin:0 0 12px;color:#b34500;font-size:12px;font-weight:bold;letter-spacing:1px;">SERVICE REQUEST CONFIRMATION</p>
                    <h1 style="margin:0 0 16px;color:#172638;font-size:26px;line-height:1.3;"><?= esc($heading) ?></h1>
                    <p style="margin:0;color:#526174;font-size:15px;line-height:1.7;">
                        <?php if ($customerEmail): ?>
                            Hello <?= esc($name ?? '') ?>,<br>Thank you for contacting Leadsindia. We have received your service request, and our service team will get in touch with you.
                        <?php else: ?>
                            A service request has been received from <strong><?= esc($name ?? '') ?></strong>. Please review the details below and contact the customer to assist them.
                        <?php endif; ?>
                    </p>
                </td></tr>
                <tr><td style="padding:0 28px 26px;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#fff4eb;border:1px solid #ffd8bb;">
                        <tr><td style="padding:18px 20px;">
                            <p style="margin:0 0 8px;color:#9a4000;font-size:12px;font-weight:bold;letter-spacing:1px;">DOCKET NUMBER</p>
                            <p style="margin:0;color:#172638;font-family:Consolas,'Courier New',monospace;font-size:18px;line-height:1.5;font-weight:bold;word-break:break-all;"><?= esc($docket_number ?? '') ?></p>
                            <p style="margin:8px 0 0;color:#6c5849;font-size:12px;line-height:1.6;">Keep this number for any follow-up about this request.</p>
                        </td></tr>
                    </table>
                </td></tr>
                <?php foreach (['Customer details' => $details, 'Product & purchase details' => $productDetails] as $section => $rows): ?>
                <tr><td style="padding:0 28px 26px;">
                    <h2 style="margin:0 0 12px;color:#172638;font-size:16px;line-height:1.5;"><?= esc($section) ?></h2>
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;table-layout:fixed;">
                        <?php foreach ($rows as $label => $value): if (trim((string) $value) === '') { continue; } ?>
                        <tr>
                            <th scope="row" width="38%" valign="top" style="padding:11px 10px 11px 0;border-bottom:1px solid #e9edf2;text-align:left;color:#697586;font-size:13px;font-weight:normal;line-height:1.6;"><?= esc($label) ?></th>
                            <td valign="top" style="padding:11px 0;border-bottom:1px solid #e9edf2;text-align:left;color:#243247;font-size:14px;line-height:1.6;word-wrap:break-word;overflow-wrap:anywhere;"><?= nl2br(esc($value)) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </td></tr>
                <?php endforeach; ?>
                <?php if (trim((string) ($comments ?? '')) !== ''): ?>
                <tr><td style="padding:0 28px 26px;">
                    <h2 style="margin:0 0 12px;color:#172638;font-size:16px;">Customer comments</h2>
                    <p style="margin:0;padding:16px;background-color:#f6f8fa;color:#526174;font-size:14px;line-height:1.7;word-wrap:break-word;"><?= nl2br(esc($comments)) ?></p>
                </td></tr>
                <?php endif; ?>
                <tr><td style="padding:22px 28px;background-color:#f6f8fa;border-top:1px solid #e9edf2;">
                    <p style="margin:0;color:#243247;font-size:14px;font-weight:bold;">Leadsindia Service Team</p>
                    <p style="margin:6px 0 0;color:#697586;font-size:12px;line-height:1.7;">This email confirms registration of the service request. Please retain it for your records.</p>
                </td></tr>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
        </td></tr>
    </table>
</body>
</html>
