<?php require APPROOT . '/views/inc/header.php'; ?>

<link href="<?php echo URLROOT; ?>/css/consultpage.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URLROOT; ?>/css/profile.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URLROOT; ?>/css/calendar.css" rel="stylesheet" type="text/css"/>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    <?php if (($_SESSION['role']) == 'seeker') : ?>
    <?php elseif (($_SESSION['role']) == 'expert') : ?>
      .nav {
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
                    <?php elseif (($_SESSION['role']) == 'admin') : ?>
                        <?php require APPROOT . '/views/inc/components/Anavbar.php'; ?>
                    <?php endif; ?>

        <!-- body content -->
        <div class="container-div">
            <div class="content-body">
                <div class="LHS">
                    <div class="col1">
                        <div>
                            
                            <img src="<?php echo URLROOT; ?>/img/pfp/<?php echo $data['profile']->pfp ?>" />
                            <h4><?php echo $data['profile']->userName ?></h4>
                            <label class="qdp-1-2"><?php echo $data['profile']->uname ?></label>
                            <form action="<?php echo URLROOT; ?>/profiles/expertedit"><button class="read-more">Edit</button></form>
                            <table>
                                <tr>
                                    <td>Question Contribution</td>
                                    <td class="align-right"><b><?php echo(count($data['question']));?></b></td>
                                </tr>
                                <tr>
                                    <td>Discussions</td>
                                    <td class="align-right"><b><?php echo $data['chatgroups']->chatgroups;?></b></td>
                                </tr>
                                <tr>
                                    <td>Projects Contribution</td>
                                    <td class="align-right"><b>5</b></td>
                                </tr>
                                <tr>
                                    <td><b>Remaining Skill Tests</b></td>
                                    <?php if($_SESSION['role'] != 'premium') : ?>
                                    <td class="align-right"><b><?php echo 20-count($data['skilltest']);?></b></td>
                                    <?php else : ?>
                                    <td class="align-right"><b>Unlimited</b></td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <td><b>User Role</b></td>
                                    <td class="align-right"><b><?php echo ucfirst($data['profile']->role) ?></b></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                   
                
                    <div class="col2">
                        <div class="score-board">
                            <div class="pie">
                                <p><b>Skill Test Scoreboard</b></p>
                                <div class="outer">
                                    <div class="inner circular-progress">
                                        <h2 id="number" class="progress-value">
                                        <?php if($data['avgscore'] == 0):?>
                                            <?php echo "Non";?>
                                            <?php else : ?>
                                            <?php echo round($data['avgscore']);?>%
                                            <?php endif; ?>
                                           
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <table>
                                    <tr class="heading">
                                        <th>Field</th>
                                        <th>Correct Answers</th>
                                        <th>Score</th>
                                        <th>Grade</th>
                                    </tr>
                                    <tr>
                                            <?php if($data['avgscore'] == 0):?>
                                            <?php echo "No Skill Tests Done";?>
                                            <?php endif; ?>
                                    </tr>
                                    <?php foreach($data['skilltest'] as $skilltest) : ?>
                                    <tr>
                                        <td><?php echo $skilltest->field;?></td>
                                        <td><?php echo (($skilltest->score)*(20/100));?>/20</td>
                                        <td><?php echo $skilltest->score;?>%</td>
                                        <?php if($skilltest->score >= 80) : ?>
                                            <td>A</td>
                                        <?php elseif($skilltest->score >= 60) : ?>
                                            <td>B</td>
                                        <?php elseif($skilltest->score >= 40) : ?>
                                        <td>C</td>
                                        <?php else : ?>
                                            <td>F</td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; ?>
                        
                                </table>
                        </div>
                        <div class="score-board board-2">
                            <p><b>Your Questions</b></p>
                            <?php foreach($data['question'] as $question) : ?>
                            <div class="col-2-Q">
                                <p><?php echo $question->title;?></p>
                                <form action="<?php echo URLROOT; ?>/Answers/viewA/<?php echo $question->QID;?>" method="POST"><button class="read-more webinar">View</button></form>
                                <button class="read-more webinar time"><?php echo $question->answercount;?> Answers</button>
                                <label class="qdp-1-2"><?php echo $question->date;?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <script>
                        const myDiv = document.querySelector(".inner");
                        const myDeg = document.querySelector(".progress-value").innerHTML;
                        // alert(myDeg);

                        myDiv.style.background = `conic-gradient(#15637C ${myDeg}deg, white 0deg)`;
                </script>
                <div class="RHS">
                    <!-- calendar -->
                    <?php $date_array = $data['consultdates']; ?>
                    <?php $consultdates = json_encode($date_array); ?>
                    <div class="wrapper">
                        <header>
                            <p class="current-date"></p>
                        </header>
                        <div class="calendar">
                            <ul class="weeks">
                                <li>Sun</li>
                                <li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                            </ul>
                            <ul class="days"></ul>
                        </div>
                    </div>
                    <?php echo "<script>var CONSULTDATES = " . $consultdates . ";</script>"; ?>
                    <script src="<?php echo URLROOT; ?>/js/script.js"></script>
                    <script>
    $(document).ready(function() {
        // Select all lis with class "active" or "reserve"
        const activeAndreserve = document.querySelectorAll('.active, .reserve');

        // Loop through the selected lis and add the onmouseover and onmouseleave attributes
        activeAndreserve.forEach(li => {
            li.setAttribute('onmouseover', 'getValue(this)');
            li.setAttribute('onmouseleave', 'hideBox()');
        });
    });

    function getValue(li) {
        // Get the value of the li
        let Datevalue  = li.textContent;
        $.ajax({
            url: "<?php echo URLROOT;?>/Profiles/hoverdate",
            method: "POST",
            data: {Datevalue : Datevalue },
            success: function(response) {
                $('.hover-box').html(response);
                $('.hover-box').show(); // show the hover box on mouseover
            },
            error: function(xhr, status, error) {
                alert(error); // handle any errors that occur
            }
        });
    }

    function hideBox() {
        $('.hover-box').hide(); // hide the hover box on mouseleave
    }
</script>


                   
                           <div class="hover-box">
                                    
                            </div>
                    <!-- end of calendar -->
                    <div class="col-3 score-board board-2">
                        <p><b>Upcoming Events</b></p>
                        <!-- event 1 -->
                        <?php foreach($data['events'] as $event) : ?>
                            <div class="event">
                                <div class="info">
                                    <?php 
                                        $dateString = $event->date;
                                        $dateTime = new DateTime($dateString);

                                        $year = $dateTime->format('Y');
                                        $month = $dateTime->format('M');
                                        $day = $dateTime->format('d');
                                    ?>
                                    <div class="calander">
                                        <div class="cal1">
                                            <label><?php echo $month ?></label>
                                        </div>
                                        <div class="cal2">
                                            <label><?php echo $day?></label>
                                        </div>
                                    </div>
                                    <span><?php echo $event->title ?></span>
                                </div>
                                <div class="content-display">
                                    <?php foreach($data['resourcePerson'] as $rp) :
                                        if($rp->EID == $event->EID): ?>
                                            <label class="name-label"><?php echo $rp->name; ?></label>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                            <label class="time-label"><?php echo date("h:i A", strtotime($event->time)) ?></label>
                                </div>
                                <div class="appointment" onclick="window.location.href=<?php echo $event->zoomlink ?>;">Join</div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div>
                <footer><a href="<?php echo URLROOT; ?>/Pages/about">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.</footer>
            </div>
        </div>

        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>

        <div id="body"></div>
        <script src="../scripts/pie.js"></script>
        <script>
            //Get the button:
            mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
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
        </script>

        <script>
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

            function filter1(){
                var x = document.getElementById('checkbox-1');
                if(x.style.display === "none"){
                    x.style.display = "block";
                    document.getElementById('down').style.display = "none";
                    document.getElementById('up').style.display = "inline-block";
                }else{
                    x.style.display = "none";
                    document.getElementById('up').style.display = "none";
                    document.getElementById('down').style.display = "inline-block";
                }
            }
            function filter2(){
                var x = document.getElementById('checkbox-2');
                if(x.style.display === "none"){
                    x.style.display = "block";
                    document.getElementById('down2').style.display = "none";
                    document.getElementById('up2').style.display = "inline-block";
                }else{
                    x.style.display = "none";
                    document.getElementById('up2').style.display = "none";
                    document.getElementById('down2').style.display = "inline-block";
                }
            }
            function filter3(){
                var x = document.getElementById('checkbox-3');
                if(x.style.display === "none"){
                    x.style.display = "block";
                    document.getElementById('down3').style.display = "none";
                    document.getElementById('up3').style.display = "inline-block";
                }else{
                    x.style.display = "none";
                    document.getElementById('up3').style.display = "none";
                    document.getElementById('down3').style.display = "inline-block";
                }
            }
        </script>

    </body>
</html>
