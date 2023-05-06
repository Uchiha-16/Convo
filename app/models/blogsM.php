<?php
    class blogsM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
//****************************************************************Create Blog************************************************************************************************************* */
        public function add($data) {
            if($_SESSION['role']){
                $this->db->query('INSERT into blog (title, content, headImg, userID) VALUES (:title, :content, :headImg, :userID)');
            }else{
                $this->db->query('INSERT into blog (title, content, headImg, CID) VALUES (:title, :content, :headImg, :CID)');
            }
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':content', $data['content']);
            $this->db->bind(':headImg', $data['thumbnail_name']);
            $this->db->bind(':userID', $_SESSION['userID']);
            //$this->db->bind(':CID', $_SESSION['CID']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        // Get Last QID
        public function getLastID() {
            $this->db->query('SELECT BID from blog ORDER BY BID DESC LIMIT 1');
            $row = $this->db->single();
            return $row;
        }

        //Insert Tag
        public function blogTag($tag, $LastID) {
                $this->db->query('INSERT INTO blogtag (BID, tag) VALUES(:BID, :tag)');
                // Bind values
                $this->db->bind(':BID', $LastID);
                $this->db->bind(':tag', $tag);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getUsers() {
            $this->db->query('SELECT userID FROM user');
            $results = $this->db->resultSet();
            return $results;
        }

        public function addRating($userID, $BID, $rating) {
            $this->db->query('INSERT INTO blograting (QID, userID, rating) VALUES(:QID, :userID, :rating)');
            $this->db->bind(':QID', $BID);
            $this->db->bind(':userID', $userID);
            $this->db->bind(':rating', $rating);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getBlogs(){
            $this->db->query('SELECT * FROM blog inner join user on blog.userID=user.userID;');
            $row = $this->db->resultSet();
            return $row;
        }
}

?>