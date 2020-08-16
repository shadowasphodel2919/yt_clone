<?php include 'Parts/header.php';?>

<div class="videoSection">
    <?php
    
    $subscriptionsProvider=new SubscriptionsProvider($con, $userLoggedInObj);
    $subscriptionVideos=$subscriptionsProvider->getVideos();
    
    $videoGrid=new VideoGrid($con, $userLoggedInObj);
    
    if(User::isLoggedIn() && sizeof($subscriptionVideos)>0){
        echo $videoGrid->create($subscriptionVideos, "Subscriptions", false);
    }
    echo $videoGrid->create(null,"Recommended for you",false);
    ?>
</div>

<?php include 'Parts/footer.php';?>