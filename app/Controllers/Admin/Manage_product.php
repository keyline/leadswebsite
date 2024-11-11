<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CommonModel;

class Manage_product extends BaseController
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
            'module'        => 'Product',
            'controller'    => 'manage_product',
            'table_name'    => 'product',
            'primary_key'   => 'id'
        );
    }
    public function index()
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage ' . $this->data['module'];
        $page_name                  = 'product/list';
        $order_by[0]                = array('field' => $this->data['primary_key'], 'type' => 'desc');
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'array', ['published!=' => 3], '', '', '', $order_by);
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
        $page_name                  = 'product/add-edit';
        $data['row']                = [];
        $data['productCats']           = $this->data['model']->find_data('product_category', 'array', ['published!=' => 3]);
        $data['key_feature']           = $this->data['model']->find_data('key_feature', 'array', ['published!=' => 3]);
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getPost(); 
            $slug = strtolower($this->data['model']->clean($this->request->getPost('product_title')));
            // pr($postData)   ;                  

            // File upload check if validation passed           
                $file = $this->request->getFile('product_image');
                if ($file && $file->isValid()) {
                    $uploadArray = $this->common_model->upload_single_file('product_image', $file->getClientName(), 'product', 'image');
                    if (!$uploadArray['status']) {                        
                        $errorMessage = $uploadArray['message'];
                        return redirect()->back()->withInput()->with('error_message', $errorMessage);
                    } else {
                        $image = $uploadArray['newFilename'];
                    }
                } else {                    
                    $errorMessage = 'Please upload an image';
                    return redirect()->back()->withInput()->with('error_message', $errorMessage);
                }                                                               

            // Data processing and insertion if validation passed            
                $fields1 = [
                    'product_category'          => $postData['product_category'],
                    'product_title'             => $postData['product_title'],
                    'slug'                      => $slug,
                    'air_flow'                  => $postData['air_flow'],
                    'generation'                => $postData['generation'],
                    'motor_power'               => $postData['motor_power'],
                    'speed'                     => $postData['speed'],
                    'lamp'                      => $postData['lamp'],
                    'noise_level'               => $postData['noise_level'],
                    'cabinet_hood'              => $postData['cabinet_hood'],
                    'dimension'                 => $postData['dimension'],
                    'warrenty_section'          => json_encode($postData['warrenty_section']), 
                    'key_feature'               => json_encode($postData['key_feature']), 
                    'is_new'                    => $postData['is_new'],
                    'product_image'             => $image
                ];
                //   pr($fields1);
                 $productId = $this->data['model']->save_data($this->data['table_name'], $fields1, '', $this->data['primary_key']);
                //   echo $productId; 
                
                // Handle others_image upload (optional)
                //  pr($this->request->getFiles());
                 $imageFile = $this->request->getFiles(); 
                //    pr($imageFile['others_image']);
                $others_image = [];
        
                if($imageFile != '') {                    
                    $uploadedFile = $this->data['model']->commonFileArrayUpload('product', $imageFile['others_image'], 'image');

                    if(!empty($uploadedFile)) {
                        $others_image = $uploadedFile;
                    } else {
                        $others_image = [];
                    }
                }
        
                // Insert into NewsContentImage if others_image is not empty
                if(count($others_image) > 0) {
                    foreach($others_image as $image) {
                        $imageFields = [
                            'product_id'                   => $productId,
                            'image_file'                => $image,                           
                        ];
                        // pr($imageFields);
                        // NewsContentImage::insert($imageFields);
                        $imageId = $this->data['model']->save_data('product_others_image', $imageFields, '', 'image_id');
                        // echo $imageId;die;
                    }
                }

                // if (count($content_description)) {
                //     for ($k = 0; $k < count($content_description); $k++) {
                //         if ($content_description[$k]) {
                //             $fields2 = [
                //                 'blog_id'                   => $blogId,
                //                 'table_of_content'          => $content[$k],
                //                 'table_of_content_slug'     => clean($content[$k]),
                //                 'summary'                   => $summary[$k],
                //                 'content'                   => $content_description[$k],
                //             ];


                //             $contentId = $this->data['model']->save_data('blog_contents', $fields2, '', 'content_id');
                //         }
                //     }
                // }
                /* others image */

                return redirect()->to('/admin/' . $this->data['controller'])->with('success_message', 'Inserted successfully');                   
        }        
        echo $this->layout_after_login($title, $page_name, $data);
    }
    public function edit($id)
    {
        $data['moduleDetail']       = $this->data;
        $data['action']             = 'Edit';
        $title                      = $data['action'] . ' ' . $this->data['module'];
        $page_name                  = 'product/add-edit';
        $conditions                 = array($this->data['primary_key'] => $id);
        $data['row']                = $this->data['model']->find_data($this->data['table_name'], 'row', $conditions);
        // pr($data['row']);
        $data['productCats']           = $this->data['model']->find_data('product_category', 'array', ['published!=' => 3]);
        $data['key_feature']       = $this->data['model']->find_data('key_feature', 'array', ['published!=' => 3]);
        $data['others_image']       = $this->data['model']->find_data('product_others_image', 'array', ['product_id' => $id,'published!=' => 3]);
        // pr($data['others_image']);

        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getPost(); 
            $slug = strtolower($this->data['model']->clean($this->request->getPost('product_title')));
            //  pr($postData)   ;                   

            // File upload check if validation passed           
                $file = $this->request->getFile('product_image');
                if ($file && $file->isValid()) {
                    $uploadArray = $this->common_model->upload_single_file('product_image', $file->getClientName(), 'product', 'image');
                    if (!$uploadArray['status']) {                        
                        $errorMessage = $uploadArray['message'];
                        return redirect()->back()->withInput()->with('error_message', $errorMessage);
                    } else {
                        $image = $uploadArray['newFilename'];
                    }
                } else {                    
                    $image = $data['row']->product_image;
                }                                                               

            // Data processing and insertion if validation passed            
                $fields1 = [
                    'product_category'          => $postData['product_category'],
                    'product_title'             => $postData['product_title'],
                    'slug'                      => $slug,
                    'air_flow'                  => $postData['air_flow'],
                    'generation'                => $postData['generation'],
                    'motor_power'               => $postData['motor_power'],
                    'speed'                     => $postData['speed'],
                    'lamp'                      => $postData['lamp'],
                    'noise_level'               => $postData['noise_level'],
                    'cabinet_hood'              => $postData['cabinet_hood'],
                    'dimension'                 => $postData['dimension'],
                    'warrenty_section'          => json_encode($postData['warrenty_section']), 
                    'key_feature'               => json_encode($postData['key_feature']), 
                    'is_new'                    => $postData['is_new'],
                    'product_image'             => $image
                ];
                //    pr($fields1);
                 $this->data['model']->save_data($this->data['table_name'], $fields1, $id, $this->data['primary_key']);
                
                
                 $productId = $id;

                // $this->data['model']->removeData('blog_contents', $id, 'blog_id');
                // Handle others_image upload (optional)
                //   pr($this->request->getFiles());
                $imageFile = $this->request->getFiles(); 
                //    pr($imageFile['others_image']);
                $others_image = [];
        
                if($imageFile != '') {                    
                    $uploadedFile = $this->data['model']->commonFileArrayUpload('product', $imageFile['others_image'], 'image');

                    if(!empty($uploadedFile)) {
                        $others_image = $uploadedFile;
                    } else {
                        $others_image = [];
                    }
                }
        
                // Insert into NewsContentImage if others_image is not empty
                if(count($others_image) > 0) {
                    foreach($others_image as $image) {
                        $imageFields = [
                            'product_id'                   => $productId,
                            'image_file'                => $image,                           
                        ];
                        //  pr($imageFields);
                        // NewsContentImage::insert($imageFields);
                        $imageId = $this->data['model']->save_data('product_others_image', $imageFields, '', 'image_id');
                        // echo $imageId;die;
                    }
                }                            
                return redirect()->to('/admin/' . $this->data['controller'])->with('success_message', 'Update successfully');            
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
    /* image gallery */
    public function image_list($id) 
    {
        $data['moduleDetail']       = $this->data;
        $data['product']              = $this->data['model']->find_data($this->data['table_name'], 'row', ['id' => $id]);
        $title                      = 'Manage Image Gallery Of '.$data['product']->product_title;
        $page_name                  = 'product/image-list';        
        $order_by[0]                = array('field' => 'image_id', 'type' => 'asc');
        $data['rows']               = $this->data['model']->find_data('product_others_image', 'array', ['product_id' => $id, 'published!=' => 3], '', '', '', $order_by);
        //   pr($data['rows']);

        if($this->request->getPost('mode') == 'bulklead'){
            if($this->request->getPost('image_id') == ''){
                $this->session->setFlashdata('error_message', 'you need to select atleast one image for delete !!!');
                return redirect()->to(current_url());
            } else {                    
                $image_id = $this->request->getPost('image_id');
                if(!empty($image_id)){
                    for($k=0;$k<count($image_id);$k++){
                        $postData5   = array(
                                            'published'                  => 3
                                            );
                        //pr($postData);
                        $this->data['model']->save_data('product_others_image', $postData5, $image_id[$k], 'id');
                    }
                }
                $this->session->setFlashdata('success_message', 'Image(s) Succesfully Deleted !!!');
                return redirect()->to(current_url());
            }
            
        }
        echo $this->layout_after_login($title,$page_name,$data);
    }
    /* edit image */
    public function edit_image($id)
    {
        $data['moduleDetail']       = $this->data;       
        $title                          = 'Image Update';
        $page_name                      = 'product/edit_image';        
        $conditions                 = array('image_id' => $id);
        $data['row']                = $this->data['model']->find_data('product_others_image', 'row', $conditions);                  

        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getPost();                                                                             
                    /* others image */
                     $imageFile = $this->request->getFile('others_image');                                                        
                        $uploadArray = $this->common_model->upload_single_file('others_image', $imageFile->getClientName(), 'product', 'image');
                        if (!$uploadArray['status']) {                        
                            $errorMessage = $uploadArray['message'];
                            return redirect()->back()->withInput()->with('error_message', $errorMessage);
                        } else {
                            $image = $uploadArray['newFilename'];
                        }                                                              
                    /* others image */                               
                    
                            $fields   = [
                                                'product_id'  => $data['row']->product_id,
                                               'image_file'   => $image,
                            ];   
                        //    pr($fields);
                           $imageId = $this->data['model']->save_data('product_others_image', $fields, $id, 'image_id');
                        //    echo $imageId ; die;
                                                                                                                                           
                    
                    return redirect()->to('/admin/' . $this->data['controller'])->with('success_message', 'Update successfully');                           
           
        }
        echo $this->layout_after_login($title, $page_name, $data);
    }
    /* edit image */
    /* delete image */
   public function delete_image($id)
   {       
       $fields = [
           'published'             => 3
       ];
       $imageId = $this->data['model']->save_data('product_others_image', $fields, $id, 'image_id');
       return redirect()->to('/admin/' . $this->data['controller'])->with('success_message', 'Image Deleted Successfully !!!');
   }
   /* delete image */
}
