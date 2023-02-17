<?php
    class pagesM {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getQuestions() {
            $this->db->query('SELECT * FROM question');
            $rows = $this->db->resultSet();
            return $rows;
        }
    }

?>