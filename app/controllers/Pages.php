<?php
    class Pages extends Controller{
        public function __construct() {
           $this->pagesM = $this -> model('pagesM');

        }
    

    public function seeker() {
        $usertag = $this->pagesM->getUserTag();
        $tags = [];
        foreach($usertag as $tag) {
            array_push($tags, $tag->tag);
        }

        for($i = 0; $i < count($tags); $i++) {
            $questions = $this->pagesM->getQuestions($tags[$i]);
            $question[$i] = $questions;
        }

        $data = [
            'questions' => $question,
        ];
        $this->view('pages/seeker', $data);
    }

    public function expert() {
        $data = [];
        $this->view('pages/expert', $data);
    }
    
    public function about() {
        $questions = $this->pagesM->getQuestions();

        $data = [
            'question' => $questions
        ];
        $this->view('pages/about', $data);
    }
}
?>