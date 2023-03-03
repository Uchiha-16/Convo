<?php require APPROOT . '/views/inc/header.php'; ?>

<link href="<?php echo URLROOT; ?>/css/addQuestion.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URLROOT; ?>/css/addconsult.css" rel="stylesheet" type="text/css"/>

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
                    <div class="question-div add-event">
                        <table>
                            <tr>
                            <td colspan="3">
                                <h3 style="color: #19758d;">Subscription Plan</h3>
                                <hr style="color: #aaaaaa;">
                            </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p style="font-size: 25px;font-weight: bold;">Premium Plan Subscription</p>
                                </td>
                                <td>
                                    <form action="<?php echo URLROOT; ?>/Subscriptions/subscribe"><button class="subscribe" style="float: right;" type="submit">Subscribe</button></form>
                                </td>
                            </tr>
                            <tr>
                            <table class="table1">
                                <tr>
                                    <td colspan="2">
                                        <p style="color:#00a7ae">Features</p>
                                    </td>
                                    <td>
                                        <p style="color:#00a7ae">Free Plan</p>
                                    </td>
                                    <td>
                                        <p style="color:#00a7ae">Premium Plan</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <hr style="border: 1px solid rgba(0, 0, 0, 0.08);">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>Subscription Fee</p>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <p>Free</p>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <p>$10/month</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <hr style="border: 1px solid rgba(0, 0, 0, 0.08);">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>Add Question/Comment</p>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/ok.png" alt="">
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/ok.png" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <hr style="border: 1px solid rgba(0, 0, 0, 0.08);">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>Approve Questions</p>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/ok.png" alt="">
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/ok.png" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <hr style="border: 1px solid rgba(0, 0, 0, 0.08);">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>Add Blogs</p>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/ok.png" alt="">
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/ok.png" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <hr style="border: 1px solid rgba(0, 0, 0, 0.08);">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>Apply for Projects</p>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/ok.png" alt="">
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/ok.png" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <hr style="border: 1px solid rgba(0, 0, 0, 0.08);">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>Unlimited User Discussion Groups</p>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/cancel1.png" alt="">
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/ok.png" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <hr style="border: 1px solid rgba(0, 0, 0, 0.08);">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>Unlimited Skill Tests</p>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/cancel1.png" alt="">
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/ok.png" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <hr style="border: 1px solid rgba(0, 0, 0, 0.08);">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>Events & Webinars</p>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/ok.png" alt="">
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/ok.png" alt="">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <hr style="border: 1px solid rgba(0, 0, 0, 0.08);">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>Private Consultation with Experts</p>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/cancel1.png" alt="">
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <img src="<?php echo URLROOT; ?>/img/ok.png" alt="">
                                    </td>
                                </tr>

                                
                            </table>
                            </tr>
                        </table>
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
        
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>
            
        <div id="body"></div>
         <script src="../../scripts/index.js"></script>
    </body>

       
</html>