<?php
    class Profiles extends Controller {
        public function __construct() {
            $this->profilesModel = $this -> model('profilesM');
        }

        public function seeker(){
            // $blogs = $this->blogsModel->getBlogs();
            $data = [
                // 'blogs' => $blogs
            ];
            $this->view('profiles/seeker', $data);
        }

        public function expert(){
            $data = [];
            $this->view('profiles/expert', $data);
        }

        public function company(){
            $data = [];
            $this->view('profiles/company', $data);
        }

        public function admin(){
            $data = [];
            $this->view('profiles/admin', $data);
        }

        public function seekeredit(){
            $data = [];
            $this->view('profiles/seekeredit', $data);
        }

    }

?>