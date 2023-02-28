<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/answer.css" rel="stylesheet" type="text/css"/>
        <style>
            <?php if(($_SESSION['role']) == 'seeker') : ?>
             
            <?php elseif(($_SESSION['role']) == 'expert') : ?>
            .nav{
                grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
            }
            <?php endif; ?>
        </style>
    </head>
<body>
    <?php if(($_SESSION['role']) == 'seeker') : ?>
        <?php require APPROOT . '/views/inc/components/Snavbar.php'; ?>
    <?php elseif(($_SESSION['role']) == 'expert') : ?>
        <?php require APPROOT . '/views/inc/components/Enavbar.php'; ?>
    <?php endif; ?>

<div class="container-div">
            <div class="content-body">
                <div class="LHS">
                     <div class="question-div">
                        <div class="info">
                            <div class="qdp">
                            <div><?php if($data['question']->visibility == "anonymus") : ?>
                                
                                <img src="<?php echo URLROOT;?>/img/pfp/anonymus.png"/>
                            </div>
                            <div class="qdp-1">
                                
                                    <label class="expert">Anonymus User</label> <br>
                                <?php else : ?>
                                    <img src="<?php echo URLROOT;?>/img/pfp/<?php echo $data['Quser']->pfp; ?> "/>
                            </div>
                            <div class="qdp-1">
                                <label><?php echo $data['Quser']->fName." ".$data['Quser']->lName;?></label><br>
                                <label class="qdp-1-2"><?php echo $data['Quser']->uname; ?></label>
                                <?php endif; ?>
                            </div>
                        </div>
                            <div class="tags">
                                <label>Category</label><br>
                                <?php $tagArray = explode(",", $data['question']->tags); ?>
                                <?php foreach ($tagArray as $tag) : ?>
                                    <div class="tag"><?php echo $tag ?></div>
                                <?php endforeach; ?>
                                <br><br>
                            </div>
                        </div>
                        <div class="content-display">
                            <h3><?php echo $data['question']->title;?></h3>
                            <p><?php echo $data['question']->content;?></p>
                            <div class="date-count">
                                <label><?php echo convertTime($data['question']->date);?></label>
                                <label style="font-weight:600; float:right"><?php echo $data['question']->rating;?> Recommends</label><br><br><br>
                                <hr>
                                <a href="" class="reactbtn"><img src="<?php echo URLROOT;?>/img/share.png" style="width: 12%;"> Share</a>
                                <a href="" class="reactbtn"><img src="<?php echo URLROOT;?>/img/recommend.png" style="width: 12%"> Recommend</a>
                            </div>
                        </div>
                    </div>
                    
                    <?php if($data['count']->count > 0) :?>
                    <?php foreach($data['answers'] as $answer) :?>
                        <?php echo $answer->link?>
                        <?php //print_r ($answer);?>
                    <div class="answerbox">
                        <div class="info-1">
                            <div class="qdp">
                                <div>
                                    <img src="<?php echo URLROOT;?>/img/pfp/<?php echo $answer->pfp; ?>"/>
                                </div>
                                <div class="qdp-1">
                                    <label><?php echo $answer->uname;?></label><br>
                                    <label class="qdp-1-2"><?php echo $answer->fName." ".$answer->lName;?></label>
                                </div>
                            </div>
                            <div class="tags">
                                <?php $tagArray = explode(",", $answer->qualifications); ?>
                                <?php foreach ($tagArray as $tag) : ?>
                                    <div class="tag"><?php echo $tag ?></div>
                                <?php endforeach; ?>
                                <br><br>
                            </div>
                        </div>
                        <div class="answercontent">
                            <div class="answerrating">
                                <div></div>
                                <div>
                            <button class="ratingbtn" onclick="upvote()"><i class="fas fa-long-arrow-alt-up" id="upvote"></i></button>
		                    <br>
                            <label class="ratinglabel"><?php echo $answer->rating; ?></label><br>
		                    <button class="ratingbtn" onclick="downvote()"><i class="fas fa-long-arrow-alt-down" id="downvote"></i></button>
                                </div>
                            
                            <div>
                                <div class="date-count">
                                    <label><?php echo convertTime($answer->date);?></label>
                                </div>
                            </div>
                            </div>
                            <div class = "answercontent-1">
                                <?php if($answer->link != "") : ?>
                                    <iframe width="750" height="315" src="https://www.youtube.com/embed/<?php echo $answer->link?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                <?php endif; ?>
                                <?php if($answer->attachment != "") : ?>
                                    <img style="width:50%" src="<?php echo URLROOT;?>/img/answerImg/<?php echo $answer->attachment;?>">
                                <?php endif; ?>
                                <p><?php echo $answer->content;?></p>
                            
                            <hr>
                            <a href="" class="reactbtn"><img src="<?php echo URLROOT;?>/img/share.png" style="width: 12%;" > Share</a>
                            <a href="" class="reactbtn"><img src="<?php echo URLROOT;?>/img/recommend.png" style="width: 12%"> Recommend</a>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
        <?php else : ?>
            <h2>No Answers for this Question Yet</h2>
        <?php endif; ?>
                </div>

                <div class="RHS">
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
                                <div class="checkbox-1">
                                    <span class="checkbox-title" onclick="filter#()">Rating <i class="arrow up" id="up4" style="margin-left: 6.7rem;"></i><i class="arrow down" id="down4" style="margin-left: 6.7rem;"></i></span>
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
                <footer><a href="index.php">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.</footer>
            </div>
        </div>

        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>

    <div id="body"></div>
    
    </body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
  
        
        