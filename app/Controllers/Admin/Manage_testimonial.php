<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;

class Manage_testimonial extends BaseController
{
    private $model;  //This can be accessed by all class methods

    public function __construct()
    {
        $session = \Config\Services::session();
        if (!$session->get('is_admin_login')) {
            header("Location:" . base_url() . '/Admin');
        }
        $model = new CommonModel();
        $this->data = array(
            'model'         => $model,
            'session'       => $session,
            'module'        => 'Testimonial',
            'controller'    => 'manage_testimonial',
            'table_name'    => 'sms_testimonials',
            'primary_key'   => 'id'
        );
    }

    private  function matchYoutubeUrl($url)
    {
        $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/';
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
        return false;
    }

    public function index()
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage ' . $this->data['module'];
        $page_name                  = 'testimonial/list';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3], '', '', '', $order_by);

        /* status update */
        if ($this->request->getMethod() == 'post') {
            // pr($this->request->getPost());
            $bulkData   = $this->request->getPost();
            // $bulkcount      =count($bulkData['draw']);
            for ($j = 0; $j < count($bulkData['draw']); $j++) {
                $id = $bulkData['draw'][$j];
                $postData = array(
                    'published' => 3
                );
                $updateData = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
                // echo $this->db->getLastQuery();die;
            }
            $this->session->setFlashdata('success_message', $this->data['module'] . ' deleted successfully');
            return redirect()->to('/admin/' . $this->data['controller']);
        }

        echo $this->layout_after_login($title, $page_name, $data);
    }
    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'] . ' ' . $this->data['module'];
        $page_name                  = 'testimonial/add-edit';
        $data['row'] = [];
        if ($this->request->getMethod() == 'post') {

            /* image upload */
            $file = $this->request->getFile('image');
            $originalName = $file->getClientName();
            $fieldName = 'image';
            if ($originalName != '') {
                $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, 'testimonials', 'image');
                if ($upload_array['status']) {
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
            $postData   = [
                'name'               => $this->request->getPost('name'),
                'place_name'         => $this->request->getPost('place'),
                'designation'        => $this->request->getPost('designation'),
                'type'               => $this->request->getPost('type'),
                'image'              => $image,
            ];
            if ($postData['type'] == 1)
                $postData['comments'] = $this->request->getPost('comments');
            else {
                $postData['video_url'] = $this->matchYoutubeUrl($this->request->getPost('url'));
                if (!$postData['video_url'])
                    return redirect()->back()->with('error_message', 'Please provide a valid youtube link');
            }

            $record     = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);

            $this->session->setFlashdata('success_message', $this->data['module'] . ' inserted successfully');
            return redirect()->to('/admin/' . $this->data['controller']);
        }
        echo $this->layout_after_login($title, $page_name, $data);
    }
    public function edit($id)
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Edit';
        $title                      = $data['action'] . ' ' . $this->data['module'];
        $page_name                  = 'testimonial/add-edit';
        $conditions                 = array($this->data['primary_key'] => $id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);

        if ($this->request->getMethod() == 'post') {
            /* image upload */
            $file = $this->request->getFile('image');
            $originalName = $file->getClientName();
            $fieldName = 'image';
            if ($originalName != '') {

                if ($data['row']->image != '') {
                    unlink('uploads/testimonials/' . $data['row']->image);
                }

                $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, 'testimonials', 'image');
                if ($upload_array['status']) {
                    $image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('msg1', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $image = $data['row']->image;
            }

            /* image upload */
            $postData   = [
                'name'               => $this->request->getPost('name'),
                'place_name'         => $this->request->getPost('place'),
                'designation'        => $this->request->getPost('designation'),
                'type'               => $this->request->getPost('type'),
                'image'              => $image,
            ];
            if ($postData['type'] == 1)
                $postData['comments'] = $this->request->getPost('comments');
            else {
                $postData['video_url'] = $this->matchYoutubeUrl($this->request->getPost('url'));
                if (!$postData['video_url'])
                    return redirect()->back()->with('error_message', 'Please provide a valid youtube link');
            }

            $record = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
            $this->session->setFlashdata('success_message', $this->data['module'] . ' updated successfully');
            return redirect()->to('/admin/' . $this->data['controller']);
        }
        echo $this->layout_after_login($title, $page_name, $data);
    }
    public function confirm_delete($id)
    {
        $postData = array(
            'published' => 3
        );
        $updateData = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'] . ' deleted successfully');
        return redirect()->to('/admin/' . $this->data['controller']);
    }
    public function deactive($id)
    {
        $postData = array(
            'published' => 0
        );
        $updateData = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'] . ' deactivated successfully');
        return redirect()->to('/admin/' . $this->data['controller']);
    }
    public function active($id)
    {
        $postData = array(
            'published' => 1
        );
        $updateData = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'] . ' activated successfully');
        return redirect()->to('/admin/' . $this->data['controller']);
    }
}
