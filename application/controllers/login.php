<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function index()
	{
	   $data['title'] = 'Login';
	   $data['error'] = '';
	   $this->load->view('backend/login_form', $data);
	}

	function validate_credentials()
	{
	 	$this->load->model('users');
	 	$query = $this->users->validate();
	 	if($query)
	 	{   $details = $this->users->get_details($this->input->post('email'));
	 		$data = array(
	 				'email' => $this->input->post('email'),
	 				'is_logged_in' => true,
	 				'id'=> $details->id,
	 				'role'=>$details->role
	 				);
	 		$this->session->set_userdata($data);
	 		redirect('admin/dashboard');
	 	}
	 	else
	 	{
	 		$data['error'] = 'Invalid Username or Password';
	     	$data['main_content'] = 'login_form';
	 		$this->load->view('backend/login_form', $data);
	 	}
	}

	function logout()
	{
	    $this->session->sess_destroy();
	    //$this->index();
	    redirect('../');
	}



}

?>
