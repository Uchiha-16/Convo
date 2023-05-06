<?php
    class Moderators extends Controller{
        private $moderatorsM;
        public function __construct() {
           $this->moderatorsM = $this -> model('moderatorsM');

        }

        public function approve(){

            
            $usertag = $this->moderatorsM->getUserTag();

            $str = '';

            foreach($usertag as $tag) {
                $str = $str . 'questiontag.tag = "' . $tag->tag . '" OR ';

            }

            $str = substr($str, 0, -4);


            $questions = $this->moderatorsM->approve($str);

        
            $tags = $this->moderatorsM->getQuestionTags();

            $data = [
                'questions' => $questions,
                'tags' => $tags
            ];

            // print_r ($data['questions']);
            $this->view('moderators/approve', $data);
        }

        public function accept($QID){
            $this->moderatorsM->accept($QID);
            $this->moderatorsM->addID($_SESSION['userID'], $QID);
            $this->moderatorsM->notify("Accepted",$QID,$_SESSION['userID'],);
            flash('reg_flash','Question Approved');
            header('Location: ' . URLROOT . '/moderators/approve');
        }

        public function decline($QID){
            $this->moderatorsM->decline($QID);
            $this->moderatorsM->addID($_SESSION['userID'], $QID);
            $this->moderatorsM->notify("Declined",$QID,$_SESSION['userID'],);
            flash('reg_flash','Question Declined');
            header('Location: ' . URLROOT . '/moderators/approve');
        }
    }
    
?>