<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CommonModel;
use DB;

class Home_page_video_settings extends BaseController
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
            'module'        => 'Home_page_video_settings',
            'controller'    => 'Home_page_video_settings',
            'table_name'    => 'home_page_video_settings',
            'primary_key'   => 'id'
        );
    }
    public function index() 
    {
        $data['moduleDetail']       = $this->data;
        $title                      = 'Manage '.$this->data['module'];
        $page_name                  = 'home_page_video/index';        
        $data['rows']               = $this->data['model']->find_data($this->data['table_name'], 'row', '', '', '', '');
        
        if ($this->request->getMethod() == 'post') { 
            $homepage_video = $this->data['model']->find_data('home_page_video_settings', 'row');
            if (empty($homepage_video)) {
                    $homepage_video = null;
                }

            $type = $this->request->getPost('content_type');

            $postData = [
                'content_type' => $type
            ];

            /* ---------- VIDEO UPLOAD ---------- */
            if ($type === 'video') {

                $video = $this->request->getFile('video');

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
                    if (($homepage_video != null) && !empty($homepage_video->video_path)) {
                        @unlink(ROOTPATH . 'uploads/home_page_video/' . $homepage_video->video_path);
                    }

                    $uploadPath = ROOTPATH . 'uploads/home_page_video';

                    if (!is_dir($uploadPath)) {
                            mkdir($uploadPath, 0755, true);
                        }

                    $newName = $video->getRandomName();
                    $video->move($uploadPath, $newName);

                    $postData['video_path'] = $newName;
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
                $postData['video_path'] = null;
                
                if (($homepage_video != null) && !empty($homepage_video->video_path)) {
                        @unlink(ROOTPATH . 'uploads/home_page_video/' . $homepage_video->video_path);
                    }

            }else{
                return redirect()->back()->with('error_message', 'Please select a valid content type');
            } 
            /* ---------- INSERT / UPDATE ---------- */
            if ($homepage_video != null) {
            $postData['updated_at'] = date('Y-m-d H:i:s');
                $this->data['model']->save_data(
                    'home_page_video_settings',
                    $postData,
                    $homepage_video->id,
                    'id'
                );

                $this->session->setFlashdata('success_message', 'Home page video settings updated successfully');
            } else {
                $isSubmitted = $this->data['model']->save_data(
                    'home_page_video_settings',
                    $postData,
                    '',
                    'id'
                );
                    $this->session->setFlashdata('success_message', 'Home page video settings saved successfully');
            }

            return redirect()->to('/admin/Home_page_video_settings');
        }
        
        echo $this->layout_after_login($title,$page_name,$data);
    }              


}