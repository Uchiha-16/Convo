<?php
    class Projects extends Controller {
        public function __construct() {
            $this->projectModel = $this -> model('projectsM');
        }

        public function add(){

            $userID = $_SESSION['userID'];

            $tags = $this->projectModel->getUserTags($userID);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';
                //$resourceID = isset($_POST['resourceID']) ? $_POST['resourceID'] : '0';

                //Input Data
                $data = [
                    'title' => trim($_POST['title']),
                    'description' => trim($_POST['description']),
                    'slot' => trim($_POST['slot']),
                    'tag' => $tag,
                    'deadline' => date('Y-m-d H:i:s'),
                    'type' => $_POST['type'],
                    'availability' => $_POST['availability'],
                    'duration' => $_POST['duration'],
                    'payment' => $_POST['payment'],
                  //  'resourceID' => $resourceID,
                    'title_err' => '',
                    'description_err' => '',
                    'tag_err' => '',
                    'slot_err' => '',
                    'duration_err' => '',
                    'tags' => $tags

                ];

                //validate each inputs
                // Validate Title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter Title';
                }

                // Validate Description
                if(empty($data['description'])) {
                    $data['description_err'] = 'Please enter Description';
                }

                // Validate Tag
                if($data['tag'] == '0') {
                    $data['tag_err'] = 'Please Select One Specific Tag';
                }

                // Validate Slot
                if(empty($data['slot'])) {
                    $data['slot_err'] = 'Please enter Slot';
                }

                // Validate Duration
                if(empty($data['duration'])) {
                    $data['duration_err'] = 'Please enter Duration';
                }

                if(empty($data['tag_err'])){
                    foreach($data['tag'] as $tag){
                       $experts =  $this->projectModel->getExpertID($tag);

                    }
                }

                //Make sure errors are empty
                if(empty($data['title_err']) && empty($data['content_err']) && empty($data['tag_err'])) {
                    // Adding Question
                    if($this->projectModel->add($data)) {
                        $LastID = $this->projectModel->getLastID();
                        foreach($data['tag'] as $tag){
                           if(!($this->projectModel->projectTag($tag, $LastID->QID)))
                            {
                                die('Something went wrong with inserting the tags');
                            }
                        }
                            flash('reg_flash','Project Added Successfully');
                            redirect('projects/home');
                        
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('projects/add', $data);
                }
            }
            else {
                $data = [
                    'title' => '',
                    'description' => '',
                    'slot' => '',
                    'type' => '',
                    'availability' => '',
                    'duration' => '',
                    'payment' => '',
                    'deadline' => '',
                    'resourceID' => '',
                    'title_err' => '',
                    'content_err' => '',
                    'tag_err' => '',
                    'tags' => $tags,
                ];
                $this->view('projects/add', $data);
            }
        }

        public function viewAllProjects(){
            $projects = $this->projectModel->getAllProjects();
            //$userDetails = $this->projectModel->getAllUsers($userID);
            $data = [
                'projects' => $projects
                //'userDetails' => $userDetails
            ];
            $this->view('projects/home', $data);
        }

        public function viewMyProjects(){
            $userID = $_SESSION['userID'];
            $projects = $this->projectModel->getMyProjects();
            //$userDetails = $this->projectModel->getAllUsers($userID);
            $data = [
                'projects' => $projects
                
            ];
            $this->view('projects/myProjects', $data);
        }


        //--------------------------------------edit my projects--------------------------------------------
        public function edit($PID){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';
                //$resourceID = isset($_POST['resourceID']) ? $_POST['resourceID'] : '0';

                //Input Data
                $data = [
                    'PID' => $PID,
                    'title' => trim($_POST['title']),
                    'description' => trim($_POST['description']),
                    'slot' => trim($_POST['slot']),
                    'tag' => $tag,
                    'deadline' => date('Y-m-d H:i:s'),
                    'type' => $_POST['type'],
                    'availability' => $_POST['availability'],
                    'duration' => $_POST['duration'],
                    'payment' => $_POST['payment'],
                  //  'resourceID' => $resourceID,
                    'title_err' => '',
                    'description_err' => '',
                    'tag_err' => '',
                    'slot_err' => '',
                    'duration_err' => '',
                    'tags' => $tags

                ];

                //validate each inputs
                // Validate Title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter Title';
                }

                // Validate Description
                if(empty($data['description'])) {
                    $data['description_err'] = 'Please enter Description';
                }

                // Validate Tag
                if($data['tag'] == '0') {
                    $data['tag_err'] = 'Please Select One Specific Tag';
                }

                // Validate Slot
                if(empty($data['slot'])) {
                    $data['slot_err'] = 'Please enter Slot';
                }

                // Validate Duration
                if(empty($data['duration'])) {
                    $data['duration_err'] = 'Please enter Duration';
                }

                if(empty($data['tag_err'])){
                    foreach($data['tag'] as $tag){
                       $experts =  $this->projectModel->getExpertID($tag);

                    }
                }

                //Make sure errors are empty
                if(empty($data['title_err']) && empty($data['content_err']) && empty($data['tag_err'])) {
                    // Adding Question
                    if($this->projectModel->edit($data)) {
                        $LastID = $this->projectModel->getLastID();
                        foreach($data['tag'] as $tag){
                           if(!($this->projectModel->projectTag($tag, $LastID->PID)))
                            {
                                die('Something went wrong with inserting the tags');
                            }
                        }
                            flash('reg_flash','Project Updated Successfully');
                            redirect('projects/viewMyProjects');
                        
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('projects/edit', $data);
                }
            }
            else {

                $project = $this->projectModel->getProjectByID($PID);
                
                if($project->userID != $_SESSION['userID']){
                    redirect('projects/viewMyProjects');
                }

                $data = [
                    'title' => '',
                    'description' => '',
                    'slot' => '',
                    'type' => '',
                    'availability' => '',
                    'duration' => '',
                    'payment' => '',
                    'deadline' => '',
                    //'resourceID' => '',
                    'title_err' => '',
                    'content_err' => '',
                    'tag_err' => '',
                    'tags' => $tags,
                ];
                $this->view('projects/edit', $data);
            }
        }

        public function delete($PID){
            $project = $this->projectModel->getProjectByID($PID);
            if($project->userID != $_SESSION['userID']){
                redirect('projects/viewMyProjects');
            }
            if($this->projectModel->delete($PID)){
                flash('reg_flash','Project Deleted Successfully');
                redirect('projects/viewMyProjects');
            } else {
                die('Something went wrong');
                redirect('projects/viewMyProjects');
            }
        }
    }




?>