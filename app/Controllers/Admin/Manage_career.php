<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;
class Manage_career extends BaseController {

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
            'module'        => 'Career',
            'controller'    => 'manage_career',
            'table_name'    => 'sms_career',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'career/list';        
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'career/add-edit';        
        $data['row'] = [];
        if($this->request->getMethod() == 'post') {            
            /* pdf upload */
            $file = $this->request->getFile('career_cv');            
            $originalName = $file->getClientName();
            $fieldName = 'career_cv';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'career','pdf');
                if($upload_array['status']) {
                    $career_cv= $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('error_message', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $this->session->setFlashdata('error_message', 'Please upload a pdf file');
                //return redirect()->to('/admin/'.$this->data['controller'].'/add');
                return redirect()->to(current_url());
            }
            /* pdf upload */
            $postData   = array(
                                'name'                => $this->request->getPost('name'),
                                'email'         => $this->request->getPost('email'),
                                'experience'        => $this->request->getPost('experience'),
                                'msg'            => $this->request->getPost('msg'),
                                'career_cv'               => $career_cv,
                                );
            //pr($postData, false);
            $record     = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);
            // $db = \Config\Database::connect();
            // $query = $db->getLastQuery();
            // echo (string)$query;
            // die;
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
        $page_name                  = 'career/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);

        if($this->request->getMethod() == 'post') {            
            /* pdf upload */
            $file = $this->request->getFile('career_cv');
            $originalName = $file->getClientName();
            $fieldName = 'career_cv';
            if($originalName!='') {

                if($data['row']->career_cv!='') {
                    unlink('uploads/career/'.$data['row']->career_cv);  
                }                

                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'career','pdf');
                if($upload_array['status']) {
                    $career_cv = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('error_message', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $image = $data['row']->career_cv;
            }
            /* pdf upload */
            $postData = array(
                    'name'                => $this->request->getPost('name'),
                    'email'               => $this->request->getPost('email'),
                    'experience'          => $this->request->getPost('experience'),
                    'msg'                 => $this->request->getPost('msg'),
                    'career_cv'           => $career_cv,
                    'updated_at'          => date('Y-m-d h:i:s')
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