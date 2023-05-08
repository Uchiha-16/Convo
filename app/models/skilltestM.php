<?php
    class skilltestM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
        public function getTestScoreByUserId($userID){
            $query=("SELECT s.score, t.tag FROM skilltest s INNER JOIN skilltesttag t ON s.STID = t.STID WHERE s.userID = ? ORDER BY s.date DESC, s.time DESC");
            $stmt = $this->db->prepare($query);
            $stmt->execute([$userID]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            // return $this->db->select("SELECT * FROM 'skilltest' WHERE ");
        }

        public function getTagBySTID($LastID){
                $this->db->query('SELECT tag FROM skilltesttag WHERE STID = :STID');
                $this->db->bind(':STID', $LastID);
                $row = $this->db->single();
                return $row ? $row->tag : '';
           
        }


        public function getUserTag() {
            $userID = $_SESSION['userID'];
            $this->db->query('SELECT tag FROM usertag WHERE userID = :userID');
            $this->db->bind(':userID', $userID);
            $row = $this->db->resultSet();

            if(!empty($row)){
            return $row;
            }else{
                return false;
            }
        }
        public function getAverageTestScoreByUserId($userID){
            $query="SELECT ROUND(AVG(score),2) AS avg_score FROM skilltest  WHERE userID=?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$userID]);
            $row = $stmt->fetch();
        
            if(!empty($row)){
                return $row['avg_score'];
            }else{
                return false;
            }
        }

        // public function viewOnrecord($STID){
        //     return $this->db->select("SELECT * FROM '' WHERE STID = '".$STID."'LIMIT 1");
        // }
/////////////////////////////////////////////////////////////////////////////////////////////////
public function getTestQuestions($tag){
    $query =  "(SELECT QPID, question, difficulty FROM questionpool WHERE QPID IN (SELECT QPID FROM questionpooltag WHERE tag = :tag) AND difficulty = 'easy' ORDER BY RAND() LIMIT 5)
    UNION ALL
    (SELECT QPID, question, difficulty FROM questionpool WHERE QPID IN (SELECT QPID FROM questionpooltag WHERE tag = :tag) AND difficulty = 'medium' ORDER BY RAND() LIMIT 10)
    UNION ALL
    (SELECT QPID, question, difficulty FROM questionpool WHERE QPID IN (SELECT QPID FROM questionpooltag WHERE tag = :tag) AND difficulty = 'hard' ORDER BY RAND() LIMIT 5)";
    $this->db->query($query);
    $this->db->bind(':tag',$tag);
    $rows = $this->db->resultSet();
    return $rows;
}


       

        public function getTestAnswers($QPID){
            
            $query = "SELECT  content,validity
                        FROM answerpool
                       WHERE QPID IN (SELECT QPID FROM questionpool WHERE QPID=:QPID)";
            $this->db->query($query);
            $this->db->bind(':QPID',$QPID);
            $rows = $this->db->resultSet();
        
            return $rows;
        } 
        //////////////calculate the score///////////////////////////////////

        public function addSkillTest($score,$date,$time,$userID){
            $this->db->query('INSERT INTO skilltest(score,date,time,userID) VALUES (:score,:date,:time,:userID)');
            $this->db->bind(':score',$score);
            $this->db->bind(':date',$date);
            $this->db->bind(':time',$time);
            $this->db->bind(':userID',$userID);

            $this->db->execute();
        
        }  
        
        //get the STID of the inserted row 
        public function lastInsertedSTID() {
            $this->db->query('SELECT STID from skilltest ORDER BY STID DESC LIMIT 1');
            $row = $this->db->single();
            return (int) $row->STID;
        }

        //insert the STID and tag into the skilltesttag table
        public function setSkilltestTag($LastID,$tag){
            $this->db->query('INSERT INTO skilltesttag(STID,tag) VALUES(:STID,:tag)');
            $this->db->bind(':STID',$LastID);
            $this->db->bind(':tag',$tag);

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
       

        public function getCorrectAnswerByQPID($QPID){
            $this->db->query('SELECT content FROM answerpool WHERE QPID = :QPID AND validity = 1');
            $this->db->bind(':QPID', $QPID);
        
            $result = $this->db->single();
            return  $result->content;
        }

        // public function getAnswerValidityByQPID($QPID, $selectedAnswer)
        // {
        //     $this->db->query('SELECT validity FROM answerpool WHERE QPID = :QPID AND content = :selectedAnswer');
        //     $this->db->bind(':QPID', $QPID);
        //     $this->db->bind(':selectedAnswer', $selectedAnswer);
        
        //     $result = $this->db->single();
        //     return $result->validity;
        // }

        // public function isAnswerCorrect($QPID, $selectedAnswer)
        // {
        //     $this->db->query('SELECT validity FROM answerpool WHERE QPID = :QPID AND content = :selectedAnswer');
        //     $this->db->bind(':QPID', $QPID);
        //     $this->db->bind(':selectedAnswer', $selectedAnswer);

        //     $result = $this->db->single();
        //     return ($result && $result->validity == 1);
        // }

/////////////////////////////////////////////////////////////////////////////////////////////////

        public function add($data){
            $this->db->query('INSERT INTO questionpool(question,difficulty,expertID) VALUES (:question,:difficulty,:userID)');
            $this->db->bind(':question', $data['question']);
            $this->db->bind(':difficulty', $data['difficulty']);
            $this->db->bind(':userID', $_SESSION['userID']);
    
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function lastInsertId() {
            $this->db->query('SELECT QPID from questionpool ORDER BY QPID DESC LIMIT 1');
            $row = $this->db->single();
            return (int) $row->QPID;
        }

    

                //add tag to the questionpooltag table
        public function setQuestionpoolTag($tag,$LastID){
                $this->db->query('INSERT INTO questionpooltag (QPID,tag) VALUES (:QPID,:tag)');
                $this->db->bind(':QPID',$LastID);
                $this->db->bind(':tag',$tag);

                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
            }
            
            public function addAnswerpool($LastID, $data){
                //add content and validity to answerpool table
                $options = $data['content'];
                $validity = explode(',', $data['validity']);
                for($i = 0; $i < count($options); $i++) {
                    $this->db->query('INSERT INTO answerpool (QPID, content, validity) VALUES (:QPID, :content, :validity)');
                    $this->db->bind(':QPID', $LastID);
                    $this->db->bind(':content', $options[$i]);
                    $this->db->bind(':validity', $validity[$i]);
                    if (!$this->db->execute()) {
                        return false;
                    }
                }
                return true;
            }
///////////////////////////////////////////////////////////////////////////

            //getQuestions
            public function getAddedQuestions() {
                $this->db->query('SELECT  * FROM questionpool WHERE expertID = :expertID ORDER BY QPID DESC');
                $this->db->bind(':expertID', $_SESSION['userID']);
                $row = $this->db->resultSet();
                return $row;
            }

             //getQuestionTags
        public function getQuestionPoolTag($QPID) {
            $this->db->query('SELECT tag FROM questionpooltag WHERE QPID = :QPID');
            $this->db->bind(':QPID', $QPID);
            $row = $this->db->single();
            return $row ? $row->tag : '';
        }

////////////////////////////////////////////////////////////////////////////
        //Get Question by ID
        public function getQuestionByID($QPID) {
            $this->db->query('SELECT  * FROM questionpool WHERE QPID = :QPID');
            $this->db->bind(':QPID', $QPID);
            $row = $this->db->single();
            return $row;
        } 
//////////////////////////////////////////////////////////////////////////////////////

        public function editQuestionData($data){
            $this->db->query('UPDATE questionpool SET question= :question, difficulty= :difficulty,expertID= :expertID WHERE QPID=:QPID');
            $this->db->bind(':question', $data['question']);
            $this->db->bind(':difficulty', $data['difficulty']);
            $this->db->bind(':expertID', $_SESSION['userID']);
            $this->db->bind(':QPID', $data['QPID']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updateAnswerPool($data, $QPID) {
            $this->db->query('DELETE FROM answerpool WHERE QPID=:QPID');

            if( $this->db->execute()){
                $options=$data['content'];
                $validity= explode(',', $data['validity']);
            
                for($i = 0; $i < count($options); $i++) {
                    $this->db->query('INSERT INTO answerpool (QPID, content, validity) VALUES (:QPID, :content, :validity)');
                    $this->db->bind(':QPID', $data['QPID']);
                    $this->db->bind(':content', $options[$i]);
                    $this->db->bind(':validity', $validity[$i]);
            
                    $this->db->execute();
                    return true;

                }
               
            }else{

            return false;

            }
        }
        

        //Delete QuestionTag
        public function deleteQuestionPoolTag($QPID) {
            $this->db->query('DELETE  FROM questionpooltag WHERE QPID = :QPID');
            $this->db->bind(':QPID', $QPID);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
        // public function editQuestionpoolTag($tag,$QPID){
        //     $this->db->query('INSERT INTO questionpooltag (QPID,tag) VALUES (:QPID,:tag)');
        //     $this->db->bind(':QPID',$QPID);
        //     $this->db->bind(':tag',$tag);

        //     if($this->db->execute()){
        //         return true;
        //     }else{
        //         return false;
        //     }
        // }
        
        ///////////////////////////////////////////////////////////////
        public function delete($QPID) {
            $this->db->query('DELETE FROM questionpool WHERE QPID = :QPID');
            $this->db->bind(':QPID', $QPID);
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
 }
?>