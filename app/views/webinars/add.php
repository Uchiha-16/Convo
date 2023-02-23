        <?php require APPROOT . '/views/inc/header.php'; ?>
        <link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />


        <style>
.nav {
    grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
}
        </style>
        </head>

        <body>

            <?php require APPROOT . '/views/inc/components/Enavbar.php'; ?>


            <!-- body content -->
            <div class="container-div">
                <div class="content-body">
                    <div class="LHS">
                        <div class="question-div add-event">
                            <form action="" method="POST">
                                <table>
                                    <tr>
                                        <td colspan="3">
                                            <p class="p1">Webinar Details</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="border-bottom: 1px solid rgba(128,128,128, .2); padding-bottom: 1rem;">
                                            <h4 style="margin-bottom:.5rem">Title <span class="star">*</span></h4>
                                            <input class="inputform" type="text" name="title" placeholder="A catchy title can help you hook viewers." required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <h4 style="margin-bottom:1.5rem">Description</h4>

                                            <!-- Text Editor -->
                                            <div class="textEditor">
                                                <div>
                                                    <div class="options">
                                                        <!-- Text Format -->
                                                        <button id="bold" class="option-button format">
                                                            <i class="fa-solid fa-bold"></i>
                                                        </button>
                                                        <button id="italic" class="option-button format">
                                                            <i class="fa-solid fa-italic"></i>
                                                        </button>
                                                        <button id="underline" class="option-button format">
                                                            <i class="fa-solid fa-underline"></i>
                                                        </button>
                                                        <button id="strikethrough" class="option-button format">
                                                            <i class="fa-solid fa-strikethrough"></i>
                                                        </button>
                                                        <button id="superscript" class="option-button script">
                                                            <i class="fa-solid fa-superscript"></i>
                                                        </button>
                                                        <button id="subscript" class="option-button script">
                                                            <i class="fa-solid fa-subscript"></i>
                                                        </button>
                                                        <!-- List -->
                                                        <button id="insertOrderedList" class="option-button">
                                                            <div class="fa-solid fa-list-ol"></div>
                                                        </button>
                                                        <button id="insertUnorderedList" class="option-button">
                                                            <i class="fa-solid fa-list"></i>
                                                        </button>
                                                        <!-- Undo/Redo -->
                                                        <button id="undo" class="option-button">
                                                            <i class="fa-solid fa-rotate-left"></i>
                                                        </button>
                                                        <button id="redo" class="option-button">
                                                            <i class="fa-solid fa-rotate-right"></i>
                                                        </button>
                                                        <!-- Link -->
                                                        <button id="createLink" class="adv-option-button">
                                                            <i class="fa fa-link"></i>
                                                        </button>
                                                        <button id="unlink" class="option-button">
                                                            <i class="fa fa-unlink"></i>
                                                        </button>
                                                        <!-- Alignment -->
                                                        <button id="justifyLeft" class="option-button align">
                                                            <i class="fa-solid fa-align-left"></i>
                                                        </button>
                                                        <button id="justifyCenter" class="option-button align">
                                                            <i class="fa-solid fa-align-center"></i>
                                                        </button>
                                                        <button id="justifyRight" class="option-button align">
                                                            <i class="fa-solid fa-align-right"></i>
                                                        </button>
                                                        <button id="justifyFull" class="option-button align">
                                                            <i class="fa-solid fa-align-justify"></i>
                                                        </button>
                                                        <!-- Color -->
                                                        <div class="input-wrapper">
                                                            <input type="color" id="foreColor" class="adv-option-button" />
                                                            <label for="foreColor">Font Color</label>
                                                        </div>
                                                        <div class="input-wrapper">
                                                            <input type="color" id="backColor" class="adv-option-button" />
                                                            <label for="backColor">Highlight Color</label>
                                                        </div>
                                                    </div>

                                                    <textarea id="text-input"></textarea>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="border-bottom: 1px solid rgba(128,128,128, .2); padding-bottom: 1rem;"><br>
                                            <h4 style="margin-bottom:.5rem">Tags <span class="star">*</span></h4>
                                            <div class="dropdown-div">

                                                <label>Please Select <b>all the Tags</b> which are Related to the
                                                    Event.</label>
                                                <ul class="dropdown" id="dropdown">

                                                    <li>
                                                        <input type="checkbox" value="agricultureScience" name="tag[]" id="checkbox1" />
                                                        <label for="checkbox1">Agriculture Science</label>
                                                    </li>

                                                    <li>
                                                        <input type="checkbox" value="anthropology" name="tag[]" id="checkbox2" />
                                                        <label for="checkbox2">Anthropology</label>
                                                    </li>

                                                    <li>
                                                        <input type="checkbox" value="biology" name="tag[]" id="checkbox3" />
                                                        <label for="checkbox3">Biology</label></li>

                                                    <li>
                                                        <input type="checkbox" value="Chemistry" name="tag[]" id="checkbox4" />
                                                        <label for="checkbox4">Chemistry</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="CS" name="tag[]" id="checkbox5" />
                                                        <label for="checkbox5">Computer Science</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="design" name="tag[]" id="checkbox6" />
                                                        <label for="checkbox6">Design</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="economics" name="tag[]" id="checkbox7" />
                                                        <label for="checkbox7">Economics</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="education" name="tag[]" id="checkbox8" />
                                                        <label for="checkbox8">Education</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="engineering" name="tag[]" id="checkbox9" />
                                                        <label for="checkbox9">Engineering</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="EA" name="tag[]" id="checkbox10" />
                                                        <label for="checkbox10">Entertaintment &amp; Arts</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="geoscience" name="tag[]" id="checkbox11" />
                                                        <label for="checkbox11">Geoscience</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="history" name="tag[]" id="checkbox12" />
                                                        <label for="checkbox12">History</label>
                                                    </li>

                                                    <li>
                                                        <input type="checkbox" value="law" name="tag[]" id="checkbox13" />
                                                        <label for="checkbox13">Law</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="linguistics" name="tag[]" id="checkbox14" />
                                                        <label for="checkbox14">Linguistics</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="literature" name="tag[]" id="checkbox15" />
                                                        <label for="checkbox15">literature</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="mathematics" name="tag[]" id="checkbox16" />
                                                        <label for="checkbox16">Mathematics</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="Medicine" name="tag[]" id="checkbox17" />
                                                        <label for="checkbox17">Medicine</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="linguistics" name="tag[]" id="checkbox18" />
                                                        <label for="checkbox18">Linguistics</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="philosophy" name="tag[]" id="checkbox19" />
                                                        <label for="checkbox19">Philosophy</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="physics" name="tag[]" id="checkbox20" />
                                                        <label for="checkbox20" for="checkbox1">Physics</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="PS" name="tag[]" id="checkbox21" />
                                                        <label for="checkbox21">Political Science</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="psychology" name="tag[]" id="checkbox22" />
                                                        <label for="checkbox22">Psychology</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="RS" name="tag[]" id="checkbox23" />
                                                        <label for="checkbox23">Religious  Studies</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="socialScience" name="tag[]" id="checkbox24" />
                                                        <label for="checkbox24">Social Science</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="spaceScience" name="tag[]" id="checkbox25" />
                                                        <label for="checkbox25">Space Science</label>
                                                    </li>
                                                </ul>
                                                <div class="select">
                                                    <label>All tags selected?</label>
                                                    <button style="float:right" class="read-more submit" type="submit" name="submit">Yes, I'm good.</button>
                                                    <button style="float:right" class="read-more submit" type="submit" name="submit">No</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="border-bottom: 1px solid rgba(128,128,128, .2); padding-bottom: 1rem;">
                                            <h4 style="margin-bottom:.5rem">Playlists <span class="star">*</span></h4>
                                            <div class="dropdown-div">

                                                <label>Add your video to one or more playlists.
                                                    Playlists can help viewers discover your content faster..</label>

                                                <ul class="dropdown" id="dropdown">
                                                    <!-- Add New -->
                                                    <li>
                                                        <input type="checkbox" value="1" name="tag[]" id="checkbox29" id="newPlaylist" onchange="showDiv('hidden_div', this)" />
                                                        <label for="checkbox29">Add new</label><br>
                                                        <div id="hidden_div">
                                                            <input class="inputform" type="text" name="newP" id="playlist" placeholder="Add a unique name to your new playlist">
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <input type="checkbox" value="p1" name="tag[]" id="checkbox26" />
                                                        <label for="checkbox26">Website With Login Page</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="p2" name="tag[]" id="checkbox27" />
                                                        <label for="checkbox27">CSS For Beginners</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" value="p3" name="tag[]" id="checkbox28" />
                                                        <label for="checkbox28">CSS Card Slider</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="border-bottom: 1px solid rgba(128,128,128, .2); padding-bottom: 1rem;">
                                            <h4 style="margin-bottom:.5rem">Video Link <span class="star">*</span></h4><br>
                                            <label class="steps"><b>Step 1:</b> Upload your video to YouTube/ Or go to your uploaded YouTube video.</label><br><br>
                                            <label class="steps"><b>Step 2:</b> Copy the YouTube "Sharing Link" relevant to your video. You can copy either the embedded link as well.<br>
                                                <label style="color: #117ea6; font-size:13px; margin-left:3.2rem"><b>Sharing Link Example:</b> https://youtu.be/2ybLD6_2gKM</label><br>
                                                <label style="color: #117ea6; font-size:13px; margin-left:3.2rem"><b>Embeded Link Example:</b> https://www.youtube.com/embed/2ybLD6_2gKM</label></label><br><br>
                                            <label class="steps"><b>Step 3:</b> Paste the link to the following field.</label><br><br>
                                            <label class="steps">Make sure that it is the <b>‘Shared/ Embeded video link’</b>.</label><br><br>
                                            <input class="inputform" type="text" name="link" placeholder="Please include the video link here." required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="padding-top: 1rem;">
                                            <h4 style="margin-bottom:.5rem">Add Thumbnail <img src="<?php echo URLROOT;?>/img/thumbnail.png" style="width: 17px;"> <span class="star">*</span></h4>
                                            <label for="file" id="attatchment">
                                                <label style="font-size: 14px; color:black">Upload a picture that shows what's in your video.
                                                    A good thumbnail stands out and draws viewers' attention.</label><br><br>
                                                <input style="border: none; font-size: 14px;" type="file" id="file" name="pfp" value="">
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <br><br>
                                            <div class="add">
                                                <button style="float:right" class="read-more attend submit" type="reset">Cancel</button>
                                                <button style="float:right" class="read-more attend submit" type="submit" name="submit" onclick="webinarPublish()">Publish</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>

                    </div>
                    <div class="RHS">
                        <form action="addWebinar.php"><button type="submit" style="float:right" class="read-more attend">Create</button></form>
                        <form action="webinarStat.php"><button type="submit" style="float:right"  class="read-more attend">My Videos</button></form>
                        <form action="<?php echo URLROOT;?>/Webinars/home""><button type="submit" style="float:right" class="read-more attend">Webinars</button></form>
                    </div>
                </div>
                <div>
                    <footer><a href="index.php">About Us</a>
                        <p> | </p> &copy; Convo 2022 All rights reserved.
                    </footer>
                </div>
            </div>

            <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>

            <?php require APPROOT . '/views/inc/footer.php'; ?>