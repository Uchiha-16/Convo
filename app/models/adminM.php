<?php
    class adminM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getAllComplaints() {
            $this->db->query('SELECT * FROM complaint');
            return $this->db->resultSet();
        }

        public function getUserById($userID) {
            $this->db->query('SELECT * FROM user WHERE userID = :userID');
            $this->db->bind(':userID', $userID);
            return $this->db->single(PDO:: FETCH_OBJ);
        }

        public function getAllUsers(){
            $this->db->query('SELECT userID,CONCAT(firstName," ",lastName) AS name,uname,email,role from user');
            return $this->db->resultSet(); 
        }

        public function getUsersByRole($role){
            $this->db->query('SELECT userID, CONCAT(firstName," ",lastName) AS name,email,uname,role FROM user WHERE role =:role');
            $this->db->bind(':role',$role);
            return $this->db->resultSet();
        }
     }
    
?>