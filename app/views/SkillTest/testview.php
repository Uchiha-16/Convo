<?php
session_start();
?>

<html lang="en">
<head>
 <!-- meta tags -->
 <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
        <meta name="description" content="Online Forum">
        <meta charset="UTF-8">

        <!--<meta name="keywords" content="Forum, Question, Answer">-->

        <!-- Title -->
        <title>Skill Test</title>
        <link rel="icon" type="images/icon" href="<?php echo URLROOT; ?>/img/logoIcon.png">

        <!-- stylesheets -->
        <link href="../stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <link href="../stylesheets/landing.css" rel="stylesheet" type="text/css"/>
        <link href="../stylesheets/page.css" rel="stylesheet" type="text/css"/>
        <link href="../stylesheets/skill.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
        <link rel="stylesheet" href="../stylesheets/mobile.css" rel="stylesheet" type="text/css">
        <script src="../scripts/index.js" crossorigin="anonymous"></script>

        <!-- scripts -->
        <script src="https://kit.fontawesome.com/a061f2abcc.js" crossorigin="anonymous"></script>
        <!-- <script type="text/javascript" src="quiz.js"></script> -->
        <script>
            function confirmation(){
                    if(confirm("Are you sure you want to discard this report?")){
                        window.location.href = "home.php";
                    }
                }

        </script>
    </head>
<body>


<!-- nav bar -->
        <div class="nav">
            <div><a href="#"><img src="<?php echo URLROOT; ?>/img/logo%20with%20name%20WHITE%201.png" id="logo"></a></div>
            <div class="nav-hover"><a href="./home.php">Home</a></div>
            <div class="nav-hover"><a href="">Events</a></div>
            <div><input type="search" name="search" placeholder="Search for questions..."/></div>
            <div class="dropdown-list">
                <button class="dropbtn dropbtn-1" onclick="drop()"><img src="<?php echo URLROOT; ?>/img/plus.png" class="icon"> Add New</button>
                <div class="dropdown-content" id="myDropdown">
                    <!-- <a href="./addQuestion.php">Question</a> -->
                    <a href="./addBlog.php">Blog</a>
                    <a href="#">Project</a>
                    <a href="../report/addReport.php" style="border-bottom:none">Report or Complaint</a>
                </div>
            </div>
            <div class="nav-hover"><img src="<?php echo URLROOT; ?>/img/notification.png" class="nav-icon"></div>
            <div class="nav-hover"><img src="<?php echo URLROOT; ?>/img/chat.png" class="nav-icon"></div>
            <div class="nav-hover dropbtn" onclick="drop2()">
                <img class="dropbtn" src="<?php echo URLROOT; ?>/img/profile.png" class="nav-icon" style="width: 25px;">
                <div class="dropdown-content dropdown-content2" id="myDropdown2">
                    <a href="#">Profile</a>
                    <!-- <a href="#">Approvals</a> -->
                    <!-- <a href="#">Blogs</a> -->
                    <!-- <a href="#">Projects</a> -->
                    <!-- <a href="#">Skill Test</a> -->
                    <!-- <a href="#">Subscription</a> -->
                    <!-- <a href="#">Report or Complaint</a> -->
                    <!-- <a href="#">Subscription</a> -->
                    <a href="subscription.php">Subscription</a>
                    <a href="logout.php" style="border-bottom:none">Log-out</a>
                    
                </div>
            </div> 
        </div>


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
<div class="grid">
<div class="quiz-container" id="quiz">
    <div class="quiz-header">
      <h2 id="question">Question Text</h2>
      <ul>
        <li>
          <input type="radio" name="answer" id="a" class="answer">
          <label for="a" id="a_text">Answer</label>
        </li>
        <li>
          <input type="radio" name="answer" id="b" class="answer">
          <label for="b" id="b_text">Answer</label>
        </li>
        <li>
          <input type="radio" name="answer" id="c" class="answer">
          <label for="c" id="c_text">Answer</label>
        </li>
        <li>
          <input type="radio" name="answer" id="d" class="answer">
          <label for="d" id="d_text">Answer</label>
        </li>
      </ul>
    </div>
    <button id="submit">Submit</button>
  </div>


  <!-- <div class="v_line"></div>
  <di class="status-box">
    <h2 style="font-size: 20px">Answer Status</h2>
    <div class="q_num-box">
            <div class="numbox">
                  1
            </div> -->





