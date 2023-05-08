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
            $this->db->query('SELECT chatmsg.content as content, chatmsg.date as date, user.pfp as pfp, chatmsg.userID as userID, user.firstName as fName, user.lastName as lName FROM chatmsg JOIN user on chatmsg.userID = user.userID WHERE chatID = :chatID');
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

        //get usertags
        public function getUserTags($userID){
            $this->db->query('SELECT * FROM usertag WHERE userID = :userID');
            $this->db->bind(':userID', $userID);
            $results = $this->db->resultSet();
            return $results;
        }

        //get users
        public function getUsers($str){
            $this->db->query('SELECT * FROM user WHERE userID IN (SELECT userID FROM usertag WHERE ' . $str .')');
            $results = $this->db->resultSet();
            return $results;
        }
        
        //create chats
        public function create($data){
            $this->db->query('INSERT INTO chatgroup (title, createdDate, createdBy, users) VALUES (:title, :createdDate, :createdBy, :users)');
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':createdDate', $data['createdDate']);
            $this->db->bind(':createdBy', $data['createdBy']);
            $this->db->bind(':users', $data['Cusers']);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        //send messages to the database
        public function send($data){
            $this->db->query('INSERT INTO chatmsg (chatID, userID, content, date) VALUES (:chatID, :userID, :content, :date)');
            $this->db->bind(':chatID', $data['chatID']);
            $this->db->bind(':userID', $data['userID']);
            $this->db->bind(':content', $data['content']);
            $this->db->bind(':date', $data['date']);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        //delete chat
        public function deleteChat($chatID){
            $this->db->query('DELETE FROM chatgroup WHERE chatID = :chatID');
            $this->db->bind(':chatID', $chatID);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        //leave group
        public function leaveGroup($chatID, $userID){
            $this->db->query('SELECT users FROM chatgroup WHERE chatID = :chatID');
            $this->db->bind(':chatID', $chatID);
            $row = $this->db->single();
            $users = $row->users;
            $users = explode(',', $users);
            $users = array_diff($users, array($userID));
            $users = implode(',', $users);
            $this->db->query('UPDATE chatgroup SET users = :users WHERE chatID = :chatID');
            $this->db->bind(':users', $users);
            $this->db->bind(':chatID', $chatID);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
?>