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
                <br><br><br>

                <!-- Question 1 -->
                <div class="question-div">
                    <div class="content-display">
                        <h2><?php echo $data['question']->title; ?></h2>
                        <p style="font-size: 15px;"><?php echo $data['question']->content; ?>.</p>
                        <div class="qdp" style="padding-top: 1rem; border-top: 1px solid rgba(128,128,128, .2);">
                            <div>
                            <?php if ($data['question']->visibility == "anonymus") : ?>
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
                            <label style="font-weight:600; float:right">Overall Rating: <?php echo $data['question']->rating;?></label><br>
                        </div>
                    </div>
                </div>

                <!-- Answer -->
                <div class="question-div add-event">
                    <form action="<?php echo URLROOT; ?>/answers/add/<?php echo $data['question']->QID; ?>" method="POST" enctype="multipart/form-data">
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
                                                <button id="bold" class="option-button format" title="Bold" type="button">
                                                    <i class="fa-solid fa-bold"></i>
                                                </button>
                                                <button id="italic" class="option-button format" title="Italic" type="button">
                                                    <i class="fa-solid fa-italic"></i>
                                                </button>
                                                <button id="underline" class="option-button format" title="Underline" type="button">
                                                    <i class="fa-solid fa-underline"></i>
                                                </button>
                                                <button id="strikethrough" class="option-button format" title="Strike-through" type="button">
                                                    <i class="fa-solid fa-strikethrough"></i>
                                                </button>
                                                <button id="superscript" class="option-button script" title="Superscript" type="button">
                                                    <i class="fa-solid fa-superscript"></i>
                                                </button>
                                                <button id="subscript" class="option-button script" title="Subscript" type="button">
                                                    <i class="fa-solid fa-subscript"></i>
                                                </button>
                                                <!-- List -->
                                                <button id="insertOrderedList" class="option-button" title="Ordered list" type="button">
                                                    <div class="fa-solid fa-list-ol"></div>
                                                </button>
                                                <button id="insertUnorderedList" class="option-button" title="Unordered list" type="button">
                                                    <i class="fa-solid fa-list"></i>
                                                </button>
                                                <!-- Undo/Redo -->
                                                <button id="undo" class="option-button" title="Undo" type="button">
                                                    <i class="fa-solid fa-rotate-left"></i>
                                                </button>
                                                <button id="redo" class="option-button" title="Redo" type="button">
                                                    <i class="fa-solid fa-rotate-right"></i>
                                                </button>
                                                <!-- Link -->
                                                <button id="createLink" class="adv-option-button" title="Create link" type="button">
                                                    <i class="fa fa-link"></i>
                                                </button>
                                                <button id="unlink" class="option-button" title="Unlink" type="button">
                                                    <i class="fa fa-unlink"></i>
                                                </button>
                                                <!-- Alignment -->
                                                <button id="justifyLeft" class="option-button align" title="Justify left" type="button">
                                                    <i class="fa-solid fa-align-left"></i>
                                                </button>
                                                <button id="justifyCenter" class="option-button align" title="Justify center" type="button">
                                                    <i class="fa-solid fa-align-center"></i>
                                                </button>
                                                <button id="justifyRight" class="option-button align" title="Justify right" type="button">
                                                    <i class="fa-solid fa-align-right"></i>
                                                </button>
                                                <button id="justifyFull" class="option-button align" title="Justify full" type="button">
                                                    <i class="fa-solid fa-align-justify"></i>
                                                </button>
                                                <!-- Headings -->
                                                <select id="formatBlock" class="adv-option-button" title="Headings">
                                                    <option value="H1">H1</option>
                                                    <option value="H2">H2</option>
                                                    <option value="H3">H3</option>
                                                    <option value="H4">H4</option>
                                                    <option value="H5">H5</option>
                                                    <option value="H6">H6</option>
                                                </select>
                                                <!-- Font -->
                                                <select id="fontName" class="adv-option-button" title="Font name"></select>
                                                <select id="fontSize" class="adv-option-button" title="Font size"></select>
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
                                            <div id="text-input" contenteditable="true" title="Enter text..." name="content"></div>
                                            <!-- <textarea id="text-input" name="content"></textarea> -->
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

                                </td>
                            <tr>
                                <td colspan="3" style="padding-top: 1rem;">
                                            <h4 style="margin-bottom:.5rem">Add Thumbnail <img src="<?php echo URLROOT; ?>/img/thumbnail.png" style="width: 17px;"> <span class="star">*</span></h4>

                                            <label style="font-size: 14px; color:black">Upload a picture that shows what's in your video.
                                                A good thumbnail stands out and draws viewers' attention.<br><b>Make sure it is in 16:9 ratio</b>.</label><br><br>
                                            <br>  
                                            <!-- Add image section -->                                   
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" required/>
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url(<?php echo URLROOT; ?>/img/thumbnailpic.png);">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- -->
                                            <span class="error"><?php echo $data['image_err']; ?></span>
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
                <form action="<?php echo URLROOT; ?>/Pages/expert"><button type="submit" style="float:right" class="read-more attend">Home</button></form>
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
