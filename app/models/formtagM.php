<?php 

// class formtagM {
//         private $db;

//         public function __construct() {
//             $this->db = new Database;
//         }
//             public function submitForm($tag) {
//               // Do something with the form data, such as saving it to a database
//                 $this->db->query('SELECT DISTINCT expert.expertID as expertID, user.firstName as fName, user.lastName as lName 
//                                   FROM expert JOIN user ON expert.expertID = user.userID JOIN usertag ON usertag.userID = user.userID  
//                                   WHERE usertag.tag = :tag');
//                 $this->db->bind(':tag', $tag);

//                 $rows = $this->db->resultSet();
//                 return $rows;
                
//               return ['success' => true];
//             }

//     }

?>