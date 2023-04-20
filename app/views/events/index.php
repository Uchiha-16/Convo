<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
<?php if (($_SESSION['role'])=='seeker') : ?><?php elseif (($_SESSION['role'])=='expert') : ?>.nav {
    grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
}

<?php endif;
?>
</style>

<script type="text/javascript">
function confirmation() {
    if (confirm("Are you sure you want to discard this blog?")) {
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
    <?php elseif (($_SESSION['role']) == 'admin') : ?>
    <?php require APPROOT . '/views/inc/components/Anavbar.php'; ?>
    <?php endif; ?>

    <!-- body content -->
    <div class="alert success">
        <?php flash('reg_flash'); ?>
    </div>
    <div class="container-div">
        <div class="content-body">
            <div class="LHS">
                <h3>Events</h3><br>

                <!-- Events -->
                <?php foreach ($data['events'] as $event) : ?>
                    <div class="question-div" style="margin-bottom: 3rem;">
                        <div class="info">
                            <div>
                                <p>TOPIC</p>
                                <h3><?php echo $event->title ?></h3>
                                <span><?php echo $event->content ?></span>
                            </div>
                            <div class="tags">
                                <label>Category</label><br>
                                <?php print_r($data['tags']); ?>
                                <?php $tagArray = explode(",", $tags->tags); ?>
                                <?php foreach ($tagArray as $tag) : ?>
                                    <div class="tag"><?php echo $tag ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="content-display">
                            <div class="flex">
                                <button class="read-more webinar">Webinar</button>
                                <button class="read-more webinar time"><?php echo $event->time ?></button>
                            </div><br>
                            <p>Resource person</p>
                            <div class="flex">
                                <div class="qdp">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/user.jpg" />
                                    </div>
                                    <div class="qdp-1" style="margin-left: 1rem;">
                                        <label>Dilky Liyanage</label><br>
                                        <label class="qdp-1-2">Lecturer, Faculty of Medicine, University of Colombo</label>
                                    </div>
                                </div>
                            </div>
                            <button style="float:right" class="read-more attend">ATTEND</button>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="RHS">

                <?php if(isset($_SESSION['userID'])) : ?>
                    <?php if($_SESSION['role'] == 'seeker/mod' or $_SESSION['role'] == 'premium/mod') : ?>
                        <form action="<?php echo URLROOT; ?>/events/add"><button type="submit" style="float:right"
                                class="read-more attend">Create Event</button></form>
                        <form action="<?php echo URLROOT; ?>/events/pendingEvents"><button type="submit" style="float:right"
                                class="read-more attend">Pending Events</button></form>
                        <br><br>
                    <?php endif; ?>
                    <?php if($_SESSION['role'] == 'expert') : ?>
                        <form action="<?php echo URLROOT; ?>/events/eventRequests"><button type="submit" style="float:right"
                                class="read-more attend">Event Requests</button></form>
                        <form action="<?php echo URLROOT; ?>/events/myEvents"><button type="submit" style="float:right"
                                class="read-more attend">My Events</button></form>
                        <br><br>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="filter-div">
                    <div style="display:flex">
                        <img src="<?php echo URLROOT; ?>/img/filter.png">
                        <label>Filters</label><button class="read-more go">Go</button>
                    </div>
                    <div>
                        <form action="" method="POST">

                            <!-- Filter 1 -->
                            <div class="checkbox-1">
                                <span class="checkbox-title" onclick="filter1()">Category <i class="arrow up"
                                        id="up"></i><i class="arrow down" id="down"></i></span>
                                <ul id="checkbox-1">
                                    <li>
                                        <label for="checkbox1">
                                            <input type="checkbox" value="agricultureScience" name="tag[]"
                                                id="checkbox1" />Agriculture Science
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox2">
                                            <input type="checkbox" value="anthropology" name="tag[]"
                                                id="checkbox2" />Anthropology
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox3">
                                            <input type="checkbox" value="biology" name="tag[]" id="checkbox3" />Biology
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox4">
                                            <input type="checkbox" value="Chemistry" name="tag[]"
                                                id="checkbox4" />Chemistry
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox5">
                                            <input type="checkbox" value="CS" name="tag[]" id="checkbox5" />Computer
                                            Science
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox6">
                                            <input type="checkbox" value="design" name="tag[]" id="checkbox6" />Design
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox7">
                                            <input type="checkbox" value="economics" name="tag[]"
                                                id="checkbox7" />Economics
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox8">
                                            <input type="checkbox" value="education" name="tag[]"
                                                id="checkbox8" />Education
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox9">
                                            <input type="checkbox" value="engineering" name="tag[]"
                                                id="checkbox9" />Engineering
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox10">
                                            <input type="checkbox" value="EA" name="tag[]"
                                                id="checkbox10" />Entertaintment &amp; Arts
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox11">
                                            <input type="checkbox" value="geoscience" name="tag[]"
                                                id="checkbox11" />Geoscience
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox12">
                                            <input type="checkbox" value="history" name="tag[]"
                                                id="checkbox12" />History
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox13">
                                            <input type="checkbox" value="law" name="tag[]" id="checkbox13" />Law
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox14">
                                            <input type="checkbox" value="linguistics" name="tag[]"
                                                id="checkbox14" />Linguistics
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox15">
                                            <input type="checkbox" value="literature" name="tag[]"
                                                id="checkbox15" />literature
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox16">
                                            <input type="checkbox" value="mathematics" name="tag[]"
                                                id="checkbox16" />Mathematics
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox17">
                                            <input type="checkbox" value="Medicine" name="tag[]"
                                                id="checkbox17" />Medicine
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox18">
                                            <input type="checkbox" value="linguistics" name="tag[]"
                                                id="checkbox18" />Linguistics
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox19">
                                            <input type="checkbox" value="philosophy" name="tag[]"
                                                id="checkbox19" />Philosophy
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox20" for="checkbox1">
                                            <input type="checkbox" value="physics" name="tag[]"
                                                id="checkbox20" />Physics
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox21">
                                            <input type="checkbox" value="PS" name="tag[]" id="checkbox21" />Political
                                            Science
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox22">
                                            <input type="checkbox" value="psychology" name="tag[]"
                                                id="checkbox22" />Psychology
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox23">
                                            <input type="checkbox" value="RS" name="tag[]" id="checkbox23" />Religious
                                            Studies
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox24">
                                            <input type="checkbox" value="socialScience" name="tag[]"
                                                id="checkbox24" />Social Science
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox25">
                                            <input type="checkbox" value="spaceScience" name="tag[]"
                                                id="checkbox25" />Space Science
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            <!-- Filter 2 -->
                            <div class="checkbox-1">
                                <span class="checkbox-title" onclick="filter2()">Publish date <i class="arrow up"
                                        id="up2" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down2"
                                        style="margin-left: 4.3rem;"></i></span>
                                <ul id="checkbox-2">
                                    <li>
                                        <label for="checkbox1">
                                            <input type="checkbox" value="last 3 months" name="publishDate[]"
                                                id="checkbox1" checked />All
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox2">
                                            <input type="checkbox" value="last 6 months" name="publishDate[]"
                                                id="checkbox2" />Upcoming
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox3">
                                            <input type="checkbox" value="last year" name="publishDate[]"
                                                id="checkbox3" />Past
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
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

    <script>
    //Get the button:
    mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function drop() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function drop2() {
        document.getElementById("myDropdown2").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
            var myDropdown = document.getElementById("myDropdown");
            var myDropdown2 = document.getElementById("myDropdown2");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
            if (myDropdown2.classList.contains('show')) {
                myDropdown2.classList.remove('show');
            }
        }
    }

    function filter1() {
        var x = document.getElementById('checkbox-1');
        if (x.style.display === "none") {
            x.style.display = "block";
            document.getElementById('down').style.display = "none";
            document.getElementById('up').style.display = "inline-block";
        } else {
            x.style.display = "none";
            document.getElementById('up').style.display = "none";
            document.getElementById('down').style.display = "inline-block";
        }
    }

    function filter2() {
        var x = document.getElementById('checkbox-2');
        if (x.style.display === "none") {
            x.style.display = "block";
            document.getElementById('down2').style.display = "none";
            document.getElementById('up2').style.display = "inline-block";
        } else {
            x.style.display = "none";
            document.getElementById('up2').style.display = "none";
            document.getElementById('down2').style.display = "inline-block";
        }
    }

    function filter3() {
        var x = document.getElementById('checkbox-3');
        if (x.style.display === "none") {
            x.style.display = "block";
            document.getElementById('down3').style.display = "none";
            document.getElementById('up3').style.display = "inline-block";
        } else {
            x.style.display = "none";
            document.getElementById('up3').style.display = "none";
            document.getElementById('down3').style.display = "inline-block";
        }
    }
    </script>

</body>

</html>