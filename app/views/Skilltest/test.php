<?php require APPROOT .'/views/inc/header.php'; ?> 
<link href="<?php echo URLROOT;?>/css/event.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo URLROOT; ?>/css/skill.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    <?php if (($_SESSION['role']) == 'seeker') : ?><?php elseif (($_SESSION['role']) == 'expert') : ?>.nav {
        grid-template-columns: 5% 6% 6% 6% 51% 10% 4% 4% 4%;
    }

    <?php endif; ?>
</style>


<script type="text/javascript">
   
</script>

</head>

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
                <div class="quiz-container" id="quiz">
                          <div class="quiz-header">
                            <?php if(isset($data['test'])): ?>
                              <form method="POST" action="<?php echo URLROOT; ?>/SkillTest/submit">
                                <?php
                                //  var_dump($correctAnswer);
                                  $questions = $data['test'];
                                  // var_dump($questions);
                                  $totalQuestions = count($questions);
                                  
                                ?>
                                <div class="question"></div>
                                <br><br>
                                <button type="button" id="prevBtn" onclick="prevQuestion()" style="display:none">Previous</button>
                                <button type="button" id="nextBtn" onclick="nextQuestion()">Next</button>
                                <button type="submit" id="submitBtn" style="display:none">Submit</button>
                              </form>
                            <?php endif; ?>
                          </div>
                        </div>

                    
<script>
  var currentIndex = 0;
  var totalQuestions = <?php echo $totalQuestions ?>;
  var questions = <?php echo json_encode($questions) ?>;

  function prevQuestion() {
    currentIndex--;
    showQuestion();
  }

  function nextQuestion() {
    currentIndex++;
    showQuestion();
  }

  function showQuestion() {
    var currentQuestion = questions[currentIndex];
    var questionDiv = document.querySelector('.question');
    var prevBtn = document.querySelector('#prevBtn');
    var nextBtn = document.querySelector('#nextBtn');
    var submitBtn = document.querySelector('#submitBtn');

    // Show/hide next/prev buttons based on current index
    if (currentIndex == 0) {
      prevBtn.style.display = 'none';
    } else {
      prevBtn.style.display = 'inline-block';
    }

    if (currentIndex == totalQuestions-1) {
      nextBtn.style.display = 'none';
      submitBtn.style.display = 'inline-block';
    } else {
      nextBtn.style.display = 'inline-block';
      submitBtn.style.display = 'none';
    }

    // Show current question
    if (currentQuestion) {
      questionDiv.innerHTML = '';
      var questionHeader = document.createElement('h3');
      questionHeader.innerHTML = currentQuestion.question;
      questionDiv.appendChild(questionHeader);

      currentQuestion.answers.forEach(function(answer) {
        var label = document.createElement('label');
        var input = document.createElement('input');
        input.type = 'radio';
        input.name = 'answers[' + currentQuestion.QPID + ']';
        input.value = answer.content;
        if (currentQuestion.selectedAnswer && currentQuestion.selectedAnswer == answer.content) {
        input.checked = true;
      }
        label.appendChild(input);
        label.appendChild(document.createTextNode(answer.content));
        questionDiv.appendChild(label);

        // Add an event listener to track the selected answer for this question
        input.addEventListener('click', function() {
        currentQuestion.selectedAnswer = answer.content;
      });

      });
    }
  }

  showQuestion();
</script>


  
                </div>


                <div class="RHS">
                      <div class="progress-bar">
                        <div class="cirlce-container">
                        <?php foreach($data['test'] as $key => $question): ?>
                            <div class="circle <?php echo ($key === array_key_first($data['test'])) ? 'active' : ''; ?>"><?php echo $key + 1; ?></div>
                          <?php endforeach; ?>
                          
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
          const circles = document.querySelectorAll('.circle');
          const nextButton = document.querySelector('#nextBtn');
          const prevButton = document.querySelector('#prevBtn');
          let currentQuestion = 0;

          nextButton.addEventListener('click', () => {
            if (currentQuestion < circles.length - 1) {
              circles[currentQuestion].classList.remove('active');
              currentQuestion++;
              circles[currentQuestion].classList.add('active');
            }
          });

          prevButton.addEventListener('click', () => {
            if (currentQuestion > 0) {
              circles[currentQuestion].classList.remove('active');
              currentQuestion--;
              circles[currentQuestion].classList.add('active');
            }
          });

</script>



    </body>

       


    
