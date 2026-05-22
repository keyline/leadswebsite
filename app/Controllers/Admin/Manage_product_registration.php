<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

use App\Models\CommonModel;

use DB;



class Manage_product_registration extends BaseController
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

            'module'        => 'Product Registration',

            'controller'    => 'manage_product_registration',

            'table_name'    => 'product_registration',

            'primary_key'   => 'id'

        );
    }



    public function index()
    {

        $data['moduleDetail']       = $this->data;

        $title                      = 'Manage ' . $this->data['module'];

        $page_name                  = 'enquire/registration-list';

        $order_by[0]                = ['field' => 'id', 'type' => 'DESC'];

        $data['rows']                = $this->common_model->find_data('product_registration', 'array', '', '', '', '', $order_by);


        foreach ($data['rows'] as $key => &$row) {
            $product_name = '';
            if (!is_null($row->product_type) && $row->product_type != '') {
                $product = $this->common_model->find_data('product_category', 'row', ['id' => $row->product_type]);
                $product_name =  $product->name;
            }
            $row->product_name = $product_name;
        }
   
        echo $this->layout_after_login($title, $page_name, $data);
    }



    public function download_csv()
    {

        $data['moduleDetail']       = $this->data;

        $title                      = 'Registration Export';

        $order_by[0]                = ['field' => 'id', 'type' => 'DESC'];

        $data['rows']                = $this->common_model->find_data('product_registration', 'array', '', '', '', '', $order_by);


        foreach ($data['rows'] as $key => &$row) {
            $product_name = '';
            if (!is_null($row->product_type) && $row->product_type != '') {
                $product = $this->common_model->find_data('product_category', 'row', ['id' => $row->product_type]);
                $product_name =  $product->name;
            }
            $row->product_name = $product_name;
        }

        return view('admin/maincontents/pledge_taken-enquiry/registration_export', $data);
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
