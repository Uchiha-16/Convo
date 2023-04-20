<?php
    class questionsM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
//****************************************************************Create Question************************************************************************************************************* */
        public function add($data) {
            $this->db->query('INSERT into question (title, content, date, visibility, rating, userID, expertID) VALUES (:title, :content, :date, :visibility, :rating, :userID, :expertID)');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':content', $data['content']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':visibility', $data['visibility']);
            $this->db->bind(':rating', $data['rating']);
            $this->db->bind(':userID', $_SESSION['userID']);
            $this->db->bind(':expertID', $data['resourceID']);

            // Execute 
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        // Get Last QID
        public function getLastID() {
            $this->db->query('SELECT QID from question ORDER BY QID DESC LIMIT 1');
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
        public function getExperts($tag) {
            $this->db->query('SELECT DISTINCT expert.expertID as ID, user.firstName, user.lastName 
                              FROM user JOIN expert ON user.userID = expert.expertID JOIN usertag ON user.userID = usertag.userID WHERE ' . $tag .'');
            $row = $this->db->resultSet();
            return $row;
        }

        public function getUsers() {
            $this->db->query('SELECT userID FROM user');
            $results = $this->db->resultSet();
            return $results;
        }

        public function resourceName($str){
            $this->db->query('SELECT DISTINCT expert.expertID as expertID, user.firstName as fName, user.lastName as lName FROM user INNER JOIN expert ON user.userID = expert.expertID 
                              INNER JOIN usertag ON user.userID = usertag.userID  WHERE ' . $str );
            $results = $this->db->resultSet();
            return $results;
        }
//****************************************************************Retrive Questions************************************************************************************************************* */

        //getQuestions
        public function getQuestions() {
            $this->db->query('SELECT question.QID as QID, question.title as title, question.content as content, question.date as date, question.rating as rating, 
            GROUP_CONCAT(questiontag.tag SEPARATOR ",") as tags, question.moderatorID as modID FROM question JOIN questiontag ON question.QID = questiontag.QID WHERE userID = :userID GROUP BY question.QID ORDER BY question.date DESC');
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

//****************************************************************Edit Question************************************************************************************************************* */

        public function edit($data) {
            $this->db->query('UPDATE question SET title = :title, content = :content, date = :date, visibility = :visibility, expertID = :resourceID WHERE QID = :QID');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':content', $data['content']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':visibility', $data['visibility']);
            $this->db->bind(':QID', $data['QID']);
            $this->db->bind(':resourceID', $data['resourceID']);
            
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

//****************************************************************Delete Question************************************************************************************************************* */
    
            public function delete($QID) {
                $this->db->query('DELETE FROM question WHERE QID = :QID');
                $this->db->bind(':QID', $QID);
                if($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            }

            public function addRating($userID, $QID, $rating) {
                $this->db->query('INSERT INTO questionrating (QID, userID, rating) VALUES(:QID, :userID, :rating)');
                $this->db->bind(':QID', $QID);
                $this->db->bind(':userID', $userID);
                $this->db->bind(':rating', $rating);
                if($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            }

            public function getRating($QID){
                $this->db->query('SELECT AVG(rating) as rating FROM questionrating WHERE QID = :QID');
                $this->db->bind(':QID', $QID);
                $row = $this->db->single();
                return $row;
            }

}

?>