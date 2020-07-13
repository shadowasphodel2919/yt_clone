<?php
require_once("../Parts/config.php"); 
require_once("../Parts/classes/Video.php"); 
require_once("../Parts/classes/User.php"); 

$username = $_SESSION["userLoggedIn"];
$videoId = $_POST["videoId"];

$userLoggedInObj = new User($con, $username);
$video = new Video($con, $videoId, $userLoggedInObj);

echo $video->dislike();
?>