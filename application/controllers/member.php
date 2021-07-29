<?php
	class Member extends CI_Controller{
		public function index(){
			$this->load->view('templates/header');
			$this->load->view('members/member_page');
			$this->load->view('templates/footer');
		}
    }