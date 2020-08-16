<?php
include 'Parts/header.php';
include 'Parts/classes/TrendingProvider.php';
$trendingProvider=new TrendingProvider($con, $userLoggedInObj);
$videos=$trendingProvider->getVideos();

$videoGrid=new VideoGrid($con, $userLoggedInObj);
?>

<div class="largeVideoGridContainer">
    <?php
    if(sizeof($videos)>0){
        echo $videoGrid->createLarge($videos, "Trending Videos uploaded in the last week", false);
    }
    else{
        echo "No trending videos to show";
    }
    ?>
</div>