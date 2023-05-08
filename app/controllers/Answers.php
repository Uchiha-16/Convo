<?php
    class Answers extends Controller{
        private $answersM;
        public function __construct() {
           $this->answersM = $this -> model('answersM');

        }

    
        public function viewA($QID){
            $question = $this->answersM->getQuestion($QID);
            $answers = $this->answersM->getAnswers($QID);
            $Quser = $this->answersM->Quser($QID);
            $count = $this->answersM->answerCount($QID);

            if(!isset($_SESSION['userID'])){
                $data = [
                    'question' => $question,
                    'answers' => $answers,
                    'Quser' => $Quser,
                    'count' => $count,
                    'QID' => $QID,
                ];
            
                $this->view('answers/viewA', $data);

            }else {
            $userID = $_SESSION['userID'];
            
            $interaction = array();
            $i = 0;
            foreach($answers as $answer){
                $interaction[$i] = $this->answersM->getInteraction($answer->threadID, $userID);
                $i++;
            }

            $rating = $this->answersM->getQuestionRating($QID, $userID);

            // print($interaction[0]->interaction);

            $data = [
                'question' => $question,
                'answers' => $answers,
                'Quser' => $Quser,
                'count' => $count,
                'QID' => $QID,
                'interaction' => $interaction,
                'rating' => $rating,

            ];
        
            $this->view('answers/viewA', $data);
        }
    }

        public function add($QID){
            $question = $this->answersM->getQuestion($QID);
            $Quser = $this->answersM->Quser($QID);
            //print_r($Quser);

                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Form is submitting
                    // Validate the data
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                    date_default_timezone_set('Asia/Colombo');

                    $link = $_POST['link'];
                    $path = parse_url($link, PHP_URL_PATH); // extract the path component of the URL
                    $segments = explode('/', $path); // split the path into an array of segments
                    $last_segment = end($segments); // extract the last segment of the array
                    $interaction = 'new';

                    // Get the formatted text from the POST data
                    $content = $_POST['content'];
                    
                    // Encode the formatted text for safe storage in the database
                    $content = htmlentities($content);
                    //Input Data
                    $data = [
                        'content' => $_POST['content'],
                        'date' => date('Y-m-d H:i:s'),
                        'embedlink' => $last_segment,
                        'image' => ($_FILES['image']),
                        'image_name' => time().'_'.($_FILES['image']['name']),
                        'rating' => 0,
                        'QID' => $QID,
                        'expertID' => $_SESSION['userID'],    
                        'content_err' => '',
                        'image_err' => '',
                        'question' => $question,
                        'Quser' => $Quser,
                    ];

                    // Validate Content
                    if(empty($data['content'])) {
                        $data['content_err'] = 'Please enter Content';
                    }

                    if($data['image']['size'] > 0){
                        if(uploadImage($data['image']['tmp_name'], $data['image_name'], '/img/answerImg/')) {
                            //done
                        }else{
                            $data['image_err'] = 'Something Went Wrong when uploading the image';
                        }
                    }else{
                        $data['image_name'] = null;
                    }




                    // Make sure errors are empty
                    if(empty($data['content_err']) && empty($data['image_err'])) {
                        // Adding Question
                        if($this->answersM->add($data)) {
                            $LastID = $this->answersM->getLastID();
                            $users = $this->answersM->getUsers();
                            $this->answersM->notify($Quser->userID,$_SESSION['userID'],$QID);
                            foreach($users as $user) {
                                $this->answersM->addInteraction($LastID->threadID, $user->userID, $interaction);
                            }
                            
                            flash('reg_flash','Answer Added Successfully');
                            redirect('answers/viewA/'.$QID.'');
                            
                        } else {
                            die('Something went wrong');
                        }
                    } else {
                        // Load view with errors
                        $this->view('answers/add', $data);
                    }
                }
                else {
                    $data = [
                        'content' => '',
                        'date' => '',
                        'embedlink' => '',
                        'attachment' => '',
                        'attachmentName' => '',
                        'rating' => '', 
                        'QID' => '',
                        'expertID' => '',    
                        'content_err' => '', 
                        'image_err' => '',
                        'question' => $question,
                        'Quser' => $Quser,
                    ];
                    $this->view('answers/add', $data);
                    //print_r($data);
                }
            
        }

        public function upvote($threadID){
            $likes = $this->answersM->upvote($threadID);

            $userID = $_SESSION['userID'];
            $c = $this->answersM->interactionExist($threadID, $userID);

            if($c){
                $res = $this->answersM->setInteraction($threadID, $userID, 'liked');
            }else{
                $res = $this->answersM->addInteraction($threadID, $userID, 'liked');
            }

            if($likes != false && $res != false){
                $rating = $this->answersM->getRating($threadID);
                echo $rating->rating;
            }

        }

        public function downvote($threadID){
            $dislikes = $this->answersM->downvote($threadID);

            $userID = $_SESSION['userID'];

            $c = $this->answersM->interactionExist($threadID, $userID);

            if($c){
                $res = $this->answersM->setInteraction($threadID, $userID, 'disliked');
            }else{
                $res = $this->answersM->addInteraction($threadID, $userID, 'disliked');
            }

            if($dislikes != false && $res != false){
                $rating = $this->answersM->getRating($threadID);
                echo $rating->rating;
            }
        }

        public function Removeupvote($threadID){
            $rlikes = $this->answersM->removeupvote($threadID);

            $userID = $_SESSION['userID'];

            $c = $this->answersM->interactionExist($threadID, $userID);

            if($c){
                $res = $this->answersM->setInteraction($threadID, $userID, 'LikedRemoved');
            }else{
                $res = $this->answersM->addInteraction($threadID, $userID, 'LikedRemoved');
            }

            if($rlikes != false && $res != false){
                $rating = $this->answersM->getRating($threadID);
                echo $rating->rating;
            }

        }

        public function Removedownvote($threadID){
            $rdislikes = $this->answersM->removedownvote($threadID);

            $userID = $_SESSION['userID'];

            $c = $this->answersM->interactionExist($threadID, $userID);

            if($c){
                $res = $this->answersM->setInteraction($threadID, $userID, 'dislikedRemoved');
            }else{
                $res = $this->answersM->addInteraction($threadID, $userID, 'dislikedremoved');
            }

            if($rdislikes != false && $res != false){
                $rating = $this->answersM->getRating($threadID);
                echo $rating->rating;
            }
        }

        public function rating($QID){
            $userID = $_SESSION['userID'];
            $count = $_POST['count'];
            $QID = $QID;

            $data = [
                'userID' => $userID,
                'rating' => $count,
                'QID' => $QID,
            ];

            echo $data['userID'] . $data['rating'] . $data['QID'];

            $exists = $this->answersM->checkRating($data);

            if($exists){
                if($this->answersM->updateRating($data)){
                    flash('reg_flash', 'Rating Updated Successfully!');
                    redirect('questions/myQuestions');
                } else {
                    die('Something went wrong');
                }
            } else {
                if($this->answersM->addRating($data)){
                    flash('reg_flash', 'Rating Added Successfully!');
                    redirect('questions/myQuestions');
                } else {
                    die('Something went wrong');
                }
            }
        }

        
}   
?>