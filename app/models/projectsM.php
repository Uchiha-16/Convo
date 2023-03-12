<?php
    class projectsM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

//****************************************************************Create Question*************************************************************************************************************
    public function add($data) {
        $query1 = 'INSERT INTO `project`(title, description, deadline, availableslot, type, availability, payment, duration, expertID) VALUES  (:title, :description, :deadline, :slot, :type, :availability, :payment, :duration, :userID)';
        //$query2 = 'INSERT INTO `project`(title, description, deadline, availableslot, type, availability, payment, duration, CID) VALUES  (:title, :description, :deadline, :slot, :type, :availability, :payment, :duration, :userID)';
        //$query = $query1."UNION".$query2; 
        $this->db->query($query1);
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':deadline', $data['deadline']);
        $this->db->bind(':slot', $data['slot']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':availability', $data['availability']);
        $this->db->bind(':payment', $data['payment']);
        $this->db->bind(':duration', $data['duration']);
        $this->db->bind(':userID', $_SESSION['userID']);
        
        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get Last UserID
    public function getLastID() {
        $this->db->query('SELECT PID from project ORDER BY PID DESC LIMIT 1');
        $row = $this->db->single();
        return $row;
    }

    public function getUserTags($userID) {
        $this->db->query('SELECT GROUP_CONCAT(tag SEPARATOR ",") as tags FROM usertag WHERE userID = :userID');
        $this->db->bind(':userID', $userID);
        $row = $this->db->single();
        return $row;
    }

    //Insert Tag
    // public function projectTag($tag, $LastID) {
    //         $this->db->query('INSERT INTO tag (QID, tag) VALUES(:QID, :tag)');
    //         // Bind values
    //         $this->db->bind(':QID', $LastID);
    //         $this->db->bind(':tag', $tag);

    //     // Execute
    //     if($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    //getExpertDetails
    // public function getExpertID($tag) {
    //     $this->db->query('SELECT expert.expertID as ID, user.firstName, user.lastName FROM user JOIN expert ON user.userID = expert.expertID 
    //                     JOIN usertag ON user.userID = usertag.userID WHERE usertag.tag = :tag');
    //     $this->db->bind(':tag', $tag);
    //     $row = $this->db->resultSet();
    //     return $row;
    // }

    //----------------------------------View All Projects-----------------------------------------------------------
    //get project
    public function getAllProjects() {
        $this->db->query('SELECT * FROM project inner join user on project.expertID = user.userID');
        $row = $this->db->resultSet();
        return $row;
    }
    
    //-------------------------------View My Projects---------------------------------------------------------------
    //get project
    public function getMyProjects() {
        $this->db->query('SELECT * FROM project inner join user on project.expertID = user.userID WHERE project.expertID = :userID');
        $this->db->bind(':userID', $_SESSION['userID']);
        $row = $this->db->resultSet();
        return $row;
    }


}
?>