<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
class Manage_project extends BaseController {

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
            'module'        => 'Project',
            'controller'    => 'manage_project',
            'table_name'    => 'sms_projects',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'project/list';        
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
        $page_name                  = 'project/add-edit';        
        $data['row']                = [];
        $data['projectCats']           = $this->data['model']->find_data('project_category', 'array', ['published!=' => 3]);
        if($this->request->getMethod() == 'post') {
            $slug = strtolower($this->data['model']->clean($this->request->getPost('title')));
            /* category main image upload */
            $file = $this->request->getFile('image');
            $originalName = $file->getClientName();
            $fieldName = 'image';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'projects','image');
                if($upload_array['status']) {
                    $image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            }
            else {
                // $this->session->setFlashdata('msg1', 'Please upload an image');
                // return redirect()->to(current_url());
            }
            /* category main image upload */        
            if($originalName!=''){
                $postData   = array(
                                'project_category'  => $this->request->getPost('project_category'),
                                'title'             => $this->request->getPost('title'),
                                'slug'              => $slug,
                                'content_date'      => date_format(date_create($this->request->getPost('content_date')), "Y-m-d"),
                                'description'       => $this->request->getPost('description'),
                                'image'             => $image
                                
                                );
                
            }else{
                $postData   = array(
                                'project_category'  => $this->request->getPost('project_category'),
                                'title'             => $this->request->getPost('title'),
                                'slug'              => $slug,
                                'content_date'      => date_format(date_create($this->request->getPost('content_date')), "Y-m-d"),
                                'description'       => $this->request->getPost('description'),
                                );
            }
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
        $page_name                  = 'project/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);
        $data['projectCats']           = $this->data['model']->find_data('project_category', 'array', ['published!=' => 3]);
        if($this->request->getMethod() == 'post') {            
            $slug = strtolower($this->data['model']->clean($this->request->getPost('title')));
            /* category icon */            
            $file = $this->request->getFile('image');
            $originalName = $file->getClientName();
            $fieldName = 'image';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'projects','image');
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
                    'project_category'     => $this->request->getPost('project_category'),
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
    /* image gallery */
    public function image_list($id) 
    {
        $data['moduleDetail']       = $this->data;
        $data['project']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
        $title                      = 'Manage Image Gallery Of '.$data['project']->title;
        $page_name                  = 'project/image-list';        
        $order_by[0]                = array('field' => 'rank', 'type' => 'asc');
        $data['rows']               = $this->data['model']->find_data('image_gallery', 'array', ['project_id' => $id, 'published!=' => 3], '', '', '', $order_by);

        if($this->request->getPost('mode') == 'bulklead'){
            if($this->request->getPost('image_id') == ''){
                $this->session->setFlashdata('error_message', 'you need to select atleast one image for delete !!!');
                return redirect()->to(current_url());
            } else {                    
                $image_id = $this->request->getPost('image_id');
                if(!empty($image_id)){
                    for($k=0;$k<count($image_id);$k++){
                        $postData5   = array(
                                            'published'                  => 3
                                            );
                        //pr($postData);
                        $this->data['model']->save_data('image_gallery', $postData5, $image_id[$k], 'id');
                    }
                }
                $this->session->setFlashdata('success_message', 'Image(s) Succesfully Deleted !!!');
                return redirect()->to(current_url());
            }
            
        }
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function image_add($id)
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'].' Gallery Image';
        $page_name                  = 'project/add-edit-image';
        $data['row']                = [];
        $data['project_id']           = $id;
        $data['project']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);       
        //  print_r($data['projectCats']);
        if($this->request->getMethod() == 'post') {
            /* event gallery image */
                $banner_image_array  = $this->request->getFiles('image_file')['image_file'];
                $images              = $this->data['model']->commonFileArrayUpload('gallery', $banner_image_array, 'image');
                if(!empty($images)){
                    $banner_images = $images;
                } else {
                    $this->session->setFlashdata('error_message', 'Please upload an event gallery image');
                    return redirect()->to(current_url());
                }
                // pr($banner_images);die;
            /* event gallery image */
            if(count($banner_images)>0){
            for($i=0;$i<count($banner_images);$i++){
                $postData   = array(
                                    'project_id'                  => $id,                                    
                                    'image_file'                => $banner_images[$i],                                   
                                    'rank'                      => $this->request->getPost('rank'),                                    
                                    );
                //pr($postData);
                $event_id     = $this->data['model']->save_data('image_gallery', $postData, '', 'id');
            } }                
            $this->session->setFlashdata('success_message', 'Project Gallery Image inserted successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/image_list/'.$id);
        }
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function image_edit($id, $video_id)
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Edit';
        $title                      = $data['action'].' '.$this->data['module'].' Gallery Image';
        $page_name                  = 'project/add-edit-image';        
        $data['row']                = $this->data['model']->find_data('image_gallery', 'row', ['id' => $video_id]);
        $data['project_id']           = $id;
        $data['project']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
        if($this->request->getMethod() == 'post') {
            /* event banner */            
                $file = $this->request->getFile('image_file');
                $originalName = $file->getClientName();
                $fieldName = 'image_file';
                if($originalName!='') {
                    $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'gallery','image');
                    if($upload_array['status']) {
                        $image_file = $upload_array['newFilename'];
                    } else {
                        $this->session->setFlashdata('msg1', $upload_array['message']);
                        return redirect()->to(current_url());
                    }
                } else {
                    $image_file = $data['row']->image_file;
                }
            /* event banner */
            $postData   = array(
                                'project_id'                  => $id,                               
                                'image_file'                => $image_file,                             
                                'rank'                      => $this->request->getPost('rank'),                                
                                );
            // pr($postData);
            $event_id     = $this->data['model']->save_data('image_gallery', $postData, $video_id, 'id');
            $this->session->setFlashdata('success_message', 'Project Gallery Image updated successfully');
            return redirect()->to('/admin/'.$this->data['controller'].'/image_list/'.$id);
        }
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function image_delete($id, $video_id)
    {
        $postData = array(
                            'published' => 3
                        );
        $updateData = $this->common_model->save_data('image_gallery', $postData, $video_id, 'id');
        $this->session->setFlashdata('success_message', 'Project Gallery Image deleted successfully');
        return redirect()->to('/admin/'.$this->data['controller'].'/image_list/'.$id);
    }
    public function image_deactive($id, $video_id)
    {
        $postData = array(
                            'published' => 0
                        );
        $updateData = $this->common_model->save_data('image_gallery', $postData, $video_id, 'id');
        $this->session->setFlashdata('success_message', 'Project Gallery Image deactivated successfully');
        return redirect()->to('/admin/'.$this->data['controller'].'/image_list/'.$id);
    }
    public function image_active($id, $video_id)
    {
        $postData = array(
                            'published' => 1
                        );
        $updateData = $this->common_model->save_data('image_gallery', $postData, $video_id, 'id');
        $this->session->setFlashdata('success_message', 'Project Gallery Image deactivated successfully');
        return redirect()->to('/admin/'.$this->data['controller'].'/image_list/'.$id);
    }

    public function delete_image($id)
    {
        $data['moduleDetail']       = $this->data;
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);        
         if($data['row']->image!='') {
                unlink('uploads/projects/'.$data['row']->image);  
            } 
        $postData = array(
            'image' => ''
        );
        $updateData = $this->common_model->save_data($this->data['table_name'],$postData,$id,$this->data['primary_key']);
         return redirect()->to('/admin/' . $this->data['controller'] . '/edit/' . $id);
    }
}