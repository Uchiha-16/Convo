<?php
    class Comments extends Controller{

        private $commentsM;

        public function __construct() {
           $this->commentsM = $this -> model('commentsM');

        }   

        //Add Comments
        public function comment($AID){
            $userID = $_SESSION['userID'];
            $comment = $_POST['comment'];
            $threadID = $AID;

            $data = [
                'userID' => $userID,
                'comment' => $comment,
                'threadID' => $threadID,
                'date' => date("Y-m-d H:i:s")
            ];

            echo $data['userID'] . $data['comment'] . $data['threadID'] . $data['date'];

            if($this->commentsM->add($data)){
                $this->commentsM->notify($data);
                flash('comment_message', 'Comment Added');
            } else {
                die('Something went wrong');
            }
            

        }

        public function show($AID){
            $comments = $this->commentsM->getComments($AID);

            foreach($comments as $comment){
                    echo '<div class="user-comment">';
                        echo '<span>'. $comment->comment .'</span>';
                        echo '<span class="name"> – '.$comment->fName .' ' .$comment->lName .'</span>';
                        echo '<span class="comment-time">'.' '.convertTime($comment->date) .'</span>';
                    echo '</div>';
            }
        }

    }
?>