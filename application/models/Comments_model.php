<?php
	class Comments_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_comments($post_id){
			$this->db->select('user_id,body,username,created_at');
			$this->db->order_by('comments.created_at', 'ESC');
			$this->db->join('users', 'users.id = comments.user_id','left');
			$query = $this->db->get_where('comments',array('post_id' => $post_id));
			return $query->result_array('id','user_id');
		}
		
		public function post_comments($input_data){
			$this->db->insert('comments', $input_data);
		}
    }