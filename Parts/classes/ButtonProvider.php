<?php

class ButtonProvider{
    
    public static $signInFunction="notSignedIn()";
    
    public static function createLink($link) {
        return User::isLoggedIn()?$link: ButtonProvider::$signInFunction;
    }
    
    public static function createButton($text,$imagesrc,$action,$class) {
        $image=($imagesrc==null)?"":"<img src='$imagesrc'>";
        
        //Change action if needed
        $action= ButtonProvider::createLink($action);
        return "<button class='$class' onclick='$action'>"
                . "$image"
                . "<span class='text'>$text views</span>"
                . "</button>";
    }
    
    public static function createHyperlinkButton($text,$imagesrc,$href,$class) {
        $image=($imagesrc==null)?"":"<img src='$imagesrc'>";
        return "<a href='$href'>"
                . "<button class='$class'>"
                . "$image"
                . "<span class='text'>$text views</span>"
                . "</button>"
                . "</a>";
    }
    public static function createUserProfileButton($con,$username){
        $userObj=new User($con,$username);
        $profilePic=$userObj->getProfilePic();
        $link="profile.php?username=$username";
        
        return "<a href='$link'>
                    <img src='$profilePic' class='profilePicture'>
                </a>";
    }
    
    public static function createEditVideoButton($videoId){
        $href="editVideo.php?videoId=$videoId";
        $button= ButtonProvider::createHyperlinkButton("EDIT VIDEO", null, $href, "edit button");
        return "<div class='editVideoButtonContainer'>"
        . "$button"
                . "</div>";
        
    }
    
    public static function createSubscriberButton($con,$userToObj,$userLoggedInObj){
        
        $userTo=$userToObj->getUsername();
        $userLoggedIn=$userLoggedInObj->getUsername();
        
        $isSubscribedTo=$userLoggedInObj->isSubscribedTo($userTo);
        $buttonText=$isSubscribedTo?"SUBSCRIBED":"SUBSCRIBE";
        $buttonText=" ".$userToObj->getSubscriberCount();
        $buttonClass=$isSubscribedTo?"unsubscribed button":"subscribe button";
        $action="subscribe(\"$userTo\",\"$userLoggedIn\",this)";
        $button= ButtonProvider::createButton($buttonText, null, $action, $buttonClass);
        return "<div class='subscribeButtonContainer'>"
        . "$button"
                . "</div>";
    }
}