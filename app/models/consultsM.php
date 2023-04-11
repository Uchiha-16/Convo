<?php
    class consultsM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function add($data) {
            $this->db->query('INSERT INTO consultation (userID, expertID, title, tags,  date, time, status) VALUES(:userID, :expertID, :title, :tags, :date, :time, "pending")');
            // Bind values
            $this->db->bind(':userID', $data['userID']);
            $this->db->bind(':expertID', $data['expertID']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':tags', $data['tags']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);

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

        public function getConsults($userID) {
            $this->db->query('SELECT DISTINCT consultation.title as title, consultation.date as date , consultation.time as time, user.firstName as fName, user.lastName as lName 
                              FROM consultation JOIN user ON consultation.expertID = user.userID WHERE consultation.userID = :userID AND consultation.status = "approved"');
            $this->db->bind(':userID', $userID);
            $row = $this->db->resultSet();
            return $row;
        }

        public function MygetConsults($userID) {
            $this->db->query('SELECT * FROM consultation WHERE userID = :userID AND status = "pending"');
            $this->db->bind(':userID', $userID);
            $row = $this->db->resultSet();
            return $row;
        }
    }
?>