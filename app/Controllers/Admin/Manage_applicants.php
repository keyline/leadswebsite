<?php



namespace App\Controllers\admin;



use App\Controllers\BaseController;

use App\Models\CommonModel;

use DB;



class Manage_applicants extends BaseController

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

            'module'        => 'Applicants',

            'controller'    => 'manage_applicants',

            'table_name'    => 'job_applicant',

            'primary_key'   => 'id'

        );
    }



    private function getApplicants()
    {
        $join = [
            [
                'table' => 'sms_career',
                'table_master' => 'job_applicant',
                'field' => 'id',
                'field_table_master' => 'job_id',
                'type' => 'inner'
            ]
        ];

        // Set conditions to filter by blog ID and status
        $conditions = ['job_applicant.status' => 1];
        $select = 'job_applicant.*, sms_career.name AS job_name';
        $orderBy[0] = ['field' => 'id', 'type' => 'DESC'];
        $limit = ''; // Limit to 1 entry

        // Retrieve the blog by ID
        $applicants = $this->common_model->find_data(
            'job_applicant',             // Table name
            'array',               // Return type as a single row
            $conditions,        // Conditions to filter blogs
            $select,            // Select columns
            $join,              // Join with blog_category table
            '',                 // No grouping
            $orderBy,          // No ordering
        );

        // Return the result
        return $applicants; // This will return a single blog row or null if not found
    }




    public function index()
    {

        $data['moduleDetail']       = $this->data;

        $title                      = 'Manage ' . $this->data['module'];

        $page_name                  = 'jobapplicant/list';

        $data                       = [];

        $data['rows']                = $this->getApplicants();
       
        echo $this->layout_after_login($title, $page_name, $data);
    }



    public function download_csv()

    {

        $data['moduleDetail']       = $this->data;

        $title                      = 'Applicant Export';

        $order_by[0]                = ['field' => 'created_at', 'type' => 'DESC'];

        $data['rows']               = $this->getApplicants();
        // pr($data['rows']);

        return view('admin/maincontents/jobapplicant/applicant_export', $data);
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
