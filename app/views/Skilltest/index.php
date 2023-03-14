
<?php require APPROOT . '/views/inc/header.php'; ?>

<link href="<?php echo URLROOT; ?>/css/sboard.css" rel="stylesheet" type="text/css"/>

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
            </script>

            <script>
            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function drop2() {
              document.getElementById("myDropdown2").classList.toggle("show");
            }
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(e) {
              if (!e.target.matches('.dropbtn')) {
              var myDropdown = document.getElementById("myDropdown2");
                if (myDropdown.classList.contains('show')) {
                  myDropdown.classList.remove('show');
                }
              }
            }
            </script>

    <div class="grid">
      <h1 style="color:black">Skill Test</h1>
          <div class="mod">
            <p class="desc">To gain the MODERATOR role, you must at least have a pass greater than 80%.<br>
            Moderators are granted with the access of Approving Questions, Events and Webinars<br>
            Handling. They will recieve a commission appon work.</p><br>
          </div>
          <div class="gridleft"> 

               <div class="score">
                  	<h3>Skill Test Scoreboard</h3>
                    <div class="circle-wrap">
                         <div class="circle">
        
                            <div class="mask full">
                                <div class="fill"></div>
                            </div>
       
                            <div class="mask half">
                              <div class="fill"></div>
                            </div>
        
                          <div class="inside-circle">
                               70%
                          </div>
        
                         </div>
                    </div>

<!-- <div class="progress-circle">
  <div class="progress-bar" style="width: 70%;"></div>
</div> -->

                <table>
                  <tr>
                    <th>Field</th>
                    <th>Correct Answers</th>
                    <th>Score</th>
                    <th>Grade</th>
                  </tr>
                  <tr>
                    <td>Chemistry</td>
                    <td>15/20</td>
                    <td>75%</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Neurology</td>
                    <td>13/20</td>
                    <td>65%</td>
                    <td>B</td>
                  </tr>
                  
                </table>
              </div>

          </div>
        <div class="middle">
            <h3>Select a Tag to begin a Skill Test!<br>
                    Good Luck :)</h3>
            <div class="tags">
              <div class="flex-tag"> Mathematics</div> 
              <div class="flex-tag"> Syntax</div> 
              <div class="flex-tag"> MatLab</div> 
              
            </div>
 
            <button class="start" > <a href="<?php echo URLROOT; ?>/Skilltest/test"> START</a></button>
            
            <div class="total_skill"> Total Skill Tests:</div>

            <div class="m_role">Moderator Roles:</div>
        </div>
          
        <div class="line"></div>
        <div class="gridright">
        <div class="c4">  
            <div class="tagbox">
                    <table>
                        <!-- <tr>
                            <td colspan="2"><button type="submit" class="btn1">Skill Test</button></td>
                        </tr> -->
                        <tr>
                            <td colspan="2"  class="taghead" ><p style="margin-left:15px; font-size:18px">Tags <img src="<?php echo URLROOT; ?>/img/question.png" alt="question"  width="17px" height="17px"></p></td>
                        </tr>
                    </table>
                <div class="tags1">
                    <a href="#"><button class="btn2" href="#">Mathematics</button></a>
                    <a href="#"><button class="btn2" href="#">Syntax</button></a>
                    <a href="#"><button class="btn2" href="#">MATLAB</button></a>
                    <a href="#"><button class="btn2" href="#">PHP</button></a>
                </div>
            </div>
          </div>


        <!-- <div class="c4">
        
       <h3>Your Tags</h3>
       <div class="tags">
              <div class="flex-tag"> Mathematics</div> 
              <div class="flex-tag"> Syntax</div> 
              <div class="flex-tag"> MatLab</div> 
              
            </div>
       </div> -->
    </div>