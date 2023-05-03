<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT; ?>/css/addconsult.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    <?php if (($_SESSION['role']) == 'seeker') : ?><?php elseif (($_SESSION['role']) == 'expert') : ?>.nav {
        grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
    }

    <?php endif; ?>
</style>

<script type="text/javascript">
    // $(document).ready(function() {
    //     $(".mybutton").click(function() {

    //         $.ajax({
    //             type: "post",
    //             url: "add.php",
    //             data: $("form").serialize(),
    //             success: function(result) {
    //                 $(".myresult").html(result);
    //             }
    //         });

    //     });
    // });
</script>

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
                <h3>Edit Silltest Question</h3><br>

                <!-- Adding a picture to event -->

                <!-- Event 1 -->
                <div class="question-div add-event">
                    <form action="<?php echo URLROOT; ?>/SkillTest/edit<?php echo $data['QPID']; ?>" method="POST">
                        <table>
                            <tr>
                                <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Tags <span class="star">*</span></h4>
                                <div class="dropdown-div">
                                    <form method="POST" id="innerform">
                                        <!-- <?php var_dump($tag); ?> -->
                                            <label>Please Select the <b>Tag</b> which is Related to the Question.</label>
                                            <br><br>
                                            
                                            <select class="inputform" style="font-size:12px;" name="tag" id="dropdown">

                                                <option type="radio" value="agricultureScience" name="tag" id="radio1"  ><label for="radio1">Agriculture Science</label>

                                                <option type="radio" value="anthropology" name="tag" id="radio2"  ><label for="radio2">Anthropology</label>

                                                <option type="radio" value="biology" name="tag" id="radio3"  ><label for="radio3">Biology</label>

                                                <option type="radio" value="Chemistry" name="tag" id="radio4"  ><label for="radio4">Chemistry</label>

                                                <option type="radio" value="CS" name="tag" id="radio5"  ><label for="radio5">Computer Science</label>

                                                <option type="radio" value="design" name="tag" id="radio6"  ><label for="radio6">Design</label>

                                                <option type="radio" value="economics" name="tag" id="radio7"  ><label for="radio7">Economics</label>

                                                <option type="radio" value="education" name="tag" id="radio8"  ><label for="radio8">Education</label>

                                                <option type="radio" value="engineering" name="tag" id="radio9"  ><label for="radio9">Engineering</label>

                                                <option type="radio" value="EA" name="tag" id="radio10"  ><label for="radio10">Entertaintment &amp; Arts</label>

                                                <option type="radio" value="geoscience" name="tag" id="radio11"  ><label for="radio11">Geoscience</label>

                                                <option type="radio" value="history" name="tag" id="radio12"  ><label for="radio12">History</label>

                                                <option type="radio" value="law" name="tag" id="radio13"  ><label for="radio13">Law</label>

                                                <option type="radio" value="linguistics" name="tag" id="radio14"  ><label for="radio14">Linguistics</label>

                                                <option type="radio" value="literature" name="tag" id="radio15"  ><label for="radio15">literature</label>

                                                <option type="radio" value="mathematics" name="tag" id="radio16"  ><label for="radio16">Mathematics</label>

                                                <option type="radio" value="Medicine" name="tag" id="radio17"  ><label for="radio17">Medicine</label>

                                                <option type="radio" value="linguistics" name="tag" id="radio18"  ><label for="radio18">Linguistics</label>

                                                <option type="radio" value="philosophy" name="tag" id="radio19"  ><label for="radio19">Philosophy</label>

                                                <option type="radio" value="physics" name="tag" id="radio20"  ><label for="radio20" for="radio1">Physics</label>

                                                <option type="radio" value="PS" name="tag" id="radio21"  ><label for="radio21">Political Science</label>

                                                <option type="radio" value="psychology" name="tag" id="radio22"  ><label for="radio22">Psychology</label>

                                                <option type="radio" value="RS" name="tag" id="radio23"  ><label for="radio23">Religious Studies</label>

                                                <option type="radio" value="socialScience" name="tag" id="radio24"  ><label for="radio24">Social Science</label>

                                                <option type="radio" value="spaceScience" name="tag" id="radio25"  ><label for="radio25">Space Science</label>
                                            </select>
                            </tr>

                                        <tr>
                                <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Question <span class="star">*</span></h4>


                                    <section>
                                        <div class="row">
                                            <div class="col">
                                                <div class="first box">
                                                    <input id="font-size" type="number" value="16" min="1" max="100" onchange="f1(this)">
                                                </div>
                                                <div class="second box">
                                                    <button type="button" onclick="f2(this)">
                                                        <i class="fa-solid fa-bold"></i>
                                                    </button>
                                                    <button type="button" onclick="f3(this)">
                                                        <i class="fa-solid fa-italic"></i>
                                                    </button>
                                                    <button type="button" onclick="f4(this)">
                                                        <i class="fa-solid fa-underline"></i>
                                                    </button>
                                                </div>
                                                <div class="third box">
                                                    <button type="button" onclick="f5(this)">
                                                        <i class="fa-solid fa-align-left"></i>
                                                    </button>
                                                    <button type="button" onclick="f6(this)">
                                                        <i class="fa-solid fa-align-center"></i>
                                                    </button>
                                                    <button type="button" onclick="f7(this)">
                                                        <i class="fa-solid fa-align-right"></i>
                                                    </button>
                                                </div>
                                                <div class="fourth box">
                                                    <button type="button" onclick="f8(this)">aA</button>
                                                    <button type="button" onclick="f9()">
                                                        <i class="fa-solid fa-text-slash"></i>
                                                    </button>
                                                    <input type="color" onchange="f10(this)">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row row1">
                                            <div class="col col1">
                                                <textarea id="textarea1" class="inputform" type="text" name="question" placeholder="Describe the Question...." >"<?php echo $data['question']; ?></textarea>
                                                <span class="error"><?php echo $data['question_err']; ?></span>
                                            </div>
                                        </div>
                                    </section>
                                </td>
                            </tr>
                            <tr styl>
                               <div> <td class="complaint" ><h4 style="margin-bottom:.5rem">Difficulty Level <span class="star">*</span></h4>
                                    </td>
                                
                            </tr>
                            <tr>
                                
                                <td colspan="3" placeholder="Select the difficulty level.">
                                <select class="inputform" name="difficulty" style="font-size:14px;" required >
                                   
                                    <option value="easy"  <?php echo $data['difficulty'] === 'easy' ? 'selected' : ''; ?>>Easy</option>
                                    <option value="medium" <?php echo $data['difficulty'] === 'medium' ? 'selected' : ''; ?>>Medium</option>
                                    <option value="hard" <?php echo $data['difficulty'] === 'hard' ? 'selected' : ''; ?>>Hard</option>
                                   
                                </select>
                            </tr>
                            <tr>
                            <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Options <span class="star">*</span></h4>
                                    <!-- <?php  var_dump($data['answerObjs']);?> -->
                                    <?php
                                      if (!empty($data['answerObjs'])) {
                                        
                                        $i = 1;
                                        foreach ($data['answerObjs'] as $answer) {
                                    ?>
                                        <!-- <label for="answer<?php echo $i ?>"><?php echo "Option $i" ?></label> -->
                                        <input class="inputform" type="text" id="answer<?php echo $i ?>" name="content[]" value="<?php echo $answer->Answer ?>">
                                    <?php
                                            $i++;
                                        }
                                        } else {
                                    ?>
                                        <input class="inputform" type="text" name="content[]" placeholder="option 1" value="<?php echo isset($data['content'][0]) ? $data['content'][0] : ''; ?>">
                                        <input class="inputform" type="text" name="content[]" placeholder="option 2" value="<?php echo isset($data['content'][1]) ? $data['content'][1] : ''; ?>">
                                        <input class="inputform" type="text" name="content[]" placeholder="option 3" value="<?php echo isset($data['content'][2]) ? $data['content'][2] : ''; ?>">
                                        <input class="inputform" type="text" name="content[]" placeholder="option 4" value="<?php echo isset($data['content'][3]) ? $data['content'][3] : ''; ?>">
                                    <?php
                                        }
                                    ?>
                                </td>
    </tr>

    <tr>
    <td colspan="3">
        <h4 style="margin-bottom:.5rem">Select the correct answer <span class="star">*</span></h4>
        <select class="inputform" name="validity" style="font-size:14px;" required>
            <option value="option1" <?php echo $data['validity'][0] === 1 ? 'selected' : ''; ?>>Option 1</option>
            <option value="option2" <?php echo $data['validity'][1]=== 1 ? 'selected' : ''; ?>>Option 2</option>
            <option value="option3" <?php echo $data['validity'][2] === 1 ? 'selected' : ''; ?>>Option 3</option>
            <option value="option4" <?php echo $data['validity'][3]=== 1 ? 'selected' : ''; ?>>Option 4</option>
        </select>
    </td>
</tr>

    </td>
</tr>


                                        </form>
                                        <?php
                                
                                        ?>
                                    </div>
                                    <!-- <span class="error"><?php echo $data['tag_err']; ?></span> -->
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td colspan="3">
                                    <br><br>
                                    <div class="add">
                                        <button style="float:right" class="read-more attend submit" type="reset">Reset</button>
                                        <button style="float:right" class="read-more attend submit" type="submit" name="update">Update Question</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
            <div class="RHS">
                <form action="<?php echo URLROOT; ?>/Skilltest/sQuestions"><button type="submit" style="float:right" class="read-more attend">My Skilltest Questions</button></form>
                <form action="<?php echo URLROOT; ?>/pages/seeker"><button type="submit" style="float:right" class="read-more attend">Home</button></form>
            </div>
        </div>
        <div>
            <footer><a href="<?php echo URLROOT; ?>/Pages/about">About Us</a>
                <p> | </p> &copy; Convo 2022 All rights reserved.
            </footer>
        </div>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>

    <style>
        
        input[type="radio"] {
        width: 15px;
        height: 15px;
        margin-right: 5px;
                        }

        
                        
      </style>

    <?php require APPROOT . '/views/inc/footer.php'; ?>