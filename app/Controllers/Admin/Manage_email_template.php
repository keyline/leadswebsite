<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
class Manage_email_template extends BaseController {

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
            'module'        => 'Email Template',
            'controller'    => 'manage_email_template',
            'table_name'    => 'sms_email_template',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'email-template/list';        
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'email-template/add-edit';        
        $data['row'] = [];
        if($this->request->getMethod() == 'post') {            
            $slug = strtolower($this->data['model']->clean($this->request->getPost('title')));
            $postData   = array(
                                'title'             => $this->request->getPost('title'),
                                'slug'              => $slug,
                                'description'       => $this->request->getPost('description')
                                );
            $record     = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);            
            $this->session->setFlashdata('success_message', $this->data['module'].' inserted successfully');
            return redirect()->to('/admin/'.$this->data['controller']);
        }
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function edit($id)
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Edit';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'email-template/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);

        if($this->request->getMethod() == 'post') {            
            $slug = strtolower($this->data['model']->clean($this->request->getPost('title')));
            $postData = array(
                    'title'             => $this->request->getPost('title'),
                    'slug'              => $slug,
                    'description'       => $this->request->getPost('description'),
                    'updated_at'        => date('Y-m-d h:i:s')
                    );
            $record = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
            $this->session->setFlashdata('success_message', $this->data['module'].' updated successfully');
            return redirect()->to('/admin/'.$this->data['controller']);
        }        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function confirm_delete($id)
    {
        $postData = array(
                            'published' => 3
                        );
        $updateData = $this->common_model->save_data($this->data['table_name'],$postData,$id,$this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'].' deleted successfully');
        return redirect()->to('/admin/'.$this->data['controller']);
    }
    public function deactive($id)
    {
        $postData = array(
                            'published' => 0
                        );
        $updateData = $this->common_model->save_data($this->data['table_name'],$postData,$id,$this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'].' deactivated successfully');
        return redirect()->to('/admin/'.$this->data['controller']);
    }
    public function active($id)
    {
        $postData = array(
                            'published' => 1
                        );
        $updateData = $this->common_model->save_data($this->data['table_name'],$postData,$id,$this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'].' activated successfully');
        return redirect()->to('/admin/'.$this->data['controller']);
    }
}