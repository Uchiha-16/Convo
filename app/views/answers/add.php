<link href="../stylesheets/event.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
        <link rel="stylesheet" href="../stylesheets/mobile.css" rel="stylesheet" type="text/css">

        <!-- scripts -->
        <script src="https://kit.fontawesome.com/a061f2abcc.js" crossorigin="anonymous"></script>
        
        
        <!-- styles -->
        <style>
            .nav{
                grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
            }
            .add-event textarea{
                height: 23rem;
            }
            .filter-div{
/*                margin-top: 3.6rem;*/
                display: none;
            }
        </style>
        
    </head>
    <body>
        <!-- nav bar -->
        <?php include 'Enavbar.php'; ?>
        
        <!-- body content -->
        <div class="container-div">
            <div class="content-body">
                <div class="LHS">
                    <br><br><br>
                    
                    <!-- Question 1 -->
                    <div class="question-div">
                        <div class="content-display">
                            <h2>What are some alternatives to String Theory that have been researched/developed?</h2>
                            <p>The only finite mathematical framework that incorporates both the standard model of particle physics and gravity under one umbrella that I am aware of is string theory. I would like to know whether there are any other mathematical possibilities exist which do not depend on supersymmetry and still consistent with the standard model and gravity and produce finite answers. In a nutshell my question is: can there be any alternative to string theory? (Remember, I am not talking about only gravity. I am talking about gravity as well as other phenomena).</p>
                            <div class="qdp">
                                <div>
                                    <img src="../images/p2.jpg"/>
                                </div>
                                <div class="qdp-1">
                                    <label>Dilky Liyanage</label><br>
                                    <label class="qdp-1-2">University of Colombo</label>
                                </div>
                            </div>
                            <div class="info">
                            <div class="tags">
                                <label>Category</label><br>
                                <div class="tag">Physics</div>
                                <div class="tag">Science</div>
                                <div class="tag">Mathematics</div>
                            </div>
                        </div>
                            <div class="date-count">
                                <label>October 2, 2022</label>
                                <label style="font-weight:600; float:right">1 Answer</label><br>
                                <button class="read-more" style="width:100%;">Save for later</button>
                            </div>
                        </div>
                    </div> 
                    
                    <!-- Answer -->
                    <div class="question-div add-event">
                        <form action="" method="POST">
                            <h3 style="color: #0D5F75;">Add Answer</h3>
                            <table>
                                <tr>
                                    <td colspan="3">
                                        <p class="desc">Make sure to check the other answers before adding the same answer again. Enter a clear and concise answer that others will easily understand.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="qdp">
                                            <div>
                                                <img src="../images/p1.jpg"/>
                                            </div>
                                            <div class="qdp-1">
                                                <label>Varsha Wijethunge</label><br>
                                                <label class="qdp-1-2">University of Colombo</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <h4 style="margin-bottom:.5rem">Answer</h4>


                                        <section>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="first box">
                                                        <input id="font-size" type="number" value="16" min="1" max="100" onchange="f1(this)">
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
                                                    <textarea id="textarea1" class="inputform" type="text" name="desc" placeholder="Enter an explanation in text format..."></textarea>
                                                </div>
                                            </div>
                                        </section>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="padding-top: 1rem;">
                                        <label for="file" id="attatchment">
                                            <img src="../images/thumbnail.png"> Add Thumbnail
                                            <input style="border: none; display:none;" type="file" id="file" name="pfp" value="">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <br><br>
                                        <div class="add">
                                            <button style="float:right" class="read-more attend submit" type="submit" name="create">Publish</button>
                                            <button style="float:right" class="read-more attend submit" type="reset">Cancel</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    
                </div>
                
                
                
                <div class="RHS">
                    <div class="filter-div">
                        <div style="display:flex">
                            <img src="../images/filter.png">
                            <label>Filters</label><button class="read-more go">Go</button>
                        </div>
                        <div>
                            <form action="" method="POST">
                                
                                <!-- Filter 1 -->
                                <div class="checkbox-1">
                                    <span class="checkbox-title" onclick="filter1()">Category <i class="arrow up" id="up"></i><i class="arrow down" id="down"></i></span>
                                    <ul id="checkbox-1">
                                        <li>
                                            <label for="checkbox1">
                                                <input type="checkbox" value="agricultureScience" name="tag[]" id="checkbox1"/>Agriculture Science
                                            </label>
                                        </li>     
                                        <li>
                                            <label for="checkbox2">
                                                <input type="checkbox" value="anthropology" name="tag[]" id="checkbox2"/>Anthropology
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox3">
                                                <input type="checkbox" value="biology" name="tag[]" id="checkbox3"/>Biology
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox4">
                                                <input type="checkbox" value="Chemistry" name="tag[]" id="checkbox4"/>Chemistry
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox5">
                                                <input type="checkbox" value="CS" name="tag[]" id="checkbox5"/>Computer Science
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox6">
                                                <input type="checkbox" value="design" name="tag[]" id="checkbox6"/>Design
                                            </label>
                                        </li>       
                                        <li>
                                            <label for="checkbox7">
                                                <input type="checkbox" value="economics" name="tag[]" id="checkbox7"/>Economics
                                            </label>
                                        </li>        
                                        <li>
                                            <label for="checkbox8">
                                                <input type="checkbox" value="education" name="tag[]" id="checkbox8"/>Education
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox9">
                                                <input type="checkbox" value="engineering" name="tag[]" id="checkbox9"/>Engineering
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox10">
                                                <input type="checkbox" value="EA" name="tag[]" id="checkbox10"/>Entertaintment &amp; Arts
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox11">
                                                <input type="checkbox" value="geoscience" name="tag[]" id="checkbox11"/>Geoscience
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox12">
                                                <input type="checkbox" value="history" name="tag[]" id="checkbox12"/>History
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox13">
                                                <input type="checkbox" value="law" name="tag[]" id="checkbox13"/>Law
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox14">
                                                <input type="checkbox" value="linguistics" name="tag[]" id="checkbox14"/>Linguistics
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox15">
                                                <input type="checkbox" value="literature" name="tag[]" id="checkbox15"/>literature
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox16">
                                                <input type="checkbox" value="mathematics" name="tag[]" id="checkbox16"/>Mathematics
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox17">
                                                <input type="checkbox" value="Medicine" name="tag[]" id="checkbox17"/>Medicine
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox18">
                                                <input type="checkbox" value="linguistics" name="tag[]" id="checkbox18"/>Linguistics
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox19">
                                                <input type="checkbox" value="philosophy" name="tag[]" id="checkbox19"/>Philosophy
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox20" for="checkbox1">
                                                <input type="checkbox" value="physics" name="tag[]" id="checkbox20"/>Physics
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox21">
                                                <input type="checkbox" value="PS" name="tag[]" id="checkbox21"/>Political Science
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox22">
                                                <input type="checkbox" value="psychology" name="tag[]" id="checkbox22"/>Psychology
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox23">
                                                <input type="checkbox" value="RS" name="tag[]" id="checkbox23"/>Religious Studies
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox24">
                                                <input type="checkbox" value="socialScience" name="tag[]" id="checkbox24"/>Social Science
                                            </label>
                                        </li>
                                        <li>
                                            <label for="checkbox25">
                                                <input type="checkbox" value="spaceScience" name="tag[]" id="checkbox25"/>Space Science
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                
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
                <footer><a href="index.php">About Us</a> <p> | </p> &copy; Convo 2022 All rights reserved.</footer>
            </div>
        </div>
        
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="arrow up"></i><br></button>
            
        <?php require APPROOT . '/views/inc/footer.php'; ?>