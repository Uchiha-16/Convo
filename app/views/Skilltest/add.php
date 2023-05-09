<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT; ?>/css/addconsult.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT; ?>/css/textEditor.css" rel="stylesheet" type="text/css" />

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
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML"></script>
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
                <h3>Add A Question To Question Pool</h3><br>

                <!-- Adding a picture to event -->

                <!-- Event 1 -->
                <div class="question-div add-event">
                    <form action="<?php echo URLROOT; ?>/SkillTest/add" method="POST">
                        <table>
                           
                                <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Tags <span class="star">*</span></h4>
                                <div class="dropdown-div">
                                    <form method="POST" id="innerform">
                                        
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

                                                <option type="radio" value="spaceScience" name="tag" id="radio25"  /><label for="radio25">Space Science</label>
                                            </select>
                                        </tr>

                                        <tr>
                                <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Question <span class="star">*</span></h4>
                                    
                                            
                              <!-- Text Editor -->
                              <div class="textEditor">
                                        <div>
                                            <div class="options">
                                                <!-- Text Format -->
                                                <button id="boldBtn" class="option-button format" title="Bold" type="button" onclick="executeCommand('bold')">
                                                    <i class="fa-solid fa-bold"></i>
                                                </button>
                                                <button id="italicBtn" class="option-button format" title="Italic" type="button" onclick="executeCommand('italic')">
                                                    <i class="fa-solid fa-italic"></i>
                                                </button>
                                                <button id="underlineBtn" class="option-button format" title="Underline" type="button" onclick="executeCommand('underline')">
                                                    <i class="fa-solid fa-underline"></i>
                                                </button>
                                                <button id="strikethroughBtn" class="option-button format" title="Strike-through" type="button" onclick="executeCommand('strikeThrough')">
                                                    <i class="fa-solid fa-strikethrough"></i>
                                                </button>
                                                <button id="superscriptBtn" class="option-button script" title="Superscript" type="button" onclick="executeCommand('superscript')">
                                                    <i class="fa-solid fa-superscript"></i>
                                                </button>
                                                <button id="subscriptBtn" class="option-button script" title="Subscript" type="button" onclick="executeCommand('subscript')">
                                                    <i class="fa-solid fa-subscript"></i>
                                                </button>
                                                <!-- List -->
                                                <button id="orderedListBtn" class="option-button" title="Ordered list" type="button" onclick="executeCommand('insertOrderedList')">
                                                    <div class="fa-solid fa-list-ol"></div>
                                                </button>
                                                <button id="unorderedListBtn" class="option-button" title="Unordered list" type="button" onclick="executeCommand('insertUnorderedList')">
                                                    <i class="fa-solid fa-list"></i>
                                                </button>
                                                <!-- Link -->
                                                <button id="linkBtn" class="adv-option-button" title="Create link" type="button" onclick="createLink()">
                                                    <i class="fa fa-link"></i>
                                                </button>
                                                <button id="unlinkBtn" class="option-button" title="Unlink" type="button" onclick="executeCommand('unlink')">
                                                    <i class="fa fa-unlink"></i>
                                                </button>
                                                <select id="fontSize" class="adv-option-button" title="Font size" onchange="executeCommand('fontSize', this.value)" style="font-family: 'Inter';">
                                                    <option value="">Font Size</option>
                                                    <option value="1">8</option>
                                                    <option value="2">10</option>
                                                    <option value="3">12</option>
                                                    <option value="4">14</option>
                                                    <option value="5">18</option>
                                                    <option value="6">24</option>
                                                    <option value="7">36</option>
                                                </select>
                                                <div class="input-wrapper math-section">
                                                    <select id="math" class="adv-option-button math-selector" title="Font size">
                                                        <option value="" style="background-color:darkgray;color:white">Math Symbols</option>
                                                        <option value="basicMath" class="apply4job">Basic Math</option>
                                                        <option value="2">Greek Letters</option>
                                                        <option value="3">Letter-Like Symbols</option>
                                                        <option value="4">Operators</option>
                                                        <option value="5">Arrows</option>
                                                        <option value="6">Negated Relations</option>
                                                        <option value="7">Scripts</option>
                                                        <option value="8">Geometry</option>
                                                    </select>
                                                </div><br>
                                                <div id="basicMath" class="content" style="display:none;">
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="plus or minus" type="button" onclick="insertSymbol('&#177;')">&#177;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="infinity" type="button" onclick="insertSymbol('&#8734;')">&#8734;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="equals" type="button" onclick="insertSymbol('&#61;')">&#61;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="not equals" type="button" onclick="insertSymbol('&#8800;')">&#8800;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="sine-wave" type="button" onclick="insertSymbol('&#8767;')">&#8767;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="multiply" type="button" onclick="insertSymbol('&#215;')">&#215;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="divide" type="button" onclick="insertSymbol('&#247;')">&#247;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="exclamation" type="button" onclick="insertSymbol('&#33;')">&#33;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="proportional" type="button" onclick="insertSymbol('&#8733;')">&#8733;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="less than" type="button" onclick="insertSymbol('&#60;')">&#60;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="more less than" type="button" onclick="insertSymbol('&#8810;')">&#8810;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="greater than" type="button" onclick="insertSymbol('&#62;')">&#62;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="more greater than" type="button" onclick="insertSymbol('&#8811;')">&#8811;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="less than or equal" type="button" onclick="insertSymbol('&#8734;')">&#8734;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="greater than or equal" type="button" onclick="insertSymbol('&#8805;')">&#8805;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="minus or plus" type="button" onclick="insertSymbol('&#8723;')">&#8723;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="aproximately equal to" type="button" onclick="insertSymbol('&#8773;')">&#8773;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="almost equal to" type="button" onclick="insertSymbol('&#8776;')">&#8776;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="identical" type="button" onclick="insertSymbol('&#8801;')">&#8801;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="for-all" type="button" onclick="insertSymbol('&#8704;')">&#8704;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="complement" type="button" onclick="insertSymbol('&#8705;')">&#8705;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="partial differential" type="button" onclick="insertSymbol('&#8706;')">&#8706;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="square-root" type="button" onclick="insertSymbol('&#8730;')">&#8730;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="cube-root" type="button" onclick="insertSymbol('&#8731;')">&#8731;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="fourth-root" type="button" onclick="insertSymbol('&#8732;')">&#8732;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="union" type="button" onclick="insertSymbol('&#8746;')">&#8746;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="intersection" type="button" onclick="insertSymbol('&#8745;')">&#8745;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="empty" type="button" onclick="insertSymbol('&#8709;')">&#8709;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="percentage" type="button" onclick="insertSymbol('&#37;')">&#37;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="degrees" type="button" onclick="insertSymbol('&#8728;')">&#8728;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="fahrenheit" type="button" onclick="insertSymbol('&#8457;')">&#8457;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="celsius" type="button" onclick="insertSymbol('&#8451;')">&#8451;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="increment" type="button" onclick="insertSymbol('&#8710;')">&#8710;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="nabla" type="button" onclick="insertSymbol('&#8711;')">&#8711;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="there exists" type="button" onclick="insertSymbol('&#8707;')">&#8707;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="there not exists" type="button" onclick="insertSymbol('&#8708;')">&#8708;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="element of" type="button" onclick="insertSymbol('&#8712;')">&#8712;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="contains" type="button" onclick="insertSymbol('&#8715;')">&#8715;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="left" type="button" onclick="insertSymbol('&#8592;')">&#8592;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="up" type="button" onclick="insertSymbol('&#8593;')">&#8593;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="right" type="button" onclick="insertSymbol('&#8594;')">&#8594;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="down" type="button" onclick="insertSymbol('&#8595;')">&#8595;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="left-right" type="button" onclick="insertSymbol('&#8596;')">&#8596;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="therefore" type="button" onclick="insertSymbol('&#8756;')">&#8756;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="plus" type="button" onclick="insertSymbol('&#43;')">&#43;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="minus" type="button" onclick="insertSymbol('&#8722;')">&#8722;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="not" type="button" onclick="insertSymbol('&#172;')">&#172;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="alpha" type="button" onclick="insertSymbol('&#945;')">&#945;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="beta" type="button" onclick="insertSymbol('&#946;')">&#946;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="gamma" type="button" onclick="insertSymbol('&#947;')">&#947;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="delta" type="button" onclick="insertSymbol('&#948;')">&#948;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="epsilon" type="button" onclick="insertSymbol('&#949;')">&#949;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="theta" type="button" onclick="insertSymbol('&#952;')">&#952;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="mu" type="button" onclick="insertSymbol('&#956;')">&#956;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="pi" type="button" onclick="insertSymbol('&#960;')">&#960;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="rho" type="button" onclick="insertSymbol('&#961;')">&#961;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="sigma" type="button" onclick="insertSymbol('&#963;')">&#963;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="tau" type="button" onclick="insertSymbol('&#964;')">&#964;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="phi" type="button" onclick="insertSymbol('&#966;')">&#966;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="omega" type="button" onclick="insertSymbol('&#969;')">&#969;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="asterisk" type="button" onclick="insertSymbol('&#8727;')">&#8727;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="bullet" type="button" onclick="insertSymbol('&#8901;')">&#8901;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="vertical ellipsis" type="button" onclick="insertSymbol('&#8942;')">&#8942;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="horizontal ellipsis" type="button" onclick="insertSymbol('&#8943;')">&#8943;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="up-right-diagonal ellipsis" type="button" onclick="insertSymbol('&#8944;')">&#8944;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="down-right-diagonal ellipsis" type="button" onclick="insertSymbol('&#8945;')">&#8945;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="alef" type="button" onclick="insertSymbol('&#8501;')">&#8501;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="bet" type="button" onclick="insertSymbol('&#8502;')">&#8502;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button id="createLink" class="adv-option-button" title="end of proof" type="button" onclick="insertSymbol('&#8718;')">&#8718;</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div id="text-input" contenteditable="true" title="Enter text..." class="editor"><?php echo $data['question']; ?> </div>
                                            <input type="text" id="result" style="display:none;" name="question">
                                                 
                                            <span class="error"><?php echo $data['question_err']; ?></span>
                                        </div>
                                    </div>
                                    <!-- End of editor -->
                                    
                                                
                                           
                                    </div>
                                        
                                        
                                        
                                    
                                </td>
                            </tr>
                            <tr styl>
                               <div> <td class="complaint" ><h4 style="margin-bottom:.5rem">Difficulty Level <span class="star">*</span></h4>
                                    </td>
                                
                            </tr>
                            <tr>
                                
                                <td colspan="3" placeholder="Select the difficulty level.">
                                <select class="inputform" name="difficulty" style="font-size:14px;" required >
                                   
                                    <option value="easy">Easy</option>
                                    <option value="medium">Medium</option>
                                    <option value="hard">Hard</option>
                                   
                                </select>
                            </tr>
                            <tr>
                                <td colspan="3" >

                                <h4 style="margin-bottom:.5rem">Options <span class="star">*</span></h4>
                                <input class="inputform" type="text" name="content[]" placeholder="option 1" value="<?php echo isset($data['content'][0]) ? $data['content'][0] : ''; ?>">
                                <input class="inputform" type="text" name="content[]" placeholder="option 2" value="<?php echo isset($data['content'][1]) ? $data['content'][1] : ''; ?>">
                                <input class="inputform" type="text" name="content[]" placeholder="option 3" value="<?php echo isset($data['content'][2]) ? $data['content'][2] : ''; ?>">
                                <input class="inputform" type="text" name="content[]" placeholder="option 4" value="<?php echo isset($data['content'][3]) ? $data['content'][3] : ''; ?>">

                                
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3">
                                <h4 style="margin-bottom:.5rem">Select the correct answer <span class="star">*</span></h4>
                                    <select class="inputform" name="validity" style="font-size:14px;" required >
                                       
                                        <option value="option1">Option 1</option>
                                        <option value="option2">Option 2</option>
                                        <option value="option3">Option 3</option>
                                        <option value="option4">Option 4</option>

                                    
                                    </select>
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
                                        <button style="float:right" class="read-more attend submit" type="submit" name="create">Add Question</button>
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

