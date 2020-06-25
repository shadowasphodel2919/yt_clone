<?php

class ButtonProvider{
    public static function createButton($text,$imagesrc,$action,$class) {
        $image=($imagesrc==null)?"":"<img src='$imagesrc'>";
        
        //Change action if needed
        return "<button class='$class' onclick='$action'>"
                . "$image"
                . "<span>$text</span>"
                . "</button>";
    }
}