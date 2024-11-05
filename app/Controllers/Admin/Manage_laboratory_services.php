<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;
class Manage_laboratory_services extends BaseController {

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
            'module'        => 'Laboratories',
            'controller'    => 'manage_laboratory_services',
            'table_name'    => 'sms_laboratory_services',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'laboratory/laboratory-outsourcing-services';
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', ['published!=' => 3, 'page_name' => 'LABORATORIES']);
        if($this->request->getMethod() == 'post') {
            /* image upload */
            $file           = $this->request->getFile('page_banner');
            $originalName   = $file->getClientName();
            $fieldName      = 'page_banner';
            if($originalName!='') {

                if($data['row']->page_banner!='') {
                    unlink('uploads/laboratory/'.$data['row']->page_banner);
                }

                $upload_array = $this->common_model->upload_single_file($fieldName,$originalName,'laboratory','image');
                if($upload_array['status']) {
                    $page_banner = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $page_banner = $data['row']->page_banner;
            }
            /* image upload */
            $postData = array(
                    'title'                         => $this->request->getPost('title'),
                    'central_laboratory'            => $this->request->getPost('central_lab'),
                    'food_environment'              => $this->request->getPost('env_lab'),
                    'description1'                  => $this->request->getPost('description'),
                    'description2'                  => $this->request->getPost('description2'),
                    'page_banner'                   => $page_banner,
                    'updated_at'                    => date('Y-m-d h:i:s')
                    );
            $record = $this->common_model->save_data($this->data['table_name'], $postData, 1, $this->data['primary_key']);
            $this->session->setFlashdata('success_message', $this->data['module'].' updated successfully');
            return redirect()->to('/admin/'.$this->data['controller']);
        }
        echo $this->layout_after_login($title,$page_name,$data);
    }  
}