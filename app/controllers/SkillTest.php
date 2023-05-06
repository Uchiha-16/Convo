<?php
    class Skilltest extends Controller {
        private $skilltestModel;
        public function __construct() {
            $this->skilltestModel = $this -> model('skilltestM');
        }

        public function index(){
            // $blogs = $this->blogsModel->getBlogs();
            $data = [
                // 'blogs' => $blogs
            ];
            $this->view('Skilltest/index', $data);
        }

        public function test(){
            $data = [];
            $this->view('Skilltest/test', $data);
        }

    }

?>