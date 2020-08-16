<?php
include 'Parts/header.php';
include 'Parts/classes/VideoPlayer.php';
include 'Parts/classes/VideoInfoSection.php';
include 'Parts/classes/Comment.php';
include 'Parts/classes/CommentSection.php';
//include 'Parts/classes/VideoGrid.php';
if(!isset($_GET["id"])){
    echo "No url passed";
    exit();
}
$video=new Video($con,$_GET["id"],$userLoggedInObj);
$video->incrementViews();
//echo $video->getTitle();
?>
<script src="VideoPlayerActions.js"></script>
<script src="commentActions.js"></script>
<div class="watchLeft">
    <?php $videoPlayer=new VideoPlayer($video);
    echo $videoPlayer->create(true);//CREATING THE VIDEO PLAYER USING CODE FROM A DIFFERENT PATH
    $videoPlayerInfo=new VideoInfoSection($con, $video, $userLoggedInObj);
    echo $videoPlayerInfo->create();
    $commentSection=new CommentSection($con, $video, $userLoggedInObj);
    echo $commentSection->create();
    ?>
</div>
<div class="suggestions">
    <?php 
    $videoGrid=new VideoGrid($con,$userLoggedInObj);
    echo $videoGrid->create(null, null, false);
    ?>
</div>

<?php include 'Parts/footer.php';?>

