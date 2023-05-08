<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT; ?>/css/consultpage.css" rel="stylesheet" type="text/css"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<style>
<?php if (($_SESSION['role'])=='seeker') : ?><?php elseif (($_SESSION['role'])=='expert') : ?>.nav {
    grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
}

<?php endif;
?>
</style>

<script type="text/javascript">
function confirmation() {
    if (confirm("Are you sure you want to discard this blog?")) {
        window.location.href = "<?php echo URLROOT; ?>/Blogs/index";
    }
}
</script>

</head>

<body>
    <?php if (($_SESSION['role']) == 'seeker') : ?>
    <?php require APPROOT . '/views/inc/components/Snavbar.php'; ?>
    <?php elseif (($_SESSION['role']) == 'expert') : ?>
        <!-- nav bar -->
        <div class="nav">
            <div><a href="<?php echo URLROOT;?>/Pages/expert"><img src="<?php echo URLROOT;?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Pages/expert">Home</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Consults/index">Consult</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Webinars/home">Webinar</a></div>
            <div><input id="live_search_event" type="search" name="search" placeholder="Search for questions..."/></div>
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
            <div class="nav-hover"><img src="<?php echo URLROOT;?>/img/notification.png" class="nav-icon"></div>
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Chats/index"><img src="<?php echo URLROOT;?>/img/chat.png" class="nav-icon"></a></div>
            <div class="dropbtn" onclick="drop2()">
                <img class="dropbtn" src="<?php echo URLROOT;?>/img/profile.png" class="nav-icon" style="width: 25px;">
                <div class="dropdown-content dropdown-content2" id="myDropdown2">
                    <a href="<?php echo URLROOT;?>/Profiles/seeker">Profile</a>
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
        <!-- nav bar end -->
    <?php elseif (($_SESSION['role']) == 'seeker/mod') : ?>
        <!-- nav bar -->
        <div class="nav">

            <?php if(isset($_SESSION['userID'])) : ?>
            <div><a href="<?php echo URLROOT; ?>/Pages/seeker"><img
                        src="<?php echo URLROOT; ?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Pages/seeker">Home</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Webinars/home">Webinar</a></div>
            <div><input id="live_search_event" type="search" name="search" placeholder="Search by tag/ expert/ title" />
            </div>

            <div class="dropdown-list">
                <button class="dropbtn dropbtn-1" onclick="drop()"><img src="<?php echo URLROOT; ?>/img/plus.png"
                        class="icon"> Add New</button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="<?php echo URLROOT; ?>/events/add">Event</a>
                    <a href="<?php echo URLROOT;?>/Questions/add">Question</a>
                    <a href="<?php echo URLROOT;?>/Blogs/add" style="border-bottom:none;">Blog</a>
                </div>
            </div>


            <!-- notification bar -->
            <div class="notify-count">
                <span>10</span>
            </div>
            <div class="dropbtn dropbtn-1 notification" onclick="drop3()">
                <img class="dropbtn" src="<?php echo URLROOT; ?>/img/notification.png" class="nav-icon"
                    style="width: 25px;">
            </div>
            <div class="dropdown-content content3" id="myDropdown3" style="top: 5.5rem;">
                <div class="head">
                    <h4>Notifications</h4>
                    <div class="check-box">
                        <input type="checkbox">
                    </div>
                </div>
                <div style="display:block">
                    <div class="tabs">
                        <P><b>New answer added to </b><span style="color:#00a7ae;">String Theory</span> by Varsha Wijethunge
                        </P>
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

            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Chats/index"><img
                        src="<?php echo URLROOT; ?>/img/chat.png" class="nav-icon"></a></div>

            <div class="dropbtn" onclick="drop2()">
                <img class="dropbtn" src="<?php echo URLROOT; ?>/img/profile.png" class="nav-icon" style="width: 25px;">
                <div class="dropdown-content dropdown-content2" id="myDropdown2">
                    <a href="<?php echo URLROOT;?>/Profiles/seeker">Profile</a>
                    <a href="<?php echo URLROOT;?>/Moderators/approve">Approvals</a>
                    <a href="<?php echo URLROOT;?>/Blogs/index">Blogs</a>
                    <a href="<?php echo URLROOT;?>/Events/index">Events</a>
                    <a href="<?php echo URLROOT;?>/Projects/index">Projects</a>
                    <a href="<?php echo URLROOT;?>/SkillTest/index">Skill Test</a>
                    <a href="<?php echo URLROOT;?>/Subscriptions/index">Subscription</a>
                    <a href="<?php echo URLROOT?>/Users/logout" style="border-bottom:none">Log-out</a>
                </div>
            </div>
            <?php else : ?>
            <div><a href="<?php echo URLROOT; ?>/Pages/index"><img
                        src="<?php echo URLROOT; ?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Pages/index">Home</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Webinars/home">Webinar</a></div>
            <div><input type="search" name="search" placeholder="Search for questions..." /></div>
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
        <!-- nav bar end -->
    <?php elseif (($_SESSION['role']) == 'premium') : ?>
    <?php require APPROOT . '/views/inc/components/Pnavbar.php'; ?>
    <?php elseif (($_SESSION['role']) == 'admin') : ?>
    <?php require APPROOT . '/views/inc/components/Anavbar.php'; ?>
    <?php endif; ?>

    <!-- body content -->
    <div class="alert success">
        <?php flash('reg_flash'); ?>
    </div>
    <div class="container-div">
        <div class="content-body">
            <div class="LHS" id="LHS">
                <h3>Invitations for online sessions...</h3><br>

                <!-- Invitations -->
                <?php foreach($data['invites'] as $invites) : ?>
                    <div class="question-div">
                        <div class="info">
                            <?php 
                                $dateString = $invites->date;
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
                            <h3><?php echo $invites->title ?></h3>
                            <p><?php echo $invites->content ?></p>
                            <?php foreach($data['mod'] as $moderator) : ?>
                                <?php if($moderator->EID == $invites->EID) : ?>
                                    <p style="font-size: 12px;color: gray;">Invited by <?php echo $moderator->name; ?></p>
                                <?php endif; ?>
                            <?php endforeach; ?><br>
                            <?php foreach($data['eventstatus'] as $eventstatus) : ?>
                                <?php if($eventstatus->EID == $invites->EID) : ?>
                                    <label class="name-label"><?php echo $eventstatus->fName. " ". $eventstatus->lName; ?></label>
                                    <?php if($eventstatus->status == 'pending') : ?>
                                        <label class="time-label" style="background-color: lightgoldenrodyellow;color: black;">Pending</label>
                                    <?php else : ?>
                                        <label class="time-label">Accepted</label>
                                    <?php endif; ?>
                                    <br> <br>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="date-count" style="margin-top: 1rem;">
                            <form action="<?php echo URLROOT; ?>/events/myEvents/<?php echo $invites->EID; ?>">
                                <button style="float:left" class="accept" type="submit" name="accept">Accept</button>
                            </form>
                            <form action="<?php echo URLROOT; ?>/events/eventRequests/<?php echo $invites->EID; ?>">
                                <button style="float:right" class="decline" type="submit" name="decline">Decline</button>
                            </form>
                            </div>
                        </div>
                        <div class="appointment" style="text-align: right;height: 39px;">
                            <label>
                                <?php echo $daysRemaining ?> Days Remaining<br>
                                <span style="font-size: 11px;color:lightsteelblue"><?php echo date("D, M j, Y", strtotime($invites->date)) ?> | <?php echo date("h:i A", strtotime($invites->time)) ?></span>
                            </label>
                        </div>
                    </div> 
                    <?php endforeach; ?>
            </div>

            <div class="RHS">

                <?php if(isset($_SESSION['userID'])) : ?>
                <?php if($_SESSION['role'] == 'seeker/mod' or $_SESSION['role'] == 'premium/mod') : ?>
                <form action="<?php echo URLROOT; ?>/events/add"><button type="submit" style="float:right"
                        class="read-more attend">Create Event</button></form>
                <form action="<?php echo URLROOT; ?>/events/pending"><button type="submit" style="float:right"
                        class="read-more attend">Pending Events</button></form>
                <br><br>
                <?php endif; ?>
                <?php if($_SESSION['role'] == 'expert') : ?>
                <form action="<?php echo URLROOT; ?>/events/index"><button type="submit" style="float:right"
                        class="read-more attend">Events</button></form>
                <form action="<?php echo URLROOT; ?>/events/myEvents"><button type="submit" style="float:right"
                        class="read-more attend">My Events</button></form>
                <br><br>
                <?php endif; ?>
                <?php endif; ?>

                <div class="filter-div">
                    <form action="<?php echo URLROOT; ?>/events/filter" method="POST">
                        <div style="display:flex">
                            <img src="<?php echo URLROOT; ?>/img/filter.png">
                            <label>Filters</label><button class="read-more go">Go</button>
                        </div>
                        <div>
                            <!-- Filter 1 -->
                            <div class="checkbox-1">
                                <span class="checkbox-title" onclick="filter2()">Happening <i class="arrow up" id="up2"
                                        style="margin-left: 5.2rem;"></i><i class="arrow down" id="down2"
                                        style="margin-left: 5.2rem;"></i></span>
                                <ul id="checkbox-2">
                                    <li>
                                        <label for="checkbox1">
                                            <input type="radio" value="Today" name="publishDate" id="checkbox1" />Today
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox1">
                                            <input type="radio" value="This week" name="publishDate"
                                                id="checkbox1" />This week
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox2">
                                            <input type="radio" value="This month" name="publishDate"
                                                id="checkbox2" />This month
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox3">
                                            <input type="radio" value="This year" name="publishDate"
                                                id="checkbox3" />This year
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <?php if (($_SESSION['role']) == 'seeker/mod') : ?>
                                <!-- Filter 2 -->
                                <div class="checkbox-1">
                                    <span class="checkbox-title" onclick="filter3()">My Hosted Events <i class="arrow up"
                                            id="up3" style="margin-left: 2.1rem;"></i><i class="arrow down" id="down3"
                                            style="margin-left: 2.1rem;"></i></span>
                                    <ul id="checkbox-3">
                                        <li>
                                            <label for="checkbox1">
                                                <input type="checkbox" value="past" name="hostEvent[]" id="checkbox1" />Past
                                                Events
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="upcoming" name="hostEvent[]"
                                                    id="checkbox2" />Upcoming Events
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <footer><a href="<?php echo URLROOT; ?>/Pages/about">About Us</a>
            <p> | </p> &copy; Convo 2022 All rights reserved.
        </footer>
    </div>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>

    <?php require APPROOT . '/views/inc/footer.php'; ?>