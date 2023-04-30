<div class="nav">
            
            <?php if(isset($_SESSION['userID'])) : ?>
            <div><a href="<?php echo URLROOT; ?>/Pages/seeker"><img src="<?php echo URLROOT; ?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Pages/seeker">Home</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Webinars/home">Webinar</a></div>
            <div><input type="search" name="search" id="live_search" placeholder="Search for questions..."/></div>
           
            <div class="dropdown-list">
                <button class="dropbtn dropbtn-1" onclick="drop()"><img src="<?php echo URLROOT; ?>/img/plus.png" class="icon"> Add New</button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="<?php echo URLROOT;?>/Questions/add">Question</a>
                    <a href="<?php echo URLROOT;?>/Blogs/add" style="border-bottom:none;">Blog</a>
                </div>
            </div>

            

            <div class="nav-hover"><img src="<?php echo URLROOT; ?>/img/notification.png" class="nav-icon"></div>
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Chats/index"><img src="<?php echo URLROOT; ?>/img/chat.png" class="nav-icon"></a></div>
            <div class="dropbtn" onclick="drop2()">
                <img class="dropbtn" src="<?php echo URLROOT; ?>/img/profile.png" class="nav-icon" style="width: 25px;">
                <div class="dropdown-content dropdown-content2" id="myDropdown2">
                    <a href="<?php echo URLROOT;?>/Profiles/seeker">Profile</a>
                    <a href="<?php echo URLROOT;?>/Blogs/index">Blogs</a>
                    <a href="<?php echo URLROOT;?>/Events/index">Events</a>
                    <a href="<?php echo URLROOT;?>/Projects/index">Projects</a>
                    <a href="<?php echo URLROOT;?>/SkillTest/index">Skill Test</a>
                    <a href="<?php echo URLROOT;?>/Subscriptions/index">Subscription</a>
                    <a href="<?php echo URLROOT?>/Users/logout" style="border-bottom:none">Log-out</a>
                </div>
                </div>
                <?php else : ?>
                <div><a href="<?php echo URLROOT; ?>/Pages/index"><img src="<?php echo URLROOT; ?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
                <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Pages/index">Home</a></div>
                <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Webinars/home">Webinar</a></div>
                <div><input type="search" name="search" id="live_search" placeholder="Search for questions..."/></div>
                    <style>
                        .nav {
                            grid-template-columns: 5% 6% 6% 57% 6% 6% 8% 6%;
                        }
                    </style>
                <div class="nav-hover"><a href="<?php echo URLROOT;?>/Users/login">Login</a></div>
                <div class="nav-hover"><a href="<?php echo URLROOT;?>/Users/signup">Register</a></div>
                <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Pages/about">About us</a></div>
                <?php endif; ?>
             
        </div>