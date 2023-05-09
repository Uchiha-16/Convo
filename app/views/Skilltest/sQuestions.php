<?php require APPROOT . '/views/inc/header.php'; ?>

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
    <div class="container-div">
        <div class="content-body">
            <div class="LHS">

                <h3><?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?>'s Skilltest Questions</h3><br>


                <?php foreach ($data['questions'] as $question) : ?>
                    <div class="alert success">
                        <?php flash('reg_flash'); ?>
                    </div>
                    <div class="question-div">
                        <div class="info">
                            <div class="qdp">
                                <div>
                                    <img src="<?php echo URLROOT; ?>/img/pfp/<?php echo $_SESSION['pfp'] ?>" />
                                </div>
                                <div class="qdp-1">
                                    <label><?php echo $_SESSION['uname']; ?></label><br>
                                    <label class="qdp-1-2"><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></label>
                                </div>
                            </div>
                            <div class="tags">
                                <label>Category</label><br>
                                
                                <?php if (isset($question->tag) && isset($question->tag->tag)): ?>
                                    <div class="tag"><?php echo $question->tag->tag ?></div>
                                <?php endif; ?> 
                               
                                <br>
                               
                                    <form action="<?php echo URLROOT; ?>/SkillTest/edit/<?php echo $question->QPID; ?>" style="width: 50%; float:left">
                                        <button class="read-more edit-btn" type="submit"> <img style="width: 13px; padding-right: 8px;" src="../img/edit.png">Edit</button>
                                    </form>
                                    <form action="" style="width: 40%; float:left"></form>
                                    <form action="<?php echo URLROOT; ?>/SkillTest/delete/<?php echo $question->QPID; ?>" style="width: 50%; float:left">
                                        <button class="read-more edit-btn" onclick="return confirm('Are you sure you want to delete this question?')"> <img style="width: 13px; padding-right: 8px;" src="../img/delete.png">Delete</button>
                                    </form>
                              
                            </div>
                        </div>
                        <div class="content-display">
                            <h3><?php echo $question->question ?></h3>
                            <lable><h4>Answers</h4></label>
                            <?php
                            $counter= 1;
                            foreach($question->answers as $answer): ?>
                                        <!-- <input type="radio" name="answer" value="<?php echo $answer->Answer ?>"> -->
                                        <p>Option <?php echo $counter++ ?>-><?php echo $answer->Answer ?><br><br>
                                    <?php endforeach; ?>

                            <br> 
                            <?php $counter = 1; ?>
                            <?php foreach($question->answers as $answer):?>
                                <?php if($answer->validity == 1):?>
                                    <p><b>Correct Option : </b><?php echo $counter . '. ' . $answer->Answer ?></p>
                                <?php endif; ?>
                                <?php $counter++; ?>
                            <?php endforeach; ?>
                            
                           
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>


            <div class="RHS">
                <div class="filter-div">
                    <div style="display:flex">
                        <img src="../img/filter.png">
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
                                <span class="checkbox-title" onclick="filter3()">Questions &amp; answers <i class="arrow up" id="up3" style="margin-left: 0.7rem;"></i><i class="arrow down" id="down3" style="margin-left: 0.7rem;"></i></span>
                                <ul id="checkbox-3">
                                    <li>
                                        <label for="checkbox1">
                                            <input type="checkbox" value="last 3 months" name="QA[]" id="checkbox1" />My questions
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox2">
                                            <input type="checkbox" value="last 6 months" name="QA[]" id="checkbox2" />Answered
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox3">
                                            <input type="checkbox" value="last year" name="QA[]" id="checkbox3" />Not answered
                                        </label>
                                    </li>
                                </ul>
                            </div>


                            <!-- Filter 4 -->
                            <div class="checkbox-1">
                                <span class="checkbox-title" onclick="filter4()">Rating <i class="arrow up" id="up4" style="margin-left: 6.7rem;"></i><i class="arrow down" id="down4" style="margin-left: 6.7rem;"></i></span>
                                
                                    <ul id="checkbox-4">
                                        <li>
                                            <label for="checkbox1">
                                                <input type="checkbox" value="1" name="ratings[]" id="checkbox1"/>1 Star
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="2" name="ratings[]" id="checkbox2"/>2 Stars
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="3" name="ratings[]" id="checkbox3"/>3 Stars
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="3" name="ratings[]" id="checkbox3"/>4 Stars
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="3" name="ratings[]" id="checkbox3"/>5 Stars
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

    <div id="body"></div>

</body>

</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>