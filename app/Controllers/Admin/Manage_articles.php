<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
class Manage_articles extends BaseController {

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
            'module'        => 'Articles',
            'controller'    => 'manage_articles',
            'table_name'    => 'sms_articles',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'article/list';        
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'article/add-edit';        
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
        $page_name                  = 'article/add-edit';        
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