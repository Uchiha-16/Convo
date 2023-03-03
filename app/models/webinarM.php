<?php
    class webinarM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
//****************************************************************Create Webinar************************************************************************************************************* */
        public function add() {
            
            $this->db->query('INSERT into webinar (webinarTitle, date, videolink, thumbnail, expertID) VALUES (:title, :date, :videolink, :thumbnail, :expertID)');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':videolink', $data['videolink']);
            $this->db->bind(':thumbnail', $data['thumbnail']);
            $this->db->bind(':expertID', $_SESSION['userID']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getLastID() {
            $this->db->query('SELECT webinarID from webinar ORDER BY webinarID DESC LIMIT 1');
            $row = $this->db->single();
            return $row;
        }

        //Insert Tag
        public function webinarTag($tag, $LastID) {
                $this->db->query('INSERT INTO webinartag (webinarID, tag) VALUES(:webinarID, :tag)');
                // Bind values
                $this->db->bind(':webinarID', $LastID);
                $this->db->bind(':tag', $tag);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //Insert Playlist
        public function webinarPlaylist($playlist, $LastID) {
                $this->db->query('INSERT INTO playlist (playlistName, webinarID, expertID) VALUES(:playlist, :webinarID, :expertID)');
                // Bind values
                $this->db->bind(':webinarID', $LastID);
                $this->db->bind(':playlist', $playlist);
                $this->db->bind(':expertID', $_SESSION['userID']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        

        public function getplaylist() {
            $this->db->query('SELECT DISTINCT playlistName FROM playlist WHERE expertID = :expertID;');

            $this->db->bind(':expertID', $_SESSION['userID']);

            $row = $this->db->resultSet();
            return $row;
        }
        //getExpertDetails
        // public function getExpertID($tag) {
        //     $this->db->query('SELECT expert.expertID as ID, user.firstName, user.lastName FROM user JOIN expert ON user.userID = expert.expertID 
        //                     JOIN usertag ON user.userID = usertag.userID WHERE usertag.tag = :tag');
        //     $this->db->bind(':tag', $tag);
        //     $row = $this->db->resultSet();
        //     return $row;
        // }
//****************************************************************Retrive Webinars************************************************************************************************************* */

        //getWebinars
        public function getwebinars() {
            $this->db->query('SELECT webinar.webinarID as webinarID, webinar.webinarTitle as title, webinar.date as date, 
            webinar.videolink as videolink, webinar.thumbnail as thumbnail, webinar.expertID as expertID, user.pfp as pfp 
            FROM webinar, expert, user WHERE webinar.expertID = expert.expertID AND webinar.expertID = user.userID;');

            $row = $this->db->resultSet();
            return $row;
        }

        //get myWebinars
        public function getmywebinars() {
            $this->db->query('SELECT webinar.webinarID as webinarID, webinar.webinarTitle as title, webinar.date as date, 
            webinar.videolink as videolink, webinar.thumbnail as thumbnail, webinar.expertID as expertID
            FROM webinar WHERE webinar.expertID = :expertID');

            $this->db->bind(':expertID', $_SESSION['userID']);

            $row = $this->db->resultSet();
            return $row;
        }

        //getQuestionTags
        // public function getQuestionTags($QID) {
        //     $this->db->query('SELECT * FROM questiontag WHERE QID = :QID');
        //     $this->db->bind(':QID', $QID);
        //     $row = $this->db->resultSet();
        //     return $row;
        // }

//****************************************************************Edit Question************************************************************************************************************* */

        // public function edit($data) {
        //     $this->db->query('UPDATE question SET title = :title, content = :content, date = :date, visibility = :visibility WHERE QID = :QID');
        //     // Bind values
        //     $this->db->bind(':title', $data['title']);
        //     $this->db->bind(':content', $data['content']);
        //     $this->db->bind(':date', $data['date']);
        //     $this->db->bind(':visibility', $data['visibility']);
        //     $this->db->bind(':QID', $data['QID']);

        //     // Execute
        //     if($this->db->execute()) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }

    //Get Question by ID
        // public function getQuestionByID($QID) {
        //     $this->db->query('SELECT question.QID as QID, question.title as title, question.content as content, question.visibility as visibility,
        //     GROUP_CONCAT(questiontag.tag SEPARATOR ",") as tags, question.userID as userID FROM question JOIN questiontag ON question.QID = questiontag.QID WHERE question.QID = :QID');
        //     $this->db->bind(':QID', $QID);
        //     $row = $this->db->single();
        //     return $row;
        // }

        //Delete QuestionTag
        // public function deleteQuestionTag($QID) {
        //     $this->db->query('DELETE FROM questiontag WHERE QID = :QID');
        //     $this->db->bind(':QID', $QID);
        //     if($this->db->execute()) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }

        //Update Tags
        // public function UpdateQTag($tag, $LastID) {
        //     $this->db->query('UPDATE questiontag SET  VALUES(:user_id, :tag)');
        //     // Bind values
        //     $this->db->bind(':user_id', $LastID);
        //     $this->db->bind(':tag', $tag);

        // Execute
        // if($this->db->execute()) {
        //     return true;
        // } else {
        //     return false;
        // }
    }

//****************************************************************Delete Question************************************************************************************************************* */
    
            // public function delete($QID) {
            //     $this->db->query('DELETE FROM question WHERE QID = :QID');
            //     $this->db->bind(':QID', $QID);
            //     if($this->db->execute()) {
            //         return true;
            //     } else {
            //         return false;
            //     }
            // }

?>