<?php include 'Parts/config.php';
include 'Parts/classes/Account.php';
include 'Parts/classes/Constants.php';
include 'Parts/classes/FormSanitizer.php';

$account=new Account($con);

if(isset($_POST["submitButton"])){
    $username=FormSanitizer::sanitizeFormUsername($_POST["username"]);
    $password=FormSanitizer::sanitizeFormPassword($_POST["password"]);
    $wasSuccessful=$account->login($username,$password);
    if($wasSuccessful){
        //Success
        $_SESSION["userLoggedIn"]=$username;
        header("Location: index.php");
    }
}

function getInputValue($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>YoutubeClone</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="action.js"></script>
    </head>
    <body>
        <div class="signInContainer">
            <div class="column">
                <div class="header">
                    <img src="images/icons/YouTubeLogo.png">
                    <h3>Sign In</h3>
                    <span>to continue to YouTube</span>
                </div>
                <div class="loginform">
                    <form action="signIn.php" method="POST">
                        <?php echo $account->getError(Constants::$loginFailed);?>
                        <input type="text" name="username" placeholder="Username" value="<?php getInputValue('username')?>"  required autocomplete="off">
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="submit" name="submitButton" value="SUBMIT">
                    </form>
                </div>
                <a class="signInMessage" href="signUp.php">Need an account? Sign up here!</a>
            </div>
        </div>
    </body>
</html>