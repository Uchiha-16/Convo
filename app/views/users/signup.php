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
        <link rel="icon" type="image/icon" href="<?php echo URLROOT; ?>/img/logoIcon.png">

        <!-- stylesheets -->
        <link href="<?php echo URLROOT; ?>/css/style.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    </head>
    <body>
        <div class="grid-container">
            <div class="c1">
                <form action="" method="POST">
                    <p class="title" id="Stitle">Are you a</p>
                    <p id="choose">&lt;&lt;Choose One&gt;&gt;</p><br>
                    <input type="button" value="Seeker ?" name="seeker" onclick="location.href='<?php echo URLROOT; ?>/users/registerSeeker','_self';"/><br><br><br>
                    <input type="button" value="Expert ?" name="expert" onclick="location.href='<?php echo URLROOT; ?>/users/registerExpert','_self';"/><br><br><br>
                    <input type="button" value="Company ?" name="company" onclick="location.href='<?php echo URLROOT; ?>/users/registerCompany','_self';"/><br>
                    <p style="color: #19758D; font-weight:600">Already have an account? <a href="<?php echo URLROOT; ?>/users/login">Log In</a></p>
                </form>
            </div>
            <div class="c2">
                <div>
                    <img src="<?php echo URLROOT; ?>/img/signup.gif" alt="spaceman" id="gif"/>
                </div>
                <div class="c2-c2">
                    <img src="<?php echo URLROOT; ?>/img/logoName.png" alt="Convo" id="logo"/>
                    <p>Hitch your wagon to a star...</p>
                </div>
            </div>
        </div>
        <footer>
            <a href="<?php echo URLROOT; ?>/users/about">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.
        </footer>
        <div id="body">
        </div>

        <!-- scripts -->
        <script>

        </script>
    </body>
</html>
