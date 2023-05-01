<!DOCTYPE html>
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
        <link href="<?php echo URLROOT; ?>/css/style.css?version=1" rel="stylesheet" type="text/css" />
        <!-- <link href="<?php echo URLROOT; ?>/css/signup.css?version=1" rel="stylesheet" type="text/css" /> -->
        <link href="<?php echo URLROOT; ?>/css/landing.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URLROOT; ?>/css/page.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo URLROOT; ?>/css/addconsult.css" rel="stylesheet" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
        <script src="https://kit.fontawesome.com/a061f2abcc.js" crossorigin="anonymous"></script>
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

        .user-img{
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 5% 5%;
        }

        #photo{
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }
        #file{
            display: none;
        }
        #uploadbtn{
            border-radius: 50%;
            cursor: pointer;
        }
        .right-profile-edit{
            margin-left: 30px;
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
                <form action="<?php echo URLROOT; ?>/Profiles/seekeredit" method="POST" class="form-field" enctype="multipart/form-data">
                    <!--Container-->
                    <div class="container-edit-profile">
                        <div class="left-profile-edit">
                        <div class="user-img">
                        <label for="file" id="uploadbtn">
                            <img src="<?php echo URLROOT; ?>/img/pfp/<?php echo $data['profile']->pfp ?>" id="photo">
                            <input type="file" id="file" name="pfp" value="">
                        </label>
                    </div>
                            <!-- <div class="profile-picture-sec">
                                <img src="<?php echo URLROOT; ?>/img/pfp/<?php //echo $data['profile']->pfp ?>" alt="profile" class="profile-picture" id="photo">
                                <input type="file" id="file" name="pfp" value="">
                            </div> -->
                            <button class="read-more" style="width:70%">Click on the image to Edit</button>
                        </div>
                        
                        <script>
                    const imgDiv = document.querySelector('.user-img');
                    const img = document.querySelector('#photo');
                    const file = document.querySelector('#file');
                    const uploadebtn = document.querySelector('#uploadbtn');

                    file.addEventListener('change', function() {
                        const choosedfile = this.files[0];
                        if (choosedfile) {
                            const reader = new FileReader();

                            reader.addEventListener('load', function() {
                                img.setAttribute('src', reader.result);
                            })
                            reader.readAsDataURL(choosedfile);
                        }
                    })
                    </script>
                        <div class="right-profile-edit">
                            <!-- update profile -->
                            <!-- <form action="<?php echo URLROOT; ?>/Profiles/seekeredit" method="POST" class="form-field"> -->
                                <div class="form-div">
                                    <label for="fname">First Name</label>
                                    <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                    <input type="text" id="fname" name="fname" class="form-control" value="<?php echo $data['profile']->fName ?>">
                                    <span class="error"><?php echo $data['fname_err']; ?></span>
                                </div>
                                <div class="form-div">
                                    <label for="fname">Last Name</label>
                                    <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                    <input type="text" id="lname" name="lname" class="form-control" value="<?php echo $data['profile']->lName ?>">
                                    <span class="error"><?php echo $data['lname_err']; ?></span>
                                </div>

                                <div class="form-div">
                                <label for="lname">Email</label>
                                <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                <input type="text" id="email" name="email" class="form-control"  value="<?php echo $data['profile']->email ?>">
                                <span class="error"><?php echo $data['email_err']; ?></span>
                                </div>

                                <div class="form-div">
                                <label for="lname">Username</label>
                                <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                <input type="text" id="username" name="uname" class="form-control" value="<?php echo $data['profile']->uname ?>">
                                <span class="error"><?php echo $data['uname_err']; ?></span>
                                </div>

                                <div class="form-div">
                                    <label for="lname">Old Password</label>
                                    <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                    <input type="password" id="password" name="passwordold" class="form-control" placeholder="">
                                    <span class="error"><?php echo $data['oldpassword_err']; ?></span>
                                </div>
                                <div class="form-div">
                                    <label for="lname">New Password</label>
                                    <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="">
                                    <span class="error"><?php echo $data['password_err']; ?></span>
                                </div>
                                <div class="form-div">
                                    <label for="lname">Rewrite New Password</label>
                                    <img class="normal-icon" src="<?php echo URLROOT; ?>/img/edit.png" alt="edit">
                                    <input type="password" id="password" name="confirm_password" class="form-control" placeholder="">
                                    <span class="error"><?php echo $data['confirm_password_err']; ?></span>
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
                            
                                <?php $tagarray = explode(",", $data['tags']); ?>
                                <?php $tagarrayjson = json_encode($tagarray); ?>
                                
                               
                
                                    <?php foreach($tagarray as $tags) : ?>
                                    <div class="tag" ><?php echo  ucfirst($tags);?></div>
                                    <?php endforeach;?>
                                </div>
                                <br>
                                <div class="dropdown-div">
                                        <label style="margin-top: 20px;">Please Select &nbsp;<b>all the Tags </b> &nbsp;you want to add</label>
                                        <ul class="dropdown" id="dropdown">
                                    

                                            <li><input type="checkbox" value="agricultureScience" name="tag[]" id="checkbox1" /><label for="checkbox1">Agriculture Science</label></li>

                                            <li><input type="checkbox" value="anthropology" name="tag[]" id="checkbox2" /><label for="checkbox2">Anthropology</label></li>

                                            <li><input type="checkbox" value="biology" name="tag[]" id="checkbox3" /><label for="checkbox3">Biology</label></li>

                                            <li><input type="checkbox" value="Chemistry" name="tag[]" id="checkbox4" /><label for="checkbox4">Chemistry</label></li>

                                            <li><input type="checkbox" value="CS" name="tag[]" id="checkbox5" /><label for="checkbox5">Computer Science</label></li>

                                            <li><input type="checkbox" value="design" name="tag[]" id="checkbox6" /><label for="checkbox6">Design</label></li>

                                            <li><input type="checkbox" value="economics" name="tag[]" id="checkbox7" /><label for="checkbox7">Economics</label></li>

                                            <li><input type="checkbox" value="education" name="tag[]" id="checkbox8" /><label for="checkbox8">Education</label></li>

                                            <li><input type="checkbox" value="engineering" name="tag[]" id="checkbox9" /><label for="checkbox9">Engineering</label></li>

                                            <li><input type="checkbox" value="EA" name="tag[]" id="checkbox10" /><label for="checkbox10">Entertaintment &amp; Arts</label></li>

                                            <li><input type="checkbox" value="geoscience" name="tag[]" id="checkbox11" /><label for="checkbox11">Geoscience</label></li>

                                            <li><input type="checkbox" value="history" name="tag[]" id="checkbox12" /><label for="checkbox12">History</label></li>

                                            <li><input type="checkbox" value="law" name="tag[]" id="checkbox13" /><label for="checkbox13">Law</label></li>

                                            <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox14" /><label for="checkbox14">Linguistics</label></li>

                                            <li><input type="checkbox" value="literature" name="tag[]" id="checkbox15" /><label for="checkbox15">Literature</label></li>

                                            <li><input type="checkbox" value="mathematics" name="tag[]" id="checkbox16" /><label for="checkbox16">Mathematics</label></li>

                                            <li><input type="checkbox" value="Medicine" name="tag[]" id="checkbox17" /><label for="checkbox17">Medicine</label></li>

                                            <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox18" /><label for="checkbox18">Linguistics</label></li>

                                            <li><input type="checkbox" value="philosophy" name="tag[]" id="checkbox19" /><label for="checkbox19">Philosophy</label></li>

                                            <li><input type="checkbox" value="physics" name="tag[]" id="checkbox20" /><label for="checkbox20" for="checkbox1">Physics</label></li>

                                            <li><input type="checkbox" value="PS" name="tag[]" id="checkbox21" /><label for="checkbox21">Political Science</label></li>

                                            <li><input type="checkbox" value="psychology" name="tag[]" id="checkbox22" /><label for="checkbox22">Psychology</label></li>

                                            <li><input type="checkbox" value="RS" name="tag[]" id="checkbox23" /><label for="checkbox23">Religious Studies</label></li>

                                            <li><input type="checkbox" value="socialScience" name="tag[]" id="checkbox24" /><label for="checkbox24">Social Science</label></li>

                                            <li><input type="checkbox" value="spaceScience" name="tag[]" id="checkbox25" /><label for="checkbox25">Space Science</label></li>
                                        </ul>
                                        <!--
                                                <div class="select">
                                                    <label>All tags selected?</label>
                                                    <button style="float:right" class="read-more submit" type="submit" name="tagcomplete">Yes, I'm good.</button>
                                                    <button style="float:right" class="read-more submit" type="" name="reset">No</button>
                                                </div>
-->
                                        <?php
                                        // display experts of the relavant tags
                                        ?>
                                    </div>
                                    <?php echo "<script>var checkboxValues = " . $tagarrayjson . ";</script>"; ?>
                                    
                                    <script>
                                        //alert(checkboxValues);
                                        for (var i = 0; i < checkboxValues.length; i++) {
                                            //alert(checkboxValues[i]);
                                            var checkbox = document.querySelector("input[type='checkbox'][value='" + checkboxValues[i] + "']");
                                            if (checkbox) {
                                                checkbox.checked = true;
                                            }
                                        }
                                    </script>

                                    <span class="error"><?php echo $data['tag_err']; ?></span>
                                    <input type="submit" value="Update Details" name="submit" /><br>
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