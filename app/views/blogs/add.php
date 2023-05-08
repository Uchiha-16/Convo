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
    function confirmation(){
                    if(confirm("Are you sure you want to discard this blog?")){
                        window.location.href = "<?php echo URLROOT; ?>/Blogs/index";
                    }
                }
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
    <?php elseif (($_SESSION['role']) == 'company') : ?>
        <?php require APPROOT . '/views/inc/components/Cnavbar.php'; ?>
    <?php elseif (($_SESSION['role']) == 'admin') : ?>
        <?php require APPROOT . '/views/inc/components/Anavbar.php'; ?>
    <?php endif; ?>

        
        <!-- body content -->
        <div class="container-div">
            <div class="content-body">
                <div class="LHS">
                    <h3>Document your own progress</h3><br>
                    
                    <!-- Adding a picture to event -->
                    
                    <!-- Event 1 -->
                    <div class="question-div add-event">
                        <form name="" action="<?php echo URLROOT; ?>/blogs/add" method="POST" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td colspan="3">
                                        <h3 style="color: #19758d;">Add Blog</h3>
                                        <hr style="color: #aaaaaa;">
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        <h4 style="margin-bottom:.5rem">Title <span class="star">*</span></h4>
                                        <input class="inputform" type="text" name="title" placeholder="This is the title that will be displayed at the top of your blog <?php echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t" ?> 0/100" value="<?php echo $data['title']; ?>" required>
                                        <span class="error"><?php echo $data['title_err']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                        <td colspan="3" style="padding-top: 1rem;">
                                            <h4 style="margin-bottom:.5rem">Add Header Image <img src="<?php echo URLROOT; ?>/img/thumbnail.png" style="width: 17px;"> <span class="star">*</span></h4>

                                            <label style="font-size: 14px; color:black">Upload a picture that shows what's in your heading of the blog.
                                                A good header image stands out and draws viewers' attention.<br><b>Make sure it is in 16:9 ratio</b>.</label><br><br>
                                            <br>  
                                            <!-- Add image section -->                                   
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="thumbnail" value="<?php echo $data['thumbnail']?>">
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url(<?php echo URLROOT; ?>/img/thumbnailpic.png);">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- -->
                                            <span class="error"><?php echo $data['thumbnail_err']; ?></span>
                                        </td>
                                    </tr>
                                <tr>
                                    <td colspan="3">
                                        <h4 style="margin-bottom:.5rem">Tags <span class="star">*</span></h4>
                                        
                                        <div class="dropdown-div">
                                            <!-- <form method="POST" id="innerform"> -->
                                                <label>Please Select <b>all the Tags</b> which are Related to the Event.</label>
                                                <ul class="dropdown" id="dropdown">

                                                    <li><input type="checkbox" value="agricultureScience" name="tag[]" id="checkbox1" value="<?php echo $data['tag']; ?>" /><label for="checkbox1">Agriculture Science</label></li>

                                                    <li><input type="checkbox" value="anthropology" name="tag[]" id="checkbox2" value="<?php echo $data['tag']; ?>" /><label for="checkbox2">Anthropology</label></li>

                                                    <li><input type="checkbox" value="biology" name="tag[]" id="checkbox3" value="<?php echo $data['tag']; ?>" /><label for="checkbox3">Biology</label></li>

                                                    <li><input type="checkbox" value="Chemistry" name="tag[]" id="checkbox4" value="<?php echo $data['tag']; ?>" /><label for="checkbox4">Chemistry</label></li>

                                                    <li><input type="checkbox" value="CS" name="tag[]" id="checkbox5" value="<?php echo $data['tag']; ?>" /><label for="checkbox5">Computer Science</label></li>

                                                    <li><input type="checkbox" value="design" name="tag[]" id="checkbox6" value="<?php echo $data['tag']; ?>" /><label for="checkbox6">Design</label></li>

                                                    <li><input type="checkbox" value="economics" name="tag[]" id="checkbox7" value="<?php echo $data['tag']; ?>" /><label for="checkbox7">Economics</label></li>

                                                    <li><input type="checkbox" value="education" name="tag[]" id="checkbox8" value="<?php echo $data['tag']; ?>" /><label for="checkbox8">Education</label></li>

                                                    <li><input type="checkbox" value="engineering" name="tag[]" id="checkbox9" value="<?php echo $data['tag']; ?>" /><label for="checkbox9">Engineering</label></li>

                                                    <li><input type="checkbox" value="EA" name="tag[]" id="checkbox10" value="<?php echo $data['tag']; ?>" /><label for="checkbox10">Entertaintment &amp; Arts</label></li>

                                                    <li><input type="checkbox" value="geoscience" name="tag[]" id="checkbox11" value="<?php echo $data['tag']; ?>" /><label for="checkbox11">Geoscience</label></li>

                                                    <li><input type="checkbox" value="history" name="tag[]" id="checkbox12" value="<?php echo $data['tag']; ?>" /><label for="checkbox12">History</label></li>

                                                    <li><input type="checkbox" value="law" name="tag[]" id="checkbox13" value="<?php echo $data['tag']; ?>" /><label for="checkbox13">Law</label></li>

                                                    <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox14" value="<?php echo $data['tag']; ?>" /><label for="checkbox14">Linguistics</label></li>

                                                    <li><input type="checkbox" value="literature" name="tag[]" id="checkbox15" value="<?php echo $data['tag']; ?>" /><label for="checkbox15">literature</label></li>

                                                    <li><input type="checkbox" value="mathematics" name="tag[]" id="checkbox16" value="<?php echo $data['tag']; ?>" /><label for="checkbox16">Mathematics</label></li>

                                                    <li><input type="checkbox" value="Medicine" name="tag[]" id="checkbox17" value="<?php echo $data['tag']; ?>" /><label for="checkbox17">Medicine</label></li>

                                                    <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox18" value="<?php echo $data['tag']; ?>" /><label for="checkbox18">Linguistics</label></li>

                                                    <li><input type="checkbox" value="philosophy" name="tag[]" id="checkbox19" value="<?php echo $data['tag']; ?>" /><label for="checkbox19">Philosophy</label></li>

                                                    <li><input type="checkbox" value="physics" name="tag[]" id="checkbox20" value="<?php echo $data['tag']; ?>" /><label for="checkbox20" for="checkbox1">Physics</label></li>

                                                    <li><input type="checkbox" value="PS" name="tag[]" id="checkbox21" value="<?php echo $data['tag']; ?>" /><label for="checkbox21">Political Science</label></li>

                                                    <li><input type="checkbox" value="psychology" name="tag[]" id="checkbox22" value="<?php echo $data['tag']; ?>" /><label for="checkbox22">Psychology</label></li>

                                                    <li><input type="checkbox" value="RS" name="tag[]" id="checkbox23" value="<?php echo $data['tag']; ?>" /><label for="checkbox23">Religious Studies</label></li>

                                                    <li><input type="checkbox" value="socialScience" name="tag[]" id="checkbox24" value="<?php echo $data['tag']; ?>" /><label for="checkbox24">Social Science</label></li>

                                                    <li><input type="checkbox" value="spaceScience" name="tag[]" id="checkbox25" value="<?php echo $data['tag']; ?>" /><label for="checkbox25">Space Science</label></li>
                                                </ul>
                                        </div>
                                        <span class="error"><?php echo $data['tag_err']; ?></span>

                                                <div class="select">
                                                    <label>All tags selected?</label>
                                                    <button style="float:right" class="read-more submit mybutton" type="submit" name="tagcomplete" value="search">Yes, I'm good.</button>
                                                    <button style="float:right" class="read-more submit" type="reset" name="reset">No</button>
                                                </div>
                                            <!-- </form> -->
                                            <?php
                                            // display experts of the relavant tags
                                            ?>
                                        </div>
                                    </tda>
                                </tr>
                                <!-- <tr>
                                <td colspan="3" style="border-bottom: 1px solid rgba(128,128,128, .2); padding-bottom: 1rem;">
                                    <h4 style="margin-bottom:1.5rem">Content <span class="star">*</span></h4>
                                    <!-- Text Editor -->
                                    <!--  -->
                                <tr>
                                <td>
                                    <div>
                                        <label for="content">write your blog</label><br>
                                        <textarea name="content" id="content" class="form-textarea" placeholder="Enter your ideas" required></textarea><br><br>
                                        <span class="error"><?php echo $data['content_err']; ?></span>
                                    </div>
                                </td>
                                    
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <br><br>
                                        <div class="add">
                                            <button style="float:right" class="read-more attend submit" type="reset" onclick="confirmation()">Reset</button>
                                            <button style="float:right" class="read-more attend submit" type="submit" name="submit">Add Post</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    
                </div>
                <div class="RHS">
                <form action="<?php echo URLROOT; ?>/Blogs/index"><button type="submit" style="float:right" class="read-more attend">Blogs</button></form>
                </div>
            </div>
            <div>
                <footer><a href="<?php echo URLROOT; ?>/Pages/about">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.</footer>
            </div>
        </div>
        
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>
            
        <div id="body"></div>
        
        <script src="../../scripts/textEditor.js"></script>
    </body>
</html>
