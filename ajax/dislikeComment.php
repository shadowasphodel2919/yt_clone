<?php
include '../Parts/config.php';
include '../Parts/classes/Comment.php';
include '../Parts/classes/User.php';

$username = $_SESSION["userLoggedIn"];
//$username = $userLoggedInObj->getName();
$videoId = $_POST["videoId"];
$commentId=$_POST["commentId"];

$userLoggedInObj = new User($con, $username);
$comment = new Comment($con, $commentId, $userLoggedInObj,$videoId);

echo $comment->dislike();
?>
