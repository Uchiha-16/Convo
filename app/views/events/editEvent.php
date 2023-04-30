<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/event.css" rel="stylesheet" type="text/css" />
<link href="<?php echo URLROOT; ?>/css/addconsult.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
<?php if (($_SESSION['role'])=='seeker') : ?><?php elseif (($_SESSION['role'])=='expert'|| $_SESSION['role']=='premium') : ?>.nav {
    grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
}

<?php endif;
?>
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
                <h3>Add New Event</h3><br>

                <!-- Adding a picture to event -->

                <!-- Event 1 -->
                <div class="question-div add-event">
                    <form action="<?php echo URLROOT; ?>/Events/add" method="POST">
                        <table>
                            <tr>
                                <td colspan="3">
                                    <p class="desc">Make sure you did a research before adding an event. Enter a clear
                                        and concise Title and
                                        Description that Experts will easily understand. Please provide any details
                                        experts may need to consider.
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Title <span class="star">*</span></h4>
                                    <input class="inputform" type="text" name="title" placeholder="Enter title here..."
                                        value="<?php echo $data['event']->title; ?>">
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
                                                    <input id="font-size" type="number" value="16" min="1" max="100"
                                                        onchange="f1(this)">
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
                                                <textarea id="textarea1" class="inputform" type="text" name="content"
                                                    placeholder="Describe the Event...."
                                                    value="<?php echo $data['event']->content; ?>">
                                                    <?php if($data['event']->content) : ?>
                                                        <?php echo $data['event']->content; ?>
                                                    <?php endif ?>
                                                </textarea>
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

                                        <label>Please Select <b>all the Tags</b> which are Related to the
                                            Event.</label>
                                        <ul class="dropdown" id="dropdown">

                                            <?php $tagarray = explode(",", $data['tag']->tags); ?>
                                            <?php $tagarrayjson = json_encode($tagarray); ?>

                                            <li><input type="checkbox" value="agricultureScience" name="tag[]"
                                                    id="checkbox1" /><label for="checkbox1">Agriculture
                                                    Science</label></li>

                                            <li><input type="checkbox" value="anthropology" name="tag[]"
                                                    id="checkbox2" /><label for="checkbox2">Anthropology</label>
                                            </li>

                                            <li><input type="checkbox" value="biology" name="tag[]"
                                                    id="checkbox3" /><label for="checkbox3">Biology</label></li>

                                            <li><input type="checkbox" value="Chemistry" name="tag[]"
                                                    id="checkbox4" /><label for="checkbox4">Chemistry</label></li>

                                            <li><input type="checkbox" value="CS" name="tag[]" id="checkbox5" /><label
                                                    for="checkbox5">Computer Science</label>
                                            </li>

                                            <li><input type="checkbox" value="design" name="tag[]"
                                                    id="checkbox6" /><label for="checkbox6">Design</label></li>

                                            <li><input type="checkbox" value="economics" name="tag[]"
                                                    id="checkbox7" /><label for="checkbox7">Economics</label></li>

                                            <li><input type="checkbox" value="education" name="tag[]"
                                                    id="checkbox8" /><label for="checkbox8">Education</label></li>

                                            <li><input type="checkbox" value="engineering" name="tag[]"
                                                    id="checkbox9" /><label for="checkbox9">Engineering</label></li>

                                            <li><input type="checkbox" value="EA" name="tag[]" id="checkbox10" /><label
                                                    for="checkbox10">Entertaintment &amp;
                                                    Arts</label></li>

                                            <li><input type="checkbox" value="geoscience" name="tag[]"
                                                    id="checkbox11" /><label for="checkbox11">Geoscience</label>
                                            </li>

                                            <li><input type="checkbox" value="history" name="tag[]"
                                                    id="checkbox12" /><label for="checkbox12">History</label></li>

                                            <li><input type="checkbox" value="law" name="tag[]" id="checkbox13" /><label
                                                    for="checkbox13">Law</label></li>

                                            <li><input type="checkbox" value="linguistics" name="tag[]"
                                                    id="checkbox14" /><label for="checkbox14">Linguistics</label>
                                            </li>

                                            <li><input type="checkbox" value="literature" name="tag[]"
                                                    id="checkbox15" /><label for="checkbox15">literature</label>
                                            </li>

                                            <li><input type="checkbox" value="mathematics" name="tag[]"
                                                    id="checkbox16" /><label for="checkbox16">Mathematics</label>
                                            </li>

                                            <li><input type="checkbox" value="Medicine" name="tag[]"
                                                    id="checkbox17" /><label for="checkbox17">Medicine</label></li>

                                            <li><input type="checkbox" value="linguistics" name="tag[]"
                                                    id="checkbox18" /><label for="checkbox18">Linguistics</label>
                                            </li>

                                            <li><input type="checkbox" value="philosophy" name="tag[]"
                                                    id="checkbox19" /><label for="checkbox19">Philosophy</label>
                                            </li>

                                            <li><input type="checkbox" value="physics" name="tag[]"
                                                    id="checkbox20" /><label for="checkbox20"
                                                    for="checkbox1">Physics</label></li>

                                            <li><input type="checkbox" value="PS" name="tag[]" id="checkbox21" /><label
                                                    for="checkbox21">Political
                                                    Science</label></li>

                                            <li><input type="checkbox" value="psychology" name="tag[]"
                                                    id="checkbox22" /><label for="checkbox22">Psychology</label>
                                            </li>

                                            <li><input type="checkbox" value="RS" name="tag[]" id="checkbox23" /><label
                                                    for="checkbox23">Religious
                                                    Studies</label></li>

                                            <li><input type="checkbox" value="socialScience" name="tag[]"
                                                    id="checkbox24" /><label for="checkbox24">Social Science</label>
                                            </li>

                                            <li><input type="checkbox" value="spaceScience" name="tag[]"
                                                    id="checkbox25" /><label for="checkbox25">Space Science</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php echo "<script>var checkboxValues = " . $tagarrayjson . ";</script>"; ?>

                                    <script>
                                    for (var i = 0; i < checkboxValues.length; i++) {
                                        var checkbox = document.querySelector("input[type='checkbox'][value='" +
                                            checkboxValues[i] + "']");
                                        if (checkbox) {
                                            checkbox.checked = true;
                                        }
                                    }
                                    </script>

                                    <span class="error"><?php echo $data['tag_err']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h4 style="margin-bottom:.5rem">Zoom Link <span class="star">*</span></h4>
                                    <input class="inputform" type="text" name="link"
                                        placeholder="Enter the Zoom Link recieved by the relavant expert..."
                                        value="<?php echo $data['event']->link; ?>">
                                    <span class="error"><?php echo $data['link_err']; ?></span>
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

                                    if (selectedValues.length == 0) {
                                        $('.resource').html('Please Select One of More Tags');
                                    } else {
                                        //Send AJAX request to server
                                        $.ajax({
                                            url: '<?php echo URLROOT;?>/Questions/resourceName',
                                            method: 'POST',
                                            data: {
                                                selectedValues: selectedValues
                                            },
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
                                            <h4>Select Experts <span class="star">*</span>
                                                <i class="arrow up" id="up3" style="margin-left: 4.3rem;"></i><i
                                                    class="arrow down" id="down3" style="margin-left: 4.3rem;"></i>
                                            </h4>
                                        </span>
                                        <ul id="checkbox-3">
                                            <div class="resource">
                                                <li>
                                                <label for="checkbox1">
                                                        <input type="checkbox" value="'. $d->expertID .'" name="rp[]" id="checkbox1"/>
                                                        <span class="checkbox">'. $d->fName ." ". $d->lName . </span>
                                                    </label>';
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                </td>
                                <td class="date" style="float:none">
                                    <h4>Date <span class="star">*</span></h4>
                                    <input class="inputform" type="date" name="date" id="date"
                                        value="<?php echo $data['event']->date; ?>" required>
                                    <span class="error"><?php echo $data['date_err']; ?></span>
                                </td>
                                <td class="time" style="float:none">
                                    <h4>Time <span class="star">*</span></h4>
                                    <input class="inputform" type="time" name="time"
                                        value="<?php echo $data['event']->time; ?>" required>
                                    <span class="error"><?php echo $data['time_err']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <br><br>
                                    <div class="add">
                                        <button style="float:right" class="read-more attend submit"
                                            type="reset">Reset</button>
                                        <button style="float:right" class="read-more attend submit" type="submit"
                                            name="create">Schedule</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
            <div class="RHS">
                <?php if(isset($_SESSION['userID'])) : ?>
                <?php if($_SESSION['role'] == 'seeker/mod' or $_SESSION['role'] == 'premium/mod') : ?>
                <form action="<?php echo URLROOT; ?>/events/index"><button type="submit" style="float:right"
                        class="read-more attend">Events</button></form>
                <form action="<?php echo URLROOT; ?>/events/pending"><button type="submit" style="float:right"
                        class="read-more attend">Pending Events</button></form>
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