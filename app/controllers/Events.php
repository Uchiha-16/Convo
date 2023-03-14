<?php
    class Events extends Controller {
        public function __construct() {
            $this->eventsModel = $this -> model('eventsM');
        }

        public function index(){
            // $blogs = $this->blogsModel->getBlogs();
            $data = [
                // 'blogs' => $blogs
            ];
            $this->view('events/index', $data);
        }

        public function add(){
            $data = [];
            $this->view('events/add', $data);
        }

    }

?>