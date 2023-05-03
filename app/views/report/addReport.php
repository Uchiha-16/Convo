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
                                <td>
                                    <input id="font-size" type="number" value="16" min="1" max="100" onchange="f1(this)">
                                    <button type="button" onclick="f2(this)">
                                        <i class="fa-solid fa-bold"></i>&nbsp;
                                    </button>
                                    <button type="button" onclick="f3(this)">
                                        <i class="fa-solid fa-italic"></i>&nbsp;
                                    </button>
                                    <button type="button" onclick="f4(this)">
                                        <i class="fa-solid fa-underline"></i>&nbsp;
                                    </button>
                                    <button type="button" onclick="f5(this)">
                                        <i class="fa-solid fa-align-left"></i>&nbsp;
                                    </button>
                                    <button type="button" onclick="f6(this)">
                                        <i class="fa-solid fa-align-center"></i>&nbsp;
                                    </button>
                                    <button type="button" onclick="f7(this)">
                                        <i class="fa-solid fa-align-right"></i>&nbsp;
                                    </button>
                                    <button type="button" onclick="f8(this)">
                                        aA
                                    </button>
                                    <button type="button" onclick="f9(this)">
                                        <i class="fa-solid fa-text-slash"></i>&nbsp;
                                    </button>
                                    <input type="color" onchange="f10(this)">
                                
            
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <textarea rows="12" cols="100" placeholder="" name="description" required></textarea><br><br>
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

<script>
   // Function to change font size
function f1(input) {
  var size = input.value + "px";
  document.execCommand("fontSize", false, size);
}

// Function to toggle bold text
function f2() {
  document.execCommand("bold", false, null);
}

// Function to toggle italic text
function f3() {
  document.execCommand("italic", false, null);
}

// Function to toggle underline text
function f4() {
  document.execCommand("underline", false, null);
}

// Function to align text to the left
function f5() {
  document.execCommand("justifyLeft", false, null);
}

// Function to align text to the center
function f6() {
  document.execCommand("justifyCenter", false, null);
}

// Function to align text to the right
function f7() {
  document.execCommand("justifyRight", false, null);
}

// Function to toggle uppercase/lowercase text
function f8() {
  document.execCommand("uppercase", false, null);
}

// Function to toggle strikethrough text
function f9() {
  document.execCommand("strikethrough", false, null);
}

// Function to change text color
function f10(input) {
  var color = input.value;
  document.execCommand("foreColor", false, color);
}

</script>

<!-- <script>
            //Get the button:
            mybutton = document.getElementById("myBtn");
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};
            function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
              } else {
                mybutton.style.display = "none";
              }
            }
            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
              document.body.scrollTop = 0; // For Safari
              document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }
        </script>
        
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
        <script>
            function addReport() {
                alert("Your Complaint Added Successfully...");
                window.location.href = "../report/addReport.php";
            }
        </script>

<script>
                    var x, i, j, l, ll, selElmnt, a, b, c;
                    /*look for any elements with the class "custom-select":*/
                    x = document.getElementsByClassName("complaint");
                    l = x.length;
                    for (i = 0; i < l; i++) {
                    selElmnt = x[i].getElementsByTagName("select")[0];
                    ll = selElmnt.length;
                    /*for each element, create a new DIV that will act as the selected item:*/
                    a = document.createElement("DIV");
                    a.setAttribute("class", "select-selected");
                    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
                    x[i].appendChild(a);
                    /*for each element, create a new DIV that will contain the option list:*/
                    b = document.createElement("DIV");
                    b.setAttribute("class", "select-items select-hide");
                    for (j = 1; j < ll; j++) {
                        /*for each option in the original select element,
                        create a new DIV that will act as an option item:*/
                        c = document.createElement("DIV");
                        c.innerHTML = selElmnt.options[j].innerHTML;
                        c.addEventListener("click", function(e) {
                            /*when an item is clicked, update the original select box,
                            and the selected item:*/
                            var y, i, k, s, h, sl, yl;
                            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                            sl = s.length;
                            h = this.parentNode.previousSibling;
                            for (i = 0; i < sl; i++) {
                            if (s.options[i].innerHTML == this.innerHTML) {
                                s.selectedIndex = i;
                                h.innerHTML = this.innerHTML;
                                y = this.parentNode.getElementsByClassName("same-as-selected");
                                yl = y.length;
                                for (k = 0; k < yl; k++) {
                                y[k].removeAttribute("class");
                                }
                                this.setAttribute("class", "same-as-selected");
                                break;
                            }
                            }
                            h.click();
                        });
                        b.appendChild(c);
                    }
                    x[i].appendChild(b);
                    a.addEventListener("click", function(e) {
                        /*when the select box is clicked, close any other select boxes,
                        and open/close the current select box:*/
                        e.stopPropagation();
                        closeAllSelect(this);
                        this.nextSibling.classList.toggle("select-hide");
                        this.classList.toggle("select-arrow-active");
                        });
                    }
                    function closeAllSelect(elmnt) {
                    /*a function that will close all select boxes in the document,
                    except the current select box:*/
                    var x, y, i, xl, yl, arrNo = [];
                    x = document.getElementsByClassName("select-items");
                    y = document.getElementsByClassName("select-selected");
                    xl = x.length;
                    yl = y.length;
                    for (i = 0; i < yl; i++) {
                        if (elmnt == y[i]) {
                        arrNo.push(i)
                        } else {
                        y[i].classList.remove("select-arrow-active");
                        }
                    }
                    for (i = 0; i < xl; i++) {
                        if (arrNo.indexOf(i)) {
                        x[i].classList.add("select-hide");
                        }
                    }
                    }
                    /*if the user clicks anywhere outside the select box,
                    then close all select boxes:*/
                    document.addEventListener("click", closeAllSelect);
</script> -->


    </body>

       
</html>

