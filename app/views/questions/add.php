<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT;?>/css/event.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URLROOT;?>/css/addconsult.css" rel="stylesheet" type="text/css"/>
    </head>
<body>

<?php require APPROOT . '/views/inc/components/Snavbar.php'; ?>


                <!-- body content -->
                <div class="container-div">
            <div class="content-body">
                <div class="LHS">
                    <h3>Add New Questions</h3><br>
                    
                    <!-- Adding a picture to event -->
                    
                    <!-- Event 1 -->
                    <div class="question-div add-event">
                        <form action="<?php echo URLROOT;?>/Questions/add" method="POST">
                            <table>
                                <tr>
                                    <td colspan="3">
                                        <p class="desc">Make sure you search the question before adding a question. Enter a clear and concise question that others will easily understand.
                                        <br>Please provide any details experts may nedd to answer your question.</p>
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
                                    <td colspan="3">
                                        <h4 style="margin-bottom:.5rem">Content</h4>


                                        <section>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="first box">
                                                        <input id="font-size" type="number" value="16" min="1" max="100" onchange="f1(this)">
                                                    </div>
                                                    <div class="second box">
                                                        <button type="button" onclick="f2(this)">
                                                            <i class="fa-solid fa-bold"></i>
                                                        </button>
                                                        <button type="button" onclick="f3(this)">
                                                            <i class="fa-solid fa-italic"></i>
                                                        </button>
                                                        <button type="button" onclick="f4(this)">
                                                            <i class="fa-solid fa-underline"></i>
                                                        </button>
                                                    </div>
                                                    <div class="third box">
                                                        <button type="button" onclick="f5(this)">
                                                            <i class="fa-solid fa-align-left"></i>
                                                        </button>
                                                        <button type="button" onclick="f6(this)">
                                                            <i class="fa-solid fa-align-center"></i>
                                                        </button>
                                                        <button type="button" onclick="f7(this)">
                                                            <i class="fa-solid fa-align-right"></i>
                                                        </button>
                                                    </div>
                                                    <div class="fourth box">
                                                        <button type="button" onclick="f8(this)">aA</button>
                                                        <button type="button" onclick="f9()">
                                                            <i class="fa-solid fa-text-slash"></i>
                                                        </button>
                                                        <input type="color" onchange="f10(this)">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row row1">
                                                <div class="col col1">
                                                    <textarea id="textarea1" class="inputform" type="text" name="content" placeholder="Describe the Question...." value="<?php echo $data['content']; ?>"></textarea>
                                                    <span class="error"><?php echo $data['content_err']; ?></span>
                                                </div>
                                            </div>
                                        </section>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <h4 style="margin-bottom:.5rem">Tags <span class="star">*</span></h4>
                                        <div class="dropdown-div">
                                                <label>Please Select <b>all the Tags</b> which are Related to the Event.</label>
                                                <ul class="dropdown" id="dropdown">
                                            
                                                    <li><input type="checkbox" value="agricultureScience" name="tag[]" id="checkbox1" value="<?php echo $data['tag']; ?>"/><label for="checkbox1">Agriculture Science</label></li>
                                                    
                                                    <li><input type="checkbox" value="anthropology" name="tag[]" id="checkbox2" value="<?php echo $data['tag']; ?>"/><label for="checkbox2">Anthropology</label></li>
                                                    
                                                    <li><input type="checkbox" value="biology" name="tag[]" id="checkbox3" value="<?php echo $data['tag']; ?>"/><label for="checkbox3">Biology</label></li>
                                                    
                                                    <li><input type="checkbox" value="Chemistry" name="tag[]" id="checkbox4" value="<?php echo $data['tag']; ?>"/><label for="checkbox4">Chemistry</label></li>
                                                    
                                                    <li><input type="checkbox" value="CS" name="tag[]" id="checkbox5" value="<?php echo $data['tag']; ?>"/><label for="checkbox5">Computer Science</label></li>
                                                    
                                                    <li><input type="checkbox" value="design" name="tag[]" id="checkbox6" value="<?php echo $data['tag']; ?>"/><label for="checkbox6">Design</label></li>
                                                    
                                                    <li><input type="checkbox" value="economics" name="tag[]" id="checkbox7" value="<?php echo $data['tag']; ?>"/><label for="checkbox7">Economics</label></li>
                                                    
                                                    <li><input type="checkbox" value="education" name="tag[]" id="checkbox8" value="<?php echo $data['tag']; ?>"/><label for="checkbox8">Education</label></li>
                                                    
                                                    <li><input type="checkbox" value="engineering" name="tag[]" id="checkbox9" value="<?php echo $data['tag']; ?>"/><label for="checkbox9">Engineering</label></li>
                                                    
                                                    <li><input type="checkbox" value="EA" name="tag[]" id="checkbox10" value="<?php echo $data['tag']; ?>"/><label for="checkbox10">Entertaintment &amp; Arts</label></li>
                                                    
                                                    <li><input type="checkbox" value="geoscience" name="tag[]" id="checkbox11" value="<?php echo $data['tag']; ?>"/><label for="checkbox11">Geoscience</label></li>
                                                    
                                                    <li><input type="checkbox" value="history" name="tag[]" id="checkbox12" value="<?php echo $data['tag']; ?>"/><label for="checkbox12">History</label></li>
                                                    
                                                    <li><input type="checkbox" value="law" name="tag[]" id="checkbox13" value="<?php echo $data['tag']; ?>"/><label for="checkbox13">Law</label></li>
                                                    
                                                    <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox14" value="<?php echo $data['tag']; ?>"/><label for="checkbox14">Linguistics</label></li>
                                                    
                                                    <li><input type="checkbox" value="literature" name="tag[]" id="checkbox15" value="<?php echo $data['tag']; ?>"/><label for="checkbox15">literature</label></li>
                                                    
                                                    <li><input type="checkbox" value="mathematics" name="tag[]" id="checkbox16" value="<?php echo $data['tag']; ?>"/><label for="checkbox16">Mathematics</label></li>
                                                    
                                                    <li><input type="checkbox" value="Medicine" name="tag[]" id="checkbox17" value="<?php echo $data['tag']; ?>"/><label for="checkbox17">Medicine</label></li>
                                                    
                                                    <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox18" value="<?php echo $data['tag']; ?>"/><label for="checkbox18">Linguistics</label></li>
                                                    
                                                    <li><input type="checkbox" value="philosophy" name="tag[]" id="checkbox19" value="<?php echo $data['tag']; ?>"/><label for="checkbox19">Philosophy</label></li>
                                                    
                                                    <li><input type="checkbox" value="physics" name="tag[]" id="checkbox20" value="<?php echo $data['tag']; ?>"/><label for="checkbox20" for="checkbox1">Physics</label></li>
                                                    
                                                    <li><input type="checkbox" value="PS" name="tag[]" id="checkbox21" value="<?php echo $data['tag']; ?>"/><label for="checkbox21">Political Science</label></li>
                                                    
                                                    <li><input type="checkbox" value="psychology" name="tag[]" id="checkbox22" value="<?php echo $data['tag']; ?>"/><label for="checkbox22">Psychology</label></li>
                                                    
                                                    <li><input type="checkbox" value="RS" name="tag[]" id="checkbox23" value="<?php echo $data['tag']; ?>"/><label for="checkbox23">Religious Studies</label></li>
                                                    
                                                    <li><input type="checkbox" value="socialScience" name="tag[]" id="checkbox24" value="<?php echo $data['tag']; ?>"/><label for="checkbox24">Social Science</label></li>
                                                    
                                                    <li><input type="checkbox" value="spaceScience" name="tag[]" id="checkbox25" value="<?php echo $data['tag']; ?>"/><label for="checkbox25">Space Science</label></li>
                                                </ul>
