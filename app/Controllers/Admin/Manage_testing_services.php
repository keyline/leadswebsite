<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
class Manage_testing_services extends BaseController {

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
            'module'        => 'Services',
            'controller'    => 'manage_testing_services',
            'table_name'    => 'sms_testing_services',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'testing-services/list';        
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'testing-services/add-edit';        
        $data['row']                = [];
        $order_by[0]                = array('field' => 'title', 'type' => 'ASC');
        $data['parents']            = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);
        if($this->request->getMethod() == 'post') {
            // echo "hello";die;
            // $field_values_array = $_POST['field_name'];         
            $slug  = strtolower($this->data['model']->clean($this->request->getPost('title')));
            $slug2 = strtolower($this->data['model']->clean($this->request->getPost('title2')));
            // $field = $this->request->getPost(['field_name']);
            // $title = $this->request->getPost(['title']);
            // $color_code = $this->request->getPost(['color_code']);
            // $final_field = json_encode($field);
            // $final_title = json_encode($title);
            // $final_color_code = json_encode($color_code);
            /* image upload */
            $file = $this->request->getFile('banner_image');
            $originalName = $file->getClientName();
            $fieldName = 'banner_image';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'testing-services','image');
                if($upload_array['status']) {
                    $banner_image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $this->session->setFlashdata('msg1', 'Please upload an image');
                return redirect()->to(current_url());
            }
            /* image upload */
            $postData   = array(
                                'title'                 => $this->request->getPost('title'),
                                'title2'                => $this->request->getPost('title2'),
                                'slug'                  => $slug,
                                'slug2'                 => $slug2,
                                'description'           => $this->request->getPost('description'),
                                'description2'          => $this->request->getPost('description2'),
                                'banner_image'          => $banner_image,
                                // 'stringent_system'      => $final_field,
                                // 'color_code'            => $final_title,
                                // 'steps_to_quality'      => $final_color_code,
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
        $page_name                  = 'testing-services/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);
        $order_by[0]                = array('field' => 'title', 'type' => 'ASC');
        $data['parents']            = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);
        if($this->request->getMethod() == 'post') {     
            $slug = strtolower($this->data['model']->clean($this->request->getPost('title')));
            $slug2 = strtolower($this->data['model']->clean($this->request->getPost('title2')));
            /* image upload */
            $file = $this->request->getFile('banner_image');
            $originalName = $file->getClientName();
            $fieldName = 'banner_image';
            if($originalName!='') {
                if($data['row']->banner_image!='') {
                    unlink('uploads/testing-services/'.$data['row']->banner_image);  
                }
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'testing-services','image');
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
            $stringent_system   = $this->request->getPost('stringent_system');
            $color_code         = $this->request->getPost('color_code');
            $steps_to_quality   = $this->request->getPost('steps_to_quality');
            $postData = array(
                    'title'              => $this->request->getPost('title'),
                    'title2'             => $this->request->getPost('title2'),
                    'slug'               => $slug,
                    'slug2'              => $slug2,
                    'description'        => $this->request->getPost('description'),
                    'description2'       => $this->request->getPost('description2'),
                    'banner_image'       => $banner_image,
                    'stringent_system'   => json_encode(array_filter($stringent_system)),
                    'color_code'         => json_encode(array_filter($color_code)),
                    'steps_to_quality'   => json_encode(array_filter($steps_to_quality)),
                    'updated_at'         => date('Y-m-d h:i:s')
                    );
            //pr($postData);
            $record = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
            $this->session->setFlashdata('success_message', $this->data['module'].' updated successfully');
            return redirect()->to(current_url());
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