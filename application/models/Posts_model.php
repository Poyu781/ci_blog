<?php
	class Posts_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_posts($slug = FALSE){
			if($slug === FALSE){
				$query = $this->db->get('posts');
				return $query->result_array();
			}

			$query = $this->db->get('posts');
			return $query->row_array();
        }
    }