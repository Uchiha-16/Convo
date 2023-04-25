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

                $tags = $this->pagesM->getQuestionTags();

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
                
                $tags = $this->pagesM->getQuestionTags();

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

        //get search results
        public function search() {
            $search = $_POST['keywords'];
            

            
            // print($str);
            if(isset($_SESSION['userID'])){
                $usertag = $this->pagesM->getUserTag();

                $str = '';

                foreach($usertag as $tag) {
                    $str = $str . 'questiontag.tag = "' . $tag->tag . '" OR ';

                }
                $str = substr($str, 0, -4);
                $questions = $this->pagesM->search($search,$str);

                $tags = $this->pagesM->getQuestionTags();
            }else{
                $questions = $this->pagesM->searchIndex($search);

                $tags = $this->pagesM->getQuestionTags();
            }
            
            print_r($search);

            $count = array();
            $c = 0;
            foreach($questions as $question) {
                $count[$c] = $this->pagesM->answerCount($question->QID);
                $count[$c]->QID = $question->QID;
                $c++;
            }
            echo '<h3>Questions and Discussions</h3><br>';
            foreach($questions as $question){
                echo '<div class="question-div">
                        <div class="info">
                            <div class="qdp">
                                <div>'; if ($question->visibility == "anonymus") {
                                        echo '<img src="'. URLROOT.'/img/pfp/anonymus.png" />
                                        </div>
                                        <div class="qdp-1">
                                            <label class="expert">Anonymus User</label> <br>';
                                    } else {
                                        echo '<img src="'. URLROOT.'/img/pfp/' . $question->pfp . '" />
                                        </div>
                                        <div class="qdp-1">
                                            <label>' . $question->fName . " " . $question->lName . '</label><br>
                                            <label class="qdp-1-2">' . $question->uname . '</label>';

                                    }
                              
                              echo '  </div>
                            </div>
                            <div class="tags">
                                <label>Category</label><br>';
                                for ($i = 0; $i < count($tags); $i++) {
                                    if ($tags[$i]->QID == $question->QID) {
                                        $tagArray = explode(",", $tags[$i]->tags);
                                        foreach ($tagArray as $tag){
                                            echo '<div class="tag">' . $tag . '</div>';
                                        }
                                    }
                                }
                                
                            echo '</div>
                                </div>
                                <div class="content-display">
                                    <h3>' .$question->title .'</h3>
                                    <p class="line-clamp">' .$question->content .'</p>
                                    <div class="date-count">
                                        <label>'. convertTime($question->date) .'</label>';
                                       for ($i = 0; $i < count($count); $i++) {
                                            if ($count[$i]->QID == $question->QID){
                                                    echo '<label style="font-weight:600; float:right">' . $count[$i]->count .'Answers</label><br>';
                                                    break;
                                            }
                                       }
                                        echo '<label style="font-weight:600; float:right">Overall Rating: '. round($question->rating,1) .'</label><br>
                                        <form action="'. URLROOT.'/answers/viewA/'. $question->QID .'">
                                            <button style="float:right" class="read-more">READ MORE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>';
            }
        }
    }
?>