<?php
ob_start(); //Turns on output buffering 
session_start();

date_default_timezone_set("Indian/Christmas");

try {
    $con = new PDO("mysql:dbname=youtubeclone;host=localhost", "root", "");//using PDO because it is more secure than than mysqli
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>