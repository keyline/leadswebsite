<?php



namespace App\Controllers\admin;



use App\Controllers\BaseController;

use App\Models\CommonModel;

use DB;



class Manage_services extends BaseController

{



    private $model;  //This can be accessed by all class methods



    public function __construct()
    {

        $session = \Config\Services::session();


        if (!$session->get('is_admin_login')) {

            header("Location:" . base_url() . '/admin');
        }

        $model = new CommonModel();

        $this->data = array(

            'model'         => $model,

            'session'       => $session,

            'module'        => 'Services Request',

            'controller'    => 'manage_services',

            'table_name'    => 'service_request',

            'primary_key'   => 'id'

        );
    }



    private function getCategoryNamesByIds($mainArray, $idArray)
    {

        $names = [];

        // Loop through each id in the idArray
        foreach ($idArray as $id) {
            // Search for the object with the matching id in the mainArray
            foreach ($mainArray as $item) {
                if ($item->id == $id) {
                    // Add the name to the names array
                    $names[] = $item->name;
                    break; // Stop looping once the id is found
                }
            }
        }

        // Return the array of names
        return $names;
    }




    public function index()
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage ' . $this->data['module'];
        $page_name                  = 'service_request/list';
        $data                       = [];
        $orderBy[0]                 = ['field' => 'id', 'type' => 'DESC'];
        $data['productCategory']    = $this->common_model->find_data('product_category', 'array', ['published' => 1]);
        $data['rows']               = $this->common_model->find_data('service_request', 'array', '', '*', '', '', $orderBy);


        foreach ($data['rows'] as &$row) {
            $products =  implode(' , ', $this->getCategoryNamesByIds($data['productCategory'], json_decode($row->product_id)));
            $row->products = $products;
        }

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
