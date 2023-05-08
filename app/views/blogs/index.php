<?php require APPROOT . '/views/inc/header.php'; ?>
            <link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo URLROOT; ?>/css/webinar.css" rel="stylesheet" type="text/css" />
            <link rel='stylesheet' type='text/css' media='screen' href="<?php echo URLROOT; ?>/css/expert-home.css">
            <link rel='stylesheet' type='text/css' media='screen' href="<?php echo URLROOT; ?>/css/project-home.css">
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
                    <?php if (!isset($_SESSION['role'])) : ?>
                        <?php require APPROOT . '/views/inc/components/Snavbar.php'; ?>
                    <?php elseif (($_SESSION['role']) == 'seeker') : ?>
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

            


                <!-- body content --> 
                <div class="alert success">
                    <?php flash('reg_flash'); ?>
                </div>
                <div class="container-div">
                    <div class="content-body">
                        <div class="LHS">
                            <div>
                                <h3>blogs Related to your fields...</h3>
                            </div>
                            <div></div>
                            <div></div>

                        
                            <?php foreach ($data['blogs'] as $blog) : ?>
                                
                                <div class="vid-slider">
                                    <div class="vid-wrapper">

                                    <a href="<?php echo URLROOT;?>/blogs/viewblog/<?php echo $blog->BID;?>">
                                        <div class="video vid item">
                                            <div>
                                                <img src="<?php echo URLROOT; ?>/img/headImg/<?php echo $blog->headImg?>" class="thumbnail">
                                            </div>
                                            
                                            <div>
                                                <div class="qdp">
                                                    <div style="height: 100%;">
                                                        <?php if ($blog->pfp != NULL) : ?>
                                                            <img src="<?php echo URLROOT; ?>/img/pfp/<?php echo $blog->pfp ?>" />
                                                        <?php else : ?>
                                                            <img src="<?php echo URLROOT; ?>/img/pfp/user.jpg" />
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="blog-content">
                                                        <h3 class="blog-title"><?php echo $blog->title ?></h3>
                                                        
                                                        <div class="blog-details">
                                                            <div style="text-align: left;">
                                                                <span class="qdp-1-2 qdp-1-3">By <?php echo $blog->firstName?> <?php echo $blog->lastName ?></span>
                                                            </div>
                                                            <div>
                                                                <label class="qdp-1-2">published date: <?php echo $blog->date?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <style>
                                                            .blog-title{
                                                                font-size: 1rem;
                                                                font-weight: 600;
                                                                margin: 0;
                                                                padding-left: 10px;
                                                                padding-top: 10px;
                                                                color: #000;
                                                            }
                                                            .blog-content{
                                                                display: grid;
                                                                grid-template-rows: 1fr 1fr;
                                                                padding:2px;
                                                            }
                                                            .blog-details{
                                                                display: grid;
                                                                grid-template-rows: 1fr 1fr;
                                                                padding-left:7px;
                                                                margin:0px;
                                                            }
                                                        </style>
                                                </div>
                                            </div>
                                            <!-- <a href="<?php echo URLROOT;?>/blogs/viewblog/<?php echo $blog->BID;?>"><button class="answer-btn" type="submit">view blog</button></a> -->
                                        </div>
                                        </a>

                                    </div>
                                </div>

                            <?php endforeach; ?>

                        </div>

                        <div class="RHS">
                            <?php if(isset($_SESSION['userID'])) : ?>
                                <?php if($_SESSION['role'] == 'expert') : ?>
                                    <form action="<?php echo URLROOT; ?>/blogs/add"><button type="submit" style="float:right" class="read-more attend">Create</button></form>
                                    <form action="<?php echo URLROOT; ?>/blogs/myblogs"><button type="submit" style="float:right" class="read-more attend">My Blogs</button></form>
                                    <br><br><br><br><br>
                                <?php endif; ?>
                                    
                            <?php endif; ?>
                                <div class="filter-div" style="margin-top: 0.9rem;">


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
                                                        <input type="checkbox" value="agricultureScience" name="tag[]" id="checkbox1" />Agriculture Science
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox2">
                                                        <input type="checkbox" value="anthropology" name="tag[]" id="checkbox2" />Anthropology
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox3">
                                                        <input type="checkbox" value="biology" name="tag[]" id="checkbox3" />Biology
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox4">
                                                        <input type="checkbox" value="Chemistry" name="tag[]" id="checkbox4" />Chemistry
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox5">
                                                        <input type="checkbox" value="CS" name="tag[]" id="checkbox5" />Computer Science
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox6">
                                                        <input type="checkbox" value="design" name="tag[]" id="checkbox6" />Design
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox7">
                                                        <input type="checkbox" value="economics" name="tag[]" id="checkbox7" />Economics
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox8">
                                                        <input type="checkbox" value="education" name="tag[]" id="checkbox8" />Education
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox9">
                                                        <input type="checkbox" value="engineering" name="tag[]" id="checkbox9" />Engineering
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox10">
                                                        <input type="checkbox" value="EA" name="tag[]" id="checkbox10" />Entertaintment &amp; Arts
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox11">
                                                        <input type="checkbox" value="geoscience" name="tag[]" id="checkbox11" />Geoscience
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox12">
                                                        <input type="checkbox" value="history" name="tag[]" id="checkbox12" />History
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox13">
                                                        <input type="checkbox" value="law" name="tag[]" id="checkbox13" />Law
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox14">
                                                        <input type="checkbox" value="linguistics" name="tag[]" id="checkbox14" />Linguistics
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox15">
                                                        <input type="checkbox" value="literature" name="tag[]" id="checkbox15" />literature
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox16">
                                                        <input type="checkbox" value="mathematics" name="tag[]" id="checkbox16" />Mathematics
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox17">
                                                        <input type="checkbox" value="Medicine" name="tag[]" id="checkbox17" />Medicine
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox18">
                                                        <input type="checkbox" value="linguistics" name="tag[]" id="checkbox18" />Linguistics
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox19">
                                                        <input type="checkbox" value="philosophy" name="tag[]" id="checkbox19" />Philosophy
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox20" for="checkbox1">
                                                        <input type="checkbox" value="physics" name="tag[]" id="checkbox20" />Physics
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox21">
                                                        <input type="checkbox" value="PS" name="tag[]" id="checkbox21" />Political Science
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox22">
                                                        <input type="checkbox" value="psychology" name="tag[]" id="checkbox22" />Psychology
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox23">
                                                        <input type="checkbox" value="RS" name="tag[]" id="checkbox23" />Religious Studies
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox24">
                                                        <input type="checkbox" value="socialScience" name="tag[]" id="checkbox24" />Social Science
                                                    </label>
                                                </li>
                                                <li>
                                                    <label for="checkbox25">
                                                        <input type="checkbox" value="spaceScience" name="tag[]" id="checkbox25" />Space Science
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