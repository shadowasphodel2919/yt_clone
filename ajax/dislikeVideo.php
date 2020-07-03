<?php
include '../Parts/config.php';
include '../Parts/classes/Video.php';
include '../Parts/classes/User.php';

$username = $_SESSION["userLoggedIn"];
//$username = $userLoggedInObj->getName();
$videoId = $_POST["videoId"];

$userLoggedInObj = new User($con, $username);
$video = new Video($con, $videoId, $userLoggedInObj);

echo $video->dislike();
?>