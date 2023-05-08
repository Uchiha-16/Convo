<!doctype html>
<html lang=en>

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
    <link href="<?php echo URLROOT; ?>/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT; ?>/css/landing.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/mobile.css" rel="stylesheet" type="text/css">

    <!-- scripts -->
    <script src="validate.js"></script>
</head>

<body>
    <div class="container-div">
        <img src="<?php echo URLROOT; ?>/img/back.png" class="back" />
        <div class="navbar-div">
            <div class="nav-bar">
                <img src="<?php echo URLROOT; ?>/img/logoWhite.png" id="logo" onclick="document.location='<?php echo URLROOT; ?>/pages/index'" style="cursor: pointer" />
                <p class="quote">Hitch your wagon to a star...</p>
            </div>
            <div class="buttons">
                <button class="btn login" onclick="document.location='<?php echo URLROOT; ?>/users/login'">Log In</button>
                <button class="btn join" onclick="document.location='<?php echo URLROOT; ?>/users/signup'">Join for free</button>
            </div>
        </div>
        <div class="content-div">
            <div class="div-1">
                <h1>Online Forum</h1>
                <p>Are you struggling with your subject?<br>Do you need expertise answers for<br>your questions? </p>
                <img src="<?php echo URLROOT; ?>/img/logoNamep.png" id="logo" />
                <h3>is here to help you!</h3>
                <button class="btn btn-1" onclick="document.location='<?php echo URLROOT; ?>/users/signup.php'">Join for free</button>
                <img src="<?php echo URLROOT; ?>/img/p2.png" class="picture1" />
            </div>
            <div class="div-1 div-2" align="right">
                <img src="<?php echo URLROOT; ?>/img/p1.png" class="picture2" />
                <h2>Discover your favorite Webinars...</h2>
                <input type="search" name="search" placeholder="Search for webinars" />
            </div>
            <div class="div-3">
                <div>
                    <h2>Connect with your scientific community.</h2>
                    <p>Ask your questions, collaborate with your peers,<br>
                        and get the support you need<br>to advance your career.</p>
                </div>
                <div class="div-1 tag-div">
                    <div>
                        <div class="tag">Mathematics</div><br>
                        <div class="tag">Agriculture</div><br>
                        <div class="tag">Geoscience</div><br>
                        <div class="tag">Law</div><br>
                        <div class="tag">Philosphy</div>
                    </div>
                    <div>
                        <div class="tag">Biology</div><br>
                        <div class="tag">Design</div><br>
                        <div class="tag">Engineering</div><br>
                        <div class="tag">Medicine</div><br>
                        <div class="tag">Religion</div>
                    </div>
                    <div>
                        <div class="tag">Physics</div><br>
                        <div class="tag">Anthropology</div><br>
                        <div class="tag">History</div><br>
                        <div class="tag">Space Science</div>
                    </div>
                </div>
            </div>
            <div class="div-1 div-4">
                <div>
                    <img src="<?php echo URLROOT; ?>/img/seeker.png" class="icon" />
                </div>
                <div class="div-4-content">
                    <h2>ARE YOU A SEEKER?</h2>
                    <p>If you are a curious person who seeks for answers<br>
                        and wants to gain knowledge through discussions,<br>
                        this is the perfect role for you !</p><br>
                    <button class="btn btn-1" onclick="document.location='<?php echo URLROOT; ?>/users/registerSeeker'">Join for free</button>
                </div>
            </div>
            <div class="div-1 div-4">
                <div>
                    <img src="<?php echo URLROOT; ?>/img/expert.png" class="icon" />
                </div>
                <div class="div-4-content">
                    <h2>ARE YOU AN EXPERT?</h2>
                    <p>If you are a person who likes to impart wisdom<br>
                        and knowledge in areas of your expertise, commit your time<br>
                        to guide and teach the seekers,<br>
                        this is the perfect role for you !</p><br>
                    <button class="btn btn-1" onclick="document.location='<?php echo URLROOT; ?>/users/registerExpert'">Join for free</button>
                </div>
            </div>
            <div class="div-1 div-4 company-div">
                <div>
                    <img src="<?php echo URLROOT; ?>/img/company.png" class="icon" />
                </div>
                <div class="div-4-content">
                    <h2>ARE YOU A COMPANY?</h2>
                    <p>If you are a person who wants to recruit members for projects,<br>showcase your company to others,<br>this is the perfect role for you !</p><br>
                    <button class="btn btn-1" onclick="document.location='<?php echo URLROOT; ?>/users/registerCompany'">Join for free</button>
                </div>
            </div>
            <footer>
                <a href="<?php echo URLROOT; ?>/Pages/about">About Us</a>
                <p> | </p> &copy; Convo 2022 All rights reserved.
            </footer>
        </div>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>

    <div id="body">
    </div>

    <script>
        //Get the button:
        mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
</body>

</html>