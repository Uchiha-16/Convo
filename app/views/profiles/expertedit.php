
<!doctype html>
<html lang=en>
<head>
    <!-- meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
        <meta name="description" content="Online Forum">
        <meta charset="UTF-8">
    
    <!-- Title -->
        <title>Convo | Online Forum</title>
        <link rel="icon" type="images/icon" href="<?php echo URLROOT; ?>/img/logoIcon.png">
    
    <!-- stylesheets -->
        <link href="<?php echo URLROOT; ?>/css/style1.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URLROOT; ?>/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URLROOT; ?>/css/landing.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URLROOT; ?>/css/page.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/mobile.css" rel="stylesheet" type="text/css">
       
    
    <style>
        <?php if (($_SESSION['role']) == 'seeker') : ?>
        <?php elseif (($_SESSION['role']) == 'expert') : ?>
        .nav {
            grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
        }

        <?php endif; ?>
        html{
            overflow-x: hidden;
        }
        .LHS{
            padding-bottom: 2rem;
        }
    </style>
</head>

<body>
    <!--Main Menu-->
    <!-- nav bar -->

                    <?php if (($_SESSION['role']) == 'seeker') : ?>
                        <?php require APPROOT . '/views/inc/components/Snavbar.php'; ?>
                    <?php elseif (($_SESSION['role']) == 'expert') : ?>
                        <?php require APPROOT . '/views/inc/components/Enavbar.php'; ?>
                    <?php elseif (($_SESSION['role']) == 'seeker/mod') : ?>
                        <?php require APPROOT . '/views/inc/components/SMnavbar.php'; ?> 
                    <?php elseif (($_SESSION['role']) == 'expert/mod') : ?>
                        <?php require APPROOT . '/views/inc/components/EMnavbar.php'; ?>
                    <?php elseif (($_SESSION['role']) == 'premium') : ?>
                        <?php require APPROOT . '/views/inc/components/Pnavbar.php'; ?>
                    <?php elseif (($_SESSION['role']) == 'admin') : ?>
                        <?php require APPROOT . '/views/inc/components/Anavbar.php'; ?>
                    <?php endif; ?>

       
    <!--end main menu-->
    <div class="container-div">
            <div class="content-body">
                <div class="LHS" style="border:none">
                    <!--Container-->
                    <div class="container-edit-profile">
                        <div class="left-profile-edit">
                            <div class="profile-picture-sec">
                                <img src="<?php echo URLROOT; ?>/img/pfp/<?php echo $data['profile']->pfp ?>" alt="profile" class="profile-picture">
                            </div>
                            <button class="read-more" style="width:50%">Edit Profile Picture</button>
                        </div>
                        <div class="right-profile-edit">
                            <!-- update profile -->
                            <form action="" method="POST" class="form-field">
                                <div class="form-div">
                                    <label for="fname">First Name</label>
                                    <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                    <input type="text" id="fname" name="fname" class="form-control" placeholder="<?php echo $data['profile']->fName ?>">
                                </div>
                                <div class="form-div">
                                    <label for="fname">Last Name</label>
                                    <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                    <input type="text" id="lname" name="lname" class="form-control" placeholder="<?php echo $data['profile']->lName ?>">
                                </div>

                                <div class="form-div">
                                <label for="lname">Email</label>
                                <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                <input type="text" id="email" name="email" class="form-control" placeholder="<?php echo $data['profile']->email ?>">
                                </div>

                                <div class="form-div">
                                <label for="lname">Username</label>
                                <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                <input type="text" id="username" name="username" class="form-control" placeholder="<?php echo $data['profile']->uname ?>">
                                </div>

                                <div class="form-div">
                                    <label for="lname">Old Password</label>
                                    <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="***********">
                                </div>
                                <div class="form-div">
                                    <label for="lname">New Password</label>
                                    <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="">
                                </div>
                                <div class="form-div">
                                    <label for="lname">Rewrite New Password</label>
                                    <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="">
                                </div>
                                <!-- <div class="form-div">
                                    <label for="lname">Designation</label>
                                    <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                    <input type="text" id="designation" name="desigantion" class="form-control" placeholder="BSc. Computer Science">
                                </div> -->
                                <p>Tags

                                <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                </p>
                                <div class="form-div">
                                    <div class="tag" >Neural Networks</div>
                                    <div class="tag" >Biology</div>
                                    <div class="tag" >Nuclear Science</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div>
                </div>
            </div>
            <div>
                <footer><a href="<?php echo URLROOT; ?>/Pages/about">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.</footer>
            </div>
        </div>
        
        
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>
            
        <div id="body"></div>
        
        <script>
            function view(){
                document.getElementById("1").style.display = "grid";
            }
            function cancel(){
                document.getElementById("1").style.display = "none";
            }
        </script>
        
        <script>
            //Get the button:
            mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
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
        
        <script>
            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function drop() {
              document.getElementById("myDropdown").classList.toggle("show");
            }
            
            function drop2() {
              document.getElementById("myDropdown2").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(e) {
              if (!e.target.matches('.dropbtn')) {
              var myDropdown = document.getElementById("myDropdown");
              var myDropdown2 = document.getElementById("myDropdown2");
                if (myDropdown.classList.contains('show')) {
                  myDropdown.classList.remove('show');
                }
                if (myDropdown2.classList.contains('show')) {
                  myDropdown2.classList.remove('show');
                }
              }
            }
            
            function filter1(){
                var x = document.getElementById('checkbox-1');
                if(x.style.display === "none"){
                    x.style.display = "block";
                    document.getElementById('down').style.display = "none";
                    document.getElementById('up').style.display = "inline-block";
                }else{
                    x.style.display = "none";
                    document.getElementById('up').style.display = "none";
                    document.getElementById('down').style.display = "inline-block";
                }
            }
            function filter2(){
                var x = document.getElementById('checkbox-2');
                if(x.style.display === "none"){
                    x.style.display = "block";
                    document.getElementById('down2').style.display = "none";
                    document.getElementById('up2').style.display = "inline-block";
                }else{
                    x.style.display = "none";
                    document.getElementById('up2').style.display = "none";
                    document.getElementById('down2').style.display = "inline-block";
                }
            }
            function filter3(){
                var x = document.getElementById('checkbox-3');
                if(x.style.display === "none"){
                    x.style.display = "block";
                    document.getElementById('down3').style.display = "none";
                    document.getElementById('up3').style.display = "inline-block";
                }else{
                    x.style.display = "none";
                    document.getElementById('up3').style.display = "none";
                    document.getElementById('down3').style.display = "inline-block";
                }
            }
        </script>


</body>

</html>