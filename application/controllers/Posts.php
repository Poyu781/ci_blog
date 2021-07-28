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

				$this->load->view('templates/header');
				$this->load->view('posts/single_post');
				$this->load->view('templates/footer');
			}
		}
    }