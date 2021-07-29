<?php
	class Posts_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_posts_by_user($user_id){
			$query = $this->db->get_where('posts',array('user_id' => $user_id));
			return $query->result_array();
		}
		public function get_post($post_id){
			if ($post_id === ''){
				$this->db->order_by('posts.created_at', 'DESC');
				$query = $this->db->get('posts');
				return $query->result_array();
			}
			$query = $this->db->get_where('posts',array('id' => $post_id));
			return $query->result_array();
		}
		public function put_posts($post_id,$input_data){
			$this->db->where('id', $post_id);
			$this->db->update('posts', $input_data);
		}
		public function post_posts($input_data){
			$this->db->insert('posts', $input_data);
		}
		public function delete_posts($post_id){
			$this->db->where('id', $post_id);
			$this->db->delete('posts');
			return true;
		}
    }