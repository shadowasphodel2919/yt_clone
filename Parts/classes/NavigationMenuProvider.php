<?php
class NavigationMenuProvider{
    private $con,$userLoggedInObj;
    
    public function __construct($con,$userLoggedInObj) {
        $this->con=$con;
        $this->userLoggedInObj=$userLoggedInObj;
    }
    
    public function create() {
        $menuHtml= $this->createNavItem("Home", "images/icons/home.png", "index.php");
        $menuHtml.= $this->createNavItem("Trending", "images/icons/trending.png", "trending.php");
        $menuHtml.= $this->createNavItem("Subscriptions", "images/icons/subscriptions.png", "subscriptions.php");
        $menuHtml.= $this->createNavItem("Liked Videos", "images/icons/thumb-up.png", "likedVideos.php");
        
        if(User::isLoggedIn()){
            $menuHtml.= $this->createNavItem("Settings", "images/icons/settings.png", "settings.php");
            $menuHtml.= $this->createNavItem("Log Out", "images/icons/logout.png", "logout.php");
            $menuHtml .= $this->createSubscriptionsSection();
            
        }
                        
        return "<div class='navigationItems'>"
        . "$menuHtml"
                . "</div>";
    }
    
    private function createNavItem($text,$icon,$link){
        return "<div class='navigationItem'>"
        . "<a href='$link'>"
                . "<img src='$icon'>"
                . "<span>$text</span>"
                . "</a>"
                . "</div>";
    }
    
    private function createSubscriptionsSection(){
        $subs= $this->userLoggedInObj->getSubscriptions();
        
        $html="<span class='heading'>Subscriptions</span>";
        foreach($subs as $sub){
            $subUsername=$sub->getUsername();
            $html .= $this->createNavItem($subUsername, $sub->getProfilePic(), "profile.php?username=$subUsername");
        }
        return $html;
    }
}