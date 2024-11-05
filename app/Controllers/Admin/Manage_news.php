<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
class Manage_news extends BaseController {

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
            'module'        => 'News & Events',
            'controller'    => 'manage_news',
            'table_name'    => 'sms_news',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'news/list';        
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
    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'news/add-edit';        
        $data['row'] = [];
        if($this->request->getMethod() == 'post') {            
            $slug = strtolower($this->data['model']->clean($this->request->getPost('title')));
            /* category icon upload */
            $file = $this->request->getFile('image');
            $originalName = $file->getClientName();
            $fieldName = 'image';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'events','image');
                if($upload_array['status']) {
                    $image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $this->session->setFlashdata('msg1', 'Please upload an image');
                return redirect()->to(current_url());
            }
            /* category icon upload */
            $postData   = array(
                                'title'             => $this->request->getPost('title'),
                                'slug'              => $slug,
                                'content_date'      => date_format(date_create($this->request->getPost('content_date')), "Y-m-d"),
                                'description'       => $this->request->getPost('description'),
                                'image'             => $image
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
        $page_name                  = 'news/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);

        if($this->request->getMethod() == 'post') {            
            $slug = strtolower($this->data['model']->clean($this->request->getPost('title')));
            /* category icon */            
            $file = $this->request->getFile('image');
            $originalName = $file->getClientName();
            $fieldName = 'image';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'events','image');
                if($upload_array['status']) {
                    $image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $image = $data['row']->image;
            }
            /* category icon */
            $postData = array(
                    'title'             => $this->request->getPost('title'),
                    'slug'              => $slug,
                    'content_date'      => date_format(date_create($this->request->getPost('content_date')), "Y-m-d"),
                    'description'       => $this->request->getPost('description'),
                    'image'             => $image,
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
    public function manage_image() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage Images';
        $page_name                  = 'blog/manage-images';        
        $order_by[0]                = array('field' => 'id', 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data('sms_images', 'array', ['published!=' => 3], '', '', '', $order_by);

        if($this->request->getMethod() == 'post') {
            /* category images upload */
            $category_images_array  = $this->request->getFiles('image_file')['image_file'];
            $images                 = $this->data['model']->commonFileArrayUpload('editor_images', $category_images_array, 'image');
            if(!empty($images)){
                $image_file = $images;
            } else {
                $this->session->setFlashdata('msg1', 'Please upload an image');
                return redirect()->to(current_url());
            }
            //pr($image_file);
            /* category images upload */
            if(count($image_file)>0){
                for($k=0;$k<count($image_file);$k++){
                    $postData   = array(
                                        'image_file'                => $image_file[$k]
                                        );
                    $record     = $this->data['model']->save_data('sms_images', $postData, '', 'id');
                }
            }                        
            $this->session->setFlashdata('success_message', 'Images inserted successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/manage_image');
        }

        echo $this->layout_after_login($title,$page_name,$data);
    }
}