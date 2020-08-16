<?php

include 'Parts/header.php';
include 'Parts/classes/SearchResultsProvider.php';

if(!isset($_GET["term"])||$_GET["term"]==""){
    echo 'Must search';
    exit();    
}

$term=$_GET["term"];

if(!isset($_GET["orderBy"])||$_GET["orderBy"]=="views"){
    $orderBy="views";
}
else{
    $orderBy="uploadDate";
}

$searchResultsProvider=new SearchResultProvider($con, $userLoggedInObj);
$videos=$searchResultsProvider->getVideos($term, $orderBy);

$videoGrid=new VideoGrid($con, $userLoggedInObj);

?>

<div class="largeVideoGridContainer">
    <?php
    if(sizeof($videos)>0){
        echo $videoGrid->createLarge($videos, sizeof($videos)." videos found", true);
    }
    else{
    echo 'No results found';
    }
    ?>
<?php
include 'Parts/footer.php';
?>