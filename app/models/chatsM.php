<?php
    class chatsM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getuserChats($userID) {
            $this->db->query('SELECT * FROM chatgroup WHERE createdBy = :userID OR users LIKE :userIDWildcard');
            $this->db->bind(':userID', $userID);
            $this->db->bind(':userIDWildcard', '%' . $userID . '%'); 
            $results = $this->db->resultSet();
            return $results;
        }

        //getchat messages 
        public function getChatMessages($chatID) {
            $this->db->query('SELECT chatmsg.content as content, chatmsg.date as date, user.pfp as pfp, user.firstName as fName, user.lastName as lName FROM chatmsg JOIN user on chatmsg.userID = user.userID WHERE chatID = :chatID');
            $this->db->bind(':chatID', $chatID);
            $results = $this->db->resultSet();
            return $results;
        }
        
        //get chat Users
        public function getChatUsers($chatID){
            $this->db->query('SELECT chatgroup.chatID AS chatID, user.userID AS userID, user.firstName AS fName, user.lastName AS lName, user.pfp AS pfp FROM chatgroup JOIN user ON FIND_IN_SET(user.userID, chatgroup.users) > 0 
                              WHERE chatgroup.chatID = :chatID'); 
            $this->db->bind(':chatID', $chatID);
            $results = $this->db->resultSet();
            return $results;
        }

        //get chat admin
        public function getChatAdmin($chatID){
            $this->db->query('SELECT chatgroup.chatID AS chatID, user.userID AS userID, user.firstName AS fName, user.lastName AS lName, user.pfp AS pfp, chatgroup.createdBy AS createdBy FROM chatgroup JOIN user ON chatgroup.createdBy = user.userID WHERE chatgroup.chatID = :chatID');
            $this->db->bind(':chatID', $chatID);
            $row = $this->db->single();
            return $row;
        }
        
    }
?>