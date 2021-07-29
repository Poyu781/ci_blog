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
		public function edit($post_id){
			$post_id = $post_id;
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('posts/edit');
				$this->load->view('templates/footer');
			} else {
				$data['body'] = $this->input->post('body');
				$data['title'] = $this->input->post('title');
				$post_id = $this->input->post('id');
				if ($post_id){
					$this->posts_model->put_posts($post_id,$data);
					redirect('members');
				}
				$data['user_id'] = $this->session->userdata('user_id');
				$this->posts_model->post_posts($data);
				redirect('members');
			}
		}
    }