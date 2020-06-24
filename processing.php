<?php 
include 'Parts/header.php';
include 'Parts/classes/VideoUploadData.php';
include 'Parts/classes/VideoProcessor.php';

//if (!isset($_POST("uploadButton"))){
 //   echo 'No file sent';
   // exit();
   // ezmlm_hash("vdsv");
//}
//create file upload data
$videoUploadData= new VideoUploadData($_FILES["fileInput"], $_POST["titleInput"], $_POST["descriptionInput"], $_POST["privacyInput"], $_POST["categoryInput"], $userLoggedInObj->getUsername());

//PROCESS VIDEO DATA(UPLOAD)
$videoProcessor=new VideoProcessor($con);
$wasSuccessful=$videoProcessor->upload($videoUploadData);

//CHECK IF UPLOAD WAS SUCCESSFUL
if($wasSuccessful){
    echo "Upload successful";
}
?>