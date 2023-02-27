<?php
    class answersM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getAnswers($QID) {
            $this->db->query('SELECT answer.content as content, answer.embedlink as link, answer.attachment as attachment, answer.date as date, 
            answer.rating as rating, user.userID as userID, user.uname as uname, user.firstName as fName, user.lastName as lName, user.pfp as pfp, 
            GROUP_CONCAT(expertqualification.qualification SEPARATOR ",") as qualifications FROM answer JOIN user ON answer.expertID = user.userID 
            JOIN expertqualification ON expertqualification.expertID = answer.expertID WHERE answer.QID = :QID GROUP BY answer.threadID ORDER BY answer.rating DESC;');
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

        public function add($data1) {
            $this->db->query('INSERT INTO answer (content, date, embedlink, attachment, rating, QID, expertID) VALUES (:content, :date, :embedlink, :attachment, :rating, :QID, :expertID)');
            $this->db->bind(':content', $data1['content']);
            $this->db->bind(':date', $data1['date']);
            $this->db->bind(':embedlink', $data1['embedlink']);
            $this->db->bind(':attachment', $data1['image']);
            $this->db->bind(':rating', $data1['rating']);
            $this->db->bind(':QID', $data1['QID']);
            $this->db->bind(':expertID', $data1['expertID']);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

    }

?>