<?php require APPROOT . '/views/inc/header.php'; ?>

<link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT; ?>/css/addconsult.css" rel="stylesheet" type="text/css"/>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    <?php if (($_SESSION['role']) == 'expert' || ($_SESSION['role']) == 'premium') : ?>
      .nav {
        grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
    }
    <?php endif; ?>
</style>

<script type="text/javascript">
    function confirmation(){
      if(confirm("Are you sure you want to discard this Appointment?")){
        window.location.href = "<?php echo URLROOT; ?>/Consults/index";
      }
    }

        $(function(){
            var dtToday = new Date();
        
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            
            var maxDate = year + '-' + month + '-' + day;
            //alert(maxDate);
            $('#date').attr('min', maxDate);
        });

</script>

</head>

<body>
<?php if (($_SESSION['role']) == 'expert') : ?>
        <!-- nav bar -->
<div class="nav">
            <div><a href="<?php echo URLROOT;?>/Pages/expert"><img src="<?php echo URLROOT;?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Pages/expert">Home</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Consults/index">Consult</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Webinars/home">Webinar</a></div>
            <div><input id="live_search_Consult" type="search" name="search" placeholder="Search for consultations..."/></div>
            <?php if(isset($_SESSION['userID'])) : ?>
            <div class="dropdown-list">
                <button class="dropbtn dropbtn-1" onclick="drop()"><img src="<?php echo URLROOT;?>/img/plus.png" class="icon"> Add New</button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="<?php echo URLROOT;?>/Questions/add">Question</a>
                    <a href="<?php echo URLROOT;?>/Consults/add">Consultation</a>
                    <a href="<?php echo URLROOT;?>/Blogs/add">Blog</a>
                    <a href="<?php echo URLROOT;?>/Projects/add">Project</a>
                </div>
            </div>
            <!-- notification bar -->
            <div class="notify-count">
                <span id="notificationCount"></span>
            </div>
            <div class="dropbtn dropbtn-1 notification" onclick="drop3()" id="notification">
                <img class="dropbtn" src="<?php echo URLROOT; ?>/img/notification.png" class="nav-icon" style="width: 25px;">
            </div>
                <div class="dropdown-content content3" id="myDropdown3" style="top: 5.5rem;">
                    <div class="head">
                        <h4>Notifications</h4>
                        <div class="check-box">
                            <input type="checkbox">
                        </div>
                    </div>
                    <div style="display:block" id="notificationBlock">
                        <div class="tabs">
                            <P><b>New answer added to </b><span style="color:#00a7ae;">String Theory</span> by Varsha Wijethunge</P>
                        </div>
                        <div class="tabs">
                            <P><b>Upcoming consultation </b>with <span style="color:#00a7ae;">Dilky Liyanage</span></P>
                        </div>
                        <div class="tabs">
                            <P><b>Upcoming event </b>on <span style="color:#00a7ae;">Data Structures and Algorithms</span></P>
                        </div>
                        <div class="tabs">
                            <P><b>You have been selected </b>to the <span style="color:#00a7ae;">A9 Project</span></P>
                        </div>
                    </div>
                </div>
                
                <!-- notification bar end -->
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Chats/index"><img src="<?php echo URLROOT;?>/img/chat.png" class="nav-icon"></a></div>
            <div class="dropbtn" onclick="drop2()">
                <img class="dropbtn" src="<?php echo URLROOT;?>/img/profile.png" class="nav-icon" style="width: 25px;">
                <div class="dropdown-content dropdown-content2" id="myDropdown2">
                    <a href="<?php echo URLROOT;?>/Profiles/expert">Profile</a>
                    <!-- <a href="<?php echo URLROOT;?>/Moderator/approve">Approvals</a> -->
                    <a href="<?php echo URLROOT;?>/Blogs/index">Blogs</a>
                    <a href="<?php echo URLROOT;?>/Events/index">Events</a>
                    <a href="<?php echo URLROOT;?>/Projects/index">Projects</a>
                    <a href="<?php echo URLROOT;?>/SkillTest/index">Skill Test</a>
                    <a href="<?php echo URLROOT;?>/Subscriptions/index">Subscription</a>
                    <a href="<?php echo URLROOT?>/Users/logout" style="border-bottom:none">Log-out</a>
                </div>
            </div> 

            <?php else : ?>
                <style>
                    .nav {
                         grid-template-columns: 5% 6% 6% 57% 6% 6% 8% 6%;
                    }
                </style>
            <div class="nav-hover"><a href="login.php">Login</a></div>
            <div class="nav-hover"><a href="signup.php">Register</a></div>
            <div class="nav-hover"><a href="aboutus.php">About us</a></div>
            <?php endif; ?>

        </div>
        
   
