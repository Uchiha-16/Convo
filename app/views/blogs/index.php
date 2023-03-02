<?php require APPROOT . '/views/inc/header.php'; ?>
<link href="<?php echo URLROOT; ?>/css/blog.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    <?php if (($_SESSION['role']) == 'seeker') : ?><?php elseif (($_SESSION['role']) == 'expert') : ?>.nav {
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

<div class="left">
    <h3>Publish your passions, your way...</h3>
        <div class="blog">
            <div class="userinfo">
               <div class="info_left">
                    <div class="pp" style="width: 35px;height: 35px;border-radius: 50%;overflow: hidden;">
                        <img src="<?php echo URLROOT; ?>/img/p1.jpg" id="blog-pic"></a>
                    </div>
               </div>

               <div class="info_right">
                    <p><b>Nethmini Dilshani</b></p>
                    <p style="color:#7E7E7E">University of Colombo</p>
               </div>
            </div>
            <div class="line1"></div>
            <div class="disc-box">
                    <h4 style="font-size:14px;">Apple Maps</h4>
                    <p>So, you prefer Apple Maps, but everybody else uses Google Maps. But, there are ways to open Google Maps links in Apple Maps — here's how.

                        If you own an iPhone, you've almost certainly considered whether you should use Apple Maps or Google Maps on your travels.

                        There are pros and cons to each. Google Maps benefits <span id="dots">...</span><span id="more"> from the huge amount of data harvested by Google, whereas Apple is more focused on data privacy.

                        While Google Maps integrates well with the rest of the world, Apple Maps integrates with your address book.<br><B>Why you might want to open links in Apple Maps</B><br>

                        There are two factors which put Apple Maps aficionados at a disadvantage. For one, Google search results automatically open in Google Maps. So, if you're one of the 84% of us who use Google's search engine, directions to your nearest dental surgery will pop up in Google's app instead of Apple's.

                        Secondly, with Google's dominant market reach, and Google Map's availability on nearly any device, most websites will use its API. So, if you're on that dental surgery's website and tap a link to get directions, it'll probably open in Google Maps as well.

                        Have you ever wondered whether there's a way to redirect said links to open in Apple Maps? Well, as you might have guessed from this article's title, there is. And here's how. </span></p>

                    <div><img src="<?php echo URLROOT; ?>/img/apple.jpg" id="blog-pic"></a></div>
                
                    <button id="read" onclick="read_more()" style="color:#1D8FAC">READ MORE</button>
            
            </div>
        </div>


        <div class="blog">
            <div class="userinfo">
                <div class="info_left">
                    <div class="pp" style="width: 35px;height: 35px;border-radius: 50%;overflow: hidden;">
                        <img src="<?php echo URLROOT; ?>/img/p2.jpg" id="blog-pic"></a>
                    </div>
               </div>

               <div class="info_right">
                    <p ><b>Jake Donfort</b></p>
                    <p style="color:#7E7E7E;">Trek Teck Corp:</p>
               </div>
            </div>
            <div class="line1"></div>
            <div class="disc-box">
                    <h4 style="font-size:14px;">EV maker VinFast downsizes in US, Canada</h4>
                    <p>Vietnamese electric vehicle maker VinFast is cutting jobs in the United States and Canada as part of a restructuring that will merge operations across the two countries. The restructuring comes as VinFast prepares to enter the U.S. 
                        public market and delays deliveries to its first customers in the country.
                        VinFast has not shared how many employees have been cut, but<span id="dots">...</span><span id="more"> a LinkedIn post from a former employee said “nearly 35 roles” were affected.
                        A spokesperson told Reuters the headcount in Vietnam, where most of the company’s staff and engineering ops are, would not shrink.
                        “The past 4 months have been an experience like no other,” reads the post. “From meeting and collaborating with some of the industry’s most talented professionals, to building a team
                         and program with the intention to launch a service nationwide for a startup.”
                        Note the “intention to launch” part of that statement. Neither the employee who wrote the post nor the company have responded to TechCrunch to clarify the nature of the nationwide service
                         and whether VinFast has ceased operations there, but we have some guesses.
                        A big part of VinFast’s luxury EV offering in the U.S. is the customer experience, including a mobile service network and over-the-air firmware updates. The company may have also been pursuing
                         an EV charging network in the States, something VinFast has been doing in Vietnam. Some of the affected employees who posted on LinkedIn worked in mobile service operations and EV charging infrastructure, 
                         which might signal VinFast is pulling away from launching these services in North America.
                        VinFast’s expansion strategy into international markets also includes a direct-to-consumer sales model. Many of the 150 people VinFast said it had hired in the U.S. were in sales, support and distribution roles.
                        The company, a subsidiary of conglomerate Vingroup, has been advancing into the U.S. market with four electric SUVs and potentially a sports car. Last week, VinFast said it would delay deliveries to its first U.S. customers 
                        to the second half of February as it finishes updating vehicles with the latest software.</span></p>
                    
                    <div><img src="<?php echo URLROOT; ?>/img/vinfast.jpg" id="blog-pic"></a></div>
                
                    <button id="read" onclick="read_more2()" style="color:#1D8FAC">READ MORE</button>
            
            </div>
        </div>

        <div class="blog">
            <div class="userinfo">

                <div class="info_left">
                    <div class="pp" style="width: 35px;height: 35px;border-radius: 50%;overflow: hidden;">
                        <img src="<?php echo URLROOT; ?>/img/p3.jpg" id="blog-pic"></a>
                    </div>
                </div>

                <div class="info_right">
                    <p ><b> Jacquelyn Melinek</b></p>
                    <p style="color:#7E7E7E"> Tidal Wave Technologies</p>
                </div>

            </div>
            <div class="line1"></div>
            <div class="disc-box">
                    <h4 style="font-size:14px;">Enterprise blockchain adoption may grow as hybrid use cases evolve</h4>
                    <p>Vietnamese electric vehicle maker VinFast is cutting jobs in the United States and Canada as part of a restructuring that will merge operations across the two countries. The restructuring comes as VinFast prepares to enter the U.S. 
                        public market and delays deliveries to its first customers in the country.
                        VinFast has not shared how many employees have been cut, but<span id="dots">...</span><span id="more"> a LinkedIn post from a former employee said “nearly 35 roles” were affected.
                        A spokesperson told Reuters the headcount in Vietnam, where most of the company’s staff and engineering ops are, would not shrink.
                        “The past 4 months have been an experience like no other,” reads the post. “From meeting and collaborating with some of the industry’s most talented professionals, to building a team
                         and program with the intention to launch a service nationwide for a startup.”
                        Note the “intention to launch” part of that statement. Neither the employee who wrote the post nor the company have responded to TechCrunch to clarify the nature of the nationwide service
                         and whether VinFast has ceased operations there, but we have some guesses.
                        A big part of VinFast’s luxury EV offering in the U.S. is the customer experience, including a mobile service network and over-the-air firmware updates. The company may have also been pursuing
                         an EV charging network in the States, something VinFast has been doing in Vietnam. Some of the affected employees who posted on LinkedIn worked in mobile service operations and EV charging infrastructure, 
                         which might signal VinFast is pulling away from launching these services in North America.
                        VinFast’s expansion strategy into international markets also includes a direct-to-consumer sales model. Many of the 150 people VinFast said it had hired in the U.S. were in sales, support and distribution roles.
                        The company, a subsidiary of conglomerate Vingroup, has been advancing into the U.S. market with four electric SUVs and potentially a sports car. Last week, VinFast said it would delay deliveries to its first U.S. customers 
                        to the second half of February as it finishes updating vehicles with the latest software.</span></p>
                    
                    <div><img src="<?php echo URLROOT; ?>/img/crypto.jpg" id="blog-pic"></a></div>
                
                    <button id="read" onclick="read_more3()" style="color:#1D8FAC">READ MORE</button>
            
            </div>
        </div>
