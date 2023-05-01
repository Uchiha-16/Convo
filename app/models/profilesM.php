<?php
    class profilesM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        //****************************************************************Get User Details************************************************************************************************************* */

        //getWebinars
        public function getprofile() {
            $this->db->query('SELECT user.userID AS userID, CONCAT(user.firstName , " " , user.lastName) AS userName, user.pfp AS pfp, password, uname, email,role FROM user WHERE userID = :userID;');

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
    }
?>