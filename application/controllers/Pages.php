<?php
	class Pages extends CI_Controller{

		public function view($page = 'home'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
            // not sure what it this for
			$data['title'] = ucfirst($page);
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
		
        public function index(){
            $this->load->view('templates/header');
			$this->load->view('pages/home');
			$this->load->view('templates/footer');
        }
	}