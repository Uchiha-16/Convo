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

            if($this->commentsM->add($data)){
                flash('comment_message', 'Comment Added');
            } else {
                die('Something went wrong');
            }
            

        }

    }
?>