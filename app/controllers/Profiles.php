<?php
    class Profiles extends Controller {
        private $profilesModel;
        public function __construct() {
            $this->profilesModel = $this -> model('profilesM');
        }

        public function seeker(){
            $profile = $this->profilesModel->getprofile();
            $question = $this->profilesModel->getQuestions();
            $skilltest = $this->profilesModel->getSkilltest();
            $chatgroups = $this->profilesModel->chatgroups();

            $avgscore = [];
            foreach($skilltest as $sk){
                $avgscore[] = $sk->score;
            }

            $avgscore = array_sum($avgscore)/count($avgscore);

            $data = [
                'profile' => $profile,
                'question' => $question,
                'skilltest' => $skilltest,
                'avgscore' => $avgscore,
                'chatgroups' => $chatgroups
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