<?php elseif (($_SESSION['role']) == 'premium') : ?>
        <!-- nav bar -->
<div class="nav">
            <div><a href="<?php echo URLROOT;?>/Pages/expert"><img src="<?php echo URLROOT;?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Pages/seeker">Home</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Consults/index">Consult</a></div>
            <div class="nav-hover"><a href="<?php echo URLROOT;?>/Webinars/home">Webinar</a></div>
            <div><input id="live_search_Consult" type="search" name="search" placeholder="Search for consultations..."/></div>
            <?php if(isset($_SESSION['userID'])) : ?>
            <div class="dropdown-list">
                <button class="dropbtn dropbtn-1" onclick="drop()"><img src="<?php echo URLROOT;?>/img/plus.png" class="icon"> Add New</button>
                <div class="dropdown-content" id="myDropdown">
                    <a href="<?php echo URLROOT;?>/Questions/add">Question</a>
                    <a href="<?php echo URLROOT;?>/Blogs/add">Blog</a>
                    <a href="<?php echo URLROOT;?>/Projects/add">Project</a>
                </div>
            </div>
             <!-- notification bar -->
             <div class="notify-count">
                <span id="notificationCount"></span>
            </div>
            <div class="dropbtn dropbtn-1 notification" onclick="drop3()" id="notification">
                <img class="dropbtn" src="<?php echo URLROOT; ?>/img/notification.png" class="nav-icon" style="width: 25px;">
            </div>
                <div class="dropdown-content content3" id="myDropdown3" style="top: 5.5rem;">
                    <div class="head">
                        <h4>Notifications</h4>
                        <div class="check-box">
                            <input type="checkbox">
                        </div>
                    </div>
                    <div style="display:block" id="notificationBlock">
                        <!-- <div class="tabs">
                            <P><b>New answer added to </b><span style="color:#00a7ae;">String Theory</span> by Varsha Wijethunge</P>
                        </div>
                        <div class="tabs">
                            <P><b>Upcoming consultation </b>with <span style="color:#00a7ae;">Dilky Liyanage</span></P>
                        </div>
                        <div class="tabs">
                            <P><b>Upcoming event </b>on <span style="color:#00a7ae;">Data Structures and Algorithms</span></P>
                        </div>
                        <div class="tabs">
                            <P><b>You have been selected </b>to the <span style="color:#00a7ae;">A9 Project</span></P> -->
                        </div>
                    </div>
                </div>
                
                <!-- notification bar end -->
            <div class="nav-hover"><a href="<?php echo URLROOT; ?>/Chats/index"><img src="<?php echo URLROOT;?>/img/chat.png" class="nav-icon"></a></div>
            <div class="dropbtn" onclick="drop2()">
                <img class="dropbtn" src="<?php echo URLROOT;?>/img/profile.png" class="nav-icon" style="width: 25px;">
                <div class="dropdown-content dropdown-content2" id="myDropdown2">
                    <a href="<?php echo URLROOT;?>/Profile/View">Profile</a>
                    <!-- <a href="<?php echo URLROOT;?>/Moderator/approve">Approvals</a> -->
                    <a href="<?php echo URLROOT;?>/Blogs/index">Blogs</a>
                    <a href="<?php echo URLROOT;?>/Events/index">Events</a>
                    <a href="<?php echo URLROOT;?>/Projects/index">Projects</a>
                    <a href="<?php echo URLROOT;?>/SkillTest/index">Skill Test</a>
                    <a href="<?php echo URLROOT;?>/Subscriptions/index">Subscription</a>
                    <a href="<?php echo URLROOT?>/Users/logout" style="border-bottom:none">Log-out</a>
                </div>
            </div> 

            <?php else : ?>
                <style>
                    .nav {
                         grid-template-columns: 5% 6% 6% 57% 6% 6% 8% 6%;
                    }
                </style>
            <div class="nav-hover"><a href="login.php">Login</a></div>
            <div class="nav-hover"><a href="signup.php">Register</a></div>
            <div class="nav-hover"><a href="aboutus.php">About us</a></div>
            <?php endif; ?>

        </div><?php require APPROOT . '/views/inc/components/Pnavbar.php'; ?>
    <?php endif; ?>

        <!-- body content -->
        <div class="container-div">
            <div class="content-body">
                <div class="LHS" id="LHS">
                    <h3>Discuss your problems with the Experts</h3><br>
                    
                    <!-- Adding a picture to event -->
                    
                    <!-- Event 1 -->
                    <div class="question-div add-event">
                        <form action="<?php echo URLROOT; ?>/Consults/add" method="POST">
                            <table>
                                <tr>
                                    <td colspan="3">
                                        <h3 style="color: #19758d;">Create your Appointment</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <p class="desc">Make sure you did try searching the question before adding an appointment. Enter a clear and concise Title that<br> Experts will easily understand about your appointment. <br>
                                                Note: Experts have the full authority to accept or decline the appointment..</p>
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
                                        <h4 style="margin-bottom:.5rem">Tags <span class="star">*</span></h4>
                                        <div class="dropdown-div">

                                            <label>Please Select <b>all the Tags</b> which are Related to the Event.</label>
                                            <ul class="dropdown" id="dropdown">

                                                <li><input type="checkbox" value="agricultureScience" name="tag[]" id="checkbox1"/><label for="checkbox1">Agriculture Science</label></li>

                                                <li><input type="checkbox" value="anthropology" name="tag[]" id="checkbox2"/><label for="checkbox2">Anthropology</label></li>

                                                <li><input type="checkbox" value="biology" name="tag[]" id="checkbox3"/><label for="checkbox3">Biology</label></li>

                                                <li><input type="checkbox" value="Chemistry" name="tag[]" id="checkbox4"/><label for="checkbox4">Chemistry</label></li>

                                                <li><input type="checkbox" value="CS" name="tag[]" id="checkbox5"/><label for="checkbox5">Computer Science</label></li>

                                                <li><input type="checkbox" value="design" name="tag[]" id="checkbox6"/><label for="checkbox6">Design</label></li>

                                                <li><input type="checkbox" value="economics" name="tag[]" id="checkbox7"/><label for="checkbox7">Economics</label></li>

                                                <li><input type="checkbox" value="education" name="tag[]" id="checkbox8"/><label for="checkbox8">Education</label></li>

                                                <li><input type="checkbox" value="engineering" name="tag[]" id="checkbox9"/><label for="checkbox9">Engineering</label></li>

                                                <li><input type="checkbox" value="EA" name="tag[]" id="checkbox10"/><label for="checkbox10">Entertaintment &amp; Arts</label></li>

                                                <li><input type="checkbox" value="geoscience" name="tag[]" id="checkbox11"/><label for="checkbox11">Geoscience</label></li>

                                                <li><input type="checkbox" value="history" name="tag[]" id="checkbox12"/><label for="checkbox12">History</label></li>

                                                <li><input type="checkbox" value="law" name="tag[]" id="checkbox13"/><label for="checkbox13">Law</label></li>

                                                <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox14"/><label for="checkbox14">Linguistics</label></li>

                                                <li><input type="checkbox" value="literature" name="tag[]" id="checkbox15"/><label for="checkbox15">literature</label></li>

                                                <li><input type="checkbox" value="mathematics" name="tag[]" id="checkbox16"/><label for="checkbox16">Mathematics</label></li>

                                                <li><input type="checkbox" value="Medicine" name="tag[]" id="checkbox17"/><label for="checkbox17">Medicine</label></li>

                                                <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox18"/><label for="checkbox18">Linguistics</label></li>

                                                <li><input type="checkbox" value="philosophy" name="tag[]" id="checkbox19"/><label for="checkbox19">Philosophy</label></li>

                                                <li><input type="checkbox" value="physics" name="tag[]" id="checkbox20"/><label for="checkbox20" for="checkbox1">Physics</label></li>

                                                <li><input type="checkbox" value="PS" name="tag[]" id="checkbox21"/><label for="checkbox21">Political Science</label></li>

                                                <li><input type="checkbox" value="psychology" name="tag[]" id="checkbox22"/><label for="checkbox22">Psychology</label></li>

                                                <li><input type="checkbox" value="RS" name="tag[]" id="checkbox23"/><label for="checkbox23">Religious Studies</label></li>

                                                <li><input type="checkbox" value="socialScience" name="tag[]" id="checkbox24"/><label for="checkbox24">Social Science</label></li>

                                                <li><input type="checkbox" value="spaceScience" name="tag[]" id="checkbox25"/><label for="checkbox25">Space Science</label></li>
                                            </ul>

                                            
                                            <!-- <div class="select">
                                                <label>All tags selected?</label>
                                                <button style="float:right" class="read-more submit" type="submit" name="submit" onclick="getTags(tag[])">Yes, I'm good.</button>
                                                <button style="float:right" class="read-more submit" type="submit" name="submit">No</button>
                                            </div> -->
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
                                            url: '<?php echo URLROOT;?>/Consults/resourceName',
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
    <!--                                <td style="padding-right:1rem; width:50%;">-->
                                    <td class="rp">

                                        <!-- filter -->
                                        <div class="checkbox-1">
                                            <span class="checkbox-title" onclick="filter3()"><h4>Resource People <span class="star">*</span>
                                            <i class="arrow up" id="up3" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down3" style="margin-left: 4.3rem;"></i></h4></span>
                                            <ul id="checkbox-3">
                                                <div class="resource">Please Select One of More Tags</div>
                                            </ul>
                                            
                                    </div>
                                       <span class="error"><?php echo $data['expertID_err']; ?></span> 
                                    </td>
                                    <td class="date" style="float:none">
                                        <h4>Date <span class="star">*</span></h4>
                                        <input class="inputform"  type="date" name="date" id="date" value="<?php echo $data['date']; ?>" required>
                                        <span class="error"><?php echo $data['date_err']; ?></span>
                                    </td>
                                    <td class="time" style="float:none">
                                        <h4>Time <span class="star">*</span></h4>
                                        <input class="inputform" type="time" name="time" value="<?php echo $data['time']; ?>" required>
                                        <span class="error"><?php echo $data['time_err']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <br><br>
                                        <div class="add">
                                            <button style="float:right" class="read-more attend submit" type="reset" onclick=confirmation() >Reset</button>
                                            <button style="float:right" class="read-more attend submit" type="submit" name="create">Add Appointment</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    
                </div>
                <div class="RHS">
                    <form action="<?php echo URLROOT; ?>/Consults/requests"><button title="Waiting for approval" type="submit" style="float:right; width: 250px;" class="read-more attend">Schedules</button></form>
                    <form action="<?php echo URLROOT;?>/Consults/index"><button title="Approved Appointments" type="submit" style="float:right; width: 250px;" class="read-more attend">Upcomings</button></form>
                    <?php if($_SESSION['role'] == 'expert'): ?>
                    <form action="<?php echo URLROOT;?>/Consults/accepted"><button title="Appointments Accepted by you" type="submit" style="float:right; width: 250px;" class="read-more attend">Inquiries</button></form>
                     <form action="<?php echo URLROOT;?>/Consults/accept"><button title="Awaiting approval from you" type="submit" style="float:right; width: 250px;" class="read-more attend">Appointments</button></form>
                    <?php endif; ?>
                    
                </div>
            </div>
            <div>
                <footer><a href="index.php">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.</footer>
            </div>
        </div>
        
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>
            
        <div id="body"></div>
            
        <script type="text/JavaScript">
            var URLROOT = '<?php echo URLROOT; ?>';
        </script>

        <script type="text/JavaScript">
            <?php if(isset($_SESSION['userID'])): ?>
                var ROLE = '<?php echo $_SESSION['role']; ?>';
                <?php else : ?>
                var ROLE = 'guest';
            <?php endif; ?>
            
        </script>

        <script src="<?php echo URLROOT; ?>/js/comments.js" type="text/javascript"></script>
        <script src="<?php echo URLROOT; ?>/js/imageUpload.js"></script>
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/jQuery/jQuery.js"></script>
        <script src="<?php echo URLROOT; ?>/js/rating.js" type="text/javascript"></script>
        <script src="<?php echo URLROOT; ?>/js/textEditor.js" type="text/javascript"></script>
        <script src="<?php echo URLROOT; ?>/js/notifictaions.js" type="text/javascript"></script>
    </body>
</html>
