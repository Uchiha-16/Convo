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

                if($resourceID != '0'){
                    $resourceID = implode(',', $resourceID);
                }

                

                //Input Data
                $data = [
                    'title' => trim($_POST['title']),
                    'content' => trim($_POST['content']),
                    'tag' => $tag,
                    'date' => date('Y-m-d H:i:s'),
                    'visibility' => $checkbox_value,
                    'rating' => 0,
                    'resourceID' => $resourceID,    
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
                        $LastID = $this->questionModel->getLastID();
                        foreach($data['tag'] as $tag){
                           if(!($this->questionModel->questionTag($tag, $LastID->QID)))
                            {
                                die('Something went wrong with inserting the tags');
                            }
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
                    'resourceID' => '',
                    'title_err' => '',
                    'content_err' => '',
                    'tag_err' => '',
                ];
                $this->view('questions/add', $data);
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
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');
                $checkbox_value = isset($_POST['visibility']) ? 'anonymus' : 'public';
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';
                $resourceID = isset($_POST['resourceID']) ? $_POST['resourceID'] : '0';
                
                //Input Data
                $data = [
                    'QID' => $QID,
                    'title' => trim($_POST['title']),
                    'content' => trim($_POST['content']),
                    'tag' => $tag,
                    'date' => date('Y-m-d H:i:s'),
                    'visibility' => $checkbox_value,
                    'resourceID' => $resourceID,    
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
                    // Updating the Question
                    $this->questionModel->deleteQuestionTag($QID);
                    if($this->questionModel->edit($data)) {
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

                $data = [
                    'QID' => $QID,
                    'title' => $question->title,
                    'content' => $question->content,
                    'tag' =>  $question->tags,
                    'visibility' => $question->visibility,
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
        
    }
?>