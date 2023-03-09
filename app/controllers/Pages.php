<?php
    class Pages extends Controller{

        private $pagesM;

        public function __construct() {
           $this->pagesM = $this -> model('pagesM');

        }   

        public function index(){
            $questions = $this->pagesM->Questions();

            $tags = $this->pagesM->getQuestionTags();

            $count = array();
            $i = 0;
            foreach($questions as $question) {
                $count[$i] = $this->pagesM->answerCount($question->QID);
                $count[$i]->QID = $question->QID;
                $i++;
            }

                $data = [
                    'questions' => $questions,
                    'tags' => $tags,
                    'count' => $count
                ];
            $this->view('pages/index', $data);
        }
    

        public function seeker() {
        
            $usertag = $this->pagesM->getUserTag();

            $str = '';

            foreach($usertag as $tag) {
                $str = $str . 'questiontag.tag = "' . $tag->tag . '" OR ';

            }

            $str = substr($str, 0, -4);


                $questions = $this->pagesM->getQuestions($str);
                $qid = array();
                for($i = 0; $i < count($questions); $i++) {
                    $qid[$i] = $questions[$i]->QID;
                }

                $str2 = '';

                foreach($qid as $id) {
                    $str2 = $str2 . 'QID = "' . $id . '" OR ';
                }

                $str2 = substr($str2, 0, -4);

                $tags = $this->pagesM->getQuestionTags($str2);

                $count = array();
                $c = 0;
                foreach($questions as $question) {
                    $count[$c] = $this->pagesM->answerCount($question->QID);
                    $count[$c]->QID = $question->QID;
                    $c++;
                }

                $data = [
                    'questions' => $questions,
                    'tags' => $tags,
                    'count' => $count
                ];

            $this->view('pages/seeker', $data);
        }

        public function expert() {
            $usertag = $this->pagesM->getUserTag();

            $str = '';
    
            foreach($usertag as $tag) {
                $str = $str . 'questiontag.tag = "' . $tag->tag . '" OR ';
    
            }
    
            $str = substr($str, 0, -4);
    
    
                $questions = $this->pagesM->getQuestions($str);
                $qid = array();
                for($i = 0; $i < count($questions); $i++) {
                    $qid[$i] = $questions[$i]->QID;
                }
    
                $str2 = '';
    
                foreach($qid as $id) {
                    $str2 = $str2 . 'QID = "' . $id . '" OR ';
                }
    
                $str2 = substr($str2, 0, -4);
                
                $tags = $this->pagesM->getQuestionTags($str2);

                $count = array();
                $c = 0;
                foreach($questions as $question) {
                    $count[$c] = $this->pagesM->answerCount($question->QID);
                    $count[$c]->QID = $question->QID;
                    $c++;
                }

                $data = [
                    'questions' => $questions,
                    'tags' => $tags,
                    'count' => $count
                ];

            $this->view('pages/expert', $data);
        }
        
        public function about() {
            //$questions = $this->pagesM->getQuestions();

            $data = [
                // 'question' => $questions
            ];
            $this->view('pages/about', $data);
        }
    }
?>