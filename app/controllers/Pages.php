<?php
    class Pages extends Controller{

        private $pagesM;

        public function __construct() {
           $this->pagesM = $this -> model('pagesM');

        }
    

        public function seeker() {
        
            $usertag = $this->pagesM->getUserTag();

        //    $tags = array();

        //       foreach($usertag as $tag) {
        //         array_push($tags, $tag->tag);
        //       }

        //     $tag = implode(",", $tags);
        //     print_r($tag);

        $str = '';

        foreach($usertag as $tag) {
            $str = $str . 'questiontag.tag = "' . $tag->tag . '" OR ';

        }

        $str = substr($str, 0, -4);

        //print($str);
            $questions = $this->pagesM->getQuestions($str);

            $questiontag = array();
            

            foreach($questions as $question) {
                $questiontag[$question->QID] = $this->pagesM->getQuestionTags($question->QID);
            }
            print_r($questiontag);
            $data = [
                'questions' => $questions,
                'tags' => $questiontag,
            ];
            print_r($data);
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