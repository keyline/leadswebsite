<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CommonModel;

class Manage_blog extends BaseController
{
    //This can be accessed by all class methods
    private $model;
    // validation rules 
    private  $rules = [
        'blog_category' => 'required',
        'content_date' => 'required',
        'title' => 'required|min_length[3]|max_length[255]',
        'slug' => 'required|min_length[3]|max_length[255]',
        'short_description' => 'required|min_length[3]',
        'description' => 'required|min_length[3]',
        'meta_title' => 'max_length[255]',
        'meta_keyword' => 'max_length[255]',
    ];

    /*
     'meta_description' => 'regex_match[/^(?!.*<script.*?>).*$/i]',
        'content.*' => 'required|min_length[3]|max_length[255]|regex_match[/^(?!.*<script.*?>).*$/i]',
        'summary.*' => 'required|min_length[3]|max_length[255]|regex_match[/^(?!.*<script.*?>).*$/i]',
        'content_description.*' => 'required|min_length[3]|max_length[3000]|regex_match[/^(?!.*<script.*?>).*$/i]',
    */
    public function __construct()
    {
        $session = \Config\Services::session();
        if (!$session->get('is_admin_login')) {
            return redirect()->to('/Administrator');
        }
        $model = new CommonModel();
        $this->data = array(
            'model'         => $model,
            'session'       => $session,
            'module'        => 'Blog',
            'controller'    => 'manage_blog',
            'table_name'    => 'blogs',
            'primary_key'   => 'id'
        );
    }
    public function index()
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage ' . $this->data['module'];
        $page_name                  = 'blog/list';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['status!=' => 3], '', '', '', $order_by);
        if ($this->request->getMethod() == 'post') {
            // pr($this->request->getPost());
            $bulkData   = $this->request->getPost();
            // $bulkcount      =count($bulkData['draw']);
            for ($j = 0; $j < count($bulkData['draw']); $j++) {
                $id = $bulkData['draw'][$j];
                $postData = array(
                    'status' => 3
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
        $page_name                  = 'blog/add-edit';
        $data['row']                = [];
        $data['blogCats']           = $this->data['model']->find_data('blog_category', 'array', ['published!=' => 3]);
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getPost();

            $isValid = true;  // Initialize validation flag



            // Validation check
            if (!$this->validate($this->rules)) {
                $isValid = false;
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // File upload check if validation passed
            if ($isValid) {
                $file = $this->request->getFile('image');
                if ($file && $file->isValid()) {
                    $uploadArray = $this->common_model->upload_single_file('image', $file->getClientName(), 'blogs', 'image');
                    if (!$uploadArray['status']) {
                        $isValid = false;
                        $errorMessage = $uploadArray['message'];
                    } else {
                        $image = $uploadArray['newFilename'];
                    }
                } else {
                    $isValid = false;
                    $errorMessage = 'Please upload an image';
                }
            }

            // Redirect if there was an error
            if (!$isValid) {
                return redirect()->back()->withInput()->with('error_message', $errorMessage);
            }

            // Data processing and insertion if validation passed
            try {
                $fields1 = [
                    'blog_category'             => $postData['blog_category'],
                    'title'                     => $postData['title'],
                    'slug'                      => clean($postData['slug']),
                    'content_date'              => date_format(date_create($postData['content_date']), "Y-m-d"),
                    'short_description'         => $postData['short_description'],
                    'description'               => $postData['description'],
                    'meta_title'                => $postData['meta_title'],
                    'meta_keyword'              => $postData['meta_keyword'],
                    'meta_description'          => $postData['meta_description'],
                    'image'                     => $image
                ];

                $blogId = $this->data['model']->save_data($this->data['table_name'], $fields1, '', $this->data['primary_key']);

                /* blog content */

                $content_description   = $postData['content_description'];
                $summary               = $postData['summary'];
                $content               = $postData['content'];

                if (count($content_description)) {
                    for ($k = 0; $k < count($content_description); $k++) {
                        if ($content_description[$k]) {
                            $fields2 = [
                                'blog_id'                   => $blogId,
                                'table_of_content'          => $content[$k],
                                'table_of_content_slug'     => clean($content[$k]),
                                'summary'                   => $summary[$k],
                                'content'                   => $content_description[$k],
                            ];


                            $contentId = $this->data['model']->save_data('blog_contents', $fields2, '', 'content_id');
                        }
                    }
                }
                /* blog content */

                return redirect()->to('/admin/' . $this->data['controller'])->with('success_message', 'Inserted successfully');
            } catch (\Exception $e) {
                log_message('error', $e->getMessage()); // Log the error message
                return redirect()->back()->withInput()->with('error_message', 'An unexpected error occurred');
            }
        }

        echo $this->layout_after_login($title, $page_name, $data);
    }
    public function edit($id)
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Edit';
        $title                      = $data['action'] . ' ' . $this->data['module'];
        $page_name                  = 'blog/add-edit';
        $conditions                 = array($this->data['primary_key'] => $id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);
        $data['blogCats']           = $this->data['model']->find_data('blog_category', 'array', ['published!=' => 3]);
        $data['blogContents']       = $this->data['model']->find_data('blog_contents', 'array', ['blog_id' => $id]);

        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getPost();

            $isValid = true;  // Initialize validation flag


            // Validation check
            if (!$this->validate($this->rules)) {
                $isValid = false;
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
                // $errorMessage = 'fill all inputs';
            }



            // File upload check if validation passed
            if ($isValid) {
                $file = $this->request->getFile('image');
                if ($file && $file->isValid()) {
                    $uploadArray = $this->common_model->upload_single_file('image', $file->getClientName(), 'blogs', 'image');
                    if (!$uploadArray['status']) {
                        $isValid = false;
                        $errorMessage = $uploadArray['message'];
                    } else {
                        $image = $uploadArray['newFilename'];
                    }
                } else {
                    $image = $data['row']->image;
                }
            }

            // Redirect if there was an error
            if (!$isValid) {
                return redirect()->back()->withInput()->with('error_message', $errorMessage);
            }

            // Data processing and insertion if validation passed
            try {
                $fields1 = [
                    'blog_category'             => $postData['blog_category'],
                    'title'                     => $postData['title'],
                    'slug'                      => clean($postData['slug']),
                    'content_date'              => date_format(date_create($postData['content_date']), "Y-m-d"),
                    'short_description'         => $postData['short_description'],
                    'description'               => $postData['description'],
                    'meta_title'                => $postData['meta_title'],
                    'meta_keyword'              => $postData['meta_keyword'],
                    'meta_description'          => $postData['meta_description'],
                    'image'                     => $image
                ];

                $this->data['model']->save_data($this->data['table_name'], $fields1, $id, $this->data['primary_key']);

                $blogId = $id;

                $this->data['model']->removeData('blog_contents', $id, 'blog_id');
                /* blog content */

                $content_description   = $postData['content_description'];
                $summary               = $postData['summary'];
                $content               = $postData['content'];

                if (count($content_description)) {
                    for ($k = 0; $k < count($content_description); $k++) {
                        if ($content_description[$k]) {
                            $fields2 = [
                                'blog_id'                   => $blogId,
                                'table_of_content'          => $content[$k],
                                'table_of_content_slug'     => clean($content[$k]),
                                'summary'                   => $summary[$k],
                                'content'                   => $content_description[$k],
                            ];


                            $contentId = $this->data['model']->save_data('blog_contents', $fields2, '', 'content_id');
                        }
                    }
                }
                /* blog content */

                return redirect()->to('/admin/' . $this->data['controller'])->with('success_message', 'Update successfully');
            } catch (\Exception $e) {
                log_message('error', $e->getMessage()); // Log the error message
                return redirect()->back()->withInput()->with('error_message', 'An unexpected error occurred');
            }
        }
        echo $this->layout_after_login($title, $page_name, $data);
    }
    public function confirm_delete($id)
    {
        $postData = array(
            'status' => 3
        );
        $updateData = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'] . ' deleted successfully');
        return redirect()->to('/admin/' . $this->data['controller']);
    }
    public function deactive($id)
    {
        $postData = array(
            'status' => 0
        );
        $updateData = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'] . ' deactivated successfully');
        return redirect()->to('/admin/' . $this->data['controller']);
    }
    public function active($id)
    {
        $postData = array(
            'status' => 1
        );
        $updateData = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'] . ' activated successfully');
        return redirect()->to('/admin/' . $this->data['controller']);
    }
    // public function manage_image()
    // {
    //     $data['moduleDetail']       = $this->data;
    //     $title                      = 'Manage Images';
    //     $page_name                  = 'blog/manage-images';
    //     $order_by[0]                = array('field' => 'id', 'type' => 'desc');
    //     $data['rows']               = $this->data['model']->find_data('sms_images', 'array', ['status!=' => 3], '', '', '', $order_by);

    //     if ($this->request->getMethod() == 'post') {
    //         /* category images upload */
    //         $category_images_array  = $this->request->getFiles('image_file')['image_file'];
    //         $images                 = $this->data['model']->commonFileArrayUpload('editor_images', $category_images_array, 'image');
    //         if (!empty($images)) {
    //             $image_file = $images;
    //         } else {
    //             $this->session->setFlashdata('msg1', 'Please upload an image');
    //             return redirect()->to(current_url());
    //         }
    //         //pr($image_file);
    //         /* category images upload */
    //         if (count($image_file) > 0) {
    //             for ($k = 0; $k < count($image_file); $k++) {
    //                 $postData   = array(
    //                     'image_file'                => $image_file[$k]
    //                 );
    //                 $record     = $this->data['model']->save_data('sms_images', $postData, '', 'id');
    //             }
    //         }
    //         $this->session->setFlashdata('success_message', 'Images inserted successfully');
    //         return redirect()->to('/admin/' . $this->data['controller'] . '/manage_image');
    //     }

    //     echo $this->layout_after_login($title, $page_name, $data);
    // }
}
