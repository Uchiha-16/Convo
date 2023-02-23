<?php
    class Webinars extends Controller {
        public function __construct() {
            $this->webinarModel = $this -> model('webinarM');
        }

        public function add(){
            $data = [];
            $this->view('webinars/add', $data);
        }

        public function home(){
            $webinars = $this->webinarModel->getwebinars();
            
            $data = [
                'webinars' => $webinars,
            ];
            
            $this->view('webinars/home', $data);
        }
    }
?>