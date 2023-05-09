<?php 

class formtagM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
            public function submitTag($tag,$value) {
              // Do something with the form data, such as saving it to a database
                $this->db->query('INSERT INTO tags(tag,value) VALUES (:tag,:value)');
                $this->db->bind(':tag', $tag);
                $this->db->bind(':value', $value);

                $rows = $this->db->resultSet();
                return $rows;
                
              return ['success' => true];
            }

    }

?>