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
<<<<<<< HEAD
                            <label class="qdp-1-2">BSc. Computer Science</label>
=======
                            <label class="qdp-1-2"><?php echo $data['profile']->uname ?></label>
>>>>>>> main
                            <form action="<?php echo URLROOT; ?>/profiles/expertedit"><button class="read-more">Edit</button></form>
                            <table>
                                <tr>
                                    <td>Question Contribution</td>
<<<<<<< HEAD
                                    <td class="align-right"><b>10</b></td>
                                </tr>
                                <tr>
                                    <td>Discussions</td>
                                    <td class="align-right"><b>5</b></td>
                                </tr>
                                <tr>
                                    <td>Events Participated</td>
=======
                                    <td class="align-right"><b><?php echo(count($data['question']));?></b></td>
                                </tr>
                                <tr>
                                    <td>Discussions</td>
                                    <td class="align-right"><b><?php echo $data['chatgroups']->chatgroups;?></b></td>
                                </tr>
                                <tr>
                                    <td>Projects Contribution</td>
>>>>>>> main
                                    <td class="align-right"><b>5</b></td>
                                </tr>
                                <tr>
                                    <td><b>Remaining Skill Tests</b></td>
<<<<<<< HEAD
                                    <td class="align-right"><b>5</b></td>
                                </tr>
                                <tr>
                                    <td><b>User Role</b></td>
                                    <td class="align-right"><b>Free</b></td>
=======
                                    <?php if($_SESSION['role'] != 'premium') : ?>
                                    <td class="align-right"><b><?php echo 20-count($data['skilltest']);?></b></td>
                                    <?php else : ?>
                                    <td class="align-right"><b>Unlimited</b></td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <td><b>User Role</b></td>
                                    <td class="align-right"><b><?php echo ucfirst($data['profile']->role) ?></b></td>
>>>>>>> main
                                </tr>
                            </table>
                        </div>
                    </div>
<<<<<<< HEAD
=======
                   
                
>>>>>>> main
                    <div class="col2">
                        <div class="score-board">
                            <div class="pie">
                                <p><b>Skill Test Scoreboard</b></p>
                                <div class="outer">
                                    <div class="inner circular-progress">
                                        <h2 id="number" class="progress-value">
<<<<<<< HEAD
                                            60%
=======
                                            <?php echo round($data['avgscore']);?>%
>>>>>>> main
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
<<<<<<< HEAD
                                    <tr>
                                        <td>Chemistry</td>
                                        <td>10/20</td>
                                        <td>50%</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>Neurology</td>
                                        <td>12/20</td>
                                        <td>60%</td>
                                        <td>B</td>
                                    </tr>
                                    <tr>
                                        <td>Physics</td>
                                        <td>15/20</td>
                                        <td>75%</td>
                                        <td>A</td>
                                    </tr>
=======
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
                        
>>>>>>> main
                                </table>
                        </div>
                        <div class="score-board board-2">
                            <p><b>Your Questions</b></p>
<<<<<<< HEAD
                            <div class="col-2-Q">
                                <p>Can anyone tell me the syntax in Mathematica or MATLAB for finding the Lyapunov exponents for five-dimensional and six-dimensional systems?</p>
                                <button class="read-more webinar">View</button>
                                <button class="read-more webinar time">3 Answers</button>
                                <label class="qdp-1-2">21 July 2022</label>
                            </div>
                            <div class="col-2-Q">
                                <p>Can Someone Explain me the Merge Sort?</p>
                                <button class="read-more webinar">View</button>
                                <button class="read-more webinar time">10 Answers</button>
                                <label class="qdp-1-2">9 October 2022</label>
                            </div>
                        </div>
                    </div>
                </div>
=======
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
>>>>>>> main
                <div class="RHS">
                    <!-- calendar -->
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
                    <div class="col-3 score-board board-2">
                        <p><b>Upcoming Events</b></p>
                        <!-- event 1 -->
                        <div class="event">
                            <div class="info">
                                <div class="calander">
                                    <div class="cal1">
                                        <label>Jan</label>
                                    </div>
                                    <div class="cal2">
                                        <label>12</label>
                                    </div>
                                </div>
                                <span>How you should prepare for new Covid-19 Virus for upcoming months?</span>
                            </div>
                            <div class="content-display">
                                <label class="name-label">Varsha Wijethunge</label>
                                <label class="time-label">3.00PM - 4.00PM</label>
                            </div>
                            <div class="appointment">Join</div>
                        </div>
                        <!-- event 2 -->
                        <div class="event">
                            <div class="info">
                                <div class="calander">
                                    <div class="cal1">
                                        <label>OCT</label>
                                    </div>
                                    <div class="cal2">
                                        <label>22</label>
                                    </div>
                                </div>
                                <span>Photoshop Workshop</span>
                            </div>
                            <div class="content-display">
                                <label class="name-label">Induwara Pathirana</label>
                                <label class="time-label">4.00PM - 6.00PM</label>
                            </div>
                            <div class="appointment">Join</div>
                        </div>
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