</div>


<div class="right">
        <button class="new_blog"><a href="<?php echo URLROOT; ?>/Blogs/add.php" style="color:white">Add Blog</a></button>
       
        <div class="filter_box">
            <div class="filter_head">
                <i class="fa-solid fa-sliders " ></i>
                <p>Filter</p>
                <button class="go"><a href="" style="color:white">Go</a></button>
            </div>
            <div class="filters" >
                <aside>
                <div class="category-div" >
                    <h3>Category</h3>
                        <ul class="category">

                        <li><input type="checkbox" class="smaller"  value="agricultureScience" name="tag[]" id="checkbox1"/><label for="checkbox1">Agriculture Science</label></li>
                        
                        <li><input type="checkbox" class="smaller" value="anthropology" name="tag[]" id="checkbox2"/><label for="checkbox2">Anthropology</label></li>
                        
                        <li><input type="checkbox" class="smaller"value="biology" name="tag[]" id="checkbox3"/><label for="checkbox3">Biology</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="Chemistry" name="tag[]" id="checkbox4"/><label for="checkbox4">Chemistry</label></li>
                        
                        <li><input type="checkbox" class="smaller"value="CS" name="tag[]" id="checkbox5"/><label for="checkbox5">Computer Science</label></li>
                        
                        <li><input type="checkbox" class="smaller"value="design" name="tag[]" id="checkbox6"/><label for="checkbox6">Design</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="economics" name="tag[]" id="checkbox7"/><label for="checkbox7">Economics</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="education" name="tag[]" id="checkbox8"/><label for="checkbox8">Education</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="engineering" name="tag[]" id="checkbox9"/><label for="checkbox9">Engineering</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="EA" name="tag[]" id="checkbox10"/><label for="checkbox10">Entertaintment &amp; Arts</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="geoscience" name="tag[]" id="checkbox11"/><label for="checkbox11">Geoscience</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="history" name="tag[]" id="checkbox12"/><label for="checkbox12">History</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="law" name="tag[]" id="checkbox13"/><label for="checkbox13">Law</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="linguistics" name="tag[]" id="checkbox14"/><label for="checkbox14">Linguistics</label></li>
                        
                        <li><input type="checkbox" class="smaller"value="literature" name="tag[]" id="checkbox15"/><label for="checkbox15">literature</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="mathematics" name="tag[]" id="checkbox16"/><label for="checkbox16">Mathematics</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="Medicine" name="tag[]" id="checkbox17"/><label for="checkbox17">Medicine</label></li>
                        
                        <li><input type="checkbox" class="smaller"value="linguistics" name="tag[]" id="checkbox18"/><label for="checkbox18">Linguistics</label></li>
                        
                        <li><input type="checkbox" class="smaller" value="philosophy" name="tag[]" id="checkbox19"/><label for="checkbox19">Philosophy</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="physics" name="tag[]" id="checkbox20"/><label for="checkbox20" for="checkbox1">Physics</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="PS" name="tag[]" id="checkbox21"/><label for="checkbox21">Political Science</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="psychology" name="tag[]" id="checkbox22"/><label for="checkbox22">Psychology</label></li>
                        
                        <li><input type="checkbox" class="smaller"value="RS" name="tag[]" id="checkbox23"/><label for="checkbox23">Religious Studies</label></li>
                        
                        <li><input type="checkbox" class="smaller"value="socialScience" name="tag[]" id="checkbox24"/><label for="checkbox24">Social Science</label></li>
                        
                        <li><input type="checkbox"class="smaller" value="spaceScience" name="tag[]" id="checkbox25"/><label for="checkbox25">Space Science</label></li>
                    </ul>               
                </div>

                <div class="publish-div">
                    <h3>Publish date</h3>  
                        <ul class="publish">
                            <li><input type="checkbox" class="smaller"  value="agricultureScience" name="date" id="checkbox26"/><label for="checkbox1">Last 3 months</label></li>
                            <li><input type="checkbox" class="smaller"  value="agricultureScience" name="date" id="checkbox27"/><label for="checkbox1">Last 6 months</label></li>
                            <li><input type="checkbox" class="smaller"  value="agricultureScience" name="date" id="checkbox28"/><label for="checkbox1">Last Year</label></li>
                        </ul>
                </div>

            </div>
        </div>
