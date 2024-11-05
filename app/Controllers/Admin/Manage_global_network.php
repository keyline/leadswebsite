<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
class Manage_global_network extends BaseController {

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
            'module'        => 'Global Network',
            'controller'    => 'manage_global_network',
            'table_name'    => 'sms_global_networks',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'global-network/list';        
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'global-network/add-edit';        
        $data['row']                = [];
        $order_by[0]                = array('field' => 'name', 'type' => 'ASC');
        $data['countries']          = $this->data['model']->find_data('sms_countries', 'array', ['published!=' => 3], '', '', '', $order_by);
        $data['globalContacts']     = [];
        if($this->request->getMethod() == 'post') {            
            $slug = strtolower($this->data['model']->clean($this->request->getPost('title')));
            /* image upload */
            $file = $this->request->getFile('banner_image');
            $originalName = $file->getClientName();
            $fieldName = 'banner_image';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'global-network','image');
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
                                'country_id'            => $this->request->getPost('country_id'),
                                'title'                 => $this->request->getPost('title'),
                                'banner_image'          => $banner_image,
                                'short_description'     => $this->request->getPost('short_description'),
                                'description'           => $this->request->getPost('description'),
                                );
            $record     = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);
            /* contact details */
            $contact_title              = $this->request->getPost('contact_title');
            $contact_description        = $this->request->getPost('contact_description');
            $contact_map                = $this->request->getPost('contact_map');
            $is_ho                      = $this->request->getPost('is_ho');
            $this->data['model']->delete_data('sms_global_contacts', $this->request->getPost('country_id'), 'country_id');
            if(count($contact_title)>0){
                for($i=0;$i<count($contact_title);$i++){
                    if($contact_title[$i] != ''){
                        $fields   = array(
                                            'country_id'            => $this->request->getPost('country_id'),
                                            'contact_title'         => $contact_title[$i],
                                            'contact_description'   => $contact_description[$i],
                                            'contact_map'           => $contact_map[$i],
                                            'is_ho'                 => $is_ho[$i],
                                        );
                        $insert_data     = $this->data['model']->save_data('sms_global_contacts', $fields, '', 'contact_id');
                    }
                }
            }
            /* contact details */            
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
        $page_name                  = 'global-network/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);

        $conditions                 = array('country_id'=>$data['row']->country_id);
        $data['globalContacts']     = $this->data['model']->find_data('sms_global_contacts', 'array', $conditions);

        $order_by[0]                = array('field' => 'name', 'type' => 'ASC');
        $data['countries']          = $this->data['model']->find_data('sms_countries', 'array', ['published!=' => 3], '', '', '', $order_by);
        if($this->request->getMethod() == 'post') {
            
            $slug = strtolower($this->data['model']->clean($this->request->getPost('title')));
            /* image upload */
            $file = $this->request->getFile('banner_image');
            $originalName = $file->getClientName();
            $fieldName = 'banner_image';
            if($originalName!='') {
                // if($data['row']->banner_image!='') {
                //     unlink('uploads/global-network/'.$data['row']->banner_image);  
                // }
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'global-network','image');
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
                    'country_id'            => $this->request->getPost('country_id'),
                    'title'                 => $this->request->getPost('title'),
                    'banner_image'          => $banner_image,
                    'short_description'     => $this->request->getPost('short_description'),
                    'description'           => $this->request->getPost('description'),
                    'updated_at'            => date('Y-m-d h:i:s')
                    );
            $record = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
            //pr($this->request->getPost());
            /* contact details */
            $contact_title              = $this->request->getPost('contact_title');
            $contact_description        = $this->request->getPost('contact_description');
            $contact_map                = $this->request->getPost('contact_map');
            $is_ho                      = $this->request->getPost('is_ho');
             $this->data['model']->delete_data('sms_global_contacts', $this->request->getPost('country_id'), 'country_id');
            if(count($contact_title)>0){
                for($i=0;$i<count($contact_title);$i++){
                    if($contact_title[$i] != ''){
                        $fields   = array(
                                            'country_id'            => $this->request->getPost('country_id'),
                                            'contact_title'         => $contact_title[$i],
                                            'contact_description'   => $contact_description[$i],
                                            'contact_map'           => $contact_map[$i],
                                            'is_ho'                 => $is_ho[$i],
                                        );
                        $insert_data     = $this->data['model']->save_data('sms_global_contacts', $fields, '', 'contact_id');
                    }
                }
            }
            /* contact details */      

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