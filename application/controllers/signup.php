<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {
 	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		//$this->add_user();	

	}
	
	function index()
	{   
		$this->add_user();



	}

	function add_user(){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passagain]|md5');
		$this->form_validation->set_rules('firstname', 'First name', 'trim|required|alpha');
		$this->form_validation->set_rules('lastname', 'Last name', 'trim|required|alpha');
		$this->form_validation->set_rules('email', 'Email adress', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('frontend/signup_form');
		}
		else
		{
			$this->load->model('users');
			$data = $this->input->post();
			$this->users->create_user($data);
			$this->session->set_flashdata('message', 'You are registerd successfully, Please <a href="login">login');
			redirect('signup', 'refresh');

		}
	}

	private function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			echo 'login please';
			die();
		}
	}


}
?>
