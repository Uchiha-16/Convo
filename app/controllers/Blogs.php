<?php
    class Blogs extends Controller {
        private $blogsModel;
        public function __construct() {
            $this->blogsModel = $this -> model('blogsM');
        }

        public function index(){
            $blogs = $this->blogsModel->getBlogs();
            $data = [
                'blogs' => $blogs
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
                    'tag'=>$tag,
                    'thumbnail' => ($_FILES['thumbnail']),
                    'thumbnail_name' => time().'_'.($_FILES['thumbnail']['name']),
                    'rating' => 0,
                    'title_err' => '',
                    'thumbnail_err' => '',
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

                if($data['thumbnail']['size'] > 0){
                    if(uploadImage($data['thumbnail']['tmp_name'], $data['thumbnail_name'], '/img/headImg/')) {
                        //done
                    }else{
                        $data['thumbnail_err'] = 'Something Went Wrong when uploading the image';
                    }
                }else{
                    $data['thumbnail_name'] = null;
                }

                // if(empty($data['tag_err'])){
                //     foreach($data['tag'] as $tag){
                //        $experts =  $this->questionModel->getExpertID($tag);

                //     }
                // }

                // Make sure errors are empty
                if(empty($data['title_err']) && empty($data['content_err']) && empty($data['tag_err']) && empty($data['thumbnail_err'])) {
                    // Adding Question
                    if($this->blogsModel->add($data)) {
                       // $users = $this->blogsModel->getUsers();
                        $LastID = $this->blogsModel->getLastID();

                        foreach($data['tag'] as $tag){
                           if(!($this->blogsModel->blogTag($tag, $LastID->BID)))
                            {
                                die('Something went wrong with inserting the tags');
                            }
                        }

                        // foreach($users as $user){
                        //     $this->blogsModel->addRating($user->userID, $LastID->BID, 0);
                        // }
                            flash('reg_flash','BLog Added Successfully');
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
                    'thumbnail' => '',
                    'thumbnail_name' => '',
                    'rating' => '',
                    'title_err' => '',
                    'content_err' => '',
                    'thumbnail_err' => '',
                    'tag_err' => '',
                ];
                $this->view('blogs/add', $data);
            }
        }

        public function viewblog($BID){
            $blog = $this->blogsModel->viewtheblog($BID);
            $blogtags = $this->blogsModel->viewblogtags($BID);
            $data = [
                'blogs' => $blog,
                'viewtags' => $blogtags
            ];
            $this->view('blogs/blogpage', $data);
        }

    }

?>