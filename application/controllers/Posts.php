<?php
	class Posts extends CI_Controller{
		public function index($offset = 0){	
			$data['title'] = 'Latest Posts';

			$data['posts'] = $this->posts_model->get_posts(FALSE);

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
        }
    }