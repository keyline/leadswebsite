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
            'module'        => 'Media',
            'controller'    => 'manage_video_media',
            'table_name'    => 'media',
            'sub_table_name' => 'media_file',
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

            $bulkData   = $this->request->getPost();

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




    public function add($category)
    {
        $data = [
            'category'       => htmlspecialchars($category, ENT_QUOTES, 'UTF-8'),
            'moduleDetail'   => $this->data,
            'action'         => 'Add',
            'row'            => [],
        ];
        $title      = $data['action'] . ' ' . $this->data['module'];
        $page_name  = 'media/video-add-edit';

        if ($this->request->getMethod() === 'post') {
            $isVideoUpload = isset($_POST['videoUpload']);

            $postData = [
                'category_id' => $data['category'],
                'type'        => 2,
                'video_type'  => $isVideoUpload,
            ];

            // Handle video upload if applicable
            if ($isVideoUpload) {
                $file = $this->request->getFile('client_logo');
                if ($file && $file->isValid()) {
                    $uploadArray = $this->common_model->upload_video_file('client_logo', $file->getClientName(), 'media');

                    if ($uploadArray['status']) {
                        $postData   = [
                            'category_id'              => $data['category'],
                            'type'                     => 2,
                            'video_type'               => $isVideoUpload,
                            'caption'                  => $this->request->getPost('caption')
                        ];

                        $client_logo = $uploadArray['newFilename'];
                    } else {
                        return $this->redirectWithError($uploadArray['message']);
                    }
                } else {
                    return $this->redirectWithError('Please upload a valid video file.');
                }
            } else if (!$this->matchYoutubeUrl($this->request->getPost('url'))) {
                return $this->redirectWithError('Please provide a valid youtube link');
            }

            // Save main record
            $record = $this->data['model']->save_data($this->data['table_name'], $postData, '', $this->data['primary_key']);

            if ($record) {
                $mediaData = ['media_id' => $record];
                if ($isVideoUpload) {
                    $mediaData['file'] = $client_logo;
                } else {
                    $mediaData['youtube_link'] = $this->matchYoutubeUrl($this->request->getPost('url'));
                }

                // Save media data and set success message
                if ($this->data['model']->save_data($this->data['sub_table_name'], $mediaData, '', $this->data['primary_key'])) {
                    $this->session->setFlashdata('success_message', "{$this->data['module']} inserted successfully.");
                }
            }

            return redirect()->to('/admin/' . $this->data['controller'] . '/list/' . $category);
        }

        echo $this->layout_after_login($title, $page_name, $data);
    }


    // public function edit($id)
    // {
    //     $id                         = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
    //     $data['moduleDetail']       = $this->data;
    //     $data['action']             = 'Edit';
    //     $title                      = $data['action'] . ' ' . $this->data['module'];
    //     $page_name                  = 'media/video-add-edit';
    //     $data['row']               = $this->getMediaFiles(0, $id);

    //     if ($this->request->getMethod() == 'post') {
    //         /* image upload */
    //         $file = $this->request->getFile('client_logo');
    //         $originalName = $file->getClientName();
    //         $fieldName = 'client_logo';
    //         if ($originalName != '') {

    //             if ($data['row']->client_logo != '') {
    //                 unlink('uploads/client/' . $data['row']->client_logo);
    //             }

    //             $upload_array = $this->common_model->upload_single_file($fieldName, $originalName, 'client', 'image');
    //             if ($upload_array['status']) {
    //                 $client_logo = $upload_array['newFilename'];
    //             } else {
    //                 $this->session->setFlashdata('error_message', $upload_array['message']);
    //                 return redirect()->to(current_url());
    //             }
    //         } else {
    //             $client_logo = $data['row']->client_logo;
    //         }
    //         /* image upload */
    //         $postData = array(
    //             'client_type'              => null, //$this->request->getPost('client_type'),
    //             'client_name'              => $this->request->getPost('client_name'),
    //             'client_logo'              => $client_logo,
    //             'updated_at'                => date('Y-m-d h:i:s')
    //         );
    //         $record = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
    //         $this->session->setFlashdata('success_message', $this->data['module'] . ' updated successfully');
    //         return redirect()->to('/admin/' . $this->data['controller']);
    //     }
    //     echo $this->layout_after_login($title, $page_name, $data);
    // }


    public function edit($id)
    {
        // Sanitize the input ID
        $id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');

        // Prepare data for the view
        $data = [
            'category'       => '', // This will be fetched from the record later
            'moduleDetail'   => $this->data,
            'action'         => 'Edit',
            'row'            => $this->getMediaFiles(0, $id), // Get the existing record for this ID
        ];

        // Set the title and page name for the view
        $title = $data['action'] . ' ' . $this->data['module'];
        $page_name = 'media/video-add-edit';

        // If the request method is POST, handle the form submission
        if ($this->request->getMethod() === 'post') {
            $postData = [
                'update_on' => date('Y-m-d H:i:s')
            ];
            // Check if a video is being uploaded
            $isVideoUpload = isset($_POST['videoUpload']);

            // Handle video upload if applicable
            if ($isVideoUpload) {
                $postData['caption'] = $this->request->getPost('caption');

                $file = $this->request->getFile('client_logo');
                $originalName = $file->getClientName();

                if ($originalName != '') {
                    // Delete the old video file if it exists
                    if ($data['row']->file != '') {
                        unlink('uploads/media/' . $data['row']->file);
                    }

                    // Upload the new video file
                    $uploadArray = $this->common_model->upload_video_file('client_logo', $file->getClientName(), 'media');
                    if ($uploadArray['status']) {

                        $client_logo = $uploadArray['newFilename'];
                    } else {
                        return $this->redirectWithError($uploadArray['message']);
                    }
                } else {
                    $client_logo = $data['row']->file;
                }
            } else {
                // Handle YouTube URL if no video is uploaded
                if (!$this->matchYoutubeUrl($this->request->getPost('url'))) {
                    return $this->redirectWithError('Please provide a valid youtube link');
                }
            }

            // Update the record in the main table
            $record = $this->data['model']->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);

            if ($record) {
                // Prepare the media data to save

                if ($isVideoUpload) {
                    $mediaData['file'] = $client_logo;
                } else {
                    $mediaData['youtube_link'] = $this->matchYoutubeUrl($this->request->getPost('url'));
                }

                // Save the media data in the sub-table
                $record2 = $this->data['model']->save_data($this->data['sub_table_name'], $mediaData, $id, 'media_id');

                if ($record2) {
                    $this->session->setFlashdata('success_message', "{$this->data['module']} updated successfully.");
                }
            }

            // Redirect to the category list page after successful update
            return redirect()->to('/admin/' . $this->data['controller'] . '/list/' . $data['row']->category_id);
        }

        // Load the view to display the edit form
        echo $this->layout_after_login($title, $page_name, $data);
    }






    public function confirm_delete($id)
    {
        $postData = array(
            'published' => 3
        );
        $updateData = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'] . ' deleted successfully');
        return redirect()->back();
    }
    public function deactive($id)
    {
        $postData = array(
            'published' => 0
        );
        $updateData = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'] . ' deactivated successfully');
        return redirect()->back();
    }
    public function active($id)
    {
        $postData = array(
            'published' => 1
        );
        $updateData = $this->common_model->save_data($this->data['table_name'], $postData, $id, $this->data['primary_key']);
        $this->session->setFlashdata('success_message', $this->data['module'] . ' activated successfully');
        return redirect()->back();
    }




    // Helper method for redirect with error message
    private function redirectWithError($message)
    {
        $this->session->setFlashdata('error_message', $message);
        return redirect()->to(current_url());
    }
}
