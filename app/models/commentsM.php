<?php
    class commentsM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function add($data){
            $this->db->query('INSERT INTO threadcomment (userID, content, threadID, date) VALUES (:userID, :content, :threadID, :date)');
            $this->db->bind(':userID', $data['userID']);
            $this->db->bind(':content', $data['comment']);
            $this->db->bind(':threadID', $data['threadID']);
            $this->db->bind(':date', $data['date']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getComments($AID){
            $this->db->query('SELECT threadcomment.threadID as threadID, threadcomment.content as comment, threadcomment.date as date, user.firstName as fName, user.lastName as lName
                              FROM threadcomment JOIN user ON threadcomment.userID = user.userID WHERE threadID = :threadID ORDER BY date DESC');
            $this->db->bind(':threadID', $AID);
            $results = $this->db->resultSet();
            return $results;
        }
    }
?>