<?php
    class SkillTest extends Controller {
        public function __construct() {
            $this->skilltestModel = $this -> model('skilltestM');
        }

        public function index(){
            // $blogs = $this->blogsModel->getBlogs();
            $data = [
                // 'blogs' => $blogs
            ];
            $this->view('SkillTest/index', $data);
        }

        public function add(){
            $data = [];
            $this->view('SkillTest/add', $data);
        }

    }

?>