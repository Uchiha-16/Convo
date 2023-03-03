<?php require APPROOT . '/views/inc/header.php'; ?>

<link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT; ?>/css/webinar.css" rel="stylesheet" type="text/css" />

<style>
    .nav {
        grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
    }
</style>
</head>

<body>
    <!-- nav bar -->
    
    <?php if (($_SESSION['role']) == 'expert') : ?>
        <?php require APPROOT . '/views/inc/components/Enavbar.php'; ?>
    <?php elseif (($_SESSION['role']) == 'expert/mod') : ?>
        <?php require APPROOT . '/views/inc/components/EMnavbar.php'; ?>
    <?php endif; ?>


    <!-- body content -->
    <div class="container-div">
        <div class="content-body">
            <div class="LHS webinar-stat">
                <h3>Webinar Content</h3>
                <div class="table">
                    <table class="webinar-table">
                        <!-- TH -->
                        <tr>
                            <th colspan="2">Video</th>
                            <th colspan="3" style="padding-left:2rem;">Date</th>
                        </tr>
                        <!-- section -->
                        <tr>
                            <td class="table-thumbnail"><img src="<?php echo URLROOT; ?>/img/1.png"></td>
                            <td>Fortnite 2022 01 15 00 01 48 06 DVR<br><span>hgjhhj</span></td>
                            <td class="table-date">Feb 6, 2021<br><span>Published</span></td>
                            <td class="edit" style="font-size: 16px;font-weight: 500;width: 6%;">Edit</td>
                            <td class="edit remove" style="font-size: 16px;font-weight: 500;width: 13%;">Remove</td>
                        </tr>
                        <!-- section -->
                        <tr>
                            <td class="table-thumbnail"><img src="<?php echo URLROOT; ?>/img/6.png"></td>
                            <td>Shingeki no Kyojin | Attack on Titan - MUST WATCH<br><span>At the beginning, there was Hope... Light... and Joy... But now, there's no hope in their eyes... Its just Dark...</span></td>
                            <td class="table-date">Feb 6, 2021<br><span>Published</span></td>
                            <td class="edit" style="font-size: 16px;font-weight: 500;">Edit</td>
                            <td class="edit remove" style="font-size: 16px;font-weight: 500;">Remove</td>
                        </tr>
                        <!-- section -->
                        <tr>
                            <td class="table-thumbnail"><img src="<?php echo URLROOT; ?>/img/3.png"></td>
                            <td>Mikasa Ackerman FAN ART<br><span>Hey again everyone! This video is also inspired by Attack On Titan anime. If you haven't checked out ...</span></td>
                            <td class="table-date">Feb 4, 2021<br><span>Published</span></td>
                            <td class="edit" style="font-size: 16px;font-weight: 500;">Edit</td>
                            <td class="edit remove" style="font-size: 16px;font-weight: 500;">Remove</td>
                        </tr>
                        <!-- section -->
                        <tr>
                            <td class="table-thumbnail"><img src="<?php echo URLROOT; ?>/img/4.png"></td>
                            <td>EREN YEAGER fan art in 4 min!<br><span>Hey again everyone! I'm uploading my second video which is inspired by Attack On Titan anime. The artwork ...</span></td>
                            <td class="table-date">Dec 27, 2020<br><span>Published</span></td>
                            <td class="edit" style="font-size: 16px;font-weight: 500;">Edit</td>
                            <td class="edit remove" style="font-size: 16px;font-weight: 500;">Remove</td>
                        </tr>
                        <!-- section -->
                        <tr>
                            <td class="table-thumbnail"><img src="<?php echo URLROOT; ?>/img/5.png"></td>
                            <td>Amazing Genshin Impact Fanart!<br><span>Hey everyone! I'm uploading my first video which is inspired by the most popular game among otakus, Genshin ...</span></td>
                            <td class="table-date">Nov 17, 2020<br><span>Published</span></td>
                            <td class="edit" style="font-size: 16px;font-weight: 500;">Edit</td>
                            <td class="edit remove" style="font-size: 16px;font-weight: 500;">Remove</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="RHS">
                <form action="<?php echo URLROOT; ?>/Webinars/add"><button type="submit" style="float:right" class="read-more attend">Create</button></form>
                <form action="<?php echo URLROOT; ?>/Webinars/myWebinars"><button type="submit" style="float:right" class="read-more attend">My Videos</button></form>
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
                                <span class="checkbox-title" onclick="filter3()">Expert <i class="arrow up" id="up3" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down3" style="margin-left: 6.66rem;"></i></span>
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
                                <span class="checkbox-title" onclick="filter4()">Playlist <i class="arrow up" id="up4" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down4" style="margin-left: 6.5rem;"></i></span>
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