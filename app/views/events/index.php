<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<style>
<?php if (($_SESSION['role'])=='seeker') : ?><?php elseif (($_SESSION['role'])=='expert') : ?>.nav {
    grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
}

<?php endif;
?>
</style>

<script type="text/javascript">
    function confirmationAccept(EID){
        if(confirm("Event Added to your profile")){
            window.location.href = "<?php echo URLROOT; ?>/Events/attendEvent/" + EID;
      }else {
        return false;
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
            <div><input id="live_search_event" type="search" name="search" placeholder="Search Events..."/></div>
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
                <h3>Join online sessions that are conducted in your fields....</h3><br>

                <!-- Events --> 
                <?php foreach ($data['events'] as $event) : ?>
                <div class="question-div" style="margin-bottom: 3rem;">
                    <div class="info">
                        <div>
                            <p>TOPIC</p>
                            <h3><?php echo $event->title ?></h3>
                            <span><?php echo $event->content ?></span>
                        </div>
                        <div class="tags">
                            <label>Category</label><br>
                            <?php for ($i = 0; $i < count($data['tags']); $i++) : ?>
                            <?php if ($data['tags'][$i]->EID == $event->EID) : ?>
                            <?php $tagArray = explode(",", $data['tags'][$i]->tags); ?>
                            <?php foreach ($tagArray as $tag) : ?>
                            <div class="tag"><?php echo $tag ?></div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="content-display">
                        <div class="flex">
                            <button
                                class="read-more webinar"><?php echo date("D, M j, Y", strtotime($event->date)) ?></button>
                            <button
                                class="read-more webinar time"><?php echo date("h:i A", strtotime($event->time)) ?></button>
                        </div><br>
                        <p>Resource person</p>
                        <div class="flex">
                            <?php foreach ($data['resourcePerson'] as $RP) : ?>
                            <?php if ($RP->EID == $event->EID) : ?>
                            <div class="qdp">
                                <div>
                                    <img src="<?php echo URLROOT; ?>/img/pfp/<?php echo $RP->pfp ?>" />
                                </div>
                                <div class="qdp-1" style="margin-left: 1rem;">
                                    <label><?php echo $RP->name ?></label><br>
                                    <label class="qdp-1-2"><?php echo $RP->qual ?></label>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <button style="float:right" class="read-more attend" onclick="confirmationAccept(<?php echo $event->EID;?>)">ATTEND</button>
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
                <form action="<?php echo URLROOT; ?>/events/eventRequests"><button type="submit" style="float:right"
                        class="read-more attend">Invitations</button></form>
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