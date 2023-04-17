<?php
    class webinarM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
//****************************************************************Create Webinar************************************************************************************************************* */
        public function add($data) {
            
            $this->db->query('INSERT into webinar (webinarTitle, date, videolink, thumbnail, expertID, published) VALUES (:title, :date, :videolink, :thumbnail, :expertID, :published)');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':videolink', $data['videolink']);
            $this->db->bind(':thumbnail', $data['thumbnail_name']);
            $this->db->bind(':expertID', $_SESSION['userID']);
            $this->db->bind(':published', $data['published']);

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
         
//****************************************************************Retrive Webinars************************************************************************************************************* */

        //getWebinars
        public function getwebinars($tags) {
            $this->db->query('SELECT DISTINCT webinar.webinarID as webinarID, webinar.webinarTitle as title, webinar.date as date, webinar.videolink as videolink,
            webinar.thumbnail as thumbnail, webinar.expertID as expertID, user.pfp as pfp, CONCAT(user.firstName, " ", user.lastName) as name 
            FROM webinar JOIN user ON webinar.expertID = user.userID JOIN webinartag ON webinar.webinarID = webinartag.webinarID WHERE webinar.published = "1" AND ' . $tags .' ORDER BY webinar.date DESC;');

            $row = $this->db->resultSet();
            return $row;
        }

        //get myWebinars
        public function getmywebinars() {
            $this->db->query('SELECT webinar.webinarID as webinarID, webinar.webinarTitle as title, webinar.date as date, 
            webinar.videolink as videolink, webinar.thumbnail as thumbnail, webinar.expertID as expertID, playlist.playlistName as playlistName,
            webinar.published as published FROM webinar, playlist WHERE webinar.expertID = :expertID AND webinar.webinarID = playlist.webinarID ORDER BY webinar.date DESC;');

            $this->db->bind(':expertID', $_SESSION['userID']);

            $row = $this->db->resultSet();
            return $row;
        }

        //getWebinarTags
        public function getWebinarTags() {
            $this->db->query('SELECT webinarID, GROUP_CONCAT(webinartag.tag SEPARATOR ",") as tags FROM webinartag GROUP BY webinarID;' );
            $row = $this->db->resultSet();
            return $row;
        }
//======================================================= EDIT =========================================================================//
        //getMyWebinarTags by ID
        public function getWebinarTagsbyID($WID) {
            $this->db->query('SELECT webinarID, GROUP_CONCAT(webinartag.tag SEPARATOR ",") as tags FROM webinartag WHERE webinarID = :WID;' );
            $this->db->bind(':WID', $WID);
            $row = $this->db->single();
            return $row;
        }

        //getplaylist by ID
        public function getPlaylistbyID($WID) {
            $this->db->query('SELECT webinarID, GROUP_CONCAT(playlist.playlistName SEPARATOR ",") as playlistName FROM playlist WHERE webinarID = :WID;' );
            $this->db->bind(':WID', $WID);
            $row = $this->db->single();
            return $row;
        }

        //get myWebinars by ID
        public function getmywebinarsbyID($WID) {
            $this->db->query('SELECT webinar.webinarID as webinarID, webinar.webinarTitle as title, webinar.date as date, 
            webinar.videolink as videolink, webinar.thumbnail as thumbnail, webinar.published as published, webinar.expertID as expertID FROM webinar 
            WHERE webinar.expertID = :expertID AND webinar.webinarID = :WID;');

            $this->db->bind(':expertID', $_SESSION['userID']);
            $this->db->bind(':WID', $WID);

            $row = $this->db->single();
            return $row;
        }
//====================================================================================================================================//
        //getUserTag
        public function getUserTag() {
            $this->db->query('SELECT tag FROM usertag WHERE userID = :userID');
            $this->db->bind(':userID', $_SESSION['userID']);
            $row = $this->db->resultSet();
            return $row;
        }

        //delete webinar
        public function delete($WID) {
            $this->db->query('DELETE FROM webinar WHERE webinarID = :WID');
            $this->db->bind(':WID', $WID);
            if($this->db->execute()) {
                return true;
            } else {
                 return false;
            }
        }

//****************************************************************Edit Webinar************************************************************************************************************* */

        public function editwebinar($data) {
            $this->db->query('UPDATE webinar SET webinarTitle = :title, date = :date, videolink = :videolink, thumbnail = :thumbnail WHERE webinarID = :WID');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':videolink', $data['videolink']);
            $this->db->bind(':thumbnail', $data['thumbnail']);
            $this->db->bind(':WID', $data['WID']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //Update Tags
        public function editwebinartag($tag, $WID) {
            $this->db->query('UPDATE webinartag SET VALUES(:wid, :tag)');
            // Bind values
            $this->db->bind(':wid', $WID);
            $this->db->bind(':tag', $tag);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }

        }

        //Update Playlist
        public function editplaylist($playlist, $WID) {
            $this->db->query('UPDATE playlist SET VALUES(:playlist, :wid, :expertID)');
            // Bind values
            $this->db->bind(':wid', $WID);
            $this->db->bind(':playlist', $playlist);
            $this->db->bind(':expertID', $_SESSION['userID']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }

        }
    }

?>