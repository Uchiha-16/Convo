<?php require APPROOT . '/views/inc/header.php'; ?>
        <link href="<?php echo URLROOT; ?>/css/style1.css" rel="stylesheet" type="text/css"/>
        <link rel='stylesheet' type='text/css' media='screen' href="<?php echo URLROOT; ?>/css/expert-home.css">
        <link rel='stylesheet' type='text/css' media='screen' href="<?php echo URLROOT; ?>/css/project-home.css">
        <style>
            .nav{
                grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
            }
            /* .icon-1{
                width: 50px;
                height: 50px;
                align-items: center;
                border: 1px solid #bdbdbd;
                border-radius: 50%;
                border-color: #000000 1px solid;
                margin-right: 10px;
            }
            .name-field{
                margin: 0;
                padding: 0;
            }
            .name-tag{
                margin-left: 1rem;
            }
            .tag-top{
                padding-bottom: 1rem;
                border-bottom: 1px solid rgba(128,128,128, .4);
            }
            .question {
                font-size: 18px;
            }
            .description {
                font-size: 13px;
                color: #4f4f4f;
            }
            .tag-button{
                line-height: 22px;
                padding: 0 22px 0 22px;
                width: auto;
                margin-right: 1rem;
            }
            .tag-field {
                font-size: 10px;
                margin-top: 20px;
                margin-bottom: 20px;
                color: #6B6B6B;
            }
            .tag-field button{
                color: #6B6B6B;
            }
            .tag-detail{
                display: inline;
            } */
        </style>
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

<div class="container-div">
            <div class="content-body">
                <div class="LHS">
                    <br><br>
                    <div class="home-item1-1">
                        <h3 class="home-head">Connecting People with a Passion for doing...</h3>
                    </div>

                    <?php foreach($data['projects'] as $project) : ?> 
                        <div class="question-card">
                            <div class="tag-top">
                                    <img class="icon-1" src="<?php echo URLROOT;?>/img/pfp/<?php echo $project->pfp?>">
                                <div class="name-tag">
                                    <p class="name-field"><?php echo $project->firstName," ",$project->lastName;?></p>
                                    <label class="qdp-1-2"><?php echo $project->designation; ?></label>
                                    <!-- <p class="ins-field">University of Colombo School of Computing</p> -->
                                </div>
                                <div></div>
                            </div>
                            <div class="tag-question">
                                <h2 class="question"><?php echo $project->title;?></h2>
                            </div>
                            <div class="tag-question">
                                <p class="description"><?php echo $project->description;?></p>
                            </div>
                            
                            <div class="tag-detail">
                                <p><b>Deadline: </b><?php echo $project->deadline;?></p>
                                <p><b>Slots available: </b><?php echo $project->availableslot;?></p>
                                <p><b>Type: </b><?php echo $project->type;?></p>
                                <p><b>Availability: </b><?php echo $project->availability;?></p>
                                <p><b>Payment: </b>LKR <?php echo $project->payment;?></p>
                            </div>
                            <div class="tag-field">
                                <button class="tag-button"><?php echo $project->tag?></button>
                                
                            </div>
                            <div class="tag-bottom">
                                <label class="qdp-1-2">published on: <?php echo $project->publishedDate;?><br>Project duration: <?php echo $project->duration;?></label>
                                <a href="<?php echo URLROOT;?>/Projects/apply/<?php echo $project->PID?>"><button class="answer-btn" formaction="#">Apply Now!</button></a>  
                            </div>

                        </div>
                    <?php endforeach; ?>
            
                </div>
                <div class="RHS">
                <?php if(isset($_SESSION['userID']) && ($_SESSION['role'])=='expert') : ?>

                    <form action="<?php echo URLROOT;?>/projects/viewMyProjects"><button type="submit" style="float:right" class="read-more attend">My Project</button></form>
                    <form action="<?php echo URLROOT;?>/projects/add"><button type="submit" style="float:right" class="read-more attend">Add Project</button></form><br><br>
                <?php endif; ?>
                <form action="<?php echo URLROOT; ?>/pages/filter" method="POST">
                <div class="filter-div">
                    <div style="display:flex">
                        <img src="<?php echo URLROOT; ?>/img/filter.png">
                        <label>Filters</label><button class="read-more go" id="filter" type="submit">Go</button>
                    </div>
                    <div>

                    
                            <!-- Filter 2 -->
                            <div class="checkbox-1">
                                <span class="checkbox-title" onclick="filter2()">Published date <i class="arrow up" id="up2" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down2" style="margin-left: 4.3rem;"></i></span>
                                <ul id="checkbox-2">
                                    <li>
                                        <label for="checkbox1">
                                            <input type="checkbox" value="last 3 months" name="publishDate[]" id="checkbox1" />Last 3 months
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox2">
                                            <input type="checkbox" value="last 6 months" name="publishDate[]" id="checkbox2" />Last 6 months
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox3">
                                            <input type="checkbox" value="last year" name="publishDate[]" id="checkbox3" />Last year
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            <!-- Filter 3 -->
                            <div class="checkbox-1">
                                <span class="checkbox-title" onclick="filter3()">Questions &amp; answers <i class="arrow up" id="up3" style="margin-left: 0.7rem;"></i><i class="arrow down" id="down3" style="margin-left: 0.7rem;"></i></span>
                                <ul id="checkbox-3">
                                    <li>
                                        <label for="checkbox2">
                                            <input type="checkbox" value="Answered" name="QA[]" id="checkbox1" />Answered
                                        </label>
                                    </li>
                                    <li>
                                        <label for="checkbox3">
                                            <input type="checkbox" value="Not Answered" name="QA[]" id="checkbox2" />Not answered
                                        </label>
                                    </li>
                                </ul>
                            </div>


                            <!-- Filter 4 -->
                            <!-- <div class="checkbox-1">
                                <span class="checkbox-title" onclick="filter4()">Rating <i class="arrow up" id="up4" style="margin-left: 6.7rem;"></i><i class="arrow down" id="down4" style="margin-left: 6.7rem;"></i></span>
                                
                                    <ul id="checkbox-4">
                                        <li>
                                            <label for="checkbox1">
                                                <input type="checkbox" value="1" name="rating[]" id="checkbox1"/>1 Star
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="2" name="rating[]" id="checkbox2"/>2 Stars
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="3" name="rating[]" id="checkbox3"/>3 Stars
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="4" name="ratings[]" id="checkbox3"/>4 Stars
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="5" name="ratings[]" id="checkbox3"/>5 Stars
                                            </label>
                                        </li>
                                    </ul>

                            </div> -->

                        </form>
                    </div>
            </div>
            <div>
                <footer><a href="index.php">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.</footer>
            </div>
        </div>
        
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>
            
        <div id="body"></div>
    
    <script>
            function view(){
                document.getElementById("1").style.display = "grid";
            }
            function cancel(){
                document.getElementById("1").style.display = "none";
            }
        </script>
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


<?php require APPROOT . '/views/inc/footer.php'; ?>