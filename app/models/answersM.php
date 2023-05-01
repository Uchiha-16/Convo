<?php
    class answersM {
        private $db;

        public function __construct() {
            $this->db = new Database; 
        }

        public function getUsers() {
            $this->db->query('SELECT userID FROM user');
            $results = $this->db->resultSet();
            return $results;
        }
 
        public function getAnswers($QID) {
            $this->db->query('SELECT answer.threadID as threadID, answer.content as content, answer.embedlink as link, answer.attachment as attachment, answer.date as date, 
            answer.rating as rating, user.userID as userID, user.uname as uname, user.firstName as fName, user.lastName as lName, user.pfp as pfp  
            FROM answer JOIN user ON answer.expertID = user.userID 
            JOIN expert ON expert.expertID = answer.expertID WHERE answer.QID = :QID GROUP BY answer.threadID ORDER BY answer.rating DESC;');
            $this->db->bind(':QID', $QID);
            $rows = $this->db->resultSet();
            return $rows;
        }

        public function answerCount($QID) {
            $this->db->query('SELECT COUNT(answer.threadID) as count FROM answer WHERE answer.QID = :QID');
            $this->db->bind(':QID', $QID);
            $row = $this->db->single();
            return $row;
        }

        public function getQuestion($QID) {
            $this->db->query('SELECT question.QID as QID, question.title as title, question.content as content, question.date as date, question.rating as rating, question.visibility as visibility,
            GROUP_CONCAT(questiontag.tag SEPARATOR ",") as tags, question.moderatorID as modID FROM question JOIN questiontag ON question.QID = questiontag.QID WHERE question.QID = :QID');
            $this->db->bind(':QID', $QID);
            $row = $this->db->single();
            return $row;
        }
        
        public function Quser($QID) {
            $this->db->query('SELECT user.userID as userID, user.uname as uname, user.firstName as fName, user.lastName as lName, user.pfp as pfp FROM user JOIN question ON user.userID = question.userID WHERE question.QID = :QID');
            $this->db->bind(':QID', $QID);
            $row = $this->db->single();
            return $row;
        }

        public function add($data) {
            $this->db->query('INSERT INTO answer (content, date, embedlink, attachment, rating, QID, expertID) VALUES (:content, :date, :embedlink, :attachment, :rating, :QID, :expertID)');
            $this->db->bind(':content', $data['content']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':embedlink', $data['embedlink']);
            $this->db->bind(':attachment', $data['image_name']);
            $this->db->bind(':rating', $data['rating']);
            $this->db->bind(':QID', $data['QID']);
            $this->db->bind(':expertID', $data['expertID']);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getLastID() {
            $this->db->query('SELECT threadID from answer ORDER BY threadID DESC LIMIT 1');
            $row = $this->db->single();
            return $row;
        }

        public function upvote($threadID){
            $this->db->query('UPDATE answer SET rating = rating + 1 WHERE threadID = :threadID');
            $this->db->bind(':threadID', $threadID);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function downvote($threadID){
            $this->db->query('UPDATE answer SET rating = rating - 1 WHERE threadID = :threadID');
            $this->db->bind(':threadID', $threadID);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function removeupvote($threadID){
            $this->db->query('UPDATE answer SET rating = rating - 1 WHERE threadID = :threadID');
            $this->db->bind(':threadID', $threadID);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function removedownvote($threadID){
            $this->db->query('UPDATE answer SET rating = rating + 1 WHERE threadID = :threadID');
            $this->db->bind(':threadID', $threadID);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function addInteraction($threadID, $userID, $interaction){
            $this->db->query('INSERT INTO interactions(threadID, userID, interaction) VALUES (:threadID, :userID, :interaction)');
            $this->db->bind(':threadID', $threadID);
            $this->db->bind(':userID', $userID);
            $this->db->bind(':interaction', $interaction);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function setInteraction($threadID, $userID, $interaction){
            $this->db->query('UPDATE interactions SET interaction = :interaction WHERE userID = :userID AND threadID = :threadID');
            $this->db->bind(':userID', $userID);
            $this->db->bind(':threadID', $threadID);
            $this->db->bind(':interaction', $interaction);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getInteraction($threadID, $userID){
            $this->db->query('SELECT * FROM interactions WHERE userID = :userID AND threadID = :threadID');
            $this->db->bind(':userID', $userID);
            $this->db->bind(':threadID', $threadID);
            $row = $this->db->single();
            return $row;
        }

        public function interactionExist($threadID, $userID){
            $this->db->query('SELECT * FROM interactions WHERE threadID = :threadID AND userID = :userID');
            $this->db->bind(':threadID', $threadID);
            $this->db->bind(':userID', $userID);

            $row = $this->db->single();
            return $row;
        }

        public function getRating($threadID){
            $this->db->query('SELECT rating FROM answer WHERE threadID = :threadID');
            $this->db->bind(':threadID', $threadID);
            $row = $this->db->single();
            return $row;
        }

        //****************************************************************Rate Question************************************************************************************************************* */
        public function checkRating($data) {
            $this->db->query('SELECT * FROM questionrating WHERE QID = :QID AND userID = :userID');
            $this->db->bind(':QID', $data['QID']);
            $this->db->bind(':userID', $data['userID']);
            $row = $this->db->single();
            return $row;
        }

        public function updateRating($data) {
            $this->db->query('UPDATE questionrating SET rating = :rating WHERE QID = :QID AND userID = :userID');
            $this->db->bind(':rating', $data['rating']);
            $this->db->bind(':QID', $data['QID']);
            $this->db->bind(':userID', $data['userID']);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function addRating($data) {
            $this->db->query('INSERT INTO questionrating (QID, userID, rating) VALUES(:QID, :userID, :rating)');
            $this->db->bind(':QID', $data['QID']);
            $this->db->bind(':userID', $data['userID']);
            $this->db->bind(':rating', $data['rating']);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getQuestionRating($QID, $userID) {
            $this->db->query('SELECT rating FROM questionrating WHERE QID = :QID AND userID = :userID');
            $this->db->bind(':QID', $QID);
            $this->db->bind(':userID', $userID);
            $row = $this->db->single();
            return $row;
        }

    }   

?>