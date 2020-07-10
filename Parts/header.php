<?php include 'config.php';
include 'classes/User.php';
include 'classes/Video.php';

$usernameLoggedIn= User::isLoggedIn()?$_SESSION["userLoggedIn"]:"";
$userLoggedInObj=new User($con,$usernameLoggedIn);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>YoutubeClone</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--EXTRA<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="action.js"></script>
        <script src="userActions.js"></script>
    </head>
    <body>
        <div class="page">
            <div class="navtop"> 
                <button class="navshowhide">
                    <img src="images/icons/menu.png">
                </button>
                <a class="logo" href="index.php">
                    <img src="images/icons/VideoTubeLogo.png">
                </a>
                <div class="search">
                    <form action="search.php" method="GET">
                        <input type="text" class="searchbar" name="term" placeholder="Search...">
                        <button class="searchbutton">
                            <img src="images/icons/search.png">
                        </button>
                    </form>
                </div>
                <div class="profilebuttons">
                    <a href="upload.php">
                        <img class="upload"src="images/icons/upload.png">
                    </a>
                    <a href="#">
                        <!--we have to change profiles if user has signed in therefore empty right now-->
                        <img class="profilepic" src="images/profilePictures/default.png">
                    </a>
                </div>
            </div>
            <div class="sidebar" style="display: none">
                   
            </div>
            <div class="mainpage">
                
                <div class="maincontent">
