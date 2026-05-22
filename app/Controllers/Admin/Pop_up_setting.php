<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;

class Pop_up_setting extends BaseController
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
            'module'        => 'Pop_up_setting',
            'controller'    => 'Pop_up_setting',
            'table_name'    => 'popup_settings',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'popup/index';        
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'row', '', '', '', '');
        
        if ($this->request->getMethod() == 'post') { 
            $popup = $this->data['model']->find_data('popup_settings', 'row');
            if (empty($popup)) {
                    $popup = null;
                }

            $type = $this->request->getPost('popup_type');

            $postData = [
                'popup_type' => $type
            ];
            

            /* ---------- IMAGE UPLOAD ---------- */
            if ($type === 'image') {

                $image = $this->request->getFile('popup_image');

                if ($image && $image->isValid() && !$image->hasMoved()) {

                    //  MIME validation
                    $allowedImageTypes = ['image/jpg','image/jpeg','image/png','image/webp'];
                    if (!in_array($image->getMimeType(), $allowedImageTypes)) {
                        return redirect()->back()->with('error_message', 'Invalid image format');
                        // $this->session->setFlashdata('error_message', 'Invalid image format');
                    }

                    //  Size validation (2MB)
                    if ($image->getSizeByUnit('mb') > 2) {
                        return redirect()->back()->with('error_message', 'Image size must be under 2MB');
                        // $this->session->setFlashdata('error_message', 'Image size must be under 2MB');
                    }

                    //  Delete old image (if exists)
                    if (($popup != null) && !empty($popup->image_path)) {
                        @unlink(ROOTPATH . 'uploads/popup/' . $popup->image_path);
                    }
                    if (($popup != null) && !empty($popup->video_path)) {
                        @unlink(ROOTPATH . 'uploads/popup/' . $popup->video_path);
                    }

                    $uploadPath = ROOTPATH . 'uploads/popup';

                    if (!is_dir($uploadPath)) {
                            mkdir($uploadPath, 0755, true);
                        }

                    $newName = $image->getRandomName();
                    // $image->move(ROOTPATH . 'uploads/popup', $newName);
                    $image->move($uploadPath, $newName);
                    $postData['image_path'] = $newName;
                    $postData['video_path'] = null;
                    $postData['youtube_url'] = null;
                }

            /* ---------- VIDEO UPLOAD ---------- */
            } elseif ($type === 'video') {

                $video = $this->request->getFile('popup_video');

                if ($video && $video->isValid() && !$video->hasMoved()) {

                    //  MIME validation
                    $allowedVideoTypes = ['video/mp4','video/webm','video/avi'];
                    if (!in_array($video->getMimeType(), $allowedVideoTypes)) {
                        return redirect()->back()->with('error_message', 'Invalid video format');
                        // $this->session->setFlashdata('error_message', 'Invalid video format');
                    }

                    //  Size validation (50MB)
                    if ($video->getSizeByUnit('mb') > 10) {
                        return redirect()->back()->with('error_message', 'Video size must be under 10MB');
                        // $this->session->setFlashdata('error_message', 'Video size must be under 5MB');
                    }

                    //  Delete old video (if exists)
                    if (($popup != null) && !empty($popup->video_path)) {
                        @unlink(ROOTPATH . 'uploads/popup/' . $popup->video_path);
                    }
                    if (($popup != null) && !empty($popup->image_path)) {
                        @unlink(ROOTPATH . 'uploads/popup/' . $popup->image_path);
                    }

                    $uploadPath = ROOTPATH . 'uploads/popup';

                    if (!is_dir($uploadPath)) {
                            mkdir($uploadPath, 0755, true);
                        }

                    $newName = $video->getRandomName();
                    // $video->move(ROOTPATH . 'uploads/popup', $newName);
                    $video->move($uploadPath, $newName);

                    $postData['video_path'] = $newName;
                    $postData['image_path'] = null;
                    $postData['youtube_url'] = null;
                }

            /* ---------- YOUTUBE URL ---------- */
            } elseif ($type === 'youtube_url') {

                $youtubeUrl = trim($this->request->getPost('youtube_url'));

                //  Basic YouTube URL validation
                if (!preg_match('#^(https?://)?(www\.)?(youtube\.com|youtu\.be)/#', $youtubeUrl)) {
                    return redirect()->back()->with('error_message', 'Invalid YouTube URL');
                    // $this->session->setFlashdata('error_message', $this->data['module'] . ' Invalid YouTube URL');
                    // return redirect()->to('/admin/Pop_up_setting');
                }

                $postData['youtube_url'] = $youtubeUrl;
                $postData['image_path'] = null;
                $postData['video_path'] = null;

                if (($popup != null) && !empty($popup->image_path)) {
                        @unlink(ROOTPATH . 'uploads/popup/' . $popup->image_path);
                    }
                if (($popup != null) && !empty($popup->video_path)) {
                        @unlink(ROOTPATH . 'uploads/popup/' . $popup->video_path);
                    }

            /* ---------- FORM TYPE ---------- */
            } else {

                $postData['image_path'] = null;
                $postData['video_path'] = null;
                $postData['youtube_url'] = null;

                if (($popup != null) && !empty($popup->image_path)) {
                        @unlink(ROOTPATH . 'uploads/popup/' . $popup->image_path);
                    }
                if (($popup != null) && !empty($popup->video_path)) {
                        @unlink(ROOTPATH . 'uploads/popup/' . $popup->video_path);
                    }
            }
            /* ---------- INSERT / UPDATE ---------- */
            if ($popup != null) {
            $postData['updated_at'] = date('Y-m-d H:i:s');
                $this->data['model']->save_data(
                    'popup_settings',
                    $postData,
                    $popup->id,
                    'id'
                );

                $this->session->setFlashdata('success_message', 'Popup settings updated successfully');

            } else {
                $isSubmitted = $this->data['model']->save_data(
                    'popup_settings',
                    $postData,
                    '',
                    'id'
                );
                    $this->session->setFlashdata('success_message', 'Popup settings saved successfully');
            }

            return redirect()->to('/admin/Pop_up_setting');
        }
        
        echo $this->layout_after_login($title,$page_name,$data);
    }              


}