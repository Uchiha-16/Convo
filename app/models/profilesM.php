<?php
    class profilesM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        //**************************************************************** Get User Details************************************************************************************************************* */

        //getWebinars
        public function getprofile() {
            $this->db->query('SELECT user.userID AS userID, user.firstName as fName, user.lastName as lName, CONCAT(user.firstName , " " , user.lastName) AS userName, user.pfp AS pfp, password, uname, email,role FROM user WHERE userID = :userID;');

            $this->db->bind(':userID', $_SESSION['userID']);

            $row = $this->db->single();
            return $row;
        }

        //**************************************************************** Get Expert Details************************************************************************************************************* */
        public function getexpertprofile() {
            $this->db->query('SELECT user.userID AS userID, user.firstName as fName, user.lastName as lName, CONCAT(user.firstName , " " , user.lastName) AS userName, user.pfp AS pfp, user.password, user.uname, user.email, user.role, expert.expertID AS expertID, expert.linkedin AS linkedin, expert.qualification AS qualification, expert.designation AS designation FROM expert INNER JOIN user WHERE expert.expertID = user.userID AND user.userID = :userID;');

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
            $this->db->bind(':pfp', $data['pfp']);

            $row = $this->db->execute();
            return $row;
        }

        //update expert details
        public function updateExpert($data){
            $this->db->query('UPDATE expert SET linkedin = :linkedin, qualification = :qualification, designation = :designation WHERE expertID = :userID');
            $this->db->bind(':userID', $_SESSION['userID']);
            $this->db->bind(':linkedin', $data['linkedin']);
            $this->db->bind(':qualification', $data['qualification']);
            $this->db->bind(':designation', $data['designation']);            

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

        //***************************************Events*****************************//

        //get attend Events
        public function getAttendEvents($userId){
            $this->db->query('SELECT DISTINCT eventID FROM eventuser WHERE userID = :userID;');
            $this->db->bind(':userID', $userId);
            $row = $this->db->resultSet();
            return $row;
        }

        //getevents
        public function getEvent($EID){
            $this->db->query('SELECT event.eventID as EID, event.eventTitle as title, event.zoomlink as zoomlink, event.date as date, 
            event.time as time FROM event WHERE eventID = :eventID;');
            $this->db->bind(':eventID', $EID);
            $row = $this->db->single();
            return $row;
        }

        //get event recource person
        public function getResourcePerson() {
            $this->db->query('SELECT eventhandling.eventID as EID, user.userID as userID, CONCAT(user.firstName, " ", user.lastName) as name FROM 
            user JOIN eventhandling ON eventhandling.expertID = user.userID;');
            $row = $this->db->resultSet();
            return $row;
        }

        //find by user name
        // public function findUserbyUsername($uname){
        //     $this->db->query('SELECT * FROM user WHERE uname = :username');
        //     // Bind value
        //     $this->db->bind(':username', $username);

        //     $row = $this->db->single();

        //     // Check row
        //     if($this->db->rowCount() > 0) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }

        //*********************************** CALENDAR **************************************** */
        public function getConsultDates($userID, $current_month, $current_year){
            $this->db->query('SELECT consultation.consultID as consultID, consultation.userID as userID, consultation.expertID as expertID, 
            consultation.title as title, consultation.date as date, consultation.time as time, user.lastName as lName, user.firstName as fName 
            FROM consultation JOIN user ON user.userID = consultation.expertID WHERE consultation.status = "approved" AND consultation.userID = :userID 
            AND MONTH(consultation.date) = :current_month AND YEAR(consultation.date) = :current_year;');
            $this->db->bind(':userID', $userID);
            $this->db->bind(':current_month', $current_month);
            $this->db->bind(':current_year', $current_year);
            $row = $this->db->resultSet();
            return $row;
        }

    }
?>