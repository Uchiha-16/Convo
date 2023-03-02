<?php
    class Chats extends Controller {
        public function __construct() {
            $this->chatsModel = $this -> model('chatsM');
        }

        public function index(){
            // $blogs = $this->blogsModel->getBlogs();
            $data = [
                // 'blogs' => $blogs
            ];
            $this->view('chats/index', $data);
        }

        public function add(){
            $data = [];
            $this->view('chats/add', $data);
        }

    }

?>