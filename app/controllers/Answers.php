<?php
    class Answers extends Controller{
        public function __construct() {
           $this->answersM = $this -> model('answersM');

        }

    
    public function viewA($QID){
        $question = $this->answersM->getQuestion($QID);
        $answers = $this->answersM->getAnswers($QID);
        $Quser = $this->answersM->Quser($QID);
        $count = $this->answersM->answerCount($QID);
        
        $data = [
            'question' => $question,
            'answers' => $answers,
            'Quser' => $Quser,
            'count' => $count
        ];
    
        $this->view('answers/viewA', $data);
    }

    public function add($QID){
        $question = $this->answersM->getQuestion($QID);
        $Quser = $this->answersM->Quser($QID);
        $data = [
            'question' => $question,
            'Quser' => $Quser,
        ];
        $this->view('answers/addA', $data);
    }
}
?>