<?php
include 'Parts/header.php';
include 'Parts/classes/ProfileGenerator.php';
if(isset($_GET["username"])){
    $profileUsername=$_GET["username"];
}
else{
    echo "Channel Not Found";
    exit();
}
$profileGenerator=new ProfileGenerator($con, $userLoggedInObj, $profileUsername);
echo $profileGenerator->create();
?>

