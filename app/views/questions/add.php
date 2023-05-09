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
                                                        <option value="basicMath">Basic Math</option>
                                                        <option value="greekLetters">Greek Letters</option>
                                                        <option value="letterLikeSymbols">Letter-Like Symbols</option>
                                                        <option value="operators">Operators</option>
                                                        <option value="arrows">Arrows</option>
                                                        <option value="negatedRelations">Negated Relations</option>
                                                        <option value="geometry">Geometry</option>
                                                    </select>
                                                </div><br>
                                                
                                                <div id="basicMath" class="content basicMath" style="display:none;">
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="plus or minus" type="button" onclick="insertSymbol('&#177;')">&#177;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="infinity" type="button" onclick="insertSymbol('&#8734;')">&#8734;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="equals" type="button" onclick="insertSymbol('&#61;')">&#61;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="not equals" type="button" onclick="insertSymbol('&#8800;')">&#8800;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="sine-wave" type="button" onclick="insertSymbol('&#8767;')">&#8767;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="multiply" type="button" onclick="insertSymbol('&#215;')">&#215;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="divide" type="button" onclick="insertSymbol('&#247;')">&#247;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="exclamation" type="button" onclick="insertSymbol('&#33;')">&#33;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="proportional" type="button" onclick="insertSymbol('&#8733;')">&#8733;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="less than" type="button" onclick="insertSymbol('&#60;')">&#60;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="more less than" type="button" onclick="insertSymbol('&#8810;')">&#8810;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="greater than" type="button" onclick="insertSymbol('&#62;')">&#62;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="more greater than" type="button" onclick="insertSymbol('&#8811;')">&#8811;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="less than or equal" type="button" onclick="insertSymbol('&#8734;')">&#8734;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="greater than or equal" type="button" onclick="insertSymbol('&#8805;')">&#8805;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="minus or plus" type="button" onclick="insertSymbol('&#8723;')">&#8723;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="aproximately equal to" type="button" onclick="insertSymbol('&#8773;')">&#8773;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="almost equal to" type="button" onclick="insertSymbol('&#8776;')">&#8776;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="identical" type="button" onclick="insertSymbol('&#8801;')">&#8801;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="for-all" type="button" onclick="insertSymbol('&#8704;')">&#8704;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="complement" type="button" onclick="insertSymbol('&#8705;')">&#8705;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="partial differential" type="button" onclick="insertSymbol('&#8706;')">&#8706;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="square-root" type="button" onclick="insertSymbol('&#8730;')">&#8730;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="cube-root" type="button" onclick="insertSymbol('&#8731;')">&#8731;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="fourth-root" type="button" onclick="insertSymbol('&#8732;')">&#8732;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="union" type="button" onclick="insertSymbol('&#8746;')">&#8746;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="intersection" type="button" onclick="insertSymbol('&#8745;')">&#8745;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="empty" type="button" onclick="insertSymbol('&#8709;')">&#8709;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="percentage" type="button" onclick="insertSymbol('&#37;')">&#37;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="degrees" type="button" onclick="insertSymbol('&#8728;')">&#8728;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="fahrenheit" type="button" onclick="insertSymbol('&#8457;')">&#8457;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="celsius" type="button" onclick="insertSymbol('&#8451;')">&#8451;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="increment" type="button" onclick="insertSymbol('&#8710;')">&#8710;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="nabla" type="button" onclick="insertSymbol('&#8711;')">&#8711;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="there exists" type="button" onclick="insertSymbol('&#8707;')">&#8707;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="there not exists" type="button" onclick="insertSymbol('&#8708;')">&#8708;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="element of" type="button" onclick="insertSymbol('&#8712;')">&#8712;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="contains" type="button" onclick="insertSymbol('&#8715;')">&#8715;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="left" type="button" onclick="insertSymbol('&#8592;')">&#8592;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="up" type="button" onclick="insertSymbol('&#8593;')">&#8593;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="right" type="button" onclick="insertSymbol('&#8594;')">&#8594;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="down" type="button" onclick="insertSymbol('&#8595;')">&#8595;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="left-right" type="button" onclick="insertSymbol('&#8596;')">&#8596;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="therefore" type="button" onclick="insertSymbol('&#8756;')">&#8756;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="plus" type="button" onclick="insertSymbol('&#43;')">&#43;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="minus" type="button" onclick="insertSymbol('&#8722;')">&#8722;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="not" type="button" onclick="insertSymbol('&#172;')">&#172;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="alpha" type="button" onclick="insertSymbol('&#945;')">&#945;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="beta" type="button" onclick="insertSymbol('&#946;')">&#946;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button" class="adv-option-button" title="gamma" type="button" onclick="insertSymbol('&#947;')">&#947;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="delta" type="button" onclick="insertSymbol('&#948;')">&#948;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="epsilon" type="button" onclick="insertSymbol('&#949;')">&#949;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="theta" type="button" onclick="insertSymbol('&#952;')">&#952;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="mu" type="button" onclick="insertSymbol('&#956;')">&#956;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="pi" type="button" onclick="insertSymbol('&#960;')">&#960;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="rho" type="button" onclick="insertSymbol('&#961;')">&#961;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="sigma" type="button" onclick="insertSymbol('&#963;')">&#963;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="tau" type="button" onclick="insertSymbol('&#964;')">&#964;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="phi" type="button" onclick="insertSymbol('&#966;')">&#966;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="omega" type="button" onclick="insertSymbol('&#969;')">&#969;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="asterisk" type="button" onclick="insertSymbol('&#8727;')">&#8727;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="bullet" type="button" onclick="insertSymbol('&#8901;')">&#8901;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="vertical ellipsis" type="button" onclick="insertSymbol('&#8942;')">&#8942;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="horizontal ellipsis" type="button" onclick="insertSymbol('&#8943;')">&#8943;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="up-right-diagonal ellipsis" type="button" onclick="insertSymbol('&#8944;')">&#8944;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="down-right-diagonal ellipsis" type="button" onclick="insertSymbol('&#8945;')">&#8945;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="alef" type="button" onclick="insertSymbol('&#8501;')">&#8501;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="bet" type="button" onclick="insertSymbol('&#8502;')">&#8502;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="end of proof" type="button" onclick="insertSymbol('&#8718;')">&#8718;</button>
                                                    </div>
                                                </div>
                                                <div id="greekLetters" class="content greekLetters" style="display:none;">
                                                    <span>Lowercase</span>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="alpha" type="button" onclick="insertSymbol('&#945;')">&#945;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="beta" type="button" onclick="insertSymbol('&#946;')">&#946;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="gamma" type="button" onclick="insertSymbol('&#947;')">&#947;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="delta" type="button" onclick="insertSymbol('&#948;')">&#948;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="epsilon" type="button" onclick="insertSymbol('&#949;')">&#949;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="zeta" type="button" onclick="insertSymbol('&#950;')">&#950;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="eta" type="button" onclick="insertSymbol('&#951;')">&#951;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="theta" type="button" onclick="insertSymbol('&#952;')">&#952;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="thetasym" type="button" onclick="insertSymbol('&#977;')">&#977;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="iota" type="button" onclick="insertSymbol('&#953;')">&#953;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="kappa" type="button" onclick="insertSymbol('&#954;')">&#954;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="lambda" type="button" onclick="insertSymbol('&#955;')">&#955;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="mu" type="button" onclick="insertSymbol('&#956;')">&#956;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="omega" type="button" onclick="insertSymbol('&#969;')">&#969;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="nu" type="button" onclick="insertSymbol('&#957;')">&#957;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="xi" type="button" onclick="insertSymbol('&#958;')">&#958;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="omicron" type="button" onclick="insertSymbol('&#959;')">&#959;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="pi" type="button" onclick="insertSymbol('&#960;')">&#960;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="rho" type="button" onclick="insertSymbol('&#961;')">&#961;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="piv" type="button" onclick="insertSymbol('&#982;')">&#982;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="sigmaf" type="button" onclick="insertSymbol('&#962;')">&#962;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="tau" type="button" onclick="insertSymbol('&#964;')">&#964;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="upsilon" type="button" onclick="insertSymbol('&#965;')">&#965;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="phi" type="button" onclick="insertSymbol('&#966;')">&#966;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="psi" type="button" onclick="insertSymbol('&#968;')">&#968;</button>
                                                    </div><br><span>Uppercase</span><br>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Alpha" type="button" onclick="insertSymbol('&#913;')">&#913;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Beta" type="button" onclick="insertSymbol('&#914;')">&#914;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Gamma" type="button" onclick="insertSymbol('&#915;')">&#915;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Delta" type="button" onclick="insertSymbol('&#916;')">&#916;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Epsilon" type="button" onclick="insertSymbol('&#917;')">&#917;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Zeta" type="button" onclick="insertSymbol('&#918;')">&#918;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Eta" type="button" onclick="insertSymbol('&#919;')">&#919;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Theta" type="button" onclick="insertSymbol('&#920;')">&#920;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Iota" type="button" onclick="insertSymbol('&#921;')">&#921;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Kappa" type="button" onclick="insertSymbol('&#922;')">&#922;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Lambda" type="button" onclick="insertSymbol('&#923;')">&#923;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Mu" type="button" onclick="insertSymbol('&#924;')">&#924;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Nu" type="button" onclick="insertSymbol('&#925;')">&#925;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Xi" type="button" onclick="insertSymbol('&#926;')">&#926;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Omicron" type="button" onclick="insertSymbol('&#927;')">&#927;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Pi" type="button" onclick="insertSymbol('&#928;')">&#928;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Rho" type="button" onclick="insertSymbol('&#929;')">&#929;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Sigma" type="button" onclick="insertSymbol('&#931;')">&#931;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Tau" type="button" onclick="insertSymbol('&#932;')">&#932;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Upsilon" type="button" onclick="insertSymbol('&#933;')">&#933;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Phi" type="button" onclick="insertSymbol('&#934;')">&#934;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Chi" type="button" onclick="insertSymbol('&#935;')">&#935;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Psi" type="button" onclick="insertSymbol('&#936;')">&#936;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="Omega" type="button" onclick="insertSymbol('&#937;')">&#937;</button>
                                                    </div>
                                                </div>
                                                <div id="letterLikeSymbols" class="content letterLikeSymbols" style="display:none;">
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="forall" type="button" onclick="insertSymbol('&#8704;')">&#8704;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="complement" type="button" onclick="insertSymbol('&#8705;')">&#8705;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="complex numbers" type="button" onclick="insertSymbol('&#8450;')">&#8450;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="partial differential" type="button" onclick="insertSymbol('&#8706;')">&#8706;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="euler constant" type="button" onclick="insertSymbol('&#8455;')">&#8455;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="fourier transform" type="button" onclick="insertSymbol('&#8497;')">&#8497;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="claudian digamma inversum" type="button" onclick="insertSymbol('&#8498;')">&#8498;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="real number symbol" type="button" onclick="insertSymbol('&#8458;')">&#8458;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="hamiltonian operator" type="button" onclick="insertSymbol('&#8459;')">&#8459;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="height, specific enthalpy" type="button" onclick="insertSymbol('&#8462;')">&#8462;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="planck constant over two pi" type="button" onclick="insertSymbol('&#8463;')">&#8463;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="iota" type="button" onclick="insertSymbol('&#8489;')">&#8489;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="imaginary unit" type="button" onclick="insertSymbol('&#8520;')">&#8520;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="imaginary unit" type="button" onclick="insertSymbol('&#8521;')">&#8521;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="laplace transform" type="button" onclick="insertSymbol('&#8466;')">&#8466;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="natural number" type="button" onclick="insertSymbol('&#8469;')">&#8469;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="rational numbers" type="button" onclick="insertSymbol('&#8474;')">&#8474;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="real numbers" type="button" onclick="insertSymbol('&#8477;')">&#8477;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="integers" type="button" onclick="insertSymbol('&#8484;')">&#8484;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="riemann integral" type="button" onclick="insertSymbol('&#8475;')">&#8475;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="mho" type="button" onclick="insertSymbol('&#8487;')">&#8487;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="angstrom" type="button" onclick="insertSymbol('&#8491;')">&#8491;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="bernoulli function" type="button" onclick="insertSymbol('&#8492;')">&#8492;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="estimated symbol" type="button" onclick="insertSymbol('&#8494;')">&#8494;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="emf" type="button" onclick="insertSymbol('&#8496;')">&#8496;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="m-matrix" type="button" onclick="insertSymbol('&#8499;')">&#8499;</button>
                                                    </div>
                                                </div>
                                                <div id="operators" class="content operators" style="display:none;">
                                                    <span>Common Binary Operators</span>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="plus" type="button" onclick="insertSymbol('&#43;')">&#43;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="minus" type="button" onclick="insertSymbol('&#8722;')">&#8722;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="divide" type="button" onclick="insertSymbol('&#247;')">&#247;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="times" type="button" onclick="insertSymbol('&#215;')">&#215;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="plus or minus" type="button" onclick="insertSymbol('&#177;')">&#177;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="minus or plus" type="button" onclick="insertSymbol('&#8723;')">&#8723;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="proportional to" type="button" onclick="insertSymbol('&#8733;')">&#8733;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="division" type="button" onclick="insertSymbol('&#8725;')">&#8725;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="asterisk" type="button" onclick="insertSymbol('&#8727;')">&#8727;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="ring" type="button" onclick="insertSymbol('&#8728;')">&#8728;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="bullet" type="button" onclick="insertSymbol('&#8729;')">&#8729;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="dot" type="button" onclick="insertSymbol('&#8901;')">&#8901;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="intersection" type="button" onclick="insertSymbol('&#8898;')">&#8898;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="union" type="button" onclick="insertSymbol('&#8899	;')">&#8899;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="multiset union" type="button" onclick="insertSymbol('&#8846;')">&#8846;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="square cap" type="button" onclick="insertSymbol('&#8851;')">&#8851;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="square cup" type="button" onclick="insertSymbol('&#8852;')">&#8852;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="logical AND" type="button" onclick="insertSymbol('&#8743;')">&#8743;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="logical OR" type="button" onclick="insertSymbol('&#8744;')">&#8744;</button>
                                                    </div><br><span>Common Relational Operators</span><br>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="equal" type="button" onclick="insertSymbol('&#61;')">&#61;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="not equal" type="button" onclick="insertSymbol('&#8800;')">&#8800;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="greater than" type="button" onclick="insertSymbol('&#62;')">&#62;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="less than" type="button" onclick="insertSymbol('&#60;')">&#60;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="greater than or equal" type="button" onclick="insertSymbol('&#8925;')">&#8925;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="less than or equal" type="button" onclick="insertSymbol('&#8924;')">&#8924;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="not less than" type="button" onclick="insertSymbol('&#8814;')">&#8814;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="not less than or equal" type="button" onclick="insertSymbol('&#8816;')">&#8816;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="not greater than" type="button" onclick="insertSymbol('&#8815;')">&#8815;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="not greater than equal" type="button" onclick="insertSymbol('&#8817;')">&#8817;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="identical" type="button" onclick="insertSymbol('&#8801;')">&#8801;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="tilde" type="button" onclick="insertSymbol('&#8764;')">&#8764;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="asymptotically equal" type="button" onclick="insertSymbol('&#8771;')">&#8771;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="almost equal" type="button" onclick="insertSymbol('&#8776;')">&#8776;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="approximately equal" type="button" onclick="insertSymbol('&#8773;')">&#8773;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="not identical" type="button" onclick="insertSymbol('&#8802;')">&#8802;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="not asymptotically equal" type="button" onclick="insertSymbol('&#8772;')">&#8772;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="not almost equal" type="button" onclick="insertSymbol('&#8777;')">&#8777;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="neither approximately nor actually equal" type="button" onclick="insertSymbol('&#8775;')">&#8775;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="much less than" type="button" onclick="insertSymbol('&#8810;')">&#8810;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="much greater than" type="button" onclick="insertSymbol('&#8811;')">&#8811;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="element of" type="button" onclick="insertSymbol('&#8712;')">&#8712;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="contains" type="button" onclick="insertSymbol('&#8715;')">&#8715;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="not an element of" type="button" onclick="insertSymbol('&#8713;')">&#8713;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="subset of" type="button" onclick="insertSymbol('&#8834;')">&#8834;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="superset of" type="button" onclick="insertSymbol('&#8835;')">&#8835;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="subset or equal" type="button" onclick="insertSymbol('&#8838;')">&#8838;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="superset or equal" type="button" onclick="insertSymbol('&#8839;')">&#8839;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="precedes" type="button" onclick="insertSymbol('&#8826;')">&#8826;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="succeeds" type="button" onclick="insertSymbol('&#8827;')">&#8827;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="precedes or equal" type="button" onclick="insertSymbol('&#8828;')">&#8828;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="succeeds or equal" type="button" onclick="insertSymbol('&#8829;')">&#8829;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="square image of" type="button" onclick="insertSymbol('&#8847;')">&#8847;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="square original of" type="button" onclick="insertSymbol('&#8848;')">&#8848;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="square image or equal" type="button" onclick="insertSymbol('&#8849;')">&#8849;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="square original or equal" type="button" onclick="insertSymbol('&#8850;')">&#8850;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="parallel" type="button" onclick="insertSymbol('&#8741;')">&#8741;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="up tack" type="button" onclick="insertSymbol('&#8869;')">&#8869;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="right tack" type="button" onclick="insertSymbol('&#8866;')">&#8866;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="left tack" type="button" onclick="insertSymbol('&#88867827;')">&#8867;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="bowtie" type="button" onclick="insertSymbol('&#8904;')">&#8904;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="equivalent" type="button" onclick="insertSymbol('&#8781;')">&#8781;</button>
                                                    </div><br><span>Basic N-ary Operators</span><br>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="sum" type="button" onclick="insertSymbol('&#8721;')">&#8721;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="integral" type="button" onclick="insertSymbol('&#8747;')">&#8747;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="double integral" type="button" onclick="insertSymbol('&#8748;')">&#8748;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="triple integral" type="button" onclick="insertSymbol('&#8749;')">&#8749;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="contour integral" type="button" onclick="insertSymbol('&#8750;')">&#8750;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="surface integral" type="button" onclick="insertSymbol('&#8751;')">&#8751;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="volume integral" type="button" onclick="insertSymbol('&#8752;')">&#8752;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="clockwise integral" type="button" onclick="insertSymbol('&#8753;')">&#8753;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="clockwise contour integral" type="button" onclick="insertSymbol('&#8754;')">&#8754;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="anticlockwise contour integral" type="button" onclick="insertSymbol('&#8755;')">&#8755;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="product" type="button" onclick="insertSymbol('&#8719;')">&#8719;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="coproduct" type="button" onclick="insertSymbol('&#8720;')">&#8720;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="circled dot" type="button" onclick="insertSymbol('&#8857;')">&#8857;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="circled times" type="button" onclick="insertSymbol('&#8855;')">&#8855;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="circled plus" type="button" onclick="insertSymbol('&#8853;')">&#8853;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="multiset multiplication" type="button" onclick="insertSymbol('&#8845;')">&#8845;</button>
                                                    </div><br><span>Advanced Binary Operators</span><br>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="dot plus" type="button" onclick="insertSymbol('&#8724;')">&#8724;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="dot minus" type="button" onclick="insertSymbol('&#8760;')">&#8760;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="set minus" type="button" onclick="insertSymbol('&#8726;')">&#8726;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="double intersection" type="button" onclick="insertSymbol('&#8914;')">&#8914;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="double union" type="button" onclick="insertSymbol('&#8915;')">&#8915;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="squared minus" type="button" onclick="insertSymbol('&#8863;')">&#8863;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="squared times" type="button" onclick="insertSymbol('&#8864;')">&#8864;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="squared dot" type="button" onclick="insertSymbol('&#8865;')">&#8865;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="square plus" type="button" onclick="insertSymbol('&#8862;')">&#8862;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="division times" type="button" onclick="insertSymbol('&#8903;')">&#8903;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="left normal factor semidirect product" type="button" onclick="insertSymbol('&#8905;')">&#8905;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="right normal factor semidirect product" type="button" onclick="insertSymbol('&#8906;')">&#8906;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="left semidirect product" type="button" onclick="insertSymbol('&#8907;')">&#8907;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="right semidirect product" type="button" onclick="insertSymbol('&#8908;')">&#8908;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="curly logical AND" type="button" onclick="insertSymbol('&#8911;')">&#8911;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="curly logical OR" type="button" onclick="insertSymbol('&#8910;')">&#8910;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="circled dash" type="button" onclick="insertSymbol('&#8861;')">&#8861;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="intercalate" type="button" onclick="insertSymbol('&#8890;')">&#8890;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="circled minus" type="button" onclick="insertSymbol('&#8854;')">&#8854;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="circled division slash" type="button" onclick="insertSymbol('&#8856;')">&#8856;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="circled asterisk" type="button" onclick="insertSymbol('&#8859;')">&#8859;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="circled ring" type="button" onclick="insertSymbol('&#8858;')">&#8858;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="star" type="button" onclick="insertSymbol('&#8902;')">&#8902;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="diamond" type="button" onclick="insertSymbol('&#8900;')">&#8900;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="wreath product" type="button" onclick="insertSymbol('&#8768;')">&#8768;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="increment" type="button" onclick="insertSymbol('&#8710;')">&#8710;</button>
                                                    </div><br><span>Advanced Relational Operators</span><br>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="therefore" type="button" onclick="insertSymbol('&#8756;')">&#8756;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="because" type="button" onclick="insertSymbol('&#8757;')">&#8757;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="very much less than" type="button" onclick="insertSymbol('&#8920;')">&#8920;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="very much greater than" type="button" onclick="insertSymbol('&#8921;')">&#8921;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="less than over equal" type="button" onclick="insertSymbol('&#8806;')">&#8806;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="greater than over equal" type="button" onclick="insertSymbol('&#8807;')">&#8807;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="less than or equivalent" type="button" onclick="insertSymbol('&#8818;')">&#8818;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="greater than or equivalent" type="button" onclick="insertSymbol('&#8819;')">&#8819;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="less than with dot" type="button" onclick="insertSymbol('&#8918;')">&#8918;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="greater than with dot" type="button" onclick="insertSymbol('&#8919;')">&#8919;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="less than or greater than" type="button" onclick="insertSymbol('&#8822;')">&#8822;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="greater than or less than" type="button" onclick="insertSymbol('&#8823;')">&#8823;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="less than equal or greater than" type="button" onclick="insertSymbol('&#8922;')">&#8922;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="greater than equal or less than" type="button" onclick="insertSymbol('&#8923;')">&#8923;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="geometrically equal" type="button" onclick="insertSymbol('&#8785;')">&#8785;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="approximately equal or image of" type="button" onclick="insertSymbol('&#8786;')">&#8786;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="image of or approximately equal" type="button" onclick="insertSymbol('&#8787;')">&#8787;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="reversed tilde" type="button" onclick="insertSymbol('&#8765;')">&#8765;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="almost equal or equal" type="button" onclick="insertSymbol('&#8778;')">&#8778;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="reversed tilde equals" type="button" onclick="insertSymbol('&#8909;')">&#8909;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="normal subgroup of" type="button" onclick="insertSymbol('&#8882;')">&#8882;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="contains as normal subgroup" type="button" onclick="insertSymbol('&#8883;')">&#8883;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="normal subgroup of or equal" type="button" onclick="insertSymbol('&#8884;')">&#8884;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="contains as normal subgroup or equal" type="button" onclick="insertSymbol('&#8885;')">&#8885;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="true" type="button" onclick="insertSymbol('&#8872;')">&#8872;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="double subset" type="button" onclick="insertSymbol('&#8912;')">&#8912;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="double superset" type="button" onclick="insertSymbol('&#8913;')">&#8913;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="forces" type="button" onclick="insertSymbol('&#8873;')">&#8873;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="triple vertical bar right turnstile" type="button" onclick="insertSymbol('&#8874;')">&#8874;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="ring in equal to" type="button" onclick="insertSymbol('&#8790;')">&#8790;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="ring equal to" type="button" onclick="insertSymbol('&#8791;')">&#8791;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="delta equal to" type="button" onclick="insertSymbol('&#8796;')">&#8796;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="difference between" type="button" onclick="insertSymbol('&#8783;')">&#8783;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="geometrically equivalent" type="button" onclick="insertSymbol('&#8782;')">&#8782;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="between" type="button" onclick="insertSymbol('&#8812;')">&#8812;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="pitchfork" type="button" onclick="insertSymbol('&#8916;')">&#8916;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" title="approaches the limit" type="button" onclick="insertSymbol('&#8784;')">&#8784;</button>
                                                    </div>
                                                </div>
                                                <div id="arrows" class="content arrows" style="display:none;">
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button"  type="button" onclick="insertSymbol('&#8592;')">&#8592;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button"  type="button" onclick="insertSymbol('&#8593;')">&#8593;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button"  type="button" onclick="insertSymbol('&#8594;')">&#8594;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8595;')">&#8595;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8596;')">&#8596;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8597;')">&#8597;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8656;')">&#8656;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8658;')">&#8658;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8657;')">&#8657;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8659;')">&#8659;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8660;')">&#8660;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8661;')">&#8661;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8599;')">&#8599;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8598;')">&#8598;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8600;')">&#8600;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8601;')">&#8601;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8672;')">&#8672;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8674;')">&#8674;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8612;')">&#8612;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8614;')">&#8614;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8617;')">&#8617;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8618;')">&#8618;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8636;')">&#8636;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8637;')">&#8637;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8640;')">&#8640;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8641;')">&#8641;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8639;')">&#8639;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8638;')">&#8638;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8643;')">&#8643;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8642;')">&#8642;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8651;')">&#8651;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8652;')">&#8652;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8647;')">&#8647;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8649;')">&#8649;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8648;')">&#8648;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8650;')">&#8650;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8646;')">&#8646;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8644;')">&#8644;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8619;')">&#8619;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8620;')">&#8620;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8610;')">&#8610;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8611;')">&#8611;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8624;')">&#8624;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8625;')">&#8625;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8626;')">&#8626;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8627;')">&#8627;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8666;')">&#8666;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8667;')">&#8667;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8606;')">&#8606;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button" class="adv-option-button" type="button" onclick="insertSymbol('&#8608;')">&#8608;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8630;')">&#8630;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8631;')">&#8631;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8634;')">&#8634;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8635;')">&#8635;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8621;')">&#8621;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8604;')">&#8604;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8605;')">&#8605;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8668;')">&#8668;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8669;')">&#8669;</button>
                                                    </div>
                                                </div>
                                                <div id="negatedRelations" class="content negatedRelations" style="display:none;">
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button"  type="button" onclick="insertSymbol('&#8800;')">&#8800;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button"  type="button" onclick="insertSymbol('&#8814;')">&#8814;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button"  type="button" onclick="insertSymbol('&#8815;')">&#8815;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8816;')">&#8816;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8817;')">&#8817;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8802;')">&#8802;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8769;')">&#8769;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8772;')">&#8772;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8777;')">&#8777;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8775;')">&#8775;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8808;')">&#8808;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8809;')">&#8809;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8813;')">&#8813;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8832;')">&#8832;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8833;')">&#8833;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8928;')">&#8928;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8929;')">&#8929;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8713;')">&#8713;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8716;')">&#8716;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8836;')">&#8836;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8837;')">&#8837;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8840;')">&#8840;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8841;')">&#8841;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8842;')">&#8842;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8843;')">&#8843;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8930;')">&#8930;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8931;')">&#8931;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8934;')">&#8934;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8935;')">&#8935;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8936;')">&#8936;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8937;')">&#8937;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8938;')">&#8938;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8939;')">&#8939;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8940;')">&#8940;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8941;')">&#8941;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8740;')">&#8740;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8742;')">&#8742;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8876;')">&#8876;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8877;')">&#8877;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8878;')">&#8878;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8879;')">&#8879;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8708;')">&#8708;</button>
                                                    </div>
                                                </div>
                                                <div id="geometry" class="content geometry" style="display:none;">
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button"  type="button" onclick="insertSymbol('&#8735;')">&#8735;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button"  type="button" onclick="insertSymbol('&#8736;')">&#8736;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button"  type="button" onclick="insertSymbol('&#8737;')">&#8737;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8738;')">&#8738;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8894;')">&#8894;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8895;')">&#8895;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8917;')">&#8917;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8869;')">&#8869;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8740;')">&#8740;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8741;')">&#8741;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8742;')">&#8742;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8758;')">&#8758;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8759;')">&#8759;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8756;')">&#8756;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8757;')">&#8757;</button>
                                                    </div>
                                                    <div class="input-wrapper math-element">
                                                        <button class="adv-option-button" type="button" onclick="insertSymbol('&#8718;')">&#8718;</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="text-input" contenteditable="true" title="Enter text..." class="editor"><?php echo $data["content"]; ?></div>
                                            <textarea id="result" style="display:none;" name="content"></textarea>
                                            <span class="error"><?php echo $data['content_err']; ?></span>
                                        </div>
                                    </div>
                                    <!-- End of editor -->
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
                                        <button style="float:right" class="read-more attend submit" type="submit" name="create" id="convertBtn">Add Question</button>
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