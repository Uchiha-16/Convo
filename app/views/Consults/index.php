
<?php require APPROOT . '/views/inc/header.php'; ?>

<link href="<?php echo URLROOT; ?>/css/consultpage.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URLROOT; ?>/css/calander.css" rel="stylesheet" type="text/css"/>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    <?php if (($_SESSION['role']) == 'expert' || ($_SESSION['role']) == 'premium') : ?>
      .nav {
        grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
    }
    <?php endif; ?>
</style>

<script type="text/javascript">
    function confirmation(){
      if(confirm("Are you sure you want to discard this blog?")){
        window.location.href = "<?php echo URLROOT; ?>/Blogs/index";
      }
    }
</script>

</head>

<body>
<?php if (($_SESSION['role']) == 'expert') : ?>
        <!-- nav bar -->
<div class="nav">
            <div><a href="<?php echo URLROOT;?>/Pages/expert"><img src="<?php echo URLROOT;?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Pages/expert">Home</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Consults/index">Consult</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Webinars/home">Webinar</a></div>
            <div><input id="live_search_Consult" type="search" name="search" placeholder="Search for consultations..."/></div>
            <?php if(isset($_SESSION['userID'])) : ?>
            <div class="dropdown-list">
                <button class="dropbtn dropbtn-1" onclick="drop()"><img src="<?php echo URLROOT;?>/img/plus.png" class="icon"> Add New</button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="<?php echo URLROOT;?>/Questions/add">Question</a>
                    <a href="<?php echo URLROOT;?>/Consults/add">Consultation</a>
                    <a href="<?php echo URLROOT;?>/Blogs/add">Blog</a>
                    <a href="<?php echo URLROOT;?>/Projects/add">Project</a>
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
                    <a href="<?php echo URLROOT;?>/SkillTest/index">Skill Test</a>
                    <a href="<?php echo URLROOT;?>/Subscriptions/index">Subscription</a>
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
        
   
<?php elseif (($_SESSION['role']) == 'premium') : ?>
        <!-- nav bar -->
<div class="nav">
            <div><a href="<?php echo URLROOT;?>/Pages/expert"><img src="<?php echo URLROOT;?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Pages/seeker">Home</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Consults/index">Consult</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Webinars/home">Webinar</a></div>
            <div><input id="live_search_Consult" type="search" name="search" placeholder="Search for consultations..."/></div>
            <?php if(isset($_SESSION['userID'])) : ?>
            <div class="dropdown-list">
                <button class="dropbtn dropbtn-1" onclick="drop()"><img src="<?php echo URLROOT;?>/img/plus.png" class="icon"> Add New</button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="<?php echo URLROOT;?>/Questions/add">Question</a>
                    <a href="<?php echo URLROOT;?>/Blogs/add">Blog</a>
                    <a href="<?php echo URLROOT;?>/Projects/add">Project</a>
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
                        <!-- <div class="tabs">
                            <P><b>New answer added to </b><span style="color:#00a7ae;">String Theory</span> by Varsha Wijethunge</P>
                        </div>
                        <div class="tabs">
                            <P><b>Upcoming consultation </b>with <span style="color:#00a7ae;">Dilky Liyanage</span></P>
                        </div>
                        <div class="tabs">
                            <P><b>Upcoming event </b>on <span style="color:#00a7ae;">Data Structures and Algorithms</span></P>
                        </div>
                        <div class="tabs">
                            <P><b>You have been selected </b>to the <span style="color:#00a7ae;">A9 Project</span></P> -->
                        </div>
                    </div>
                </div>
                
                <!-- notification bar end -->
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Chats/index"><img src="<?php echo URLROOT;?>/img/chat.png" class="nav-icon"></a></div>
            <div class="dropbtn" onclick="drop2()">
                <img class="dropbtn" src="<?php echo URLROOT;?>/img/profile.png" class="nav-icon" style="width: 25px;">
                <div class="dropdown-content dropdown-content2" id="myDropdown2">
                    <a href="<?php echo URLROOT;?>/Profile/View">Profile</a>
                    <!-- <a href="<?php echo URLROOT;?>/Moderator/approve">Approvals</a> -->
                    <a href="<?php echo URLROOT;?>/Blogs/index">Blogs</a>
                    <a href="<?php echo URLROOT;?>/Events/index">Events</a>
                    <a href="<?php echo URLROOT;?>/Projects/index">Projects</a>
                    <a href="<?php echo URLROOT;?>/SkillTest/index">Skill Test</a>
                    <a href="<?php echo URLROOT;?>/Subscriptions/index">Subscription</a>
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

        </div><?php require APPROOT . '/views/inc/components/Pnavbar.php'; ?>
    <?php endif; ?>
        
        <!-- body content -->
        <div class="alert success">
                    <?php flash('reg_flash'); ?>
                </div>
        <div class="container-div">
            <div class="content-body">
                <div class="LHS" id="LHS">
                    <h3>My Appointments</h3><br>

                    <?php foreach($data['consults'] as $consults) : ?>
                    <div class="question-div">
                        <div class="info">
                            <?php 
                            $dateString = $consults->date;
                            $dateTime = new DateTime($dateString);

                            $year = $dateTime->format('Y');
                            $month = $dateTime->format('M');
                            $day = $dateTime->format('d');
