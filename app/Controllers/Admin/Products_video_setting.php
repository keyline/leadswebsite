<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;

class Products_video_setting extends BaseController
{

    private $model;  //This can be accessed by all class methods

    public function __construct()
    {
        $session = \Config\Services::session();
        if (!$session->get('is_admin_login')) {
            return redirect()->to('/admin');
            exit;
        }
        $model = new CommonModel();
        $this->data = array(
            'model'         => $model,
            'session'       => $session,
            'module'        => 'Products_video_setting',
            'controller'    => 'Products_video_setting',
            'table_name'    => 'products_video_settings',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'products_video/index';        
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'row', '', '', '', '');
        
        if ($this->request->getMethod() == 'post') { 
            $products_video = $this->data['model']->find_data('products_video_settings', 'row');
            if (empty($products_video)) {
                    $products_video = null;
                }

            $type1 = $this->request->getPost('content_type1');
            $type2 = $this->request->getPost('content_type2');
            // echo $type1; echo $type2; exit;

            $postData = [
                'content_type1' => $type1,
                'content_type2' => $type2
            ];

            /* ---------- VIDEO UPLOAD FOR VIDEO 1 ---------- */
            if ($type1 === 'video') {

                $video1 = $this->request->getFile('video1');
               
              if ($video1 && $video1->getName() != '') { 

                if ($video1->isValid() && !$video1->hasMoved()) {

                    //  MIME validation
                    $allowedVideoTypes = ['video/mp4','video/webm','video/avi'];
                    if (!in_array($video1->getMimeType(), $allowedVideoTypes)) {
                        return redirect()->back()->with('error_message', 'Invalid video 1 format');
                        // $this->session->setFlashdata('error_message', 'Invalid video format');
                    }

                    //  Size validation (50MB)
                    if ($video1->getSizeByUnit('mb') > 10) {
                        return redirect()->back()->with('error_message', 'Video size must be under 10MB');
                        // $this->session->setFlashdata('error_message', 'Video size must be under 5MB');
                    }

                    //  Delete old video (if exists)
                    if (($products_video != null) && !empty($products_video->video_path1)) {
                        @unlink(ROOTPATH . 'uploads/products_video/' . $products_video->video_path1);
                    }

                    $uploadPath1 = ROOTPATH . 'uploads/products_video';

                    if (!is_dir($uploadPath1)) {
                            mkdir($uploadPath1, 0755, true);
                        }

                    $newName1 = $video1->getRandomName();
                    $video1->move($uploadPath1, $newName1);

                    $postData['video_path1'] = $newName1;
                    $postData['youtube_url1'] = null;
                }
              }  

            /* ---------- YOUTUBE URL FOR VIDEO 1 ---------- */
            } elseif ($type1 === 'youtube_url') {

                $youtubeUrl1 = trim($this->request->getPost('youtube_url1'));

              if(!empty($youtubeUrl1)) { 

                //  Basic YouTube URL validation
                if (!preg_match('#^(https?://)?(www\.)?(youtube\.com|youtu\.be)/#', $youtubeUrl1)) {
                    return redirect()->back()->with('error_message', 'Invalid YouTube URL');
                    // $this->session->setFlashdata('error_message', $this->data['module'] . ' Invalid YouTube URL');
                    // return redirect()->to('/admin/Pop_up_setting');
                }

                $postData['youtube_url1'] = $youtubeUrl1;
                $postData['video_path1'] = null;
                
                if (($products_video != null) && !empty($products_video->video_path1)) {
                        @unlink(ROOTPATH . 'uploads/products_video/' . $products_video->video_path1);
                    }
              }      

            }else{
                return redirect()->back()->with('error_message', 'Please select a valid content type for first content');
            } 

            /* ---------- VIDEO UPLOAD FOR VIDEO 2 ---------- */
            if ($type2 === 'video') {

                $video2 = $this->request->getFile('video2');

              if ($video2 && $video2->getName() != '') {  

                if ($video2->isValid() && !$video2->hasMoved()) {

                    //  MIME validation
                    $allowedVideoTypes = ['video/mp4','video/webm','video/avi'];
                    if (!in_array($video2->getMimeType(), $allowedVideoTypes)) {
                        return redirect()->back()->with('error_message', 'Invalid video 2 format');
                        // $this->session->setFlashdata('error_message', 'Invalid video format');
                    }

                    //  Size validation (50MB)
                    if ($video2->getSizeByUnit('mb') > 10) {
                        return redirect()->back()->with('error_message', 'Video size must be under 10MB');
                        // $this->session->setFlashdata('error_message', 'Video size must be under 5MB');
                    }

                    //  Delete old video (if exists)
                    if (($products_video != null) && !empty($products_video->video_path2)) {
                        @unlink(ROOTPATH . 'uploads/products_video/' . $products_video->video_path2);
                    }

                    $uploadPath2 = ROOTPATH . 'uploads/products_video';

                    if (!is_dir($uploadPath2)) {
                            mkdir($uploadPath2, 0755, true);
                        }

                    $newName2 = $video2->getRandomName();
                    $video2->move($uploadPath2, $newName2);

                    $postData['video_path2'] = $newName2;
                    $postData['youtube_url2'] = null;
                }
              }  

            /* ---------- YOUTUBE URL FOR VIDEO 2 ---------- */
            } elseif ($type2 === 'youtube_url') {

                $youtubeUrl2 = trim($this->request->getPost('youtube_url2'));
              if(!empty($youtubeUrl2)) {
                //  Basic YouTube URL validation
                if (!preg_match('#^(https?://)?(www\.)?(youtube\.com|youtu\.be)/#', $youtubeUrl2)) {
                    return redirect()->back()->with('error_message', 'Invalid YouTube URL');
                    // $this->session->setFlashdata('error_message', $this->data['module'] . ' Invalid YouTube URL');
                    // return redirect()->to('/admin/Pop_up_setting');
                }

                $postData['youtube_url2'] = $youtubeUrl2;
                $postData['video_path2'] = null;
                
                if (($products_video != null) && !empty($products_video->video_path2)) {
                        @unlink(ROOTPATH . 'uploads/products_video/' . $products_video->video_path2);
                    }
              }       

            }else{
                return redirect()->back()->with('error_message', 'Please select a valid content type for second content');
            } 

            /* ---------- INSERT / UPDATE ---------- */
            if ($products_video != null) {
            $postData['updated_at'] = date('Y-m-d H:i:s');
                $this->data['model']->save_data(
                    'products_video_settings',
                    $postData,
                    $products_video->id,
                    'id'
                );

                $this->session->setFlashdata('success_message', 'Products video settings updated successfully');
            } else {
                $isSubmitted = $this->data['model']->save_data(
                    'products_video_settings',
                    $postData,
                    '',
                    'id'
                );
                    $this->session->setFlashdata('success_message', 'Products video settings saved successfully');
            }

            return redirect()->to('/admin/Products_video_setting');
        }
        
        echo $this->layout_after_login($title,$page_name,$data);
    }              


}