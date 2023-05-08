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
                    'count' => $count,
                    
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

               // $notificationCount = $this->pagesM->notificationCount($_SESSION['userID']);

                $data = [
                    'questions' => $questions,
                    'tags' => $tags,
                    'count' => $count,
                    //'notificationCount' => $notificationCount
                    'date' => 0,
                    'rating' => 0,
                    'QA1' => 0,
                    'QA2' => 0
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

                //$notificationCount = $this->pagesM->notificationCount($_SESSION['userID']);

                $data = [
                    'questions' => $questions,
                    'tags' => $tags,
                    'count' => $count,

                    //'notificationCount' => $notificationCount
                ];

            $this->view('pages/expert', $data);
            ;
        }

        public function company() {
            

            $this->view('pages/company', $data);
        }
        
        public function about() {
            
            $data = [
                
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
            
            // print_r($search);

            $count = array();
            $c = 0;
            foreach($questions as $question) {
                $count[$c] = $this->pagesM->answerCount($question->QID);
                $count[$c]->QID = $question->QID;
                $c++;
            }
            echo '<h3>Search Results for "'.$search.'"</h3><br>';
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

        //filter by category
        public function filter() {
            
            $date = isset($_POST['publishDate']) ? $_POST['publishDate'] : '0';
            $QA = isset($_POST['QA']) ? $_POST['QA'] : '0';
            $rating = isset($_POST['rating']) ? $_POST['rating'] : '0';

            // print_r($date);
            // print_r($QA);
            // print_r($rating);
           
            if($date == 0 && $QA == 0 && $rating == 0){
                if(isset($_SESSION['userID'])){
                    if($_SESSION['role'] == 'seeker'){
                        $this->seeker();
                    }elseif($_SESSION['role'] == 'expert'){
                        $this->expert();
                    }elseif($_SESSION['role'] == 'company'){
                        $this->company();
                    }    
                }else{
                    $this->index();
                }
                
            }else{
                if($date != 0){
                    if(in_array('last year', $date)){
                        $date = 12;
                    }elseif(in_array('last 6 months', $date)){
                        $date = 6;
                    }elseif(in_array('last 3 months', $date)){
                        $date = 3;
                    }else{
                        $date = 24;
                }
            }else{
                $date = 24;
            }
            
            if($rating != 0){
                if(in_array(5,$rating)){
                    $rating = 5;
                }elseif(in_array(4,$rating)){
                    $rating = 4;
                }
                elseif(in_array(3,$rating)){
                    $rating = 3;
                }
                elseif(in_array(2,$rating)){
                    $rating = 2;
                }
                elseif(in_array(1,$rating)){
                    $rating = 1;
                }else{
                    $rating = 5;
                }
            }else{
                $rating = 5;
            }
            if($QA != 0){
                if(in_array('Answered',$QA)){
                    $QA1 = 1;
                    $QA2 = 1000;
                    if((in_array('Not Answered',$QA))){
                        $QA1 = 0;
                    }
                }   
                elseif(in_array('Not Answered',$QA)){
                    $QA1 = 0;
                    $QA2 = 0;
    
                }else{
                    $QA1 = 0;
                    $QA2 = 1000;
                }
            }else{
                $QA1 = 0;
                $QA2 = 1000;
            }
    
                // print_r($date);
                // print_r($QA1);
                // print_r($QA2);
                // print_r($rating);

                if(isset($_SESSION['userID'])){
                    $usertag = $this->pagesM->getUserTag();

                    $str = '';
    
                    foreach($usertag as $tag) {
                        $str = $str . 'questiontag.tag = "' . $tag->tag . '" OR ';
    
                    }
    
                    $str = substr($str, 0, -4);
    
                    $questions = $this->pagesM->filter($date,$QA1,$QA2,$rating,$str);
                }else{
                    $questions = $this->pagesM->filterIndex($date,$QA1,$QA2,$rating);
                }
                

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
                    'count' => $count,
                    'date' => $date,
                    'rating' => $rating,
                    'QA1' => $QA1,
                    'QA2' => $QA2

                ];
                
                // print_r($questions);
                if(isset($_SESSION['userID'])){
                    if($_SESSION['role'] == 'seeker'){
                        $this->view('pages/seeker', $data);
                    }
                    elseif($_SESSION['role'] == 'expert'){
                        $this->view('pages/expert', $data);
                    }else{
                        $this->view('pages/company', $data);
                    }
                }else{
                    $this->view('pages/index', $data);
                }

                    
            }
        }
}
?>