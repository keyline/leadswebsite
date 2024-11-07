<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;

class About_setting extends BaseController
{
    private $model;  //This can be accessed by all class methods
    
    public function __construct()
    {
        $session = \Config\Services::session();
        if (!$session->get('is_admin_login')) {
            return redirect()->to('/admin');
        }
        $model = new CommonModel();
        $this->data = [
            'model'         => $model,
            'session'       => $session,
            'module'        => 'about setting',
            'controller'    => 'about_setting',
            'table_name'    => 'about_setting',
            'primary_key'   => 'id'
        ];
    }
    public function index()
    {
        $title = 'About Setting';
        $page_name = 'about-setting';
        $data['row']    = $this->data['model']->find_data($this->data['table_name'], 'row');


        if ($this->request->getMethod() == 'post') {

            $postData = [
                'banner_text' => $this->request->getPost('banner'),
                'mission_text' => $this->request->getPost('mission'),
                'vision_text' => $this->request->getPost('vision'),
                'future_plan_text' => $this->request->getPost('plan'),
                'presence_text' => $this->request->getPost('presence'),
            ];
            $record = $this->common_model->save_data($this->data['table_name'], $postData, 1, $this->data['primary_key']);
            if ($record)
                $this->session->setFlashdata('success_message', 'Updated successfully');
            return redirect()->back();
        }

        echo $this->layout_after_login($title, $page_name, $data);
    }
}