<!-- <style>
        
        input[type="radio"] {
        width: 15px;
        height: 15px;
        margin-right: 5px;
                        }
</style> -->
<script>
            // Get the editable div
        const editor = document.querySelector('.editor');

        $(function () {
            $('.basicEquations').hide();
            $('.basicMath').hide();
            $('.greekLetters').hide();
            $('.letterLikeSymbols').hide();
            $('.operators').hide();
            $('.arrows').hide();
            $('.negatedRelations').hide();
            $('.geometry').hide();
            $('#math').change(function () {
                $('.basicEquations').hide();
                $('.basicMath').hide();
                $('.greekLetters').hide();
                $('.letterLikeSymbols').hide();
                $('.operators').hide();
                $('.arrows').hide();
                $('.negatedRelations').hide();
                $('.geometry').hide();
                $('#' + $(this).val()).show();

            });
        });

        const fontSizeSelect = document.getElementById('fontSize');
        // Set the default font size to 3 (12px)
        fontSizeSelect.value = '3';
        // Listen for changes to the font size select
        fontSizeSelect.addEventListener('change', () => {
            // Get the selected font size
            const fontSize = fontSizeSelect.value;
            // Apply the font size to the selected text
            document.execCommand('fontSize', false, fontSize);
            // Remove the selection after applying the font size
            window.getSelection().removeAllRanges();
        });

        const text_input = document.getElementById('text-input');
        text_input.addEventListener('input', updateQuestionInput);

        function updateQuestionInput() {
        const inputValue = text_input.innerHTML;
        document.getElementById('result').value = inputValue;
        }
        // Get the buttons
        const boldBtn = document.getElementById('boldBtn');
        const italicBtn = document.getElementById('italicBtn');
        const underlineBtn = document.getElementById('underlineBtn');
        const strikethroughBtn = document.getElementById('strikethroughBtn');
        const subscriptBtn = document.getElementById('subscriptBtn');
        const superscriptBtn = document.getElementById('superscriptBtn');
        const orderedListBtn = document.getElementById('orderedListBtn');
        const unorderedListBtn = document.getElementById('unorderedListBtn');
        const linkBtn = document.getElementById('linkBtn');
        const unlinkBtn = document.getElementById('unlinkBtn');
        const codeBlockBtn = document.getElementById('codeBlockBtn');
        const convertBtn = document.getElementById('convertBtn');

        // Add event listeners to the buttons
        boldBtn.addEventListener('click', addBold);
        italicBtn.addEventListener('click', addItalic);
        underlineBtn.addEventListener('click', addUnderline);
        strikethroughBtn.addEventListener('click', addStrikethrough);
        subscriptBtn.addEventListener('click', addSubscript);
        superscriptBtn.addEventListener('click', addSuperscript);
        orderedListBtn.addEventListener('click', addOrderedList);
        unorderedListBtn.addEventListener('click', addUnorderedList);
        linkBtn.addEventListener('click', addLink);
        unlinkBtn.addEventListener('click', removeLink);
        codeBlockBtn.addEventListener('click', addCodeBlock);
        convertBtn.addEventListener('click', convertToHtml);


        // Function to add bold tags to selected text
        function addBold() {
            document.execCommand('bold', false, null);
        }

        // Function to add italic tags to selected text
        function addItalic() {
            document.execCommand('italic', false, null);
        }

        // Function to add underline tags to selected text
        function addUnderline() {
            document.execCommand('underline', false, null);
        }

        // Function to add strikethrough tags to selected text
        function addStrikethrough() {
            document.execCommand('strikethrough', false, null);
            editor.focus();
        }

        // Function to add subscript tags to selected text
        function addSubscript() {
            document.execCommand('subscript', false, null);
        }

        // Function to add superscript tags to selected text
        function addSuperscript() {
            document.execCommand('superscript', false, null);
        }

        // Function to add ordered list tags to selected text
        function addOrderedList() {
            document.execCommand('insertOrderedList', false, null);
            editor.focus();
        }

        // Function to add unordered list tags to selected text
        function addUnorderedList() {
            document.execCommand('insertUnorderedList', false, null);
        }

        // Function to add link to selected text
        function addLink() {
            const url = prompt('Enter the URL:');
            document.execCommand('createLink', false, url);
        }

        // Function to remove link from selected text
        function removeLink() {
            document.execCommand('unlink', false, null);
        }

        // Function to add code block
        function addCodeBlock() {
            document.execCommand('insertHTML', false, '<pre><code class="language-html"> </code></pre>');
        }

        // Function to convert the edited text to HTML
        function convertToHtml() {
            // Get the edited text
            // alert(text_input.innerHTML);
            const editedText = text_input.innerHTML.replace(/</g, "&lt;").replace(/>/g, "&gt;");
            // Display the HTML result
            const result = document.getElementById('result');
            result.innerHTML = editedText;
        }

        function insertSymbol(symbol) {
            // Get the current cursor position in the editable div element
            var selection = window.getSelection();
            var range = selection.getRangeAt(0);
            var currentStart = range.startOffset;
            // Insert the symbol at the current cursor position
            range.insertNode(document.createTextNode(symbol));
            // Move the cursor to the end of the inserted symbol
            range.setStart(range.startContainer, currentStart + symbol.length);
            range.setEnd(range.startContainer, currentStart + symbol.length);
            selection.removeAllRanges();
            selection.addRange(range);
            editor.focus();
        }

        // code block
        $(document).ready(function () {
            $("#codeBlockBtn").click(function () {
                $(".codeeditor").toggle();
            });
        });
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
    