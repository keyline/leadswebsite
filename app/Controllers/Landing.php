<?php

namespace App\Controllers;

class Landing extends BaseController
{
    private const BUSINESS_TYPES = ['Existing retailer', 'Wholesaler or distributor', 'Appliance dealer', 'New business or entrepreneur'];
    private const INTERESTS = ['Distributorship', 'Dealership', 'Retail partnership'];

    public function index()
    {
        return view('landing/index', [
            'businessTypes' => self::BUSINESS_TYPES,
            'interests' => self::INTERESTS,
            'errors' => $this->session->getFlashdata('landing_errors') ?? [],
            'old' => $this->session->getFlashdata('landing_old') ?? [],
            'success' => $this->session->getFlashdata('landing_success'),
            'formError' => $this->session->getFlashdata('error'),
        ]);
    }

    public function submit()
    {
        $data = [];
        foreach (['full_name', 'mobile', 'city', 'business_type', 'interested_in'] as $field) {
            $value = $this->request->getPost($field);
            $data[$field] = is_string($value) ? trim($value) : '';
        }
        $validation = \Config\Services::validation();
        $validation->setRules([
            'full_name' => ['label' => 'Full name', 'rules' => 'required|min_length[2]|max_length[100]'],
            'mobile' => ['label' => 'Mobile number', 'rules' => 'required|regex_match[/^[6-9][0-9]{9}$/]', 'errors' => ['regex_match' => 'Enter a valid 10-digit Indian mobile number.']],
            'city' => ['label' => 'City / district', 'rules' => 'required|min_length[2]|max_length[100]'],
            'business_type' => ['label' => 'Business type', 'rules' => 'required|in_list[' . implode(',', self::BUSINESS_TYPES) . ']'],
            'interested_in' => ['label' => 'Partnership interest', 'rules' => 'required|in_list[' . implode(',', self::INTERESTS) . ']'],
        ]);
        $errors = [];
        if (!$validation->run($data)) {
            $errors = $validation->getErrors();
        }
        if ($this->request->getPost('website')) {
            $errors['form'] = 'Unable to submit this enquiry. Please call our team instead.';
        }
        if (time() - (int) $this->session->get('landing_last_submit') < 30) {
            $errors['form'] = 'Your enquiry has already been received. Please wait before submitting again.';
        }
        if ($errors) {
            return redirect()->to(site_url('landing') . '#enquire')
                ->with('landing_errors', $errors)->with('landing_old', $data);
        }
        try {
            $saved = \Config\Database::connect()->table('landing_enquiries')->insert($data);
            if (!$saved) {
                throw new \RuntimeException('Landing enquiry insert failed.');
            }
        } catch (\Throwable $e) {
            log_message('error', 'Landing enquiry could not be saved: {message}', ['message' => $e->getMessage()]);
            return redirect()->to(site_url('landing') . '#enquire')
                ->with('landing_errors', ['form' => 'We could not save your enquiry. Please try again or call 95936 79111.'])
                ->with('landing_old', $data);
        }
        $this->session->set('landing_last_submit', time());
        // Keep the saved enquiry even if the SMTP notification fails.
        try {
            $settings = $this->common_model->find_data('sms_site_settings', 'row', ['published' => 1], ['admin_email']);
            if (!$settings || empty($settings->admin_email)) {
                throw new \RuntimeException('Admin email is not configured.');
            }
            $body = view('front/mail_template/landing-enquiry', $data);
            if (!$this->send($settings->admin_email, 'Leadsindia', 'New Partnership Enquiry - Landing Page', $body)) {
                log_message('error', 'Landing enquiry was saved, but its admin email notification failed.');
            }
        } catch (\Throwable $e) {
            log_message('error', 'Landing enquiry was saved, but its admin email notification could not be sent: {message}', ['message' => $e->getMessage()]);
        }
        return redirect()->to(base_url('thank-you'))->setStatusCode(303);
    }
}
