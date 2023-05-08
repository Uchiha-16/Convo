<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/chat.css" rel="stylesheet" type="text/css" />
 <script src="<?php echo URLROOT; ?>/js/chat.js" ></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        document.getElementById("message").addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
            send();
            }
        });
</script>
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
                    <h3></h3><br>
                    
                    <!-- Question 1 -->
                    <div class="question-div">
                        <div class="info">
                            <p>Your User Disscussion Groups</p> 
                            <input type="search" name="search" placeholder="Search chat..."/>
                            <br>
                            <button class="read-more" onclick="showCreate()" style="margin-bottom: 10px;">Create a New Group</button>
                            <br><br>
                            <div class="chatgroups">
                            <?php foreach($data['chats'] as $chats): ?>
                                <div id="chat group-<?php echo $chats->chatID; ?>" class="chat" onclick="selected(<?php echo $chats->chatID; ?>); showchat(<?php echo $chats->chatID; ?>)">
                                        <?php echo $chats->title; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                          
                            <!-- <div class="chat group-1">
                                Team A
                            </div>
                            <div class="chat group-2">
                                Team XYZ
                            </div>
                            <div class="chat group-3">
                                Team ABC
                            </div>
                            <div class="chat group-1">
                                Team 00
                            </div> -->
                             
                        </div>
                        
                        <div class="content-display">
                        
                            <div id="results">
                                <img class="result-img" src="<?php echo URLROOT; ?>/img/logoIcon.png"/>
                                <span class="result-text">Select a group. Start your conversation...</span><br>
                                <span class="error"><?php echo $data['title_err']; ?></span><br>                            
                                <span class="error"><?php echo $data['users_err']; ?></span>
                                
                            </div>
                            
                            <!-- <div class="send">
                                <input type="text" name="text" id="message" placeholder="Type Something..."/>
                                <button type="submit"><img src="/img/submit.png" onclick="send(" class="submit"></button>
                            </div> -->

                           
                        </div>
                    </div>
                    <div id="popup">
                        <form action="<?php echo URLROOT; ?>/Chats/create" method="POST">
                        <table>
                            <tr>
                                <td colspan="2">
                                    <p class="desc" >Create a User Discussion Group
                                    </p>
                                </td>
                                <td>
                                    <img src="<?php echo URLROOT; ?>/img/cancel1.png" style="width: 30px;float: right;" onclick="hideCreate()">
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Group Title <span class="star">*</span></h4>
                                    <input class="inputform" type="text" name="title" placeholder="Enter title here..." value="<?php echo $data['title']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Add Users to the group <span class="star">*</span></h4>
                                    <div class="dropdown-div">
                                        <form method="POST" id="innerform">
                                            <label>Please Select <b>all the Users</b> you want to add to the group</label>
                                            <ul class="dropdown" id="dropdown">
                                            <?php $i = 0; ?>
                                            <?php foreach($data['addusers'] as $user): ?>
                                                <?php $i++; ?>
                                                <li><input type="checkbox" value="<?php echo $user->userID; ?>" name="Cusers[]" id="checkbox<?php echo $i;?>" /><label for="checkbox<?php echo $i;?>"><?php echo $user->firstName." ". $user->lastName; ?></label></li>
                                            <?php endforeach; ?>
                                            </ul>

                                    </div>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <br><br>
                                    <div class="add">
                                        <button style="float:right" class="read-more attend submit" type="submit" name="create">Create Group</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>

                        </div>
                        
                </div>
                
                
                <div class="RHS">
                    <div class="filter-div">
                        <div>
                            <form action="" method="POST">
                                <div class="info">
                            <p>Members</p>
                            <!-- <input type="search" name="search" placeholder="Search members..."/>
                            <br><br> -->
                        </div>
                        <div id="members">
                       Select a group to reveal its members</div>
                        <!-- <div class="qdp">
                                    <div>
                                        <img src="<?php echo URLROOT; ?>/img/user.jpg"/>
                                    </div>
                                    <div class="qdp-1">
                                        <label>Dilky Liyanage</label><br>
                                        <label class="qdp-1-2" style="font-size:10px">University of Colombo</label>
                                    </div>
                        </div> -->
                        
                                
                            </form>
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

<?php require APPROOT . '/views/inc/footer.php'; ?>