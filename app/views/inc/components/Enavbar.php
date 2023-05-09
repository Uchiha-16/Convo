<!-- nav bar -->
<div class="nav">
            <div><a href="<?php echo URLROOT;?>/Pages/expert"><img src="<?php echo URLROOT;?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Pages/expert">Home</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Consults/index">Consult</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Webinars/home">Webinar</a></div>
            <div><input id="live_search" type="search" name="search" placeholder="Search for questions..."/></div>
            <?php if(isset($_SESSION['userID'])) : ?>
            <div class="dropdown-list">
                <button class="dropbtn dropbtn-1" onclick="drop()"><img src="<?php echo URLROOT;?>/img/plus.png" class="icon"> Add New</button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="<?php echo URLROOT;?>/Questions/add">Question</a>
                    <a href="<?php echo URLROOT;?>/Consults/add">Consultation</a>
                    <a href="<?php echo URLROOT;?>/Blogs/add">Blog</a>
                    <a href="<?php echo URLROOT;?>/Projects/add">Project</a>
                    <a href="<?php echo URLROOT;?>/FormTag/add">Tags</a>
                </div>
            </div>
            <!-- notification bar -->
            <div class="notify-count">
                <span id="notificationCount"></span>
            </div>
            <div class="dropbtn dropbtn-1 notification" onclick="drop3()" id="notification">
                <img class="dropbtn" src="<?php echo URLROOT; ?>/img/notification.png" class="nav-icon" style="width: 25px;">
            </div>
                <div class="dropdown-content content3" id="myDropdown3" style="top: 5.5rem;">
                    <div class="head">
                        <h4>Notifications</h4>
                        <div class="check-box">
                            <input type="checkbox">
                        </div>
                    </div>
                    <div style="display:block" id="notificationBlock">
                        <div class="tabs">
                            <P><b>New answer added to </b><span style="color:#00a7ae;">String Theory</span> by Varsha Wijethunge</P>
                        </div>
                        <div class="tabs">
                            <P><b>Upcoming consultation </b>with <span style="color:#00a7ae;">Dilky Liyanage</span></P>
                        </div>
                        <div class="tabs">
                            <P><b>Upcoming event </b>on <span style="color:#00a7ae;">Data Structures and Algorithms</span></P>
                        </div>
                        <div class="tabs">
                            <P><b>You have been selected </b>to the <span style="color:#00a7ae;">A9 Project</span></P>
                        </div>
                    </div>
                </div>
                
                <!-- notification bar end -->
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Chats/index"><img src="<?php echo URLROOT;?>/img/chat.png" class="nav-icon"></a></div>
            <div class="dropbtn" onclick="drop2()">
                <img class="dropbtn" src="<?php echo URLROOT;?>/img/profile.png" class="nav-icon" style="width: 25px;">
                <div class="dropdown-content dropdown-content2" id="myDropdown2">
                    <a href="<?php echo URLROOT;?>/Profiles/expert">Profile</a>
                    <!-- <a href="<?php echo URLROOT;?>/Moderator/approve">Approvals</a> -->
                    <a href="<?php echo URLROOT;?>/Blogs/index">Blogs</a>
                    <a href="<?php echo URLROOT;?>/Events/index">Events</a>
                    <a href="<?php echo URLROOT;?>/Projects/index">Projects</a>
                    <a href="<?php echo URLROOT;?>/SkillTest/add">Add Skill Test Question</a>
                    <a href="<?php echo URLROOT;?>/Subscriptions/index">Subscription</a>
                    <a href="<?php echo URLROOT;?>/report/addReport">Report or Complaint</a>
                    <a href="<?php echo URLROOT?>/Users/logout" style="border-bottom:none">Log-out</a>
                </div>
            </div> 

            <?php else : ?>
                <style>
                    .nav {
                         grid-template-columns: 5% 6% 6% 57% 6% 6% 8% 6%;
                    }
                </style>
            <div class="nav-hover"><a href="login.php">Login</a></div>
            <div class="nav-hover"><a href="signup.php">Register</a></div>
            <div class="nav-hover"><a href="aboutus.php">About us</a></div>
            <?php endif; ?>

        </div>
        
   