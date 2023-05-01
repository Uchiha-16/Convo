<?php
    class profilesM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        //****************************************************************Get User Details************************************************************************************************************* */

        //getWebinars
        public function getprofile() {
            $this->db->query('SELECT user.userID AS userID, user.firstName as fName, user.lastName as lName, CONCAT(user.firstName , " " , user.lastName) AS userName, user.pfp AS pfp, password, uname, email,role FROM user WHERE userID = :userID;');

            $this->db->bind(':userID', $_SESSION['userID']);

            $row = $this->db->single();
            return $row;
        }

        //****************************************************************User Questions details************************************************************************************************************* *//
        public function getQuestions() {
            $this->db->query('SELECT QID, title, date, answercount FROM question WHERE userID = :userID ORDER BY date DESC;');

            $this->db->bind(':userID', $_SESSION['userID']);

            $row = $this->db->resultSet();
            return $row;
        }

        //****************************************************************Skill Test details************************************************************************************************************* *//
        public function getSkilltest() {
            $this->db->query('SELECT field, score, date FROM skilltest WHERE userID = :userID ORDER BY date DESC;');

            $this->db->bind(':userID', $_SESSION['userID']);

            $row = $this->db->resultSet();
            return $row;
        }
        //*******************************************************No. of Chat Groups****************************************//
        public function chatgroups() {
            $this->db->query('SELECT COUNT(*) AS chatgroups FROM chatgroup WHERE createdBy = :userID OR users LIKE :userIDWildcard');
            $this->db->bind(':userID', $_SESSION['userID']);
            $this->db->bind(':userIDWildcard', '%' . $_SESSION['userID'] . '%');

            $row = $this->db->single();
            return $row;
        }

        //*************************************get User Tags *******************************//
        public function getUsertags(){
            $this->db->query('SELECT GROUP_CONCAT(usertag.tag SEPARATOR ",") as tags FROM usertag WHERE userID = :userID');
            $this->db->bind(':userID', $_SESSION['userID']);

            $row = $this->db->single();
            return $row;
        }

        //*************************************Delete User Tags *******************************//
        public function deleteUserTag(){
            $this->db->query('DELETE FROM usertag WHERE userID = :userID');
            $this->db->bind(':userID', $_SESSION['userID']);

            $row = $this->db->execute();
            return $row;
        }

        //***************************************Update userdetails*****************************//
        public function updateUser($data){
            $this->db->query('UPDATE user SET firstName = :fname, lastName = :lname, email = :email, uname = :uname, password = :password, pfp = :pfp WHERE userID = :userID');
            $this->db->bind(':userID', $_SESSION['userID']);
            $this->db->bind(':fname', $data['fname']);
            $this->db->bind(':lname', $data['lname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':uname', $data['uname']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':pfp', $data['pfp_name']);

            $row = $this->db->execute();
            return $row;
        }
        
        //***************************************Insert UserTags*****************************//
        public function userTag($tag){
            $this->db->query('INSERT INTO usertag (userID, tag) VALUES (:userID, :tag)');
            $this->db->bind(':userID', $_SESSION['userID']);
            $this->db->bind(':tag', $tag);

            $row = $this->db->execute();
            return $row;
        }

    }
?>