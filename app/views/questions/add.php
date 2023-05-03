<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT; ?>/css/addconsult.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    <?php if (($_SESSION['role']) == 'seeker') : ?><?php elseif (($_SESSION['role']) == 'expert' || $_SESSION['role'] == 'premium') : ?>.nav {
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
                <h3>Add New Questions</h3><br>

                <!-- Adding a picture to event -->

                <!-- Event 1 -->
                <div class="question-div add-event">
                    <form action="<?php echo URLROOT; ?>/Questions/add" method="POST">
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
                                <td colspan="3" style="border-bottom: 1px solid rgba(128,128,128, .2); padding-bottom: 1rem;">
                                    <h4 style="margin-bottom:1.5rem">Content <span class="star">*</span></h4>
                                    <!-- Text Editor -->
                                    <div class="textEditor">
                                        <div>
                                            <div class="options">
                                                <!-- Text Format -->
                                                <button id="bold" class="option-button format" title="Bold" type="button" onclick="executeCommand('bold')">
                                                    <i class="fa-solid fa-bold"></i>
                                                </button>
                                                <button id="italic" class="option-button format" title="Italic" type="button" onclick="executeCommand('italic')">
                                                    <i class="fa-solid fa-italic"></i>
                                                </button>
                                                <button id="underline" class="option-button format" title="Underline" type="button" onclick="executeCommand('underline')">
                                                    <i class="fa-solid fa-underline"></i>
                                                </button>
                                                <button id="strikethrough" class="option-button format" title="Strike-through" type="button" onclick="executeCommand('strikeThrough')">
                                                    <i class="fa-solid fa-strikethrough"></i>
                                                </button>
                                                <button id="superscript" class="option-button script" title="Superscript" type="button" onclick="executeCommand('superscript')">
                                                    <i class="fa-solid fa-superscript"></i>
                                                </button>
                                                <button id="subscript" class="option-button script" title="Subscript" type="button" onclick="executeCommand('subscript')">
                                                    <i class="fa-solid fa-subscript"></i>
                                                </button>
                                                <!-- List -->
                                                <button id="insertOrderedList" class="option-button" title="Ordered list" type="button" onclick="executeCommand('insertOrderedList')">
                                                    <div class="fa-solid fa-list-ol"></div>
                                                </button>
                                                <button id="insertUnorderedList" class="option-button" title="Unordered list" type="button" onclick="executeCommand('insertUnorderedList')">
                                                    <i class="fa-solid fa-list"></i>
                                                </button>
                                                <!-- Link -->
                                                <button id="createLink" class="adv-option-button" title="Create link" type="button" onclick="createLink()">
                                                    <i class="fa fa-link"></i>
                                                </button>
                                                <button id="unlink" class="option-button" title="Unlink" type="button" onclick="executeCommand('unlink')">
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
                                                <!-- Color -->
                                                <div class="input-wrapper">
                                                    <input type="color" id="foreColor" class="adv-option-button" onchange="executeCommand('foreColor', this.value)"/>
                                                    <label for="foreColor">Font Color</label>
                                                </div>
                                                <div class="input-wrapper">
                                                    <input type="color" id="backColor" class="adv-option-button" onchange="executeCommand('hiliteColor', this.value)"/>
                                                    <label for="backColor">Highlight Color</label>
                                                </div>
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
                                                <div id="basicMath" class="content">
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
                                            <div id="text-input" contenteditable="true" title="Enter text..." name="content" class="editor" id="math"></div>
                                            <span class="error"><?php echo $data['content_err']; ?></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Tags <span class="star">*</span></h4>
                                    <div class="dropdown-div">
                                        <form method="POST" id="innerform">
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
                                </td>
                            </tr>

                            <script>
                                   // Define an empty array to store the selected checkbox values
                                var selectedValues = [];

                                // Get all checkboxes with the 'tag[]' name
                                var checkboxes = document.getElementsByName('tag[]');

                                // Loop through the checkboxes and add an onchange event listener
                                for (var i = 0; i < checkboxes.length; i++) {
                                    checkboxes[i].addEventListener('change', function() {
                                        // If the checkbox is checked, add its value to the selectedValues array
                                        if (this.checked) {
                                            selectedValues.push(this.value);
                                        // alert(selectedValues);
                                        }
                                        // If the checkbox is unchecked, remove its value from the selectedValues array
                                        else {
                                            var index = selectedValues.indexOf(this.value);
                                            if (index !== -1) {
                                                selectedValues.splice(index, 1);
                                            }
                                        }
                                        
                                        if(selectedValues.length == 0){
                                            $('.resource').html('Please Select One of More Tags');
                                        }else{
                                        //Send AJAX request to server
                                        $.ajax({
                                            url: '<?php echo URLROOT;?>/Questions/resourceName',
                                            method: 'POST',
                                            data: {selectedValues: selectedValues},
                                            success: function(response) {
                                                $('.resource').html(response);
                                            }
                                        });
                                    }

                                        
                                    });
                                }                       
                                </script>
                            <tr>
                                <td class="rp">
                                    <div class="checkbox-1">
                                        <span class="checkbox-title" onclick="filter3()">
                                            <h4>Select Specific Experts(Optional)
                                                <i class="arrow up" id="up3" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down3" style="margin-left: 4.3rem;"></i>
                                            </h4>
                                        </span>
                                        <ul id="checkbox-3">
                                            <div class="resource">Please Select One of More Tags</div>
                                        </ul>
                                    </div>
                                </td>
                                <td> <input type="checkbox" id="anonymus" name="visibility" value="<?php echo $data['visibility'] ?>"></td>
                                <td><label for="anonymus">Make Anonymus</label>
                                    <p class="anonymusp1">Your name will not be displayed in the Question</p>
                                </td>
                            </tr>
                            <tr>
                                <!--                                <td style="padding-right:1rem; width:50%;">-->

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
                <form action="<?php echo URLROOT; ?>/questions/myquestions"><button type="submit" style="float:right" class="read-more attend">My Questions</button></form>
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

    <?php require APPROOT . '/views/inc/footer.php'; ?>