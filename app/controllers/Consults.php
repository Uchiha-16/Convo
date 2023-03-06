<?php
    class Consults extends Controller {
        public function __construct() {
            $this->consultsModel = $this -> model('consultsM');
        }

        public function index(){
            // $blogs = $this->blogsModel->getBlogs();
            $data = [
                // 'blogs' => $blogs
            ];
            $this->view('consults/index', $data);
        }

        public function add(){
            $data = [];
            $this->view('consults/add', $data);
        }

        public function requests(){
            $data = [];
            $this->view('consults/requests', $data);
        }
    }

?>