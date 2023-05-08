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
                              FROM consultation JOIN user ON consultation.expertID = user.userID WHERE consultation.userID = :userID AND consultation.status = "approved" AND consultation.date >= CURRENT_DATE');
            $this->db->bind(':userID', $userID);
            $row = $this->db->resultSet();
            return $row;
        }


        public function getRequests($userID){
            $this->db->query('SELECT DISTINCT consultation.consultID as consultID, consultation.title as title, consultation.date as date , consultation.time as time, user.firstName as fName, user.lastName as lName 
            FROM consultation JOIN user ON consultation.expertID = user.userID WHERE consultation.status = "pending" AND consultation.userID = :userID AND consultation.date >= CURRENT_DATE');
            $this->db->bind(':userID', $userID);
            $row = $this->db->resultSet();
            return $row;
        }

        public function AcceptedConsults($id) {
            $this->db->query('SELECT DISTINCT consultation.title as title, consultation.date as date , consultation.time as time, user.firstName as fName, user.lastName as lName 
            FROM consultation JOIN user ON consultation.userID = user.userID WHERE consultation.expertID = :id AND consultation.status = "approved" AND consultation.date >= CURRENT_DATE');
            $this->db->bind(':id', $id);
            $row = $this->db->resultSet();
            return $row;
        }

        public function AcceptConsults($id) {
            $this->db->query('SELECT DISTINCT consultation.consultID as consultID, consultation.title as title, consultation.date as date , consultation.time as time, user.firstName as fName, user.lastName as lName 
            FROM consultation JOIN user ON consultation.userID = user.userID WHERE consultation.expertID = :id AND consultation.status = "pending" AND consultation.date >= CURRENT_DATE');
            $this->db->bind(':id', $id);
            $row = $this->db->resultSet();
            return $row;
        }

        public function DeclineConsults($consultID){
            $this->db->query('UPDATE consultation SET status = "declined" WHERE consultID = :consultID');
            $this->db->bind(':consultID', $consultID);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Accept($consultID){
            $this->db->query('UPDATE consultation SET status = "approved"  WHERE consultID = :consultID');
            $this->db->bind(':consultID', $consultID);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function Mysearch($search,$userID){
            $this->db->query('SELECT DISTINCT consultation.title as title, consultation.date as date , consultation.time as time,consultation.status as status, user.firstName as fName, user.lastName as lName 
            FROM consultation JOIN user ON consultation.expertID = user.userID WHERE consultation.userID = :userID AND (consultation.title LIKE :search OR  FIND_IN_SET("$search", consultation.tags) > 0 OR consultation.tags LIKE :search OR consultation.date LIKE :search OR consultation.time LIKE :search) ');
            $this->db->bind(':search', '%' . $search . '%');
            $this->db->bind(':userID', $userID);
            $row = $this->db->resultSet();
            return $row;
        }

        public function Notsearch($search,$userID){
            $this->db->query('SELECT DISTINCT consultation.title as title, consultation.date as date , consultation.time as time,consultation.status as status, user.firstName as fName, user.lastName as lName 
            FROM consultation JOIN user ON consultation.expertID = user.userID WHERE consultation.expertID = :userID AND (consultation.title LIKE :search OR  FIND_IN_SET("$search", consultation.tags) > 0 OR consultation.tags LIKE :search OR consultation.date LIKE :search OR consultation.time LIKE :search)');
            $this->db->bind(':search', '%' . $search . '%');
            $this->db->bind(':userID', $userID);
            $row = $this->db->resultSet();
            return $row;
        }

    }
?>