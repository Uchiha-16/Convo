
<?php require APPROOT . '/views/inc/header.php'; ?>

<link href="<?php echo URLROOT; ?>/css/addQuestion.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URLROOT; ?>/css/addconsult.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URLROOT; ?>/css/subs.css" rel="stylesheet" type="text/css"/>

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

    <div class="container-div">
            <div class="content-body">
                <div class="LHS">
                <div class="question-div">
  
              <h2>My Subscription</h2>
              <div class="due"><p>Next Payment Due: December 25, 2022 09:32 (E-mail Service)</p></div>
              <div class="h_line"></div>
              
              <div class="plan">
                <h4>Pricing Plan</h4>

                <table>
                  <tr>
                    <th style="font-size: 18px;font-weight: bold;">Premium Subscription Amount</th>
                  <tr>  
                      <th style="color: #00A7AE">Status</th>  
                      <th style="color: #00A7AE">Active</th>  
                        
                  </tr>
                  
                  <tr>
                    <td style="border-bottom: 2px solid rgba(0, 0, 0, 0.08);">Valid Until</td>
                    <td style="border-bottom: 2px solid rgba(0, 0, 0, 0.08);"><p class="p1">April 25, 2023 09:32</p></td>
                  </tr>

                  <tr>
                    <td style="border-bottom: 2px solid rgba(0, 0, 0, 0.08);">Activated On</td>
                    <td style="border-bottom: 2px solid rgba(0, 0, 0, 0.08);"><p class="p1">April 25, 2022 09:32</p></td>
                  </tr>

                  <tr>
                    <td style="border-bottom: 2px solid rgba(0, 0, 0, 0.08);">Subscrption Type</td>
                    <td style="border-bottom: 2px solid rgba(0, 0, 0, 0.08);"><p class="p1">Monthly Payment</p></td>
                  </tr>
                </table>

              </div>
              
              <div class="btns">
                <form action="<?php echo URLROOT; ?>/Subscriptions/index"><button class="details" onclick="" type="submit"> View Subscription Details</button></form>
                <button class="cancel" onclick="document.getElementById('id01').style.display='block'"> Cancel Subscription</button>
                
                <div id="id01"class="pop_up" data-effect="mfp-zoom-in">
                  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="close box"><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></span>
                  <form class="pop_up-content" action ="">
                    <div class="pop_up-box">
                      <h1> Cancel Subscription !</h1>
                      <p> Are you sure you want to cancel your subscription?</p>

                      <div class="pop_up-buttons">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="nobtn"> No</button>
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="yesbtn"> Yes</button>
                      </div>

                    </div>
                  </form>
                </div>

              </div>

          </div>
                </div>
                <div class="RHS">
                <div class="tagbox">
                    <table>
                        <tr>
                            <td colspan="2"><button type="submit" class="btn1">Skill Test</button></td>
                        </tr>
                        <tr>
                            <td colspan="2"><p style="margin-left: 12px;">Tags <img src="<?php echo URLROOT; ?>/img/question.png" alt="question"  width="17px" height="17px"></p></td>
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
            <div>
                <footer><a href="index.php">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.</footer>
            </div>
        </div>
        </div>
    </body>
</html>
<script>
      // Get the modal
      var pop_up = document.getElementById('id01');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == pop_up) {
          pop_up.style.display = "none";
        }
      }
</script>
