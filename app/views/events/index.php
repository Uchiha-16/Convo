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
function confirmation() {
    if (confirm("Are you sure you want to discard this blog?")) {
        window.location.href = "<?php echo URLROOT; ?>/Blogs/index";
    }
}
</script>

</head>

<body>
    <!-- nav bar -->
    <div class="nav">

        <?php if(isset($_SESSION['userID'])) : ?>
        <div><a href="<?php echo URLROOT; ?>/Pages/seeker"><img
                    src="<?php echo URLROOT; ?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
        <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Pages/seeker">Home</a></div>
        <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Webinars/home">Webinar</a></div>
        <div><input id="live_search_event" type="search" name="search" placeholder="Search for questions..." /></div>

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

    
    <!-- body content -->
    <div class="alert success">
        <?php flash('reg_flash'); ?>
    </div>
    <div class="container-div">
        <div class="content-body">
            <div class="LHS">
                <h3>Join for sessions conducted online...</h3><br>

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
                        <button style="float:right" class="read-more attend">ATTEND</button>
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
                        class="read-more attend">Event Requests</button></form>
                <form action="<?php echo URLROOT; ?>/events/myEvents"><button type="submit" style="float:right"
                        class="read-more attend">My Events</button></form>
                <br><br>
                <?php endif; ?>
                <?php endif; ?>

                <div class="filter-div">
                    <div style="display:flex">
                        <img src="<?php echo URLROOT; ?>/img/filter.png">
                        <label>Filters</label><button class="read-more go">Go</button>
                    </div>
                    <div>
                        <form action="" method="POST">

                            <!-- Filter 1 -->
                            <div class="checkbox-1">
                                <span class="checkbox-title" onclick="filter1()">Category <i class="arrow up"
                                        id="up"></i><i class="arrow down" id="down"></i></span>
                                <ul id="checkbox-1">
                                    <li>
                                        <label for="checkbox1">
                                            <input type="checkbox" value="agricultureScience" name="tag[]"
                                                id="checkbox1" />Agriculture Science
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox2">
                                            <input type="checkbox" value="anthropology" name="tag[]"
                                                id="checkbox2" />Anthropology
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox3">
                                            <input type="checkbox" value="biology" name="tag[]" id="checkbox3" />Biology
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox4">
                                            <input type="checkbox" value="Chemistry" name="tag[]"
                                                id="checkbox4" />Chemistry
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox5">
                                            <input type="checkbox" value="CS" name="tag[]" id="checkbox5" />Computer
                                            Science
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox6">
                                            <input type="checkbox" value="design" name="tag[]" id="checkbox6" />Design
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox7">
                                            <input type="checkbox" value="economics" name="tag[]"
                                                id="checkbox7" />Economics
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox8">
                                            <input type="checkbox" value="education" name="tag[]"
                                                id="checkbox8" />Education
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox9">
                                            <input type="checkbox" value="engineering" name="tag[]"
                                                id="checkbox9" />Engineering
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox10">
                                            <input type="checkbox" value="EA" name="tag[]"
                                                id="checkbox10" />Entertaintment &amp; Arts
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox11">
                                            <input type="checkbox" value="geoscience" name="tag[]"
                                                id="checkbox11" />Geoscience
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox12">
                                            <input type="checkbox" value="history" name="tag[]"
                                                id="checkbox12" />History
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox13">
                                            <input type="checkbox" value="law" name="tag[]" id="checkbox13" />Law
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox14">
                                            <input type="checkbox" value="linguistics" name="tag[]"
                                                id="checkbox14" />Linguistics
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox15">
                                            <input type="checkbox" value="literature" name="tag[]"
                                                id="checkbox15" />literature
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox16">
                                            <input type="checkbox" value="mathematics" name="tag[]"
                                                id="checkbox16" />Mathematics
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox17">
                                            <input type="checkbox" value="Medicine" name="tag[]"
                                                id="checkbox17" />Medicine
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox18">
                                            <input type="checkbox" value="linguistics" name="tag[]"
                                                id="checkbox18" />Linguistics
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox19">
                                            <input type="checkbox" value="philosophy" name="tag[]"
                                                id="checkbox19" />Philosophy
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox20" for="checkbox1">
                                            <input type="checkbox" value="physics" name="tag[]"
                                                id="checkbox20" />Physics
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox21">
                                            <input type="checkbox" value="PS" name="tag[]" id="checkbox21" />Political
                                            Science
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox22">
                                            <input type="checkbox" value="psychology" name="tag[]"
                                                id="checkbox22" />Psychology
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox23">
                                            <input type="checkbox" value="RS" name="tag[]" id="checkbox23" />Religious
                                            Studies
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox24">
                                            <input type="checkbox" value="socialScience" name="tag[]"
                                                id="checkbox24" />Social Science
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox25">
                                            <input type="checkbox" value="spaceScience" name="tag[]"
                                                id="checkbox25" />Space Science
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            <!-- Filter 2 -->
                            <div class="checkbox-1">
                                <span class="checkbox-title" onclick="filter2()">Publish date <i class="arrow up"
                                        id="up2" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down2"
                                        style="margin-left: 4.3rem;"></i></span>
                                <ul id="checkbox-2">
                                    <li>
                                        <label for="checkbox1">
                                            <input type="checkbox" value="last 3 months" name="publishDate[]"
                                                id="checkbox1" checked />All
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox2">
                                            <input type="checkbox" value="last 6 months" name="publishDate[]"
                                                id="checkbox2" />Upcoming
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox3">
                                            <input type="checkbox" value="last year" name="publishDate[]"
                                                id="checkbox3" />Past
                                        </label>
                                    </li>
                                </ul>
                            </div>
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