?>
                            <div class="calander">
                                <div class="cal1">
                                    <label><?php echo $month ?></label>
                                </div>
                                <div class="cal2">
                                    <label><?php echo $day?></label>
                                </div>
                            </div>
                        </div>

                        <?php date_default_timezone_set('Asia/Colombo'); 
                        
                        // Convert the future date to a Unix timestamp
                            $futureTimestamp = strtotime($dateString);

                            // Get the current Unix timestamp
                            $currentTimestamp = time();

                            // Calculate the time difference between the future and current timestamps
                            $timeDifference = $futureTimestamp - $currentTimestamp;

                            // Convert the time difference to days
                            $daysRemaining = ceil($timeDifference / (60 * 60 * 24));
?>
                        <div class="content-display">
                            <h3><?php echo $consults->title ?></h3>
                            <label class="name-label"> Approved By <?php echo $consults->fName. " ". $consults->lName; ?></label>
                            <label class="time-label"><?php echo $consults->time; ?></label>
                            <div class="date-count">
                            <button style="float:left" class="decline"><?php echo $daysRemaining ?> Days Remaining</button>
                            </div>
                        </div>
                        <div class="appointment">
                            <label>Upcoming</label>
                        </div>
                    </div> 
                    <?php endforeach; ?>
            
                   
                </div>
                <div class="RHS">
                <form action="<?php echo URLROOT; ?>/Consults/requests"><button title="Waiting for approval" type="submit" style="float:right" class="read-more attend">Schedules</button></form>
                <form action="<?php echo URLROOT; ?>/Consults/add"><button title="Add a new Appointment" type="submit" style="float:right" class="read-more attend">Add an Appointment</button></form>
                <?php if($_SESSION['role'] == 'expert'): ?>
                    <form action="<?php echo URLROOT;?>/Consults/accepted"><button title="Appointments Accepted by you" type="submit" style="float:right" class="read-more attend">Inquiries</button></form>
                     <form action="<?php echo URLROOT;?>/Consults/accept"><button title="Awaiting approval from you" type="submit" style="float:right" class="read-more attend">Appointments</button></form>
                     <br><br><br><br>
                     <?php endif; ?>
                <br><br><br><br><br>
                    <div class="filter-div">
                        <div style="display:flex">
                            <img src="<?php echo URLROOT; ?>/img/filter.png">
                            <label>Filters</label><button class="read-more go">Go</button>
                        </div>
                        <div>
                            <form action="" method="POST">
                            
                                <!-- Filter 1 -->
                                <div class="checkbox-1">
                                    <span class="checkbox-title" onclick="filter1()">Category <i class="arrow up" id="up"></i><i class="arrow down" id="down"></i></span>
                                    <ul id="checkbox-1">
                                        <li>
                                            <label for="checkbox1">
                                                <input type="checkbox" value="agricultureScience" name="tag[]" id="checkbox1"/>Agriculture Science
                                            </label>
                                        </li>     
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="anthropology" name="tag[]" id="checkbox2"/>Anthropology
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="biology" name="tag[]" id="checkbox3"/>Biology
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox4">
                                                <input type="checkbox" value="Chemistry" name="tag[]" id="checkbox4"/>Chemistry
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox5">
                                                <input type="checkbox" value="CS" name="tag[]" id="checkbox5"/>Computer Science
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox6">
                                                <input type="checkbox" value="design" name="tag[]" id="checkbox6"/>Design
                                            </label>
                                        </li>       
                                        <li>
                                            <label for="checkbox7">
                                                <input type="checkbox" value="economics" name="tag[]" id="checkbox7"/>Economics
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox8">
                                                <input type="checkbox" value="education" name="tag[]" id="checkbox8"/>Education
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox9">
                                                <input type="checkbox" value="engineering" name="tag[]" id="checkbox9"/>Engineering
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox10">
                                                <input type="checkbox" value="EA" name="tag[]" id="checkbox10"/>Entertaintment &amp; Arts
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox11">
                                                <input type="checkbox" value="geoscience" name="tag[]" id="checkbox11"/>Geoscience
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox12">
                                                <input type="checkbox" value="history" name="tag[]" id="checkbox12"/>History
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox13">
                                                <input type="checkbox" value="law" name="tag[]" id="checkbox13"/>Law
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox14">
                                                <input type="checkbox" value="linguistics" name="tag[]" id="checkbox14"/>Linguistics
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox15">
                                                <input type="checkbox" value="literature" name="tag[]" id="checkbox15"/>literature
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox16">
                                                <input type="checkbox" value="mathematics" name="tag[]" id="checkbox16"/>Mathematics
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox17">
                                                <input type="checkbox" value="Medicine" name="tag[]" id="checkbox17"/>Medicine
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox18">
                                                <input type="checkbox" value="linguistics" name="tag[]" id="checkbox18"/>Linguistics
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox19">
                                                <input type="checkbox" value="philosophy" name="tag[]" id="checkbox19"/>Philosophy
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox20" for="checkbox1">
                                                <input type="checkbox" value="physics" name="tag[]" id="checkbox20"/>Physics
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox21">
                                                <input type="checkbox" value="PS" name="tag[]" id="checkbox21"/>Political Science
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox22">
                                                <input type="checkbox" value="psychology" name="tag[]" id="checkbox22"/>Psychology
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox23">
                                                <input type="checkbox" value="RS" name="tag[]" id="checkbox23"/>Religious Studies
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox24">
                                                <input type="checkbox" value="socialScience" name="tag[]" id="checkbox24"/>Social Science
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox25">
                                                <input type="checkbox" value="spaceScience" name="tag[]" id="checkbox25"/>Space Science
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                
                                <!-- Filter 2 -->
                                <div class="checkbox-1">
                                    <span class="checkbox-title" onclick="filter2()">Publish date <i class="arrow up" id="up2" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down2" style="margin-left: 4.3rem;"></i></span>
                                    <ul id="checkbox-2">
                                        <li>
                                            <label for="checkbox1">
                                                <input type="checkbox" value="last 3 months" name="publishDate[]" id="checkbox1"/>Last 3 months
                                            </label>
                                        </li>     
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="last 6 months" name="publishDate[]" id="checkbox2"/>Last 6 months
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="last year" name="publishDate[]" id="checkbox3"/>Last year
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                
                                <!-- Filter 3 -->
                                <div class="checkbox-1">
                                    <span class="checkbox-title" onclick="filter3()">Questions &amp; answers <i class="arrow up" id="up3" style="margin-left: 0.7rem;"></i><i class="arrow down" id="down3" style="margin-left: 0.7rem;"></i></span>
                                    <ul id="checkbox-3">
                                        <li>
                                            <label for="checkbox1">
                                                <input type="checkbox" value="last 3 months" name="QA[]" id="checkbox1"/>My questions
                                            </label>
                                        </li>     
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="last 6 months" name="QA[]" id="checkbox2"/>Answered
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="last year" name="QA[]" id="checkbox3"/>Not answered
                                            </label>
                                        </li>
                                    </ul>
                                </div>

                                
                                <!-- Filter 4 -->
                                <!-- <div class="checkbox-1">
                                    <span class="checkbox-title" onclick="filter#()">Rating <i class="arrow up" id="up4" style="margin-left: 6.7rem;"></i><i class="arrow down" id="down4" style="margin-left: 6.7rem;"></i></span> -->
