<?php
    class Subscriptions extends Controller {
        private $subscriptionsModel;
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

        public function subscribe(){
            $data = [];
            $this->view('Subscriptions/subscribe', $data);
        }

    }

?>