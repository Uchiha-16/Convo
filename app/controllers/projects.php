<?php
    class Projects extends Controller {
        private $projectModel;
        public function __construct() {
            $this->projectModel = $this -> model('projectsM');
        }
        
        public function index(){
            //$projects = $this->projectModel->getProjects();
            $data = [
                //'projects' => $projects
            ];
            $this->view('projects/index', $data);
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
                
                //Input Data
                $data = [
                    'title' => trim($_POST['title']),
                    'description' => trim($_POST['description']),
                    'slot' => trim($_POST['slot']),
                    'tags' => $tag,
                    'deadline' => date('Y-m-d H:i:s'),
                    'type' => $_POST['type'],
                    'availability' => $_POST['availability'],
                    'duration' => $_POST['duration'],
                    'payment' => $_POST['payment'],
                    'title_err' => '',
                    'description_err' => '',
                    'tag_err' => '',
                    'slot_err' => '',
                    'duration_err' => '',
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

                // if(empty($data['tag_err'])){
                //     foreach($data['tag'] as $tag){
                //        $experts =  $this->projectModel->getExpertID($tag);

                //     }
                // }

                //Make sure errors are empty
                if(empty($data['title_err']) && empty($data['content_err']) && empty($data['tag_err'])) {
                    // Adding Project
                    if($this->projectModel->add($data)) {
                        $LastID = $this->projectModel->getLastID();
                        $tag = $data['tags'];
                           if(!($this->projectModel->projectTag($tag, $LastID->PID)))
                            {
                                die('Something went wrong with inserting the tags');
                            }
                        
                            flash('reg_flash','Project Added Successfully');
                            redirect('projects/viewMyProjects');
                        
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
                'projects' => $projects,
                //'userDetails' => $userDetails
            ];
            $this->view('projects/home', $data);
        }

        public function viewMyProjects(){
            $userID = $_SESSION['userID'];
            $projects = $this->projectModel->getMyProjects();
            //$userDetails = $this->projectModel->getAllUsers($userID);
            $data = [
                'projects' => $projects,
                
            ];
            $this->view('projects/myProjects', $data);
        }


        //--------------------------------------edit my projects--------------------------------------------
        public function edit($PID){
            $userID = $_SESSION['userID'];
            $tags = $this->projectModel->getUserTags($userID);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';
                
                //Input Data
                $data = [
                    'PID' => $PID,
                    'title' => trim($_POST['title']),
                    'description' => trim($_POST['description']),
                    'slot' => trim($_POST['slot']),
                    'tags' => $tag,
                    'deadline' => date('Y-m-d H:i:s'),
                    'type' => $_POST['type'],
                    'availability' => $_POST['availability'],
                    'duration' => $_POST['duration'],
                    'payment' => $_POST['payment'],
                    'title_err' => '',
                    'description_err' => '',
                    'tag_err' => '',
                    'slot_err' => '',
                    'duration_err' => '',
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
                if($data['tags'] == '0') {
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

                // if(empty($data['tag_err'])){
                //     foreach($data['tag'] as $tag){
                //        $experts =  $this->projectModel->getExpertID($tag);

                //     }
                // }

                //Make sure errors are empty
                if(empty($data['title_err']) && empty($data['content_err']) && empty($data['tag_err'])) {
                    // Adding Question
                    if($this->projectModel->editProject($data)) {
                        $LastID = $this->projectModel->getLastID();
                        $tag = $data['tags'];
                           if(!($this->projectModel->projecttag($tag, $LastID->$PID)))
                            {
                                die('Something went wrong with inserting the tags');
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
                
                if($project->expertID != $_SESSION['userID']){
                    redirect('projects/viewMyProjects');
                }

                //print_r($project);
                //$tag = isset($_POST['tag']) ? $_POST['tag'] : '0';
                
                $data = [
                    'PID' => $PID,
                    'title' => $project->title,
                    'description' => $project->description,
                    'slot' => $project->availableslot,
                    'type' => $project->type,
                    'availability' => $project->availability,
                    'duration' => $project->duration,
                    'payment' => $project->payment,
                    'deadline' => $project->deadline,
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
            if($project->expertID != $_SESSION['userID']){
                redirect('projects/viewMyProjects');
            }
            if($this->projectModel->deleteProject($PID)){
                flash('reg_flash','Project Deleted Successfully');
                redirect('projects/viewMyProjects');
            } else {
                die('Something went wrong');
                redirect('projects/viewMyProjects');
            }
        }

        public function apply($PID){
            //echo $_SERVER['REQUEST_METHOD'];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');
            
                $userID = $_SESSION['userID'];

                //$userDetails = $this->projectModel->getAllUsers($userID);
                
                $data = [
                    'PID'=> $PID,
                    'userID'=>$userID,
                    //'projects' => $projects,
                    'cv_file' => ($_FILES['cv_file']),
                    'file_name' => time().'_'.($_FILES['cv_file']['name']),
                    'file_err' => '',
                    'description'=> trim($_POST['description']),
                    'description_err' => ''    
                ];
                
                
                // //validate File
                // if(empty($data['cv_file'])) {
                //     $data['file_err'] = 'Please upload your Resume';
                // }
                if(uploadFile($data['cv_file']['tmp_name'], $data['file_name'], '/files/cv/')) {
                    $data['cv_file'] = $data['file_name'];
                }else{
                    $data['file_err'] = 'Please upload your Resume';
                }

                // Validate Description
                if(empty($data['description'])) {
                    $data['description_err'] = 'Please enter Description';
                }

                if(empty($data['file_err']) && empty($data['description_err'])) {
                    // Applying project
                    if($this->projectModel->applyProject($data)) {
                        flash('reg_flash','Project Applied Successfully');
                        redirect('projects/viewAllProjects');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('projects/apply-project', $data);
                }

            }else{
                $data = [
                    'PID' => $PID,
                    'userID' => $_SESSION['userID'],
                    'cv_file' => '',
                    'file_name' => '',
                    'file_err' => '',
                    'description' => '',
                    'description_err' => ''
                ];
                $this->view('projects/apply-project', $data);
            }
        }

        public function applications($PID){
            $project = $this->projectModel->getProjectByID($PID);
            if($project->expertID != $_SESSION['userID']){
                redirect('projects/viewMyProjects');
            }
            $applications = $this->projectModel->getApplications($PID);
            $data = [
                'applications' => $applications
            ];
            $this->view('projects/applications', $data);
        }
    }

?>