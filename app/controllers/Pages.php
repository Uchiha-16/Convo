<?php
    class Pages extends Controller{

        private $pagesM;

        public function __construct() {
           $this->pagesM = $this -> model('pagesM');

        }   

        public function index(){
            $questions = $this->pagesM->Questions();

            $tags = $this->pagesM->getQuestionTags();

                $data = [
                    'questions' => $questions,
                    'tags' => $tags,
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

                $data = [
                    'questions' => $questions,
                    'tags' => $tags,
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

    
                $data = [
                    'questions' => $questions,
                    'tags' => $tags,
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