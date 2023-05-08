<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/answer.css" rel="stylesheet" type="text/css" />

<?php if (!isset($_SESSION['userID'])) : ?>
    <link href="<?php echo URLROOT; ?>/css/free.css" rel="stylesheet" type="text/css" />

<?php endif; ?>
<style>
    <?php if (($_SESSION['role']) == 'seeker') : ?><?php elseif (($_SESSION['role']) == 'expert' || $_SESSION['role'] == 'premium') : ?>.nav {
        grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
    }

    <?php endif; ?>
</style>

</head>

<body>
    <?php if (isset($_SESSION['role'])) : ?>
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
    <?php else: ?>
        <?php require APPROOT . '/views/inc/components/Snavbar.php'; ?>
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
                                <?php if (isset($_SESSION['role'])) : ?>
                                    <?php if (($_SESSION['role']) == 'expert') : ?>
                                        <!-- should be experts qualification in short -->
                                        <label class="qdp-1-2"><?php echo $data['Quser']->uname; ?></label>
                                    <?php endif; ?>
                                <?php endif; ?>
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
                            <div class="qrate"><label style="font-weight:600; float:right">Overall Rating: <?php echo round($data['question']->rating,1); ?></label></div><br><br>
                            <?php if (isset($_SESSION['role'])) : ?>
                                <?php if (($_SESSION['role']) == 'expert') : ?>
                                    <form action="<?php echo URLROOT; ?>/Answers/add/<?php echo $data['QID'] ?>">
                                        <button class="read-more one" type="submit">Answer this question</button>
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>
                            <hr>
                            <?php if (isset($_SESSION['role'])) : ?>
                                <div class="rating-box">
                                    <header>Rate this question</header>
                                    <div class="stars" onclick="countActive()">
                                    <?php if($data['rating']->rating > 0) : ?>
                                        <?php for($i = 0; $i < $data['rating']->rating; $i++) : ?>
                                            <i class="fa-solid fa-star active"></i>
                                        <?php endfor; ?>
                                        <?php for($i = 0; $i < 5 - $data['rating']->rating; $i++) : ?>
                                            <i class="fa-solid fa-star"></i>
                                        <?php endfor; ?>
                                        <?php else : ?>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <!-- <a href="" class="reactbtn"><img src="/img/share.png" style="width: 12%;"> Share</a> -->
                            <!-- <a href="" class="reactbtn"><img src="/img/recommend.png" style="width: 12%"> Recommend</a> -->
                        </div>
                    </div>
                </div>

                <?php if ($data['count']->count > 0) : ?><br>

                    <?php if ($data['count']->count > 1) : ?>
                        <h3><?php echo $data['count']->count ?> Expertiese Answers</h3>
                    <?php else : ?>
                        <h3><?php echo $data['count']->count ?> Expertiese Answer</h3>
                    <?php endif; ?>
                        <?php $i = 0; ?>
                    <?php foreach ($data['answers'] as $answer) : ?><br>
                        <div class="answerbox">
                            
                                
                            <?php if (isset($_SESSION['role'])) : ?>
                                <div class="answercontent">
                                        <div class="answerrating">
                                            <label>Rate</label><br>
                                            <div>
                                                <?php if($data['interaction'][$i]->interaction == 'liked' ) : ?>
                                                    <button class="upvote vote" onclick="upvote(<?php echo $answer->threadID ?>)" id="upvote-<?php echo $answer->threadID ?>"><i class="fa-sharp fa-solid fa-arrow-up"></i></button>
                                                <?php else : ?>
                                                    <button class="upvote" onclick="upvote(<?php echo $answer->threadID ?>)" id="upvote-<?php echo $answer->threadID ?>"><i class="fa-sharp fa-solid fa-arrow-up"></i></button>
                                                <?php endif; ?>
                                                    <br>
                                                <label class="ratinglabel" id="rating-<?php echo $answer->threadID ?>" ><?php echo $answer->rating; ?></label><br>
                                                <?php if($data['interaction'][$i]->interaction == 'disliked' ) : ?>
                                                    <button class="downvote vote" onclick="downvote(<?php echo $answer->threadID ?>)" id="downvote-<?php echo $answer->threadID ?>"><i class="fa-sharp fa-solid fa-arrow-down" ></i></button>
                                                <?php else : ?>
                                                    <button class="downvote" onclick="downvote(<?php echo $answer->threadID ?>)" id="downvote-<?php echo $answer->threadID ?>"><i class="fa-sharp fa-solid fa-arrow-down"></i></button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                            <?php else: ?>
                                <div class="answercontent" style="grid-template-columns: auto;">
                            <?php endif; ?>
                                    <div class="answercontent-1">
                                        <?php if ($answer->link != "") : ?>
                                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $answer->link ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        <?php endif; ?>
                                        <?php if ($answer->attachment != "") : ?>
                                            <img style="width:20%" src="<?php echo URLROOT; ?>/img/answerImg/<?php echo $answer->attachment; ?>">
                                        <?php endif; ?>
                                        <p><?php echo $answer->content; ?></p>

                                        <hr>
                                    </div>
                                </div>
                            <div class="info-1">
                                <?php if (isset($_SESSION['role'])) : ?>
                                    <div class="qdp">
                                        <div style="display: grid; margin-bottom: auto; margin-top: auto;">
                                            <img src="<?php echo URLROOT; ?>/img/pfp/<?php echo $answer->pfp; ?>" />
                                        </div>
                                        <div class="qdp-1">
                                            <label><?php echo $answer->uname; ?></label>
                                            <label class="qdp-1-2"><?php echo $answer->fName . " " . $answer->lName; ?></label>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="qdp" style="padding-left: 0;">
                                        <div style="display: grid; margin-bottom: auto; margin-top: auto;">
                                            <img src="<?php echo URLROOT; ?>/img/pfp/<?php echo $answer->pfp; ?>" />
                                        </div>
                                        <div class="qdp-1">
                                            <label><?php echo $answer->uname; ?></label>
                                            <label class="qdp-1-2"><?php echo $answer->fName . " " . $answer->lName; ?></label>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <div class="date-count">
                                        <label><?php echo convertTime($answer->date); ?></label>
                                        <a href="" class="reactbtn"><img src="<?php echo URLROOT; ?>/img/share.png" style="width: 12%;"> Share</a>
                                    </div>
                                </div>
                            </div>
                            <?php if(isset($_SESSION['role'])): ?>
                                <div class="comment-section">
                            <?php else: ?>
                                <div class="comment-section" style="padding-left: 0;">
                            <?php endif; ?>
                            <div class="comment" onclick="loadC(<?php echo $answer->threadID ?>)">
                                <button class="read-more one" id="com-<?php echo $answer->threadID ?>" >See Comments</button>
                                
                                    <div id="results-<?php echo $answer->threadID ?>"></div>
                            </div>
                                    <?php if(isset($_SESSION['role'])): ?>
                                        <form method="post">
                                        <div class="add-comment">
                                                <input type="search" name="comment" id="comment-<?php echo $answer->threadID ?>"  style="font-size: 13px; width: 95%; border-radius: 10px 0 0 10px;" placeholder="Add a comment...">
                                                <img src="<?php echo URLROOT; ?>/img/submit.png" class="submit" id="commentbtn-<?php echo $answer->threadID ?>" onclick="loadComments(<?php echo $answer->threadID ?>)">   
                                        </div>
                                        </form>
                                        <div id="msg-<?php echo $answer->threadID ?>"></div>
                                    <?php endif; ?>
                                </div>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h3>No Answers for this Question Yet</h3>
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
<script>
    var QID = <?php echo $data['QID']; ?>;
    var CURRENT_USER = <?php echo $_SESSION['userID']; ?>;

</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>