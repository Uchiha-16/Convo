            <?php require APPROOT . '/views/inc/header.php'; ?>
            <link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo URLROOT; ?>/css/webinar.css" rel="stylesheet" type="text/css" />
            <?php if (!isset($_SESSION['userID'])) : ?>
            <link href="<?php echo URLROOT; ?>/css/free.css" rel="stylesheet" type="text/css" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

            <?php endif; ?>
            <style>
                <?php if (($_SESSION['role']) == 'seeker') : ?><?php elseif (($_SESSION['role']) == 'expert') : ?>.nav {
                    grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
                }

                <?php endif; ?>
                            
            </style>
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
            <div><input id="live_search_webinar" type="search" name="search" placeholder="Search by tag/ title/ expert..."/></div>
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
            <div><input id="live_search_webinar" type="search" name="search" placeholder="Search by tag/ expert/ title" />
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
                            <div>
                                <h3>Webinars Related to your fields...</h3>
                            </div>
                            <div></div>
                            <div></div>

                        
                            <?php foreach ($data['webinars'] as $webinar) : ?>
                                
                                <div class="vid-slider">
                                    <div class="vid-wrapper">

                                        <div class="video vid item">
                                            <div>
                                                <img src="<?php echo URLROOT; ?>/img/thumbnails/<?php echo $webinar->thumbnail ?>" class="thumbnail">
                                            </div>
                                            <iframe style="display:none;" width="550" height="325" src="https://www.youtube.com/embed/<?php echo $webinar->videolink ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                            <div>
                                                <div class="qdp">
                                                    <div style="height: 100%;">
                                                        <?php if ($webinar->pfp != NULL) : ?>
                                                            <img src="<?php echo URLROOT; ?>/img/pfp/<?php echo $webinar->pfp ?>" />
                                                        <?php else : ?>
                                                            <img src="<?php echo URLROOT; ?>/img/pfp/user.jpg" />
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="video-content">
                                                        <p class="text"><?php echo $webinar->title ?></p>
                                                        <div class="webinar-details">
                                                            <div>
                                                                <label class="qdp-1-2"><?php echo $webinar->date ?></label>
                                                            </div>
                                                            <div style="text-align: right;">
                                                                <span class="qdp-1-2 qdp-1-3">By <?php echo $webinar->name ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            <?php endforeach; ?>

                            <!-- Popup -->
                            <div class="video-popup">
                                <div class="iframe-wrapper">
                                    <iframe width="800" height="500" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <span class="close-video"><i class="fa-solid fa-xmark"></i></span>
                                </div>
                            </div>

                        </div>

                        <div class="RHS">
                            <?php if(isset($_SESSION['userID'])) : ?>
                                <?php if($_SESSION['role'] == 'expert') : ?>
                                    <form action="<?php echo URLROOT; ?>/Webinars/add"><button type="submit" style="float:right" class="read-more attend">Create</button></form>
                                    <form action="<?php echo URLROOT; ?>/Webinars/myWebinars"><button type="submit" style="float:right" class="read-more attend">My Videos</button></form>
                                    <br><br><br><br><br>
                                <?php endif; ?>
                                    
                            <?php endif; ?>
                                <div class="filter-div" style="margin-top: 0.9rem;">

                                <form action="<?php echo URLROOT; ?>/webinars/filter" method="POST">
                                <div style="display:flex">
                                    <img src="<?php echo URLROOT; ?>/img/filter.png">
                                    <label>Filters</label><button class="read-more go">Go</button>
                                </div>
                                <div>
                                    
                                        <!-- Filter 1 -->
                                        <div class="checkbox-1">
                                            <span class="checkbox-title" onclick="filter2()">Publish date <i class="arrow up" id="up2" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down2" style="margin-left: 4.3rem;"></i></span>
                                            <ul id="checkbox-2">
                                                <li>
                                                    <label for="checkbox1">
                                                        <input type="checkbox" value="last 3 months" name="publishDate[]" id="checkbox1" />Last 3 months
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox2">
                                                        <input type="checkbox" value="last 6 months" name="publishDate[]" id="checkbox2" />Last 6 months
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox3">
                                                        <input type="checkbox" value="last year" name="publishDate[]" id="checkbox3" />Last year
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Filter 3 -->
                                        <div class="checkbox-1">
                                            <span class="checkbox-title" onclick="filter3()">Expert <i class="arrow up" id="up3" style="margin-left: 6.66rem;"></i><i class="arrow down" id="down3" style="margin-left: 6.66rem;"></i></span>
                                            <ul id="checkbox-3">
                                                <li>
                                                    <label for="checkbox1">
                                                        <input type="checkbox" value="last 3 months" name="publishDate[]" id="checkbox1" />Varsha Wijethunge
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox2">
                                                        <input type="checkbox" value="last 6 months" name="publishDate[]" id="checkbox2" />Induwara Pathirana
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox3">
                                                        <input type="checkbox" value="last year" name="publishDate[]" id="checkbox3" />John Silva
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Filter 4 -->
                                        <div class="checkbox-1">
                                            <span class="checkbox-title" onclick="filter4()">Playlist <i class="arrow up" id="up4" style="margin-left: 6.5rem;"></i><i class="arrow down" id="down4" style="margin-left: 6.5rem;"></i></span>
                                            <ul id="checkbox-4">

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