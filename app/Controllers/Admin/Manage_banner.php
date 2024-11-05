<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;
class Manage_banner extends BaseController {

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
            'module'        => 'Banner',
            'controller'    => 'manage_banner',
            'table_name'    => 'sms_banners',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'banner/list';        
        $order_by[0]                = array('field' => 'rank', 'type' => 'ASC');
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
    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'banner/add-edit';        
        $data['row'] = [];
        if($this->request->getMethod() == 'post') {            
            /* image upload */
            $file = $this->request->getFile('banner_image');
            $originalName = $file->getClientName();
            $fieldName = 'banner_image';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'banners','image');
                if($upload_array['status']) {
                    $banner_image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $this->session->setFlashdata('msg1', 'Please upload an image');
                //return redirect()->to('/admin/'.$this->data['controller'].'/add');
                return redirect()->to(current_url());
            }
            /* image upload */
            $postData   = array(
                                'small_text'                => $this->request->getPost('small_text'),
                                'big_text'                  => $this->request->getPost('big_text'),
                                'rank'                      => $this->request->getPost('rank'),
                                'banner_image'              => $banner_image,
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
        $page_name                  = 'banner/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);

        if($this->request->getMethod() == 'post') {            
            /* image upload */
            $file = $this->request->getFile('banner_image');
            $originalName = $file->getClientName();
            $fieldName = 'banner_image';
            if($originalName!='') {

                if($data['row']->banner_image!='') {
                    unlink('uploads/banners/'.$data['row']->banner_image);  
                }                

                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'banners','image');
                if($upload_array['status']) {
                    $banner_image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $banner_image = $data['row']->banner_image;
            }
            /* image upload */
            $postData = array(
                    'small_text'                => $this->request->getPost('small_text'),
                    'big_text'                  => $this->request->getPost('big_text'),
                    'rank'                      => $this->request->getPost('rank'),
                    'banner_image'              => $banner_image,
                    'updated_at'                => date('Y-m-d h:i:s')
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