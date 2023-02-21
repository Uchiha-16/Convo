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
                        <h3>Add Webinar</h3><br>

                        <!-- Adding a picture to event -->

                        <!-- Event 1 -->
                        <div class="question-div add-event">
                            <form action="" method="POST">
                                <table>
                                    <tr>
                                        <td colspan="3">
                                            <p class="p1">Webinar Details</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <h4 style="margin-bottom:.5rem">Title <span class="star">*</span></h4>
                                            <input class="inputform" type="text" name="title"
                                                placeholder="Enter title here..." required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <h4 style="margin-bottom:.5rem">Description</h4>

                                            <!-- Text Editor -->
                                            <div class="textEditor">
                                                <div class="container">
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
                                                        <button id="indent" class="option-button spacing">
                                                            <i class="fa-solid fa-indent"></i>
                                                        </button>
                                                        <button id="outdent" class="option-button spacing">
                                                            <i class="fa-solid fa-outdent"></i>
                                                        </button>
                                                        <!-- Headings -->
                                                        <select id="formatBlock" class="adv-option-button">
                                                            <option value="H1">H1</option>
                                                            <option value="H2">H2</option>
                                                            <option value="H3">H3</option>
                                                            <option value="H4">H4</option>
                                                            <option value="H5">H5</option>
                                                            <option value="H6">H6</option>
                                                        </select>
                                                        <!-- Font -->
                                                        <select id="fontName" class="adv-option-button"></select>
                                                        <select id="fontSize" class="adv-option-button"></select>
                                                        <!-- Color -->
                                                        <div class="input-wrapper">
                                                            <input type="color" id="foreColor"
                                                                class="adv-option-button" />
                                                            <label for="foreColor">Font Color</label>
                                                        </div>
                                                        <div class="input-wrapper">
                                                            <input type="color" id="backColor"
                                                                class="adv-option-button" />
                                                            <label for="backColor">Highlight Color</label>
                                                        </div>
                                                    </div>
                                                    <iframe id="text-input" contenteditable="true"></iframe>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <h4 style="margin-bottom:.5rem">Tags <span class="star">*</span></h4>
                                            <div class="dropdown-div">

                                                <label>Please Select <b>all the Tags</b> which are Related to the
                                                    Event.</label>
                                                <ul class="dropdown" id="dropdown">

                                                    <li><input type="checkbox" value="agricultureScience" name="tag[]"
                                                            id="checkbox1" /><label for="checkbox1">Agriculture
                                                            Science</label></li>

                                                    <li><input type="checkbox" value="anthropology" name="tag[]"
                                                            id="checkbox2" /><label for="checkbox2">Anthropology</label>
                                                    </li>

                                                    <li><input type="checkbox" value="biology" name="tag[]"
                                                            id="checkbox3" /><label for="checkbox3">Biology</label></li>

                                                    <li><input type="checkbox" value="Chemistry" name="tag[]"
                                                            id="checkbox4" /><label for="checkbox4">Chemistry</label>
                                                    </li>

                                                    <li><input type="checkbox" value="CS" name="tag[]"
                                                            id="checkbox5" /><label for="checkbox5">Computer
                                                            Science</label></li>

                                                    <li><input type="checkbox" value="design" name="tag[]"
                                                            id="checkbox6" /><label for="checkbox6">Design</label></li>

                                                    <li><input type="checkbox" value="economics" name="tag[]"
                                                            id="checkbox7" /><label for="checkbox7">Economics</label>
                                                    </li>

                                                    <li><input type="checkbox" value="education" name="tag[]"
                                                            id="checkbox8" /><label for="checkbox8">Education</label>
                                                    </li>

                                                    <li><input type="checkbox" value="engineering" name="tag[]"
                                                            id="checkbox9" /><label for="checkbox9">Engineering</label>
                                                    </li>

                                                    <li><input type="checkbox" value="EA" name="tag[]"
                                                            id="checkbox10" /><label for="checkbox10">Entertaintment
                                                            &amp; Arts</label></li>

                                                    <li><input type="checkbox" value="geoscience" name="tag[]"
                                                            id="checkbox11" /><label for="checkbox11">Geoscience</label>
                                                    </li>

                                                    <li><input type="checkbox" value="history" name="tag[]"
                                                            id="checkbox12" /><label for="checkbox12">History</label>
                                                    </li>

                                                    <li><input type="checkbox" value="law" name="tag[]"
                                                            id="checkbox13" /><label for="checkbox13">Law</label></li>

                                                    <li><input type="checkbox" value="linguistics" name="tag[]"
                                                            id="checkbox14" /><label
                                                            for="checkbox14">Linguistics</label></li>

                                                    <li><input type="checkbox" value="literature" name="tag[]"
                                                            id="checkbox15" /><label for="checkbox15">literature</label>
                                                    </li>

                                                    <li><input type="checkbox" value="mathematics" name="tag[]"
                                                            id="checkbox16" /><label
                                                            for="checkbox16">Mathematics</label></li>

                                                    <li><input type="checkbox" value="Medicine" name="tag[]"
                                                            id="checkbox17" /><label for="checkbox17">Medicine</label>
                                                    </li>

                                                    <li><input type="checkbox" value="linguistics" name="tag[]"
                                                            id="checkbox18" /><label
                                                            for="checkbox18">Linguistics</label></li>

                                                    <li><input type="checkbox" value="philosophy" name="tag[]"
                                                            id="checkbox19" /><label for="checkbox19">Philosophy</label>
                                                    </li>

                                                    <li><input type="checkbox" value="physics" name="tag[]"
                                                            id="checkbox20" /><label for="checkbox20"
                                                            for="checkbox1">Physics</label></li>

                                                    <li><input type="checkbox" value="PS" name="tag[]"
                                                            id="checkbox21" /><label for="checkbox21">Political
                                                            Science</label></li>

                                                    <li><input type="checkbox" value="psychology" name="tag[]"
                                                            id="checkbox22" /><label for="checkbox22">Psychology</label>
                                                    </li>

                                                    <li><input type="checkbox" value="RS" name="tag[]"
                                                            id="checkbox23" /><label for="checkbox23">Religious
                                                            Studies</label></li>

                                                    <li><input type="checkbox" value="socialScience" name="tag[]"
                                                            id="checkbox24" /><label for="checkbox24">Social
                                                            Science</label></li>

                                                    <li><input type="checkbox" value="spaceScience" name="tag[]"
                                                            id="checkbox25" /><label for="checkbox25">Space
                                                            Science</label></li>
                                                </ul>
                                                <div class="select">
                                                    <label>All tags selected?</label>
                                                    <button style="float:right" class="read-more submit" type="submit"
                                                        name="submit">Yes, I'm good.</button>
                                                    <button style="float:right" class="read-more submit" type="submit"
                                                        name="submit">No</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!--                                <td style="padding-right:1rem; width:50%;">-->
                                        <td class="rp">

                                            <!-- filter -->
                                            <div class="checkbox-1">
                                                <span class="checkbox-title" onclick="filter3()">
                                                    <h4>Playlist <span class="star">*</span>
                                                        <i class="arrow up" id="up3" style="margin-left: 4.3rem;"></i><i
                                                            class="arrow down" id="down3"
                                                            style="margin-left: 4.3rem;"></i>
                                                    </h4>
                                                </span>
                                                <input class="inputform" type="text" name="resourceperson"
                                                    placeholder="Enter new Playlist..." required>
                                                <ul id="checkbox-3">
                                                    <?php
                                                    $sql = "SELECT playlist.playlistName FROM playlist WHERE expertID = $sessionID;";
                                                    $playlists = mysqli_query($conn, $sql);
                                                    while($playlistrow = mysqli_fetch_assoc($playlists)){
                                                        $playlistName = $playlistrow['firstName'];
                                                        echo '<li>';
                                                        echo '<label for="checkbox1">';
                                                        echo '<input type="checkbox" value="last 3 months" name="rp[]" id="checkbox1"/>';
                                                        echo $playlistrow;
                                                        echo '</label>';
                                                        echo '</li>';
                                                    }
                                                ?>
                                                </ul>

                                            </div>

                                            <!-- </td>
                                    <td class="time">
                                        <h4>Time <span class="star">*</span></h4>
                                        <input class="inputform" type="time" name="time" required>
                                    </td>
                                    <td class="date">
                                        <h4>Date <span class="star">*</span></h4>
                                        <input class="inputform" type="date" name="date" required>
                                    </td> -->
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <h4 style="margin-bottom:.5rem">Video Link <span class="star">*</span></h4>
                                            <input class="inputform" type="text" name="link"
                                                placeholder="Please include the video link here. Make sure that it is the ‘Embedded video link’."
                                                required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="padding-top: 1rem;">
                                            <label for="file" id="attatchment">
                                                <img src="../images/thumbnail.png"> Add Thumbnail
                                                <input style="border: none; display:none;" type="file" id="file"
                                                    name="pfp" value="">
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <br><br>
                                            <div class="add">
                                                <button style="float:right" class="read-more attend submit"
                                                    type="reset">Cancel</button>
                                                <button style="float:right" class="read-more attend submit"
                                                    type="submit" name="submit">Publish</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>

                    </div>
                    <div class="RHS">
                        <form action="addWebinar.php"><button type="submit" style="float:right"
                                class="read-more attend">Create</button></form>
                        <form action="webinarStat.php"><button type="submit" style="float:right"
                                class="read-more attend">My Videos</button></form>
                        <form action="webinar.php"><button type="submit" style="float:right"
                                class="read-more attend">Webinars</button></form>
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