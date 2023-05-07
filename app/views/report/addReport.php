<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT;?>/css/event.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URLROOT;?>/css/addReport.css" rel="stylesheet" type="text/css"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    <?php if (($_SESSION['role']) == 'seeker') : ?><?php elseif (($_SESSION['role']) == 'expert') : ?>.nav {
        grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
    }

    <?php endif; ?>
</style>
<script type="text/javascript">
    // $(document).ready(function() {
    //     $(".mybutton").click(function() {

    //         $.ajax({
    //             type: "post",
    //             url: "add.php",
    //             data: $("form").serialize(),
    //             success: function(result) {
    //                 $(".myresult").html(result);
    //             }
    //         });

    //     });
    // });
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
                    <h3>Add Report or Complaint</h3>
                    <div class="screen">
                        <h2>Mention Your Issue</h2>
                           
                           <form action="<?php echo URLROOT;?>/report/addReport" method="POST">
                           <table>
                            <tr styl>
                                <td style="padding-top: 5px;" colspan="3"><label>Title</label></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <input class="inputform" type="text" name="title" placeholder="Enter your title" required>
                                    <span class="error"><?php echo $data['title_err'];?></span>
                                </td>

                            </tr>
                            <tr styl>
                               <div> <td class="complaint" style="padding-top: 5px;" colspan="3"><label>Complaint type</label></td>
                                
                            </tr>
                            <tr>
                                <!-- <td colspan="3"><input class="inputform" type="text" name="type" placeholder="Enter the type which is related to your complaint" required></td> -->
                            <td colspan="3" placeholder="Select what goes against community guidlines">
                                <select class="inputform" name="type" style="font-size:14px;" required >
                                    <option value="none"hidden selected >-- Select Type --</option>
                                    <option value="Pretending to be someone else">Pretending to be someone  else</option>
                                    <option value="Fake account">Fake account</option>
                                    <option value="fake name">Fake name</option>
                                    <option value="Posting inappropriate things">Posting inappropriate things</option>
                                    <option value="Violent criminal organization">Violent criminal organization</option>
                                    <option value="Hate comment">Hate Comments</option>
                                    <option value="Harmful or dangerous content">Harmful or dangerous content</option>


                                </select>
                                <span class="error"><?php echo $data['type_err']; ?></span>
                            </td>
                            </tr>
                            <tr>
                                <td><label>Reason(optional)</label></td>
                                
                            </tr>
                            <tr>
                                <td><input class="inputform" id="i1" type="text" name="reason" placeholder="The reason to your complaint "></td>
                                <td> <input type="checkbox" id="anonymus" name="visibility" value="<?php echo $data['visibility']?>"></td>
                                <td><label for="anonymus">Make Anonymus</label><p>Your name will not be displayed in the Question</p></td>
                            </tr>
                            <tr>
                                <td style="padding-top: 15px;" colspan="3"><label>Description</label></td>
                            </tr>
                            
                            <tr>
                                <td colspan="3">
                                    <textarea style="padding: 15px;" rows="12" cols="100" placeholder="" name="description" required></textarea><br><br>
                                    <span class="error"><?php echo $data['description_err']; ?></span>

                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td style="text-align: right;">
                                    <button class="btn3" onclick="confirmation2()">Cancel</button>
                                    <button type="submit" class="btn1" name="submit">Post</button>
                                </td>
                            </table>
                            </form>
                    </div>
                    <div>
                    
                    </div>
                </div>

                <div class="RHS">
                <div class="tagbox">
                    <table>
                        <tr>
                            <td colspan="2"><button type="submit" class="btn1">Skill Test</button></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-top: 15px;" ><p style="margin-left: 12px;">Tags <img src="../images/question.png" alt="question"  width="17px" height="17px"></p></td>
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
 
<script>
         function confirmation2() {
            if (confirm("Are you sure you want to discard this report?")) {
                window.location.href = "../home.php";
                }
        }
</script>


    </body>

       
</html>

