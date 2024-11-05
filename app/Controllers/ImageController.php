<?php

namespace App\Controllers;

// use App\Models\ImageModel;
use App\Models\CommonModel;

class ImageController extends BaseController
{
    public function saveImage()
    {
        
        //pr($this->request->getPost('imageDataURL'));

        //$imageModel = new ImageModel();
        $this->common_model         = new CommonModel();
        $postData['common_model']   = $this->common_model;
        if($this->request->getMethod() == 'post') {  
            $id = $this->request->getPost('id');
            $imageDataURL = $this->request->getPost('imageDataURL');
            $data['pledge']  = $this->common_model->find_data('sms_pledge_taken', 'row', ['published' => 1, 'id' => $id]);            
            $filename = $data['pledge']->certificate_number;
                // $output_file = '';
               $final_image= $this->save_base64_image($imageDataURL, $filename, $path_with_end_slash="uploads/certificate/" );

            $postData = array(
                //'language'=>$this->request->getPost('language'), 
                'certificate_url' => $final_image,                   
                ); 
                
                $record = $this->common_model->save_data('sms_pledge_taken',$postData,$id,'id');
                
                // file_put_contents($output_file, file_get_contents($imageDataURL));
                if ($record) {
            
                        return json_encode(['success' => true]);
                    } else {
                        return json_encode(['success' => false]);
                    }

                //return redirect()->to(base_url().'/certificate/'.$id);
        }        
    }
    public function save_base64_image($base64_image_string, $output_file_without_extension, $path_with_end_slash="" ) {
        //usage:  if( substr( $img_src, 0, 5 ) === "data:" ) {  $filename=save_base64_image($base64_image_string, $output_file_without_extentnion, getcwd() . "/application/assets/pins/$user_id/"); }      
        //
        //data is like:    data:image/png;base64,asdfasdfasdf
        $splited = explode(',', substr( $base64_image_string , 5 ) , 2);
        $mime=$splited[0];
        $data=$splited[1];
    
        $mime_split_without_base64=explode(';', $mime,2);
        $mime_split=explode('/', $mime_split_without_base64[0],2);
        if(count($mime_split)==2)
        {
            $extension=$mime_split[1];
            if($extension=='jpeg')$extension='jpg';
            //if($extension=='javascript')$extension='js';
            //if($extension=='text')$extension='txt';
            $output_file_with_extension=$output_file_without_extension.'.'.$extension;
        }
        file_put_contents( $path_with_end_slash . $output_file_with_extension, base64_decode($data) );
        return $output_file_with_extension;
    }
}
