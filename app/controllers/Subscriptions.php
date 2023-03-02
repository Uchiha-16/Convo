<?php
    class Subscriptions extends Controller {
        public function __construct() {
            $this->subscriptionsModel = $this -> model('subscriptionsM');
        }

        public function index(){
            // $blogs = $this->blogsModel->getBlogs();
            $data = [
                // 'blogs' => $blogs
            ];
            $this->view('Subscriptions/index', $data);
        }

        public function add(){
            $data = [];
            $this->view('Subscriptions/add', $data);
        }

    }

?>