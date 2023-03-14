<?php
    class profilesM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        //****************************************************************Retrive Webinars************************************************************************************************************* */

        //getWebinars
        public function getprofile() {
            $this->db->query('SELECT user.userID AS userID, firstName, lastName, CONCAT(user.firstName , " " , user.lastName) AS userName, user.pfp AS pfp, password, uname, email FROM user WHERE userID = :userID;');

            $this->db->bind(':userID', $_SESSION['userID']);

            $row = $this->db->single();
            return $row;
        }

        //****************************************************************Retrive Webinars************************************************************************************************************* */


    }
?>