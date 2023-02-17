<?php
    class Pages extends Controller{
        public function __construct() {
           $this->pagesM = $this -> model('pagesM');

        }
    

    public function index() {
        $data = [];
        $this->view('pages/seeker', $data);
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