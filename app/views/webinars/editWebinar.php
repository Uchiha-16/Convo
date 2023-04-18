        <?php require APPROOT . '/views/inc/header.php'; ?>
        <link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />


        <style>
            .nav {
                grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
            }
        </style>
        </head>

        <body>

    <?php if (($_SESSION['role']) == 'expert') : ?>
        <?php require APPROOT . '/views/inc/components/Enavbar.php'; ?>
    <?php elseif (($_SESSION['role']) == 'expert/mod') : ?>
        <?php require APPROOT . '/views/inc/components/EMnavbar.php'; ?>
    <?php endif; ?>


            <!-- body content -->
            <div class="container-div">
                <div class="content-body">
                    <div class="LHS">
                        <div class="question-div add-event">
                            <form name="" action="<?php echo URLROOT; ?>/Webinars/edit/<?php echo $data['WID']; ?>" method="POST" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td colspan="3">
                                            <p class="p1">Edit Webinar Details</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="border-bottom: 1px solid rgba(128,128,128, .2); padding-bottom: 1rem;">
                                            <h4 style="margin-bottom:.5rem">Title <span class="star">*</span></h4>
                                            <input class="inputform" type="text" name="title" placeholder="A catchy title can help you hook viewers." value="<?php echo $data['title']; ?>">
                                            <span class="error"><?php echo $data['title_err']; ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="border-bottom: 1px solid rgba(128,128,128, .2); padding-bottom: 1rem;"><br>
                                            <h4 style="margin-bottom:.5rem">Tags <span class="star">*</span></h4>
                                            <div class="dropdown-div">

                                                <label>Please Select <b>all the Tags</b> which are Related to your
                                                    Webinar.</label>
                                                <ul class="dropdown" id="dropdown">
                                                    <?php print_r($data['tag']); ?>
                                                    <?php $tagarray = explode(",", $data['tag']); ?>
                                                    <?php $tagarrayjson = json_encode($tagarray); ?>
                                                    <?php print_r($tagarray); ?>

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

                                                    <li><input type="checkbox" value="literature" name="tag[]" id="checkbox15" /><label for="checkbox15">Literature</label></li>

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
                                        <td colspan="3" style="border-bottom: 1px solid rgba(128,128,128, .2); padding-bottom: 1rem;">
                                            <h4 style="margin-bottom:.5rem">Playlists <span class="star">*</span></h4>
                                            <div class="dropdown-div">

                                                <label>Add your video to one or more playlists.
                                                    Playlists can help viewers discover your content faster.</label>

                                                <ul class="dropdown" id="dropdown">
                                                    <!-- Add New --> 
                                                    <li>
                                                        <input type="checkbox" value="1" id="checkbox0" id="newPlaylist" onchange="showDiv('hidden_div', this)" />
                                                        <label for="checkbox0">Add new</label><br>
                                                        <div id="hidden_div">
                                                            <input class="inputform" type="text" name="newP" id="playlist" placeholder="Add a unique name to your new playlist">
                                                        </div>
                                                    </li>

                                                    <?php $playlistarray = explode(",", $data['playlist']); ?>
                                                    <?php $playlistarrayjson = json_encode($playlistarray); ?>

                                                    <?php $count = 26; ?>
                                                    <?php foreach ($data['webinarsPlaylist'] as $webinarsPlaylist) : ?>
                                                        <li>
                                                            <input type="checkbox" value="<?php echo $webinarsPlaylist->playlistName ?>" name="playlist[]" id="checkbox<?php echo $count ?>" />
                                                            <label for="checkbox<?php echo $count ?>"><?php echo $webinarsPlaylist->playlistName ?></label>
                                                        </li>
                                                        <?php $count = $count + 1; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>

                                            <?php echo "<script>var checkboxValues2 = " . $playlistarrayjson . ";</script>"; ?>

                                            <script>
                                                for (var i = 0; i < checkboxValues2.length; i++) {
                                                    var checkbox2 = document.querySelector("input[type='checkbox'][value='" + checkboxValues2[i] + "']");
                                                    if (checkbox2) {
                                                        checkbox2.checked = true;
                                                    }
                                                }
                                            </script>

                                            <span class="error"><?php echo $data['playlist_err']; ?></span>
                                        </td>
                                    </tr>
                                    <?php if(!$data['published']) : ?>
                                        <tr>
                                            <td colspan="3" style="border-bottom: 1px solid rgba(128,128,128, .2); padding-bottom: 1rem;">
                                                <h4 style="margin-bottom:.5rem">Video Link <span class="star">*</span></h4><br>
                                                <label class="steps"><b>Step 1:</b> Upload your video to YouTube/ Or go to your uploaded YouTube video.</label><br><br>
                                                <label class="steps"><b>Step 2:</b> Copy the YouTube "Sharing Link" relevant to your video. You can copy either the embedded link as well.<br>
                                                    <label style="color: #117ea6; font-size:13px; margin-left:3.2rem"><b>Sharing Link Example:</b> https://youtu.be/2ybLD6_2gKM</label><br>
                                                    <label style="color: #117ea6; font-size:13px; margin-left:3.2rem"><b>Embeded Link Example:</b> https://www.youtube.com/embed/2ybLD6_2gKM</label></label><br><br>
                                                <label class="steps"><b>Step 3:</b> Paste the link to the following field.</label><br><br>
                                                <label class="steps">Make sure that it is the <b>‘Shared/ Embeded video link’</b>.</label><br><br>
                                                <input class="inputform" type="text" name="link" placeholder="Please include the video link here." value="https://youtu.be/<?php echo $data['videolink']; ?>">
                                                <span class="error"><?php echo $data['link_err']; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" style="padding-top: 1rem;">
                                                <h4 style="margin-bottom:.5rem">Add Thumbnail <img src="<?php echo URLROOT; ?>/img/thumbnail.png" style="width: 17px;"> <span class="star">*</span></h4>

                                                <label style="font-size: 14px; color:black">Upload a picture that shows what's in your video.
                                                    A good thumbnail stands out and draws viewers' attention.<br><b>Make sure it is in 16:9 ratio</b>.</label><br><br>
                                                <br>  
                                                <!-- Add image section -->                                   
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="thumbnail" value="<?php echo $data['thumbnail']; ?>"/>
                                                        <label for="imageUpload"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" ><img style="width:3rem;" src="<?php echo URLROOT; ?>/img/thumbnails/<?php echo $data['thumbnail']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- -->
                                                <span class="error"><?php echo $data['thumbnail_err']; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="terms">
                                    <?php else : ?>
                                            <td colspan="3" class="terms" style="margin-top:0; border-top:0">
                                    <?php endif; ?>
                                            <input type="checkbox" name="terms" class="terms-checkbox" required/>
                                            <label class="terms-label">By Publishing, you acknowledge that you agree to Convo's Terms of Service and Community Guidelines. Please be sure not to violate others' copyright or privacy rights.</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <br><br>
                                            <div class="add">
                                                <?php if(!$data['published']) : ?>
                                                    <button style="float:right" class="read-more attend submit" type="submit" name="draft">Save Draft</button>
                                                    <button style="float:right" class="read-more attend submit" type="submit" name="submit">Publish</button>
                                                    <button style="float:right" class="read-more attend submit" type="reset">Reset</button>
                                                <?php else : ?>
                                                    <button style="float:right" class="read-more attend submit" type="submit" name="submit">Update</button>
                                                    <button style="float:right" class="read-more attend submit" type="reset">Reset</button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>

                    </div>
                    <div class="RHS">
                        <form action="<?php echo URLROOT; ?>/Webinars/add"><button type="submit" style="float:right" class="read-more attend">Create</button></form>
                        <form action="<?php echo URLROOT; ?>/Webinars/myWebinars"><button type="submit" style="float:right" class="read-more attend">My Videos</button></form>
                        <form action="<?php echo URLROOT; ?>/Webinars/home""><button type=" submit" style="float:right" class="read-more attend">Webinars</button></form>
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