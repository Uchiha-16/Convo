<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/answer.css" rel="stylesheet" type="text/css" />

<?php if (!isset($_SESSION['userID'])) : ?>
    <link href="<?php echo URLROOT; ?>/css/free.css" rel="stylesheet" type="text/css" />

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

    <?php endif; ?>

    <div class="container-div">
        <div class="content-body">
            <div class="LHS">
                <div class="question-div">
                    <div class="info">
                        <div class="qdp">
                            <div><?php if ($data['question']->visibility == "anonymus") : ?>

                                    <img src="<?php echo URLROOT; ?>/img/pfp/anonymus.png" />
                            </div>
                            <div class="qdp-1">

                                <label class="expert">Anonymus User</label> <br>
                            <?php else : ?>
                                <img src="<?php echo URLROOT; ?>/img/pfp/<?php echo $data['Quser']->pfp; ?> " />
                            </div>
                            <div class="qdp-1">
                                <label><?php echo $data['Quser']->fName . " " . $data['Quser']->lName; ?></label><br>
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
                        <h3><?php echo $data['question']->title; ?></h3>
                        <p><?php echo $data['question']->content; ?></p>
                        <div class="date-count">
                            <label><?php echo convertTime($data['question']->date); ?></label>
                            <label style="font-weight:600; float:right"><?php echo $data['question']->rating; ?> Recommends</label><br><br><br>
                            <hr>
                            <a href="" class="reactbtn"><img src="<?php echo URLROOT; ?>/img/share.png" style="width: 12%;"> Share</a>
                            <a href="" class="reactbtn"><img src="<?php echo URLROOT; ?>/img/recommend.png" style="width: 12%"> Recommend</a>
                        </div>
                    </div>
                </div>

                <?php if ($data['count']->count > 0) : ?>
                    <?php foreach ($data['answers'] as $answer) : ?>
                        <?php echo $answer->link ?>
                        <?php echo $answer->threadID ?>
                        <div class="answerbox">
                            <div class="info-1">
                                <div class="qdp">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/pfp/<?php echo $answer->pfp; ?>" />
                                    </div>
                                    <div class="qdp-1">
                                        <label><?php echo $answer->uname; ?></label><br>
                                        <label class="qdp-1-2"><?php echo $answer->fName . " " . $answer->lName; ?></label>
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
                                        <button class="upvote" onclick="upvote(<?php echo $answer->threadID ?>)"><i class="fa-sharp fa-solid fa-arrow-up" id="upvote-<?php echo $answer->threadID ?>"></i></button>
                                        <br>
                                        <label class="ratinglabel"><?php echo $answer->rating; ?></label><br>
                                        <button class="downvote" onclick="downvote(<?php echo $answer->threadID ?>)"><i class="fa-sharp fa-solid fa-arrow-down" id="downvote-<?php echo $answer->threadID ?>"></i></button>
                                    </div>

                                    <div>
                                        <div class="date-count">
                                            <label><?php echo convertTime($answer->date); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="answercontent-1">
                                    <?php if ($answer->link != "") : ?>
                                        <iframe width="750" height="315" src="https://www.youtube.com/embed/<?php echo $answer->link ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    <?php endif; ?>
                                    <?php if ($answer->attachment != "") : ?>
                                        <img style="width:50%" src="<?php echo URLROOT; ?>/img/answerImg/<?php echo $answer->attachment; ?>">
                                    <?php endif; ?>
                                    <p><?php echo $answer->content; ?></p>

                                    <hr>
                                    <a href="" class="reactbtn"><img src="<?php echo URLROOT; ?>/img/share.png" style="width: 12%;"> Share</a>
                                    <a href="" class="reactbtn"><img src="<?php echo URLROOT; ?>/img/recommend.png" style="width: 12%"> Recommend</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h2>No Answers for this Question Yet</h2>
                <?php endif; ?>
            </div>

            <div class="RHS">
                
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