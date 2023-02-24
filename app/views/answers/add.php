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
                    <br><br><br>
                    
                    <!-- Question 1 -->
                    <div class="question-div">
                        <div class="content-display">
                            <h2><?php echo $data['question']->title; ?></h2>
                            <p><?php echo $data['question']->content; ?>.</p>
                            <div class="qdp">
                                <div>
                                    <img src="<?php echo URLROOT; ?>/img/pfp/<?php echo $data['Quser']->pfp; ?>"/>
                                </div>
                                <div class="qdp-1">
                                    <label><?php echo $data['Quser']->fName ." ". $data['Quser']->lName; ?></label><br>
                                    <label class="qdp-1-2"><?php echo $data['Quser']->uname; ?></label>
                                </div>
                            </div>
                            <div class="info">
                            <div class="tags">
                                <label>Category</label><br>
                                <?php $tagArray = explode(",", $data['question']->tags); ?>
                                <?php foreach ($tagArray as $tag) : ?>
                                    <div class="tag"><?php echo $tag ?></div>
                                <?php endforeach; ?>
                                <br><br>
                            </div>
                        </div>
                            <div class="date-count">
                                <label><?php echo convertTime($data['question']->date); ?></label>
                                <label style="font-weight:600; float:right">1 Answer</label><br>
                                <button class="read-more" style="width:100%;">Save for later</button>
                            </div>
                        </div>
                    </div> 
                    
                    <!-- Answer -->
                    <div class="question-div add-event">
                            <form action="" method="POST">
                                <table>
                                    <tr>
                                        <td colspan="3">
                                            <p class="p1">Add an Answer</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="border-bottom: 1px solid rgba(128,128,128, .2); padding-bottom: 1rem;">
                                            <h4 style="margin-bottom:1.5rem">Description<span class="star">*</span></h4>

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

                                                    <textarea id="text-input" name="content"></textarea>
                                                    <span class="error"><?php echo $data['content_err']; ?></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="3" style="border-bottom: 1px solid rgba(128,128,128, .2); padding-bottom: 1rem;">
                                            <h4 style="margin-bottom:.5rem">Video Link</h4><br>
                                            <label class="steps"><b>Step 1:</b> Upload your video to YouTube/ Or go to your uploaded YouTube video.</label><br><br>
                                            <label class="steps"><b>Step 2:</b> Copy the YouTube "Sharing Link" relevant to your video. You can copy either the embedded link as well.<br>
                                                <label style="color: #117ea6; font-size:13px; margin-left:3.2rem"><b>Sharing Link Example:</b> https://youtu.be/2ybLD6_2gKM</label><br>
                                                <label style="color: #117ea6; font-size:13px; margin-left:3.2rem"><b>Embeded Link Example:</b> https://www.youtube.com/embed/2ybLD6_2gKM</label></label><br><br>
                                            <label class="steps"><b>Step 3:</b> Paste the link to the following field.</label><br><br>
                                            <label class="steps">Make sure that it is the <b>‘Shared/ Embeded video link’</b>.</label><br><br>
                                            <input class="inputform" type="text" name="link" placeholder="Please include the video link here." required>
                                            <span class="error"><?php echo $data['link_err']; ?></span>
                                        </td>
                                    <tr>
                                        <td colspan="3" style="padding-top: 1rem;">
                                            <h4 style="margin-bottom:.5rem">Add Thumbnail <img src="<?php echo URLROOT;?>/img/thumbnail.png" style="width: 17px;"></h4>
                                            <label for="file" id="attatchment">
                                                <label style="font-size: 14px; color:black">Upload a picture that shows what's in your video.
                                                    A good thumbnail stands out and draws viewers' attention.</label><br><br>
                                                <input style="border: none; font-size: 14px;" type="file" id="file" name="image" value="">
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
                    <div class="filter-div">
                        <div style="display:flex">
                            <img src="../images/filter.png">
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
                                                <input type="checkbox" value="agricultureScience" name="tag[]" id="checkbox1"/>Agriculture Science
                                            </label>
                                        </li>     
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="anthropology" name="tag[]" id="checkbox2"/>Anthropology
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="biology" name="tag[]" id="checkbox3"/>Biology
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox4">
                                                <input type="checkbox" value="Chemistry" name="tag[]" id="checkbox4"/>Chemistry
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox5">
                                                <input type="checkbox" value="CS" name="tag[]" id="checkbox5"/>Computer Science
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox6">
                                                <input type="checkbox" value="design" name="tag[]" id="checkbox6"/>Design
                                            </label>
                                        </li>       
                                        <li>
                                            <label for="checkbox7">
                                                <input type="checkbox" value="economics" name="tag[]" id="checkbox7"/>Economics
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox8">
                                                <input type="checkbox" value="education" name="tag[]" id="checkbox8"/>Education
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox9">
                                                <input type="checkbox" value="engineering" name="tag[]" id="checkbox9"/>Engineering
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox10">
                                                <input type="checkbox" value="EA" name="tag[]" id="checkbox10"/>Entertaintment &amp; Arts
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox11">
                                                <input type="checkbox" value="geoscience" name="tag[]" id="checkbox11"/>Geoscience
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox12">
                                                <input type="checkbox" value="history" name="tag[]" id="checkbox12"/>History
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox13">
                                                <input type="checkbox" value="law" name="tag[]" id="checkbox13"/>Law
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox14">
                                                <input type="checkbox" value="linguistics" name="tag[]" id="checkbox14"/>Linguistics
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox15">
                                                <input type="checkbox" value="literature" name="tag[]" id="checkbox15"/>literature
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox16">
                                                <input type="checkbox" value="mathematics" name="tag[]" id="checkbox16"/>Mathematics
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox17">
                                                <input type="checkbox" value="Medicine" name="tag[]" id="checkbox17"/>Medicine
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox18">
                                                <input type="checkbox" value="linguistics" name="tag[]" id="checkbox18"/>Linguistics
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox19">
                                                <input type="checkbox" value="philosophy" name="tag[]" id="checkbox19"/>Philosophy
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox20" for="checkbox1">
                                                <input type="checkbox" value="physics" name="tag[]" id="checkbox20"/>Physics
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox21">
                                                <input type="checkbox" value="PS" name="tag[]" id="checkbox21"/>Political Science
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox22">
                                                <input type="checkbox" value="psychology" name="tag[]" id="checkbox22"/>Psychology
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox23">
                                                <input type="checkbox" value="RS" name="tag[]" id="checkbox23"/>Religious Studies
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox24">
                                                <input type="checkbox" value="socialScience" name="tag[]" id="checkbox24"/>Social Science
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox25">
                                                <input type="checkbox" value="spaceScience" name="tag[]" id="checkbox25"/>Space Science
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
                                                <input type="checkbox" value="last 3 months" name="publishDate[]" id="checkbox1"/>Last 3 months
                                            </label>
                                        </li>     
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="last 6 months" name="publishDate[]" id="checkbox2"/>Last 6 months
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="last year" name="publishDate[]" id="checkbox3"/>Last year
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
                                                <input type="checkbox" value="last 3 months" name="QA[]" id="checkbox1"/>My questions
                                            </label>
                                        </li>     
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="last 6 months" name="QA[]" id="checkbox2"/>Answered
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="last year" name="QA[]" id="checkbox3"/>Not answered
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                
                                <!-- Filter 4 -->
                                <div class="checkbox-1">
                                    <span class="checkbox-title" onclick="filter#()">Rating <i class="arrow up" id="up4" style="margin-left: 6.7rem;"></i><i class="arrow down" id="down4" style="margin-left: 6.7rem;"></i></span>
<!--
                                    <ul id="checkbox-3">
                                        <li>
                                            <label for="checkbox1">
                                                <input type="checkbox" value="last 3 months" name="QA[]" id="checkbox1"/>My questions
                                            </label>
                                        </li>     
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="last 6 months" name="QA[]" id="checkbox2"/>Answered
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="last year" name="QA[]" id="checkbox3"/>Not answered
                                            </label>
                                        </li>
                                    </ul>
-->
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <footer><a href="index.php">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.</footer>
            </div>
        </div>
        
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>
            
        <?php require APPROOT . '/views/inc/footer.php'; ?>