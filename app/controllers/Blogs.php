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
            $data = [];
            $this->view('blogs/add', $data);
        }

    }

?>