            <?php require APPROOT . '/views/inc/header.php'; ?>
            <link href="../stylesheets/event.css" rel="stylesheet" type="text/css"/>
            <link href="../stylesheets/webinar.css" rel="stylesheet" type="text/css"/>

            <style>
                .nav{
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
                    <div class="video" onclick="view()">
                        <div>
                            <img src="../images/test1.png" class="thumbnail">
                        </div>
                        <div>
                            <div class="qdp">
                                <div>
                                    <img src="../images/user.jpg"/>
                                </div>
                                <div class="video-content">
                                    <p class="text">What about the standard model incompatible with general relativity, and how does string theory fix it?</p>
                                    <label class="qdp-1-2">21 July 2022</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video">
                        <div>
                            <img src="../images/test2.jpg" class="thumbnail">
                        </div>
                        <div>
                            <div class="qdp">
                                <div>
                                    <img src="../images/user.jpg"/>
                                </div>
                                <div class="video-content">
                                    <p class="text">How you should prepare for new Covid-19 Virus for upcoming months?</p>
                                    <label class="qdp-1-2">21 July 2022</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video">
                        <div>
                            <img src="../images/test3.png" class="thumbnail">
                        </div>
                        <div>
                            <div class="qdp">
                                <div>
                                    <img src="../images/user.jpg"/>
                                </div>
                                <div class="video-content">
                                    <p class="text">Differences between C and Python</p>
                                    <label class="qdp-1-2">21 July 2022</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video">
                        <div>
                            <img src="../images/test4.png" class="thumbnail">
                        </div>
                        <div>
                            <div class="qdp">
                                <div>
                                    <img src="../images/user.jpg"/>
                                </div>
                                <div class="video-content">
                                    <p class="text">What are Data Structures?</p>
                                    <label class="qdp-1-2">21 July 2022</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video">
                        <div>
                            <img src="../images/test5.jpg" class="thumbnail">
                        </div>
                        <div>
                            <div class="qdp">
                                <div>
                                    <img src="../images/user.jpg"/>
                                </div>
                                <div class="video-content">
                                    <p class="text">INSL Volunteer Training Program</p>
                                    <label class="qdp-1-2">21 July 2022</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video">
                        <div>
                            <img src="../images/test6.jpg" class="thumbnail">
                        </div>
                        <div>
                            <div class="qdp">
                                <div>
                                    <img src="../images/user.jpg"/>
                                </div>
                                <div class="video-content">
                                    <p class="text">What is the big problem or question that this new academic discipline that you keep talking about would address?</p>
                                    <label class="qdp-1-2">21 July 2022</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video">
                        <div>
                            <img src="../images/test7.png" class="thumbnail">
                        </div>
                        <div>
                            <div class="qdp">
                                <div>
                                    <img src="../images/user.jpg"/>
                                </div>
                                <div class="video-content">
                                    <p class="text">What will be your major focus as an independent researcher?</p>
                                    <label class="qdp-1-2">21 July 2022</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video">
                        <div>
                            <img src="../images/test8.jpg" class="thumbnail">
                        </div>
                        <div>
                            <div class="qdp">
                                <div>
                                    <img src="../images/user.jpg"/>
                                </div>
                                <div class="video-content">
                                    <p class="text">Is it a bad idea to take an elective class pass/fail to boost my GPA?</p>
                                    <label class="qdp-1-2">21 July 2022</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video">
                        <div>
                            <img src="../images/test9.jpg" class="thumbnail">
                        </div>
                        <div>
                            <div class="qdp">
                                <div>
                                    <img src="../images/user.jpg"/>
                                </div>
                                <div class="video-content">
                                    <p class="text">What kind of education should one follow to be like Tony Stark?</p>
                                    <label class="qdp-1-2">21 July 2022</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="RHS">
                    <form action="addWebinar.php"><button type="submit" style="float:right" class="read-more attend">Create</button></form>
                    <form action="webinarStat.php"><button type="submit" style="float:right" class="read-more attend">My Videos</button></form>
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
                                    <span class="checkbox-title" onclick="filter3()">Expert <i class="arrow up" id="up3" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down3" style="margin-left: 6.66rem;"></i></span>
                                    <ul id="checkbox-3">
                                        <li>
                                            <label for="checkbox1">
                                                <input type="checkbox" value="last 3 months" name="publishDate[]" id="checkbox1"/>Varsha Wijethunge
                                            </label>
                                        </li>     
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="last 6 months" name="publishDate[]" id="checkbox2"/>Induwara Pathirana
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="last year" name="publishDate[]" id="checkbox3"/>John Silva
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                
                                <!-- Filter 4 -->
                                <div class="checkbox-1">
                                    <span class="checkbox-title" onclick="filter4()">Playlist <i class="arrow up" id="up4" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down4" style="margin-left: 6.5rem;"></i></span>
                                    <ul id="checkbox-4">
                                        
                                    </ul>
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
        
        <!-- View -->
        <div class="video-view" id="1">
            <img src="../images/cancel.png" class="cancel" onclick="cancel()">
            <iframe width="550" height="325" src="https://www.youtube.com/embed/Nxtv1LfdSBk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <h3>What is the big problem or question that this new academic discipline that you keep talking about would address?</h3>
            <div style="display:flex;">
                <label class="qdp-1-2">21 July 2022</label>
                <span class="qdp-1-2 qdp-1-3">By Varsha Wijethunge</span>
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
</html>
