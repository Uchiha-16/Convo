<?php
    class Skilltest extends Controller {
        private $skilltestModel;
        public function __construct() {
           
            $this->skilltestModel = $this -> model('skilltestM');
        }

    public function index(){
            // Check if user is logged in
            if (!isset($_SESSION['userID'])) {
                // Redirect to login page
                header("Location: " . URLROOT . "/users/login");
                return;
            }
        
            // Get the user ID from the session
            $userID = $_SESSION['userID'];
        
            // Get user's skill test scores
            $score = $this->skilltestModel->getTestScoreByUserId($userID);
            // var_dump($score);
            
            // Get user's tags
            $tags = $this->skilltestModel->getUserTag();
            // var_dump($tags);
            
            // Initialize the $data array
            $averageScore = $this->skilltestModel->getAverageTestScoreByUserId($userID);
            // $data['score'] = $score;
            $data = [
                'score' => $score,
                'tag' => $tags,
            ];
            $data['average_score'] = $averageScore;

            // Check if there are no scores
            if (empty($score)) {
                $data['score_error'] = 'No scores found for this user';
            } else {
                $data['score'] = $score;
            }
        
            // Check if there are no tags
            if (empty($tags)) {
                $data['tag_error'] = 'No tags found for this user';
            } else {
                $data['tag'] = $tags;
            }
            
            
            $this->view('Skilltest/index', $data);
        }
        
       

    public function test(){

        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['tag'])){
        
        $tag=$_POST['tag'];
        // var_dump($tag);
        $_SESSION['skilltest_tag'] = $tag;

        $questions = $this->skilltestModel->getTestQuestions($tag);
        $test=array();
        foreach($questions as $question){
            $test[] = array(
                'QPID' => $question->QPID,
                'question' => $question->question,
                'difficulty' => $question->difficulty,
                'answers'=> array()
            );

            $answers=$this->skilltestModel->getTestAnswers($question->QPID);
            // var_dump($answers);
            foreach ($answers as $answer){
               
                $test[count($test) - 1]['answers'][]=array(
                    'content'=>$answer->content,
                    'validity'=>$answer->validity
                );
            }
        }
        $data= array(
            'test'=>$test
        );

        $this->view('skilltest/test',$data);
        } else{

        }
    }

    public function submit()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');
            }

            $tag = $_SESSION['skilltest_tag'];
            $userID = $_SESSION['userID'];
            $date = date('Y-m-d');
            $time = date('H:i:s');

            $totalQuestions = count($_POST['answers']);
            $correctAnswers = 0;

            foreach ($_POST['answers'] as $QPID => $selectedAnswer) {
                //find the correct answer for this question
                $correctAnswer = $this->skilltestModel->getCorrectAnswerByQPID($QPID);

                //check if the selected answer is correct
                if ($selectedAnswer == $correctAnswer) {
                    //add 5 marks for each correct answer
                    $correctAnswers++;
                }
            }

            $score = $correctAnswers * 5;
            $this->skilltestModel->addSkillTest($score, $date, $time, $userID, $tag);
            $LastID = $this->skilltestModel->lastInsertedSTID();
            $this->skilltestModel->setSkilltestTag($LastID, $tag);

            $data = [
                'score' => $score,
                'tag' => $tag
            ];

            header("Location: " . URLROOT . "/skilltest/index");
    }


    public function add(){

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');
               
                

                //Input Data
                $data = [
                    
                    'content' => array_map('trim', $_POST['content']),
                    'tag' => trim($_POST['tag']),
                    'question' => trim($_POST['question']),
                    'difficulty' =>trim($_POST['difficulty']),
                    'validity'=>'',
                    'date' => date('Y-m-d H:i:s'),  
                    'content_err' => '',
                    'question_err' => '',
                    'difficulty_err'=>'',
                    'tag_err' => '',
                    'validity_err' => '',
                ];

                //validate each inputs
                
                $options = $data['content'];
                $tag=$data['tag'];
                if(is_array($options)){
                for ($i = 0; $i < count($options); $i++) {
                    if (empty($options[$i])) {
                        $data['content_err'] = 'Please Enter All Options';
                        break;
                    }
                }
                }

                // Validate Question
                if(empty($data['question'])) {
                    $data['question_err'] = 'Please enter Question';
                }

                if(empty($data['difficulty'])) {
                    $data['difficulty_err'] = 'Please Select the Difficulty Level';
                }
                
                // Validate Tag
                if(empty($data['tag'])) {
                    $data['tag_err'] = 'Please Select A Tag';
                }

                if(isset($_POST['validity']) && in_array($_POST['validity'], array('option1','option2','option3','option4'))){
                    $validity_values = array(0,0,0,0);

                    switch ($_POST['validity']){
                        case 'option1':
                            $validity_values[0]=1;
                            break;
                        case 'option2':
                            $validity_values[1]=1;
                            break;
                        case 'option3':
                            $validity_values[2]=1;
                            break;
                        case 'option4':
                            $validity_values[3]=1;
                            break;                        
                    }
                    $data['validity']= implode(',',$validity_values);
                }else{
                    $data['validity_err']='Please select the correct option';
                }

                // Make sure errors are empty
                if(empty($data['question_err']) && empty($data['difficulty_err']) && empty($data['content_err']) && empty($data['tag_err']) && empty($data['validity_err'])) {
                    // Adding Question
                    if ($this->skilltestModel->add($data)) {
                        $LastID = $this->skilltestModel->lastInsertId();
                        if (($this->skilltestModel->addAnswerpool($LastID, $data)) && ($this->skilltestModel->setQuestionpoolTag($tag,$LastID))){
                            flash('reg_flash','Question Added Successfully');
                            redirect('skilltest/add');
                        } else {
                            die('Something went wrong');
                        }
                    } else {
                        // Load view with errors
                        $this->view('skilltest/add', $data);
                    }
                }
            }    
            else {
                $data = [
                    'content' =>'',
                    'tag' => '',
                    'question' =>'',
                    'difficulty' =>'',
                    'validity'=>'',
                    'date' => '',  
                    'content_err' => '',
                    'question_err' => '',
                    'difficulty_err'=>'',
                    'tag_err' => '',
                    'validity_err' => '',
                ];
                $this->view('skilltest/add', $data);
            }
        }


    public function sQuestions(){
            $questions = $this->skilltestModel->getAddedQuestions();
            
        
            foreach ($questions as $question) {
                $QPID = $question->QPID;
                $tag = $this->skilltestModel->getQuestionPoolTag($QPID);
                // var_dump($tag);
                if(!empty($tag)){
                    $question->tag = new stdClass();
                    $question->tag->tag = $tag;
                }
                
                if (isset($question->QPID)) {
                   
                    if(!empty($QPID)){
                        // $tag = $this->skilltestModel->getQuestionPoolTag($QPID);
                        $answers = $this->skilltestModel->getTestAnswers($QPID);
                        // var_dump($answers);
                        // $question->tag =[];
                        $question->answers = [];
                        if ($answers !== null) {
                            foreach ($answers as $answer) {
                                $answerObj = new stdClass();
                                $answerObj->Answer = $answer->content;
                                $answerObj->validity = $answer->validity;
                                $question->answers[] = $answerObj;
                            }
                        }
                    }
                    // var_dump($answerObj);
                }
            }
            $data = [
                'questions' => $questions,
                'content' =>$answers,
                'tag'=>$tag
                
            ];
        
            $this->view('skilltest/sQuestions', $data);
        } 


    public function edit($QPID){
        // var_dump($QPID);
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SRTING);
                    date_default_timezone_set('Asia/Colombo');
                                        // $tag= $_POST['tag'] ? $_POST['tag'] : '0';
                    //Input new Data
                    $data = [
                        'QPID' =>$QPID,              
                        'content' => array_map('trim', $_POST['content']),
                        'tag' => trim($_POST['tag']),
                        'question' => trim($_POST['question']),
                        'difficulty' =>trim($_POST['difficulty']),
                        'validity'=>'',
                        'date' => date('Y-m-d H:i:s'),  
                        'content_err' => '',
                        'question_err' => '',
                        'difficulty_err'=>'',
                        'tag_err' => '',
                        'validity_err' => '',
                    ];
                    //  var_dump($QPID);
                    $tag=$data['tag'];
                    $options = $data['content'];


                    if(is_array($options)){
                    for ($i = 0; $i < count($options); $i++) {
                        if (empty($options[$i])) {
                            $data['content_err'] = 'Please Enter All Options';
                            break;
                            }
                        }
                    }

                    // Validate Question
                    if(empty($data['question'])) {
                        $data['question_err'] = 'Please enter Question';
                    }

                    if(empty($data['difficulty'])) {
                        $data['difficulty_err'] = 'Please Select the Difficulty Level';
                    }
                    
                    // Validate Tag
                    if(empty($data['tag'])) {
                        $data['tag_err'] = 'Please Select A Tag';
                    }

                    if(isset($_POST['validity']) && in_array($_POST['validity'], array('option1','option2','option3','option4'))){
                        $validity_values = array(0,0,0,0);

                        switch ($_POST['validity']){
                            case 'option1':
                                $validity_values[0]=1;
                                break;
                            case 'option2':
                                $validity_values[1]=1;
                                break;
                            case 'option3':
                                $validity_values[2]=1;
                                break;
                            case 'option4':
                                $validity_values[3]=1;
                                break;                        
                        }
                        $data['validity']= implode(',',$validity_values);
                    }else{
                        $data['validity_err']='Please select the correct option';
                    }
                   
                    if(empty($data['question_err']) && empty($data['difficulty_err']) && empty($data['content_err']) && empty($data['tag_err']) && empty($data['validity_err'])){
                        
                        $this->skilltestModel->deleteQuestionPoolTag($QPID);
                        $this->skilltestModel->setQuestionpoolTag($tag,$QPID);

                        if($this->skilltestModel->editQuestionData($data)){
                            
                         if ($this->skilltestModel->updateAnswerPool($data, $QPID))
                            { 
                                flash('reg_flash','Question Updated Successfully');
                                redirect('Skilltest/sQuestions');
                            }

                            // flash('reg_flash','Question Updated Successfully');
                            // redirect('Skilltest/sQuestions');
                        } else{
                            die('Something Went Wrong');
                        }
                    } else{
                        $this->view('Skilltest/editSquestion');
                    }
            }
            else{
                $question = $this->skilltestModel->getQuestionByID($QPID);

            
                    $QPID = $question->QPID;
                    $tag = $this->skilltestModel->getQuestionPoolTag($QPID);
                    //  var_dump($tag);
                    if(!empty($tag)){
                        $question->tag = new stdClass();
                        $question->tag->tag = $tag;
                    }
                    
                    if (isset($question->QPID)) {
                    
                        if(!empty($QPID)){
                            // $tag = $this->skilltestModel->getQuestionPoolTag($QPID);
                            $answers = $this->skilltestModel->getTestAnswers($QPID);
                            $validities= array();
                            $question->answers = [];
                            if ($answers !== null) {
                                $question->answers = [];
                                $validities = [];
                                $answerObjs = []; // declare array to hold answer objects
                                foreach ($answers as $answer) {
                                    $answerObj = new stdClass();
                                    $answerObj->Answer = $answer->content;
                                    $answerObj->validity = $answer->validity;
                                    $validities[] = $answer->validity;
                                    $answerObjs[] = $answerObj; // push answer object into array
                                }
                                $question->answers = $answerObjs; // assign array of answer objects to $question->answers
                            }
                            
                        }
                    }
// var_dump($validities);
                if($question->expertID !=$_SESSION['userID']){
                    redirect('Skilltest/sQuestions');
                }

                $data = [
                    'QPID'=>$QPID,
                    'content' =>$answerObjs,
                    'tag' => $tag,
                    'question' =>$question->question,
                    'difficulty' =>$question->difficulty,
                    'validity'=>$validities,
                    'date' => '',  
                    'content_err' => '',
                    'question_err' => '',
                    'difficulty_err'=>'',
                    'tag_err' => '',
                    'validity_err' => '',
                    'answerObjs' =>$answerObjs,
                ];
                $this->view('Skilltest/editSquestion', $data);
                
            }
    }

    
    public function delete($QPID) {
           
            // Get existing post from model
            $question = $this->skilltestModel->getQuestionByID($QPID);
           
            //check the owner of the question
            if($question->expertID != $_SESSION['userID']){
                redirect('Skilltest/sQuestions');
            }

            if($this->skilltestModel->delete($QPID)) {
                flash('reg_flash', 'Question Deleted Successfully!');
                redirect('Skilltest/sQuestions');
            } else {
                die('Something went wrong');
                redirect('Skilltest/sQuestions');
            }
    }

}   
?>