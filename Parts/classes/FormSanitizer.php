<?php
class FormSanitizer{
    public static function sanitizeFormString($inputText){
    $inputText= strip_tags($inputText);//builtin to remove html tags
    $inputText= str_replace(" ", "", $inputText);//Taha jamal-->Tahajamal
    $inputText= strtolower($inputText);
    $inputText= ucfirst($inputText);//taha-->Taha
    return $inputText;
}

public static function sanitizeFormUsername($inputText){
    $inputText= strip_tags($inputText);//builtin to remove html tags
    $inputText= str_replace(" ", "", $inputText);//Taha jamal-->Tahajamal
    return $inputText;
}

public static function sanitizeFormPassword($inputText){
    $inputText= strip_tags($inputText);//builtin to remove html tags
    return $inputText;
}

public static function sanitizeFormEmail($inputText){
    $inputText= strip_tags($inputText);//builtin to remove html tags
    $inputText= str_replace(" ", "", $inputText);//Taha jamal-->Tahajamal
    return $inputText;
}
}
