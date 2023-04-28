
<?php require APPROOT . '/views/inc/header.php'; ?>

<link href="<?php echo URLROOT; ?>/css/consultpage.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URLROOT; ?>/css/calander.css" rel="stylesheet" type="text/css"/>

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
                    <h3>Pending Events</h3><br>

                    <?php foreach($data['pendingEvents'] as $pendingEvents) : ?>
                    <div class="question-div">
                        <div class="info">
                            <?php 
                            $dateString = $pendingEvents->date;
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
                        </div>

                        <?php date_default_timezone_set('Asia/Colombo'); 
                        
                        // Convert the future date to a Unix timestamp
                            $futureTimestamp = strtotime($dateString);

                            // Get the current Unix timestamp
                            $currentTimestamp = time();

                            // Calculate the time difference between the future and current timestamps
                            $timeDifference = $futureTimestamp - $currentTimestamp;

                            // Convert the time difference to days
                            $daysRemaining = ceil($timeDifference / (60 * 60 * 24));
                        ?>
                        <div class="content-display">
                            <h3><?php echo $pendingEvents->title ?></h3>
                            <p><?php echo $pendingEvents->content ?></p><br>
                            <?php foreach($data['eventstatus'] as $eventstatus) : ?>
                                <?php if($eventstatus->EID == $pendingEvents->EID) : ?>
                                    <label class="name-label"><?php echo $eventstatus->fName. " ". $eventstatus->lName; ?></label>
                                    <?php if($eventstatus->status == 'pending') : ?>
                                        <label class="time-label" style="background-color: lightgoldenrodyellow;color: black;">Pending</label>
                                    <?php else : ?>
                                        <label class="time-label">Accepted</label>
                                    <?php endif; ?>
                                    <br> <br>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="date-count" style="margin-top: 1rem;">
                            <form action="<?php echo URLROOT; ?>/events/editEvent/<?php echo $pendingEvents->EID; ?>">
                                <button type="submit" style="float:left" class="decline">Re-schedule</button>
                            </form>
                            </div>
                        </div>
                        <div class="appointment">
                            <label><?php echo $daysRemaining ?> Days Remaining</label>
                        </div>
                    </div> 
                    <?php endforeach; ?>
            
                   
                </div>
                <div class="RHS">
                    <?php if(isset($_SESSION['userID'])) : ?>
                        <?php if($_SESSION['role'] == 'seeker/mod' or $_SESSION['role'] == 'premium/mod') : ?>
                            <form action="<?php echo URLROOT; ?>/events/index"><button type="submit" style="float:right"
                                    class="read-more attend">Events</button></form>
                            <form action="<?php echo URLROOT; ?>/events/add"><button type="submit" style="float:right"
                                class="read-more attend">Create Event</button></form>
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
                <br><br><br><br><br>
                    <div class="filter-div">
                        <div style="display:flex">
                            <img src="<?php echo URLROOT; ?>/img/filter.png">
                            <label>Filters</label><button class="read-more go">Go</button>
                        </div>
                        <div>
                            <form action="" method="POST">
                            
                                <!-- Filter 1 -->
                                
                                
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
                                    <span class="checkbox-title" onclick="filter3()">Questions &amp; answers <i class="arrow up" id="up3" style="margin-left: 0.7rem;"></i><i class="arrow down" id="down3" style="margin-left: 0.7rem;"></i></span>
                                    <ul id="checkbox-3">
                                        <li>
                                            <label for="checkbox1">
                                                <input type="checkbox" value="last 3 months" name="QA[]" id="checkbox1"/>My questions
                                            </label>
                                        </li>     
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="last 6 months" name="QA[]" id="checkbox2"/>Answered
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="last year" name="QA[]" id="checkbox3"/>Not answered
                                            </label>
                                        </li>
                                    </ul>
                                </div>

                                
                                <!-- Filter 4 -->
                                <div class="checkbox-1">
                                    <span class="checkbox-title" onclick="filter#()">Rating <i class="arrow up" id="up4" style="margin-left: 6.7rem;"></i><i class="arrow down" id="down4" style="margin-left: 6.7rem;"></i></span>
<!--
                                    <ul id="checkbox-3">
                                        <li>
                                            <label for="checkbox1">
                                                <input type="checkbox" value="last 3 months" name="QA[]" id="checkbox1"/>My questions
                                            </label>
                                        </li>     
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="last 6 months" name="QA[]" id="checkbox2"/>Answered
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="last year" name="QA[]" id="checkbox3"/>Not answered
                                            </label>
                                        </li>
                                    </ul>
-->
                                </div>
                                
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
        
    </body>
    <?php
// }else{ echo "<h1>Please login first .</h1>";?>
<!--  <a href="../login.php" style="color: white;">Login</a> or <a href="signup.php" style="color: white;">Signup</a> -->
 <?php //}
?>

</html>


