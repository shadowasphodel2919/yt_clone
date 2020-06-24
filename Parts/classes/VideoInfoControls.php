<?php
include 'Parts/classes/ButtonProvider.php';
class VideoInfoControls{
    private $video,$userLoggedInObj;
    
    public function __construct($video,$userLoggedInObj) {
        
        $this->video=$video;
        $this->userLoggedInObj=$userLoggedInObj;
    }
    
    public function create() {
        $likeButton= $this->createLikeButton();
        $dislikeButton= $this->createDislikeButton();
        return "<div class='controls'>"
        . "$likeButton$dislikeButton</div>";
    }
    
    public function createLikeButton() {
        $text= $this->video->getLikes();
        $videoId= $this->video->getId();
        $action="likeVideo(this,$videoId)";
        $class="likeButton";
        $imagesrc="images/icons/thumb-up.png";
        
        //Change button img when clicked
        return ButtonProvider::createButton($text, $imagesrc, $action, $class);
    }
    
    public function createDislikeButton() {
        return "<button>Dislike</button>";
    }
    
}

