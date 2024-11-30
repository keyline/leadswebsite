<?php



namespace App\Controllers\admin;



use App\Controllers\BaseController;

use App\Models\CommonModel;

use DB;



class Manage_distributor_enquire extends BaseController

{



    private $model;  //This can be accessed by all class methods



    public function __construct()

    {

        $session = \Config\Services::session();


        if (!$session->get('is_admin_login')) {

            header("Location:" . base_url() . '/Admin');
        }

        $model = new CommonModel();

        $this->data = array(

            'model'         => $model,

            'session'       => $session,

            'module'        => 'Enquire',

            'controller'    => 'manage_distributor_enquire',

            'table_name'    => 'sms_contact_enquiry',

            'primary_key'   => 'id'

        );
    }



    public function index()
    {

        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage ' . $this->data['module'];
        $page_name                  = 'enquire/list';        
        $data['rows']           = $this->data['model']->find_data('sms_contact_enquiry', 'array', ['organisation' => 'distributor']);        
        echo $this->layout_after_login($title, $page_name, $data);
    }



    public function download_csv()
    {

        $data['moduleDetail']       = $this->data;

        $title                      = 'Enquiry Export';

        $order_by[0]                = ['field' => 'created_at', 'type' => 'DESC'];

        $data['rows']           = $this->data['model']->find_data('sms_contact_enquiry', 'array', ['organisation' => 'distributor']);        
     
        return view('admin/maincontents/enquire/distributor_enquiry_export', $data);
    }
}
