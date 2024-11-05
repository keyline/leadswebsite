<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;
class Manage_commodity extends BaseController {

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
            'module'        => 'Commodity',
            'controller'    => 'manage_commodity',
            'table_name'    => 'commodities',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'commodity/list';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3], '', '', '', $order_by);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'commodity/add-edit';
        $data['row']                = [];
        $data['commodity_details']  = [];
        if($this->request->getMethod() == 'post') {
            /* image upload */
            $file = $this->request->getFile('commodity_icon');
            $originalName = $file->getClientName();
            $fieldName = 'commodity_icon';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'commodity','image');
                if($upload_array['status']) {
                    $commodity_icon = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('error_message', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $this->session->setFlashdata('error_message', 'Please upload an image');
                return redirect()->to(current_url());
            }
            /* image upload */
            $slug = $this->data['model']->clean(strtolower($this->request->getPost('name')));
            $postData   = array(
                                'name'                  => strtoupper($this->request->getPost('name')),
                                'slug'                  => $slug,
                                'commodity_icon'        => $commodity_icon,
                                );            
            $record     = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);
            if($record){
                $title                  = $this->request->getPost('title');
                $short_description      = $this->request->getPost('short_description');                
                $post_image_array       = $this->request->getFiles('post_image')['post_image'];
                $images                 = $this->common_model->commonFileArrayUpload('commodity', $post_image_array, 'image');
                if(!empty($images)){
                    $image_file = $images;
                } else {
                    $this->session->setFlashdata('error_message', 'Please upload images');
                    return redirect()->to(current_url());
                }
                if(count($image_file)>0){
                    for($k=0;$k<count($image_file);$k++){
                        $postData2   = array(
                                            'commodity_id'             => $id, 
                                            'title'                    => $title[$k], 
                                            'short_description'        => $short_description[$k], 
                                            'post_image'               => $image_file[$k]
                                            );
                        $this->data['model']->save_data('commodity_details', $postData2, '', 'id');
                    }
                }
            }
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
        $page_name                  = 'commodity/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);
        $data['commodity_details']  = $this->data['model']->find_data('commodity_details', 'array', ['commodity_id' => $id]);
        if($this->request->getMethod() == 'post') {
            /* image upload */
            $file = $this->request->getFile('commodity_icon');
            $originalName = $file->getClientName();
            $fieldName = 'commodity_icon';
            if($originalName!='') {

                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'commodity','image');
                if($upload_array['status']) {
                    $commodity_icon = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('error_message', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $commodity_icon = $data['row']->commodity_icon;
            }
            /* image upload */
            $slug = $this->data['model']->clean(strtolower($this->request->getPost('name')));
            $postData   = array(
                'name'                  => strtoupper($this->request->getPost('name')),
                'commodity_icon'        => $commodity_icon,
                'updated_at'            => date('Y-m-d h:i:s')
                );                                
            $record = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
            $this->common_model->delete_data('commodity_details', $id, 'commodity_id');
            if($id){
                $title                  = $this->request->getPost('title');
                $short_description      = $this->request->getPost('short_description');                
                $post_image_array       = $this->request->getFiles('post_image')['post_image'];
                $images                 = $this->common_model->commonFileArrayUpload('commodity', $post_image_array, 'image');
                if(!empty($images)){
                    $image_file = $images;
                } else {
                    $this->session->setFlashdata('error_message', 'Please upload images');
                    return redirect()->to(current_url());
                }
                if(count($image_file)>0){
                    for($k=0;$k<count($image_file);$k++){
                        $postData2   = array(
                                            'commodity_id'             => $id, 
                                            'title'                    => $title[$k], 
                                            'short_description'        => $short_description[$k], 
                                            'post_image'               => $image_file[$k]
                                            );
                        //pr($postData2, false);
                        $this->data['model']->save_data('commodity_details', $postData2, '', 'id');
                    }
                }
            }
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