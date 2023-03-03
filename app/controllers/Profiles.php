<?php
    class Profiles extends Controller {
        public function __construct() {
            $this->profilesModel = $this -> model('profilesM');
        }

        public function seeker(){
            $profile = $this->profilesModel->getprofile();

            $data = [
                'profile' => $profile
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
            $profile = $this->profilesModel->getprofile();

            $data = [
                'profile' => $profile
            ];
            $this->view('profiles/seekeredit', $data);
        }

    }

?>