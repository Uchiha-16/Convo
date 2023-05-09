<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT; ?>/css/addconsult.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    <?php if (($_SESSION['role']) == 'seeker') : ?><?php elseif (($_SESSION['role']) == 'expert' || $_SESSION['role'] == 'premium') : ?>.nav {
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

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
	<script async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML"></script>

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
                <h3>Add New Questions</h3><br>

                <!-- Adding a picture to event -->

                <!-- Event 1 -->
                <div class="question-div add-event">
                    <form action="<?php echo URLROOT; ?>/Questions/add" method="POST">
                        <table>
                            <tr>
                                <td colspan="3">
                                    <p class="desc">Make sure you add meaningful tags...
                                        <br>
                                    </p>
                                </td>
                            </tr>
                           
                            <tr>
                                <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Insert Tags<span class="star">*</span></h4>
                                    <div class="dropdown-div">
                                        
                                       
                                            <label>Please Select <b>all the Tags</b> which are Related to the Event.</label>
                                            <ul class="dropdown" id="dropdown">

                                                <li><input type="checkbox" value="agricultureScience" name="tag[]" id="checkbox1" value="<?php echo $data['tag']; ?>" /><label for="checkbox1">Agriculture Science</label></li>

                                                <li><input type="checkbox" value="anthropology" name="tag[]" id="checkbox2" value="<?php echo $data['tag']; ?>" /><label for="checkbox2">Anthropology</label></li>

                                                <li><input type="checkbox" value="biology" name="tag[]" id="checkbox3" value="<?php echo $data['tag']; ?>" /><label for="checkbox3">Biology</label></li>

                                                <li><input type="checkbox" value="Chemistry" name="tag[]" id="checkbox4" value="<?php echo $data['tag']; ?>" /><label for="checkbox4">Chemistry</label></li>

                                                <li><input type="checkbox" value="CS" name="tag[]" id="checkbox5" value="<?php echo $data['tag']; ?>" /><label for="checkbox5">Computer Science</label></li>

                                                <li><input type="checkbox" value="design" name="tag[]" id="checkbox6" value="<?php echo $data['tag']; ?>" /><label for="checkbox6">Design</label></li>

                                                <li><input type="checkbox" value="economics" name="tag[]" id="checkbox7" value="<?php echo $data['tag']; ?>" /><label for="checkbox7">Economics</label></li>

                                                <li><input type="checkbox" value="education" name="tag[]" id="checkbox8" value="<?php echo $data['tag']; ?>" /><label for="checkbox8">Education</label></li>

                                                <li><input type="checkbox" value="engineering" name="tag[]" id="checkbox9" value="<?php echo $data['tag']; ?>" /><label for="checkbox9">Engineering</label></li>

                                                <li><input type="checkbox" value="EA" name="tag[]" id="checkbox10" value="<?php echo $data['tag']; ?>" /><label for="checkbox10">Entertaintment &amp; Arts</label></li>

                                                <li><input type="checkbox" value="geoscience" name="tag[]" id="checkbox11" value="<?php echo $data['tag']; ?>" /><label for="checkbox11">Geoscience</label></li>

                                                <li><input type="checkbox" value="history" name="tag[]" id="checkbox12" value="<?php echo $data['tag']; ?>" /><label for="checkbox12">History</label></li>

                                                <li><input type="checkbox" value="law" name="tag[]" id="checkbox13" value="<?php echo $data['tag']; ?>" /><label for="checkbox13">Law</label></li>

                                                <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox14" value="<?php echo $data['tag']; ?>" /><label for="checkbox14">Linguistics</label></li>

                                                <li><input type="checkbox" value="literature" name="tag[]" id="checkbox15" value="<?php echo $data['tag']; ?>" /><label for="checkbox15">literature</label></li>

                                                <li><input type="checkbox" value="mathematics" name="tag[]" id="checkbox16" value="<?php echo $data['tag']; ?>" /><label for="checkbox16">Mathematics</label></li>

                                                <li><input type="checkbox" value="Medicine" name="tag[]" id="checkbox17" value="<?php echo $data['tag']; ?>" /><label for="checkbox17">Medicine</label></li>

                                                <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox18" value="<?php echo $data['tag']; ?>" /><label for="checkbox18">Linguistics</label></li>

                                                <li><input type="checkbox" value="philosophy" name="tag[]" id="checkbox19" value="<?php echo $data['tag']; ?>" /><label for="checkbox19">Philosophy</label></li>

                                                <li><input type="checkbox" value="physics" name="tag[]" id="checkbox20" value="<?php echo $data['tag']; ?>" /><label for="checkbox20" for="checkbox1">Physics</label></li>

                                                <li><input type="checkbox" value="PS" name="tag[]" id="checkbox21" value="<?php echo $data['tag']; ?>" /><label for="checkbox21">Political Science</label></li>

                                                <li><input type="checkbox" value="psychology" name="tag[]" id="checkbox22" value="<?php echo $data['tag']; ?>" /><label for="checkbox22">Psychology</label></li>

                                                <li><input type="checkbox" value="RS" name="tag[]" id="checkbox23" value="<?php echo $data['tag']; ?>" /><label for="checkbox23">Religious Studies</label></li>

                                                <li><input type="checkbox" value="socialScience" name="tag[]" id="checkbox24" value="<?php echo $data['tag']; ?>" /><label for="checkbox24">Social Science</label></li>

                                                <li><input type="checkbox" value="spaceScience" name="tag[]" id="checkbox25" value="<?php echo $data['tag']; ?>" /><label for="checkbox25">Space Science</label></li>
                                            </ul>
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
                                            url: '<?php echo URLROOT;?>/Questions/resourceName',
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
                                <td class="rp">
                                    <div class="checkbox-1">
                                        <span class="checkbox-title" onclick="filter3()">
                                            <h4>Select Specific Experts(Optional)
                                                <i class="arrow up" id="up3" style="margin-left: 4.3rem;"></i><i class="arrow down" id="down3" style="margin-left: 4.3rem;"></i>
                                            </h4>
                                        </span>
                                        <ul id="checkbox-3">
                                            <div class="resource">Please Select One of More Tags</div>
                                        </ul>
                                    </div>
                                </td>
                                <td> <input type="checkbox" id="anonymus" name="visibility" value="<?php echo $data['visibility'] ?>"></td>
                                <td><label for="anonymus">Make Anonymus</label>
                                    <p class="anonymusp1">Your name will not be displayed in the Question</p>
                                </td>
                            </tr>
                            <tr>
                                <!--                                <td style="padding-right:1rem; width:50%;">-->

                            </tr>
                            <tr>
                                <td colspan="3">
                                    <br><br>
                                    <div class="add">
                                        <button style="float:right" class="read-more attend submit" type="reset">Reset</button>
                                        <button style="float:right" class="read-more attend submit" type="submit" name="create" id="convertBtn">Add Question</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
            <div class="RHS">
                <form action="<?php echo URLROOT; ?>/questions/myquestions"><button type="submit" style="float:right" class="read-more attend">My Questions</button></form>
                <form action="<?php echo URLROOT; ?>/pages/seeker"><button type="submit" style="float:right" class="read-more attend">Home</button></form>
            </div>
        </div>
        <div>
            <footer><a href="<?php echo URLROOT; ?>/Pages/about">About Us</a>
                <p> | </p> &copy; Convo 2022 All rights reserved.
            </footer>
        </div>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>

    <?php require APPROOT . '/views/inc/footer.php'; ?>