<!--for a one-->
<!-- <script> 
  var element= document.getElementById("numbox");
    var clone = element.cloneNode(true);
    clone.id="numbox1"
    element.after(clone);
</script> -->

<!--for multiple-->
<!-- <script>
     var i=1;
        while(i<5)
            {
    var element= document.getElementByClassName("numbox");
    var clone = element.cloneNode(true);
    clone.class="numbox"+i;
    element.after(clone);
        i=i+1;        
            }
</script> -->
    </div>
  </div>

</div>

<script>
                const quizData = [
                {
                    question: "Which language runs in a web browser?",
                    a: "Java",
                    b: "C",
                    c: "Python",
                    d: "javascript",
                    correct: "d",
                },
                {
                    question: "What does CSS stand for?",
                    a: "Central Style Sheets",
                    b: "Cascading Style Sheets",
                    c: "Cascading Simple Sheets",
                    d: "Cars SUVs Sailboats",
                    correct: "b",
                },
                {
                    question: "What does HTML stand for?",
                    a: "Hypertext Markup Language",
                    b: "Hypertext Markdown Language",
                    c: "Hyperloop Machine Language",
                    d: "Helicopters Terminals Motorboats Lamborginis",
                    correct: "a",
                },
                {
                    question: "What year was JavaScript launched?",
                    a: "1996",
                    b: "1995",
                    c: "1994",
                    d: "none of the above",
                    correct: "b",
                },
            ];
            const quiz= document.getElementById('quiz')
            const answerEls = document.querySelectorAll('.answer')
            const questionEl = document.getElementById('question')
            const a_text = document.getElementById('a_text')
            const b_text = document.getElementById('b_text')
            const c_text = document.getElementById('c_text')
            const d_text = document.getElementById('d_text')
            const submitBtn = document.getElementById('submit')
            let currentQuiz = 0
            let score = 0
            loadQuiz()
            function loadQuiz() {
                deselectAnswers()
                const currentQuizData = quizData[currentQuiz]
                questionEl.innerText = currentQuizData.question
                a_text.innerText = currentQuizData.a
                b_text.innerText = currentQuizData.b
                c_text.innerText = currentQuizData.c
                d_text.innerText = currentQuizData.d
            }
            function deselectAnswers() {
                answerEls.forEach(answerEl => answerEl.checked = false)
            }
            function getSelected() {
                let answer
                answerEls.forEach(answerEl => {
                    if(answerEl.checked) {
                        answer = answerEl.id
                    }
                })
                return answer
            }
            submitBtn.addEventListener('click', () => {
                const answer = getSelected()
                if(answer) {
                if(answer === quizData[currentQuiz].correct) {
                    score++
                }
                currentQuiz++
                if(currentQuiz < quizData.length) {
                    loadQuiz()
                } else {
                    quiz.innerHTML = `
                    <h2 style="color:#15637C">You answered ${score}/${quizData.length} questions correctly</h2>
                    <button onclick="location.reload()">Reload</button>
                    <button> <a href="sboard.php">View Scoreboard</a></button>
                    
                    `
                }
                }
            })
</script>

<!-- <script>
       let numbox = document.querySelector('.numbox');
          for(let x = 0; x < 3; x++) {
             let clone = box.cloneNode(true);
             document.body.appendChild(clone)
            }
</script> -->

<!-- <script>
      let menuItem = document.querySelector('#numbox');
      let clonedMenu = menuItem.cloneNode(true);
      clonedMenu.id = 'mobile_menu';
      document.body.appendChild(clonedMenu);
</script> -->

</body>
  </html>