<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;

class Manage_video_media extends BaseController
{

    private $model;  //This can be accessed by all class methods
    public function __construct()
    {
        $session = \Config\Services::session();
        if (!$session->get('is_admin_login')) {
            return redirect()->to('/admin');
        }
        $model = new CommonModel();
        $this->data = array(
            'model'         => $model,
            'session'       => $session,
            'module'        => 'Video Media',
            'controller'    => 'manage_video_media',
            'table_name'    => 'sms_client',
            'primary_key'   => 'id'
        );
    }

    private function getMediaFiles($category_id = 0, $media_id = null)
    {
        // Initialize the join condition array
        $join = [
            [
                'table' => 'media_file',              // The table to join
                'table_master' => 'media',            // The main table
                'field' => 'media_id',                // media_file.media_id
                'field_table_master' => 'id',         // media.id
                'type' => 'inner'
            ]
        ];

        // Initialize conditions array
        $conditions = ['media.published !=' => 3];

        $returnType = 'array';

        // Apply category filter if provided
        if ($category_id) {
            $conditions['media.category_id'] = $category_id; // Filter by category_id if given
            $returnType = 'array';
        }

        // Apply media_id filter if provided
        if ($media_id) {
            $conditions['media.id'] = $media_id; // Filter by media.id if given
            $returnType = 'row';
        }

        // Define the fields you want to select
        $select = 'media.*, media_file.file, media_file.youtube_link';

        // Define the order by field
        $order_by = [['field' => 'media.added_on', 'type' => 'DESC']];

        // Fetch the data using the common_model
        $mediaFiles = $this->common_model->find_data(
            'media',             // Table name
            $returnType,             // Return type as array
            $conditions,         // Conditions for filtering
            $select,             // Select columns
            $join,               // Join with categories and media_file
            '',                  // No grouping
            $order_by
        );

        // Return the result
        return $mediaFiles;
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
        $page_name                  = 'media/list';
        $data['medias'] = [
            1 => MEDIA_CATEGORIES[1],
            5 => MEDIA_CATEGORIES[5]
        ];
        echo $this->layout_after_login($title, $page_name, $data);
    }

    public function list($category)
    {
        $data['category']           = htmlspecialchars($category, ENT_QUOTES, 'UTF-8');
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage ' . $this->data['module'];
        $page_name                  = 'media/video-list';
        $data['rows']               = $this->getMediaFiles($data['category']);

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
            return redirect()->back();
        }

        echo $this->layout_after_login($title, $page_name, $data);
    }

    public function add()
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Add';
        $title                      = $data['action'] . ' ' . $this->data['module'];
        $page_name                  = 'media/video-add-edit';
        $data['row'] = [];
        if ($this->request->getMethod() == 'post') {
            /* image upload */
            $file = $this->request->getFile('client_logo');
            $originalName = $file->getClientName();
            $fieldName = 'client_logo';
            if ($originalName != '') {
                $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, 'client', 'image');
                if ($upload_array['status']) {
                    $client_logo = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('error_message', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $this->session->setFlashdata('error_message', 'Please upload an image');
                //return redirect()->to('/admin/'.$this->data['controller'].'/add');
                return redirect()->to(current_url());
            }
            /* image upload */
            $postData   = array(
                'client_type'              => null, //$this->request->getPost('client_type'),
                'client_name'              => $this->request->getPost('client_name'),
                'client_logo'              => $client_logo,
            );
            //pr($postData, false);
            $record     = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);
            // $db = \Config\Database::connect();
            // $query = $db->getLastQuery();
            // echo (string)$query;
            // die;
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
        $page_name                  = 'media/video-add-edit';
        $conditions                 = array($this->data['primary_key'] => $id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);

        if ($this->request->getMethod() == 'post') {
            /* image upload */
            $file = $this->request->getFile('client_logo');
            $originalName = $file->getClientName();
            $fieldName = 'client_logo';
            if ($originalName != '') {

                if ($data['row']->client_logo != '') {
                    unlink('uploads/client/' . $data['row']->client_logo);
                }

                $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, 'client', 'image');
                if ($upload_array['status']) {
                    $client_logo = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('error_message', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $client_logo = $data['row']->client_logo;
            }
            /* image upload */
            $postData = array(
                'client_type'              => null, //$this->request->getPost('client_type'),
                'client_name'              => $this->request->getPost('client_name'),
                'client_logo'              => $client_logo,
                'updated_at'                => date('Y-m-d h:i:s')
            );
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