<!--
                                                <div class="select">
                                                    <label>All tags selected?</label>
                                                    <button style="float:right" class="read-more submit" type="submit" name="tagcomplete">Yes, I'm good.</button>
                                                    <button style="float:right" class="read-more submit" type="" name="reset">No</button>
                                                </div>
-->
                                            <?php
                                                    // display experts of the relavant tags
                                            ?>
                                        </div>
                                        <span class="error"><?php echo $data['tag_err']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                <td>	</td>
                                <td> <input type="checkbox" id="anonymus" name="visibility" value="<?php echo $data['visibility']?>"></td>
                                <td><label for="anonymus">Make Anonymus</label><p class="anonymusp1">Your name will not be displayed in the Question</p></td>
                            </tr>
                                <tr>
    <!--                                <td style="padding-right:1rem; width:50%;">-->
                                    <td class="rp">

                                        <!-- filter -->
                                        <div class="checkbox-1">
                                            <span class="checkbox-title" onclick="filter3()"><h4>Resource People <span class="star">*</span>
                                            <i class="arrow up" id="up3" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down3" style="margin-left: 4.3rem;"></i></h4></span>
                                            <ul id="checkbox-3">
                                                <?php
                                                    
                                                    
                                                    // $sql = "SELECT expert.expertID as ID, user.firstName, user.lastName FROM user, expert WHERE user.userID = expert.expertID;";
                                                    // $experts = mysqli_query($conn, $sql);
                                                    // while($expertrow = mysqli_fetch_assoc($experts)){

                                                    //     $fname = $expertrow['firstName'];
                                                    //     $lname = $expertrow['lastName'];
                                                    //     echo '<li>';
                                                    //     echo '<label for="checkbox1">';
                                                    //     echo '<input type="checkbox" value="resource person" name="rp[]" id="checkbox1"/>';
                                                    //     echo $fname.' '.$lname;
                                                    //     echo '</label>';
                                                    //     echo '</li>';
                                                        
                                                    // }
                                                
                                                ?>
                                            </ul>
                                    </div>
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
                    <form action="pending.php"><button type="submit" style="float:right" class="read-more attend">My Questions</button></form>
                    <form action="myevent.php"><button type="submit" style="float:right" class="read-more attend">Home</button></form>
                </div>
            </div>
            <div>
                <footer><a href="index.php">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.</footer>
            </div>
        </div>
        
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>
            
        <div id="body"></div>
        
        <!-- <script>
            //Get the button:
            mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};

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
        </script>
        
        <script>
            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function drop() {
              document.getElementById("myDropdown").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(e) {
              if (!e.target.matches('.dropbtn')) {
              var myDropdown = document.getElementById("myDropdown");
                if (myDropdown.classList.contains('show')) {
                  myDropdown.classList.remove('show');
                }
              }
            }
        </script> -->
        <!-- <script>
            

        </script> -->
    </body>

       
</html>

<?php

//include('../Model/connection.php');
date_default_timezone_set('Asia/Colombo');
// 
// session_start();
//if(isset($_POST['submit'])){
//         $title = $_POST['title'];
//         $content = $_POST['content'];
//         $visibility = $_POST['visibility'];
//         $tag = $_POST['tag'];
//         // echo "<pre>";
//         // print_r($tag);
//         // echo "</pre>";
//         $date = date('Y-m-d H:i:s');
//         $userid = $_SESSION['userID'];
//         $expertID = $_POST['expert'];

        

//         $sql = "INSERT INTO question(title, content, date, visibility, expertID, userID) VALUES ('$title', '$content', '$date', '$visibility', '$expertID', '$userid' )";
//         $query1=mysqli_query($con,$sql);
//         $last_id=mysqli_insert_id($con);

//         for ($i=0; $i<sizeof ($tag);$i++) {
//             $sql2 = "INSERT INTO questiontag(QID, tag) VALUES ('$last_id', '$tag[$i]')";
//             $query2=mysqli_query($con,$sql2);
//         }

//         if($query1 && $query2)
//         {
//             ?>
<!-- //                 <script>
//                     addQuestion();
//                 </script> -->
           <?php
//         }
//         else
//         {
//             echo "Error: ". $sql ."<br>". mysqli_error($con);
//         }
        	
// }   
// mysqli_close($con);     

?>