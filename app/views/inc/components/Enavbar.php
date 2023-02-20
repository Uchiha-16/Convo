<!-- nav bar -->
<div class="nav">
            <div><a href="#"><img src="<?php echo URLROOT;?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
            <div class="nav-hover"><a href="home.php">Home</a></div>
            <div class="nav-hover"><a href="consulthome.php">Consult</a></div>
            <div class="nav-hover"><a href="event.php">Events</a></div>
            <div><input type="search" name="search" placeholder="Search for questions..."/></div>
            <div class="dropdown-list">
                <button class="dropbtn dropbtn-1" onclick="drop()"><img src="<?php echo URLROOT;?>/img/plus.png" class="icon"> Add New</button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="<?php echo URLROOT;?>/Questions/add">Question</a>
                    <a href="<?php echo URLROOT;?>/Blogs/add">Blog</a>
                    <a href="<?php echo URLROOT;?>/Projects/add">Project</a>
                </div>
            </div>
            <div class="nav-hover"><img src="<?php echo URLROOT;?>/img/notification.png" class="nav-icon"></div>
            <div class="nav-hover"><img src="<?php echo URLROOT;?>/img/chat.png" class="nav-icon" onclick="location.href = 'chat.php'"></div>
            <div class="nav-hover dropbtn" onclick="drop2()">
                <img class="dropbtn" src="<?php echo URLROOT;?>/img/profile.png" class="nav-icon" style="width: 25px;">
                <div class="dropdown-content dropdown-content2" id="myDropdown2">
                    <a href="profile.php">Profile</a>
                    <a href="approve.php">Approvals</a>
                    <a href="blog.php">Blogs</a>
                    <a href="webinar.php">Webinars</a>
                    <a href="project-home.php">Projects</a>
                    <a href="sboard.php">Skill Test</a>
                    <a href="subscription.php">Subscription</a>
                    <a href="<?php echo URLROOT;?>/Users/logout" style="border-bottom:none">Log-out</a>
                </div>
            </div> 
        </div>