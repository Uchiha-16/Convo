<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT; ?>/css/addconsult.css" rel="stylesheet" type="text/css" />
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
                <h3>Edit Question</h3><br>

                <div class="question-div add-event">
                    <form action="<?php echo URLROOT; ?>/Questions/edit/<?php echo $data['QID']; ?>" method="POST">

                        <table>
                            <tr>
                                <td colspan="3">
                                    <p class="desc">Make sure you search the question before adding a question. Enter a clear and concise question that others will easily understand.
                                        <br>Please provide any details experts may nedd to answer your question.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Title <span class="star">*</span></h4>
                                    <input class="inputform" type="text" name="title" placeholder="Enter title here..." value="<?php echo $data['title']; ?>">
                                    <span class="error"><?php echo $data['title_err']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Content</h4>


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
                                                <textarea id="textarea1" class="inputform" type="text" name="content" placeholder="Describe the Question...."><?php echo $data['content']; ?></textarea>
                                                <span class="error"><?php echo $data['content_err']; ?></span>
                                            </div>
                                        </div>
                                    </section>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Tags <span class="star">*</span></h4>
                                    <div class="dropdown-div">
                                        <label>Please Select <b>all the Tags</b> which are Related to the Event.</label>
                                        <ul class="dropdown" id="dropdown">
                                            <?php $tagarray = explode(",", $data['tag']); ?>
                                            <?php $tagarrayjson = json_encode($tagarray); ?>

                                            <li><input type="checkbox" value="agricultureScience" name="tag[]" id="checkbox1" /><label for="checkbox1">Agriculture Science</label></li>

                                            <li><input type="checkbox" value="anthropology" name="tag[]" id="checkbox2" /><label for="checkbox2">Anthropology</label></li>

                                            <li><input type="checkbox" value="biology" name="tag[]" id="checkbox3" /><label for="checkbox3">Biology</label></li>

                                            <li><input type="checkbox" value="Chemistry" name="tag[]" id="checkbox4" /><label for="checkbox4">Chemistry</label></li>

                                            <li><input type="checkbox" value="CS" name="tag[]" id="checkbox5" /><label for="checkbox5">Computer Science</label></li>

                                            <li><input type="checkbox" value="design" name="tag[]" id="checkbox6" /><label for="checkbox6">Design</label></li>

                                            <li><input type="checkbox" value="economics" name="tag[]" id="checkbox7" /><label for="checkbox7">Economics</label></li>

                                            <li><input type="checkbox" value="education" name="tag[]" id="checkbox8" /><label for="checkbox8">Education</label></li>

                                            <li><input type="checkbox" value="engineering" name="tag[]" id="checkbox9" /><label for="checkbox9">Engineering</label></li>

                                            <li><input type="checkbox" value="EA" name="tag[]" id="checkbox10" /><label for="checkbox10">Entertaintment &amp; Arts</label></li>

                                            <li><input type="checkbox" value="geoscience" name="tag[]" id="checkbox11" /><label for="checkbox11">Geoscience</label></li>

                                            <li><input type="checkbox" value="history" name="tag[]" id="checkbox12" /><label for="checkbox12">History</label></li>

                                            <li><input type="checkbox" value="law" name="tag[]" id="checkbox13" /><label for="checkbox13">Law</label></li>

                                            <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox14" /><label for="checkbox14">Linguistics</label></li>

                                            <li><input type="checkbox" value="literature" name="tag[]" id="checkbox15" /><label for="checkbox15">literature</label></li>

                                            <li><input type="checkbox" value="mathematics" name="tag[]" id="checkbox16" /><label for="checkbox16">Mathematics</label></li>

                                            <li><input type="checkbox" value="Medicine" name="tag[]" id="checkbox17" /><label for="checkbox17">Medicine</label></li>

                                            <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox18" /><label for="checkbox18">Linguistics</label></li>

                                            <li><input type="checkbox" value="philosophy" name="tag[]" id="checkbox19" /><label for="checkbox19">Philosophy</label></li>

                                            <li><input type="checkbox" value="physics" name="tag[]" id="checkbox20" /><label for="checkbox20" for="checkbox1">Physics</label></li>

                                            <li><input type="checkbox" value="PS" name="tag[]" id="checkbox21" /><label for="checkbox21">Political Science</label></li>

                                            <li><input type="checkbox" value="psychology" name="tag[]" id="checkbox22" /><label for="checkbox22">Psychology</label></li>

                                            <li><input type="checkbox" value="RS" name="tag[]" id="checkbox23" /><label for="checkbox23">Religious Studies</label></li>

                                            <li><input type="checkbox" value="socialScience" name="tag[]" id="checkbox24" /><label for="checkbox24">Social Science</label></li>

                                            <li><input type="checkbox" value="spaceScience" name="tag[]" id="checkbox25" /><label for="checkbox25">Space Science</label></li>
                                        </ul>
                                        <!--
                                                <div class="select">
                                                    <label>All tags selected?</label>
                                                    <button style="float:right" class="read-more submit" type="submit" name="tagcomplete">Yes, I'm good.</button>
                                                    <button style="float:right" class="read-more submit" type="" name="reset">No</button>
                                                </div>
