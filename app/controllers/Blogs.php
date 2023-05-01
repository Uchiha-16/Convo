<?php
    class Blogs extends Controller {
        private $blogsModel;
        public function __construct() {
            $this->blogsModel = $this -> model('blogsM');
        }

        public function index(){
            // $blogs = $this->blogsModel->getBlogs();
            $data = [
                // 'blogs' => $blogs
            ];
            $this->view('blogs/index', $data);
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                date_default_timezone_set('Asia/Colombo');
                $tag = isset($_POST['tag']) ? $_POST['tag'] : '0';
                
                //Input Data
                $data = [
                    'title' => trim($_POST['title']),
                    'content' => trim($_POST['content']),
                    'tag' => $tag,
                    'rating' => 0,
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
                    if($this->blogsModel->add($data)) {
                        $users = $this->blogsModel->getUsers();
                        $LastID = $this->blogsModel->getLastID();

                        foreach($data['tag'] as $tag){
                           if(!($this->blogsModel->questionTag($tag, $LastID->BID)))
                            {
                                die('Something went wrong with inserting the tags');
                            }
                        }

                        foreach($users as $user){
                            $this->blogsModel->addRating($user->userID, $LastID->BID, 0);
                        }
                            flash('reg_flash','Question Added Successfully');
                            redirect('blogs/myblogs');
                        
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('blogs/add', $data);
                }
            }
            else {
                $data = [
                    'title' => '',
                    'content' => '',
                    'tag' => '',
                    'rating' => '',
                    'title_err' => '',
                    'content_err' => '',
                    'tag_err' => '',
                ];
                $this->view('blogs/add', $data);
            }
        }

    }

?>