<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;
class Manage_pledge_taken extends BaseController {

    private $model;  //This can be accessed by all class methods
	public function __construct()
    {
        $session = \Config\Services::session();
        if(!$session->get('is_admin_login')) {
            return redirect()->to('/Administrator');
        }
        $model = new CommonModel();
        $this->data = array(
            'model'         => $model,
            'session'       => $session,
            'module'        => 'Pledge_taken',
            'controller'    => 'manage_pledge_taken',
            'table_name'    => 'sms_pledge_taken',
            'primary_key'   => 'id'
        );
    }
    public function enquiry_form() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage Pledge Form Listing';
        $page_name                  = 'pledge_taken-enquiry/enquiry-form';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3], '', '', '', $order_by);
        if($this->request->getMethod() == 'post') {
            // pr($this->request->getPost());
            $bulkData   =$this->request->getPost();
            // $bulkcount      =count($bulkData['draw']);
            for($j=0;$j<count($bulkData['draw']);$j++){
                $id = $bulkData['draw'][$j]; 
                $postData = array(
                    'published' => 3
                );
                $updateData = $this->common_model->save_data($this->data['table_name'],$postData,$id,$this->data['primary_key']);
                // echo $this->db->getLastQuery();die;
            }
                $this->session->setFlashdata('success_message', $this->data['module'].' deleted successfully');
                return redirect()->to('/admin/'.$this->data['controller'].'/enquiry_form');
            }  
        echo $this->layout_after_login($title,$page_name,$data);
    }
    // public function feedback_form() 
    // {
    //     $data['moduleDetail']       = $this->data;
    //     $title                      = 'Manage Contact Feedback Form Listing';
    //     $page_name                  = 'pledge_taken-enquiry/feedback-form';
    //     $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
    //     $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3, 'enquiry_type' => 'FEEDBACK'], '', '', '', $order_by);
    //     if($this->request->getMethod() == 'post') {
    //         // pr($this->request->getPost());
    //         $bulkData   =$this->request->getPost();
    //         // $bulkcount      =count($bulkData['draw']);
    //         for($j=0;$j<count($bulkData['draw']);$j++){
    //             $id = $bulkData['draw'][$j]; 
    //             $postData = array(
    //                 'published' => 3
    //             );
    //             $updateData = $this->common_model->save_data($this->data['table_name'],$postData,$id,$this->data['primary_key']);
    //             // echo $this->db->getLastQuery();die;
    //         }
    //             $this->session->setFlashdata('success_message', $this->data['module'].' deleted successfully');
    //             return redirect()->to('/admin/'.$this->data['controller'].'/feedback_form');
    //         }  
    //     echo $this->layout_after_login($title,$page_name,$data);
    // }
    public function download_csv() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Downlaod CSV';               
        $order_by[0]                = array('field' => 'id', 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data('sms_pledge_taken', 'array', ['published!=' => 3], '', '', '', $order_by);
        return view('admin/maincontents/pledge_taken-enquiry/download-csv',$data);
    }
    // public function download_csv2()
    // {
    //     $data['moduleDetail']       = $this->data;
    //     $title                      = 'Downlaod CSV';               
    //     $order_by[0]                = array('field' => 'id', 'type' => 'desc');
    //     $data['rows']               = $this->data['model']->find_data('sms_contact_enquiry', 'array', ['published!=' => 3, 'enquiry_type=' => 'FEEDBACK'], '', '', '', $order_by);
    //     return view('admin/maincontents/pledge_taken-enquiry/download_csv2',$data);
    // }
}