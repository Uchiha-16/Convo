<?php require APPROOT . '/views/inc/header.php'; ?>


</head>

<body>
    <?php require APPROOT . '/views/inc/components/Snavbar.php'; ?>

    <!-- body content -->
    <div class="container-div">
        <div class="content-body">
            <div class="LHS" id="LHS">
                <h3>Questions and Discussions</h3><br>

                <?php foreach ($data['questions'] as $question) : ?>

                    <div class="question-div">
                        <div class="info">
                            <div class="qdp">
                                <div><?php if ($question->visibility == "anonymus") : ?>

                                        <img src="<?php echo URLROOT; ?>/img/pfp/anonymus.png" />
                                </div>
                                <div class="qdp-1">

                                    <label class="expert">Anonymus User</label> <br>
                                <?php else : ?>
                                    <img src="<?php echo URLROOT; ?>/img/pfp/<?php echo $question->pfp ?>" />
                                </div>
                                <div class="qdp-1">
                                    <label><?php echo $question->fName . " " . $question->lName; ?></label><br>
                                    <label class="qdp-1-2"><?php echo $question->uname ?></label>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="tags">
                                <label>Category</label><br>
                                <?php for ($i = 0; $i < count($data['tags']); $i++) : ?>
                                    <?php if ($data['tags'][$i]->QID == $question->QID) : ?>
                                        <?php $tagArray = explode(",", $data['tags'][$i]->tags); ?>
                                        <?php foreach ($tagArray as $tag) : ?>
                                            <div class="tag"><?php echo $tag ?></div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <div class="content-display">
                            <h3><?php echo $question->title ?></h3>
                            <p class="line-clamp"><?php echo $question->content ?></p>
                            <!-- <script>
                                //=========================================== line-clamp

                                var content = document.querySelector('.line-clamp');
                                var text = content.textContent;
                                var textLength = text.length;
                                var maxTextLength = 30;
                                if (textLength > maxTextLength) {
                                var newText = text.substring(0, maxTextLength);
                                content.textContent = newText + '...';
                                }
                                content = "";
                                </script> -->
                            <div class="date-count">
                                <label><?php echo convertTime($question->date); ?></label>
                            <?php for ($i = 0; $i < count($data['count']); $i++) : ?>
                                <?php if ($data['count'][$i]->QID == $question->QID) : ?>
                                    <label style="font-weight:600; float:right"><?php echo $data['count'][$i]->count; ?> Answers</label><br>
                                    <?php break; ?>
                                <?php endif; ?>
                                
                            <?php endfor; ?>
                                <label style="font-weight:600; float:right">Overall Rating: <?php echo round($question->rating,1); ?></label><br>
                                <form action="<?php echo URLROOT; ?>/answers/viewA/<?php echo $question->QID; ?>">
                                    <button style="float:right" class="read-more">READ MORE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>


            <div class="RHS">
                <?php if(isset($_SESSION['userID'])) : ?>
                    <form action="<?php echo URLROOT; ?>/Questions/myquestions"><button type="submit" style="float:right" class="read-more go">My Questions</button></form>
                <?php endif; ?>
                <form action="<?php echo URLROOT; ?>/pages/filter" method="POST">
                <div class="filter-div">
                    <div style="display:flex">
                        <img src="<?php echo URLROOT; ?>/img/filter.png">
                        <label>Filters</label><button class="read-more go" id="filter" type="submit">Go</button>
                    </div>
                    <div>

                    
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
                                        <label for="checkbox2">
                                            <input type="checkbox" value="Answered" name="QA[]" id="checkbox1" />Answered
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox3">
                                            <input type="checkbox" value="Not Answered" name="QA[]" id="checkbox2" />Not answered
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
                                                <input type="checkbox" value="1" name="rating[]" id="checkbox1"/>1 Star
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="2" name="rating[]" id="checkbox2"/>2 Stars
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="3" name="rating[]" id="checkbox3"/>3 Stars
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="4" name="ratings[]" id="checkbox3"/>4 Stars
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="5" name="ratings[]" id="checkbox3"/>5 Stars
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