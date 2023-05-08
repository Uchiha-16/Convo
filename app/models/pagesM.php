<?php
    class pagesM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        //getUserTag
        public function getUserTag() {
            $this->db->query('SELECT tag FROM usertag WHERE userID = :userID');
            $this->db->bind(':userID', $_SESSION['userID']);
            $row = $this->db->resultSet();
            return $row;
        }

        //getQuestions
        public function getQuestions($tags) {
            $this->db->query('SELECT DISTINCT question.QID as QID, question.title as title, question.content as content, 
            question.date as date, question.rating as rating, question.visibility as visibility, user.uname as uname, user.firstName as fName, user.lastName as lName, user.pfp as pfp
            FROM question JOIN user on question.userID = user.userID JOIN questiontag ON question.QID = questiontag.QID WHERE question.status = "approved" AND (' . $tags .') ORDER BY question.rating DESC');
            //$this->db->query('SELECT DISTINCT *from question JOIN questiontag ON question.QID = questiontag.QID WHERE ' . $tags .'');
            $row = $this->db->resultSet();
            return $row;
        }

        //getQuestions for Index
        public function Questions(){
            $this->db->query('SELECT DISTINCT question.QID as QID, question.title as title, question.content as content, 
            question.date as date, question.rating as rating, question.visibility as visibility, user.uname as uname, user.firstName as fName, user.lastName as lName, user.pfp as pfp
            FROM question JOIN user on question.userID = user.userID JOIN questiontag ON question.QID = questiontag.QID WHERE question.status = "approved" ORDER BY question.rating DESC');
            $row = $this->db->resultSet();
            return $row;
        }

        //getQuestionTags
        public function getQuestionTags() {
            $this->db->query('SELECT QID, GROUP_CONCAT(questiontag.tag SEPARATOR ",") as tags FROM questiontag GROUP BY QID' );
            $row = $this->db->resultSet();
            return $row;
        }

        public function answerCount($QID) {
            $this->db->query('SELECT COUNT(answer.threadID) as count FROM answer WHERE QID = :QID;');
            $this->db->bind(':QID', $QID);
            $rows = $this->db->single();
            return $rows;
        }

        //get search results
        public function search($search,$tags) {
            $this->db->query('SELECT DISTINCT question.QID as QID, question.title as title, question.content as content, 
            question.date as date, question.rating as rating, question.visibility as visibility, user.uname as uname, user.firstName as fName, user.lastName as lName, user.pfp as pfp
            FROM question JOIN user on question.userID = user.userID JOIN questiontags ON question.QID = questiontags.QID JOIN questiontag ON question.QID = questiontag.QID WHERE question.status = "approved"  AND (' . $tags .') AND 
            (question.title LIKE :search OR question.content LIKE :search OR questiontags.tags LIKE :search OR question.date LIKE :search) ORDER BY question.rating DESC');
            $this->db->bind(':search', '%' . $search . '%');
            $row = $this->db->resultSet();
            return $row;
        }

        //get search results for index
        public function searchIndex($search) {
            $this->db->query('SELECT DISTINCT question.QID as QID, question.title as title, question.content as content, 
            question.date as date, question.rating as rating, question.visibility as visibility, user.uname as uname, user.firstName as fName, user.lastName as lName, user.pfp as pfp
            FROM question JOIN user on question.userID = user.userID JOIN questiontags ON question.QID = questiontags.QID WHERE question.status = "approved" AND 
            (question.title LIKE :search OR question.content LIKE :search OR questiontags.tags LIKE :search OR question.date LIKE :search) ORDER BY question.rating DESC');
            $this->db->bind(':search', '%' . $search . '%');
            $row = $this->db->resultSet();
            return $row;
        }

        //get filter results
        public function filter($date,$QA1,$QA2,$rating,$tags) {
            $this->db->query('SELECT DISTINCT question.QID as QID, question.title as title, question.content as content, 
            question.date as date, question.rating as rating, question.visibility as visibility, user.uname as uname, user.firstName as fName, user.lastName as lName, user.pfp as pfp
            FROM question JOIN user on question.userID = user.userID JOIN questiontag ON question.QID = questiontag.QID WHERE question.status = "approved" AND (' . $tags .') AND question.date >= DATE_SUB(NOW(), INTERVAL '.$date.' MONTH) AND question.rating <= '.$rating.' AND question.answercount BETWEEN '.$QA1.' AND '.$QA2.' ORDER BY question.rating DESC');
            $row = $this->db->resultSet();
            return $row;
        }

        //get filter results for index
        public function filterIndex($date,$QA1,$QA2,$rating) {
            $this->db->query('SELECT DISTINCT question.QID as QID, question.title as title, question.content as content, 
            question.date as date, question.rating as rating, question.visibility as visibility, user.uname as uname, user.firstName as fName, user.lastName as lName, user.pfp as pfp
            FROM question JOIN user on question.userID = user.userID JOIN questiontag ON question.QID = questiontag.QID WHERE question.status = "approved" AND question.date >= DATE_SUB(NOW(), INTERVAL '.$date.' MONTH) AND question.rating <= '.$rating.' AND question.answercount BETWEEN '.$QA1.' AND '.$QA2.' ORDER BY question.rating DESC');
            $row = $this->db->resultSet();
            return $row;
        }

        //notificationCount
        // public function notificationCount() {
        //     $this->db->query('SELECT COUNT(NID) as count FROM notification WHERE userID = :userID AND status = 0');
        //     $this->db->bind(':userID', $_SESSION['userID']);
        //     $rows = $this->db->single();
        //     return $rows;
        // }
        
    }

?>