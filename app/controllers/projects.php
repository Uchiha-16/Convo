<?php
    class Projects extends Controller {
        public function __construct() {
            $this->projectModel = $this -> model('projectsM');
        }

        public function add(){
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
                            redirect('Pages/seeker');
                        
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


    }


?>