<!--
                                    <ul id="checkbox-3">
                                        <li>
                                            <label for="checkbox1">
                                                <input type="checkbox" value="last 3 months" name="QA[]" id="checkbox1"/>My questions
                                            </label>
                                        </li>     
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="last 6 months" name="QA[]" id="checkbox2"/>Answered
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="last year" name="QA[]" id="checkbox3"/>Not answered
                                            </label>
                                        </li>
                                    </ul>
-->
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <footer><a href="<?php echo URLROOT; ?>/Pages/about">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.</footer>
            </div>
        </div>
        
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>
            
        <div id="body"></div>
         
        <script type="text/JavaScript">
            var URLROOT = '<?php echo URLROOT; ?>';
        </script>

        <script type="text/JavaScript">
            <?php if(isset($_SESSION['userID'])): ?>
                var ROLE = '<?php echo $_SESSION['role']; ?>';
                <?php else : ?>
                var ROLE = 'guest';
            <?php endif; ?>
            
        </script>


        <script src="<?php echo URLROOT; ?>/js/comments.js" type="text/javascript"></script>
        <script src="<?php echo URLROOT; ?>/js/imageUpload.js"></script>
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/jQuery/jQuery.js"></script>
        <script src="<?php echo URLROOT; ?>/js/rating.js" type="text/javascript"></script>
        <script src="<?php echo URLROOT; ?>/js/textEditor.js" type="text/javascript"></script>
        <script src="<?php echo URLROOT; ?>/js/notifictaions.js" type="text/javascript"></script>

    </body>


</html>