</div>
            


<script>
    var allCheckboxes = document.querySelectorAll('input[type=checkbox]');
    var allBlogs = Array.from(document.querySelectorAll('.blog-box'));
    var checked = {};

    getChecked('tag[]');
    getChecked('date');

    Array.prototype.forEach.call(allCheckboxes, function (el) {
    el.addEventListener('change', toggleCheckbox);
    });

    function toggleCheckbox(e) {
    getChecked(e.target.name);
    setVisibility();
    }

    function getChecked(name) {
    checked[name] = Array.from(document.querySelectorAll('input[name=' + name + ']:checked')).map(function (el) {
        return el.value;
    });
    }

    function setVisibility() {
    allPlayers.map(function (el) {
        var category = checked.category.length ? _.intersection(Array.from(el.classList), checked.category).length : true;
        var publish = checked.publish.length ? _.intersection(Array.from(el.classList), checked.publish).length : true;
        // var position = checked.position.length ? _.intersection(Array.from(el.classList), checked.position).length : true;
        // var nbaTeam = checked.nbaTeam.length ? _.intersection(Array.from(el.classList), checked.nbaTeam).length : true;
        // var conference = checked.conference.length ? _.intersection(Array.from(el.classList), checked.conference).length : true;
        if (category && publish) {
        el.style.display = 'block';
        } else {
        el.style.display = 'none';
        }
    });
    }
</script>   

<script>
        function read_more() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("read");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "READ MORE"; 
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "READ LESS"; 
            moreText.style.display = "inline";
        }
        }
</script>
<script>
        function read_more2() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("read");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "READ MORE"; 
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "READ LESS"; 
            moreText.style.display = "inline";
        }
        }
</script>
<script>
        function read_more3() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("read");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "READ MORE"; 
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "READ LESS"; 
            moreText.style.display = "inline";
        }
        }
</script>
</body>