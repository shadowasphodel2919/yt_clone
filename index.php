<?php include 'Parts/header.php';?>

<?php 
if(isset($_SESSION["userLoggedIn"])){
    echo "user is logged in as ".$userLoggedInObj->getName();
}
else{
    echo "not logged in";
}
?>

<?php include 'Parts/footer.php';?>