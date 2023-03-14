<?php
    class Projects extends Controller {
        public function __construct() {
            $this->projectsModel = $this -> model('projectsM');
        }

        public function index(){
            // $blogs = $this->blogsModel->getBlogs();
            $data = [
                // 'blogs' => $blogs
            ];
            $this->view('projects/index', $data);
        }

        public function add(){
            $data = [];
            $this->view('projects/add', $data);
        }

    }

?>