<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class LandingPage extends BaseController
{
    public function index()
    {
        if (!$this->session->get('is_admin_login')) {
            return redirect()->to(site_url('Admin'));
        }
        $rows = \Config\Database::connect()->table('landing_enquiries')->orderBy('id', 'DESC')->get()->getResult();
        return $this->layout_after_login('Landing Page Enquiries', 'landing/list', ['rows' => $rows]);
    }

    public function export()
    {
        if (!$this->session->get('is_admin_login')) {
            return redirect()->to(site_url('Admin'));
        }
        $rows = \Config\Database::connect()->table('landing_enquiries')->orderBy('id', 'DESC')->get()->getResultArray();
        $file = fopen('php://temp', 'w+');
        fwrite($file, "\xEF\xBB\xBF");
        fputcsv($file, ['ID', 'Full name', 'Mobile number', 'City / district', 'Business type', 'Interested in', 'Enquiry date']);
        foreach ($rows as $row) {
            $cells = [];
            foreach (['id', 'full_name', 'mobile', 'city', 'business_type', 'interested_in', 'created_at'] as $field) {
                $cell = (string) $row[$field];
                // Keep user-entered spreadsheet formulas inert in CSV exports.
                $cells[] = preg_match('/^[\s]*[=+@-]|^[\t\r\n]/u', $cell) ? "'" . $cell : $cell;
            }
            fputcsv($file, $cells);
        }
        rewind($file);
        $csv = stream_get_contents($file);
        fclose($file);
        return $this->response->setHeader('Content-Type', 'text/csv; charset=UTF-8')
            ->setHeader('Content-Disposition', 'attachment; filename="landing-enquiries-' . date('Y-m-d') . '.csv"')
            ->setHeader('Cache-Control', 'no-store')->setBody($csv);
    }
}
