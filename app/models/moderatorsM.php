<?php 

class moderatorsM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getUserTag() {
            $this->db->query('SELECT tag FROM usertag WHERE userID = :userID');
            $this->db->bind(':userID', $_SESSION['userID']);
            $row = $this->db->resultSet();
            return $row;
        }

        public function approve($tags) {
            $this->db->query('SELECT DISTINCT question.QID as QID, question.title as title, question.content as content, 
            question.date as date, question.rating as rating, question.visibility as visibility, user.uname as uname, user.firstName as fName, user.lastName as lName, user.pfp as pfp
            FROM question JOIN user on question.userID = user.userID JOIN questiontag ON question.QID = questiontag.QID WHERE question.status = "waiting" AND (' . $tags .') ORDER BY question.rating DESC');
            
            $row = $this->db->resultSet();
            return $row;
        }

        public function getQuestionTags() {
            $this->db->query('SELECT QID, GROUP_CONCAT(questiontag.tag SEPARATOR ",") as tags FROM questiontag GROUP BY QID');
            $row = $this->db->resultSet();
            return $row;
        }

        public function accept($QID) {
            $this->db->query('UPDATE question SET status = "approved" WHERE QID = :QID');
            $this->db->bind(':QID', $QID);
            $this->db->execute();
        }

        public function decline($QID) {
            $this->db->query('UPDATE question SET status = "declined" WHERE QID = :QID');
            $this->db->bind(':QID', $QID);
            $this->db->execute();
        }

        public function addID($userID, $QID) {
            $this->db->query('UPDATE question SET moderatorID = :userID WHERE QID = :QID');
            $this->db->bind(':userID', $userID);
            $this->db->bind(':QID', $QID);
            $this->db->execute();
        }

        public function notify($status, $QID, $expertID) {
            $result = $this->db->query('SELECT userID FROM question WHERE QID = :QID');
            $this->db->bind(':QID', $QID);
            $row = $this->db->single();
            $Quser = $row->userID;
            $this->db->query('INSERT INTO notification (type,userID,expertID,typeID,status) VALUES (:status,:userID,:expertID,:QID,0)');
            $this->db->bind(':expertID', $expertID);
            $this->db->bind(':QID', $QID);
            $this->db->bind(':status', $status);
            $this->db->bind(':userID', $Quser);
            $this->db->execute();
        }

        

    }

?>