<?php
    class questionsM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function add($data) {
            $this->db->query('INSERT into question (title, content, date, visibility, rating, userID) VALUES (:title, :content, :date, :visibility, :rating, :userID)');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':content', $data['content']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':visibility', $data['visibility']);
            $this->db->bind(':rating', $data['rating']);
            $this->db->bind(':userID', $_SESSION['userID']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Get Last QID
        public function getLastID() {
            $this->db->query('SELECT QID from question ORDER BY userID DESC LIMIT 1');
            $row = $this->db->single();
            return $row;
        }

        //Insert Tag
        public function questionTag($tag, $LastID) {
                $this->db->query('INSERT INTO questiontag (QID, tag) VALUES(:QID, :tag)');
                // Bind values
                $this->db->bind(':QID', $LastID);
                $this->db->bind(':tag', $tag);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //getExpertDetails
        public function getExpertID($tag) {
            $this->db->query('SELECT expert.expertID as ID, user.firstName, user.lastName FROM user JOIN expert ON user.userID = expert.expertID 
                            JOIN usertag ON user.userID = usertag.userID WHERE usertag.tag = :tag');
            $this->db->bind(':tag', $tag);
            $row = $this->db->resultSet();
            return $row;
        }

        //getQuestions
        public function getQuestions() {
            $this->db->query('SELECT question.QID as QID, question.title as title, question.content as content, question.date as date, question.rating as rating, 
            GROUP_CONCAT(questiontag.tag SEPARATOR ",") as tags, question.moderatorID as modID FROM question JOIN questiontag ON question.QID = questiontag.QID WHERE userID = :userID GROUP BY question.QID');
            $this->db->bind(':userID', $_SESSION['userID']);
            $row = $this->db->resultSet();
            return $row;
        }

        //getQuestionTags
        public function getQuestionTags($QID) {
            $this->db->query('SELECT * FROM questiontag WHERE QID = :QID');
            $this->db->bind(':QID', $QID);
            $row = $this->db->resultSet();
            return $row;
        }

        //update Question
        public function edit($data) {
            $this->db->query('UPDATE question SET title = :title, content = :content, date = :date, visibility = :visibility WHERE QID = :QID');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':content', $data['content']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':visibility', $data['visibility']);
            $this->db->bind(':QID', $data['QID']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    //Get Question by ID
        public function getQuestionByID($QID) {
            $this->db->query('SELECT question.QID as QID, question.title as title, question.content as content, question.visibility as visibility,
            GROUP_CONCAT(questiontag.tag SEPARATOR ",") as tags, question.userID as userID FROM question JOIN questiontag ON question.QID = questiontag.QID WHERE question.QID = :QID');
            $this->db->bind(':QID', $QID);
            $row = $this->db->single();
            return $row;
        }

        //Delete QuestionTag
        public function deleteQuestionTag($QID) {
            $this->db->query('DELETE FROM questiontag WHERE QID = :QID');
            $this->db->bind(':QID', $QID);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //Update Tags
        public function UpdateQTag($tag, $LastID) {
            $this->db->query('UPDATE questiontag SET  VALUES(:user_id, :tag)');
            // Bind values
            $this->db->bind(':user_id', $LastID);
            $this->db->bind(':tag', $tag);

        // Execute
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>