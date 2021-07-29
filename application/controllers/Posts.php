<?php
	class Posts extends CI_Controller{
		public function index($post_id){
			if($post_id === '')
			{
				$data['title'] = 'Latest Posts';
				$this->load->view('templates/header');
				$this->load->view('posts/index', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				$data['post_id'] = $post_id;
				$this->load->view('templates/header');
				$this->load->view('posts/single_post',$data);
				$this->load->view('templates/footer');
			}
		}
    }