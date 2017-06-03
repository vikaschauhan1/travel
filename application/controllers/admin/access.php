<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access extends CI_Controller {
    
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	function index(){
                
            $this->load->model('users');
            $details = $this->users->get_user_details($this->session->userdata('id'));
            $this->view($details);
	}
	function view($details){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passagain]');
		$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|callback_oldpassword|xss_clean');
		$data['user_id'] = $this->session->userdata('id');

            if ($this->form_validation->run() == FALSE){
                $data['main_content'] = 'backend/access/access';
                $data['title'] = 'access';
                $this->load->view('includes/template', $data);
            } else {
                
                $data = $this->input->post();
                $this->users->resetPassword($data);
                $this->session->set_flashdata('message', 'Password Reset successfully!');
                redirect('admin/access', 'refresh');
            }
		
        }
        
        function oldpassword(){
            $this->load->model('users');
            $this->form_validation->set_message('oldpassword', 'The %s does not match');
            $data['id'] = $this->session->userdata('id');
            $data['oldpassword'] = $this->input->post('old_password');
            
            return  $this->users->validatePassword($data);
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
