<?php
    class eventsM {
        private $db;

        public function __construct() {
            $this->db = new Database; 
        }

        public function getLastID() {
            $this->db->query('SELECT eventID from event ORDER BY eventID DESC LIMIT 1');
            $row = $this->db->single();
            return $row;
        }

        //getUserTag
        public function getUserTag() {
            $this->db->query('SELECT tag FROM usertag WHERE userID = :userID');
            $this->db->bind(':userID', $_SESSION['userID']);
            $row = $this->db->resultSet();
            return $row;
        }

        //****************************************************************Retrive Events************************************************************************************************************* */

        //getEvents for index
        public function getevents($tags, $currentDate) {
            $this->db->query('SELECT DISTINCT event.eventID as EID, event.eventTitle as title, event.date as date, event.time as time, 
            event.zoomlink as zoomlink, event.description as content, event.userID as userID, eventhandling.moderatorID as modID FROM event JOIN 
            user ON event.userID = user.userID JOIN eventhandling ON event.eventID = eventhandling.eventID AND 
            eventhandling.moderatorID = event.userID join eventtag ON eventtag.eventID = event.eventID WHERE event.status = "approved" AND 
            date >= :currentDate AND ' . $tags .' ORDER BY event.date ASC;');
            $this->db->bind(':currentDate', $currentDate);
            $row = $this->db->resultSet();
            return $row;
        }

        //getEventTags
        public function getEventTags() {
            $this->db->query('SELECT eventID as EID, GROUP_CONCAT(eventtag.tag SEPARATOR ",") as tags FROM eventtag GROUP BY eventID' );
            $row = $this->db->resultSet();
            return $row;
        }

        //get Resource Person
        public function getResourcePerson() {
            $this->db->query('SELECT user.userID as userID, CONCAT(user.firstName, " ", user.lastName) as name, user.email as email, user.pfp as 
            pfp, eventhandling.eventID as EID, expert.qualification as qual FROM user JOIN eventhandling ON eventhandling.expertID = user.userID 
            JOIN expert ON expert.expertID = eventhandling.expertID;');
            $row = $this->db->resultSet();
            return $row;
        }

        //get pending events of moderator
        public function getPendingEvents(){
            $this->db->query('SELECT DISTINCT event.eventID as EID, event.eventTitle as title, event.date as date, event.time as time, 
            event.zoomlink as zoomlink, event.description as content, event.userID as userID FROM event JOIN eventhandling ON 
            eventhandling.moderatorID = event.userID JOIN user ON eventhandling.expertID = user.userID WHERE 
            event.eventID = eventhandling.eventID AND event.status = "pending" AND event.userID = :userID ORDER BY event.date ASC;');
            $this->db->bind(':userID', $_SESSION['userID']);
            $row = $this->db->resultSet();
            return $row;
        }

        public function eventstatus(){
            $this->db->query('SELECT eventhandling.eventID as EID, eventhandling.expertID as expertID, eventhandling.moderatorID as userID, 
            eventhandling.status as status, user.firstName as fName, user.lastName as lName FROM eventhandling JOIN user ON 
            eventhandling.expertID = user.userID JOIN event ON eventhandling.eventID = event.eventID WHERE eventhandling.moderatorID = :userID AND 
            eventhandling.moderatorID = event.userID;');
            $this->db->bind(':userID', $_SESSION['userID']);
            $row = $this->db->resultSet();
            return $row;
        }

        public function getEvent($EID){
            $this->db->query('SELECT event.eventID as EID, event.eventTitle as title, event.date as date, event.time as time, 
            event.zoomlink as link, event.description as content, event.userID as userID FROM event WHERE event.userID = :userID AND 
            event.eventID = :EID;');
            $this->db->bind(':EID', $EID);
            $this->db->bind(':userID', $_SESSION['userID']);
            $row = $this->db->single();
            return $row;
        }

        public function eventTags($EID){
            $this->db->query('SELECT GROUP_CONCAT(eventtag.tag SEPARATOR ",") as tags FROM eventtag WHERE eventtag.eventID = :EID;');
            $this->db->bind(':EID', $EID);
            $row = $this->db->single();
            return $row;
        }

        public function getEventExperts($EID){
            $this->db->query('SELECT user.userID as userID, user.firstName as fName, user.lastName as lName FROM user JOIN eventhandling 
            ON eventhandling.expertID = user.userID WHERE eventhandling.eventID = :EID;');
            $this->db->bind(':EID', $EID);
            $row = $this->db->resultSet();
            return $row;
        }

        //***************************************************************** INSERT ****************************************************************//

        public function add($data) {
            $this->db->query('INSERT INTO event (eventTitle, date, time, zoomlink, description, userID) VALUES(:title, :date, :time, :zoomlink, :content, :userID)');
            // Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);
            $this->db->bind(':zoomlink', $data['link']);
            $this->db->bind(':content', $data['content']);
            $this->db->bind(':userID', $data['userID']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function eventhandling($RP, $LastID) {
            $this->db->query('INSERT INTO eventhandling (eventID, expertID, moderatorID) VALUES(:eventID, :expertID, :moderatorID)');
            // Bind values
            $this->db->bind(':eventID', $LastID);
            $this->db->bind(':expertID', $RP);
            $this->db->bind(':moderatorID', $_SESSION['userID']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function eventtag($tag, $LastID) {
                $this->db->query('INSERT INTO eventtag (eventID, tag) VALUES(:eventID, :tag)');
                // Bind values
                $this->db->bind(':eventID', $LastID);
                $this->db->bind(':tag', $tag);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //*************************************************************** UPDATE ****************************************************************//
        public function updateEvent($EID, $data){
            $this->db->query('UPDATE event SET eventTitle = :title, date = :date, time = :time, zoomlink = :link, description = :content WHERE 
            eventID = :EID');
            // Bind values
            $this->db->bind(':EID', $EID);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);
            $this->db->bind(':link', $data['link']);
            $this->db->bind(':content', $data['content']);

            // Execute
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        //*************************************************************** DELETE ****************************************************************//
        public function deleteEventTag($EID){
            $this->db->query('DELETE FROM eventtag WHERE eventID = :EID');
            $this->db->bind(':EID', $EID);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>