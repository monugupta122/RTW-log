<?php
    class News_model extends CI_Model {
        public function __construct(){
            $this->load->database();
        }

        public function get_news(){
            
            $query = $this->db->query("Select * from news");
            return $query->result_array();
        }
    }
?>