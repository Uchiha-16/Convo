<?php
    class projectsM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

//****************************************************************Create Question*************************************************************************************************************
    public function add($data) {

        if($_SESSION['role']){
            $query = 'INSERT INTO `project`(title, description, deadline, availableslot, type, availability, payment, duration, expertID) VALUES  (:title, :description, :deadline, :slot, :type, :availability, :payment, :duration, :userID)';
        }else{
            $query = 'INSERT INTO `project`(title, description, deadline, availableslot, type, availability, payment, duration, CID) VALUES  (:title, :description, :deadline, :slot, :type, :availability, :payment, :duration, :userID)';
        }
        //
        //$query = $query1."UNION".$query2; 
        $this->db->query($query);
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
        //$this->db->bind(':CID', $_SESSION['CID']);
        
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

    public function getUserRole($userID){
        $this->db->query('SELECT role FROM user WHERE userID = :userID');
        $this->db->bind(':userID', $userID);
        $row = $this->db->single();
        return $row;
    }

    //Insert Tag
    public function projectTag($tag, $LastID) {
            $this->db->query('INSERT INTO projecttag (projectID, tag) VALUES (:projectID, :tag)');
            // Bind values
            $this->db->bind(':projectID', $LastID);
            $this->db->bind(':tag', $tag);

        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

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
        $this->db->query('SELECT * FROM project inner join user on project.expertID = user.userID inner join projecttag on projecttag.projectID=project.PID');
        $row = $this->db->resultSet();
        return $row;
    }
    
    //-------------------------------View My Projects---------------------------------------------------------------
    //get project
    public function getMyProjects() {
        $this->db->query('SELECT * FROM project inner join user on project.expertID = user.userID inner join projecttag on projecttag.projectID=project.PID WHERE project.expertID = :userID');
        $this->db->bind(':userID', $_SESSION['userID']);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getProjectTags($PID) {
        $this->db->query('SELECT * FROM projecttag WHERE projectID = :projectID');
        $this->db->bind(':projectID', $PID);
        $row = $this->db->resultSet();
        return $row;
    }



    //--------------------------------Edit Projects---------------------------------------------------------------
    public function editProject($data) {
        $this->db->query('UPDATE project SET title = :title, description = :description, deadline = :deadline, availableslot = :slot, type = :type, availability = :availability, payment = :payment, duration = :duration WHERE PID = :PID');
        // Bind values
        $this->db->bind(':PID', $data['PID']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':deadline', $data['deadline']);
        $this->db->bind(':slot', $data['slot']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':availability', $data['availability']);
        $this->db->bind(':payment', $data['payment']);
        $this->db->bind(':duration', $data['duration']);
       // $this->db->bind(':userID', $_SESSION['userID']);
        
        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getProjectByID($PID) {
        $this->db->query('SELECT * FROM project inner join projecttag on project.PID=projecttag.projectID WHERE project.PID = :PID');
        $this->db->bind(':PID', $PID);
        $row = $this->db->single();
        return $row;
    }
    
    public function updateTag($tag,$PID){
        $this->db->query('UPDATE projecttag SET tag = :tag WHERE projectID = :PID');
        // Bind values
        $this->db->bind(':PID', $PID);
        $this->db->bind(':tag', $tag);
        
        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //--------------------------------Delete Projects---------------------------------------------------------------
    public function deleteProject($PID) {
        $this->db->query('DELETE FROM project WHERE PID = :PID');
        // Bind values
        $this->db->bind(':PID', $PID);
        
        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
//------------------------Apply for Project-------------------
    public function applyProject($data) {
        $this->db->query('INSERT INTO applyproject (PID, userID, cv, description) VALUES  (:PID, :userID, :cv_file, :description)');
        // Bind values
        $this->db->bind(':PID', $data['PID']);
        $this->db->bind(':userID', $data['userID']);
        $this->db->bind(':cv_file', $data['cv_file']);
        $this->db->bind(':description',$data['description']);
        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getApplications($PID){
        $this->db->query('SELECT * FROM applyproject inner join user ON user.userID=applyproject.userID WHERE PID = :PID');
        $this->db->bind(':PID', $PID);
        $row = $this->db->resultSet();
        return $row;
    }
}
?>