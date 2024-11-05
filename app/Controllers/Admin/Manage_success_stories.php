<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;
class Manage_success_stories extends BaseController {

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
            'module'        => 'Success Story',
            'controller'    => 'manage_success_stories',
            'table_name'    => 'sms_success_stories',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'success-story/list';        
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3 ], '', '', '', $order_by);        
        echo $this->layout_after_login($title,$page_name,$data);
    }
    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'].' '.$this->data['module'];
        $page_name                  = 'success-story/add-edit';        
        $data['row'] = [];
        $data['courses']            = $this->data['model']->find_data('sms_courses', 'array', ['published!=' => 3 ]);
        if($this->request->getMethod() == 'post') {
            //pr($this->request->getFile('image'));
            //pr($this->request->getPost());
            /* image upload */
            $file = $this->request->getFile('image');
            $originalName = $file->getClientName();            
            $fieldName = 'image';
            if($originalName!='') {
                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'success_story','image');                
                if($upload_array['status']) {
                    $image = $upload_array['newFilename'];
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
            $course_name    = $this->request->getPost('course_name');
            $courseName = [];
            if(count($course_name)>0){
                for($i=0;$i<count($course_name);$i++){
                    if($course_name[$i] != ''){
                         $courseName[] = $course_name[$i];
                    }
                }
            }
            $rank           = $this->request->getPost('rank');
            $rankInfo = [];
            if(count($rank)>0){
                for($i=0;$i<count($rank);$i++){
                    if($rank[$i] != ''){
                         $rankInfo[] = $rank[$i];
                    }
                }
            }
            $postData   = array(
                                'name'                => $this->request->getPost('name'),
                                'description'         => $this->request->getPost('description'),
                                'image'               => $image,
                                'course_name'         => json_encode($courseName),
                                'rank'                => json_encode($rankInfo),
                                );
            //pr($postData);
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
        $page_name                  = 'success-story/add-edit';        
        $conditions                 = array($this->data['primary_key']=>$id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);
        $data['courses']            = $this->data['model']->find_data('sms_courses', 'array', ['published!=' => 3 ]);
        if($this->request->getMethod() == 'post') {            
            /* image upload */
            $file = $this->request->getFile('image');
            $originalName = $file->getClientName();
            $fieldName = 'image';
            if($originalName!='') {

                if($data['row']->image!='') {
                    unlink('uploads/success_story/'.$data['row']->image);
                }                

                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'success_story','image');
                if($upload_array['status']) {
                    $image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $image = $data['row']->image;
            }
            /* image upload */
            $course_name    = $this->request->getPost('course_name');
            $courseName = [];
            if(count($course_name)>0){
                for($i=0;$i<count($course_name);$i++){
                    if($course_name[$i] != ''){
                         $courseName[] = $course_name[$i];
                    }
                }
            }
            $rank           = $this->request->getPost('rank');
            $rankInfo = [];
            if(count($rank)>0){
                for($i=0;$i<count($rank);$i++){
                    if($rank[$i] != ''){
                         $rankInfo[] = $rank[$i];
                    }
                }
            }
            $postData = array(
                    'name'                  => $this->request->getPost('name'),
                    'description'           => $this->request->getPost('description'),
                    'image'                 => $image,
                    'course_name'           => json_encode($courseName),
                    'rank'                  => json_encode($rankInfo),
                    'updated_at'            => date('Y-m-d h:i:s')
                    );
            //pr($postData);
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