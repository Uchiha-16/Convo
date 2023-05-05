<?php
    class Questions extends Controller {
        private $questionModel;
        public function __construct() {
            $this->questionModel = $this -> model('questionsM');
        }

        public function add(){

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');
                $checkbox_value = isset($_POST['visibility']) ? 'anonymus' : 'public';
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';
                $resourceID = isset($_POST['rp']) ? $_POST['rp'] : '0';

                //print_r($resourceID);

                if($resourceID != '0'){
                    $resourceID = implode(',', $resourceID);
                }

                $content = $_POST['content'];
                $content = nl2br($content);
                print_r($content);
                //Input Data
                $data = [
                    'title' => trim($_POST['title']),
                    'content' => $content,
                    'tag' => $tag,
                    'date' => date('Y-m-d H:i:s'),
                    'visibility' => $checkbox_value,
                    'rating' => 0,
                    'resourceID' => $resourceID,    
                    'answercount'=> 0,
                    'title_err' => '',
                    'content_err' => '',
                    'tag_err' => '',
                ];

                //validate each inputs
                // Validate Title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter Title';
                }

                // Validate Content
                if(empty($data['content'])) {
                    $data['content_err'] = 'Please enter Content';
                }

                // Validate Tag
                if($data['tag'] == '0') {
                    $data['tag_err'] = 'Please Select One or More Tags';
                }

                // if(empty($data['tag_err'])){
                //     foreach($data['tag'] as $tag){
                //        $experts =  $this->questionModel->getExpertID($tag);

                //     }
                // }

                // Make sure errors are empty
                if(empty($data['title_err']) && empty($data['content_err']) && empty($data['tag_err'])) {
                    // Adding Question
                    if($this->questionModel->add($data)) {
                        $users = $this->questionModel->getUsers();
                        $LastID = $this->questionModel->getLastID();

                        foreach($data['tag'] as $tag){
                           if(!($this->questionModel->questionTag($tag, $LastID->QID)))
                            {
                                die('Something went wrong with inserting the tags');
                            }
                        }

                        foreach($users as $user){
                            $this->questionModel->addRating($user->userID, $LastID->QID, 0);
                        }
                            flash('reg_flash','Question Added Successfully');
                            redirect('questions/myquestions');
                        
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('questions/add', $data);
                }
            }
            else {
                $data = [
                    'title' => '',
                    'content' => '',
                    'tag' => '',
                    'date' => '',
                    'visibility' => '',
                    'rating' => '',
                    'answercount'=> '',
                    'resourceID' => '',
                    'title_err' => '',
                    'content_err' => '',
                    'tag_err' => '',
                ];
                $this->view('questions/add', $data);
            }
        }


        public function resourceName(){

            $selectedValues = $_POST['selectedValues'];

            $str = '';

            foreach($selectedValues as $tag) {
                $str = $str . 'usertag.tag = "' . $tag . '" OR ';

            }
            $str = substr($str, 0, -4);

            $data = $this->questionModel->resourceName($str);
            
            foreach($data as $d){
                echo '<li>';
                    echo '<label for="checkbox1">';
                        echo '<input type="checkbox" value="'. $d->expertID .'" name="rp[]" id="checkbox1"/>';
                        echo '<span class="checkbox">'. $d->fName ." ". $d->lName . '</span>';
                    echo '</label>';
                echo '</li>';
            }
        }

        public function myquestions(){
            $questions = $this->questionModel->getQuestions();
            
            $data = [
                'questions' => $questions,
            ];

            $this->view('questions/myQuestions', $data);
        }

        public function edit($QID){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data

                // sanitize the user input and prevent any HTML or JavaScript injection
                $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');
                
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');
                $checkbox_value = isset($_POST['visibility']) ? 'anonymus' : 'public';
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';
                $resourceID = isset($_POST['rp']) ? $_POST['rp'] : '0';
                if($resourceID != '0'){
                    $resourceID = implode(',', $resourceID);
                }
                
                //Input Data
                $data = [
                    'QID' => $QID,
                    'title' => trim($_POST['title']),
                    'content' => $content,
                    'tag' => $tag,
                    'date' => date('Y-m-d H:i:s'),
                    'visibility' => $checkbox_value,
                    'resourceID' => $resourceID,    
                    'title_err' => '',
                    'content_err' => '',
                    'tag_err' => '',
                ];

                print_r($data['content']);

                //validate each inputs
                // Validate Title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter Title';
                }

                // Validate Content
                if(empty($data['content'])) {
                    $data['content_err'] = 'Please enter Content';
                }

                // Validate Tag
                if($data['tag'] == '0') {
                    $data['tag_err'] = 'Please Select One or More Tags';
                }

                // if(empty($data['tag_err'])){
                //     foreach($data['tag'] as $tag){
                //        $experts =  $this->questionModel->getExpertID($tag);

                //     }
                // }

                // Make sure errors are empty 
                if(empty($data['title_err']) && empty($data['content_err']) && empty($data['tag_err'])) {
                    // Updating the Question
                    $this->questionModel->deleteQuestionTag($QID);
                    if($this->questionModel->edit($data, $content)) {
                        foreach($data['tag'] as $tag){
                           if(!($this->questionModel->questionTag($tag, $QID)))
                            {
                                die('Something went wrong with inserting the tags');
                            }
                        }
                            flash('reg_flash','Question Updated Successfully');
                            redirect('questions/myQuestions');
                        
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('questions/editQuestion', $data);
                }
            }
            else {

                $question = $this->questionModel->getQuestionByID($QID);
                
                
                //check the owner of the question 
                if($question->userID != $_SESSION['userID']){
                    redirect('questions/myQuestions');
                }
                
                $Experts = $this->questionModel->getExperts($question->expertID);
           
                $decodedContent = html_entity_decode($question->content);
                $strippedContent = $decodedContent;

                $data = [
                    'QID' => $QID,
                    'title' => $question->title,
                    'content' => $strippedContent,
                    'tag' =>  $question->tags,
                    'visibility' => $question->visibility,
                    'resourceID' => $Experts,
                    'title_err' => '',
                    'content_err' => '',
                    'tag_err' => '',
                ];
                $this->view('questions/editQuestion', $data);
            }
        }

        public function delete($QID) {
                // Get existing post from model 
                $question = $this->questionModel->getQuestionByID($QID);
                //check the owner of the question
                if($question->userID != $_SESSION['userID']){
                    redirect('questions/myQuestions');
                }

                if($this->questionModel->delete($QID)) {
                    flash('reg_flash', 'Question Deleted Successfully!');
                    redirect('questions/myQuestions');
                } else {
                    die('Something went wrong');
                    redirect('questions/myQuestions');
                }
        }

        public function viewR($QID){

            $rating = $this->questionModel->getRating($QID);
            $rate = round($rating->rating, 1);
            echo '<label style="font-weight:600; float:right">Overall Rating: ' . $rate .'</label>';
        }


        
    }
?>