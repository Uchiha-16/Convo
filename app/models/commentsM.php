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
    }
?>