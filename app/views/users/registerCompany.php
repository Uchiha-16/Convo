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
            <p class="quote">Hitch your wagon to a star...</p><br>
            <img src="<?php echo URLROOT; ?>/img/company.png" alt="company" style="width:50%;" class="icon" />
            <h2>SEEKER</h2>
            <p class="desc">If you are a curious person who seeks for<br>
                answers and wants to gain knowledge<br>
                through discussions,<br>
                this is the perfect role for you !</p><br>
            <a href="<?php echo URLROOT?>/Users/signup" id="choose">
                <p>&lt;&lt;Change Role&gt;&gt;</p>
            </a><br>
        </div>
        <div class="grid-container-seeker">
            <div>
                <form name="" action="<?php echo URLROOT?>/Users/registerCompany" method="POST" enctype="multipart/form-data">

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
                            <td colspan="2"><input type="email" placeholder="Email" name="email"
                                    value="<?php echo $data['email']; ?>" /><br><br>
                                <span class="error"><?php echo $data['email_err']; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="email" placeholder="Email" name="email"
                                    value="<?php echo $data['email']; ?>" /><br><br>
                                <span class="error"><?php echo $data['email_err']; ?></span>
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
                            <td>
                                    <select name="country" id="country" required><br></br>

                                        <option value=""  selected disabled hidden>select country</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Aland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, Democratic Republic of the Congo</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Cote D'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curacao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and Mcdonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="XK">Kosovo</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libyan Arab Jamahiriya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="AN">Netherlands Antilles</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Reunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthelemy</option>
                                        <option value="SH">Saint Helena</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="CS">Serbia and Montenegro</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.s.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                            
                            </td>
                            <td class="left"><input type="text" placeholder="Contact No" name="contact"
                                    value="<?php echo $data['contact']; ?>" /><br><br>
                                <span class="error"><?php echo $data['contact_err']; ?></span>
                            </td>
                        </tr>
                        <tr>
                        <td class="right"><input type="text" placeholder="Industry Type" name="type"
                                    value="<?php echo $data['type']; ?>" /><br><br>
                                <span class="error"><?php echo $data['type_err']; ?></span>
                            </td>
                            <td class="left"><input type="text" placeholder="Company Website URL" name="weblink"
                                    value="<?php echo $data['weblink']; ?>" /><br><br>
                                <span class="error"><?php echo $data['weblink_err']; ?></span>
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td colspan="2"><input type="text" placeholder="Bio" name="bio"
                                    value="<?php echo $data['bio']; ?>" /><br><br>
                                <span class="error"><?php echo $data['bio_err']; ?></span>
                            </td>
                        </tr>
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