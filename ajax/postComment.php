<?php
include '../Parts/config.php';
include '../Parts/classes/User.php';
include '../Parts/classes/Comment.php';
include '../Parts/classes/ButtonProvider.php';
if(isset($_POST['commentText'])&&isset($_POST['postedBy'])&&isset($_POST['videoId'])){
    
    $userLoggedInObj=new User($con,$_SESSION["userLoggedIn"]);
    $query=$con->prepare("INSERT INTO comments(postedBy,videoId,responseTo,body)"
                        . "VALUES(:postedBy,:videoId,:responseTo,:body)");
    $query->bindParam(":postedBy",$postedBy);
    $query->bindParam(":videoId",$videoId);
    $query->bindParam(":responseTo",$responseTo);
    $query->bindParam(":body",$commentText);
    
    $postedBy=$_POST['postedBy'];
    $videoId=$_POST['videoId'];
    $responseTo= isset($_POST['responseTo'])?(int)$_POST['responseTo']:0;
    $commentText=$_POST['commentText'];
    
    $query->execute();
    
    
    $newComment=new Comment($con, $con->lastInsertId(), $userLoggedInObj, $videoId);
    echo $newComment->create();
}
else{
    echo "one or more parameter not passed into postComment.php file";
}

