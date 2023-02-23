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
            question.date as date, question.rating as rating, user.uname as uname, user.firstName as fName, user.lastName as lName, user.pfp as pfp
            FROM question JOIN user on question.userID = user.userID JOIN questiontag ON question.QID = questiontag.QID WHERE ' . $tags .'');
            //$this->db->query('SELECT DISTINCT *from question JOIN questiontag ON question.QID = questiontag.QID WHERE ' . $tags .'');
            $row = $this->db->resultSet();
            return $row;
        }

        //getQuestionTags
        public function getQuestionTags($QID) {
            $this->db->query('SELECT GROUP_CONCAT(questiontag.tag SEPARATOR ",") as tags FROM questiontag WHERE QID = :QID');
            $this->db->bind(':QID', $QID);
            $row = $this->db->resultSet();
            return $row;
        }
    }

?>