<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
class Manage_applied_list extends BaseController {

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
            'module'        => 'Applied List',
            'controller'    => 'manage_applied_list',
            'table_name'    => 'sms_applied_lists',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'applied-list/list';        
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);
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
                return redirect()->to('/admin/'.$this->data['controller']);
            }     
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function details($id) 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'applied-list/detail';        
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function download_csv()
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Downlaod CSV';               
        $order_by[0]                = array('field' => 'id', 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data('sms_applied_lists', 'array', ['published!=' => 3], '', '', '', $order_by);
        return view('admin/maincontents/applied-list/download_csv',$data);
    }
}