<div class="nav">
            <div><a href="#"><img src="<?php echo URLROOT; ?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
            <?php if(isset($_SESSION['userID'])) : ?>
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Pages/seeker">Home</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Webinars/home">Webinar</a></div>
            <div><input type="search" name="search" placeholder="Search for questions..."/></div>
           
            <div class="dropdown-list">
                <button class="dropbtn dropbtn-1" onclick="drop()"><img src="<?php echo URLROOT; ?>/img/plus.png" class="icon"> Add New</button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="<?php echo URLROOT;?>/Questions/add">Question</a>
                    <a href="<?php echo URLROOT;?>/Blogs/add" style="border-bottom:none;">Blog</a>
                </div>
            </div>
            <div class="nav-hover"><img src="<?php echo URLROOT; ?>/img/notification.png" class="nav-icon"></div>
            <div class="nav-hover"><img src="<?php echo URLROOT; ?>/img/chat.png" class="nav-icon"></div>
            <div class="nav-hover dropbtn" onclick="drop2()">
                <img class="dropbtn" src="<?php echo URLROOT; ?>/img/profile.png" class="nav-icon" style="width: 25px;">
                <div class="dropdown-content dropdown-content2" id="myDropdown2">
                    <a href="<?php echo URLROOT;?>/Profile/View">Profile</a>
                    <a href="<?php echo URLROOT;?>/Moderator/approve">Approvals</a>
                    <a href="<?php echo URLROOT;?>/Blogs/view">Blogs</a>
                    <a href="#">Events</a>
                    <a href="#">Projects</a>
                    <a href="#">Skill Test</a>
                    <a href="seeker/subscriptionpage.php">Subscription</a>
                    <a href="<?php echo URLROOT?>/Users/logout" style="border-bottom:none">Log-out</a>
                </div>
                </div>
                <?php else : ?>

                <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Pages/index">Home</a></div>
                <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Webinars/home">Webinar</a></div>
                <div><input type="search" name="search" placeholder="Search for questions..."/></div>
                    <style>
                        .nav {
                            grid-template-columns: 5% 6% 6% 57% 6% 6% 8% 6%;
                        }
                    </style>
                <div class="nav-hover"><a href="<?php echo URLROOT;?>/Users/login">Login</a></div>
                <div class="nav-hover"><a href="<?php echo URLROOT;?>/Users/signup">Register</a></div>
                <div class="nav-hover"><a href="<?php echo URLROOT;?>/Pages/about">About us</a></div>
                <?php endif; ?>
             
        </div>