-->
                                        <?php
                                        // display experts of the relavant tags
                                        ?>
                                    </div>
                                    <?php echo "<script>var checkboxValues = " . $tagarrayjson . ";</script>"; ?>


                                    <script>
                                        for (var i = 0; i < checkboxValues.length; i++) {
                                            var checkbox = document.querySelector("input[type='checkbox'][value='" + checkboxValues[i] + "']");
                                            if (checkbox) {
                                                checkbox.checked = true;
                                            }
                                        }
                                    </script>

                                    <span class="error"><?php echo $data['tag_err']; ?></span>

                                </td>
                            </tr>
                            <tr>
                                <td class="rp">

                                    <!-- filter -->
                                    <div class="checkbox-1">
                                        <span class="checkbox-title" onclick="filter3()">
                                            <h4>Resource People <span class="star">*</span>
                                                <i class="arrow up" id="up3" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down3" style="margin-left: 4.3rem;"></i>
                                            </h4>
                                        </span>
                                        <ul id="checkbox-3">
                                            <?php


                                            // $sql = "SELECT expert.expertID as ID, user.firstName, user.lastName FROM user, expert WHERE user.userID = expert.expertID;";
                                            // $experts = mysqli_query($conn, $sql);
                                            // while($expertrow = mysqli_fetch_assoc($experts)){

                                            //     $fname = $expertrow['firstName'];
                                            //     $lname = $expertrow['lastName'];
                                            //     echo '<li>';
                                            //     echo '<label for="checkbox1">';
                                            //     echo '<input type="checkbox" value="resource person" name="rp[]" id="checkbox1"/>';
                                            //     echo $fname.' '.$lname;
                                            //     echo '</label>';
                                            //     echo '</li>';

                                            // }

                                            ?>
                                        </ul>
                                    </div>
                                </td>
                                <?php $visibility = json_encode($data['visibility']); ?>

                                <td> <input type="checkbox" id="anonymus" name="visibility" value="<?php echo $data['visibility'] ?>"></td>
                                <td><label for="anonymus">Make Anonymus</label>
                                    <p class="anonymusp1">Your name will not be displayed in the Question</p>
                                </td>
                                <?php echo "<script>var visibility = " . $visibility . ";</script>"; ?>

                                <script>
                                    var checkbox = document.querySelector("input[type='checkbox'][value='" + visibility + "']");
                                    if (checkbox) {
                                        checkbox.checked = true;
                                    }
                                </script>
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
                <form action="pending.php"><button type="submit" style="float:right" class="read-more attend">My Questions</button></form>
                <form action="myevent.php"><button type="submit" style="float:right" class="read-more attend">Home</button></form>
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