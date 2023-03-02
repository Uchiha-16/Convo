<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/chat.css" rel="stylesheet" type="text/css" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    <?php if (($_SESSION['role']) == 'seeker') : ?>
    <?php elseif (($_SESSION['role']) == 'expert') : ?>
        .nav {
            grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
        }

    <?php endif; ?>
</style>


</head>

<body>
    <?php if (($_SESSION['role']) == 'seeker') : ?>
        <?php require APPROOT . '/views/inc/components/Snavbar.php'; ?>
    <?php elseif (($_SESSION['role']) == 'expert') : ?>
        <?php require APPROOT . '/views/inc/components/Enavbar.php'; ?>
    <?php endif; ?>

        
        <!-- body content -->
        <div class="container-div">
            <div class="content-body">
                <div class="LHS">
                    <h3></h3><br>
                    
                    <!-- Question 1 -->
                    <div class="question-div">
                        <div class="info">
                            <p>Chats</p>
                            <input type="search" name="search" placeholder="Search chat..."/>
                            <br><br>
                            <div class="chat group-1 selected">
                                Team A
                            </div>
                            <div class="chat group-2">
                                Team XYZ
                            </div>
                            <div class="chat group-3">
                                Team ABC
                            </div>
                            <div class="chat group-4">
                                Team 00
                            </div>
                        </div>
                        <div class="content-display">
                            <div>
                                <div class="qdp dlg-box">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/induwara_pathirana.jpg"/>
                                    </div>
                                    <div class="message">
                                        <p>Did China’s balloon violate international law?</p>
                                        <label class="qdp-1-2">8:57 AM</label>
                                    </div>
                                </div>
                                <div class="qdp dlg-box">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/pfp.jpg"/>
                                    </div>
                                    <div class="message">
                                        <p>Was the balloon that suddenly appeared over the US last week undertaking surveillance? Or was it engaging in research, as China has claimed?</p>
                                        <label class="qdp-1-2">8:58 AM</label>
                                    </div>
                                </div>
                                <div class="qdp dlg-box">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/10.jpg"/>
                                    </div>
                                    <div class="message">
                                        <p>However, while balloons may no longer be valued for their war-fighting ability, they retain a unique capacity to undertake surveillance because they fly at higher altitudes than aircraft, can remain stationary over sensitive sites, are harder to detect on radar, and can be camouflaged as civilian weather craft.</p>
                                        <label class="qdp-1-2">9:00 AM</label>
                                    </div>
                                </div>
                                <div class="qdp dlg-box">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/9.png"/>
                                    </div>
                                    <div class="message answer">
                                        <p>International law does not extend to the distance at which satellites operate, which is traditionally seen as falling within the realm of space law.</p>
                                        <label class="qdp-1-2">9:01 AM</label>
                                    </div>
                                </div>
                            </div>
                            <div class="send">
                                <input type="search" name="search" placeholder="Type Something..."/>
                                <img src="<?php echo URLROOT; ?>/img/submit.png" class="submit">
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="RHS">
                    <div class="filter-div">
                        <div>
                            <form action="" method="POST">
                                <div class="info">
                            <p>Members</p>
                            <input type="search" name="search" placeholder="Search members..."/>
                            <br><br>
                        </div>
                        <div class="qdp">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/user.jpg"/>
                                    </div>
                                    <div class="qdp-1">
                                        <label>Dilky Liyanage</label><br>
                                        <label class="qdp-1-2" style="font-size:10px">University of Colombo</label>
                                    </div>
                        </div>
                        <div class="qdp">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/user.jpg"/>
                                    </div>
                                    <div class="qdp-1">
                                        <label>Dilky Liyanage</label><br>
                                        <label class="qdp-1-2" style="font-size:10px">University of Colombo</label>
                                    </div>
                        </div>
                        <div class="qdp">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/user.jpg"/>
                                    </div>
                                    <div class="qdp-1">
                                        <label>Varsha Wijethunge</label><br>
                                        <label class="qdp-1-2" style="font-size:10px">University of Colombo</label>
                                    </div>
                        </div>
                        <div class="qdp">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/user.jpg"/>
                                    </div>
                                    <div class="qdp-1">
                                        <label>Induwara Pathirana</label><br>
                                        <label class="qdp-1-2" style="font-size:10px">University of Colombo</label>
                                    </div>
                        </div>
                        <div class="qdp">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/user.jpg"/>
                                    </div>
                                    <div class="qdp-1">
                                        <label>Nethmini Abeykoon</label><br>
                                        <label class="qdp-1-2" style="font-size:10px">University of Colombo</label>
                                    </div>
                        </div>
                        <div class="qdp">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/user.jpg"/>
                                    </div>
                                    <div class="qdp-1">
                                        <label>Samindu Cooray</label><br>
                                        <label class="qdp-1-2" style="font-size:10px">University of Colombo</label>
                                    </div>
                        </div>
                        <div class="qdp">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/user.jpg"/>
                                    </div>
                                    <div class="qdp-1">
                                        <label>Nadeesha Nethmini</label><br>
                                        <label class="qdp-1-2" style="font-size:10px">University of Colombo</label>
                                    </div>
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
            
        <div id="body"></div>
        
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
