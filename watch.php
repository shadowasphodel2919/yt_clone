<?php
include 'Parts/header.php';
include 'Parts/classes/VideoPlayer.php';
include 'Parts/classes/VideoInfoSection.php';
if(!isset($_GET["id"])){
    echo "No url passed";
    exit();
}
$video=new Video($con,$_GET["id"],$userLoggedInObj);
$video->incrementViews();
//echo $video->getTitle();
?>
<script src="VideoPlayerActions.js"></script>
<div class="watchLeft">
    <?php $videoPlayer=new VideoPlayer($video);
    echo $videoPlayer->create(true);//CREATING THE VIDEO PLAYER USING CODE FROM A DIFFERENT PATH
    $videoPlayerInfo=new VideoInfoSection($con, $video, $userLoggedInObj);
    echo $videoPlayerInfo->create();
    ?>
</div>
<div class="suggestions">
    
</div>

<?php include 'Parts/footer.php';?>

