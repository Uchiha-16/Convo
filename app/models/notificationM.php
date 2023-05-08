<?php
    class notificationM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getNotifications($userID){
            $this->db->query('SELECT * FROM notification WHERE userID = :userID ORDER BY date DESC');
            $this->db->bind(':userID', $userID);
            $results = $this->db->resultSet();
            return $results;
        }

        public function getQuestion($userID,$expertID,$QID){
            $this->db->query('SELECT question.QID as QID, question.title as title, user.firstName as fName, user.lastName as lName FROM question INNER JOIN user ON question.moderatorID = user.userID WHERE question.userID = :userID AND question.moderatorID = :expertID AND question.QID = :QID');
            $this->db->bind(':userID', $userID);
            $this->db->bind(':expertID', $expertID);
            $this->db->bind(':QID', $QID);
            $results = $this->db->single();
            return $results;
        }

        public function sendQuestion($userID,$expertID,$typeID){
            $this->db->query('SELECT question.QID as QID, question.title as title, user.firstName as fName, user.lastName as lName FROM question INNER JOIN user ON question.userID = user.userID WHERE question.userID = :expertID AND FIND_IN_SET(:userID, question.expertID) AND question.QID = :QID');
            $this->db->bind(':userID', $userID);
            $this->db->bind(':expertID', $expertID);
            $this->db->bind(':QID', $typeID);
            $results = $this->db->single();
            return $results;
        }

        public function getAnswer($userID,$expertID,$typeID){
            $this->db->query('SELECT answer.QID as QID, question.title as title, user.firstName as fName, user.lastName as lName FROM answer INNER JOIN question ON answer.QID = question.QID INNER JOIN user ON answer.expertID = user.userID WHERE answer.QID = :QID');
            $this->db->bind(':QID', $typeID);
            $row = $this->db->single();
            return $row;
        }

        public function getComment($expertID,){
            $this->db->query('SELECT * FROM user WHERE userID = :expertID');
            $this->db->bind(':expertID', $expertID);
            $results = $this->db->single();;
            return $results;
        }

        public function getChat($userID,$expertID,$typeID){
            $this->db->query('SELECT * FROM chat WHERE userID = :userID AND expertID = :expertID AND chatID = :typeID');
            $this->db->bind(':userID', $userID);
            $this->db->bind(':expertID', $expertID);
            $this->db->bind(':typeID', $typeID);
            $results = $this->db->single();
            return $results;
        }

        public function getConsult($userID,$expertID,$typeID){
            $this->db->query('SELECT * FROM consultation WHERE userID = :userID AND expertID = :expertID AND consultID = :typeID');
            $this->db->bind(':userID', $userID);
            $this->db->bind(':expertID', $expertID);
            $this->db->bind(':typeID', $typeID);
            $results = $this->db->single();
            return $results;
            
        }

        //getCount
        public function getCount($userID){
            $this->db->query('SELECT COUNT(*) as count FROM notification WHERE userID = :userID');
            $this->db->bind(':userID', $userID);
            $row = $this->db->single();
            return $row;
        }
   
        
    }
?>