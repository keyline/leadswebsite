<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{
    var $table;
    function  __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
        $session = \Config\Services::session();
        $uri = new \CodeIgniter\HTTP\URI();
        helper('form');
        helper('cookie');
        $email = \Config\Services::email();
    }

    // find data
    function find_data($table, $return_type = 'array', $conditions = '', $select = '*', $join = '', $group_by = '', $order_by = '', $limit = 0, $offset = 0, $orConditions = '')
    {
        $result = array();
        $builder = $this->db->table($table);
        $builder->select($select);
        if ($conditions != '') $builder->where($conditions);
        if ($orConditions != '') $builder->orWhere($orConditions);

        //$this->db->from($table_name);
        if (is_array($join)) {
            for ($j = 0; $j < count($join); $j++) {
                if ($join[$j]['table']) {
                        /*$table_join = $join[$j]['table'].' as '.$join[$j]['table_alias']*/;
                    //$table_join_name = $join[$j]['table_alias'];
                    $table_join = $join[$j]['table'];
                    $table_join_name = $join[$j]['table'];
                } else {
                    /*$table_join = $join[$j]['table'];
                    $table_join_name = $join[$j]['table'];*/
                }
                if (!empty($join[$j]['table_master_alias'])) {
                    $table_master_join = $join[$j]['table_master_alias'];
                } else {
                    $table_master_join = $join[$j]['table_master'];
                }
                $builder->join($table_join, $table_join_name . '.' . $join[$j]['field'] . '=' . $table_master_join . '.' . $join[$j]['field_table_master']/*.$join[$j]['and']*/, $join[$j]['type']);
            }
        }


        if (is_array($group_by)) {
            for ($g = 0; $g < count($group_by); $g++) {
                $builder->groupBy($group_by[$g]);
            }
        }

        if (is_array($order_by)) {
            for ($o = 0; $o < count($order_by); $o++) {
                $builder->orderBy($order_by[$o]['field'], $order_by[$o]['type']);
            }
        }

        if ($limit != 0) $builder->limit($limit, $offset);
        $query = $builder->get();

        switch ($return_type) {
            case 'array':
            case '':
                if ($query->getNumRows() > 0) {
                    $result = $query->getResult();
                }
                break;
            case 'row':
                if ($query->getNumRows() > 0) {
                    $result = $query->getRow();
                }
                break;
            case 'row-array':
                if ($query->getNumRows() > 0) {
                    $result = $query->getRowArray();
                }
                break;
            case 'count':
                $result = $query->getNumRows();
                break;
        }
        // echo $this->db->getLastQuery();die;
        return $result;
    }

    // save or update data
    function save_data($table, $postdata = array(), $id = '', $field = '')
    {
        $builder = $this->db->table($table);
        if ($id == '') {
            $builder->insert($postdata);
            //   return $this->db->getLastQuery();
             return $this->db->insertID();
        } else {
            $builder->where($field, $id);
            $builder->update($postdata);
            //  return $this->db->getLastQuery();
            return $this->db->affectedRows();
        }
    }

    function save_batchdata($table, $postdata = array(), $id = '', $field = '')
    {
        $builder = $db->table($table);
        $builder->insertBatch($postdata);
    }

    // delete data
    function delete_data($table, $id, $field)
    {
        $builder = $this->db->table($table);
        $builder->where($field, $id);
        $builder->delete();
        return true;
    }

    // single file upload
    function upload_single_file($fieldName, $fileName, $uploadedpath, $uploadType)
    {
        $imge = $fileName;

        if ($imge == '') {
            $slider_image = 'no-user-image.jpg';
        } else {
            $imageFileType1 = pathinfo($imge, PATHINFO_EXTENSION);
            if ($uploadType == 'image') {
                if ($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG" && $imageFileType1 != "GIF" && $imageFileType1 != "ico" && $imageFileType1 != "ICO" && $imageFileType1 != "SVG" && $imageFileType1 != "svg" && $imageFileType1 != "webp") {
                    $message = 'Sorry, only JPG, JPEG, ICO, SVG, PNG, WEBP & GIF files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType == 'pdf') {
                if ($imageFileType1 != "pdf" && $imageFileType1 != "PDF") {
                    $message = 'Sorry, only PDF files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType == 'word') {
                if ($imageFileType1 != "doc" && $imageFileType1 != "DOC" && $imageFileType1 != "docx" && $imageFileType1 != "DOCX") {
                    $message = 'Sorry, only DOC files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType == 'excel') {
                if ($imageFileType1 != "xls" && $imageFileType1 != "XLS" && $imageFileType1 != "xlsx" && $imageFileType1 != "XLSX") {
                    $message = 'Sorry, only EXCEl files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType == 'powerpoint') {
                if ($imageFileType1 != "ppt" && $imageFileType1 != "PPT" && $imageFileType1 != "pptx" && $imageFileType1 != "PPTX") {
                    $message = 'Sorry, only PPT files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType == 'custom') {
                if ($imageFileType1 != "doc" && $imageFileType1 != "DOC" && $imageFileType1 != "docx" && $imageFileType1 != "DOCX" && $imageFileType1 != "pdf" && $imageFileType1 != "PDF") {
                    $message = 'Sorry, only .DOC,.DOCX,.PDF files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            }

            $newFilename = time() . $imge;
            $temp = $_FILES[$fieldName]["tmp_name"];
            if ($uploadedpath == '') {
                $upload_path = 'uploads/';
            } else {
                $upload_path = 'uploads/' . $uploadedpath . '/';
            }
            if ($status) {
                move_uploaded_file($temp, $upload_path . $newFilename);
                $return_array = array('status' => 1, 'message' => $message, 'newFilename' => $newFilename);
            } else {
                $return_array = array('status' => 0, 'message' => $message, 'newFilename' => '');
            }
            // pr($return_array) ; die;
            return $return_array;
        }
    }

    function upload_multiple_file($fieldName, $fileName, $uploadedpath, $uploadType, $tempName)
    {
        $imge = $fileName;
        if ($imge == '') {
            $slider_image = 'no-user-image.jpg';
        } else {
            $imageFileType1 = pathinfo($imge, PATHINFO_EXTENSION);
            if ($uploadType == 'image') {
                if ($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG" && $imageFileType1 != "GIF" && $imageFileType1 != "ico" && $imageFileType1 != "ICO" && $imageFileType1 != "WEBP") {
                    $message = 'Sorry, only JPG, JPEG, ICO, PNG, WEBP & GIF files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType == 'pdf') {
                if ($imageFileType1 != "pdf" && $imageFileType1 != "PDF") {
                    $message = 'Sorry, only PDF files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType == 'word') {
                if ($imageFileType1 != "doc" && $imageFileType1 != "DOC" && $imageFileType1 != "docx" && $imageFileType1 != "DOCX") {
                    $message = 'Sorry, only DOC files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType == 'excel') {
                if ($imageFileType1 != "xls" && $imageFileType1 != "XLS" && $imageFileType1 != "xlsx" && $imageFileType1 != "XLSX") {
                    $message = 'Sorry, only EXCEl files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            } elseif ($uploadType == 'powerpoint') {
                if ($imageFileType1 != "ppt" && $imageFileType1 != "PPT" && $imageFileType1 != "pptx" && $imageFileType1 != "PPTX") {
                    $message = 'Sorry, only PPT files are allowed';
                    $status = 0;
                } else {
                    $message = 'Upload ok';
                    $status = 1;
                }
            }
            //echo $status;die;
            $newFilename = time() . $imge;
            $temp = $tempName;
            if ($uploadedpath == '') {
                $upload_path = 'uploads/';
            } else {
                $upload_path = 'uploads/' . $uploadedpath . '/';
            }
            if ($status == 1) {
                move_uploaded_file($temp, $upload_path . $newFilename);
                $return_array = array('status' => 1, 'message' => $message, 'newFilename' => $newFilename);
            } else {
                $return_array = array('status' => 0, 'message' => $message, 'newFilename' => '');
            }
            return $return_array;
        }
    }

    function commonFileArrayUpload($path = '', $images = array(), $uploadType = '')
    {
        $apiStatus = FALSE;
        $apiMessage = [];
        $apiResponse = [];
        if (count($images) > 0) {
            // pr($images);

            for ($p = 0; $p < count($images); $p++) {
                $imge = $images[$p]->getClientName();
                //pr($imge);
                if ($imge == '') {
                    $slider_image = 'no-user-image.jpg';
                } else {
                    $imageFileType1 = pathinfo($imge, PATHINFO_EXTENSION);
                    //pr($imageFileType1);               
                    if ($uploadType == 'image') {
                        if ($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG" && $imageFileType1 != "GIF" && $imageFileType1 != "ico" && $imageFileType1 != "ICO" && $imageFileType1 != "webp") {
                            $message = 'Sorry, only JPG, JPEG, ICO, PNG, WEBP & GIF files are allowed';
                            $status = 0;
                        } else {
                            $message = 'Upload ok';
                            $status = 1;
                        }
                    } elseif ($uploadType == 'pdf') {
                        if ($imageFileType1 != "pdf" && $imageFileType1 != "PDF") {
                            $message = 'Sorry, only PDF files are allowed';
                            $status = 0;
                        } else {
                            $message = 'Upload ok';
                            $status = 1;
                        }
                    } elseif ($uploadType == 'word') {
                        if ($imageFileType1 != "doc" && $imageFileType1 != "DOC" && $imageFileType1 != "docx" && $imageFileType1 != "DOCX") {
                            $message = 'Sorry, only DOC files are allowed';
                            $status = 0;
                        } else {
                            $message = 'Upload ok';
                            $status = 1;
                        }
                    } elseif ($uploadType == 'excel') {
                        if ($imageFileType1 != "xls" && $imageFileType1 != "XLS" && $imageFileType1 != "xlsx" && $imageFileType1 != "XLSX") {
                            $message = 'Sorry, only EXCEl files are allowed';
                            $status = 0;
                        } else {
                            $message = 'Upload ok';
                            $status = 1;
                        }
                    } elseif ($uploadType == 'powerpoint') {
                        if ($imageFileType1 != "ppt" && $imageFileType1 != "PPT" && $imageFileType1 != "pptx" && $imageFileType1 != "PPTX") {
                            $message = 'Sorry, only PPT files are allowed';
                            $status = 0;
                        } else {
                            $message = 'Upload ok';
                            $status = 1;
                        }
                    }
                    $newFilename = time() . $imge;
                    //pr($newFilename);
                    $temp = $images[$p]->getTempName();
                    //pr($temp);
                    if ($path == '') {
                        $upload_path = 'uploads/';
                        //pr($upload_path);
                    } else {
                        $upload_path = 'uploads/' . $path . '/';
                    }
                    if ($status) {
                        move_uploaded_file($temp, $upload_path . $newFilename);
                        //$apiStatus      = TRUE;
                        //$apiMessage     = $message;
                        $apiResponse[]  = $newFilename;
                    } else {
                        //$apiStatus      = FALSE;
                        //$apiMessage     = $message;
                    }
                }
            }
        }
        //$return_array = array('status'=> $apiStatus, 'message'=> $apiMessage, 'newFilename'=> $apiResponse);
        return $apiResponse;
        //pr($apiResponse);
    }

    function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string2 = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        $string3 = preg_replace('/-+/', '-', $string2);
        return $string3;
    }

    function weekdays($dayNo)
    {
        if ($dayNo == 0) {
            $day_name = 'Sunday';
        }
        if ($dayNo == 1) {
            $day_name = 'Monday';
        }
        if ($dayNo == 2) {
            $day_name = 'Tuesday';
        }
        if ($dayNo == 3) {
            $day_name = 'Wednesday';
        }
        if ($dayNo == 4) {
            $day_name = 'Thursday';
        }
        if ($dayNo == 5) {
            $day_name = 'Friday';
        }
        if ($dayNo == 6) {
            $day_name = 'Saturday';
        }
        return $day_name;
    }

    function format_date($dt)
    {
        return date_format(date_create($dt), "h:i A");
    }

    function format_date2($dt)
    {
        return date_format(date_create($dt), "d-m-Y");
    }

    function total_address($a, $b, $c, $d, $e)
    {
        return $a . ' ' . $b . ' ' . $c . ' ' . $d . ' ' . $e;
    }

    function time_difference($to_time)
    {
        $to_time = strtotime($to_time);
        $from_time = strtotime(date('Y-m-d H:i:s'));
        $time_diff = round(abs($to_time - $from_time) / 60, 0);

        if ($time_diff > 1440) {
            $day_diff = round(($time_diff / 1440), 0) . " days";
        } else {
            $day_diff = $time_diff . " mins";
        }
        return $day_diff;
    }

    function page_content($pageID)
    {
        $conditions = array('static_id' => $pageID);
        $static_page = $this->find_data('sms_static_content', 'row', $conditions);
        $content = $static_page->description;
        return $content;
    }

    function review_star_show($rating)
    {
        if ($rating == 0) {
            $star_count = '';
        } elseif ($rating >= 1 && $rating < 2) {
            $star_count = '<span class="fa fa-star checked"></span>';
        } elseif ($rating >= 2 && $rating < 3) {
            $star_count = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>';
        } elseif ($rating >= 3 && $rating < 4) {
            $star_count = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>';
        } elseif ($rating >= 4 && $rating < 5) {
            $star_count = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>';
        } elseif ($rating >= 5) {
            $star_count = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>';
        }
        return $star_count;
    }

    function calculate_average_rating($provider_id, $subcat, $review_count)
    {
        $db = \Config\Database::connect();
        $total_rating_value = $db->query("SELECT sum(rating) as tot_rating FROM `sms_reviews` WHERE `parent_id` = 0 AND `provider_id` = '$provider_id' and subcat='$subcat' and published=1")->getRow();
        if ($review_count > 0) {
            $avarage_rating = $total_rating_value->tot_rating / $review_count;
        } else {
            $avarage_rating = 0;
        }

        return $avarage_rating;
    }

    // function sendEmail($to_email, $email_subject, $mailbody, $filePath = '')
    // {
    //     // $site_setting = $this->find_data('sms_site_settings','row');        
    //     // $from_email = 'info@school.com';
    //     // $from_name = $site_setting->site_name;
    //     // $email->setFrom($from_email, $from_name);
    //     // $email->setTo($to_email);
    //     // $email->setSubject($email_subject);
    //     // $email->setMessage($mailbody);
    //     // $email->send();
    //     // return true;
    //     //echo $filePath;die;
    //      $email = \Config\Services::email();
    //     //$config['protocol'] = 'smtp';
    //     //$config['mailPath'] = '/usr/sbin/sendmail';
    //     $config['charset']  = 'iso-8859-1';
    //     $config['wordWrap'] = true;
    //     $config['mailType'] = 'html';
    //     $email->initialize($config);
    //     $email->setFrom('no-reply@pledge.ecoex.market', 'Ecoex');
    //     $email->setTo($to_email);
    //     //$email->setCC('another@another-example.com');
    //     //$email->setBCC('system@keylines.net');
    //     $email->setSubject($email_subject);
    //     $email->setMessage($mailbody);
    //     $email->attach($filePath);
    //     //$email->send();

    //     try {
    //         $email->send();
    //     //     echo $email->print_debugger();
    //     //  var_dump(error_get_last());exit();
    //         echo 'Email sent successfully';
    //         return true;
    //     } catch (\Exception $e) {
    //         echo 'Email could not be sent. Error: ' . $e->getMessage();
    //     }
    //     //die;

    //    // 
    // }

    public function sendEmail($to_email, $email_subject, $mailbody, $attachment = '')
    {
        $siteSetting        = $this->find_data('sms_site_settings', 'row');
        $email              = \Config\Services::email();
        $from_email         = 'no-reply@victoriatravels.com';
        $from_name          = $siteSetting->site_name;
        $email->setFrom($from_email, $from_name);
        $email->setTo($to_email);
        $email->setCC('subhomoy@keylines.net', 'Victoria Travels');
        // $email->setCC('info@ecoex.market', 'Ecoex Portal');
        $email->setSubject($email_subject);
        $email->setMessage($mailbody);
        if ($attachment != '') {
            $email->attach($attachment);
        }
        $email->send();
        return true;
    }

    function get_user($user_type, $user_id)
    {
        $conditions = array('user_type' => $user_type, 'user_id' => $user_id);
        $user_detail = $this->find_data('users', 'row', $conditions);
        return $user_detail;
    }
    function get_user_detail($user_id)
    {
        $conditions = array('user_id' => $user_id);
        $user_detail = $this->find_data('users', 'row', $conditions);
        return $user_detail;
    }

    function get_category($parent_id, $cat_id)
    {
        $conditions = array('parent_id' => $parent_id, 'cat_id' => $cat_id);
        $category_detail = $this->find_data('sms_category', 'row', $conditions);
        return $category_detail;
    }

    function get_business_primary_address($user_id)
    {
        $conditions = array('user_id' => $user_id, 'is_primary_location' => 1);
        $businessAddress = $this->find_data('sms_business_details', 'row', $conditions);
        if ($businessAddress) {
            $address = $businessAddress->bs_address;
        } else {
            $conditions = array('user_id' => $user_id, 'is_primary_location' => 1);
            $businessAddress2 = $this->find_data('sms_business_details', 'row', $conditions);
            if ($businessAddress2) {
                $address = $businessAddress2->bs_address;
            } else {
                $address = "";
            }
        }
        return $address;
    }

    //     public function getCountIdBlog(){

    //         $db = \Config\Database::connect();
    //         $total_blog_slug_count = $db->query("SELECT  max(created_at) as tot_rating FROM `sms_reviews` WHERE `parent_id` = 0 AND `provider_id` = '$provider_id' and subcat='$subcat' and published=1")->getRow();
    //         if($review_count>0) {
    //             $avarage_rating = $total_rating_value->tot_rating/$review_count;
    //         } else {
    //             $avarage_rating = 0; 
    //         }

    //         return $avarage_rating;


    //         // $db = \Config\Database::connect();
    //         $builder = $db->table('sms_blogs');
    //         $builder->selectMax('created_at');
    //         // $query = $builder->get();
    //         // $this->select_max('created_at');
    //         // $this->db->from('sms_blogs');
    //         // $query = $this->db->get();
    //         if(count($builder) > 0){
    //            return $builder->row('created_at');        
    //         }else{
    //            return 1;
    //         }
    // }



    public function getUsers()
    {
        $users = $userModel->findAll(); // This fetches all rows
        // Use the $users data in your view or process it further
        return view('users_list', ['users' => $users]); // Pass $users to your view
    }



    public function getPackages()
    {
        $builder = $this->db->table('package as P');
        $builder->select('P.*, PC.name as category_name');
        $builder->join('package_category as PC', 'P.category_id = PC.id', 'left');
        $builder->where('P.published !=', 3);
        $query = $builder->get();
        return $query->getResult();
    }


    public function getEnquires()
    {
        $query = $this->db->table('sms_contact_enquiry AS e')
            ->select('e.*')
            ->orderBy('e.created_at', 'DESC')
            ->get();

        return $query->getResult();
    }


    // save or update data
    function removeData($table, $id = '', $field = '')
    {
        return  $this->db->table($table)->where($field, $id)->delete();
    }
    
}
