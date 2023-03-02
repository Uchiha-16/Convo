<!-- include('addUser.php')  -->
<!doctype html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta name="description" content="Online Forum">
    <meta charset="UTF-8">

    <!--<meta name="keywords" content="Forum, Question, Answer">-->

    <!-- Title -->
    <title>Convo | Online Forum</title>
    <link rel="icon" type="image/icon" href="<?php echo URLROOT ?>/img/logoIcon.png">

    <!-- stylesheets -->
    <link href="<?php echo URLROOT; ?>/css/style.css?version=1" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT; ?>/css/signup.css?version=1" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a061f2abcc.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="grid">
        <div class="c1">
            <img src="<?php echo URLROOT; ?>/img/logoWhite.png" alt="Convo" id="logo" />
            <p class="quote">Hitch your wagon to a star...</p>
            <img src="<?php echo URLROOT; ?>/img/seeker.png" alt="seeker" class="icon" />
            <h2>SEEKER</h2>
            <p class="desc">If you are a curious person who seeks for<br>
                answers and wants to gain knowledge<br>
                through discussions,<br>
                this is the perfect role for you !</p><br>
            <a href="../signup.php" id="choose">
                <p>&lt;&lt;Change Role&gt;&gt;</p>
            </a><br>
        </div>
        <div class="grid-container-seeker">
            <div>
                <form name="" action="<?php echo URLROOT?>/Users/register" method="POST" enctype="multipart/form-data">

                    <div class="user-img">
                        <label for="file" id="uploadbtn">
                            <img src="<?php echo URLROOT; ?>/img/user.jpg" id="photo">
                            <input type="file" id="file" name="pfp" value="">
                        </label>
                    </div><br>
                    <script>
                    const imgDiv = document.querySelector('.user-img');
                    const img = document.querySelector('#photo');
                    const file = document.querySelector('#file');
                    const uploadebtn = document.querySelector('#uploadbtn');

                    file.addEventListener('change', function() {
                        const choosedfile = this.files[0];
                        if (choosedfile) {
                            const reader = new FileReader();

                            reader.addEventListener('load', function() {
                                img.setAttribute('src', reader.result);
                            })
                            reader.readAsDataURL(choosedfile);
                        }
                    })
                    </script>
                    <table>
                        <tr>
                            <td class="right"><input type="text" placeholder="First Name" name="fname"
                                    value="<?php echo $data['fname']; ?>" /><br><br>
                                <span class="error"><?php echo $data['fname_err']; ?></span>
                            </td>
                            <td class="left"><input type="text" placeholder="Last Name" name="lname"
                                    value="<?php echo $data['lname']; ?>" /><br><br>
                                <span class="error"><?php echo $data['lname_err']; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="email" placeholder="Email" name="email"
                                    value="<?php echo $data['email']; ?>" /><br><br>
                                <span class="error"><?php echo $data['email_err']; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" placeholder="Username" name="uname"
                                    value="<?php echo $data['uname']; ?>" /><br><br>
                                <span class="error"><?php echo $data['uname_err']; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" id='message' style="font-size:12px;"> </td>
                        </tr>
                        <tr>
                            <td class="right"><input type="password" placeholder="Password" name="password" id="p1"
                                    onkeyup='validate();' value="<?php echo $data['password']; ?>" /><br><br>
                                <span class="error"><?php echo $data['password_err']; ?></span>
                            </td>
                            <td class="left"><input type="password" placeholder="Re-enter Password"
                                    name="confirm_password" id="p2" onkeyup='validate();'
                                    value="<?php echo $data['confirm_password']; ?>" /><br><br>
                                <span class="error"><?php echo $data['confirm_password_err']; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="tag-border">
                                <label id="tag">Tags</label>
                                <div class="dropdown-div">

                                    <label>Please Select all your <b>Intrested Areas</b>.</label>
                                    <ul class="dropdown" id="dropdown">

                                        <li><input type="checkbox" value="agricultureScience" name="tag[]"
                                                id="checkbox1" value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox1">Agriculture Science</label></li>

                                        <li><input type="checkbox" value="anthropology" name="tag[]" id="checkbox2"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox2">Anthropology</label></li>

                                        <li><input type="checkbox" value="biology" name="tag[]" id="checkbox3"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox3">Biology</label></li>

                                        <li><input type="checkbox" value="Chemistry" name="tag[]" id="checkbox4"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox4">Chemistry</label></li>

                                        <li><input type="checkbox" value="CS" name="tag[]" id="checkbox5"
                                                value="<?php echo $data['tag']; ?>" /><label for="checkbox5">Computer
                                                Science</label></li>

                                        <li><input type="checkbox" value="design" name="tag[]" id="checkbox6"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox6">Design</label></li>

                                        <li><input type="checkbox" value="economics" name="tag[]" id="checkbox7"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox7">Economics</label></li>

                                        <li><input type="checkbox" value="education" name="tag[]" id="checkbox8"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox8">Education</label></li>

                                        <li><input type="checkbox" value="engineering" name="tag[]" id="checkbox9"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox9">Engineering</label></li>

                                        <li><input type="checkbox" value="EA" name="tag[]" id="checkbox10"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox10">Entertaintment &amp; Arts</label></li>

                                        <li><input type="checkbox" value="geoscience" name="tag[]" id="checkbox11"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox11">Geoscience</label></li>

                                        <li><input type="checkbox" value="history" name="tag[]" id="checkbox12"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox12">History</label></li>

                                        <li><input type="checkbox" value="law" name="tag[]" id="checkbox13"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox13">Law</label></li>

                                        <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox14"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox14">Linguistics</label></li>

                                        <li><input type="checkbox" value="literature" name="tag[]" id="checkbox15"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox15">literature</label></li>

                                        <li><input type="checkbox" value="mathematics" name="tag[]" id="checkbox16"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox16">Mathematics</label></li>

                                        <li><input type="checkbox" value="Medicine" name="tag[]" id="checkbox17"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox17">Medicine</label></li>

                                        <li><input type="checkbox" value="linguistics" name="tag[]" id="checkbox18"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox18">Linguistics</label></li>

                                        <li><input type="checkbox" value="philosophy" name="tag[]" id="checkbox19"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox19">Philosophy</label></li>

                                        <li><input type="checkbox" value="physics" name="tag[]" id="checkbox20"
                                                value="<?php echo $data['tag']; ?>" /><label for="checkbox20"
                                                for="checkbox1">Physics</label></li>

                                        <li><input type="checkbox" value="PS" name="tag[]" id="checkbox21"
                                                value="<?php echo $data['tag']; ?>" /><label for="checkbox21">Political
                                                Science</label></li>

                                        <li><input type="checkbox" value="psychology" name="tag[]" id="checkbox22"
                                                value="<?php echo $data['tag']; ?>" /><label
                                                for="checkbox22">Psychology</label></li>

                                        <li><input type="checkbox" value="RS" name="tag[]" id="checkbox23"
                                                value="<?php echo $data['tag']; ?>" /><label for="checkbox23">Religious
                                                Studies</label></li>

                                        <li><input type="checkbox" value="socialScience" name="tag[]" id="checkbox24"
                                                value="<?php echo $data['tag']; ?>" /><label for="checkbox24">Social
                                                Science</label></li>

                                        <li><input type="checkbox" value="spaceScience" name="tag[]" id="checkbox25"
                                                value="<?php echo $data['tag']; ?>" /><label for="checkbox25">Space
                                                Science</label></li>
                                    </ul>
                                </div>
                            </td>


                        </tr>

                        <tr>
                            <td colspan="2">
                                <span class="error"><?php echo $data['tag_err']; ?></span><br><br>
                                <input type="submit" value="Sign Up" name="submit" /><br>
                                <p style="color: #19758D; font-weight:600; font-size:14px; margin:5px 0 0 0;">Already
                                    have an account? <a href="<?php echo URLROOT; ?>/Users/login">Log In</a></p>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div></div>
    </div>
    <div id="body"></div>
    <script src="<?php echo URLROOT; ?>/js/index.js"></script>
    <script src="<?php echo URLROOT; ?>/js/validate.js"></script>
</body>

</html>