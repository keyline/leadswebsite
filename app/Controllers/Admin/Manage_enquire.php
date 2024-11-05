<?php



namespace App\Controllers\admin;



use App\Controllers\BaseController;

use App\Models\CommonModel;

use DB;



class Manage_enquire extends BaseController

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

            'controller'    => 'manage_enquire',

            'table_name'    => 'sms_contact_enquiry',

            'primary_key'   => 'id'

        );
    }



    public function index()
    {

        $data['moduleDetail']       = $this->data;

        $title                      = 'Manage ' . $this->data['module'];

        $page_name                  = 'enquire/list';

        $data                       = [];

        $data['rows']                = $this->data['model']->getEnquires();
       
        echo $this->layout_after_login($title, $page_name, $data);
    }



    public function download_csv()

    {

        $data['moduleDetail']       = $this->data;

        $title                      = 'Enquiry Export';

        $order_by[0]                = ['field' => 'created_at', 'type' => 'DESC'];

        $data['rows']               = $this->data['model']->getEnquires();

        return view('admin/maincontents/pledge_taken-enquiry/enquiry_export', $data);
    }





    public function subscribers()

    {

        $data                       = [];

        $data['moduleDetail']       = $this->data;

        $title                      = 'Subscribers List';

        $page_name                  = 'enquire/subscribers';

        $order_by[0]                = ['field' => 'id', 'type' => 'DESC'];

        $data['rows']               = $this->data['model']->find_data('subscribe', 'array', '', '', '', '', $order_by);



        echo $this->layout_after_login($title, $page_name, $data);
    }





    public function contactsList()

    {

        $data                       = [];

        $data['moduleDetail']       = $this->data;

        $title                      = 'Contact  List';

        $page_name                  = 'enquire/contactus_list';

        // $order_by[0]                = ['field' => 'id', 'type' => 'DESC'];



        $data['rows']               = $this->data['model']->getEnquires(true);



        echo $this->layout_after_login($title, $page_name, $data);
    }





    public function contact_csv()

    {

        $data['moduleDetail']       = $this->data;

        $title                      = 'Enquiry Export';

        $order_by[0]                = ['field' => 'created_at', 'type' => 'DESC'];

        $data['rows']               = $this->data['model']->getEnquires(true);

        return view('admin/maincontents/pledge_taken-enquiry/contactus_export', $data);
    }


    public function subscribers_csv()
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Subscribers Export';
        $order_by[0]                = ['field' => 'created_at', 'type' => 'DESC'];
        $data['rows']               = $this->data['model']->find_data('subscribe', 'array', '', '', '', '', $order_by);

        return view('admin/maincontents/pledge_taken-enquiry/subscribes_export', $data);
    }
}
