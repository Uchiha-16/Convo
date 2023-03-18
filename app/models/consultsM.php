<?php
    class consultsM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getConsults() {
            $this->db->query('SELECT * FROM consults');
            $results = $this->db->resultSet();
            return $results;
        }

        public function add($data) {
            $this->db->query('INSERT INTO consults (title, content, tag, date, time, resourceID) VALUES(:title, :content, :tag, :date, :time, :resourceID)');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':content', $data['content']);
            $this->db->bind(':tag', $data['tag']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);
            $this->db->bind(':resourceID', $data['resourceID']);
            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function resourceName($str){
            $this->db->query('SELECT DISTINCT expert.expertID as expertID, user.firstName as fName, user.lastName as lName FROM user INNER JOIN expert ON user.userID = expert.expertID 
                              INNER JOIN usertag ON user.userID = usertag.userID  WHERE ' . $str );
            $results = $this->db->resultSet();
            return $results;
        }
    }
?>