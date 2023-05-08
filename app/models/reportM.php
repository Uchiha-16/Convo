<?php
    class reportM{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function add($data){
            $this->db->Query('INSERT into complaint(userID,title, type,visibility,reason,description,date) VALUES (:userID,:title, :type, :visibility,:reason,:description,:date)');
            
            $this->db->bind(':userID', $_SESSION['userID']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':visibility', $data['visibility']);
            $this->db->bind(':reason', $data['reason']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':date',$data['date']);

            if($this->db->execute()){
                return true;
            } else{
                return false;
            }

        }

        
    }
    ?>