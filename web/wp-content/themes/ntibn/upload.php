<?php
 require('./../../../wp-load.php'); 

$uploadDir = './../../../wp-content/uploads/user_doc/'; 
$uploadedDir = site_url().'/wp-content/uploads/user_doc/';

$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
 
$uploadStatus = 1; 
             
            // Upload file 
            $uploadedFile = ''; 
            if(!empty($_FILES["file"]["name"])){ 
                 
                // File path config 
                $fileName = basename($_FILES["file"]["name"]); 
                $targetFilePath = $uploadDir . $fileName; 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                 
                // Allow certain file formats 
                $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to the server 
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                         $uploadedFile = $fileName; 
                       echo  $uploadedDir.$fileName;
                    }else{ 
                        $uploadStatus = 0; 
                        $response['message'] = 'Sorry, there was an error uploading your file.'; 
                    } 
                }else{ 
                    $uploadStatus = 0; 
                    $response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
                } 
            } 
             
            if($uploadStatus == 1){ 
               $response['message'];
            } 
        
 
// Return response 
//echo json_encode($response);