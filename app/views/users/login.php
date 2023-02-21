<?php

    
    // to start a log in session for the user
    // session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
        <meta name="description" content="Online Forum">
        <meta charset="UTF-8">

        <!--<meta name="keywords" content="Forum, Question, Answer">-->

        <!-- Title -->
        <title>Convo | Online Forum</title>
        <link rel="icon" type="images/icon" href="<?php echo URLROOT; ?>/img/logoIcon.png">

        <!-- stylesheets -->
        <link href="<?php echo URLROOT; ?>/css/style.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>

        <!-- scripts -->
        <script src="<?php echo URLROOT; ?>/js/validate.js"></script>
    </head>
    <body>
        <div class="grid-container">
            <div class="c1">
                <form action="<?php echo URLROOT;?>/Users/login" method="POST">
                    <p class="title">log-in</p>
                    <input type="text" placeholder="Enter Username" class="intext" name="uname"  value="<?php echo $data['uname']; ?>" /><br><br>
                    <span class="error"><?php echo $data['uname_err']; ?></span><br>
                    <input type="password" placeholder="Enter Password" class="intext" name="password" value="<?php echo $data['password']; ?>"/><br><br>
                    <span class="error"><?php echo $data['password_err']; ?></span><br><br>
                    <input type="submit" value="Log In" name="submit"/><br>
                    <p style="color: #19758D; font-weight:600">Don’t have an account? <a href="<? echo URLROOT; ?>/users/register">Sign Up</a></p>
                </form>
                <div class="alert success">
                    <?php flash('reg_flash'); ?>
                </div>
            </div>
            
            <div class="c2">
                <div>
                    <img src="<?php echo URLROOT; ?>/img/login.gif" alt="spaceman" id="gif"/>
                </div>
                <div class="c2-c2">
                    <img src="<?php echo URLROOT; ?>/img/logoName.png" alt="Convo" id="logo"/>
                    <p>Hitch your wagon to a star...</p>
                </div>
            </div>
        </div>
        <footer>
            <a href="index.php">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.
        </footer>

<?php require APPROOT . '/views/inc/footer.php'; ?>

