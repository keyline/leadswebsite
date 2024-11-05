<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;

class Manage_package extends BaseController
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
            'module'        => 'Package',
            'controller'    => 'manage_package',
            'table_name'    => 'package',
            'primary_key'   => 'id'
        );
    }




    public function index()
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage ' . $this->data['module'];
        $page_name                  = 'package/list';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data[]   = '';
        //$data['rows']             = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3], '', '', '', $order_by);
        $data['rows']               = $this->common_model->getPackages();



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
        $page_name                  = 'package/add-edit';
        $data['category']           = $this->data['model']->find_data('package_category', 'array', ['published' => 1]);
        $data['row'] = [];
        if ($this->request->getMethod() == 'post') {
            $validation = \Config\Services::validation();
            $rules = [
                'category_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Package Category name field is required'
                    ]
                ],
                'package_name' => [
                    'rules' => 'required|min_length[3]|max_length[255]',
                    'errors' => [
                        'required' => 'Package Name field is required'
                    ]
                ]
            ];
            if ($this->validate($rules)) {
            /* feature image */
            $file = $this->request->getFile('feature_image');
            $originalName = $file->getClientName();
            //print_r($originalName);
            $fieldName = 'feature_image';
            if ($originalName != '') {
                $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, 'package', 'image');
                //pr($upload_array); die();
                if ($upload_array['status']) {
                    $feature_image = $upload_array['newFilename'];
                    // pr($feature_image); exit();
                } else {
                    $this->session->setFlashdata('error_message', 'Feature image is not uploaded');
                    return redirect()->to(current_url());
                }
            }
            else {
                $this->session->setFlashdata('error_message', 'Please upload a Feature image');
                //return redirect()->to('/admin/'.$this->data['controller'].'/add');
                 return redirect()->to(current_url());
            }
            /* feature image */
            /* banner image */
            $file = $this->request->getFile('banner_image');
            $originalName = $file->getClientName();
            $fieldName = 'banner_image';
            if ($originalName != '') {
                $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, 'package', 'image');
                if ($upload_array['status']) {
                    $banner_image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('error_message', 'Banner image is not uploaded');
                    return redirect()->to(current_url());
                }
             } 
            // else {
            //     $this->session->setFlashdata('error_message', 'Please upload a banner image');
            //     //return redirect()->to('/admin/'.$this->data['controller'].'/add');
            //     return redirect()->to(current_url());
            // }
            /* banner image */
            /* additional_images */
            $additional_images_titles        = $this->request->getPost('additional_images_titles');
            $add_images               = [];
            $all_image                    = $this->request->getFiles();
            $image_array                = $all_image['additional_images'];
            //$images_array                    = json_decode(json_encode($image_array), true);
            //pr($image_array); die();
            if (!empty($image_array)) {
                $uploadedFile       = $this->data['model']->commonFileArrayUpload('package/', $image_array, 'image');
                //var_dump($uploadedFile); 
                // die();
                if (!empty($uploadedFile)) {
                    $add_images    = $uploadedFile;
                } 
                // else {
                //     $this->session->setFlashdata('error_message', $upload_array['message']);
                //     return redirect()->to(current_url());
                // }
            }
            /* additional_images */


            $on_frontend = $this->request->getPost('show_on_fronend') != '' ? $this->request->getPost('show_on_fronend') : 0;
            $on_promos = $this->request->getPost('show_on_promos') != '' ? $this->request->getPost('show_on_promos') : 0;        

            $postData   = array(
                'category_id'                 => $this->request->getPost('category_id'),
                'package_name'                => $this->request->getPost('package_name'),
                'feature_image'               => $feature_image,
                'day_night'                   => $this->request->getPost('day_night'),
                'person'                      => $this->request->getPost('person'),
                'package_price'               => $this->request->getPost('package_price'),
                'description_heading'         => $this->request->getPost('description_heading'),
                'description2_heading'        => $this->request->getPost('description2_heading'),
                'description_points'          => json_encode(array_filter($this->request->getPost('description_points'))),
                'description2_points'         => json_encode(array_filter($this->request->getPost('description2_points'))),
                'banner_image'                => isset($banner_image)? $banner_image : '',
                'additional_images'           => json_encode($add_images),
                'additional_images_titles'    => json_encode($additional_images_titles),
                'country_name'                => $this->request->getPost('country_name'),
                'show_on_frontend'            => $on_frontend,
                'show_on_promos'              => $on_promos,
            );
            //pr($postData);
            $record     = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);
            $this->session->setFlashdata('success_message', $this->data['module'] . ' inserted successfully');
            return redirect()->to('/admin/' . $this->data['controller']);
            }else {

                $errors = $validation->listErrors();
                $this->session->setFlashdata('error_message', $errors);
            }                        
        }
        echo $this->layout_after_login($title, $page_name, $data);
    }
    public function edit($id)
    {

        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Edit';
        $title                      = $data['action'] . ' ' . $this->data['module'];
        $page_name                  = 'package/add-edit';
        $data['category']           = $this->data['model']->find_data('package_category', 'array', ['published' => 1]);
        $conditions                 = array($this->data['primary_key'] => $id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);

        if ($this->request->getMethod() == 'post') {
            $post_Data = $_POST;
            // pr($post_Data);
            /* feature image */
            $file = $this->request->getFile('feature_image');
            $originalName = $file->getClientName();
            $fieldName = 'feature_image';
            if ($originalName != '') {
                $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, 'package', 'image');
                //pr($upload_array); die();
                if ($upload_array['status']) {
                    $feature_image = $upload_array['newFilename'];
                    // pr($feature_image); exit();
                } else {
                    $this->session->setFlashdata('error_message', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $feature_image = $data['row']->feature_image;
            }
            /* feature image */
            /* banner image */
            $file = $this->request->getFile('banner_image');
            $originalName = $file->getClientName();
            $fieldName = 'banner_image';
            if ($originalName != '') {
                $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, 'package', 'image');
                if ($upload_array['status']) {
                    $banner_image = $upload_array['newFilename'];
                } else {
                    $this->session->setFlashdata('error_message', $upload_array['message']);
                    return redirect()->to(current_url());
                }
            } else {
                $banner_image = $data['row']->banner_image;
            }
            /* banner image */
            /* additional images */
            $additional_images               = [];
            $additional_images_titles        = $this->request->getPost('additional_images_titles');
            //pr($additional_images_titles);die();
            $titles                             = [];
            if (!empty($additional_images_titles)) {
                for ($a = 0; $a < count($additional_images_titles); $a++) {
                    if ($additional_images_titles[$a] != '') {
                        $titles[] = $additional_images_titles[$a];
                    }
                }
            }

            $old_additional_images_titles           = [];
            if (array_key_exists('old_additional_images_titles', $post_Data)) {
                $old_additional_images_titles       = $post_Data['old_additional_images_titles'];
            }


            $additional_images_final         = [];
            $all_image                       = $this->request->getFiles();
            $image_array                     = $all_image['additional_images'];
            $old_img_array                   = isset($all_image['existing_images']) ? $all_image['existing_images'] : '';
            if (!empty($image_array)) {
                // pr($image_array);

                $uploadedFile       = $this->data['model']->commonFileArrayUpload('package/', $image_array, 'image');
                if (!empty($uploadedFile)) {
                    $additional_images           = $uploadedFile;
                }
            }


            if (is_array($old_img_array))
                foreach ($old_img_array as $old_file_name => $image) {
                    $img = $image->getClientName();

                    if ($img != '') {
                        $status = 1;
                        $imageFileType1 = pathinfo($img, PATHINFO_EXTENSION);
                        if ($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG" && $imageFileType1 != "GIF" && $imageFileType1 != "ico" && $imageFileType1 != "ICO" && $imageFileType1 != "webp") {
                            $message = 'Sorry, only JPG, JPEG, ICO, PNG, WEBP & GIF files are allowed';
                            $status = 0;
                        }
                        $newFilename = $old_file_name;

                        $temp = $image->getTempName();

                        $upload_path = 'uploads/package/';
                        $old_file = $upload_path . $old_file_name;
                        @unlink($old_file);

                        if ($status) {
                            try {
                                move_uploaded_file($temp, $upload_path . $newFilename);
                            } catch (\Throwable $th) {
                                throw $th;
                            }
                        }
                    }
                }



            $additional_images_final  = array_merge($old_additional_images_titles, $additional_images);
            //pr($additional_images_final);die();
            /* additional images */
            $on_frontend = $this->request->getPost('show_on_fronend') != '' ? $this->request->getPost('show_on_fronend') : 0;
            $on_promos = $this->request->getPost('show_on_promos') != '' ? $this->request->getPost('show_on_promos') : 0;

            $postData   = array(
                'category_id'                 => $this->request->getPost('category_id'),
                'package_name'                => $this->request->getPost('package_name'),
                'feature_image'               => $feature_image,
                'day_night'                   => $this->request->getPost('day_night'),
                'person'                      => $this->request->getPost('person'),
                'package_price'               => $this->request->getPost('package_price'),
                'description_heading'         => $this->request->getPost('description_heading'),
                'description2_heading'        => $this->request->getPost('description2_heading'),
                'description_points'          => json_encode(array_filter($this->request->getPost('description_points'))),
                'description2_points'         => json_encode(array_filter($this->request->getPost('description2_points'))),
                'banner_image'                => $banner_image,
                'additional_images'           => json_encode($additional_images_final),
                'additional_images_titles'    => json_encode($titles),
                'country_name'                => $this->request->getPost('country_name'),
                'show_on_frontend'            => $on_frontend,
                'show_on_promos'              => $on_promos,
                'updated_at'                  => date('Y-m-d h:i:s')
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
