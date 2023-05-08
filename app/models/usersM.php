<?php
    class UsersM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        // Register User
        public function register($data) {
            $this->db->query('INSERT INTO user (firstName, lastName, email, uname, password, pfp, role) VALUES(:fname, :lname, :email, :uname, :password, :pfp, :role)');
            // Bind values
            $this->db->bind(':fname', $data['fname']);
            $this->db->bind(':lname', $data['lname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':uname', $data['uname']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':pfp', $data['pfp']);
            $this->db->bind(':role', $data['role']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Get Last ID
        public function getLastID() {
            $this->db->query('SELECT userID from user ORDER BY userID DESC LIMIT 1');
            $row = $this->db->single();
            return $row;
        }
        //Insert Tag
        public function registerTag($tag, $LastID) {
                $this->db->query('INSERT INTO usertag (userID, tag) VALUES(:user_id, :tag)');
                // Bind values
                $this->db->bind(':user_id', $LastID);
                $this->db->bind(':tag', $tag);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Find user by email
        public function findUserByEmail($email) {
            $this->db->query('SELECT * FROM user WHERE email = :email');
            // Bind value
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        // Find user by username
        public function findUserByUsername($username) {
            $this->db->query('SELECT * FROM user WHERE uname = :username');
            // Bind value
            $this->db->bind(':username', $username);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        // Login User
        public function login($username, $password) {
            $this->db->query('SELECT * FROM user WHERE uname = :username');
            $this->db->bind(':username', $username);

            $row = $this->db->single();
            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        }

        // Role
        public function userRole($username) {
            $this->db->query('SELECT * FROM userinfo WHERE username = :username');
            $this->db->bind(':username', $username);

            $row = $this->db->single();
            return $row->role;
        }

        //addExpert 
        public function addexpert($userID, $linkedin, $qualification) {
            $this->db->query('INSERT INTO expert (expertID, linkedin, qualification) VALUES(:expertID, :linkedin, :qualification)');
            // Bind values
            $this->db->bind(':expertID', $userID,);
            $this->db->bind(':linkedin', $linkedin);
            $this->db->bind(':qualification', $qualification);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //addexpertQualification
        public function addexpertQ($userID, $qualification) {
            $this->db->query('INSERT INTO expertqualification (expertID, qualification) VALUES(:expertID, :qualification)');
            // Bind values
            $this->db->bind(':expertID', $userID,);
            $this->db->bind(':qualification', $qualification);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getQIDs(){
            $this->db->query('SELECT QID FROM question');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getAIDs(){
            $this->db->query('SELECT threadID FROM answer');
            $results = $this->db->resultSet();
            return $results;
        }

        public function addInteractions($AID,$userID){
                $this->db->query('INSERT INTO interactions (threadID,interaction, userID) VALUES(:AID,"new", :userID)');
                $this->db->bind(':AID', $AID);
                $this->db->bind(':userID', $userID);
                
                if($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            }

        public function addQrating($QID,$userID){
                $this->db->query('INSERT INTO questionrating (rating,QID,userID) VALUES(0,:QID,:userID)');
                $this->db->bind(':QID', $QID);
                $this->db->bind(':userID', $userID);

                if($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
        }
    
    }
?>
